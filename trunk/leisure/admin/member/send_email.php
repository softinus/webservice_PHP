<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<?
// ���Ͻ�Ų
$sql = "select * from wiz_mailsms where code = 'mem_notice'";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
?>
<html>
<head>
<title>:: ���Ϲ߼� ::</title>
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
<!--
// �ֹ��󼼳��� ����
function inputCheck(frm){
	
	if(frm.seluser.value == ""){
		alert("�޴��̰� �����ϴ�");
		frm.seluser.focus();
		return false;
	}
	
	if(frm.subject.value == ""){
		alert("������ �Է��ϼ���");
		frm.subject.focus();
		return false;
	}
	
	if(frm.content.value == ""){
		alert("������ �Է��ϼ���");
		return false;
	}
}
//-->
</script>
</head>
<body>
<table width="100%" border="0" cellpadding=6 cellspacing=0>
<tr>
<td>
	
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td class="tit_sub"><img src="../image/ics_tit.gif"> ���Ϲ߼�</td>
  </tr>
</table>
<table width="100%" border="0" cellpadding=2 cellspacing=1 class="t_style">
<form name="frm" action="member_save.php" method="post" onSubmit="return inputCheck(this);">
<input type="hidden" name="mode" value="sendemail">
<input type="hidden" name="se_name" value="<?=$shop_info->shop_name?>">
<input type="hidden" name="se_email" value="<?=$shop_info->shop_email?>">
  <tr>
    <td height="30" width="20%" align=center class="t_name">��������</td>
    <td class="t_value"><?=$shop_info->shop_name?>(<?=$shop_info->shop_email?>)</td>
  </tr>
  <tr>
    <td height="30" align="center" class="t_name">�޴���</td>
    <td class="t_value">
      <textarea rows="3" cols="50" name="seluser" class="textarea" style="width:90%"><?=$seluser?></textarea>
      <table><tr><td>����) ȫ�浿:test@test.com,</td></tr></table>
    </td>
  </tr>
  <tr>
    <td height="30" align=center class="t_name">����</td>
    <td class="t_value"><input type="text" name="subject" size="55" class="input" style="width:90%"></td>
  </tr>
  <tr>
    <td colspan="2" class="t_value">
    <?
    $edit_content = $row->email_msg;
    $edit_content = info_replace($shop_info, $re_info, $order_info, $edit_content);
    include "../webedit/WIZEditor.html";
    ?>
    </td>
  </tr>
</table>

<br>
<table width="100%" border="0" cellpadding=0 cellspacing=0>
  <tr>
    <td align="center" colspan="2">
      <input type="image" src="../image/btn_send_l.gif"> &nbsp; 
      <img src="../image/btn_close_l.gif" style="cursor:hand" onClick="self.close();">
    </td>
  </tr>
</form>
</table>

</td>
</tr>
</table>
</body>
</html>