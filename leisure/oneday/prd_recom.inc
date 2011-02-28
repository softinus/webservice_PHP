<?
if(($catcode != "" && $cat_info->recom_use == "Y") || (!empty($brand) && !strcmp($brd_info[recom_use], "Y"))){
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<!--tr><td colspan="3"><img src="/images/prdlist_recom_title.gif"></td></tr-->
	<tr>
    <td><img src="/images/prdline_left_top.gif" width="3" /></td>
    <td background="/images/prdline_top_bg.gif" width="100%"></td>
    <td><img src="/images/prdline_right_top.gif" width="3" /></td>
  </tr>
  <tr>
  	<td background="/images/prdline_left_bg.gif" width="3"></td>
  	<td>
  	
  	<?

			if(!empty($brand)) $brand_sql = " and wp.brand = '$brand' ";
		
			$tmpcode = substr($catcode,0,2);
			$sql = "select wp.prdcode, wp.prdname, wp.stortexp, wp.prdcom, wp.reserve, wp.sellprice, wp.prdimg_M1, wp.prdimg_R, wp.popular, wp.recom, wp.new, wp.sale, wp.stock, wp.conprice, 
							wp.conprice, wp.coupon_use, wp.coupon_type, wp.coupon_dis, wp.coupon_amount, wp.coupon_limit, wp.coupon_edate  
							from wiz_cprelation wc, wiz_product wp, wiz_category wcat where wc.catcode like '$tmpcode%' and wp.recom = 'Y' and wc.prdcode = wp.prdcode and wp.showset != 'N' and wc.catcode = wcat.catcode and wcat.catuse != 'N' $brand_sql 
							order by wp.prior desc, prdcode desc limit 4";
			$result = mysql_query($sql) or error(mysql_error());
			$total = mysql_num_rows($result);
			
			if($total > 0) {
				
		?>
			<table width=100% border=0 cellpadding=0 cellspacing=6>
				<tr>
					<?
					$no = 0;
					while($row = mysql_fetch_object($result)){
						
						// 상품아이콘
						$sp_img = "";
						if($row->popular == "Y") 	$sp_img .= "<img src='/images/icon_hit.gif'>&nbsp;";
						if($row->recom == "Y") 		$sp_img .= "<img src='/images/icon_rec.gif'>&nbsp;";
						if($row->new == "Y") 			$sp_img .= "<img src='/images/icon_new.gif'>&nbsp;";
						if($row->sale == "Y") 		$sp_img .= "<img src='/images/icon_sale.gif'>&nbsp;";
						if($row->best == "Y") 		$sp_img .= "<img src='/images/icon_best.gif'>&nbsp;";
						if($row->shortage == "Y" || $row->stock <= 0) $sp_img .= "<img src='/images/icon_not.gif'>&nbsp;";
				
						$prdicon_list = explode("/",$row->prdicon);
						for($ii=0; $ii<count($prdicon_list)-1; $ii++){
							$sp_img .= "<img src='/data/prdicon/".$prdicon_list[$ii]."'> ";
						}
					
						// 쿠폰아이콘
						$coupon_img = "";
						if(
						$row->coupon_use == "Y" && 
						$row->coupon_edate >= date('Y-m-d') && 
						($row->coupon_limit == "N" || ($row->coupon_limit == "" && $row->coupon_amount > 0))
						){
							
							$coupon_img = "<font class=coupon>".$row->coupon_dis.$row->coupon_type."</font> <img src='/images/icon_coupon.gif' align='absmiddle'>";
						}
					
						// 정상가(판매가보다 높을경우 할인표시)
						$conprice = "";
						if($row->conprice > $row->sellprice){
							$conprice = "<s>".number_format($row->conprice)."원</s> → ";
						}
					
						$sellprice = "<font class=price>".number_format($row->sellprice)."원</font>";
						
						if($no != 0 ) echo "<td width='1' background='/images/prdline_dot_bg.gif' valign='top'></td>";
						
						// 상품 이미지
						if(!@file($_SERVER[DOCUMENT_ROOT]."/data/prdimg/".$row->prdimg_R)) $row->prdimg_R = "/images/noimg_R.gif";
						else $row->prdimg_R = "/data/prdimg/".$row->prdimg_R;
					?>
					<td style="padding:5 5 5 5" valign=top align=center>
						<table width=120 border=0 cellpadding=0 cellspacing=0>
						<tr><td align=center><a href="prd_view.php?prdcode=<?=$row->prdcode?>&catcode=<?=$catcode?>&brand=<?=$brand?>&page=<?=$page?>"><img src="<?=$row->prdimg_R?>" border="0" width="<?=$cat_info->prd_width?>" height="<?=$cat_info->prd_height?>"></a></td></tr>
						<tr><td align=center><a href="prd_view.php?prdcode=<?=$row->prdcode?>&catcode=<?=$catcode?>&brand=<?=$brand?>&page=<?=$page?>"><?=cut_str($row->prdname,25)?></a></td></tr>
						<tr><td align=center><?=$conprice?><?=$sellprice?></td></tr>
						<tr><td align=center><?=$sp_img?></td></tr>
						<tr><td align=center><?=$coupon_img?></td></tr>
						</table>
					</td>
					<?
						$no++;
					}
					?>
			  </tr>
			</table>
		<?
			}else{
		?>
			<table width=100% border=0 cellpadding=0 cellspacing=6>
				<tr>
					<td height="80" align="center">등록된 추천상품이 없습니다.</td>
				</tr>
			</table>
		<?
		}
		?>
		<td background="/images/prdline_right_bg.gif" width="3"></td>
  	</td>
  </tr>
  <tr>
    <td><img src="/images/prdline_left_bottom.gif" width="3" /></td>
    <td background="/images/prdline_bottom_bg.gif" width="100%"></td>
    <td><img src="/images/prdline_right_bottom.gif" width="3" /></td>
  </tr>
  <tr><td colspan="3" height="15"></td></tr>
</table>
<?
}
?>