<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">���޾�ü ����</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">���޾�ü�� ���/���� �մϴ�.</td>
	</tr>
</table>

<br>
<table width="100%" cellspacing="1" cellpadding="3" border="0" class="t_style">
	<form name="searchForm" action="<?=$PHP_SELF?>" method="get">
		<input type="hidden" name="page" value="<?=$page?>">
	<tr>
		<td width="15%" class="t_name">���ǰ˻�</td>
		<td class="t_value">
			<select name="keyfield" class="select">
				<option value='com_id'>:: ���̵� ::</option>
				<option value='company'>:: ��ü�� ::</option>
				<option value='bossname'>:: ��ǥ�� ::</option>
				<option value='com_no'>:: ����ڵ�Ϲ�ȣ ::</option>
				<option value='addr'>:: �ּ� ::</option>
				<option value='charge'>:: ����� ::</option>
				<option value='charge_tel'>:: ��ȭ��ȣ ::</option>
				<option value='charge_hp'>:: �޴��� ::</option>
				<option value='charge_fax'>:: �ѽ� ::</option>
				<option value='charge_email'>:: �̸��� ::</option>
			</select>
			<input type="text" name="keyword" value="<?=$keyword?>" class="input"/>
            <input type="image" src="../image/btn_search.gif" align="absmiddle"></td>
	</tr>
	</form>
</table>
<br>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td class="t_rd" colspan=8></td></tr>
	<tr class="t_th">
		<th width="8%">��ȣ</th>
		<th width="15%">���̵�</th>
		<th width="15%">���޾�ü��</th>
		<th width="10%">����ڸ�</th>
		<th width="12%">������޴���</th>
		<th width="15%">����������</th>
		<th width="15%">�����</th>
		<th width="10%">���</th>
	</tr>
	<tr><td class="t_rd" colspan=8></td></tr>
<?

if($keyword != ""){
	$search_sql = " where ".$keyfield." like '%".$keyword."%' ";
}

$sql = "select count(idx) as total from wiz_company $search_sql order by wdate desc";
$result = mysql_query($sql) or error(mysql_error());
$rs = mysql_fetch_array($result);
$total = $rs[total];

$rows = 12;
$lists = 5;

$page_count = ceil($total/$rows);
if($page < 1 || $page > $page_count) $page = 1;
$start = ($page-1)*$rows;
$no = $total-$start;

$sql = "select * from wiz_company $search_sql order by wdate desc limit $start, $rows";
$result = mysql_query($sql) or error(mysql_error());

while(($row = mysql_fetch_array($result)) && $rows){
?>
	<tr align="center"> 
		<td height="30" align="center"><?=$no?></td>
		<td><?=$row[com_id]?></td>
		<td><?=$row[company]?></td>
		<td><?=$row[charge]?></td>
		<td><?=$row[charge_hp]?></td>
		<td><?=$row[lastlog]?></td>
		<td><?=$row[wdate]?></td>
		<td>
			<img src="../image/btn_edit_s.gif" style="cursor:hand" onclick="document.location='oneday_com_input.php?mode=update&idx=<?=$row[idx]?>'">
			<img src="../image/btn_delete_s.gif" style="cursor:hand" onclick="document.location.href='company_save.php?mode=delete&idx=<?=$row[idx]?>';">
		</td>
	</tr>
	<tr><td colspan="20" class="t_line"></td></tr>
<?
	$no--;
	$rows--;
}

if($total <= 0){
?>
	<tr><td height="30" colspan="10" align="center">��ϵ� ���޾�ü�� �����ϴ�.</td></tr>
	<tr><td colspan="20" class="t_line"></td></tr>
<?
}
?>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td height="5"></td></tr>
	<tr>
		<td width="33%"><img src="../image/btn_comadd.gif" style="cursor:hand" onClick="document.location='oneday_com_input.php?sub_mode=insert';"></td>
		<td width="33%"><? print_pagelist($page, $lists, $page_count, ""); ?></td>
		<td width="33%"></td>
	</tr>
</table>
<? include "../footer.php"; ?>