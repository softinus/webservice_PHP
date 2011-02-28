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
		<td valign="bottom" class="tit">원데이몰 홍보,광고설정</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">원데이몰 홍보,광고 관리설정 합니다.</td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub"><img src="../image/ics_tit.gif"> 원데이몰 홍보설정</td>
	</tr>
</table>

<br>

<form name="advert" method="post" action="advert_post.php" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
	<tr>
		<td class="t_name" width="15%">사용여부</td>
		<td class="t_value" width="85%" colspan="3">
			<input type="radio" name="advert_use" value="Y" <?if($advert_info->advert_use=="Y"){?>checked<?}?> /> 사용함
			<input type="radio" name="advert_use" value="N" <?if($advert_info->advert_use=="N"){?>checked<?}?> /> 사용안함
		</td>
	</tr>
	<tr>
		<td class="t_name">광고배너 이미지</td>
		<td class="t_value" colspan="3">
			<input name="advert_img" type="file" class="input">
			<?if($advert_info->advert_img){?>

					<br /><img src="/data/oneday/<?=$advert_info->advert_img?>" />
			<?}?>
			<!--<br /><img src="/data/oneday/<?=$oper_info->button_buy?>" />-->
		</td>
	</tr>
	<tr>
		<td class="t_name">광고URL</td>
		<td class="t_value" colspan="3"><input name="advert_url" type="text" class="input" size="50" value="<?=$advert_info->advert_url?>" /><br />
		마지막의 / 까지 포함하여 입력 해주세요!
		</td>
	</tr>
	<tr>
		<td class="t_name">광고아이디 적립포인트</td>
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