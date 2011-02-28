<? include "../../inc/common.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../../inc/design_info.inc"; ?>
<html>
<head>
<title>:: 로고관리 ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function inputCheck(frm){
   if(frm.logo_img.value == ""){
      alert("파일을 선택하세요");
      return false;
   }
}
//-->
</script>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="8"><tr><td>
	
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td class="tit_sub"><img src="../image/ics_tit.gif"> 로고관리</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form name="frm" action="dsn_save.php" method="post" onSubmit="return inputCheck(this);" enctype="multipart/form-data">
<input type="hidden" name="tmp">
<input type="hidden" name="mode" value="logo">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
        <tr> 
          <td width="25%" class="t_name">로고이미지</td>
          <td width="75%" class="t_value">
          <?
          if(is_file("../../data/mainimg/$design_info->logo_img")) echo "<img src=/data/mainimg/$design_info->logo_img> <a href='dsn_save.php?mode=logo_delete&file=$design_info->logo_img'> <font color=red>[삭제]</font></a><br>";
          ?>
          <input type="file" name="logo_img" class="input">
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>

<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">
      <input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
      <img src="../image/btn_close_l.gif" style="cursor:hand" onClick="self.close();">
    </td>
  </tr>
</form>
</table>

</td></tr></table>
</body>
</html>