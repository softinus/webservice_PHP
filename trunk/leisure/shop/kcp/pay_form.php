<?php
include "../inc/shop_info.inc";
if(!strcmp($oper_info->pay_test, "Y")) {
	$oper_info->pay_id = "T0007";
	$oper_info->pay_key = "3CRB7XHFjUp6fjf1FLEM.g6__";
}

if(!strcmp($oper_info->pay_id, "tanywiz") || !strcmp($oper_info->pay_id, "T0000") || !strcmp($oper_info->pay_id, "T0007")) {
	$oper_info->pay_id = "T0007";
	$oper_info->pay_key = "3CRB7XHFjUp6fjf1FLEM.g6__";
	$payplus = "http://pay.kcp.co.kr/plugin/payplus_test.js";
} else {
	$payplus = "http://pay.kcp.co.kr/plugin/payplus.js";
}
?>
<!--
    /* ============================================================================== */
    /* =   PAGE : ���� ���� PAGE                                                    = */
    /* = -------------------------------------------------------------------------- = */
    /* =   Copyright (c)  2006   KCP Inc.   All Rights Reserverd.                   = */
    /* ============================================================================== */
//-->
<html>
<head>
<title>*** KCP Online Payment System [Escrow PHP Version] ***</title>
<link href="css/sample.css" rel="stylesheet" type="text/css">

<script language='javascript' src='<?=$payplus?>'></script>
<!-- �� ����!!!
     �׽�Ʈ ������ : src='https://pay.kcp.co.kr/plugin/payplus_test.js'
     ����   ������ : src='https://pay.kcp.co.kr/plugin/payplus.js'     �� ������ �ֽñ� �ٶ��ϴ�. -->
<script language='javascript'>

    // �÷����� ��ġ(Ȯ��)
    StartSmartUpdate();

    function  jsf__pay( form )
    {
        if( document.Payplus.object == null )
        {
            openwin = window.open( '/shop/kcp/chk_plugin.html', 'chk_plugin', 'width=420, height=100, top=300, left=300' );
        }

        if ( MakePayMessage( form ) == true )
        {
            openwin = window.open( '/shop/kcp/proc_win.html', 'proc_win', 'width=420, height=100, top=300, left=300' );
            return  true;
        }
        else
        {
            return  false;
        }
    }


    // ����ũ�� ��ٱ��� ��ǰ �� ���� ���� ����
    function create_goodInfo()
    {
        var chr30 = String.fromCharCode(30);
        var chr31 = String.fromCharCode(31);

        var good_info = "seq=1" + chr31 + "ordr_numb=<?=$orderid?>" + chr31 + "good_name=<?=$payment_prdname?>" + chr31 + "good_cntx=1" + chr31 + "good_amtx=<?=$order_info->total_price?>";
        document.order_info.good_info.value = good_info;

    }
</script>
</head>
<body onLoad="create_goodInfo()">
<form name="order_info" action="/shop/kcp/order_update.php" method="post" onSubmit="return jsf__pay(this)">


<?
if($pay_method == "PC"){
   $pay_method = "100000000000";       // �ſ�ī��
   $pay_method_name = "�ſ�ī��";
}else if($pay_method == "PN"){
   $pay_method = "010000000000";       // ������ü
   $pay_method_name = "������ü";
}else if($pay_method == "PV"){
   $pay_method = "001000000000";       // �������
   $pay_method_name = "�������";
}else if($pay_method == "PH"){
   $pay_method = "000010000000";       // �޴���
   $pay_method_name = "�޴���";
}
?>
<input type="hidden" name="pay_method" value="<?=$pay_method?>">                           <!-- ������� -->
<input type='hidden' name='good_name' value='<?=$payment_prdname?>' size='30'>        <!-- ��ǰ�� -->
<input type='hidden' name='good_mny' value='<?=$order_info->total_price?>' size='10'>     <!-- �����ݾ� -->
<input type='hidden' name='buyr_name' value='<?=$order_info->send_name?>' size='20'>      <!-- �ֹ��ڸ� -->
<input type='hidden' name='buyr_mail' value='<?=$order_info->send_email?>' size='25'>     <!-- E-Mail -->
<input type='hidden' name='buyr_tel1' value='<?=$order_info->send_tphone?>' size='20'>    <!-- ��ȭ��ȣ -->
<input type='hidden' name='buyr_tel2' value='<?=$order_info->send_hphone?>' size='20'>    <!-- �޴�����ȣ -->
<input type='hidden' name='quotaopt' value='12'>                                          <!-- �Һοɼ� -->

<!-- ����ũ������ : ����ũ�� ����ü�� ����Ǵ� �����Դϴ�. -->
<input type='hidden' name='rcvr_name' value='<?=$order_info->rece_name?>' size='20'>      <!-- ������ �̸� -->
<input type='hidden' name='rcvr_tel1' value='<?=$order_info->rece_tphone?>' size='20'>    <!-- ������ ��ȭ��ȣ -->
<input type='hidden' name='rcvr_tel2' value='<?=$order_info->rece_hphone?>' size='20'>    <!-- ������ �޴�����ȣ -->
<input type='hidden' name='rcvr_mail' value='' size='40'>                                 <!-- ������ E-Mail -->
<input type='hidden' name='rcvr_zipx' value='<?=$order_info->rece_post?>' size='6'>       <!-- ������ �����ȣ -->
<input type='hidden' name='rcvr_add1' value='<?=$order_info->rece_address?>' size='50'>   <!-- ������ �ּ� -->
<input type='hidden' name='rcvr_add2' value='-' size='50'>                                <!-- ������ ���ּ� -->


<!-- �ʼ� �׸� -->
<!-- ��û���� ����(pay)/���,����(mod) ��û�� ��� -->
<input type='hidden' name='req_tx'    value='pay'>
<!-- �׽�Ʈ ������ : T0007 ���� ����, ���� ������ : �ο����� ����Ʈ�ڵ� �Է� -->
<input type='hidden' name='site_cd'   value='<?=$oper_info->pay_id?>'>

<!-- MPI ����â���� ��� �ѱ� ��� �Ұ� -->
<input type='hidden' name='site_name' value='<?=$shop_info->shop_name?>'>
<!-- http://testpay.kcp.co.kr/Pay/Test/site_key.jsp �� �����Ͻ��� �ο����� ����Ʈ�ڵ带 �Է��ϰ� ���� ���� �Է��Ͻñ� �ٶ��ϴ�. -->
<input type='hidden' name='site_key'  value='<?=$oper_info->pay_key?>'>

<!-- �ʼ� �׸� : PULGIN ���� ���� �������� ������ -->
<input type='hidden' name='module_type' value='01'>

<!-- �ʼ� �׸� : ���� �ݾ�/ȭ����� -->
<input type='hidden' name='currency' value='WON'>

<!-- �ֹ� ��ȣ (�ڹ� ��ũ��Ʈ ����(init_orderid()) ����) -->
<input type='hidden' name='ordr_idxx' value='<?=$order_info->orderid?>'>

<!-- ����ī�� �׽�Ʈ�� �Ķ���� (����ī�� �׽�Ʈ �ÿ��� �̿��Ͻñ� �ٶ��ϴ�.) -->
<!--input type='hidden' name='test_flag' value='T_TEST'//-->

<!-- ����ũ�� �׸� -->

<!-- ����ũ�� ��� ���� : �ݵ�� Y �� ���� -->
<input type='hidden' name='escw_used' value='Y'>

<!-- ����ũ�� ����ó�� ��� : ����ũ��: Y, �Ϲ�: N, KCP ���� ����: O -->
<input type='hidden' name='pay_mod' value='O'>

<!-- ��� �ҿ��� : ���� ��� �ҿ����� �Է� -->
<input type='hidden' name='deli_term' value='03'>

<!-- ��ٱ��� ��ǰ ���� : ��ٱ��Ͽ� ����ִ� ��ǰ�� ������ �Է� -->
<input type='hidden' name='bask_cntx' value='1'>

<!-- ��ٱ��� ��ǰ �� ���� (�ڹ� ��ũ��Ʈ ����(create_goodInfo()) ����) -->
<input type='hidden' name='good_info' value='<?=$order_info->orderid?>'>

<!-- �ʼ� �׸� : PLUGIN���� ���� �����ϴ� �κ����� �ݵ�� ���ԵǾ�� �մϴ�. �ؼ������� ���ʽÿ�.-->
<input type='hidden' name='res_cd'         value=''>
<input type='hidden' name='res_msg'        value=''>
<input type='hidden' name='tno'            value=''>
<input type='hidden' name='trace_no'       value=''>
<input type='hidden' name='enc_info'       value=''>
<input type='hidden' name='enc_data'       value=''>
<input type='hidden' name='ret_pay_method' value=''>
<input type='hidden' name='tran_cd'        value=''>
<input type='hidden' name='bank_name'      value=''>
<input type='hidden' name='bank_issu'      value=''>
<input type='hidden' name='use_pay_method' value=''>

<!-- ���ݿ����� ���� ���� : PLUGIN ���� �����޴� �����Դϴ� -->
<input type='hidden' name='cash_tsdtime'   value=''>
<input type='hidden' name='cash_yn'        value=''>
<input type='hidden' name='cash_authno'    value=''>


<table border=0 cellpadding=0 cellspacing=0 width=686>
  <tr>
    <td style="padding:15 0 20 0">
		<table border=0 cellpadding=0 cellspacing=0 width=100%>
		<tr><td style="padding:0 0 5 0" valign=bottom><img src="/images/sett_t03.gif"></td></tr>
		<tr><td height=3 bgcolor=#999999></td></tr>
		<tr><td bgcolor=#F9F9F9 style="padding:10">

			<table border=1 cellpadding=0 cellspacing=2 bgcolor=#ffffff bordercolor=#E1E1E1 width=100%>
			  <tr>
			    <td style="padding:5">
				   <table border=0 cellpadding=0 cellspacing=0>
					  <tr height=25>
						 <td><img src="/images/blue_icon.gif"></td>
						 <td width=100>��������</td>
						 <td>: <?=$pay_method_name?></td></tr>
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
  <tr><td height=80 align=center>
	<input type="image" src="/images/but_pay.gif" border=0></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="/"><img src="/images/but_cancel.gif" border=0></a>
   </td>
 </tr>
</form>
</table>