<?
if(!strcmp($oper_info->pay_test, "Y")) {
	//$oper_info->pay_id = "INIpayTest";
	$oper_info->pay_id = "hanatest01";
	$oper_info->pay_key = "6f51f77a2b2222d642e20e445101a35f";
}
/////////////////////
//wiz_shopinfo �ε�//
/////////////////////
$shop_info = mysql_fetch_object(mysql_query("SELECT * FROM wiz_shopinfo"));

//�̴Ͻý� ���� �������̵� �� �׽�Ʈ ���̵� ����
$mid = $oper_info->pay_id;
$oid = $order_info->orderid;					//�ֹ���ȣ
$amount = $order_info->total_price;		//�����ݾ�

/////////////////
//������� ���//
/////////////////
switch($pay_method){
		case "PC"://�ſ�ī��
			$_paymethod = "onlycard";break;
		case "PN"://������ü
			$_paymethod = "onlydbank";break;
		case "PV"://�������
			$_paymethod = "onlyvbank";break;
			$_hidden_start2="";$_hidden_end2="";
		case "PH";//�޴���
			$_paymethod = "onlyhpp";
			$_hidden_start="";$_hidden_end="";
			break;
}
?>

<head>
<script language=javascript src="http://plugin.inicis.com/pay40.js"></script>

<script language=javascript>
StartSmartUpdate();
</script>

<!----------------------------------------------------------------------------------
�� ���� ��
 ��� �ڹٽ�ũ��Ʈ�� ������������ ���� �����ϽǶ� ���������� ������ ��ġ����
 �����Ͽ��� ���Ͽ� �߻��Ҽ� �ִ� �÷����� ������ �̿��� ������ �� �ֽ��ϴ�.

  <script language=javascript src="http://plugin.inicis.com/pay40.js"></script>
  <script language=javascript>
  StartSmartUpdate();	// �÷����� ��ġ(Ȯ��)
  </script>
----------------------------------------------------------------------------------->


<script language=javascript>

var openwin;

function pay(frm)
{
	// MakePayMessage()�� ȣ�������ν� �÷������� ȭ�鿡 ��Ÿ����, Hidden Field
	// �� ������ ä������ �˴ϴ�. �Ϲ����� ���, �÷������� ����ó���� �����ϴ� ����
	// �ƴ϶�, �߿��� ������ ��ȣȭ �Ͽ� Hidden Field�� ������ ä��� �����ϸ�,
	// ���� �������� INIsecurepay.php�� �����Ͱ� ����Ʈ �Ǿ� ���� ó������ �����Ͻñ� �ٶ��ϴ�.

	if(document.ini.clickcontrol.value == "enable")
	{

		if(document.INIpay == null || document.INIpay.object == null)  // �÷����� ��ġ���� üũ
		{
			alert("\n�̴����� �÷����� 128�� ��ġ���� �ʾҽ��ϴ�. \n\n������ ������ ���Ͽ� �̴����� �÷����� 128�� ��ġ�� �ʿ��մϴ�. \n\n�ٽ� ��ġ�Ͻ÷��� Ctrl + F5Ű�� �����ðų� �޴��� [����/���ΰ�ħ]�� �����Ͽ� �ֽʽÿ�.");
			return false;
		}
		else
		{

			/******
			 * �÷������� �����ϴ� ���� �����ɼ��� �̰����� ������ �� �ֽ��ϴ�.
			 * (�ڹٽ�ũ��Ʈ�� �̿��� ���� �ɼ�ó��)
			 */


			if (MakePayMessage(frm))
			{
				disable_click();
				openwin = window.open("/shop/INICIS/childwin.html","childwin","width=299,height=149");
				return true;
			}
			else
			{
				alert("������ ����ϼ̽��ϴ�.");
				return false;
			}
		}
	}
	else
	{
		return false;
	}
}


function enable_click()
{
	document.ini.clickcontrol.value = "enable"
}

function disable_click()
{
	document.ini.clickcontrol.value = "disable"
}

function focus_control()
{
	if(document.ini.clickcontrol.value == "disable")
		openwin.focus();
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

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
</head>
<body topmargin=0 leftmargin=0 rightmargin=0 bottommargin=0 onload="javascript:enable_click()" onFocus="javascript:focus_control()">
<table border=0 cellpadding=0 cellspacing=0 width=100%>
<form name=ini method=post action="./INICIS/order_update.php" onSubmit="return pay(this)">

<!--------------------------------------------------->
<!-- ������ ���� �⺻ ���� �Է� ��  ���� (��������)-->
<!--------------------------------------------------->
<input type=hidden name=pay_method value="<?=$pay_method?>">
<!-- ���� ���
Card:�ſ�ī�� ���� / VCard:���ͳݾ��� ���� / DirectBank:�ǽð� ���������ü / HPP:�ڵ��� ���� / PhoneBill:�޴���ȭ����
Ars1588Bill:1588 ��ȭ ���� / VBank:������ �Ա� / OCBPoint:OK ĳ��������Ʈ ���� / Culture:��ȭ��ǰ�� ���� / kmerce:K-merce ��ǰ�� ����
TeenCash:ƾĳ�� ���� / dgcl:���ӹ�ȭ ��ǰ�� ���� / BCSH:������ȭ ��ǰ�� ���� / OABK:�̴Ϲ�ũ ���� / onlycard" >�ſ�ī�� ����(����޴�)
onlyisp:���ͳݾ��� ���� (����޴�) / onlydbank:�ǽð� ���������ü (����޴�) / onlycid: �ſ�ī��/������ü/�������Ա�(����޴�)
onlyvbank:�������Ա�(����޴�) / onlyhpp: �ڵ��� ����(����޴�) / onlyphone: ��ȭ ����(����޴�) / onlyocb: OK ĳ���� ���� - ���հ��� �Ұ���(����޴�)
onlyocbplus: OK ĳ���� ����- ���հ��� ����(����޴�) / onlyculture: ��ȭ��ǰ�� ����(����޴�) / onlykmerce: K-merce ��ǰ�� ����(����޴�)
onlyteencash:ƾĳ�� ����(����޴�) / onlydgcl:���ӹ�ȭ ��ǰ�� ����(����޴�) / onlypoint:LGmyPoint / onlybcsh:������ȭ ��ǰ�� ����(����޴�)
onlyoabk:�̴Ϲ�ũ ����(����޴�) -->
<input type=hidden name=gopaymethod value="<?=$_paymethod?>">
<!-- ��ǰ�� -->
<input type=hidden name=goodname value="<?=$payment_prdname?>">
<!-- �ֹ��ݾ� -->
<input type=hidden name=price value="<?=$order_info->total_price?>">
<!-- �ֹ��ڸ� -->
<input type=hidden name=buyername value="<?=$order_info->send_name?>">
<!-- �ֹ��� email -->
<input type=hidden name=buyeremail value="<?=$order_info->send_email?>">
<!-- �ֹ��� ����ó -->
<input type=hidden name=buyertel value="<?=$order_info->send_hphone?>">
<!--
�������̵�.
�׽�Ʈ�� ��ģ ��, �߱޹��� ���̵�� �ٲپ� �ֽʽÿ�.
-->
<input type=hidden name=mid value="<?=$mid?>">
<!--
ȭ�����
WON �Ǵ� CENT
���� : ��ȭ������ ���� ����� �ʿ��մϴ�.
-->
<input type=hidden name=currency value="WON">
<!--
������ �Һ�
�����ڷ� �Һθ� ���� : yes
�������Һδ� ���� ����� �ʿ��մϴ�.
ī��纰,�Һΰ������� �������Һ� ������ �Ʒ��� ī���ҺαⰣ�� ���� �Ͻʽÿ�.
�������Һ� �ɼ� ������ �ݵ�� �Ŵ����� �����Ͽ� �ֽʽÿ�.
-->
<input type=hidden name=nointerest value="no">


<!--
ī���ҺαⰣ
�� ī��纰�� �����ϴ� �������� �ٸ��Ƿ� �����Ͻñ� �ٶ��ϴ�.

value�� ������ �κп� ī����ڵ�� �ҺαⰣ�� �Է��ϸ� �ش� ī����� �ش�
�Һΰ����� �������Һη� ó���˴ϴ� (�Ŵ��� ����).
-->
<input type=hidden name=quotabase value="����:�Ͻú�:3����:4����:5����:6����:7����:8����:9����:10����:11����:12����">


<!-- ��Ÿ���� -->
<!--
SKIN : �÷����� ��Ų Į�� ���� ��� - 6���� Į��(ORIGINAL, GREEN, ORANGE, BLUE, KAKKI, GRAY)
HPP : ������ �Ǵ� �ǹ� ���� ���ο� ���� HPP(1)�� HPP(2)�� ���� ����(HPP(1):������, HPP(2):�ǹ�).
Card(0): �ſ�ī�� ���ҽÿ� �̴Ͻý� ��ǥ �������� ��쿡 �ʼ������� ���� �ʿ� ( ��ü �������� ��쿡�� ī����� ��࿡ ���� ����) - �ڼ��� ������ �޴���  ����.
OCB : OK CASH BAG ���������� �ſ�ī�� �����ÿ� OK CASH BAG ������ �����Ͻñ� ���Ͻø� "OCB" ���� �ʿ� �� �ܿ� ��쿡�� �����ؾ� �������� ���� �̷����.
no_receipt : ���������ü�� ���ݿ����� ���࿩�� üũ�ڽ� ��Ȱ��ȭ (���ݿ����� �߱� ����� �Ǿ� �־�� ��밡��)
-->
<input type=hidden name=acceptmethod value="SKIN(ORIGINAL):HPP(1):OCB">


<!--
���� �ֹ���ȣ : �������Ա� ����(������� ��ü),��ȭ���� ���� �ʼ��ʵ�� �ݵ�� ������ �ֹ���ȣ�� �������� �߰��ؾ� �մϴ�.
�������� �߿� ���� ������ü �̿� �ÿ��� �ֹ� ��ȣ�� ��������� ��ȸ�ϴ� ���� �ʵ尡 �˴ϴ�.
���� �ֹ���ȣ�� �ִ� 40 BYTE �����Դϴ�.
-->
<input type=hidden name=oid size=40 value="<?=$oid?>">


<!--
�÷����� ���� ��� ���� �ΰ� �̹��� ���
�̹����� ũ�� : 90 X 34 pixels
�÷����� ���� ��ܿ� ���� �ΰ� �̹����� ����Ͻ� �� ������,
�ּ��� Ǯ�� �̹����� �ִ� URL�� �Է��Ͻø� �÷����� ��� �κп� ���� �̹����� �����Ҽ� �ֽ��ϴ�.
-->
<!--input type=hidden name=ini_logoimage_url  value="http://[����� �̹����ּ�]"-->

<!--
���� �����޴� ��ġ�� �̹��� �߰�
�̹����� ũ�� : ���� ���� ���� - 91 X 148 pixels, �ſ�ī��/ISP/������ü/������� - 91 X 96 pixels
���� �����޴� ��ġ�� �̹����� �߰��Ͻ� ���ؼ��� ��� ������ǥ���� ��뿩�� ����� �Ͻ� ��
�ּ��� Ǯ�� �̹����� �ִ� URL�� �Է��Ͻø� �÷����� ���� �����޴� �κп� �̹����� �����Ҽ� �ֽ��ϴ�.
-->
<!--input type=hidden name=ini_menuarea_url value="http://[����� �̹����ּ�]"-->
    <td style="padding:15 0 20 0">
		<table border=0 cellpadding=0 cellspacing=0 width=100%>
		<!--tr><td style="padding:0 0 5 0" valign=bottom><img src="/images/sett_t03.gif"></td></tr-->
		<tr><td height=3 bgcolor=#999999></td></tr>
		<tr><td bgcolor=#F9F9F9 style="padding:10">

			<table border=1 cellpadding=0 cellspacing=2 bgcolor=#ffffff bordercolor=#E1E1E1 width=100%>
			  <tr>
			    <td style="padding:5">
				   <table border=0 cellpadding=0 cellspacing=0>
					  <tr height=25>
						 <td><img src="/images/blue_icon.gif"></td>
						 <td width=100>�������</td>
						 <td>: <?=pay_method($pay_method)?></td></tr>
					  <tr height=25>
						 <td><img src="/images/blue_icon.gif"></td>
						 <td>�����ݾ�</td>
						 <td>: <span class="price"><?=number_format($order_info->total_price)?>��</span></td>
					  </tr>
					</table>
			    </td>
			  </tr>
			</table>

		</td></tr>
		</table>
    </td>
  </tr>
  <tr><td height=1 background="/images/dot.gif"></td></tr>
  <tr>
    <td height=80 align=center>
	    <input type=image src="/images/but_pay.gif" style="cursor:hand">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    <a href="/"><img src="/images/but_cancel.gif" border=0></a>
     </td>
  </tr>
<!--
�÷����ο� ���ؼ� ���� ä�����ų�, �÷������� �����ϴ� �ʵ��
����/���� �Ұ�
uid �ʵ忡 ����� ������ ���� ���� �ʵ��� �Ͻñ� �ٶ��ϴ�.
-->
<input type=hidden name=quotainterest value="">
<input type=hidden name=paymethod value="">
<input type=hidden name=cardcode value="">
<input type=hidden name=cardquota value="">
<input type=hidden name=rbankcode value="">
<input type=hidden name=reqsign value="DONE">
<input type=hidden name=encrypted value="">
<input type=hidden name=sessionkey value="">
<input type=hidden name=uid value="">
<input type=hidden name=sid value="">
<input type=hidden name=version value=4000>
<input type=hidden name=clickcontrol value="">
</form>
</table>