<? include "../../inc/common.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../../inc/design_info.inc"; ?>
<html>
<head>
<title>:: 카테고리관리 ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function inputCheck(frm){
	/*
   if(frm.cate_img.value == ""){
      alert("파일을 선택하세요");
      return false;
   }
  */
}
//-->
</script>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="8"><tr><td>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td class="tit_sub"><img src="../image/ics_tit.gif"> 카테고리관리</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form name="frm" action="dsn_save.php" method="post" onSubmit="return inputCheck(this);" enctype="multipart/form-data">
<input type="hidden" name="tmp">
<input type="hidden" name="mode" value="cate">
  <tr>
    <td bgcolor="D5D3D3">
      <table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
        <tr> 
          <td width="30%" class="t_name">카테고리 이미지</td>
          <td width="70%" class="t_value">
          <?
	       if(is_file("../../data/mainimg/$design_info->cate_img")) echo "<img src=/data/mainimg/$design_info->cate_img> <a href='dsn_save.php?mode=cate_delete&file=$design_info->cate_img'><font color=red>[삭제]</font></a><br>";
	       ?>
	       <input type="file" name="cate_img" class="input">
          </td>
        </tr>
        <tr> 
          <td class="t_name">서브카테고리 출력</td>
          <td class="t_value">
	          <input type="radio" name="cate_sub" value="Y" <? if($design_info->cate_sub == "Y") echo "checked"; ?>>출력함 
	          <input type="radio" name="cate_sub" value="N" <? if($design_info->cate_sub == "N") echo "checked"; ?>>출력안함
          </td>
        </tr>
        <tr> 
          <td class="t_name">메뉴높이</td>
          <td class="t_value">
	          <input type="text" name="cate_menuh" value="<?=$design_info->cate_menuh?>" size="12" class="input"> 픽셀 
          </td>
        </tr>
        <tr> 
          <td class="t_name">가로좌표</td>
          <td class="t_value">
	          <input type="text" name="cate_subx" value="<?=$design_info->cate_subx?>" size="12" class="input"> 픽셀 
          </td>
        </tr>
        <tr> 
          <td class="t_name">세로좌표</td>
          <td class="t_value">
	          <input type="text" name="cate_suby" value="<?=$design_info->cate_suby?>" size="12" class="input"> 픽셀 
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