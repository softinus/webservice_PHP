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
		<td valign="bottom" class="tit">�⺻��������</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">���θ� ���࿡ �ʿ��� ������ �����մϴ�.</td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub"><img src="../image/ics_tit.gif"> ������������</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<form name="frm" action="shop_save.php" method="post" enctype="multipart/form-data">
	<input type="hidden" name="tmp">
	<input type="hidden" name="mode" value="shop_info">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
				<tr>
					<td class="t_name">���θ� �̸�</td>
					<td class="t_value" colspan="3"><input name="shop_name" value="<?=$shop_info->shop_name?>" type="text" class="input"></td>
				</tr>
				<tr>
					<td class="t_name">���θ� URL</td>
					<td class="t_value" colspan="3"><input name="shop_url" type="text" value="<?=$shop_info->shop_url?>" size="60" class="input"></td>
				</tr>
				<tr>
					<td class="t_name">������ �̸���</td>
					<td class="t_value" colspan="3"><input name="shop_email" type="text" value="<?=$shop_info->shop_email?>" size="60" class="input"></td>
				</tr>
				<tr>
					<td width="15%" class="t_name">������ ��ȭ��ȣ</td>
					<td width="35%" class="t_value"><input name="shop_tel" type="text" value="<?=$shop_info->shop_tel?>" size="28" class="input"></td>
					<td width="15%" class="t_name">������ �޴���</td>
					<td width="35%" class="t_value"><input name="shop_hand" type="text" value="<?=$shop_info->shop_hand?>" class="input"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="30"><font color=red>- ������ �̸���,�޴�����ȣ�� ȸ������,Ż��,������ �� ����Ʈ���� �Ͼ�� ��Ȳ�� �뺸�޽��ϴ�.</font></td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub"><img src="../image/ics_tit.gif"> ���θ� Title</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="1" cellpadding="5" class="t_style">
	<tr>
		<td width="15%" class="t_name">���θ� Title</td>
		<td width="85%" class="t_value"><input name="site_title" value="<?=$dsn_info->site_title?>" size="30" type="text" class="input"></td>
	</tr>
	<tr>
		<td class="t_name">�˻�Ű����</td>
		<td class="t_value"><input name="site_keyword" type="text" value="<?=$dsn_info->site_keyword?>" size="84" class="input"></td>
	</tr>
	<tr>
		<td class="t_name">�Ұ���</td>
		<td class="t_value"><input name="site_intro" type="text" value="<?=$dsn_info->site_intro?>" size="84" class="input"></td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub"><img src="../image/ics_tit.gif"> ���������</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
				<tr>
					<td width="15%" class="t_name">����ڵ�Ϲ�ȣ</td>
					<td width="35%" class="t_value"><input name="com_num" type="text" value="<?=$shop_info->com_num?>" class="input"></td>
					<td width="15%" class="t_name">�ΰ�</td>
					<td width="35%" class="t_value">
					<? if(is_file("../../data/config/com_seal.gif")){ ?> <img src='/data/config/com_seal.gif'><br> <? } ?>
					<input name="com_seal" type="file" class="input">
					</td>
				</tr>
				<tr>
					<td class="t_name">��ȣ</td>
					<td class="t_value"><input name="com_name" type="text" value="<?=$shop_info->com_name?>" class="input"></td>
					<td class="t_name">��ǥ�ڸ�</td>
					<td class="t_value"><input name="com_owner" type="text" value="<?=$shop_info->com_owner?>" class="input"></td>
				</tr>
				<tr>
					<td class="t_name">�����ȣ</td>
					<td class="t_value" colspan="3">
<? list($post, $post2) = explode("-",$shop_info->com_post); ?>
						<input name="com_post" type="text" value="<?=$post?>" size="5" class="input"> -
						<input name="com_post2" type="text" value="<?=$post2?>" size="5" class="input">
						<img src="../image/btn_post.gif" style="cursor:hand" align="absmiddle" onClick="searchZip();">
					</td>
				</tr>
				<tr>
					<td class="t_name">�ּ�</td>
					<td class="t_value" colspan="3"><input name="com_address" type="text" value="<?=$shop_info->com_address?>" size="50" class="input"></td>
				</tr>
				<tr>
					<td class="t_name">����</td>
					<td class="t_value"><input name="com_kind" type="text" value="<?=$shop_info->com_kind?>" class="input"></td>
					<td class="t_name">����</td>
					<td class="t_value"><input name="com_class" type="text" value="<?=$shop_info->com_class?>" class="input"></td>
				</tr>
				<tr>
					<td class="t_name">��ȭ��ȣ</td>
					<td class="t_value"><input name="com_tel" type="text" value="<?=$shop_info->com_tel?>" class="input"></td>
					<td class="t_name">�ѽ���ȣ</td>
					<td class="t_value"><input name="com_fax" type="text" value="<?=$shop_info->com_fax?>" class="input"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>
<table align="center" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
			<img src="../image/btn_cancel_l.gif" style="cursor:hand" onClick="history.go(-1);">
		</td>
	</tr>
</table>
</form>
<? include "../footer.php"; ?>