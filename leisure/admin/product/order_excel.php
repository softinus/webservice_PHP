<?
if($exceldown != "ok"){
?>
<html>
<head>
<title>:: �ֹ����� �ٿ�ε� ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function selBasic(frm){

	frm.orderid.checked = true;
	frm.orderprd.checked = true;
	frm.total_price.checked = true;
	frm.pay_method.checked = true;
	frm.order_date.checked = true;
	frm.account.checked = true;
	frm.deliver_num.checked = false;
	frm.account_name.checked = false;
	frm.ostatus.checked = true;

	frm.send_name.checked = true;
	frm.send_email.checked = false;
	frm.send_tphone.checked = true;
	frm.send_hphone.checked = false;
	frm.send_post.checked = false;
	frm.send_address.checked = false;

	frm.rece_name.checked = true;
	frm.rece_tphone.checked = true;
	frm.rece_hphone.checked = false;
	frm.rece_post.checked = true;
	frm.rece_address.checked = true;
	frm.demand.checked = false;

}

function selAll(frm){

	frm.orderid.checked = true;
	frm.orderprd.checked = true;
	frm.total_price.checked = true;
	frm.pay_method.checked = true;
	frm.order_date.checked = true;
	frm.account.checked = true;
	frm.deliver_num.checked = true;
	frm.account_name.checked = true;
	frm.ostatus.checked = true;
	frm.descript.checked = true;

	frm.send_name.checked = true;
	frm.send_email.checked = true;
	frm.send_tphone.checked = true;
	frm.send_hphone.checked = true;
	frm.send_post.checked = true;
	frm.send_address.checked = true;

	frm.rece_name.checked = true;
	frm.rece_tphone.checked = true;
	frm.rece_hphone.checked = true;
	frm.rece_post.checked = true;
	frm.rece_address.checked = true;
	frm.demand.checked = true;
	frm.cancelmsg.checked = true;

}
//-->
</script>
</head>

<body leftmargin="5" topmargin="5">
<table><tr><td height="5"></td></tr></table>
<table width="98%" border="0" cellpadding="3" cellspacing="6" class="t_style" align="center">
<form name="frm" action="" method="post">
<input type="hidden" name="exceldown" value="ok">
<input type="hidden" name="status" value="<?=$status?>">
<input type="hidden" name="prev_year" value="<?=$prev_year?>">
<input type="hidden" name="prev_month" value="<?=$prev_month?>">
<input type="hidden" name="prev_day" value="<?=$prev_day?>">
<input type="hidden" name="next_year" value="<?=$next_year?>">
<input type="hidden" name="next_month" value="<?=$next_month?>">
<input type="hidden" name="next_day" value="<?=$next_day?>">
<input type="hidden" name="searchopt" value="<?=$searchopt?>">
<input type="hidden" name="searchkey" value="<?=$searchkey?>">
  <tr>
    <td bgcolor="ffffff">
    <table><tr></td></tr></table>
     <table width="100%" cellspacing="2" cellpadding="0" border="0">
     <tr>
      <td><font color="2369C9"><b>���ñ���</b></font></td>
      <td><input type="radio" name="sel_gubun" onClick="selBasic(this.form);" checked><font color="red"><b>�⺻����</b></font></td>
		  <td><input type="radio" name="sel_gubun" onClick="selAll(this.form);"><font color="red"><b>��ü����</b></font></td>
		  <td></td>
		  <td></td>
		</tr>
		<tr><td height="3"></td></tr>
    <tr>
      <td><font color="2369C9"><b>�ֹ�����</b></font></td>
      <td><input type="checkbox" name="orderid" value="Y" checked>�ֹ���ȣ</td>
		  <td><input type="checkbox" name="orderprd" value="Y" checked>�ֹ���ǰ</td>
		  <td><input type="checkbox" name="total_price" value="Y" checked>�Ѱ����ݾ�</td>
		  <td><input type="checkbox" name="pay_method" value="Y" checked>�������</td>
		</tr>
		<tr>
		  <td></td>
		  <td><input type="checkbox" name="order_date" value="Y" checked>�ֹ�����</td>
		  <td><input type="checkbox" name="account" value="Y" checked>��������</td>
		  <td><input type="checkbox" name="deliver_num" value="Y">������ȣ</td>
		  <td><input type="checkbox" name="account_name" value="Y" checked>�Ա���</td>
		</tr>
		<tr>
		  <td></td>
		  <td><input type="checkbox" name="ostatus" value="Y" checked>ó������</td>
		  <td><input type="checkbox" name="descript" value="Y">�����ڸ޸�</td>
		  <td></td>
		  <td></td>
	   </tr>
	   <tr><td height="3"></td></tr>
		<tr>
		  <td><font color="2369C9"><b>�ֹ�������</b></font></td>
			<td><input type="checkbox" name="send_name" value="Y" checked>�ֹ��ڸ�</td>
			<td><input type="checkbox" name="send_email" value="Y">�ֹ��� �̸���</td>
			<td><input type="checkbox" name="send_tphone" value="Y" checked>�ֹ��� ��ȭ��ȣ</td>
			<td><input type="checkbox" name="send_hphone" value="Y">�ֹ��� �޴���</td>
		</tr>
		<tr>
		  <td></td>
		  <td><input type="checkbox" name="send_post" value="Y">�ֹ��� �����ȣ</td>
		  <td><input type="checkbox" name="send_address" value="Y">�ֹ��� �ּ�</td>
		  <td></td>
		  <td></td>
	   </tr>
	   <tr><td height="6"></td></tr>
		<tr>
		  <td><font color="2369C9"><b>����������</b></font></td>
			<td><input type="checkbox" name="rece_name" value="Y" checked>�����θ�</td>
			<td><input type="checkbox" name="rece_tphone" value="Y" checked>������ ��ȭ��ȣ</td>
			<td><input type="checkbox" name="rece_hphone" value="Y">������ �޴���</td>
			<td><input type="checkbox" name="rece_post" value="Y" checked>������ �����ȣ</td>
    </tr>
    <tr>
      <td></td>
      <td><input type="checkbox" name="rece_address" value="Y" checked>�������ּ�</td>
		  <td><input type="checkbox" name="demand" value="Y">�����ο�û����</td>
		  <td><input type="checkbox" name="cancelmsg" value="Y">�ֹ���һ���</td>
      <td></td>
      <td></td>
      </tr>
    </table>
   </td>
 </tr>
</table>
<br>
<table align="center">
  <tr>
    <td>
    	<input type="image" src="../image/btn_confirm_l.gif"> &nbsp;
    	<img src="../image/btn_close_l.gif" style="cursor:hand" onClick="self.close();">
    </td>
  </tr>
</form>
</table>
</body>
</html>
<?
}else{

	include "../../inc/common.inc";
	include "../../inc/util.inc";

	$filename = "�ֹ�����[".date('Ymd')."].xls";

	header( "Content-type: application/vnd.ms-excel" );
	header( "Content-Disposition: attachment; filename=$filename" );
	header( "Content-Description: PHP4 Generated Data" );

	if($prev_year){
	   $prev_period = $prev_year."-".$prev_month."-".$prev_day;
	   $next_period = $next_year."-".$next_month."-".$next_day." 23:59:59";
	   $period_sql = " and wo.order_date >= '$prev_period' and wo.order_date <= '$next_period'";
	}
	if($s_status == "") $status_sql = "and wo.status != ''";
	else if($s_status == "MI") $status_sql = "and wo.status = ''";
	else $status_sql = "and wo.status = '$s_status'";

	if($searchopt && $searchkey) $searchopt_sql = " and wo.$searchopt like '%$searchkey%'";

	$sql = "select wo.*, wb.amount, wp.prdname from wiz_order wo, wiz_basket wb, wiz_product wp where wo.orderid = wb.orderid and wb.prdcode = wp.prdcode $status_sql 				$period_sql $searchopt_sql order by orderid desc";
	//echo $sql;
	$result = mysql_query($sql) or error(mysql_error());
	$total = mysql_num_rows($result);

	if($orderid == "Y") $excel_title .= "�ֹ���ȣ	";
	if($orderprd == "Y") $excel_title .= "�ֹ���ǰ	";
	if($total_price == "Y") $excel_title .= "�Ѱ����ݾ�	";
	if($pay_method == "Y") $excel_title .= "�������	";
	if($order_date == "Y") $excel_title .= "�ֹ�����	";
	if($account == "Y") $excel_title .= "��������	";
	if($deliver_num == "Y") $excel_title .= "������ȣ	";
	if($account_name == "Y") $excel_title .= "�Ա���	";

	if($send_name == "Y") $excel_title .= "�ֹ��ڸ�	";
	if($send_email == "Y") $excel_title .= "�ֹ��� �̸���	";
	if($send_tphone == "Y") $excel_title .= "�ֹ��� ��ȭ��ȣ	";
	if($send_hphone == "Y") $excel_title .= "�ֹ��� �޴���	";
	if($send_post == "Y") $excel_title .= "�ֹ��� �����ȣ	";
	if($send_address == "Y") $excel_title .= "�ֹ��� �ּ�	";

	if($rece_name == "Y") $excel_title .= "�����θ�	";
	if($rece_tphone == "Y") $excel_title .= "������ ��ȭ��ȣ	";
	if($rece_hphone == "Y") $excel_title .= "������ �޴���	";
	if($rece_post == "Y") $excel_title .= "������ �����ȣ	";
	if($rece_address == "Y") $excel_title .= "�������ּ�	";

	if($demand == "Y") $excel_title .= "��û����	";
	if($cancelmsg == "Y") $excel_title .= "�ֹ���һ���	";
	if($descript == "Y") $excel_title .= "�����ڸ޸�	";
	if($ostatus == "Y") $excel_title .= "ó������	";

	echo $excel_title."\n";

	$prdname = "";
	$orderid_tmp = "";
	while($row = mysql_fetch_object($result)){

		if($row_tmp->prdname != "") $prdname .= $row_tmp->prdname."[".$row_tmp->amount."��]:::";

		if($orderid_tmp != $row->orderid){

			if($orderid_tmp != ""){

				$row_tmp->account = str_replace("\r\n", " ", trim($row_tmp->account));
				$row_tmp->deliver_num = str_replace("\r\n", " ", trim($row_tmp->deliver_num));
				$row_tmp->account_name = str_replace("\r\n", " ", trim($row_tmp->account_name));

				$row_tmp->demand = str_replace("\n", " ", $row_tmp->demand);
				$row_tmp->cancelmsg = str_replace("\n", " ", $row_tmp->cancelmsg);
				$row_tmp->descript = str_replace("\n", " ", $row_tmp->descript);

				$excel_data = "";
				if($orderid == "Y") $excel_data .= $row_tmp->orderid."	";
				if($orderprd == "Y") $excel_data .= $prdname."	";
				if($total_price == "Y") $excel_data .= number_format($row_tmp->total_price)."��"."	";
				if($pay_method == "Y") $excel_data .= pay_method($row_tmp->pay_method)."	";
				if($order_date == "Y") $excel_data .= $row_tmp->order_date."	";
				if($account == "Y") $excel_data .= $row_tmp->account."	";
				if($deliver_num == "Y") $excel_data .= $row_tmp->deliver_num."	";
				if($account_name == "Y") $excel_data .= $row_tmp->account_name."	";

				if($send_name == "Y") $excel_data .= $row_tmp->send_name."	";
				if($send_email == "Y") $excel_data .= $row_tmp->send_email."	";
				if($send_tphone == "Y") $excel_data .= $row_tmp->send_tphone."	";
				if($send_hphone == "Y") $excel_data .= $row_tmp->send_hphone."	";
				if($send_post == "Y") $excel_data .= $row_tmp->send_post."	";
				if($send_address == "Y") $excel_data .= $row_tmp->send_address."	";

				if($rece_name == "Y") $excel_data .= $row_tmp->rece_name."	";
				if($rece_tphone == "Y") $excel_data .= $row_tmp->rece_tphone."	";
				if($rece_hphone == "Y") $excel_data .= $row_tmp->rece_hphone."	";
				if($rece_post == "Y") $excel_data .= $row_tmp->rece_post."	";
				if($rece_address == "Y") $excel_data .= $row_tmp->rece_address."	";

				if($demand == "Y") $excel_data .= $row_tmp->demand."	";
				if($cancelmsg == "Y") $excel_data .= $row_tmp->cancelmsg."	";
				if($descript == "Y") $excel_data .= $row_tmp->descript."	";
				if($ostatus == "Y") $excel_data .= order_status($row_tmp->status)."	";

				echo $excel_data."\n";
				$prdname = "";

			}

		}

		$row_tmp = $row;
		$orderid_tmp = $row->orderid;

	}

	$prdname .= $row_tmp->prdname."[".$row_tmp->amount."��]:::";

	$row_tmp->account = str_replace("\r\n", " ", trim($row_tmp->account));
	$row_tmp->deliver_num = str_replace("\r\n", " ", trim($row_tmp->deliver_num));
	$row_tmp->account_name = str_replace("\r\n", " ", trim($row_tmp->account_name));

	$row_tmp->demand = str_replace("\n", " ", $row_tmp->demand);
	$row_tmp->cancelmsg = str_replace("\n", " ", $row_tmp->cancelmsg);
	$row_tmp->descript = str_replace("\n", " ", $row_tmp->descript);

	$excel_data = "";
	if($orderid == "Y") $excel_data .= $row_tmp->orderid."	";
	if($orderprd == "Y") $excel_data .= $prdname."	";
	if($total_price == "Y") $excel_data .= number_format($row_tmp->total_price)."��"."	";
	if($pay_method == "Y") $excel_data .= pay_method($row_tmp->pay_method)."	";
	if($order_date == "Y") $excel_data .= $row_tmp->order_date."	";
	if($account == "Y") $excel_data .= $row_tmp->account."	";
	if($deliver_num == "Y") $excel_data .= $row_tmp->deliver_num."	";
	if($account_name == "Y") $excel_data .= $row_tmp->account_name."	";

	if($send_name == "Y") $excel_data .= $row_tmp->send_name."	";
	if($send_email == "Y") $excel_data .= $row_tmp->send_email."	";
	if($send_tphone == "Y") $excel_data .= $row_tmp->send_tphone."	";
	if($send_hphone == "Y") $excel_data .= $row_tmp->send_hphone."	";
	if($send_post == "Y") $excel_data .= $row_tmp->send_post."	";
	if($send_address == "Y") $excel_data .= $row_tmp->send_address."	";

	if($rece_name == "Y") $excel_data .= $row_tmp->rece_name."	";
	if($rece_tphone == "Y") $excel_data .= $row_tmp->rece_tphone."	";
	if($rece_hphone == "Y") $excel_data .= $row_tmp->rece_hphone."	";
	if($rece_post == "Y") $excel_data .= $row_tmp->rece_post."	";
	if($rece_address == "Y") $excel_data .= $row_tmp->rece_address."	";

	if($demand == "Y") $excel_data .= $row_tmp->demand."	";
	if($cancelmsg == "Y") $excel_data .= $row_tmp->cancelmsg."	";
	if($descript == "Y") $excel_data .= $row_tmp->descript."	";
	if($ostatus == "Y") $excel_data .= order_status($row_tmp->status)."	";

	echo $excel_data."\n";

}
?>