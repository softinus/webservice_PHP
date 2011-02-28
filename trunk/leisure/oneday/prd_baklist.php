<?

$buy_mininum = $prd_info->buy_mininum;
$buy_maxnum = $prd_info->buy_maxnum;
$isdeliver = $prd_info->isdeliver;

//배송관련정보
$deliver_method = $oper_info->del_method;

if($isdeliver == "Y"){
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
}else{
	$amount_per = 0;
	$del_staprice2 = 0;
	$del_staprice3 = 0;
}



if($prdno == ""){
	$prdno=1;
}

if($selopt != ""){
	$arrSelOpt = explode("|", $selopt);
}


if($selamount != ""){
	$arrSelAmount = explode("|", $selamount);
}
?>
<script language="JavaScript" src="/js/util_lib.js"></script>
<script language="javascript">
<!--
// 수량체크
function addThisProduct(prdno, obj){
	var isFirst = true;
	var isFirst2= true;
	var optvalue = "";
	var amount = "";
	for(var i=0; i<document.forms.length; i++){
		if(document.forms[i].goods){
			if(document.forms[i].optcode){
				if(isFirst == true){
					optvalue += document.forms[i].optcode.options[document.forms[i].optcode.selectedIndex].value;
					isFirst = false;
				}else{
					optvalue += "|"+document.forms[i].optcode.options[document.forms[i].optcode.selectedIndex].value;
				}
			}
			if(document.forms[i].amount){
				if(isFirst2 == true){
					amount += document.forms[i].amount.options[document.forms[i].amount.selectedIndex].value;
					isFirst2 = false;
				}else{
					amount += "|"+document.forms[i].amount.options[document.forms[i].amount.selectedIndex].value;
				}
			}
		}
	}
	location.href="order_form.php?prdcode=<?=$prdcode?>&prdno="+prdno+"&selopt="+optvalue+"&selamount="+amount;
}

var amount_per = <?=$amount_per?>;
var del_staprice2 = <?=$del_staprice2?>;
var del_staprice3 = <?=$del_staprice3?>;

function checkAmount(frm){
	var amount = frm.amount.value;
	if(!Check_Num(amount)){
		frm.amount.value = "1";
	}
}

// 가격설정
function setprice(){

	var prdprice = 0;
	var mileage = 0;
	var amount = 0;
	var addprice = 0;
	var totalprice = 0;

	for(var i=0; i<document.forms.length; i++){
		if(document.forms[i].goods){
			onPrdprice = document.forms[i].sellprice.value;
			onAddPrice = document.forms[i].addprice.value;
			onMileage = document.forms[i].mileage.value;
			onAmount  = document.forms[i].amount.value;
			if(document.forms[i].addprice.value != ""){
				onPrdprice = parseInt(onPrdprice,10) + parseInt(onAddPrice,10)
			}
			if(onAddPrice != ""){
				addprice = addprice + parseInt(onAddPrice,10);
			}
			totalprice = totalprice + ( onPrdprice * parseInt(onAmount,10) )
	

			if(amount_per > (totalprice)){
				var del_price = del_staprice3;
			}else{
				var del_price = del_staprice2;
			}
		}
	}
	var last_totalprice = del_price + totalprice;
	document.getElementById("prdprice").innerHTML = won_Comma(totalprice)+"원";			// 상품가격
	document.getElementById("deliprice").innerHTML = won_Comma(del_price)+"원";				// 배송가격
	document.getElementById("totalprice").innerHTML = won_Comma(last_totalprice)+"원";		// 전체가격

	document.frm.total_price.value = last_totalprice;
	document.frm.optprice.value = addprice;
}

// 수량변경

var arrAddPrice = [];
var arrReserve = [];
var arrAmount =[];
var arroptcode = [];
var arroptcode2 = [];
var arroptcode3 = [];
var arroptcode4 = [];
var arroptcode5 = [];
var arroptcode6 = [];
var arroptcode7 = [];

function change_amount(formObj, no){
	var amount = parseInt(formObj.amount.value,10);
	var price = parseInt(formObj.sellprice.value,10);

	if(formObj.addprice.value != ""){
		var addPrice = parseInt(formObj.addprice.value,10);
		price = price + addPrice;
	}


	arrAmount[no] = amount;
	if(amount_per > (amount*price)){
		var del_price = del_staprice3;
	}else{
		var del_price = del_staprice2;
	}

	document.frm.amount.value = "";
	var isFirst =true;
	for(var i=0; i<arrAmount.length; i++){

		if(isFirst==true){

			if(arrAmount[i]){
				document.frm.amount.value += arrAmount[i];
			}else{
				document.frm.amount.value += "1";
			}
			isFirst=false;
		}else{
			if(arrAmount[i]){
				document.frm.amount.value += ","+arrAmount[i];
			}else{
				document.frm.amount.value += ",1";
			}
		}
	}

	setprice();
}


function checkOpt01(obj, formObj, no){
//	if(obj.selectedIndex != 0){

		// 현재 복수구매로 추가된 상품들의 중복옵션 체크
		var selopt = obj.options[obj.selectedIndex].value;
		for(var j=0; j<document.forms.length; j++){
			if(document.forms[j].goods){
				if(document.forms[j].optcode){
					if(document.forms[j].optcode.options[document.forms[j].optcode.selectedIndex].value == selopt && obj != document.forms[j].optcode){
						alert("이미 선택한 옵션 입니다.");
						obj.selectedIndex = 0;
						return;
					}
				}
			}
		}

		var selectOpt = obj.value;
		var arrSelOpt = selectOpt.split("^");
		var addPrice = parseInt(arrSelOpt[1]);
		var addMileage = parseInt(arrSelOpt[2]);
		var limitno = parseInt(arrSelOpt[3]);		// 현재 남은 재고
		var minno = parseInt(arrSelOpt[4]);		// 선택옵션 최소구매수량
		var maxno = parseInt(arrSelOpt[5]);		// 선택옵션 최대구매수량



		/* 옵션별 구매수량 */
		if(limitno < maxno && obj.selectedIndex != 0){		// 재고량, 최대구매수량 체크 재고가 최대구매수량보다 작으면 재고만큼만 출력, 단 셀렉트 인덱스 라벨이 0일경우에는 체크안함
			maxno = limitno
		}


		var changeAmountObj = formObj.amount	// 현재 폼의 수량
		if(changeAmountObj.tagName=="SELECT"){
			changeAmountObj.options.length = 0;		// 현재 폼의 수량 초기화

			for(var i=1; i<=maxno; i++){
				changeAmountObj.options[i-1] = new Option(i,i);
			}
		}else{
		}
		formObj.addprice.value = addPrice;

		var prdprice = parseInt(formObj.sellprice.value,10);
		var amount = parseInt(formObj.amount.value,10);
		var mileage = parseInt(formObj.mileage.value,10);

		var changePrdPrice = prdprice + addPrice;
		var changeMileage = mileage + addMileage;
		var changeTotalPrice = changePrdPrice * amount

		arrAddPrice[no] = addPrice;
		arrReserve[no] = addMileage;
		eval("arr"+obj.name)[no] = obj.value
		arrAmount[no] = amount;

		var isFirst = true;
		document.frm.opt_price.value = "";
		document.frm.opt_reserve.value = "";
		eval("document.frm."+obj.name).value = "";
		document.frm.amount.value = "";

		for(var i=0; i<arrAddPrice.length; i++){
			if(isFirst==true){
				if(arrAddPrice[i] || eval("arr"+obj.name)[i]){
					document.frm.opt_price.value += arrAddPrice[i];
					document.frm.opt_reserve.value += arrReserve[i];
					eval("document.frm."+obj.name).value += eval("arr"+obj.name)[i];
					document.frm.amount.value += arrAmount[i];
				}else{
					document.frm.opt_price.value += "0";
					document.frm.opt_reserve.value += "0";
					eval("document.frm."+obj.name).value += "";
					document.frm.amount.value += "1";
				}
				isFirst=false;
			}else{
				if(arrAddPrice[i] || eval("arr"+obj.name)[i]){
					document.frm.opt_price.value += ","+arrAddPrice[i];
					document.frm.opt_reserve.value += ","+arrReserve[i];
					eval("document.frm."+obj.name).value += ","+eval("arr"+obj.name)[i];
					document.frm.amount.value += ","+arrAmount[i];
				}else{
					document.frm.opt_price.value += ",0";
					document.frm.opt_reserve.value += ",0";
					eval("document.frm."+obj.name).value += ",";
					document.frm.amount.value += ",1";
				}
			}
		}
		setprice();
//	}
	formObj.amount.selectedIndex = 0;
}
function checkOpt02(obj,formObj,no){
	


}


function checkOpt(){
	var k=0;
	for(var i=0; i<document.forms.length; i++){
		if(document.forms[i].optcode){
			if(document.forms[i].optcode.tagName=="SELECT"){
				checkOpt01(document.forms[i].optcode, document.forms[i], k);
				k++;
			}
		}
	}
}
-->
</script>
<form name="addprd" method="get" action="<?=$PHP_SELF?>">
	<input type="hidden" name="prdcode" value="<?=$prdcode?>" />
	<input type="hidden" name="prdno" value="" />
</form>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tr>
		<td colspan="2">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td background="/images/form_bar_bg1.gif" width="15%" height="39" align="center">이미지</td>
					<td background="/images/form_bar_bg1.gif" width="30%" align="center">구매상품정보</td>
					<td background="/images/form_bar_bg1.gif" width="25%" align="center">옵션</td>
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

// buy_mininum , buy_maxnum

$tal_price = 0;
for($pp=0; $pp<$prdno; $pp++){

$sql = "select * from wiz_dayproduct where prdcode='$prdcode'";
$btresult = mysql_query($sql) or error(mysql_error());
while($brow = mysql_fetch_array($btresult)){
	$buy_mininum = $brow[buy_mininum];
	$buy_maxnum = $brow[buy_maxnum];
	$tal_price = $tal_price + $brow[sellprice];	// 상품가격.
	$prdimg = "/data/prdimg/".$brow["prdimg_S1"];
	$arrOpts = explode("^",$arrSelOpt[$pp]);

	$maxgoodsno = count(explode("^^",$brow[optvalue]));		// 옵션 최대갯수 + 1
	/*옵션 최대갯수와 현재 보여지는 상품갯수 비교하여 옵션의 최대갯수보다 상품수가 많을시*/
	if($prdno >= $maxgoodsno){
		echo "<script>alert('잘못된 접근방식 입니다.'); history.back(-1);</script>";
		die();
	}

?>
<form method="post">
	<input type="hidden" name="goods" value="Y">
	<input type="hidden" name="mode" value="update">
	<input type="hidden" name="prdcode" value="<?=$brow[prdcode]?>">
	<input type="hidden" name="sellprice" value="<?=$brow[sellprice]?>">
	<input type="hidden" name="idx" value="<?=$brow[idx]?>">
	<input type="hidden" name="mileage" value="<?=$brow[reserve]?>" />
	<input type="hidden" name="addprice" value="" />
				<tr>
					<td style="padding:5" align=center><a href="/shop/prd_view.php?prdcode=<?=$brow[prdcode]?>" target="prdview"><img src="<?=$prdimg?>" width="50" height="50" border="0"></a></td>
					<td>
						<a href="/?yy=<?=$yy?>&mm=<?=$mm?>&dd=<?=$dd?>" target="prdview"><?=$brow[prdname]?></a>
					</td>
					<td class="price" align="right">


<!-- 옵션-->
<table border="0">


<? if($brow[opttitle5] != ""){ ?>
	<tr>
		<td height=25 width=100 align="right"><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;<?=$brow[opttitle5]?></td>
		<td>:&nbsp;&nbsp;
			<select name="optcode5" onchange="checkOpt01(this,this.form,'<?=$pp?>')">
				<option value="^0^0^<?=$buy_maxnum?>^<?=$buy_mininum?>^<?=$buy_maxnum?>"> 선택하세요 </option>
				<?
				$opt_list = explode(",",$brow[optcode5]);
				for($ii=0; $ii<count($opt_list); $ii++){
					echo "<option value='".$opt_list[$ii]."^0^0"."^".$buy_maxnum."^".$buy_mininum."^".$buy_maxnum."''>".$opt_list[$ii]."\n";
				}
				?>
			</select>
		</td>
	</tr>
<? } ?>

<? if($brow[opttitle6] != ""){ ?>
	<tr>
		<td height=25 width=100 align="right"><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;<?=$brow[opttitle6]?></td>
		<td>:&nbsp;&nbsp;
			<select name="optcode6" onchange="checkOpt01(this,this.form,'<?=$pp?>')">
				<option value="^0^0^<?=$buy_maxnum?>^<?=$buy_mininum?>^<?=$buy_maxnum?>"> 선택하세요 </option>
				<?
				$opt_list = explode(",",$brow[optcode6]);
				for($ii=0; $ii<count($opt_list); $ii++){
					echo "<option value='".$opt_list[$ii]."^0^0"."^".$buy_maxnum."^".$buy_mininum."^".$buy_maxnum."''>".$opt_list[$ii]."\n";
				}
				?>
			</select>
		</td>
	</tr>
<? } ?>

<? if($brow[opttitle7] != ""){ ?>
	<tr>
		<td height=25 width=100 align="right"><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;<?=$brow[opttitle7]?></td>
		<td>:&nbsp;&nbsp;
			<select name="optcode7" onchange="checkOpt01(this,this.form,'<?=$pp?>')">
				<option value="^0^0^<?=$buy_maxnum?>^<?=$buy_mininum?>^<?=$buy_maxnum?>"> 선택하세요 </option>
				<?
				$opt_list = explode(",",$brow[optcode7]);
				for($ii=0; $ii<count($opt_list); $ii++){
					echo "<option value='".$opt_list[$ii]."^0^0"."^".$buy_maxnum."^".$buy_mininum."^".$buy_maxnum."''>".$opt_list[$ii]."\n";
				}
				?>
			</select>
		</td>
	</tr>
<? } ?>

<? if($brow[opttitle3] != ""){ ?>
	<tr>
		<td height=25 width=100 align="right"><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;<?=$brow[opttitle3]?></td>
		<td>:&nbsp;&nbsp;
			<select name="optcode3" onChange="checkOpt01(this, this.form,<?=$pp?>)">
				<option value="0^0^0^0^<?=$buy_mininum?>^<?=$buy_maxnum?>^"> 선택하세요 </option>
				<?
				$opt_list = explode("^^",$brow[optcode3]);
				for($ii=0; $ii<count($opt_list) - 1; $ii++){
					list($opt, $price, $reserve) = explode("^", $opt_list[$ii]);
					if($price > 0) $price_tmp = " : ".number_format($price)."원 추가";
					else $price_tmp = "";
					echo "<option value='".$opt."^".$price."^".$reserve."^".$buy_maxnum."^".$buy_mininum."^".$buy_maxnum."'>".$opt.$price_tmp."\n";
				}
				?>
			</select>
		</td>
	</tr>
<? } ?>

<? if($brow[opttitle4] != ""){ ?>
	<tr>
		<td height=25 width=100 align="right"><img src="/images/view_list_icon.gif" align=absmiddle>&nbsp;&nbsp;<?=$brow[opttitle4]?></td>
		<td>:&nbsp;&nbsp;
			<select name="optcode4" onChange="checkOpt01(this, this.form,<?=$pp?>)">
				<option value="0^0^0^0^<?=$buy_mininum?>^<?=$buy_maxnum?>^"> 선택하세요 </option>
				<?
				$opt_list = explode("^^",$brow[optcode4]);
				for($ii=0; $ii<count($opt_list) - 1; $ii++){
					list($opt, $price, $reserve) = explode("^", $opt_list[$ii]);
					if($price > 0) $price_tmp = " : ".number_format($price)."원 추가";
					else $price_tmp = "";
					echo "<option value='".$opt."^".$price."^".$reserve."^".$buy_maxnum."^".$buy_mininum."^".$buy_maxnum."'>".$opt.$price_tmp."\n";
				}
				?>
			</select>
		</td>
	</tr>
<? } ?>

<?

if($brow[opt_use] == "Y" && (!empty($brow[opttitle]) || !empty($brow[opttitle2]) )){
	if(!empty($brow[opttitle]) && !empty($brow[opttitle2])) $brow[opttitle2] = "/".$brow[opttitle2];
?>
	<tr>
		<td height=25 width=100 align="right"><!--<?=$brow[opttitle]?><?=$brow[opttitle2]?>--></td>
		<td>&nbsp;&nbsp;
<?php
$opt1_arr = explode("^", $brow[optcode]);
$opt2_arr = explode("^", $brow[optcode2]);
$opt_tmp = explode("^^", $brow[optvalue]);
if(count($opt1_arr)-1 < 1) $opt1_cnt = 1;
else $opt1_cnt = count($opt1_arr) - 1;
if(count($opt2_arr)-1 < 1) $opt2_cnt = 1;
else $opt2_cnt = count($opt2_arr) - 1;
$no = 0;
for($ii = 0; $ii < $opt1_cnt; $ii++) {
	for($jj = 0; $jj < $opt2_cnt; $jj++) {
		list($price, $reserve, $stock, $minno, $maxno) = explode("^", $opt_tmp[$no]);
		$optcode[$no][optcode] = $opt1_arr[$ii];
		if(!empty($opt1_arr[$ii]) && !empty($opt2_arr[$jj])) $optcode[$no][optcode] .= "/";
		$optcode[$no][optcode] .= $opt2_arr[$jj];
		$optcode[$no][price] = $price;
		$optcode[$no][reserve] = $reserve;
		$optcode[$no][stock] = $stock;
		$optcode[$no][minno] = $minno;
		$optcode[$no][maxno] = $maxno;

		$no++;
	}
}
?>
			<select name="optcode" onChange="checkOpt01(this, this.form,<?=$pp?>);">
				<option value="0^0^0^0^<?=$buy_mininum?>^<?=$buy_maxnum?>^"> 선택하세요 </option>
				<?
				for($ii=0; $ii<count($optcode); $ii++){
					$opt_sub_value = $optcode[$ii][optcode]."^".$optcode[$ii][price]."^".$optcode[$ii][reserve]."^".$optcode[$ii][stock]."^".$optcode[$ii][minno]."^".$optcode[$ii][maxno];

					if($optcode[$ii][price] > 0) $optcode[$ii][price] = " : ".number_format($optcode[$ii][price])."원 추가  ";
					else $optcode[$ii][price] = "";

					if($optcode[$ii][stock] <= 0) $optcode[$ii][stock] = " [품절]";
					else $optcode[$ii][stock] = "[ 재고 : ".$optcode[$ii][stock]."개 남음]";

					$opt_sub_txt = $optcode[$ii][optcode].$optcode[$ii][price].$optcode[$ii][stock];
					if($optcode[$ii][stock] != " [품절]"){
						if($opt_sub_value==$arrSelOpt[$pp]){
							echo "<option value='$opt_sub_value' selected>$opt_sub_txt\n";
						}else{
							echo "<option value='$opt_sub_value'>$opt_sub_txt\n";
						}
					}
				}
				?>
			</select>
		</td>
	</tr>
<? } ?>
</table>

<!--옵션끝-->
					</td>
					<td class="price" align=center><span><?=number_format($brow[sellprice])?>원</span></td>
					<td align=center>
<?
if(empty($arrOpts[4]) && empty($arrOpts[5])){
	$start = $buy_mininum;
	$end = $buy_maxnum;
}else{
	$start = $arrOpts[4];
	if($arrOpts[3] >= $arrOpts[5]){
		$end = $arrOpts[5];
	}else{
		$end = $arrOpts[3];
	}
}
?>
						<?if($start==1 && $end==1){?>
						<input type="hidden" name="amount" value="1" /> 1
						<?}else{?>
						<select name="amount" onchange="change_amount(this.form,'<?=$pp?>')">
						<?
							for($i=$start; $i<=$end; $i++){
						?>
							<option <?if($arrSelAmount[$pp]==$i){?>selected<?}?> value="<?=$i?>"><?=$i?></option>
						<?
						}
						?>
						</select>
						<?}?>

<?
$addProduct = $prdno + 1;		// 복수구매-추가
$delProduct = $prdno - 1;		// 복수구매-삭제

if($addProduct == $maxgoodsno){
	$add_msg = "alert('더 이상 복수구매가 불가능 합니다.');";
}else{
	$add_msg = " addThisProduct('".($prdno+1)."', this )";
}
?>

						<?/*if($pp == 0){?>
						<img src="/images/btnMulti.gif" width="49" height="15" border="0" onclick="<?=$add_msg?>" style="cursor:pointer" />
						<?}else{?>
						<img src="/images/btn_delete_s.gif"  border="0" onclick="addThisProduct('<?=($prdno-1)?>')" style="cursor:pointer"  />
						<?}*/?>
					</td>
					<td align=center><span id="mileage"><?=number_format($brow[reserve])?>원</span></td>
				</tr>
				<tr>
					<td colspan=7 height=1 bgcolor='#E5E5E5'></td>
				</tr>
</form>
<?
$no++;

}
}

// 회원할인 [$discount_msg 메세지 생성]
$discount_price = level_discount($wiz_session[level],$prd_price);


// 배송비
if($isdeliver  == "Y"){
	$deliver_price = deliver_price2($tal_price, $oper_info);
}else{
	$deliver_price = "0";
}

// 전체결제금액
$total_price = $tal_price + $deliver_price;
?>
			</table>
		</td>
	</tr>
	<tr>
		<td height="38" background="/images/form_bar_bg2.gif"><?if($isdeliver=="Y"){?>&nbsp;[배송비 : <?=$deliver_msg?>]<?}?></td>
		<td align="right" background="/images/form_bar_bg2.gif">
			상품(<strong id="prdprice"><?=number_format($tal_price)?>원</strong>)
			<?if($isdeliver=="Y"){?> + 배송비(<b id="deliprice"><?=number_format($deliver_price)?>원</b>) =
			<?}else{?><span id="deliprice" style="display:none">0</span> = <?}?>
			주문합계 <strong class="price" id="totalprice"><?=number_format($total_price)?>원</strong>&nbsp;
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