<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/oper_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?
$sql = "select advert_use, advert_img, advert_point, advert_url from wiz_advert";
$result = mysql_query($sql)or die($sql);
$advert_info = mysql_fetch_object($result);

$imgpath = "/data/oneday";

?>
<script language="JavaScript" src="/js/util_lib.js"></script>

<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">�����̸� ȫ��,������</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">�����̸� ȫ��,���� �������� �մϴ�.</td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub"><img src="../image/ics_tit.gif"> �����̸� ȫ������</td>
	</tr>
</table>

<br>

<form name="advert" method="post" action="advert_post.php" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
	<tr>
		<td class="t_name" width="15%">��뿩��</td>
		<td class="t_value" width="85%" colspan="3">
			<input type="radio" name="advert_use" value="Y" <?if($advert_info->advert_use=="Y"){?>checked<?}?> /> �����
			<input type="radio" name="advert_use" value="N" <?if($advert_info->advert_use=="N"){?>checked<?}?> /> ������
		</td>
	</tr>
	<tr>
		<td class="t_name">������ �̹���</td>
		<td class="t_value" colspan="3">
			<input name="advert_img" type="file" class="input">
			<?if($advert_info->advert_img){?>

					<br /><img src="/data/oneday/<?=$advert_info->advert_img?>" />
			<?}?>
			<!--<br /><img src="/data/oneday/<?=$oper_info->button_buy?>" />-->
		</td>
	</tr>
	<tr>
		<td class="t_name">����URL</td>
		<td class="t_value" colspan="3"><input name="advert_url" type="text" class="input" size="50" value="<?=$advert_info->advert_url?>" /><br />
		�������� / ���� �����Ͽ� �Է� ���ּ���!
		</td>
	</tr>
	<tr>
		<td class="t_name">������̵� ��������Ʈ</td>
		<td class="t_value" colspan="3"><input name="advert_point" type="text" class="input" size="5" value="<?=$advert_info->advert_point?>" maxlength="2" /> %</td>
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

<br>




<? include "../footer.php"; ?>