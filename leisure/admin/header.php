<?
$config_img = "_2";
$shop_img = "_2";
$design_img = "_2";
$page_img = "_2";
$product_img = "_2";
$order_img = "_2";
$member_img = "_2";
$marketing_img = "_2";
$bbs_img = "_2";
$sch_img = "_2";
$poll_img = "_2";
if(strpos($PHP_SELF,"/config/") !== false) $config_img = "";
else if(strpos($PHP_SELF,"/shop/") !== false) $shop_img = "";
else if(strpos($PHP_SELF,"/design/") !== false) $design_img = "";
else if(strpos($PHP_SELF,"/page/") !== false) $page_img = "";
else if(strpos($PHP_SELF,"/product/") !== false) $product_img = "";
else if(strpos($PHP_SELF,"/order/") !== false) $order_img = "";
else if(strpos($PHP_SELF,"/member/") !== false) $member_img = "";
else if(strpos($PHP_SELF,"/marketing/") !== false) $marketing_img = "";
else if(strpos($PHP_SELF,"/bbs/") !== false) $bbs_img = "";
else if(strpos($PHP_SELF,"/schedule/") !== false) $sch_img = "";
else if(strpos($PHP_SELF,"/poll/") !== false) $poll_img = "";

$tmp_path = explode("/", $PHP_SELF);
if(!strcmp($tmp_path[2], "config") && strcmp($wiz_admin[designer], "Y")) {

	include "../../inc/shop_info.inc";
	if($shop_info->start_page == "") $start_page = "./main/main.php";
	else $start_page = $shop_info->start_page;

	Header("Location: $start_page");


}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<title><?=$shop_info->admin_title?></title>
<link href="/admin/style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" src="/js/util_lib.js"></script>
<script language="JavaScript" src="/js/calendar.js"></script>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>

</head>

<body>
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td height="100" style="padding-left:10px" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td colspan="3" height="25"></td>
							</tr>
							<tr>
								<td width="10"></td>
							<?if($wiz_admin[company] <> ""){?>
								<td><a href="/admin/oneday/order_list.php"><img src="/data/config/admin_logo.gif" border="0"></a></td>
							<?}else{?>
								<td><a href="<?=$shop_info->start_page?>"><img src="/data/config/admin_logo.gif" border="0"></a></td>
							<?}?>
								<td align="right">
									<table border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td><a href="http://<?=$HTTP_HOST?>" target="_blank"><img src="../image/bt_home.gif" border="0"></a></td>
											<td width="5"></td>
							<?if($wiz_admin[company] <> ""){?>
											<td><a href="/admin/oneday/order_list.php"><img src="../image/bt_admin_main.gif" border="0"></a></td>
							<?}else{?>
											<td><a href="<?=$shop_info->start_page?>"><img src="../image/bt_admin_main.gif" border="0"></a></td>
							<?}?>

											<td width="5"></td>
											<td><a href="../admin_logout.php"><img src="../image/bt_logout.gif" border="0"></a></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td colspan="3" height="6"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td height="37" valign="top" background="../image/bar_bg.gif">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<? if($wiz_admin[designer] == "Y"){ // 디자이너 아이디 환경설정 ?>
								<td width="94"><a href="../config/basic_config.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image0','','../image/bar_m00_over.gif',0)"><img src="../image/bar_m00.gif" name="Image0" border=0></a></td>
								<td width="10" bgcolor="#ffffff">&nbsp;</td>
								<? } ?>

								<td width="6"><img src="../image/bar_front.gif" width="6" height="37"></td>

								<? if(strpos($wiz_admin[permi], "01-00") !== false || !strcmp($wiz_admin[designer], "Y")){ // 상점관리 ?>
								<td width="94"><a href="../shop/shop_info.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image1','','../image/bar_m01_over.gif',0)"><img src="../image/bar_m01.gif" name="Image1" border=0></a></td>
								<? } ?>

								<? if(strpos($wiz_admin[permi], "03-00") !== false || !strcmp($wiz_admin[designer], "Y")){ // 페이지설정 ?>
								<td width="94"><a href="../page/page_company.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image3','','../image/bar_m03_over.gif',0)"><img src="../image/bar_m03.gif" name="Image3" border=0></a></td>
								<? } ?>

								<? if(strpos($wiz_admin[permi], "06-00") !== false || !strcmp($wiz_admin[designer], "Y")){ //회원관리?>
								<td width="94"><a href="../member/member_list.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image6','','../image/bar_m06_over.gif',0)"><img src="../image/bar_m06.gif" name="Image6" border=0></a></td>
								<? } ?>
								<? if(strpos($wiz_admin[permi], "07-00") !== false || !strcmp($wiz_admin[designer], "Y")){ //마케팅분석?>
								<td width="94"><a href="../marketing/connect_list.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image7','','../image/bar_m07_over.gif',0)"><img src="../image/bar_m07.gif" name="Image7" border=0></a></td>
								<? } ?>

								<? if(strpos($wiz_admin[permi], "08-00") !== false || !strcmp($wiz_admin[designer], "Y")){ //게시판관리?>
								<td width="94"><a href="../bbs/bbs_pro_list.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image8','','../image/bar_m08_over.gif',0)"><img src="../image/bar_m08.gif" name="Image8" border=0></a></td>
								<? } ?>

								<? if(strpos($wiz_admin[permi], "05-00") !== false || !strcmp($wiz_admin[designer], "Y")){ //원데이몰?>
								<td width="94"><a href="../oneday/prd_list.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image11','','../image/bar_m11_over.gif',0)"><img src="../image/bar_m11_over.gif" name="Image11" border=0></a></td>
								<? } ?>
								
								<td width="90%"></td>
								<td width="6"><img src="../image/bar_back.gif" width="6" height="37"></td>
							</tr>
						</table>
					</td>
					<td width="25"></td>
				</tr>
				<tr>
					<td height=15></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="padding-left:10px" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="163" valign="top"><? include "./left_menu.php"; ?></td>
					<td width="25"></td>
					<td valign="top" height="100%">