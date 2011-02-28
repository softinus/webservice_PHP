<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<?
$param = "code=$code&title=$title&page=$page";

if(empty($mode)) $mode = "catinsert";

if(!strcmp($mode, "catupdate")) {
	$sql = "select * from wiz_bbscat where code = '$code' and idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$cat_info = mysql_fetch_array($result);
}
?>
<html>
<head>
<title>:: 카테고리관리 ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
<!--
function inputCheck(frm){
	
	if(frm.catname.value == ""){
		alert("분류명을 입력하세요.");
		frm.catname.focus();
		return false;
	}
}
//-->
</script>
</head>
<body>
<table width="100%" border="0" cellpadding=10 cellspacing=0>
<tr>
<td>
	
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td class="tit_sub"><img src="../image/ics_tit.gif"> 카테고리관리 : <?=$title?></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding=2 cellspacing=1 class="t_style">
<form name="frm" action="bbs_pro_save.php" method="post" enctype="multipart/form-data" onSubmit="return inputCheck(this);">
<input type="hidden" name="mode" value="<?=$mode?>">
<input type="hidden" name="code" value="<?=$code?>">
<input type="hidden" name="title" value="<?=$title?>">
<input type="hidden" name="idx" value="<?=$idx?>">
  <tr>
    <td height="30" width="20%" align=center class="t_name">분류</td>
    <td class="t_value">
    	<input type="checkbox" name="gubun" value="A" <? if(!strcmp($cat_info[gubun], "A")) { ?> checked <? } ?>> 전체분류
    </td>
  </tr>
  <tr>
    <td height="30" width="20%" align=center class="t_name">분류명</td>
    <td class="t_value">
    	<input type="text" name="catname" value="<?=$cat_info[catname]?>" class="input">	
    </td>
  </tr>
  <tr>
    <td height="30" align=center class="t_name">분류이미지</td>
    <td class="t_value">
    	<input type="file" name="catimg" class="input">	
    	
<? if(!empty($cat_info[catimg])) { ?>
			<br> <img src="/data/category/<?=$code?>/<?=$cat_info[catimg]?>">
			<input type="checkbox" name="delfile[]" value="catimg"> 삭제
<? } ?>

    </td>
  </tr>
  <tr>
    <td height="30" align=center class="t_name">롤오버이미지</td>
    <td class="t_value">
    	<input type="file" name="catimg_over" class="input">	
    	
<? if(!empty($cat_info[catimg_over])) { ?>
			<br> <img src="/data/category/<?=$code?>/<?=$cat_info[catimg_over]?>">
			<input type="checkbox" name="delfile[]" value="catimg_over"> 삭제
<? } ?>
    </td>
  </tr>
  <tr>
    <td height="30" align=center class="t_name">분류아이콘</td>
    <td class="t_value">
    	<input type="file" name="caticon" class="input">	
    	
<? if(!empty($cat_info[caticon])) { ?>
			<br> <img src="/data/category/<?=$code?>/<?=$cat_info[caticon]?>">
			<input type="checkbox" name="delfile[]" value="caticon"> 삭제
<? } ?>

    </td>
  </tr>
  
<? if(!strcmp($mode, "catupdate")) { ?>
  <tr>
    <td width="15%" height="30" align=center class="t_name">링크값</td>
    <td class="t_value">
    	파일명?category=<?=$cat_info[idx]?>
    </td>
  </tr>
<? } ?>

</table>

<br>※전체분류는 게시판의 특정 분류값이 아닌 "전체" 게시물을 보여주는 값입니다.

<table width="100%" border="0" cellpadding=0 cellspacing=0>
  <tr><td height="10"></td></tr>
  <tr>
    <td align="center" colspan="2">
      <input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
      <img src="../image/btn_list_l.gif" style="cursor:hand" onClick="document.location='category.php?<?=$param?>'">
    </td>
  </tr>
</form>
</table>

</td>
</tr>
</table>
</body>
</html>