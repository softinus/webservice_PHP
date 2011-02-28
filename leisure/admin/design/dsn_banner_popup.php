<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<?
$sql = "select title from wiz_bannerinfo where name='$code'";
$result = mysql_query($sql) or error(mysql_error());
$banner_info = mysql_fetch_object($result);
?>
<html>
<head>
<title>:: 배너관리 ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function delContent(idx, ban_img){
   if(confirm('해당배너를 삭제하시겠습니까?')){
      document.location = "dsn_save.php?mode=ban_delete&code=<?=$code?>&popup=_popup&idx=" + idx + "&ban_img=" + ban_img;
   }
}
//-->
</script>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="8"><tr><td>
	
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td class="tit_sub"><img src="../image/ics_tit.gif"> <?=$banner_info->title?></td>
    <td align="right"><img src="../image/btn_banneradd.gif" style="cursor:hand" onClick="document.location='dsn_banner_input_popup.php?code=<?=$code?>'"></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr><td class="t_rd" colspan=20></td></tr>
	<tr class="t_th">
		<th width="10%">코드명</th>
    <th width="20%">이미지</th>
    <th width="20%">링크주소</th>
    <th width="15%">우선순위</th>
    <th width="15%">사용여부</th>
    <th width="15%">기능</th>
  </tr>
  <tr><td class="t_rd" colspan=20></td></tr>
	<?
	$sql = "SELECT idx FROM wiz_banner WHERE name='$code' ORDER BY align DESC, prior ASC, idx ASC";
	$result = mysql_query($sql) or error(mysql_error());
	$total = mysql_num_rows($result);
	
	$rows = 12;
	$lists = 5;
	$page_count = ceil($total/$rows);
	if($page < 1 || $page > $page_count) $page = 1;
	$start = ($page-1)*$rows;
	$no = $total-$start;
	
	$sql = "SELECT * FROM wiz_banner WHERE name='$code' ORDER BY align DESC, prior ASC, idx ASC LIMIT $start, $rows";
	$result = mysql_query($sql) or error(mysql_error());
	
	while(($row = mysql_fetch_object($result)) && $rows){
	   
	   if($row->isuse == "N") $row->isuse = "사용안함";
	   else $row->isuse = "사용함";

	?>
	<tr align="center"> 
		<td height="30" align="center"><?=$row->name?></td>
		<td>
		<?
			if($row->de_type == "IMG")
				echo "<img src=/data/banner/$row->de_img>";
		
			else
				echo "<table><tr><td>$row->de_html</td></tr></table>";
		?>
		</td>
    <td><?=$row->link_url?></td>
    <td><?=$row->prior?></td>
    <td><?=$row->isuse?></td>
    <td>
      <img src="../image/btn_edit_s.gif" style="cursor:hand" onclick="document.location='dsn_banner_input_popup.php?mode=ban_update&code=<?=$code?>&idx=<?=$row->idx?>&align=<?=$align?>'"> 
      <img src="../image/btn_delete_s.gif" style="cursor:hand" onclick="delContent('<?=$row->idx?>','<?=$row->de_img?>');">
    </td>
  </tr>
  <tr><td colspan="20" class="t_line"></td></tr>
	<?
		$no--;
	  $rows--;
	}
	  
	if($total <= 0){
	?>
	<tr><td colspan=10 align=center height=30>작성된 배너가 없습니다.</td></tr>
	<tr><td colspan="20" class="t_line"></td></tr>
	<?
	}
	?>
</table>

<br>
<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td><? print_pagelist($page, $lists, $page_count, "&code=$code"); ?></td>
  </tr>
</table>
  
<br><br><br>
  
</td>
</tr>
</table>

</body>
</html>