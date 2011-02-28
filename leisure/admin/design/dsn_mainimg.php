<? include "../../inc/common.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../../inc/design_info.inc"; ?>
<?
$main_ext = substr($design_info->main_img,-3);
if($main_ext == "gif" || $main_ext == "jpg" || $main_ext == "bmp"){
	$main_img = "<img src='/data/mainimg/$design_info->main_img' width='$design_info->main_width' height='$design_info->main_height' border='0'>";
	if($design_info->main_link != "")
		$main_img = "<a href='$design_info->main_link'>".$main_img."</a>";
}else if($main_ext == "swf"){
	$main_img = "
     <script language=javascript>
       msemb = new MS_Embed();
       msemb.init('/data/mainimg/$design_info->main_img','$design_info->main_width','$design_info->main_height');
       msemb.show();
     </script>
	";
}
?>
<html>
<head>
<title>:: 메인이미지 관리 ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript" src="/js/flash.js"></script>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="8"><tr><td>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td class="tit_sub"><img src="../image/ics_tit.gif"> 메인이미지 관리</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form name="frm" action="dsn_save.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="tmp">
<input type="hidden" name="mode" value="main_img">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
        <tr> 
          <td width="30%" class="t_name">메인이미지</td>
          <td width="70%" class="t_value">
          <?=$main_img?>
          <input type="file" name="main_img" class="input"><br>
          가로 <input type="text" name="main_width" value="<?=$design_info->main_width?>" size="9" class="input"> x 세로 <input type="text" name="main_height" value="<?=$design_info->main_height?>" size="9" class="input"><br>
          링크 <input type="text" name="main_link" value="<?=$design_info->main_link?>" size="50" class="input">
          
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