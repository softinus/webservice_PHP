<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<title>주문서 출력</title>
<link href="/admin/style.css" rel="stylesheet" type="text/css">
</head>

<body onLoad="this.focus();print();">
<?php
if(empty($selorder)) {
	error("출력할 주문서가 선택되지 않았습니다.","");
} else {

	$order_list = explode("|", $selorder);
	$search_sql = " and (";
	for($ii = 0; $ii < count($order_list); $ii++) {
		if(!empty($order_list[$ii])) {
			if($ii > 0) $search_sql .= " or ";
			$search_sql .= " orderid = '$order_list[$ii]' ";
		}
	}
	$search_sql .= ")";

	$sql = "select * from wiz_order where orderid != '' $search_sql";
	$result = mysql_query($sql) or error(mysql_error());

	$no = 0;
	
	while($order_info = mysql_fetch_array($result)) {

		$discount_msg = "";
		$reserve_msg = "";
		$coupon_msg = "";
		
		$order_info[demand] = str_replace("\n", "<br>", trim($order_info[demand]));
		$order_info[cancelmsg] = str_replace("\n", "<br>", trim($order_info[cancelmsg]));
		$order_info[descript] = str_replace("\n", "<br>", trim($order_info[descript]));
		
		if($no > 0) echo "<p class=break><br style=\"height:0; line-height:0\"></p>";
?>
<table width="100%">
	<tr>
		<td height="25"><b>+ 주문상품</b></td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="1" cellpadding="6" bgcolor="#000000">
  <tr>
    <td width="10%" height="27" align="center" class="t_value">상품코드</td>
    <td align="center" class="t_value">상품명</td>
    <td width="70" align="center" class="t_value">상품가격</td>
    <td width="90" align="center" class="t_value">옵션</td>
    <td width="70" align="center" class="t_value">수량</td>
    <td width="70" align="center" class="t_value">적립금</td>
    <td width="60" align="center" class="t_value">취소</td>
  </tr>
  <?
 $orderid = $order_info[orderid];
 $b_sql = "select * from wiz_basket where orderid = '$orderid'";
 $b_result = mysql_query($b_sql) or error(mysql_error());
 $b_total = mysql_num_rows($b_result);

 while($b_row = mysql_fetch_object($b_result)){
 	if($b_row->prdimg == "") $b_row->prdimg = "/images/noimage.gif";
	else $b_row->prdimg = "/data/prdimg/$b_row->prdimg";

 	$prd_price += $b_row->prdprice*$b_row->amount;
 	$reserve_price += $b_row->prdreserve*$b_row->amount;
?>
 	<tr class="t_value">
    <td height="30" align="center"><?=$b_row->prdcode?></td>
    <td>
    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
    		<tr>
    			<td><img src='<?=$b_row->prdimg?>' width='50' height='50' border='0'></td>
    			<td><?=$b_row->prdname?></td>
    		</tr>
    	</table>
    </td>
    <td align="center"><?=number_format($b_row->prdprice)?>원</td>
    <td align="center">
  <?
  /*
	if($b_row->opttitle != '') echo "$b_row->opttitle : $b_row->optcode <br>";
	if($b_row->opttitle2 != '') echo "$b_row->opttitle2 : $b_row->optcode2 <br>";
	if($b_row->opttitle3 != '') echo "$b_row->opttitle3 : $b_row->optcode3 <br>";
	*/
	if($b_row->opttitle2 != '') $b_row->opttitle2 = "/".$b_row->opttitle2;
	if($b_row->optcode2 != '') $b_row->optcode2 = "/".$b_row->optcode2;

	if($b_row->opttitle != '') echo $b_row->opttitle.$b_row->opttitle2." : ".$b_row->optcode.$b_row->optcode2." <br>";
	if($b_row->opttitle3 != '') echo "$b_row->opttitle3 : $b_row->optcode3 <br>";
	if($b_row->opttitle4 != '') echo "$b_row->opttitle4 : $b_row->optcode4 <br>";
	if($b_row->opttitle5 != '') echo "$b_row->opttitle5 : $b_row->optcode5 <br>";
	if($b_row->opttitle6 != '') echo "$b_row->opttitle6 : $b_row->optcode6 <br>";
	if($b_row->opttitle7 != '') echo "$b_row->opttitle7 : $b_row->optcode7 <br>";
 ?>
    </td>
    <td align="center"><?=$b_row->amount?></td>
    <td align="center"><?=number_format($b_row->prdreserve*$b_row->amount)?>원</td>
    <td align="center">
<?
if(!strcmp($b_row->status, "CA") || !strcmp($b_row->status, "CI") || !strcmp($b_row->status, "CC")) {
	if(!strcmp($b_row->status, "CA")) $basket_status = "취소신청";
	else if(!strcmp($b_row->status, "CI")) $basket_status = "처리중";
	else if(!strcmp($b_row->status, "CC")) $basket_status = "취소완료";
?>
						<?=$basket_status?>
<?
}
?>
    </td>
  </tr>
  <?
  }
  // 회원할인
  if($order_info[discount_price] > 0){
  	$discount_msg = " - 회원할인( <b><font color=#ED1C24>".number_format($order_info[discount_price])."원</font></b> )";
  }
  // 적립금 사용
	if($order_info[reserve_use] > 0){
		$reserve_msg = " - 적립금 사용(<b><font color=#ED1C24>".number_format($order_info[reserve_use])."원</font></b>)";
	}

	// 쿠폰사용
	if($order_info[coupon_use] > 0){
		$coupon_msg = " - 쿠폰 사용(<b><font color=#ED1C24>".number_format($order_info[coupon_use])."원</font></b>)";
	}
	
  ?>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="38">
  <tr><td height="10"></td></tr>
  <tr>
  	<td><b>배송비 : <?=deliver_name($order_info[deliver_method])?></b></td>
    <td align="right">
    상품합계( <b><font color="#ED1C24"><?=number_format($order_info[prd_price])?>원</font></b> )
    <?=$discount_msg?>
     + 배송비( <b><font color="#ED1C24"><?=number_format($order_info[deliver_price])?>원</font></b>)
     <?=$coupon_msg?><?=$reserve_msg?>

    =
    <b><font color="#000000">총 결제금액 :</font> <font color="#ED1C24"><?=number_format($order_info[total_price])?>원</font></b>
    </td>
  </tr>
  <tr><td height="10"></td></tr>
</table>
<table width="100%">
	<tr>
		<td height="25"><b>+ 주문정보</b></td>
	</tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
			<table width="100%" border="0" cellspacing="1" cellpadding="6" bgcolor="#000000">
			  <tr>
			    <td width="10%" height="30" align="center" class="t_value">주문번호</td>
			    <td width="40%" class="t_value"><?=$orderid?></td>
			    <td width="10%" height="30" align="center" class="t_value">결제방법</td>
			    <td width="40%" class="t_value"><?=pay_method($order_info[pay_method])?></td>
			  </tr>
			  <tr>
			    <td height="30" align="center" class="t_value">주문일자</td>
			    <td class="t_value"><?=$order_info[order_date]?></td>
			    <td height="30" align="center" class="t_value">결제계좌</td>
			    <td class="t_value"><?=$order_info[account]?></td>
			  </tr>
			  <tr>
			    <td height="30" align="center" class="t_value">운송장번호</td>
			    <td class="t_value"><?=$order_info[deliver_num]?></td>
			    <td height="30" align="center" class="t_value">입금인</td>
			    <td class="t_value"><?=$order_info[account_name]?></td>
			  </tr>
			  <tr>
			    <td height="30" align="center" class="t_value">처리상태</td>
			    <td class="t_value"><?=order_status($order_info[status]);?></td>
			    <td height="30" align="center" class="t_value"></td>
			    <td class="t_value"></td>
			  </tr>
			  <tr>
			    <td height="30" align="center" class="t_value">처리시간</td>
			    <td class="t_value" colspan="3">
			      <table width="100%" border="0" cellpadding="0" cellspacing="0">
			        <tr class="t_value">
			          <td width="25%" align="center" height="25">주문접수</td>
			          <td width="25%" align="center">결제완료</td>
			          <td width="25%" align="center">배송완료</td>
			          <td width="25%" align="center">주문취소</td>
			        </tr>
			        <tr>
			          <td align="center" height="25"><? if($order_info[order_date] == "0000-00-00 00:00:00") echo "-"; else echo $order_info[order_date]; ?></td>
			          <td align="center"> <? if($order_info[pay_date] == "0000-00-00 00:00:00") echo "-"; else echo $order_info[pay_date]; ?> </td>
			          <td align="center"> <? if($order_info[send_date] == "0000-00-00 00:00:00") echo "-"; else echo $order_info[send_date]; ?> </td>
			          <td align="center"> <? if($order_info[cancel_date] == "0000-00-00 00:00:00") echo "-"; else echo $order_info[cancel_date]; ?> </td>
			        </tr>
			      </table>
			    </td>
			  </tr>
			</table>
		</td>
  </tr>
</table>
<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="b_title02">+ 배송자정보</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="1" cellpadding="6" bgcolor="#000000">
        <tr>
          <td width="10%" height="30" align="center" class="t_value">주문자명</td>
          <td width="40%" class="t_value"><?=$order_info[send_name]?></td>
          <td width="10%" height="30" align="center" class="t_value">이메일</td>
          <td width="40%" class="t_value"><?=$order_info[send_email]?></td>
        </tr>
        <tr>
          <td height="30" align="center" class="t_value">전화번호</td>
          <td class="t_value"><?=$order_info[send_tphone]?></td>
          <td height="30" align="center" class="t_value">휴대폰</td>
          <td class="t_value"><?=$order_info[send_hphone]?></td>
        </tr>
        <tr>
          <td height="30" align="center" class="t_value">우편번호</td>
          <td class="t_value" colspan="3"><?=$order_info[send_post]?></td>
        </tr>
        <tr>
          <td height="30" align="center" class="t_value">주소</td>
          <td class="t_value" colspan="3"><?=$order_info[send_address]?></td>
        </tr>
      </table></td>
  </tr>
</table>
<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td class="b_title02">+ 수취인정보</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
      <table width="100%" border="0" cellspacing="1" cellpadding="6" bgcolor="#000000">
        <tr>
          <td height="30" align="center" class="t_value">수취인명</td>
          <td class="t_value" colspan="3"><?=$order_info[rece_name]?></td>
        </tr>
        <tr>
          <td width="10%" height="30" align="center" class="t_value">전화번호</td>
          <td width="40%" class="t_value"><?=$order_info[rece_tphone]?></td>
          <td width="10%" height="30" align="center" class="t_value">휴대폰</td>
          <td width="40%" class="t_value"><?=$order_info[rece_hphone]?></td>
        </tr>
        <tr>
          <td height="30" align="center" class="t_value">우편번호</td>
          <td class="t_value" colspan="3"><?=$order_info[rece_post]?></td>
        </tr>
        <tr>
          <td height="30" align="center" class="t_value">주소</td>
          <td class="t_value" colspan="3"><?=$order_info[rece_address]?></td>
        </tr>
        <? if(!empty($order_info[demand])) { ?>
        <tr>
          <td height="30" align="center" class="t_value">요청사항</td>
          <td class="t_value" colspan="3"><?=$order_info[demand]?></td>
        </tr>
        <? } ?>
        <? if(!empty($order_info[cancelmsg])) { ?>
        <tr>
          <td height="30" align="center" class="t_value">주문취소 사유</td>
          <td class="t_value" colspan="3"><?=$order_info[cancelmsg]?></td>
        </tr>
        <? } ?>
        <? if(!empty($order_info[descript])) { ?>
        <tr>
          <td height="30" align="center" class="t_value">관리자메모</td>
          <td class="t_value" colspan="3"><?=$order_info[descript]?></td>
        </tr>
        <? } ?>
      </table></td>
  </tr>
</table>
<?php
		$no++;
	}

}
?>
</body>
</html>
