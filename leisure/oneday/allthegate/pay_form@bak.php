<?
////////////////////////////////////////////////////////////////////////////////////////////////////
//  mertkey Ȯ�� ���
//  1. ����������(����: http://pgweb.dacom.net  �׽�Ʈ: http://pgweb.dacom.net/tmert) ����
//  2. Dacom ���� ���� �׽�Ʈ ���̵� ���� ���̵�� �α���
//  3. ������� -> ������������ -> ����������� ���� Ȯ���� ����
////////////////////////////////////////////////////////////////////////////////////////////////////

if(!strcmp($oper_info->pay_test, "Y")) {
	$oper_info->pay_id = "aegis";
	$oper_info->pay_key = "6f51f77a2b2222d642e20e445101a35f";
}
/////////////////////
//wiz_shopinfo �ε�//
/////////////////////
$shop_info = mysql_fetch_object(mysql_query("SELECT * FROM wiz_shopinfo"));

//�ô�����Ʈ ���� �������̵� �� �׽�Ʈ ���̵� ����
$mid = $oper_info->pay_id;
$oid = $order_info->orderid;					//�ֹ���ȣ

$amount = $order_info->total_price;		//�����ݾ�
$mertkey = $oper_info->pay_key;				//�ô�����Ʈ���� �߱޹��� Ű��

//////////////////////
//����� ���̵� ����//
//////////////////////
if(empty($wiz_session[id])){//���̵� �������
	$_userid = $wiz_session[id];
}else{
	$_userid = "NonUserId";
}
/////////////////
//������� ���//
/////////////////

//�ʿ�������� �ּ�ó���� ����(�޴�������)
$_hidden_start	="<!--";$_hidden_end	="-->";

//�ʿ�������� �ּ�ó���� ����(������˰���)
$_hidden_start2	="<!--";$_hidden_end2	="-->";

switch($pay_method){
		case "PC"://�ſ�ī��
			$_paymethod = "onlycard";break;
		case "PN"://������ü
			if($oper_info->pay_escrow=="Y"&&$amount>100000){//����ũ�� ��뿩��
				$_paymethod = "onlyicheselfescrow";break;//����ũ�� ���/������ü
			}else{
				$_paymethod = "onlyiche";break;//�Ϲ� ������ü
			}
		case "PV"://�������
			$_hidden_start2="";$_hidden_end2="";
			if($oper_info->pay_escrow=="Y"&&$amount>100000){//����ũ�� ��뿩��
				$_paymethod = "onlyvirtualselfescrow";break;
			}else{
				$_paymethod = "onlyvirtual";break;
			}
		case "PH";//�޴���
			$_paymethod = "onlyhp";
			$_hidden_start="";$_hidden_end="";
			break;
}
?>
<script language=javascript src="http://www.allthegate.com/plugin/AGSWallet.js"></script>
<script language=javascript>
<!--
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
// �ô�����Ʈ �÷����� ��ġ�� Ȯ���մϴ�.
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

StartSmartUpdate();

function Pay(form){
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// MakePayMessage() �� ȣ��Ǹ� �ô�����Ʈ �÷������� ȭ�鿡 ��Ÿ���� Hidden �ʵ�
	// �� ���ϰ����� ä������ �˴ϴ�.
	//////////////////////////////////////////////////////////////////////////////////////////////////////////////
	if(form.Flag.value == "enable"){
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////
		// �Էµ� ����Ÿ�� ��ȿ���� �˻��մϴ�.
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////

		if(Check_Common(form) == true){
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////
			// �ô�����Ʈ �÷����� ��ġ�� �ùٸ��� �Ǿ����� Ȯ���մϴ�.
			//////////////////////////////////////////////////////////////////////////////////////////////////////////////

			if(document.AGSPay == null || document.AGSPay.object == null){
				alert("�÷����� ��ġ �� �ٽ� �õ� �Ͻʽÿ�.");
			}else{
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// �ô�����Ʈ �÷����� �������� �������� �����ϱ� JavaScript �ڵ带 ����ϰ� �ֽ��ϴ�.
				// ���������� �°� JavaScript �ڵ带 �����Ͽ� ����Ͻʽÿ�.
				//
				// [1] �Ϲ�/������ ��������
				// [2] �Ϲݰ����� �Һΰ�����
				// [3] �����ڰ����� �Һΰ����� ����
				// [4] ��������
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////

				//////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// [1] �Ϲ�/������ �������θ� �����մϴ�.
				//
				// �Һ��Ǹ��� ��� �����ڰ� ���ڼ����Ḧ �δ��ϴ� ���� �⺻�Դϴ�. �׷���,
				// ������ �ô�����Ʈ���� ���� ����� ���ؼ� �Һ����ڸ� ���������� �δ��� �� �ֽ��ϴ�.
				// �̰�� �����ڴ� ������ �Һΰŷ��� �����մϴ�.
				//
				// ����)
				// 	(1) �Ϲݰ����� ����� ���
				// 	form.DeviId.value = "9000400001";
				//
				// 	(2) �����ڰ����� ����� ���
				// 	form.DeviId.value = "9000400002";
				//
				// 	(3) ���� ���� �ݾ��� 100,000�� �̸��� ��� �Ϲ��Һη� 100,000�� �̻��� ��� �������Һη� ����� ���
				// 	if(parseInt(form.Amt.value) < 100000)
				//		form.DeviId.value = "9000400001";
				// 	else
				//		form.DeviId.value = "9000400002";
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////

				form.DeviId.value = "9000400001";

				//////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// [2] �Ϲ� �ҺαⰣ�� �����մϴ�.
				//
				// �Ϲ� �ҺαⰣ�� 2 ~ 12�������� �����մϴ�.
				// 0:�Ͻú�, 2:2����, 3:3����, ... , 12:12����
				//
				// ����)
				// 	(1) �ҺαⰣ�� �ϽúҸ� �����ϵ��� ����� ���
				// 	form.QuotaInf.value = "0";
				//
				// 	(2) �ҺαⰣ�� �Ͻú� ~ 12�������� ����� ���
				//		form.QuotaInf.value = "0:3:4:5:6:7:8:9:10:11:12";
				//
				// 	(3) �����ݾ��� ���������ȿ� ���� ��쿡�� �Һΰ� �����ϰ� �� ���
				// 	if((parseInt(form.Amt.value) >= 100000) || (parseInt(form.Amt.value) <= 200000))
				// 		form.QuotaInf.value = "0:2:3:4:5:6:7:8:9:10:11:12";
				// 	else
				// 		form.QuotaInf.value = "0";
				//////////////////////////////////////////////////////////////////////////////////////////////////////////////

				//�����ݾ��� 5���� �̸����� �Һΰ����� ��û�Ұ�� ��������
				if(parseInt(form.Amt.value) < 50000)
					form.QuotaInf.value = "0";
				else
					form.QuotaInf.value = "0:2:3:4:5:6:7:8:9:10:11:12";

				////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				// [3] ������ �ҺαⰣ�� �����մϴ�.
				// (�Ϲݰ����� ��쿡�� �� ������ ������� �ʽ��ϴ�.)
				//
				// ������ �ҺαⰣ�� 2 ~ 12�������� �����ϸ�,
				// �ô�����Ʈ���� ������ �Һ� ������������ �����ؾ� �մϴ�.
				//
				// 100:BC
				// 200:����
				// 300:��ȯ
				// 400:�Ｚ
				// 500:����
				// 600:����
				// 800:����
				// 900:�Ե�
				//
				// ����)
				// 	(1) ��� �Һΰŷ��� �����ڷ� �ϰ� ���������� ALL�� ����
				// 	form.NointInf.value = "ALL";
				//
				// 	(2) ����ī�� Ư���������� �����ڸ� �ϰ� ������� ����(2:3:4:5:6����)
				// 	form.NointInf.value = "200-2:3:4:5:6";
				//
				// 	(3) ��ȯī�� Ư���������� �����ڸ� �ϰ� ������� ����(2:3:4:5:6����)
				// 	form.NointInf.value = "300-2:3:4:5:6";
				//
				// 	(4) ����,��ȯī�� Ư���������� �����ڸ� �ϰ� ������� ����(2:3:4:5:6����)
				// 	form.NointInf.value = "200-2:3:4:5:6,300-2:3:4:5:6";
				//
				//	(5) ������ �ҺαⰣ ������ ���� ���� ��쿡�� NONE�� ����
				//	form.NointInf.value = "NONE";
				//
				//	(6) ��ī��� Ư���������� �����ڸ� �ϰ� �������(2:3:6����)
				//	form.NointInf.value = "100-2:3:6,200-2:3:6,300-2:3:6,400-2:3:6,500-2:3:6,600-2:3:6,800-2:3:6,900-2:3:6";
				//
				////////////////////////////////////////////////////////////////////////////////////////////////////////////////

				if(form.DeviId.value == "9000400002")
					form.NointInf.value = "ALL";

				if(MakePayMessage(form) == true){
					Disable_Flag(form);

					var openwin = window.open("/shop/allthegate/AGS_progress.html","popup","width=300,height=160"); //"����ó����"�̶�� �˾�â���� �κ�

					form.submit();
				}else{
					alert("���ҿ� �����Ͽ����ϴ�.");// ��ҽ� �̵������� �����κ�
				}
			}
		}
	}
}

function Enable_Flag(form){
        form.Flag.value = "enable"
}

function Disable_Flag(form){
        form.Flag.value = "disable"
}

function Check_Common(form){
	if(form.StoreId.value == ""){
		alert("�������̵� �Է��Ͻʽÿ�.");
		return false;
	}
	else if(form.StoreNm.value == ""){
		alert("�������� �Է��Ͻʽÿ�.");
		return false;
	}
	else if(form.OrdNo.value == ""){
		alert("�ֹ���ȣ�� �Է��Ͻʽÿ�.");
		return false;
	}
	else if(form.ProdNm.value == ""){
		alert("��ǰ���� �Է��Ͻʽÿ�.");
		return false;
	}
	else if(form.Amt.value == ""){
		alert("�ݾ��� �Է��Ͻʽÿ�.");
		return false;
	}
	else if(form.MallUrl.value == ""){
		alert("����URL�� �Է��Ͻʽÿ�.");
		return false;
	}
	return true;
}

-->

</script>
<body topmargin=0 leftmargin=0 rightmargin=0 bottommargin=0 onload="javascript:Enable_Flag(frmAGS_pay);">
<table border=0 cellpadding=0 cellspacing=0 width=100%>
<form name=frmAGS_pay method=post action="./allthegate/order_update.php">



<!--------------------------------------------------->
<!-- ������ ���� �⺻ ���� �Է� ��  ���� (��������)-->
<!--------------------------------------------------->
<input type=hidden name=pay_method value="<?=$pay_method?>">
<!-- ���� ���
card:�ſ�ī�� / iche:������ü / hp:�ڵ������� / ars:ARS���� / virtual:������� / onlycard:�ſ�ī�� (����)
onlyiche:������ü (����) / onlyhp:�ڵ������� (����) / onlyars:ARS���� (����) / onlyvirtual:������� (����)
-->
<input type=hidden name=Job value="<?=$_paymethod?>">
<!-- ���� ���̵� -->
<input type=hidden name=StoreId value="<?=$mid?>">
<!-- �ֹ���ȣ -->
<input type=hidden name=OrdNo value="<?=$oid?>">
<!-- �ֹ��ݾ� -->
<input type=hidden name=Amt value="<?=$order_info->total_price?>">
<!-- ������ -->
<input type=hidden name=StoreNm value="<?=$shop_info->shop_name?>">
<!-- ��ǰ�� -->
<?

$sql = "select * from wiz_dayproduct where prdcode='$prdcode'";
$stm = mysql_query($sql);
$row = mysql_fetch_array($stm);
$payment_prdname = $row[prdname];
?>
<input type=hidden name=ProdNm value="<?=$payment_prdname?>">
<!-- ���� URL -->
<input type=hidden name=MallUrl value="<?=$shop_info->shop_url?>">
<!-- �ֹ��� email -->
<input type=hidden name=UserEmail value="<?=$order_info->send_email?>">
<!-- ����� ���̵� (ī�����,�ڵ��������� [���ݿ������ڵ��߱�]�� �ʼ�) -->
<input type=hidden style=width:100px name=UserId value="<?=$_userid?>">
<!-- ī����� + ������� �ʼ� ���� -->
<!-- �ֹ��ڸ� -->
<input type=hidden name=OrdNm value="<?=$order_info->send_name?>">
<!-- �ֹ��� ����ó -->
<input type=hidden name=OrdPhone value="<?=$order_info->send_hphone?>">
<!-- �ֹ��� �ּ� -->
<input type=hidden name=OrdAddr value="<?=$order_info->send_address?>">
<!-- �����ڸ� -->
<input type=hidden name=RcpNm value="<?=$order_info->rece_name?>">
<!-- ������ ����ó -->
<input type=hidden name=RcpPhone value="<?=$order_info->rece_hphone?>">
<!-- ������ �ּ� -->
<input type=hidden name=DlvAddr value="<?=$order_info->rece_address?>">
<!-- ��Ÿ���� -->
<input type=hidden name=Remark value="<?=$order_info->message?>">
<!-- ������ ī����� + ������� �ʼ� ���� -->

<!-- �ڵ��� ������ �߿��� -->
<!--CP���̵� -->
<!-- CP���̵� �ڵ��� ���� �ǰŷ� ��ȯ�Ŀ��� �߱޹����� CPID�� �����Ͽ� �ֽñ� �ٶ��ϴ�. -->
<?=$_hidden_start?><input type=hidden name=HP_ID value=""><?=$_hidden_end?>
<!--CP��й�ȣ -->
<!-- CP��й�ȣ�� �ڵ��� ���� �ǰŷ� ��ȯ�Ŀ��� �߱޹����� ��й�ȣ�� �����Ͽ� �ֽñ� �ٶ��ϴ�. -->
<?=$_hidden_start?><input type=hidden name=HP_PWD value=""><?=$_hidden_end?>
<!-- SUB-CP���̵� -->
<!-- SUB-CPID�� �ڵ��� ���� �ǰŷ� ��ȯ�Ŀ� �߱޹����� ������ �Է��Ͽ� �ֽñ� �ٶ��ϴ�. -->
<?=$_hidden_start?><input type=hidden name=HP_SUBID value=""><?=$_hidden_end?>
<!-- ��ǰ�ڵ� -->
<!-- ��ǰ�ڵ带 �ڵ��� ���� �ǰŷ� ��ȯ�Ŀ��� �߱޹����� ��ǰ�ڵ�� �����Ͽ� �ֽñ� �ٶ��ϴ�. -->
<?=$_hidden_start?><input type=hidden name=ProdCode value=""><?=$_hidden_end?>
<!--��ǰ����-->
<!-- ��ǰ������ �ڵ��� ���� �ǰŷ� ��ȯ�Ŀ��� �߱޹����� ��ǰ������ �����Ͽ� �ֽñ� �ٶ��ϴ�. -->
<!-- �Ǹ��ϴ� ��ǰ�� ������(������)�� ��� = 1, �ǹ�(��ǰ)�� ��� = 2 -->
<?=$_hidden_start?><input type=hidden name=HP_UNITType value="1"><?=$_hidden_end?>
<!-- ������� �������� ��/��� �뺸�� ���� �ʼ� �Է� ���� �Դϴ�. -->
<!-- �������ּҴ� �������ּҸ� ������ '/'���� �ּҸ� �����ֽø� �˴ϴ�. -->
<?=$_hidden_start2?><input type=hidden name=MallPage value="shop/allthegate/auto_vbankresult.php"><?=$_hidden_end2?>
<tr>
	<td height="40px" style="padding:20px 0 0 0"><img src="/images/order/order_tle5.gif" alt="��������" /></td>
</tr>
<tr>
    <td class="b_line">
		<table border=0 cellpadding=0 cellspacing=0 width=100%>
		<!--tr><td style="padding:0 0 5 0" valign=bottom><img src="/images/sett_t03.gif"></td></tr-->
		<tr>
			<td>
			<table border=1 cellpadding=0 cellspacing=0 width=100% bordercolor="#d9d9d9" class="orderlist">
			  <tr height=25>
				 <th width="20%">�������</th>
				 <td width="80%"><?=pay_method($pay_method)?></td></tr>
			  <tr height=25>
				 <th>�������ݾ�</th>
				 <td><span class="price"><?=number_format($order_info->coupon_use)?>��</span></td>
			  </tr>
			  <tr height=25>
				 <th style="border-bottom:none">�����ݾ�</th>
				 <td style="border-bottom:none"><span class="price"><?=number_format($order_info->total_price)?>��</span></td>
			  </tr>
			</table>
		</td></tr>
		</table>
    </td>
  </tr>
  <tr>
    <td height=80 align=center>
	    <img src="/images/order/btnOrder.gif" onclick="javascript:Pay(frmAGS_pay);" style="cursor:hand"> <a href="/"><img src="/images/order/btnCancel.gif" border=0></a>
     </td>
  </tr>
<!-- ��ũ��Ʈ �� �÷����ο��� ���� �����ϴ� Hidden �ʵ�  !!������ �Ͻðų� �������� ���ʽÿ�-->

<!-- �� ���� ���� ��� ���� -->
<input type=hidden name=Flag value="">				<!-- ��ũ��Ʈ������뱸���÷��� -->
<input type=hidden name=AuthTy value="">			<!-- �������� -->
<input type=hidden name=SubTy value="">				<!-- ����������� -->

<!-- �ſ�ī�� ���� ��� ���� -->
<input type=hidden name=DeviId value="">			<!-- (�ſ�ī�����)		�ܸ�����̵� -->
<input type=hidden name=QuotaInf value="0">			<!-- (�ſ�ī�����)		�Ϲ��Һΰ����������� -->
<input type=hidden name=NointInf value="NONE">		<!-- (�ſ�ī�����)		�������Һΰ����������� -->
<input type=hidden name=AuthYn value="">			<!-- (�ſ�ī�����)		�������� -->
<input type=hidden name=Instmt value="">			<!-- (�ſ�ī�����)		�Һΰ����� -->
<input type=hidden name=partial_mm value="">		<!-- (ISP���)			�Ϲ��ҺαⰣ -->
<input type=hidden name=noIntMonth value="">		<!-- (ISP���)			�������ҺαⰣ -->
<input type=hidden name=KVP_RESERVED1 value="">		<!-- (ISP���)			RESERVED1 -->
<input type=hidden name=KVP_RESERVED2 value="">		<!-- (ISP���)			RESERVED2 -->
<input type=hidden name=KVP_RESERVED3 value="">		<!-- (ISP���)			RESERVED3 -->
<input type=hidden name=KVP_CURRENCY value="">		<!-- (ISP���)			��ȭ�ڵ� -->
<input type=hidden name=KVP_CARDCODE value="">		<!-- (ISP���)			ī����ڵ� -->
<input type=hidden name=KVP_SESSIONKEY value="">	<!-- (ISP���)			��ȣȭ�ڵ� -->
<input type=hidden name=KVP_ENCDATA value="">		<!-- (ISP���)			��ȣȭ�ڵ� -->
<input type=hidden name=KVP_CONAME value="">		<!-- (ISP���)			ī��� -->
<input type=hidden name=KVP_NOINT value="">			<!-- (ISP���)			������/�Ϲݿ���(������=1, �Ϲ�=0) -->
<input type=hidden name=KVP_QUOTA value="">			<!-- (ISP���)			�Һΰ��� -->
<input type=hidden name=CardNo value="">			<!-- (�Ƚ�Ŭ��,�Ϲݻ��)	ī���ȣ -->
<input type=hidden name=MPI_CAVV value="">			<!-- (�Ƚ�Ŭ��,�Ϲݻ��)	��ȣȭ�ڵ� -->
<input type=hidden name=MPI_ECI value="">			<!-- (�Ƚ�Ŭ��,�Ϲݻ��)	��ȣȭ�ڵ� -->
<input type=hidden name=MPI_MD64 value="">			<!-- (�Ƚ�Ŭ��,�Ϲݻ��)	��ȣȭ�ڵ� -->
<input type=hidden name=ExpMon value="">			<!-- (�Ϲݻ��)			��ȿ�Ⱓ(��) -->
<input type=hidden name=ExpYear value="">			<!-- (�Ϲݻ��)			��ȿ�Ⱓ(��) -->
<input type=hidden name=Passwd value="">			<!-- (�Ϲݻ��)			��й�ȣ -->
<input type=hidden name=SocId value="">				<!-- (�Ϲݻ��)			�ֹε�Ϲ�ȣ/����ڵ�Ϲ�ȣ -->

<!-- ������ü ���� ��� ���� -->
<input type=hidden name=ICHE_OUTBANKNAME value="">	<!-- ��ü��������� -->
<input type=hidden name=ICHE_OUTACCTNO value="">	<!-- ��ü���¿������ֹι�ȣ -->
<input type=hidden name=ICHE_OUTBANKMASTER value=""><!-- ��ü���¿����� -->
<input type=hidden name=ICHE_AMOUNT value="">		<!-- ��ü�ݾ� -->

<!-- �ڵ��� ���� ��� ���� -->
<input type=hidden name=HP_SERVERINFO value="">		<!-- �������� -->
<input type=hidden name=HP_HANDPHONE value="">		<!-- �ڵ�����ȣ -->
<input type=hidden name=HP_COMPANY value="">		<!-- ��Ż��(SKT,KTF,LGT) -->
<input type=hidden name=HP_IDEN value="">			<!-- �����û�� -->
<input type=hidden name=HP_IPADDR value="">			<!-- ���������� -->

<!-- ARS ���� ��� ���� -->
<input type=hidden name=ARS_PHONE value="">			<!-- ARS��ȣ -->
<input type=hidden name=ARS_NAME value="">			<!-- ��ȭ�����ڸ� -->

<!-- ������� ���� ��� ���� -->
<input type=hidden name=ZuminCode value="">			<!-- ��������Ա����ֹι�ȣ -->
<input type=hidden name=VIRTUAL_CENTERCD value="">	<!-- ������������ڵ� -->
<input type=hidden name=VIRTUAL_DEPODT value="">	<!-- ��������Աݿ����� -->
<input type=hidden name=VIRTUAL_NO value="">		<!-- ������¹�ȣ -->

<input type=hidden name=mTId value="">

<!-- ����ũ�� ���� ��� ���� -->
<input type=hidden name=ES_SENDNO value="">			<!-- ����ũ��������ȣ -->

<!-- �ڷ���ŷ-������ü ���� ��� ���� -->
<input type=hidden name=ICHEARS_ADMNO value="">
<input type=hidden name=ICHEARS_POSMTID value="">
<input type=hidden name=ICHEARS_CENTERCD value="">
<input type=hidden name=ICHEARS_HPNO value="">

<!-- ������ü(����) ���� ��� ���� -->
<input type=hidden name=ICHE_SOCKETYN value="">		<!-- ������ü(����) ��� ���� -->
<input type=hidden name=ICHE_POSMTID value="">		<!-- ������ü(����) �̿����ֹ���ȣ -->
<input type=hidden name=ICHE_FNBCMTID value="">		<!-- ������ü(����) FNBC�ŷ���ȣ -->
<input type=hidden name=ICHE_APTRTS value="">		<!-- ������ü(����) ��ü �ð� -->
<input type=hidden name=ICHE_REMARK1 value="">		<!-- ������ü(����) ��Ÿ����1 -->
<input type=hidden name=ICHE_REMARK2 value="">		<!-- ������ü(����) ��Ÿ����2 -->
<input type=hidden name=ICHE_ECWYN value="">		<!-- ������ü(����) ����ũ�ο��� -->
<input type=hidden name=ICHE_ECWID value="">		<!-- ������ü(����) ����ũ��ID -->
<input type=hidden name=ICHE_ECWAMT1 value="">		<!-- ������ü(����) ����ũ�ΰ����ݾ�1 -->
<input type=hidden name=ICHE_ECWAMT2 value="">		<!-- ������ü(����) ����ũ�ΰ����ݾ�2 -->
<input type=hidden name=ICHE_CASHYN value="">		<!-- ������ü(����) ���ݿ��������࿩�� -->
<input type=hidden name=ICHE_CASHGUBUN_CD value="">	<!-- ������ü(����) ���ݿ��������� -->
<input type=hidden name=ICHE_CASHID_NO value="">	<!-- ������ü(����) ���ݿ������ź�Ȯ�ι�ȣ -->

<!-- ��ũ��Ʈ �� �÷����ο��� ���� �����ϴ� Hidden �ʵ�  !!������ �Ͻðų� �������� ���ʽÿ�-->
</form>
</table>