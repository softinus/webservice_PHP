<?

include "../inc/common.inc"; 			// DB컨넥션, 접속자 파악

// 상품정보 가져오기
$sql = "select * from wiz_product where prdcode='$prdcode'";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
$prd_info = mysql_fetch_object($result);
if($prdcode == "" || $total <= 0) error("존재하지 않는 상품입니다.");

if(!empty($prd_info->strprice)) $sellprice = $prd_info->strprice;
else $sellprice = number_format($prd_info->sellprice)."원";

// 인기,신상,추천...
if($prd_info->popular == "Y") $sp_img .= "<img src='/images/icon_hit.gif'>&nbsp;";
if($prd_info->recom == "Y") $sp_img .= "<img src='/images/icon_rec.gif'>&nbsp;";
if($prd_info->new == "Y") $sp_img .= "<img src='/images/icon_new.gif'>&nbsp;";
if($prd_info->sale == "Y"){ $sp_img .= "<img src='/images/icon_sale.gif'>&nbsp;"; }
if($prd_info->shortage == "Y" || (!strcmp($prd_info->shortage, "S") && $prd_info->stock <= 0)) $sp_img .= "<img src='/images/icon_not.gif'>&nbsp;";

// 상품상세 이미지 보기 증가
$sql = "update wiz_product set deimgcnt = deimgcnt + 1 where prdcode = '$prdcode'";
mysql_query($sql) or error(mysql_error());

// 상품 이미지
for($ii = 1; $ii <= 5; $ii++) {
	if(!@file($_SERVER[DOCUMENT_ROOT]."/data/prdimg/".$prd_info->{"prdimg_L".$ii})) $prd_info->{"prdimg_L".$ii} = "/images/noimg_L.gif";
	else $prd_info->{"prdimg_L".$ii} = "/data/prdimg/".$prd_info->{"prdimg_L".$ii};
}
?>
<!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
<title>제품 확대이미지 보기</title>
<link rel="stylesheet" type="text/css" href="/wiz_style.css">
</head>

<body>
<table border=0 cellpadding=0 cellspacing=0 width=800 height=600>
	<tr><td height=15 background="/images/zoom_bg.gif" colspan=2></td></tr>
	<tr>
		<td width=550 height=550 align=center><img src="<?=$prd_info->prdimg_L1?>" name="prdimg"></td>
		<td valign=top height=585>
			<table border=0 cellpadding=0 cellspacing=0 height=100%>
				<tr><td colspan=2 height=53><img src="/images/zoom_title.gif"></td></tr>
				<tr>
					<td width=3 bgcolor=#cdcdcd></td>
					<td valign=top style="padding:10 0 0 0">
						
						<table border=0 cellpadding=0 cellspacing=0 width=90% align=center>
							<tr><td height=50><font color=#000000><b><?=$prd_info->prdname?></b></font></td></tr>
							<tr><td height=2 bgcolor=#cccccc></td></tr>
							<tr><td valign=top>
							<tr>
								<td bgcolor=#f5f5f5 style="padding:5 0 5 0">
									<table border=0 cellpadding=0 cellspacing=0 width=90% align=center>
										<tr>
											<td height=25 width=80><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;판매가격</td>
											<td>:&nbsp;&nbsp;<span class="price_b"><?=$sellprice?></td>
										</tr>
										<? if($oper_info->reserve_use == "Y" && empty($prd_info->strprice)){ ?>
										<tr>
											<td height=25><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;적립금</td>
											<td>:&nbsp;&nbsp;<b><?=number_format($prd_info->reserve)?>원</b></td>
										</tr>
										<? } ?>
									</table>
								</td>
							</tr>
							<tr>
								<td style="padding:5 0 5 0">

									<table border=0 cellpadding=0 cellspacing=0 width=90% align=center>
										<? if($prd_info->prdcom != ""){ ?>
										<tr>
											<td height=25 width=80><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;제조사</td>
											<td>:&nbsp;&nbsp; <?=$prd_info->prdcom?></td>
										</tr>
										<? } ?>
										<!--tr>
											<td height=25 width=80><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;고객선호도</td>
											<td>:&nbsp;&nbsp; <img src="/images/icon_star_<?=$prd_info->prefer?>.gif"></td></tr>
										<tr//-->
											<td height=25 width=80><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;제품상태</td>
											<td>:&nbsp;&nbsp; <?=$sp_img?></td>
										</tr>
									</table>
									
								</td>
							</tr>
							<tr><td height=1 bgcolor=#dadada></td></tr>
						</table>
					</td>
				</tr>
				<tr><td bgcolor=#cdcdcd></td>
					<td align=center>
						
			      <table border=0 cellpadding=3 cellspacing=0>
					  <? $imgpath = $_SERVER[DOCUMENT_ROOT]."/data/prdimg"; ?>
					  <tr>
		        <? if(@file($imgpath."/".$prd_info->prdimg_S1)){ ?><td><table width=50 height=50 cellpadding=0 cellspacing=0 style="border: 1 solid #cdcdcd"><tr><td align=center><img src="/data/prdimg/<?=$prd_info->prdimg_S1?>" onMouseOver="document.prdimg.src='<?=$prd_info->prdimg_L1?>'"></td></tr></table></td><?}?>
					  <? if(@file($imgpath."/".$prd_info->prdimg_S2)){ ?><td><table width=50 height=50 cellpadding=0 cellspacing=0 style="border: 1 solid #cdcdcd"><tr><td align=center><img src="/data/prdimg/<?=$prd_info->prdimg_S2?>" onMouseOver="document.prdimg.src='<?=$prd_info->prdimg_L2?>'"></td></tr></table></td><?}?>
						<? if(@file($imgpath."/".$prd_info->prdimg_S3)){ ?><td><table width=50 height=50 cellpadding=0 cellspacing=0 style="border: 1 solid #cdcdcd"><tr><td align=center><img src="/data/prdimg/<?=$prd_info->prdimg_S3?>" onMouseOver="document.prdimg.src='<?=$prd_info->prdimg_L3?>'"></td></tr></table></td><?}?>
					  </tr>
					  </table>
					  <table border=0 cellpadding=3 cellspacing=0>
						<tr>
						<? if(@file($imgpath."/".$prd_info->prdimg_S4)){ ?><td><table width=50 height=50 cellpadding=0 cellspacing=0 style="border: 1 solid #cdcdcd"><tr><td align=center><img src="/data/prdimg/<?=$prd_info->prdimg_S4?>" onMouseOver="document.prdimg.src='<?=$prd_info->prdimg_L4?>'"></td></tr></table></td><?}?>
						<? if(@file($imgpath."/".$prd_info->prdimg_S5)){ ?><td><table width=50 height=50 cellpadding=0 cellspacing=0 style="border: 1 solid #cdcdcd"><tr><td align=center><img src="/data/prdimg/<?=$prd_info->prdimg_S5?>" onMouseOver="document.prdimg.src='<?=$prd_info->prdimg_L5?>'"></td></tr></table></td><?}?>
					  </tr>
						</table>
						
					</td>
				</tr>
				<tr>
					<td bgcolor=#cdcdcd></td>
					<td height=50 bgcolor=#F6F6F6 align=center><img src="/images/zoom_but_close.gif" border=0 onClick="self.close();" style="cursor:hand"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

</body>
</html>