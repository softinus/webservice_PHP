<? include "../../inc/common.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<?
$sql = "select title from wiz_bannerinfo where name='$code'";
$result = mysql_query($sql) or error(mysql_error());
$banner_info = mysql_fetch_object($result);

if($mode == ""){
	$mode = "ban_insert";
	$ban_info->align = $align;
}else if($mode == "ban_update"){
	$sql = "select * from wiz_banner where idx='$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$ban_info = mysql_fetch_object($result);
}


?>
<html>
<head>
<title>:: 배너관리 ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
<!--
function inputCheck(frm){
}
//-->
</script>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="8"><tr><td>


<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td class="tit_sub"><img src="../image/ics_tit.gif"> <?=$banner_info->title?></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
<form name="frm" action="dsn_save.php" method="post" onSubmit="return inputCheck(this)" enctype="multipart/form-data">
<input type="hidden" name="tmp">
<input type="hidden" name="mode" value="<?=$mode?>">
<input type="hidden" name="popup" value="_popup">
<input type="hidden" name="idx" value="<?=$idx?>">
  <tr> 
    <td width="15%" class="t_name">디자인방법</td>
    <td width="35%" class="t_value">&nbsp;
	    <select name="de_type">
	    <option value="IMG" <? if($ban_info->de_type == "IMG" || $ban_info->de_type == "") echo "selected"; ?>>이미지
	    <option value="HTML" <? if($ban_info->de_type == "HTML") echo "selected"; ?>>HTML
	    </select>
    </td>
    <td width="15%" class="t_name">사용여부</td>
    <td width="35%" class="t_value">&nbsp;
      <input type="radio" name="isuse" value="Y" size="80" class="input" <? if($ban_info->isuse == "Y" || $ban_info->align == "") echo "checked"; ?>> 사용함 &nbsp; 
      <input type="radio" name="isuse" value="N" size="80" class="input" <? if($ban_info->isuse == "N") echo "checked"; ?>> 사용안함
    </td>
  </tr>
  <tr> 
    <td class="t_name">코드명 <font color="red">*</font></td>
    <td class="t_value">&nbsp;
      <select name="name">
     <?
        $sql = "SELECT * FROM wiz_bannerinfo";
        $result = mysql_query($sql) or error(mysql_error());
        
        while(($row = mysql_fetch_object($result))){
     ?>
       <option value="<?=$row->name?>" <? if($row->name == $code) echo "selected"; ?>><?=$row->name?>
     <?
        }
     ?>
      </select>
    </td>
    <td height="30" class="t_name">우선순위</td>
    <td class="t_value">&nbsp;
    <select name="prior">
    <option value="1" <? if($ban_info->prior == "1") echo "selected"; ?>>1
    <option value="2" <? if($ban_info->prior == "2") echo "selected"; ?>>2
    <option value="3" <? if($ban_info->prior == "3") echo "selected"; ?>>3
    <option value="4" <? if($ban_info->prior == "4") echo "selected"; ?>>4
    <option value="5" <? if($ban_info->prior == "5") echo "selected"; ?>>5
    <option value="6" <? if($ban_info->prior == "6") echo "selected"; ?>>6
    <option value="7" <? if($ban_info->prior == "7") echo "selected"; ?>>7
    <option value="8" <? if($ban_info->prior == "8") echo "selected"; ?>>8
    <option value="9" <? if($ban_info->prior == "9") echo "selected"; ?>>9
    <option value="10" <? if($ban_info->prior == "10") echo "selected"; ?>>10
    <option value="11" <? if($ban_info->prior == "11") echo "selected"; ?>>11
    <option value="12" <? if($ban_info->prior == "12") echo "selected"; ?>>12
    <option value="13" <? if($ban_info->prior == "13") echo "selected"; ?>>13
    <option value="14" <? if($ban_info->prior == "14") echo "selected"; ?>>14
    <option value="15" <? if($ban_info->prior == "15") echo "selected"; ?>>15
    <option value="16" <? if($ban_info->prior == "16") echo "selected"; ?>>16
    <option value="17" <? if($ban_info->prior == "17") echo "selected"; ?>>17
    <option value="18" <? if($ban_info->prior == "18") echo "selected"; ?>>18
    <option value="19" <? if($ban_info->prior == "19") echo "selected"; ?>>19
    <option value="20" <? if($ban_info->prior == "20") echo "selected"; ?>>20
    </select>
    </td>
  </tr>
  <tr> 
    <td class="t_name">링크주소</td>
    <td width="550" class="t_value" colspan="3">
    <input type="text" name="link_url" value="<?=$ban_info->link_url?>" size="60" class="input"> &nbsp; 
    <input type="checkbox" name="link_target" value="_BLANK" <? if($ban_info->link_target == "_BLANK") echo "checked"; ?>> 새창으로 
    </td>
  </tr>
  <tr> 
    <td class="t_name">배너이미지</td>
    <td width="550" class="t_value" colspan="3">
    <?
    if($ban_info->de_img != "") echo "<img src='/data/banner/$ban_info->de_img'><br>";
    ?>
    <input type="file" name="de_img" class="input">
    </td>
  </tr>
  <tr>
    <td class="t_name">배너내용</td>
    <td class="t_value" colspan="3">
    <?
    $edit_content = $ban_info->de_html;
    $edit_height = "200";
    include "../webedit/WIZEditor.html";
    ?>
    </td>
  </tr>
</table>

<br>
<table align="center" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
    	<input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
    	<img src="../image/btn_list_l.gif" style="cursor:hand" onClick="document.location='dsn_banner_popup.php?code=<?=$code?>';">
    </td>
  </tr>
</form>
</table>


</td></tr></table>

</body>
</html>