<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<?php
$sql = "select prdname from wiz_product where prdcode = '$prdcode'";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_array($result);

$prdname = $row[prdname];
?>
<html>
<head>
<title>:: ��ǰ������ �߱�ȸ�� ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="../../js/util_lib.js"></script>
<script language="JavaScript">
<!--
function deleteMycoupon(idx){
	if(confirm('�ش� ������ �����Ͻðڽ��ϱ�?')){
		document.location = "shop_save.php?mode=delmycoupon&prdcode=<?=$prdcode?>&idx=" + idx;
	}
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
    <td class="tit_sub"><img src="../image/ics_tit.gif"> ��ǰ��: <?=$prdname?></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td class="t_rd" colspan=20></td></tr>
  <tr class="t_th">
    <th width="5%" class="l_style" height="25">��ȣ</th>
    <th width="12%" class="l_style">ȸ���̸�</th>
    <th width="12%" class="l_style">ȸ�����̵�</th>
    <th width="25%" class="l_style">�Ⱓ</th>
    <th width="25%" class="l_style">�߱޽ð�</th>
    <th width="10%" class="l_style">��뿩��</th>
    <th width="10%" class="l_style">���</th>
  </tr>
  <tr><td class="t_rd" colspan=20></td></tr>
<?

	$sql = "select wc.idx from wiz_mycoupon wc, wiz_member wm where wc.prdcode='$prdcode' and wc.memid = wm.id";
	$result = mysql_query($sql) or error(mysql_error());
	$total = mysql_num_rows($result);

  $rows = 12;
  $lists = 5;
	$page_count = ceil($total/$rows);
	if($page < 1 || $page > $page_count) $page = 1;
	$start = ($page-1)*$rows;
	$no = $total-$start;

  $sql = "select wc.idx, wc.wdate, wc.coupon_use, wc.coupon_sdate, wc.coupon_edate, wm.id, wm.name from wiz_mycoupon wc, wiz_member wm where wc.prdcode='$prdcode' and wc.memid = wm.id order by wc.wdate desc";
  $result = mysql_query($sql) or error(mysql_error());

  while(($row = mysql_fetch_array($result)) && $rows){

?>
  <tr bgcolor=ffffff align=center>
	<td height="30"><?=$no?></td>
	<td><?=$row[name]?></td>
	<td><?=$row[id]?></td>
	<td><?=$row[coupon_sdate]?>~<?=$row[coupon_edate]?></td>
	<td><?=$row[wdate]?></td>
	<td><?=$row[coupon_use]?></td>
	<td><img src="../image/btn_delete_s.gif" style="cursor:hand" onClick="deleteMycoupon('<?=$row[idx]?>')">
  </tr>
  <tr><td colspan="20" class="t_line"></td></tr>
<?
		$no--;
		$rows--;
	}
	if($total <= 0){
?>
  <tr bgcolor=ffffff align=center><td height="35" colspan="11">�߱�ȸ���� �����ϴ�.</td></tr>
  <tr><td colspan="20" class="t_line"></td></tr>
<?
}
?>
</table>


<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
	<tr><td height="5"></td></tr>
  <tr>
    <td><? print_pagelist($page, $lists, $page_count, "&prdcode=$prdcode"); ?></td>
  </tr>
</table>

</td>
</tr>
</table>
</body>
</html>