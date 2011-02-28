<? include "../../inc/common.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../../inc/design_info.inc"; ?>
<html>
<head>
<title>:: 하단주소 관리 ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="8"><tr><td>
	
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form name="frm" action="dsn_save.php" method="post" enctype="multipart/form-data" onSubmit="return inputCheck(this)">
<input type="hidden" name="tmp">
<input type="hidden" name="mode" value="footer">
  <tr>
  	<td class="tit_sub"><img src="../image/ics_tit.gif"> 하단주소 관리</td>
  </tr>
  <tr><td height="5"></td></tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<table width="100%" height="200" border="0" cellspacing="1" cellpadding="2" class="t_style">
<tr>
 <td class="t_value">
 <?
 $edit_height="200";
 $edit_content = $design_info->footer_html;
 include "../webedit/WIZEditor.html";
 ?>
 </td>
</tr>
</table>
</td>
</tr>
</table>

<br>
<table border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>
    	<input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
    	<img src="../image/btn_close_l.gif" style="cursor:hand" onClick="self.close();">
    </td>
  </tr>
</form>
</table>

</td></tr></table>
</body>
</html>