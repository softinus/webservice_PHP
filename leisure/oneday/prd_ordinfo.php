<?

$ordinfo = "
<table border=0 cellpadding=0 cellspacing=0 width=98% align=center>
	<tr>
		<td>
			<table border=0 cellpadding=0 cellspacing=0 width=100%>
				<tr>
					<td style='padding:0 0 5 0' valign=bottom><img src=http://$HTTP_HOST/images/sett_t01.gif></td>
					<td></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
			<table border=0 cellpadding=0 cellspacing=0 width=100%>
				<tr align=center>
					<td background=http://$HTTP_HOST/images/form_bar_bg1.gif height=39 width=138>이미지</td>
					<td background=http://$HTTP_HOST/images/form_bar_bg1.gif width=280 align=center>구매상품정보</td>
					<td background=http://$HTTP_HOST/images/form_bar_bg1.gif width=120align=center>옵션</td>
					<td background=http://$HTTP_HOST/images/form_bar_bg1.gif width=100>제품가격</td>
					<td background=http://$HTTP_HOST/images/form_bar_bg1.gif width=80>적립금</td>
					<td background=http://$HTTP_HOST/images/form_bar_bg1.gif width=80>구매수량</td>
				</tr>
";

	$sql = "select * from wiz_basket where orderid = '$order_info->orderid'";
	$result = mysql_query($sql,$connect) or error(mysql_error());
	$prd_num = mysql_num_rows($result);

	$no = 0;
	while($row = mysql_fetch_object($result)){
		
		$prd_price += ($row->prdprice * $row->amount);
		if($row->prdimg == "") $row->prdimg = "http://$HTTP_HOST/images/noimage.gif";
		else $row->prdimg = "http://$HTTP_HOST/data/prdimg/".$row->prdimg;

		$optcode = "";

				$arroptcode = explode("^",$row->optcode);
				$arroptcode2 = explode("^",$row->optcode2);
				$arroptcode3 = explode("^",$row->optcode3);
				$arroptcode4 = explode("^",$row->optcode4);
				$arroptcode5 = explode("^",$row->optcode5);
				$arroptcode6 = explode("^",$row->optcode6);
				$arroptcode7 = explode("^",$row->optcode7);

		
		if($row->opttitle5 != '') $optcode .= "$row->opttitle5 : $arroptcode5[0], ";
		if($row->opttitle6 != '') $optcode .= "$row->opttitle6 : $arroptcode6[0], ";
		if($row->opttitle7 != '') $optcode .= "$row->opttitle7 : $arroptcode7[0], ";
		
		if($row->opttitle3 != '') $optcode .= "$row->opttitle3 : $arroptcode3[0], ";
		if($row->opttitle4 != '') $optcode .= "$row->opttitle4 : $arroptcode4[0], ";

		if($row->opttitle != '') $optcode .= $row->opttitle;
		if($row->opttitle != '' && $row->opttitle2 != '') $optcode .= "/";
		if($row->opttitle2 != '') $optcode .= $row->opttitle2;
		if($row->opttitle != '' || $row->opttitle2 != '') $optcode .= " : ".$arroptcode[0];

		if(!strcmp($row->status, "CA")) $basket_status = "<font color='red'>[취소신청]</font>";
		else if(!strcmp($row->status, "CI")) $basket_status = "<font color='red'>[처리중]</font>";
		else if(!strcmp($row->status, "CC")) $basket_status = "<font color='red'>[취소완료]</font>";
		else $basket_status = "";
		
		$del_type = "";
		if(!empty($row->del_type) && strcmp($row->del_type, "DA")) {
			if(!strcmp($row->del_type, "DC")) $del_type = "<br>(".deliver_name_prd($row->del_type)." : ".number_format($row->del_price)."원)";
			else $del_type = "<br>(".deliver_name_prd($row->del_type).")";
		}

$ordinfo .= "
				<tr>
					<td style=padding:10 align=center><a href='http://$HTTP_HOST/index.php?prdcode=$row->prdcode' target='prdview'><img src='$row->prdimg' border='0' width='50' height='50'></a></td>
					<td><a href='http://$HTTP_HOST/index.php?prdcode=$row->prdcode' target='prdview'>$row->prdname</a> $basket_status <br>$del_type</td>
					<td  align=center>$optcode</td>
					<td class=price align=center>".number_format($row->prdprice)."원</td>
					<td align=center><b>".number_format($row->prdreserve*$row->amount)."원</b></td>
					<td align=center><b>".$row->amount."</b></td>
				</tr>
				<tr><td colspan=8 height=1 bgcolor=#E5E5E5></td></tr>";

		$no++;
	}

// 회원할인
if($order_info->discount_price > 0){
	$discount_msg = " - 회원할인(<b>".number_format($order_info->discount_price)."원</b>)";
}

// 적립금 사용
if($order_info->reserve_use > 0){
	$reserve_msg = " - 적립금 사용(<b>".number_format($order_info->reserve_use)."원</b>)";
}

// 쿠폰사용
if($order_info->coupon_use > 0){
	$coupon_msg = " - 쿠폰 사용(<b>".number_format($order_info->coupon_use)."원</b>)";
}

$deliver_price = deliver_price2($order_info->total_price, $oper_info);

$ordinfo .= "
				<tr><td colspan=8 height=2 bgcolor=#E5E5E5></td></tr>
				<tr>
					<td height=38 background=http://$HTTP_HOST/images/form_bar_bg2.gif align=center colspan=8>
					<b>총결제금액 </b>:  상품(<b>".number_format($prd_price)."원)</b> ".$discount_msg." + 배송비(<b>".number_format($deliver_price)."원</b>)".$coupon_msg.$reserve_msg." = <span class=price>".number_format($order_info->total_price)."원</span>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr><td><br></td></tr>
	<tr>
		<td>

			<table border=0 cellpadding=5 cellspacing=0 width=100%>
				<tr>
				  <td width=100><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>주문번호</td><td> : $order_info->orderid</td>
				  <td width=100><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>주문일</td><td> : $order_info->order_date</td>
				</tr>
				<tr>
				  <td><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>결제방법</td><td> : ".pay_method($order_info->pay_method)."</td>
				  <td><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>주문상태</td><td> : ".order_status($order_info->status)."</td>
				</tr>";

if($order_info->pay_method == "PB"){


$ordinfo .= "
				<tr>
				  <td><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>입금계좌</td><td> : $order_info->account</td>
				  <td><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>입금자명</td><td> : $order_info->account_name</td>
				</tr>";

}else if($order_info->pay_method == "PV"){

$ordinfo .= "
				<tr>
				  <td><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle><b>입금계좌</b></td><td colspan=3><b> : $order_info->account</b> <font color=red>(가상계좌번호로 입금하셔야 주문이 완료됩니다.)</font></td>
				</tr>";

}

if($order_info->deliver_num != ""){
	
$ordinfo .= "
				<tr>
				  <td><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>운송장번호</td><td colspan=3> : ".$order_info->deliver_num."</td>
				</tr>";
				
}

$ordinfo .= "
			</table>

  	</td>
	</tr>
	<tr>
  	<td>


			<table border=0 cellpadding=5 cellspacing=0 width=100%>
			  <tr>
			    <td>
						<table border=0 cellpadding=0 cellspacing=0 width=100%>
						<tr><td colspan=2 style='padding:10 0 5 0' valign=bottom><img src=http://$HTTP_HOST/images/order_title02.gif></td></tr>
						<tr><td height=3 colspan=2 bgcolor=#999999></td></tr>
						<tr><td height=1 colspan=2 bgcolor=#dadada></td></tr>
						<tr><td height=5></td></tr>
						<tr><td height=25 width=110><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>주문하시는 분</td><td> : $order_info->send_name</td></tr>
						<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>전화번호</td><td> : $order_info->send_tphone</td></tr>
						<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>휴대전화번호</td><td> : $order_info->send_hphone</td></tr>
						<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>이메일</td><td> : $order_info->send_email</td></tr>
						<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>주소</td><td> : [$order_info->send_post] $order_info->send_address</td></tr>
						</table>
				  </td>
		    </tr>
		  </table>


  	</td>
	</tr>
	<tr>
  	<td>


	    <table border=0 cellpadding=5 cellspacing=0 width=100%>
	      <tr>
			   <td valign=top>
						<table border=0 cellpadding=0 cellspacing=0 width=100%>
							<tr><td colspan=2 style='padding:10 0 5 0' valign=bottom><img src=http://$HTTP_HOST/images/order_title03.gif></td></tr>
							<tr><td height=3 colspan=2 bgcolor=#999999></td></tr>
							<tr><td height=1 colspan=2 bgcolor=#dadada></td></tr>
							<tr><td height=5></td></tr>
							<tr><td height=25 width=110><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>받으시는 분</td><td> : $order_info->rece_name</td></tr>
							<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>전화번호</td><td> : $order_info->rece_tphone</td></tr>
							<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>휴대전화번호</td><td> : $order_info->rece_hphone</td></tr>
							<tr><td height=25><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>주소</td><td> : [$order_info->rece_post] $order_info->rece_address</td></tr>";

if($order_info->demand != ""){
$ordinfo .= "
							<tr>
								<td height=25 colspan=2 valign=top>
									<table border=0 cellpadding=0 cellspacing=0 width=100%>
									<tr><td height=4></td></tr>
									<tr><td width=110 valign=top><img src=http://$HTTP_HOST/images/blue_icon.gif align=absmiddle>요청사항</td><td> : ".str_replace("\n","<br>&nbsp;&nbsp;",$order_info->demand)."</td></tr>
									</table>
								</td>
							</tr>";
}
$ordinfo .= "
						</table>
					</td>
				</tr>
			</table>
					
  	</td>
	</tr>
</table>
";

?>