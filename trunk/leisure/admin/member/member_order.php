<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<html>
<head>
<title>:: <?=$name?>(<?=$id?>) ���� �ֹ����� ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
<!--
// �ֹ��󼼳��� ����
function orderView(orderid){
   var url = "/shop/order_view.php?orderid=" + orderid;
   window.open(url, "orderView", "height=640, width=671, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=0, top=0");
}
//-->
</script>
</head>
<body>
<table width="100%"cellpadding=6 cellspacing=0>
<tr>
<td>


<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td class="tit_sub"><img src="../image/ics_tit.gif"> <?=$name?>(<?=$id?>) ���� �ֹ�����</td>
  </tr>
</table>
<table width="100%"cellpadding=0 cellspacing=0>
	<tr><td class="t_rd" colspan="20"></td></tr>
  <tr class="t_th">
    <th>�ֹ�����</th>
    <th>�ֹ���ȣ</th>
    <th>�����ݾ�</th>
    <th>�������</th>
    <th>��ۻ���</th>
    <th>������ȣ</th>
    <th>�󼼺���</th>
  </tr>
  <tr><td class="t_rd" colspan="20"></td></tr>
	<?
		$sql = "select * from wiz_order where send_id = '$id' and status != '' order by order_date desc";
		$result = mysql_query($sql) or error(mysql_error());
		$total = mysql_num_rows($result);
		
		$rows = 12;
		$lists = 5;
		if(!$page) $page = 1;
		$page_count = ceil($total/$rows);
		$start = ($page-1)*$rows;
		if($start>1) mysql_data_seek($result,$start);
		
		while(($row = mysql_fetch_object($result)) && $rows){
	?>
  <tr bgcolor=ffffff align=center>
    <td height="30"><?=substr($row->order_date,0,10)?></td>
    <td><?=$row->orderid?></td>
    <td><?=number_format($row->total_price)?> ��</td>
    <td><?=pay_method($row->pay_method)?></td>
    <td><?=order_status($row->status)?></td>
    <td><?=$row->deliver_num?></td>
    <td><a href="javascript:orderView('<?=$row->orderid?>');"><img src="../image/btn_view_s.gif" border="0"></a></td>
  </tr>
  <tr><td colspan="20" class="t_line"></td></tr>
	<?
		$rows--;
	}
	if($total <= 0){
	?>
	  <tr bgcolor=ffffff align=center><td height="35" colspan="7">���ų����� �����ϴ�.</td></tr>
	  <tr><td colspan="20" class="t_line"></td></tr>
	<?
	}
	?>
</table>

<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
	<tr><td height="5"></td></tr>
  <tr><td><? print_pagelist($page, $lists, $page_count, "&id=$id"); ?></td></tr>
</table>

</td>
</tr>
</table>
</body>
</html>