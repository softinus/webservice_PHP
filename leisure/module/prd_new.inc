<?
$prd_type = "new";
$sql = "select * from wiz_prdmain where type='$prd_type'";
$prd_result = mysql_query($sql) or error(mysql_error());

if($prd_row = mysql_fetch_object($prd_result)){

	$prdimg_width = ""; $prdimg_height = "";
	if($prd_row->prd_width > 0) $prdimg_width = "width='$prd_row->prd_width'";
	if($prd_row->prd_height > 0 ) $prdimg_height = "height='$prd_row->prd_height'";

	if(is_file("./data/mainimg/$prd_row->barimg")) $prd_row->barimg = "<a href='/shop/prd_list.php?grp=$prd_type'><img src='/data/mainimg/$prd_row->barimg' border='0'></a>";
	else $prd_row->barimg = "";

	$prd_new .= "<table border=0 cellpadding=0 cellspacing=0 width=100%>
						   <tr><td>".$prd_row->html."</td></tr>
							<tr><td>".$prd_row->barimg."</td></tr>
							<tr><td align=center>
							<table width=100% border=0 cellpadding=7 cellspacing=0>";

	$no = 0;
	$sql = "select distinct wp.prdcode,wp.prdname,wp.conprice,wp.sellprice,wp.strprice,wp.prdimg_R,wp.prdicon,wp.conprice,wp.coupon_use,wp.coupon_type,wp.coupon_dis,wp.coupon_amount,wp.coupon_limit,wp.coupon_sdate,wp.coupon_edate 
				from wiz_product as wp left join wiz_cprelation as wcp on wp.prdcode = wcp.prdcode
				left join wiz_category as wc on wcp.catcode = wc.catcode
				where wp.$prd_type = 'Y' and wp.showset != 'N' and wc.catuse != 'N' order by wp.prior desc limit $prd_row->prd_num";
	$result = mysql_query($sql) or error(mysql_error());
	while($row = mysql_fetch_object($result)){

		// 상품 이미지
		if(!@file($_SERVER[DOCUMENT_ROOT]."/data/prdimg/".$row->prdimg_R)) $row->prdimg_R = "/images/noimg_R.gif";
		else $row->prdimg_R = "/data/prdimg/".$row->prdimg_R;

		$row->prdimg_R = "<a href=/shop/prd_view.php?prdcode=$row->prdcode><img src='$row->prdimg_R' border=0 $prdimg_width $prdimg_height></a>";
		$row->prdname = "<a href=/shop/prd_view.php?prdcode=$row->prdcode>$row->prdname</a>";

		// 상품아이콘
		$sp_img = "";
		$prdicon_list = explode("/",$row->prdicon);
		for($ii=0; $ii<count($prdicon_list)-1; $ii++){
			$sp_img .= "<img src='/data/prdicon/".$prdicon_list[$ii]."'> ";
		}
		// 쿠폰아이콘
		$coupon_img = "";
		if(
		$row->coupon_use == "Y" &&
		$row->coupon_sdate <= date('Y-m-d') &&
		$row->coupon_edate >= date('Y-m-d') &&
		($row->coupon_limit == "N" || ($row->coupon_limit == "" && $row->coupon_amount > 0))
		){

			$coupon_img = "<font class=coupon>".$row->coupon_dis.$row->coupon_type."</font> <img src='/images/icon_coupon.gif' align='absmiddle'>";
		}

		$conprice = "";
		if($row->conprice > $row->sellprice){
			$conprice = "<s>".number_format($row->conprice)."원</s> → ";
		}

		if(!empty($row->strprice)) {
			$conprice = "";
			$row->sellprice = $row->strprice;
		} else {
			$row->sellprice = number_format($row->sellprice)."원";
		}

		if($no%$prd_row->prd_row == 0) $prd_new .= "<tr>";

	   $prd_new .= "<td valign=top align=center>
								<table width=130 border=0 cellpadding=0 cellspacing=0>
								<tr><td align=center>".$row->prdimg_R."</td></tr>
								<tr><td align=center class='name' style='padding:5 0 5 0'>".cut_str($row->prdname,70)."</td></tr>
								<tr><td align=center>".$conprice."<font class='price'>".$row->sellprice."</font></td></tr>
								<tr><td align=center>".$sp_img."</td></tr>
								<tr><td align=center>".$coupon_img."</td></tr>
								</table>
								</td>";

		$no++;
	}

	$prd_new .= "</table>
							</td></tr>
							</table>";

}
?>