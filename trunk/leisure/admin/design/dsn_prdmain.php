<? include "../../inc/common.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<html>
<head>
<title>:: 메인상품관리 ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
//-->
</script>
</head>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="8"><tr><td>

<?
$sql = "select * from wiz_prdmain where type='$grp'";
$result = mysql_query($sql) or error(mysql_error());
while($row = mysql_fetch_object($result)){
?>
<table width="675" border="0" cellspacing="0" cellpadding="0">
<form name="frm" action="dsn_save.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="tmp">
<input type="hidden" name="mode" value="prdmain">
<input type="hidden" name="grp" value="<?=$grp?>">
  <tr>
  	<td class="tit_sub"><img src="../image/ics_tit.gif"> <?=$row->typename?></td>
  </tr>
</table>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
        <tr> 
          <td width="15%" class="t_name">이벤트</td>
          <td width="85%" class="t_value">
          <textarea name="<?=$row->type?>_html" rows="10" cols="80" class="textarea" style="width:98%"><?=$row->html?></textarea>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table><br>
<table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
      <table width="700" border="0" cellspacing="1" cellpadding="2" class="t_style">
        <!--
        <tr> 
          <td width="150" class="t_name">사용여부</td>
          <td width="200" class="t_value">
          <input type="radio" name="<?=$row->type?>_isuse" value="Y" <? if($row->isuse == "Y" || $row->isuse == "") echo "checked"; ?> class="input">사용함 
          <input type="radio" name="<?=$row->type?>_isuse" value="N" <? if($row->isuse == "N") echo "checked"; ?> class="input">사용안함
          </td>
          <td width="150" class="t_name">진열순서</td>
          <td width="200" class="t_value">
          <select name="<?=$row->type?>_prior">
          <option value="1" <? if($row->prior == "1") echo "selected"; ?>>1
          <option value="2" <? if($row->prior == "2") echo "selected"; ?>>2
          <option value="3" <? if($row->prior == "3") echo "selected"; ?>>3
          <option value="4" <? if($row->prior == "4") echo "selected"; ?>>4
          </select>
          </td>
        </tr>
        -->
        <tr> 
        	<!--
          <td width="17%" class="t_name">정렬방식</td>
          <td width="33%" class="t_value">
          <select name="<?=$row->type?>_skin_type">
          <option value="type01" <? if($row->skin_type == "type01") echo "selected"; ?>>type01
          <option value="type02" <? if($row->skin_type == "type02") echo "selected"; ?>>type02
          <option value="type03" <? if($row->skin_type == "type03") echo "selected"; ?>>type03
          </select>
          </td>
          -->
          <td width="15%" class="t_name">가로상품수</td>
          <td width="35%" class="t_value"><input type="text" name="<?=$row->type?>_prd_row" value="<?=$row->prd_row?>" size="10" class="input">개</td>
          <td width="15%" class="t_name">전체상품수</td>
          <td width="35%" class="t_value"><input type="text" name="<?=$row->type?>_prd_num" value="<?=$row->prd_num?>" size="10" class="input">개</td>
        </tr>
        <tr> 
          <td class="t_name">상품사이즈</td>
          <td class="t_value" colspan="3">
          가로 <input type="text" name="<?=$row->type?>_prd_width" value="<?=$row->prd_width?>" size="9" class="input"> x 
          세로 <input type="text" name="<?=$row->type?>_prd_height" value="<?=$row->prd_height?>" size="9" class="input">
          &nbsp; 입력시 실제이미지 사이즈가 아닌 임으로 변경이 가능합니다.
          </td>
        </tr>
        <tr> 
          <td class="t_name">바이미지</td>
          <td class="t_value" colspan="3">
          <?
          if(is_file("../../data/mainimg/$row->barimg")) echo "<img src='/data/mainimg/$row->barimg' width='400'> <a href='dsn_save.php?mode=prdbar_delete&type=$row->type&file=$row->barimg'><font color=red>[삭제]</font></a><br>";
          ?>
          <input type="file" name="<?=$row->type?>_barimg" class="input">
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<?
}
?>

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
<br>

</td></tr></table>
</body>
</html>