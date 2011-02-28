<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<?
if($mode == "update"){
	$sql = "select * from wiz_option where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
}
?>
<html>
<head>
<title>:: 옵션항목 관리 ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="javascript">
<!--
function inputCheck(frm){
	if(frm.opttitle.value == ""){
		alert("옵션명을 입력하세요.");
		frm.opttitle.focus();
		return false;
	}
	if(frm.optcode.value == ""){
		alert("옵션항목을 입력하세요.");
		frm.optcode.focus();
		return false;
	}
}

//-->
</script>
</head>
<body>
<table width="100%" cellpadding="4"><tr><td>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td class="tit_sub"><img src="../image/ics_tit.gif"> 옵션설정</td>
  </tr>
</table>
<table width="100%" align="center" cellspacing="1" cellpadding="2" class="t_style">
<form name="frm" action="option_save.php" method="post" onSubmit="return inputCheck(this);">
<input type="hidden" name="mode" value="<?=$mode?>">
<input type="hidden" name="idx" value="<?=$idx?>">
  <tr>
    <td width="100" class="t_name" align="center">옵션명</td>
    <td class="t_value"><input type="text" size="32" name="opttitle" value="<?=$row->opttitle?>" class="input"></td>
  </tr>
  <tr>
    <td class="t_name" align="center">옵션항목</td>
    <td class="t_value">
    <textarea name="optcode" rows="10" cols="30"  class="textarea"><?=$row->optcode?></textarea><br>
    * 한줄에 하나의 옵션을 입력하세요
    </td>
  </tr>
</table>
<br>
<table align="center" border="0">
	<tr>
    <td>
      <input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
      <input type="image" src="../image/btn_close_l.gif" onClick="self.close();">
    </td>
  </tr>
</form>
</table>

</td></tr></table>
</body>
</html>