<?
////////////////////////////////////////////////////////////////////////////////////////////////////
//  mertkey Ȯ�� ���
//  1. ����������(����: http://pgweb.dacom.net  �׽�Ʈ: http://pgweb.dacom.net/tmert) ����
//  2. Dacom ���� ���� �׽�Ʈ ���̵� ���� ���̵�� �α���
//  3. ������� -> ������������ -> ����������� ���� Ȯ���� ����
////////////////////////////////////////////////////////////////////////////////////////////////////

if(!strcmp($oper_info->pay_test, "Y")) {
	$oper_info->pay_id = "tanywiz";
	$oper_info->pay_key = "6f51f77a2b2222d642e20e445101a35f";
}

$mid = $oper_info->pay_id;						//Dacom ���� �������̵�
$oid = $order_info->orderid;					//�ֹ���ȣ
$amount = $order_info->total_price;		//�����ݾ�
$mertkey = $oper_info->pay_key;				//�����޿��� �߱޹��� Ű��
$hashdata = md5($mid.$oid.$amount.$mertkey);

if($mid == "tanywiz") $test_port = ":7080";

// �ſ�ī�� ����
if($pay_method == "PC"){

	$pay_action = "http://pg.dacom.net".$test_port."/card/cardAuthAppInfo.jsp";

// ������ü
}else if($pay_method == "PN"){

	$pay_action = "http://pg.dacom.net".$test_port."/transfer/transferSelectBank.jsp";

// �������
}else if($pay_method == "PV"){

	$pay_action = "http://pg.dacom.net".$test_port."/cas/casRequestSA.jsp";

// �޴��� ����
}else if($pay_method == "PH"){

	$pay_action = "http://pg.dacom.net".$test_port."/wireless/wirelessAuthAppInfo1.jsp";

}
?>

<script language = 'javascript'>
<!--
function openWindow()
{
window.open("","Window","width=330, height=430, status=yes, scrollbars=no,resizable=yes, menubar=no");
document.mainForm.action="<?=$pay_action?>";
document.mainForm.target = "Window";
document.mainForm.submit();
}
//-->

</script>
<!--
        ******* �ʵ� *******
		 1. ������ ���� ���ܺ��� ��û������ ���̰� ���� �� ������ �ݵ�� �޴����� �����ϼż� ���������� �ϼž� �մϴ�.
		 2. ret_url �������� ��� ���� ������ Ȯ���ϴ� ������ �̹Ƿ� ���θ����� ���� �����ϼž� �մϴ�.
-->
<table border=0 cellpadding=0 cellspacing=0 width=100%>
<form name="mainForm" method="POST" action="">
<!-- ������ ���� �ʼ� hidden���� -->
<input type="hidden" name="hashdata" value="<?=$hashdata?>">		<!-- ������û ����(���Ἲ) �ʵ�-->
<input type="hidden" name="mid" value="<?=$mid?>">					<!-- ����ID -->
<input type="hidden" name="oid" value="<?=$oid?>">					<!-- �ֹ���ȣ -->
<input type="hidden" name="amount" value="<?=$amount?>">			<!-- �����ݾ� -->
<input type="hidden" name="ret_url" value="http://<?=$_SERVER["HTTP_HOST"]?>/shop/dacom/order_update.php">					<!-- �˾�â ���: ����URL -->
<input type="hidden" name="buyer" value="<?=$order_info->send_name?>">			<!-- ������ -->
<input type="hidden" name="productinfo" value="<?=$order_info->orderid?>">		<!-- ��ǰ�� -->
<input type="hidden" name="note_url" value="http://<?=$_SERVER["HTTP_HOST"]?>/shop/dacom/order_update.php">		<!-- ������� ����Ÿó��URL(�����ۿ������) -->
<input type="hidden" name="pay_method" value="<?=$pay_method?>">		<!-- wizshop ���� ��� -->
<input type="hidden" name="formflag" value="Y">		<!-- hidden �� �ٽ� ������ �ֵ��� ���� -->


<!-- ��輭�񽺸� ���� �������� hidden���� -->
<input type="hidden" name="producttype" value="<?=$order_info->orderid?>">
<input type="hidden" name="productcode" value="<?=$order_info->orderid?>">
<input type="hidden" name="buyerid" value="<?=$order_info->send_id?>">
<input type="hidden" name="buyeremail" value="<?=$order_info->send_email?>">
<input type="hidden" name="deliveryinfo" value="<?=$order_info->rece_address?>">
<input type="hidden" name="receiver" value="<?=$order_info->rece_name?>">
<input type="hidden" name="receiverphone" value="<?=$order_info->rece_hphone?>">

<!-- �Һΰ��� ����â ��� ���� �������� hidden���� -->
<input type="hidden" name="install_range" value="">									<!-- �Һΰ��� ����-->
<input type="hidden" name="install_fr" value="">										<!-- �Һΰ������� ����-->
<input type="hidden" name="install_to" value="">										<!-- �Һΰ������� ��-->

<!-- ������ �Һ�(������ �����δ�) ���θ� �����ϴ� hidden���� -->
<input type="hidden" name="noint_inf" value="���ù�����">
<input type="hidden" name="nointerest" value="0">


<!-- �ǽð� ������ü hidden ���� -->
<!--input type="hidden" name="pid" value=""-->
<input type="hidden" name="subMertName" value="">
<input type="hidden" name="subMertPhone" value="">
<input type="hidden" name="subMertBusinessNo" value="">
<input type="hidden" name="subMertRepresentativeName" value="">
<input type="hidden" name="taxFreeAmount" value="">
<input type="hidden" name="taxUseYN" value="Y">


<!-- ������� hidden ���� -->
<input type="hidden" name="close_date" value="">
<input type="hidden" name="subMertName" value="">
<input type="hidden" name="subMertPhone" value="">
<input type="hidden" name="subMertBusinessNo" value="">
<input type="hidden" name="subMertRepresentativeName" value="">
<input type="hidden" name="taxFreeAmount" value="">
<input type="hidden" name="taxUseYN" value="Y">

<!-- ����ũ�� ���� �Ķ���� ���� ���� -->
<input type=hidden name=escrow_good_id value='<?=$order_info->orderid?>'>
<input type=hidden name=escrow_good_name value='<?=$order_info->orderid?>'>
<input type=hidden name=escrow_good_code value='<?=$order_info->orderid?>'>
<input type=hidden name=escrow_unit_price value='<?=$order_info->total_price?>'>
<input type=hidden name=escrow_quantity value='1'>

<input type=hidden name=escrow_zipcode value='<?=$order_info->rece_post?>'>
<input type=hidden name=escrow_address1 value='<?=$order_info->rece_address?>' >
<input type=hidden name=escrow_address2 value='' >
<input type=hidden name=escrow_buyermobile value='<?=$order_info->rece_hphone?>' >

<input type=hidden name=escrowflag value='<?=$oper_info->pay_escrow?>'>
<!-- ����ũ�� ���� �Ķ���� ���� �� -->



  <tr>
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
						<?
						// ������ü�ΰ��
						if($pay_method == "PN"){
						?>
						<tr height=25>
						 <td><img src="/images/blue_icon.gif"></td>
						 <td width=100>�����ֹι�ȣ</td>
						 <td>: <input type="text" name="pid" value="<?=str_replace("-","",$mem_info->resno)?>" class="input"> &nbsp; <font color=red>('-' ������, ��ü�� ������ �ֹι�ȣ�� �����ؾ��մϴ�.)</font></td></tr>
						<?
					  }
					  ?>
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
	    <img src="/images/but_pay.gif" onclick="javascript:openWindow()" style="cursor:hand">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    <a href="/"><img src="/images/but_cancel.gif" border=0></a>
     </td>
  </tr>
</form>
</table>