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
		<td valign="bottom" class="tit">기본정보설정</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">쇼핑몰 구축에 필요한 정보를 관리합니다.</td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub"><img src="../image/ics_tit.gif"> 상점정보관리</td>
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
					<td class="t_name">쇼핑몰 이름</td>
					<td class="t_value" colspan="3"><input name="shop_name" value="<?=$shop_info->shop_name?>" type="text" class="input"></td>
				</tr>
				<tr>
					<td class="t_name">쇼핑몰 URL</td>
					<td class="t_value" colspan="3"><input name="shop_url" type="text" value="<?=$shop_info->shop_url?>" size="60" class="input"></td>
				</tr>
				<tr>
					<td class="t_name">관리자 이메일</td>
					<td class="t_value" colspan="3"><input name="shop_email" type="text" value="<?=$shop_info->shop_email?>" size="60" class="input"></td>
				</tr>
				<tr>
					<td width="15%" class="t_name">관리자 전화번호</td>
					<td width="35%" class="t_value"><input name="shop_tel" type="text" value="<?=$shop_info->shop_tel?>" size="28" class="input"></td>
					<td width="15%" class="t_name">관리자 휴대폰</td>
					<td width="35%" class="t_value"><input name="shop_hand" type="text" value="<?=$shop_info->shop_hand?>" class="input"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="30"><font color=red>- 관리자 이메일,휴대폰번호로 회원가입,탈퇴,폼메일 등 사이트에서 일어나는 상황을 통보받습니다.</font></td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub"><img src="../image/ics_tit.gif"> 쇼핑몰 Title</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="1" cellpadding="5" class="t_style">
	<tr>
		<td width="15%" class="t_name">쇼핑몰 Title</td>
		<td width="85%" class="t_value"><input name="site_title" value="<?=$dsn_info->site_title?>" size="30" type="text" class="input"></td>
	</tr>
	<tr>
		<td class="t_name">검색키워드</td>
		<td class="t_value"><input name="site_keyword" type="text" value="<?=$dsn_info->site_keyword?>" size="84" class="input"></td>
	</tr>
	<tr>
		<td class="t_name">소개글</td>
		<td class="t_value"><input name="site_intro" type="text" value="<?=$dsn_info->site_intro?>" size="84" class="input"></td>
	</tr>
</table>

<br>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td class="tit_sub"><img src="../image/ics_tit.gif"> 사업자정보</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td>
			<table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
				<tr>
					<td width="15%" class="t_name">사업자등록번호</td>
					<td width="35%" class="t_value"><input name="com_num" type="text" value="<?=$shop_info->com_num?>" class="input"></td>
					<td width="15%" class="t_name">인감</td>
					<td width="35%" class="t_value">
					<? if(is_file("../../data/config/com_seal.gif")){ ?> <img src='/data/config/com_seal.gif'><br> <? } ?>
					<input name="com_seal" type="file" class="input">
					</td>
				</tr>
				<tr>
					<td class="t_name">상호</td>
					<td class="t_value"><input name="com_name" type="text" value="<?=$shop_info->com_name?>" class="input"></td>
					<td class="t_name">대표자명</td>
					<td class="t_value"><input name="com_owner" type="text" value="<?=$shop_info->com_owner?>" class="input"></td>
				</tr>
				<tr>
					<td class="t_name">우편번호</td>
					<td class="t_value" colspan="3">
<? list($post, $post2) = explode("-",$shop_info->com_post); ?>
						<input name="com_post" type="text" value="<?=$post?>" size="5" class="input"> -
						<input name="com_post2" type="text" value="<?=$post2?>" size="5" class="input">
						<img src="../image/btn_post.gif" style="cursor:hand" align="absmiddle" onClick="searchZip();">
					</td>
				</tr>
				<tr>
					<td class="t_name">주소</td>
					<td class="t_value" colspan="3"><input name="com_address" type="text" value="<?=$shop_info->com_address?>" size="50" class="input"></td>
				</tr>
				<tr>
					<td class="t_name">업태</td>
					<td class="t_value"><input name="com_kind" type="text" value="<?=$shop_info->com_kind?>" class="input"></td>
					<td class="t_name">종목</td>
					<td class="t_value"><input name="com_class" type="text" value="<?=$shop_info->com_class?>" class="input"></td>
				</tr>
				<tr>
					<td class="t_name">전화번호</td>
					<td class="t_value"><input name="com_tel" type="text" value="<?=$shop_info->com_tel?>" class="input"></td>
					<td class="t_name">팩스번호</td>
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