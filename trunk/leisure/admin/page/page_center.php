<? include "../../inc/common.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?
$type = "center";
$sql = "select * from wiz_page where type='$type'";
$result = mysql_query($sql) or error(mysql_error());
$page_info = mysql_fetch_object($result);
?>

			<table border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td><img src="../image/ic_tit.gif"></td>
			    <td valign="bottom" class="tit">고객센터</td>
			    <td width="2"></td>
			    <td valign="bottom" class="tit_alt">고객센터 페이지를 설정합니다.</td>
			  </tr>
			</table>
			
      <br>
      <table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
      <form name="frm" action="page_save.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="tmp">
      <input type="hidden" name="mode" value="update">
      <input type="hidden" name="type" value="<?=$type?>">
      <input type="hidden" name="page" value="page_center.php">
        <tr> 
         <td width="15%" class="t_name">상단이미지</td>
         <td width="85%" class="t_value">
          <?
          if($page_info->subimg != "") echo "<img src='/data/subimg/$page_info->subimg' width='500'> <a href='page_save.php?mode=delimg&type=$type&subimg=$page_info->subimg'><font color='red'>[삭제]</font></a><br>";
          ?>
         <input type="file" name="subimg" class="input"> &nbsp; 
         </td>
        </tr>
        <tr>
          <td class="t_name">안내메세지</td>
          <td class="t_value">
          <?
          $edit_content = $page_info->content;
          include "../webedit/WIZEditor.html";
          ?>
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