<? include "../../inc/common.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?
$sql = "select * from wiz_design";
$result = mysql_query($sql) or error(mysql_error());
$dsn_info = mysql_fetch_object($result);
?>

<script language="javascript">
<!--
function searchZip(){
	document.frm.com_address.focus();
	var url = "../member/search_zip.php?kind=com_";
	window.open(url,"searchZip","height=350, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, top=100, left=100");
}
-->
</script>

			<table border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td><img src="../image/ic_tit.gif"></td>
			    <td valign="bottom" class="tit">디자인기본설정</td>
			    <td width="2"></td>
			    <td valign="bottom" class="tit_alt">디자인기본설정</td>
			  </tr>
			</table>
			
      <br>
      <table width="100%" border="0" cellspacing="1" cellpadding="5" class="t_style">
      <form name="frm" action="dsn_save.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="tmp">
      <input type="hidden" name="mode" value="basic">
        <tr>
          <td width="15%" class="t_name">쇼핑몰정렬</td>
          <td width="85%" class="t_value">
          <input type="radio" name="site_align" value="LEFT" <? if($dsn_info->site_align == "LEFT" || $dsn_info->site_align == "") echo "checked"; ?>>좌측정렬&nbsp;
          <input type="radio" name="site_align" value="CENTER" <? if($dsn_info->site_align == "CENTER") echo "checked"; ?>>중앙정렬
          <input type="radio" name="site_align" value="RIGHT" <? if($dsn_info->site_align == "RIGHT") echo "checked"; ?>>우측정렬
          </td>
        </tr>
        <tr>
          <td class="t_name">전체배경색</td>
          <td class="t_value"><input type="text" name="site_bgcolor" value="<?=$dsn_info->site_bgcolor?>" class="input"></td>
        </tr>
        <tr>
          <td class="t_name">배경이미지</td>
          <td class="t_value">
          <input type="file" name="site_background" class="input">
          <?
          if(is_file("../../data/mainimg/$dsn_info->site_background"))
          	echo "<img src='../../data/mainimg/$dsn_info->site_background' height='20'> <a href='dsn_save.php?mode=back_delete'><font color='red'>[삭제]</font></a>";
          ?>
          </td>
        </tr>
      </table>

      <br>

      <!--
      <table width="100%" border="0" cellspacing="1" cellpadding="5" class="t_style">
        <tr>
          <td class="t_name">일반폰트색</td>
          <td class="t_value">
          <input type="text" name="site_font" value="<?=$dsn_info->site_font?>" class="input"></td>
        </tr>
        <tr>
          <td class="t_name">링크(link)색</td>
          <td class="t_value">
          <input type="text" name="site_link" value="<?=$dsn_info->site_link?>" class="input"></td>
        </tr>
        <tr>
          <td class="t_name">링크(active)색</td>
          <td class="t_value">
          <input type="text" name="site_active" value="<?=$dsn_info->site_active?>" class="input"></td>
        </tr>
        <tr>
          <td class="t_name">링크(hover)색</td>
          <td class="t_value">
          <input type="text" name="site_hover" value="<?=$dsn_info->site_hover?>" class="input"></td>
        </tr>
        <tr>
          <td class="t_name">링크(visited)색</td>
          <td class="t_value">
          <input type="text" name="site_visited" value="<?=$dsn_info->site_visited?>" class="input"></td>
        </tr>
      </table>

      <br>
      -->

      <table width="100%" border="0" cellspacing="1" cellpadding="5" class="t_style">
        <tr>
          <td width="15%" class="t_name">스타일시트</td>
          <td width="85%" class="t_value">
          <textarea name="dsn_css" rows="25" cols="112" class="textarea" style="width:100%">
          <?
          $f_line = file("../../wiz_style.css");
          for($ii=0; $ii<count($f_line);$ii++){
          	echo $f_line[$ii];
          }
          ?>
          </textarea>
          </td>
        </tr>
      </table>

      <br>
      <table align="center" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td>
          	<input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
          	<img src="../image/btn_cancel_l.gif" style="cursor:hand" onClick="history.go(-1);">
          </td>
        </tr>
      </form>
      </table>
      
<? include "../footer.php"; ?>