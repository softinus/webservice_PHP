<? include "../../inc/common.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<?
$type = "new";
if($mode == "") $mode = "page_insert";
if($mode == "page_update"){
	$sql = "select * from wiz_content where idx='$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$page_info = mysql_fetch_object($result);
}
?>

<script language="JavaScript" src="../webedit/webedit.js"></script>
<script language="JavaScript" src="/js/valueCheck.js"></script>
<script language="JavaScript">
<!--
function inputCheck(frm){
   
   if(frm.title.value == ""){
      alert("������ �Է��ϼ���");
      frm.title.focus();
      return false;
   }
   if(frm.content.value == ""){
      alert("������ �Է��ϼ���");
      return false;
   }
   
}
//-->
</script>

			<table border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td><img src="../image/ic_tit.gif"></td>
			    <td valign="bottom" class="tit">�������߰�</td>
			    <td width="2"></td>
			    <td valign="bottom" class="tit_alt">���ο� �������� ����,����,�����մϴ�.</td>
			  </tr>
			</table>
			
      <br>
      <table width="100%" border="0" cellspacing="1" cellpadding="2" class="t_style">
      <form name="frm" action="page_save.php" method="post" onSubmit="return inputCheck(this)" enctype="multipart/form-data">
      <input type="hidden" name="tmp">
      <input type="hidden" name="type" value="<?=$type?>">
      <input type="hidden" name="mode" value="<?=$mode?>">
      <input type="hidden" name="idx" value="<?=$idx?>">
        <tr> 
          <td width="15%" class="t_name">����</td>
          <td width="85%" class="t_value">
            <input type="text" name="title" value="<?=$page_info->title?>" size="80" class="input">
          </td>
        </tr>
        <?
        if($idx != ""){
        ?>
        <tr> 
          <td class="t_name">��ũ�ּ�</td>
          <td class="t_value">
            <a href="http://<?=$HTTP_HOST?>/content.php?con_idx=<?=$idx?>" target="_blank">http://<?=$HTTP_HOST?>/content.php?con_idx=<?=$idx?></a>
          </td>
        </tr>
        <?
        }
        ?>
        <tr>
          <td class="t_name">����</td>
          <td class="t_value" colspan="3">
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
          	<img src="../image/btn_list_l.gif" style="cursor:hand" onClick="document.location='page_content.php';">
          </td>
        </tr>
      </form>
      </table>

<? include "../footer.php"; ?>