<table border=0 cellpadding=0 cellspacing=0 width=100%>
  <tr>
    <td colspan="2">

		 <table border=0 cellpadding=0 cellspacing=0 width=100%>
			<tr align=center>
				<td background="/images/form_bar_bg1.gif" height=39 width=80>이미지</td>
				<td background="/images/form_bar_bg1.gif">구매상품정보</td>
				<td background="/images/form_bar_bg1.gif" width=80>제품가격</td>
				<td background="/images/form_bar_bg1.gif" width=60>수 량</td>
				<td background="/images/form_bar_bg1.gif" width=80>적립금</td>
				<td background="/images/form_bar_bg1.gif" width=80>합계</td>
			</tr>
			<?

			// 주문정보
			$sql = "select * from wiz_order where orderid='".$orderid."'";
			$result = mysql_query($sql) or error(mysql_error());
			$order_info = mysql_fetch_object($result);

			// 주문상품 정보
			$sql = "select * from wiz_basket where orderid='".$orderid."'";
			$result = mysql_query($sql) or error(mysql_error());
			$total = mysql_num_rows($result);
			while($row = mysql_fetch_object($result)){
			
				$del_type = "";
				
				///////////////////////////////////////////////////////////////////////////////////
				//결제에 들어갈 상품이름 (1개일경우 :마우스 , 2개이상일경우 마우스 외1개 로 출력)//
				///////////////////////////////////////////////////////////////////////////////////
				if($total>1){//1개 이상일경우
					$payment_prdname = $row->prdname." 외".($total-1)."개";
				}else{//한개일경우
					$payment_prdname = $row->prdname;
				}
				////////////////////////////////////////////////////////////////////////////////////
				$optcode = "";
				/*
				if($row->opttitle != '') $optcode = "$row->opttitle : $row->optcode / ";
				if($row->opttitle2 != '') $optcode .= "$row->opttitle2 : $row->optcode2 / ";
				if($row->opttitle3 != '') $optcode .= "$row->opttitle3 : $row->optcode3 / ";
				
				if($row->opttitle2 != '') $row->opttitle2 = "/".$row->opttitle2;
				if($row->optcode2 != '') $row->optcode2 = "/".$row->optcode2;

				if($row->opttitle != '') $optcode .= $row->opttitle.$row->opttitle2." : ".$row->optcode.$row->optcode2.", ";
				
				*/

				if($row->opttitle5 != '') $optcode .= "$row->opttitle5 : $row->optcode5, ";
				if($row->opttitle6 != '') $optcode .= "$row->opttitle6 : $row->optcode6, ";
				if($row->opttitle7 != '') $optcode .= "$row->opttitle7 : $row->optcode7 ";
				
				if($row->opttitle3 != '') $optcode .= "$row->opttitle3 : $row->optcode3, ";
				if($row->opttitle4 != '') $optcode .= "$row->opttitle4 : $row->optcode4, ";
				
				if($row->opttitle != '') $optcode .= $row->opttitle;
				if($row->opttitle != '' && $row->opttitle2 != '') $optcode .= "/";
				if($row->opttitle2 != '') $optcode .= $row->opttitle2;
				if($row->opttitle != '' || $row->opttitle2 != '') $optcode .= " : ".$row->optcode.", ";

				if(!empty($row->del_type) && strcmp($row->del_type, "DA")) {
					if(!strcmp($row->del_type, "DC")) $del_type = "<br>(".deliver_name_prd($row->del_type)." : ".number_format($row->del_price)."원)";
					else $del_type = "<br>(".deliver_name_prd($row->del_type).")";
				}
				
				// 상품 이미지
				if(!@file($_SERVER[DOCUMENT_ROOT]."/data/prdimg/".$row->prdimg)) $row->prdimg = "/images/noimg_R.gif";
				else $row->prdimg = "/data/prdimg/".$row->prdimg;
			?>
			<tr>
				<td style="padding:5" align=center><a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>" target="prdview"><img src="<?=$row->prdimg?>" width="50" height="50" border="0"></a></td>
				<td><a href="/shop/prd_view.php?prdcode=<?=$row->prdcode?>" target="prdview"><?=$row->prdname?></a><br><?=$optcode?><?=$del_type?></td>
				<td align=center><?=number_format($row->prdprice)?>원</td>
				<td align=center><?=$row->amount?></td>
				<td align=center><?=$row->prdreserve?>원</td>
				<td align=center><?=number_format($row->amount*$row->prdprice)?>원</td>
			</tr>
			<tr><td colspan=7 height=1 bgcolor="#E5E5E5"></td></tr>
			</form>
			<?
			}

			if($total <= 0){
			?>
				<tr><td colspan=10 height=30 align=center>장바구니가 비어있습니다.</td></tr>
				<tr><td colspan=10 height=1 bgcolor="#E5E5E5"></td></tr>
			<?
			}

			// 배송비
	   	$deliver_price = deliver_price($order_info->prd_price, $oper_info);
	   	if($order_info->deliver_price > $deliver_price){
	   		$deliver_msg .= " , 배송비 할증";
	   	}

			// 회원할인 [$discount_msg 메세지 생성]
	    $discount_price = level_discount($wiz_session[level],$order_info->prd_price);

	    // 적립금 사용
	    if($order_info->reserve_use > 0){
	    	$reserve_msg = " - 적립금 사용(<b>".number_format($order_info->reserve_use)."</b>)";
	    }

	    // 쿠폰사용
	    if($order_info->coupon_use > 0){
	    	$coupon_msg = " - 쿠폰 사용(<b>".number_format($order_info->coupon_use)."</b>)";
	    }
			?>
		 </table>

    </td>
  </tr>
  <tr>
    <td height="38" background="/images/form_bar_bg2.gif">&nbsp;[배송비 : <?=$deliver_msg?>]</td>
    <td align="right" background="/images/form_bar_bg2.gif">
	   상품(<b><?=number_format($order_info->prd_price)?>원</b>)  <?=$discount_msg?>
	   + 배송비(<b><?=number_format($order_info->deliver_price)?>원</b>) <?=$coupon_msg?> <?=$reserve_msg?>
	   = 주문합계 <span class="price"><?=number_format($order_info->total_price)?>원</span> &nbsp;
    </td>
  </tr>
</table>