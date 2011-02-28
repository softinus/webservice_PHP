<?php
include "../../inc/common.inc"; 				// DB���ؼ�, ������ �ľ�
include "../../inc/design_info.inc"; 	// ������ ����
include "../../inc/oper_info.inc"; 		// � ����
include "../../inc/mem_info.inc"; 			// ȸ�� ����
include "../../inc/util.inc";		      // ��ƿlib
include "../../inc/shop_info.inc"; 		// ������ ����

/* INIsecurepay.php
 *
 * �̴����� �÷������� ���� ��û�� ������ ó���Ѵ�.
 * ���� ��û�� ó���Ѵ�.
 * �ڵ忡 ���� �ڼ��� ������ �Ŵ����� �����Ͻʽÿ�.
 * <����> �������� ������ �ݵ�� üũ�ϵ����Ͽ� �����ŷ��� �����Ͽ� �ֽʽÿ�.
 *
 * http://www.inicis.com
 * Copyright (C) 2006 Inicis Co., Ltd. All rights reserved.
 */

	/**************************
	 * 1. ���̺귯�� ��Ŭ��� *
	 **************************/
	require("INIpay41Lib.php");



	if(!strcmp($oper_info->pay_test, "Y")) {
		//$oper_info->pay_id = "INIpayTest";
		$oper_info->pay_id = "hanatest01";
		$oper_info->pay_key = "6f51f77a2b2222d642e20e445101a35f";
	}
	/***************************************
	 * 2. INIpay41 Ŭ������ �ν��Ͻ� ���� *
	 ***************************************/
	$inipay = new INIpay41;


	/*********************
	 * 3. ���� ���� ���� *
	 *********************/
	$inipay->m_inipayHome = getcwd(); 		// �̴����� Ȩ���͸�
	$inipay->m_type = "securepay"; 				// ���� (���� ���� �Ұ�)
	$inipay->m_pgId = "INIpay".$pgid; 			// ���� (���� ���� �Ұ�)
	$inipay->m_subPgIp = "203.238.3.10"; 			// ���� (���� ���� �Ұ�)
	$inipay->m_keyPw = "1111"; 				// Ű�н�����(�������̵� ���� ����)
	$inipay->m_debug = "true"; 				// �α׸��("true"�� �����ϸ� �󼼷αװ� ������.)
	$inipay->m_mid = $mid; 					// �������̵�
	$inipay->m_uid = $uid; 					// INIpay User ID (���� ���� �Ұ�)
	$inipay->m_uip = getenv("REMOTE_ADDR"); 		// ���� (���� ���� �Ұ�)
	$inipay->m_goodName = $goodname;			// ��ǰ��
	$inipay->m_currency = $currency;			// ȭ�����

	$inipay->m_price = $price;				// �����ݾ�

	$inipay->m_buyerName = $buyername;			// ������ ��
	$inipay->m_buyerTel = $buyertel;			// ������ ����ó(�޴��� ��ȣ �Ǵ� ������ȭ��ȣ)
	$inipay->m_buyerEmail = $buyeremail;			// ������ �̸��� �ּ�
	$inipay->m_payMethod = $paymethod;			// ���ҹ�� (���� ���� �Ұ�)
	$inipay->m_encrypted = $encrypted;			// ��ȣ��
	$inipay->m_sessionKey = $sessionkey;			// ��ȣ��
	$inipay->m_url = $shop_info->shop_url; 	// ���� ���񽺵Ǵ� ���� SITE URL�� �����Ұ�
	$inipay->m_cardcode = $cardcode; 			// ī���ڵ� ����
	$inipay->m_ParentEmail = $parentemail; 			// ��ȣ�� �̸��� �ּ�(�ڵ��� , ��ȭ�����ÿ� 14�� �̸��� ���� �����ϸ�  �θ� �̸��Ϸ� ���� �����뺸 �ǹ�, �ٸ����� ���� ���ÿ� ���� ����)

	/*-----------------------------------------------------------------*
	 * ������ ���� *                                                   *
	 *-----------------------------------------------------------------*
	 * �ǹ������ �ϴ� ������ ��쿡 ���Ǵ� �ʵ���̸�               *
	 * �Ʒ��� ������ INIsecurepay.html ���������� ����Ʈ �ǵ���        *
	 * �ʵ带 ����� �ֵ��� �Ͻʽÿ�.                                  *
	 * ������ ������ü�� ��� �����ϼŵ� �����մϴ�.                   *
	 *-----------------------------------------------------------------*/
	$inipay->m_recvName = $recvname;	// ������ ��
	$inipay->m_recvTel = $recvtel;		// ������ ����ó
	$inipay->m_recvAddr = $recvaddr;	// ������ �ּ�
	$inipay->m_recvPostNum = $recvpostnum;  // ������ �����ȣ
	$inipay->m_recvMsg = $recvmsg;		// ���� �޼���

	/****************
	 * 4. ���� ��û *
	 ****************/
	$inipay->startAction();

	/****************************************************************************************************************
	 * 5. ����  ���
	 *
	 *  1 ��� ���� ���ܿ� ����Ǵ� ���� ��� ������
	 * 	�ŷ���ȣ : $inipay->m_tid
	 * 	����ڵ� : $inipay->m_resultCode ("00"�̸� ���� ����)
	 * 	������� : $inipay->m_resultMsg (���Ұ���� ���� ����)
	 * 	���ҹ�� : $inipay->m_payMethod (�Ŵ��� ����)
	 * 	�����ֹ���ȣ : $inipay->m_moid
	 *	   �����Ϸ�ݾ� : $inipay->m_resultprice
	 *
	 * ���� �Ǵ� �ݾ� =>����ǰ���ݰ�  ��������ݾװ� ���Ͽ� �ݾ��� �������� �ʴٸ�
	 * ���� �ݾ��� �������� �ǽɵ����� �������� ó���� �����ʵ��� ó�� �ٶ��ϴ�. (�ش� �ŷ� ��� ó��) 																									*
	******************************************************************************************************************/
?>
<html>
<head>
<script>
	var openwin=window.open("/shop/INICIS/childwin.html","childwin","width=299,height=149");
	openwin.close();

	function show_receipt(tid) // ������ ���
	{
		if("<?php echo ($inipay->m_resultCode); ?>" == "00")
		{
			var receiptUrl = "https://iniweb.inicis.com/DefaultWebApp/mall/cr/cm/mCmReceipt_head.jsp?noTid=" + "<?php echo($inipay->m_tid); ?>" + "&noMethod=1";
			window.open(receiptUrl,"receipt","width=430,height=700");
		}
		else
		{
			alert("�ش��ϴ� ���������� �����ϴ�");
		}
	}

	function errhelp() // �� �������� ���
	{
		var errhelpUrl = "http://www.inicis.com/ErrCode/Error.jsp?result_err_code=" + "<?php echo($inipay->m_resulterrcode); ?>" + "&mid=" + "<?php echo($inipay->m_mid); ?>" + "&tid=<?php echo($inipay->m_tid); ?>" + "&goodname=" + "<?php echo($inipay->m_goodName); ?>" + "&price=" + "<?php echo($inipay->m_price); ?>" + "&paymethod=" + "<?php echo($inipay->m_payMethod); ?>" + "&buyername=" + "<?php echo($inipay->m_buyerName); ?>" + "&buyertel=" + "<?php echo($inipay->m_buyerTel); ?>" + "&buyeremail=" + "<?php echo($inipay->m_buyerEmail); ?>" + "&codegw=" + "<?php echo($inipay->m_codegw); ?>";
		window.open(errhelpUrl,"errhelp","width=520,height=150, scrollbars=yes,resizable=yes");
	}

</script>

<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
</head>
<body>
<?
if($inipay->m_resultCode=="00"){            //������ �����̸�
	 				////////////////////////////////////////////////////////////////////////////
				 	/////////////////////// �ֹ����� ������Ʈ //////////////////////////////////
				 	////////////////////////////////////////////////////////////////////////////

					$orderid = $inipay->m_moid; //�ֹ���ȣ �Ѿ�°�
					
					// �ֹ�����
					$sql = "SELECT * FROM wiz_order WHERE orderid='$inipay->m_moid'";
					$result = mysql_query($sql) or error(mysql_error());
					$order_info = mysql_fetch_object($result);

					$_Payment[status]		= "OY"; //��������
					if($order_info->pay_method == "PV" && $inipay->m_payMethod == "VBank"){
						$_Payment[status]		= "OR"; //��������
					}


					$_Payment[orderid]	= $inipay->m_moid; //�ֹ���ȣ
					$_Payment[paymethod]	= $order_info->pay_method; //��������
					$_Payment[ttno]		= $inipay->m_tid; //�ŷ���ȣ
					$_Payment[bankkind]	= $inipay->m_vcdbank; //�����ڵ�
					$_Payment[accountno]	= $inipay->m_vacct; //���¹�ȣ
					$_Payment[accountname]	= $inipay->m_nminput; //������
					$_Payment[pgname]		= "inicis";//PG�� ����
					$_Payment[es_check]	= $oper_info->pay_escrow;//����ũ�� ��뿩��
					$_Payment[es_stats]	= "IN";//����ũ�� ����(���������� �⺻���� �߼�)
					$_Payment[tprice]		=	$inipay->m_price; //�����ݾ�

					//foreach($_Payment as $key => $value){	$logs .="$key : $value\r";	}
					//@make_log("dacom_log.txt","\r----------order_update_vir.php start--------\r".$logs."\r-------order_update_vir.php start--------\r");

					//����ó��(���º���,�ֹ� ������Ʈ)
					Exe_payment($_Payment);
					// ������ ó�� : ������ ���� ������ ����
					Exe_reserve();
					// ���ó��(�����Ϸ�[OY]�� ��쿡�� ��� ����)
					if(!strcmp($_Payment[status], "OY")) Exe_stock();
					// ��ٱ��� ����
			    	Exe_delbasket();
					$resp = true;
					$resultMSG ="OK";



			$resp = true;
		}else { //������ �����̸�
			$orderid = $inipay->m_moid; //�ֹ���ȣ �Ѿ�°�
			$resp = true;
		}
?>
<form name="frm" action="/shop/order_ok.php" method="post">
<input type="hidden" name="orderid" value="<?=$orderid?>">
<input type="hidden" name="rescode" value="<?=$inipay->m_resultCode?>">
<input type="hidden" name="resmsg" value="<?=$inipay->m_resultMsg?>">
<input type="hidden" name="pay_method" value="<?=$pay_method?>">
</form>
<script>document.frm.submit();</script>