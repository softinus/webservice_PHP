<?
include "$_SERVER[DOCUMENT_ROOT]/inc/common.inc";		// DB컨넥션, 접속자 파악
include "$_SERVER[DOCUMENT_ROOT]/inc/connect.inc";		// 접소카운터
include "$_SERVER[DOCUMENT_ROOT]/inc/util.inc";			// 유틸 라이브러리
include "$_SERVER[DOCUMENT_ROOT]/inc/shop_info.inc";		// 상점정보
include "$_SERVER[DOCUMENT_ROOT]/inc/oper_info.inc";		// 운영정보
include "$_SERVER[DOCUMENT_ROOT]/inc/design_info.inc";		// 디자인 정보
include "$_SERVER[DOCUMENT_ROOT]/inc/oneday_info.inc";	// 현재 상품 정보
include "$_SERVER[DOCUMENT_ROOT]/inc/advert_check.inc";	// 추천인 관련
include "$DOCUMENT_ROOT/inc/module.inc";		// module include	
//::: 애니쿠폰 ::: 한루 한가지 반가운소식! any Coupon
?>
<html>
<head>
	<title><?=$shop_info->shop_name?></title>
	<meta http-equiv="Content-Type" content="text/html;charset=euc-kr">
<link href="/inc/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/js/httpRequest.js"></script>
<script type="text/javascript" src="/js/util_lib.js"></script>
<script type="text/javascript" src="/js/count.js"></script>
<script>

// 마감에 따른 구매버튼 변경 함수 
function changeButton(msg){
	var buttonObj = document.getElementById("button_buy");
	if(buttonObj){
		/*
		if(msg=="soldout"){
			buttonObj.setAttribute("onclick","javascript:alert('상품판매 재고가 소진 되었습니다. 다음일 기대 해주세요!')")
		}else if(msg=="timeout"){
			buttonObj.setAttribute("onclick","javascript:alert('상품판매 시간이 종료 되었습니다. 다음을 기대 해주세요!')")
		}else{
			buttonObj.setAttribute("onclick","javascript:alert('상품판매일이 아닙니다.')")
		}
		*/

		var changeImg = buttonObj.getElementsByTagName("img")[0];	// 버튼이미지 객체
		changeImg.setAttribute("src",'<?=$button_soldout?>')
	}
}
function order(){
	var formObj = document.prdForm;
	formObj.submit();
}
</script>

<style>
.mask{position:absolute;display:none;z-index:10;text-align:center;filter:alpha(opacity=30);opacity:0.3;} 
</style>
</head>
<body leftmargin="0" topmargin="0">
<div id="wrapper">
<div  id="oneCatList" style="width:100%; height:33px; position:absollute; top:0px; left:0px;  background:url(/image/top_bg.jpg) repeat-x top left; overflow:hidden;">
	<table width="100%" height="33" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td align="center" valign="top">
				<table width="1012" height="33" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td align="center">
						<?=$one_catlist?>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</div>



<table width="100%" height="109" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center" valign="top">
			<table width="1012" height="109" border="0" cellpadding="0" cellspacing="0" background="/image/top_bg2.jpg">
				<tr>
					<td width="362" valign="top">
						<table width="170" height="57" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td align="center" valign="top"><img src="/image/top_close.jpg" width="82" height="37" border="0" onclick="hideCategory()" style="cursor:pointer"/></td>
							</tr>
						</table>
					</td>
					<td width="368"><a href="/"><img src="/image/top_logo.jpg" width="368" height="109" border="0"></a></td>
					<td align="right" valign="bottom">
						<table width="281" height="49" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td align="right" style="padding-right:10px">
								<?if($wiz_session[id]==""){?><a href="/member_day/login.php" style="color:#FF8D55">로그인</a></strong><img src="/image/top_login_line.gif" width="15" height="9"><a href="/member_day/join.php">회원가입</a><?}else{?><a href="/member_day/logout.php" style="color:#FF8D55">로그아웃</a></strong><img src="/image/top_login_line.gif" width="15" height="9"><a href="/member_day/my_info.php">마이페이지</a><?}?><img src="/image/top_login_line.gif" width="15" height="9"><a href="/oneday/center.php">고객센터</a></td>
								<td width="63"><a href="/member_day/my_order.php"><img src="/image/top_bt_ju.gif" width="60" height="22" border="0"></a></td>
							</tr>
						</table>
						<?// 즐겨찾기?>
						<table width="87" height="50" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td><img src="/image/top_bt_look.gif" width="84" height="20" border="0" style="cursor:pointer;" onclick="window.external.AddFavorite('<?=$shop_info->shop_url?>','<?=$shop_info->shop_name?>')" /></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<table width="1022" height="41" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td width="5"><img src="/image/top_menu_left.gif" width="5" height="41"></td>
		<td valign="top">

			<?// 탑 메뉴?>
			<table border=0 cellpadding=0 cellspacing=0>
				<tr>
					<td><a href="/oneday/company.php"><img src="/image/topmenu01<?if(strpos($PHP_SELF,"company.php")){?>_over<?}?>.gif" border="0" name="topmenu01" onmouseover="onSwapImgs(this, '/image/topmenu01_over.gif')" <?if(!strpos($PHP_SELF,"company.php")){?>onmouseout="onSwapImgs(this, '/image/topmenu01.gif')"<?}?> /></a></td>
					<td><a href="/oneday/reco.php"><img src="/image/topmenu02<?if(strpos($PHP_SELF,"reco")){?>_over<?}?>.gif" border="0" name="topmenu02" onmouseover="onSwapImgs(this, '/image/topmenu02_over.gif')" <?if(!strpos($PHP_SELF,"reco")){?>onmouseout="onSwapImgs(this, '/image/topmenu02.gif')"<?}?> /></a></td>
					<td><a href="/oneday/guide.php"><img src="/image/topmenu03<?if(strpos($PHP_SELF,"guide.php")){?>_over<?}?>.gif" border="0" name="topmenu03" onmouseover="onSwapImgs(this, '/image/topmenu03_over.gif')" <?if(!strpos($PHP_SELF,"guide.php")){?>onmouseout="onSwapImgs(this, '/image/topmenu03.gif')"<?}?> /></a></td>
					<td><a href="/bbs/list.php?code=notice"><img src="/image/topmenu04<?if(strpos($PHP_SELF,"list.php")){?>_over<?}?>.gif" border="0" name="topmenu04" onmouseover="onSwapImgs(this, '/image/topmenu04_over.gif')" <?if(!strpos($PHP_SELF,"list.php")){?>onmouseout="onSwapImgs(this, '/image/topmenu04.gif')"<?}?> /></a></td>
					<td><a href="/oneday/center.php"><img src="/image/topmenu05<?if(strpos($PHP_SELF,"center.php")){?>_over<?}?>.gif" border="0" name="topmenu05" onmouseover="onSwapImgs(this, '/image/topmenu05_over.gif')" <?if(!strpos($PHP_SELF,"center.php")){?>onmouseout="onSwapImgs(this, '/image/topmenu05.gif')"<?}?> /></a></td>
					<td width="264" background="/image/t_menu_bg.gif"></td>
					<td><a href="/"><img src="/image/topmenu06<?if(strpos($PHP_SELF,"index.php")){?>_over<?}?>.gif" border="0" name="topmenu06" onmouseover="onSwapImgs(this, '/image/topmenu06_over.gif')" <?if(!strpos($PHP_SELF,"index.php")){?>onmouseout="onSwapImgs(this, '/image/topmenu06.gif')"<?}?> width="119" height="39" /></a></td>
					<td><a href="/oneday/oneday_sch.php"><img src="/image/topmenu07<?if(strpos($PHP_SELF,"oneday_sch.php")){?>_over<?}?>.gif" border="0" name="topmenu07" onmouseover="onSwapImgs(this, '/image/topmenu07_over.gif')" <?if(!strpos($PHP_SELF,"oneday_sch.php")){?>onmouseout="onSwapImgs(this, '/image/topmenu07.gif')"<?}?> /></a></td>
				</tr>
			</table>
			<table width="1012" height="2" border="0" cellpadding="0" cellspacing="0" bgcolor="FF3300">
				<tr>
					<td width="1013"></td>
				</tr>
			</table>
		</td>
		<td width="5"><img src="/image/top_menu_right.gif" width="5" height="41"></td>
	</tr>
</table>

