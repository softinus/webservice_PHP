<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">MD 관리</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">MD를 등록/수정 합니다.</td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td class="t_rd" colspan=6></td></tr>
	<tr class="t_th">
		<th width="8%">번호</td>
		<th>성명</td>
		<th width="20%">등록일</td>
		<th width="10%">기능</td>
	</tr>
	<tr><td class="t_rd" colspan=6></td></tr>
<?
$sql = "select count(idx) as total from wiz_md order by wdate desc";
$result = mysql_query($sql) or error(mysql_error());
$rs = mysql_fetch_array($result);
$total = $rs[total];

$rows = 12;
$lists = 5;

$page_count = ceil($total/$rows);
if($page < 1 || $page > $page_count) $page = 1;
$start = ($page-1)*$rows;
$no = $total-$start;

$sql = "select * from wiz_md order by wdate desc limit $start, $rows";
$result = mysql_query($sql) or error(mysql_error());

while(($row = mysql_fetch_array($result)) && $rows){
?>
	<tr align="center"> 
		<td height="30" align="center"><?=$no?></td>
		<td><?=$row[md_name]?></td>
		<td><?=$row[wdate]?></td>
		<td>
			<img src="../image/btn_edit_s.gif" style="cursor:hand" onclick="document.location='oneday_md_input.php?mode=update&idx=<?=$row[idx]?>'">
			<img src="../image/btn_delete_s.gif" style="cursor:hand" onclick="document.location.href='md_save.php?mode=delete&idx=<?=$row[idx]?>';">
		</td>
	</tr>
	<tr><td colspan="20" class="t_line"></td></tr>
<?
	$no--;
	$rows--;
}

if($total <= 0){
?>
	<tr><td height="30" colspan="10" align="center">등록된 MD가 없습니다.</td></tr>
	<tr><td colspan="20" class="t_line"></td></tr>
<?
}
?>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td height="5"></td></tr>
	<tr>
		<td width="33%"><img src="../image/btn_mdadd.gif" style="cursor:hand" onClick="document.location='oneday_md_input.php?sub_mode=insert';"></td>
		<td width="33%"><? print_pagelist($page, $lists, $page_count, ""); ?></td>
		<td width="33%"></td>
	</tr>
</table>
<? include "../footer.php"; ?>