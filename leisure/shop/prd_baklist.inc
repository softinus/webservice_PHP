<?
//배송관련정보
$deliver_method = $oper_info->del_method;

if($deliver_method=="DA"){
	$amount_per = 0;
	$del_staprice2 = 0;
	$del_staprice3 = 0;
}else if($deliver_method=="DB"){
	$amount_per = 0;
	$del_staprice2 = 0;
	$del_staprice3 = 0;
}else if($deliver_method=="DC"){
	$amount_per = 0;
	$del_staprice2 = $oper_info->del_fixprice;
	$del_staprice3 = $oper_info->del_fixprice;
}else if($deliver_method=="DD"){
	$amount_per = $oper_info->del_staprice;
	$del_staprice2 = $oper_info->del_staprice2;
	$del_staprice3 = $oper_info->del_staprice3;
}
?>
<script language="JavaScript" src="/js/util_lib.js"></script>
<script language="javascript">
<!--
// 수량체크

var amount_per = <?=$amount_per?>;
var del_staprice2 = <?=$del_staprice2?>;
var del_staprice3 = <?=$del_staprice3?>;

function checkAmount(frm){
	var amount = frm.amount.value;
	if(!Check_Num(amount)){
		frm.amount.value = "1";
	}
}

// 수량변경

function change_amount(formObj){
	var amount = parseInt(formObj.amount.value,10);
	var price = parseInt(formObj.sellprice.value,10);

	if(amount_per > (amount*price)){
		var del_price = del_staprice3;
	}else{
		var del_price = del_staprice2;
	}

	document.getElementById("prdprice").innerHTML = won_Comma(amount * price)+"원";			// 상품가격
	document.getElementById("deliprice").innerHTML = won_Comma(del_price)+"원";				// 배송가격
	document.getElementById("totalprice").innerHTML = won_Comma((amount * price)+del_price)+"원";	// 전체가격

	document.frm.amount.value = amount;					// DB 저장할 주문 수량
	document.frm.total_price.value = (amount * price)+del_price;		// DB 저장할 총 가격
}

-->
</script>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td colspan="2">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td background="/images/form_bar_bg1.gif" width="15%" height="39" align="center">이미지</td>
					<td background="/images/form_bar_bg1.gif" width="45%" align="center">구매상품정보</td>
					<td background="/images/form_bar_bg1.gif" width="10%" align="center">제품가격</td>
					<td background="/images/form_bar_bg1.gif" width="10%" align="center">수 량</td>
					<td background="/images/form_bar_bg1.gif" width="10%" align="center">적립금</td>
				</tr>
<?
$basket_exist = false;
$no = 0;
$buydate = explode("-",$buy_date);
$yy = $buydate[0];
$mm = $buydate[1];
$dd = $buydate[2];


//$sql = "SELECT wb.*, wp.del_type, wp.del_price FROM wiz_basket_tmp as wb left join wiz_product as wp on wb.prdcode = wp.prdcode WHERE wb.uniq_id='".$_COOKIE["uniq_id"]."'";
$sql = "select * from wiz_product where prdcode='$prdcode'";
$btresult = mysql_query($sql) or error(mysql_error());
$tal_price = 0;

while($brow = mysql_fetch_array($btresult)){
	$buy_mininum = $brow[buy_mininum];
	$buy_maxnum = $brow[buy_maxnum];
	$tal_price = $tal_price + $brow[sellprice];	// 상품가격.
?>
<form method="post">
	<input type="hidden" name="mode" value="update">
	<input type="hidden" name="prdcode" value="<?=$brow[prdcode]?>">
	<input type="hidden" name="sellprice" value="<?=$brow[sellprice]?>">
	<input type="hidden" name="idx" value="<?=$brow[idx]?>">
				<tr>
					<td style="padding:5" align=center><a href="/shop/prd_view.php?prdcode=<?=$brow[prdcode]?>" target="prdview"><img src="<?=$prdimg?>" width="50" height="50" border="0"></a></td>
					<td>
						<a href="/?yy=<?=$yy?>&mm=<?=$mm?>&dd=<?=$dd?>" target="prdview"><?=$brow[prdname]?></a><br><?=$optcode?><?=$del_type?>
					</td>
					<td class="price" align=center><?=number_format($brow[sellprice])?>원</td>
					<td align=center>
						<select name="amount" onchange="change_amount(this.form)">
						<?
						for($i=$buy_mininum; $i<=$buy_maxnum; $i++){
						?>
							<option value="<?=$i?>"><?=$i?></option>
						<?
						}
						?>
						</select>
					</td>
					<td align=center><?=number_format($brow[reserve])?>원</td>
				</tr>
				<tr>
					<td colspan=7 height=1 bgcolor='#E5E5E5'></td>
				</tr>
</form>
<?
$no++;

}


// 회원할인 [$discount_msg 메세지 생성]
$discount_price = level_discount($wiz_session[level],$prd_price);

// 배송비
$deliver_price = deliver_price($tal_price, $oper_info);

// 전체결제금액
$total_price = $tal_price + $deliver_price;

?>
			</table>
		</td>
	</tr>
	<tr>
		<td height="38" background="/images/form_bar_bg2.gif">&nbsp;[배송비 : <?=$deliver_msg?>]</td>
		<td align="right" background="/images/form_bar_bg2.gif">
			상품(<strong id="prdprice"><?=number_format($tal_price)?>원</strong>) +
			배송비(<b id="deliprice"><?=number_format($deliver_price)?>원</b>) =
			주문합계 <span class="price" id="totalprice"><?=number_format($total_price)?>원</span>&nbsp;
		</td>
	</tr>
</table>
<script language="JavaScript">
<!--
function printEstimate(){
	var uri = "print_estimate.php";
	window.open(uri, "printEstimate", "width=667,height=600,scrollbars=yes, top=30, left=50");
}
-->
</script>