<? include "../../inc/common.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../../inc/design_info.inc"; ?>
<html>
<head>
<title>:: 공지사항관리 ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function inputCheck(frm){
   if(frm.notice_rows.value == ""){
      alert("게시물수를 입력하세요");
      frm.notice_rows.focus();
      return false;
   }
   if(frm.notice_cut.value == ""){
      alert("글자수제한을 입력하세요");
      frm.notice_cut.focus();
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
    <td class="tit_sub"><img src="../image/ics_tit.gif"> 공지사항관리</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form name="frm" action="dsn_save.php" method="post" onSubmit="return inputCheck(this);" enctype="multipart/form-data">
<input type="hidden" name="tmp">
<input type="hidden" name="mode" value="main_notice">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
        <tr> 
          <td width="30%" class="t_name">공지사항이미지</td>
          <td width="70%" class="t_value">
          <?
          if(is_file("../../data/mainimg/$design_info->notice_img")) echo "<img src=/data/mainimg/$design_info->notice_img> <a href='dsn_save.php?mode=logo_delete&file=$design_info->notice_img'> <font color=red>[삭제]</font></a><br>";
          ?>
          <input type="file" name="notice_img" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">게시물수</td>
          <td class="t_value">
          <input type="text" name="notice_rows" value="<?=$design_info->notice_rows?>" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">글자수제한</td>
          <td class="t_value">
          <input type="text" name="notice_cut" value="<?=$design_info->notice_cut?>" class="input">
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