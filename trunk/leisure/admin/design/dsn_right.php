<? include "../../inc/common.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../../inc/design_info.inc"; ?>
<html>
<head>
<title>:: 우측영역 ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<script language="JavaScript" type="text/JavaScript">
<!--
//-->
</script>
<link href="../style.css" rel="stylesheet" type="text/css">
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="8"><tr><td>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  	<td class="tit_sub"><img src="../image/ics_tit.gif"> 우측영역</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form name="frm" action="dsn_save.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="tmp">
<input type="hidden" name="mode" value="right_scroll">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
        <tr> 
          <td width="30%" class="t_name">따라다니기</td>
          <td width="70%" class="t_value">
          <input type="radio" name="right_scroll" value="Y" <? if($design_info->right_scroll == "Y") echo "checked"; ?>>사용함
          <input type="radio" name="right_scroll" value="N" <? if($design_info->right_scroll == "N") echo "checked"; ?>>사용안함
          </td>
        </tr>
        <tr> 
          <td class="t_name">상품갯수</td>
          <td class="t_value">
          <input type="text" name="right_prdcnt" value="<?=$design_info->right_prdcnt?>" size="12" class="input"> 개
          </td>
        </tr>
        <tr> 
          <td class="t_name">가로좌표</td>
          <td class="t_value">
          <input type="text" name="site_width" value="<?=$design_info->site_width?>" size="12" class="input"> 픽셀<br>
          (사이트 가로크기를 입력하세요.)
          </td>
        </tr>
        <tr> 
          <td class="t_name">세로좌표</td>
          <td class="t_value">
          <input type="text" name="right_starty" value="<?=$design_info->right_starty?>" size="12" class="input"> 픽셀<br>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr><td height="5"></td></tr>
  <tr>
    <td><font color=red>가로좌표 세로좌표는 사이트 중앙정렬시에만 필요합니다.</font></td>
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