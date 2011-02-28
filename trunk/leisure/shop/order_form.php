<?

include "../inc/common.inc"; 			// DB컨넥션, 접속자 파악

// 로그인 하지 않은경우 로그인 페이지로 이동
if(empty($wiz_session[id]) && empty($order_guest)){
	echo "<script>document.location='/member/login.php?prev=$PHP_SELF&order=true';</script>";
	exit;
}
$now_position = "<a href=/>Home</a> &gt; 주문하기 &gt; 주문정보 입력";
$page_type = "orderform";

include "../inc/util.inc"; 		   	// 유틸 라이브러리
include "../inc/design_info.inc"; // 디자인 정보
include "../inc/shop_info.inc"; 	// 상점 정보
include "../inc/oper_info.inc"; 	// 운영 정보
include "../inc/mem_info.inc"; 		// 회원 정보
include "../inc/page_info.inc"; 	// 페이지 정보
include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";// 현재위치

// 회원적립금 가져오기
if($oper_info->reserve_use == "Y" && $wiz_session[id] != ""){

	$sql = "select sum(reserve) as reserve from wiz_reserve where memid = '$wiz_session[id]'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
	if($row->reserve == "") $mem_info->reserve = 0;
	else $mem_info->reserve = $row->reserve;

}else{
	$mem_info->reserve = 0;
}

?>
<script language="JavaScript" src="/js/util_lib.js"></script>
<script language="JavaScript">
<!--
function sameCheck(frm){

	if(frm.same_check.checked == true){
		frm.rece_name.value = frm.send_name.value;

		frm.rece_tphone.value = frm.send_tphone.value;
		frm.rece_tphone2.value = frm.send_tphone2.value;
		frm.rece_tphone3.value = frm.send_tphone3.value;

		frm.rece_hphone.value = frm.send_hphone.value;
		frm.rece_hphone2.value = frm.send_hphone2.value;
		frm.rece_hphone3.value = frm.send_hphone3.value;

		frm.rece_post.value = frm.send_post.value;
		frm.rece_post2.value = frm.send_post2.value;
		frm.rece_address.value = frm.send_address.value;
		frm.rece_address2.value = frm.send_address2.value;

	}else{

		frm.rece_name.value = "";
		frm.rece_tphone.value = "";
		frm.rece_tphone2.value = "";
		frm.rece_tphone3.value = "";
		frm.rece_hphone.value = "";
		frm.rece_hphone2.value = "";
		frm.rece_hphone3.value = "";
		frm.rece_post.value = "";
		frm.rece_post2.value = "";
		frm.rece_address.value = "";
		frm.rece_address2.value = "";

	}

}

function inputCheck(frm){

	if(!frm.basket_exist.value) {
		alert("주문할 상품이 없습니다.");
		return false;
	}

	if(frm.send_name.value == ""){
		alert("고객 성명을 입력하세요");
		frm.send_name.focus();
		return false;
	}else{
		if(!Check_nonChar(frm.send_name.value)){
			alert("고객 성명에는 특수문자가 들어갈 수 없습니다");
			frm.send_name.focus();
			return false;
		}
	}

	if(frm.send_tphone.value == ""){
		alert("고객 전화번호를 입력하세요.");
		frm.send_tphone.focus();
		return false;
	}else if(!Check_Num(frm.send_tphone.value)){
		alert("지역번호는 숫자만 가능합니다.");
		frm.send_tphone.focus();
		return false;
	}

	if(frm.send_tphone2.value == ""){
		alert("고객 전화번호를 입력하세요.");
		frm.send_tphone2.focus();
		return false;
	}else if(!Check_Num(frm.send_tphone2.value)){
		alert("국번은 숫자만 가능합니다.");
		frm.send_tphone2.focus();
		return false;
	}

	if(frm.send_tphone3.value == ""){
		alert("고객 전화번호를 입력하세요.");
		frm.send_tphone3.focus();
		return false;
	}else if(!Check_Num(frm.send_tphone3.value)){
		alert("전화번호는 숫자만 가능합니다.");
		frm.send_tphone3.focus();
		return false;
	}


	if(frm.send_email.value == ""){
		alert("고객 이메일을 입력하세요.");
		frm.send_email.focus();
		return false;
	}else if(!check_Email(frm.send_email.value)){
		return false;
	}

	if(frm.send_address.value == ""){
		alert("주문하시는분 주소를 입력하세요");
		frm.send_address.focus();
		return false;
	}
	if(frm.send_address2.value == ""){
		alert("주문하시는분 상세주소를 입력하세요");
		frm.send_address2.focus();
		return false;
	}

	if(frm.rece_name.value == ""){
		alert("받으시는분 성명을 입력하세요");
		frm.rece_name.focus();
		return false;
	}else{
		if(!Check_nonChar(frm.rece_name.value)){
			alert("받으시는분 성명에는 특수문자가 들어갈 수 없습니다");
			frm.rece_name.focus();
			return false;
		}
	}

	if(frm.rece_tphone.value == ""){
		alert("받으시는분 전화번호를 입력하세요.");
		frm.rece_tphone.focus();
		return false;
	}else if(!Check_Num(frm.rece_tphone.value)){
		alert("지역번호는 숫자만 가능합니다.");
		frm.rece_tphone.focus();
		return false;
	}
	if(frm.rece_tphone2.value == ""){
		alert("받으시는분 전화번호를 입력하세요.");
		frm.rece_tphone2.focus();
		return false;
	}else if(!Check_Num(frm.rece_tphone2.value)){
		alert("국번은 숫자만 가능합니다.");
		frm.rece_tphone2.focus();
		return false;
	}
	if(frm.rece_tphone3.value == ""){
		alert("받으시는분 전화번호를 입력하세요.");
		frm.rece_tphone3.focus();
		return false;
	}else if(!Check_Num(frm.rece_tphone3.value)){
		alert("전화번호는 숫자만 가능합니다.");
		frm.rece_tphone3.focus();
		return false;
	}

	if(frm.rece_address.value == ""){
		alert("받으시는분 주소를 입력하세요");
		frm.rece_address.focus();
		return false;
	}
	if(frm.rece_address2.value == ""){
		alert("받으시는분 상세주로를 입력하세요");
		frm.rece_address2.focus();
		return false;
	}

	var pay_checked = false;
	for(ii=0;ii<frm.pay_method.length;ii++){
		if(frm.pay_method[ii].checked == true){
			pay_checked = true;
		}
	}

	if(pay_checked == false){
		alert("결제방법을 선택하세요");
		return false;
	}

	<? if(!strcmp($oper_info->tax_use, "Y")) { ?>

	if(frm.tax_type[1].checked == true) {

		if(frm.com_num.value == ""){
			alert("사업자 번호를 입력하세요");
			frm.com_num.focus();
			return false;
		}
		if(frm.com_name.value == ""){
			alert("상호를 입력하세요");
			frm.com_name.focus();
			return false;
		}
		if(frm.com_owner.value == ""){
			alert("대표자를 입력하세요");
			frm.com_owner.focus();
			return false;
		}
		if(frm.com_address.value == ""){
			alert("사업장 소재지를 입력하세요");
			frm.com_address.focus();
			return false;
		}
		if(frm.com_kind.value == ""){
			alert("업태를 입력하세요");
			frm.com_kind.focus();
			return false;
		}
		if(frm.com_class.value == ""){
			alert("종목을 입력하세요");
			frm.com_class.focus();
			return false;
		}
		if(frm.com_tel.value == ""){
			alert("전화번호를 입력하세요");
			frm.com_tel.focus();
			return false;
		}
		if(frm.com_email.value == ""){
			alert("이메일을 입력하세요");
			frm.com_email.focus();
			return false;
		}

	}

	<? } ?>
	if(!reserveUse(frm)){
		return false;
	}

}

// 주문자 우편번호
function zipSearch(){

	document.frm.send_address.focus();
	var url = "/member/zip_search.php?kind=send_";
	window.open(url, "zipSearch", "height=300, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=50, top=50");

}

// 수령자 우편번호
function zipSearch2(){

	document.frm.rece_address.focus();
	var url = "/member/zip_search.php?kind=rece_";
	window.open(url, "zipSearch2", "height=300, width=367, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=50, top=50");

}

// 적립금 사용
function reserveUse(frm){

	if(frm.reserve_use != null){

		var reserve_use = frm.reserve_use.value;
		var total_price = frm.total_price.value;

		if(reserve_use != ""){

		   if(reserve_use != "" && !Check_Num(reserve_use)){

		      alert("적립금은 숫자만 가능합니다.");
		      frm.reserve_use.value = "";
		      frm.reserve_use.focus();
		      return false;

		   }else{

		      reserve_use = eval(reserve_use);
		      total_price = eval(total_price);

		   }

		   if(reserve_use > <?=$mem_info->reserve?>){

		      alert("사용가능액 보다 많습니다.");
		      frm.reserve_use.value = "";
		      frm.reserve_use.focus();
		      return false;

		   }else if(reserve_use > total_price){

		   	alert("주문금액 보다 많습니다.");
		      frm.reserve_use.value = "";
		      frm.reserve_use.focus();
		      return false;

		   }else if(reserve_use < <?=$oper_info->reserve_min?>){

		   	alert("최소사용 적립금 보다 작습니다. <?=number_format($oper_info->reserve_min)?>원 이상 사용가능합니다.");
		      frm.reserve_use.value = "";
		      return false;

		   }else if(reserve_use > <?=$oper_info->reserve_max?>){

		   	alert("최대사용 적립금 보다 큽니다. <?=number_format($oper_info->reserve_max)?>원 이하 사용가능합니다.");
		      frm.reserve_use.value = "";
		      return false;

		   }

		}

	}

	return true;

}

var couponWin;

// 쿠폰사용
function couponUse(){

	if(couponWin != null) couponWin.close();

	var url = "./coupon_list.php";
  couponWin = window.open(url, "couponUse", "height=350, width=601, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=50, top=50");
}

function cuponClose() {

	if(couponWin != null) couponWin.close();
}

// 세금계산서발행
function qclick(idnum) {

  tax01.style.display='none';

  if(idnum != ""){
	  tax=eval("tax"+idnum+".style");
	  tax.display='block';
	}
}

//-->
</script>

<body onUnload="cuponClose();">
<table border=0 cellpadding=0 cellspacing=0 width=98% align=center>
	<tr>
		<td align=center>
			<table border=0 cellpadding=0 cellspacing=0 width=100%>
				<tr>
					<td>
						<table border=0 cellpadding=0 cellspacing=0 width=100%>
							<tr>
								<td style="padding:0 0 5 0" valign=bottom><img src="/images/order_title01.gif"></td>
								<td align=right>
									<table border=0 cellpadding=0 cellspacing=0>
										<tr>
											<td><img src="/images/cart_dir_01.gif"></td>
											<td><img src="/images/cart_dir_o_02.gif"></td>
											<td><img src="/images/cart_dir_03.gif"></td>
											<td><img src="/images/cart_dir_04.gif"></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>

			<? include "prd_baklist.inc"; ?>

			<table border=0 cellpadding=0 cellspacing=0 width=100%>
				<form name="frm" action="<?=$ssl?>/shop/order_save.php" method="post" onSubmit="return inputCheck(this)">
					<input type="hidden" name="prdcode" value="<?=$prdcode?>" />
					<input type="hidden" name="total_price" value="<?=$total_price?>" />
					<input type="hidden" name="amount" value="1" />
					<input type="hidden" name="coupon_idx" value="" />
				<tr>
					<td height="20"></td>
				</tr>
				<tr>
					<td>
						<table border=0 cellpadding=0 cellspacing=0 width=100%>
							<tr>
								<td style="padding:0 0 5 0" valign=bottom><img src="/images/order_title02.gif"></td>
							</tr>
							<tr>
								<td height=3 bgcolor=#999999></td>
							</tr>
							<tr>
								<td bgcolor=#F9F9F9 style="padding:10">
									<table border=0 cellpadding=0 cellspacing=2 bgcolor=#ffffff bordercolor=#E1E1E1 width=100%>
										<tr>
											<td style="padding:5">
												<table>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td width=100>주문하시는 분</td>
														<td><input type=text name="send_name" value="<?=$mem_info->name?>" size=25 class="input"></td>
													</tr>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td>전화번호</td>
														<td>
															<input type=text name="send_tphone" value="<?=$mem_tphone[0]?>" size=3 class="input"> -
															<input type=text name="send_tphone2" value="<?=$mem_tphone[1]?>" size=4 class="input"> -
															<input type=text name="send_tphone3" value="<?=$mem_tphone[2]?>" size=4 class="input">
														</td>
													</tr>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td>휴대전화번호</td>
														<td>
															<input type=text name="send_hphone" value="<?=$mem_hphone[0]?>" size=3 class="input"> -
															<input type=text name="send_hphone2" value="<?=$mem_hphone[1]?>" size=4 class="input"> -
															<input type=text name="send_hphone3" value="<?=$mem_hphone[2]?>" size=4 class="input">
														</td>
													</tr>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td>이메일</td>
														<td><input type=text name="send_email" value="<?=$mem_info->email?>" size=30 class="input"></td>
													</tr>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td>주 소</td>
														<td>
															<input type=text name="send_post" value="<?=$mem_post[0]?>" size=7 class="input"> -
															<input type=text name="send_post2" value="<?=$mem_post[1]?>" size=7 class="input">
															<a href="javascript:zipSearch();"><img src="/images/but_find_zip.gif" border=0 align=absmiddle></a>
														</td>
													</tr>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td>상세주소</td>
														<td><input type=text name="send_address" value="<?=$mem_info->address?>" size=70 class="input"></td>
													</tr>
													<tr height=25>
														<td></td>
														<td></td>
														<td><input type=text name="send_address2" value="<?=$mem_info->address2?>" size=70 class="input"></td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td style="padding:15 0 0 0">
						<table border=0 cellpadding=0 cellspacing=0 width=100%>
							<tr>
								<td style="padding:0 0 5 0" valign=bottom><img src="/images/order_title03.gif"></td>
								<td align=right><input type="checkbox" name="same_check" style="border:0px" onClick="sameCheck(this.form);"><img src="/images/order_c01.gif" align=absmiddle></td>
							</tr>
							<tr>
								<td height=3 bgcolor=#999999 colspan=2></td>
							</tr>
							<tr>
								<td bgcolor=#F9F9F9 style="padding:10" colspan=2>
									<table border=0 cellpadding=0 cellspacing=2 bgcolor=#ffffff bordercolor=#E1E1E1 width=100%>
										<tr>
											<td style="padding:5">
												<table>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td width=100>받으시는 분</td>
														<td><input type=text name="rece_name" size=25 class="input"></td>
													</tr>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td>전화번호</td>
														<td>
														<input type=text name="rece_tphone" size=3 class="input"> -
														<input type=text name="rece_tphone2" size=4 class="input"> -
														<input type=text name="rece_tphone3" size=4 class="input"></td>
													</tr>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td>휴대전화번호</td>
														<td>
															<input type=text name="rece_hphone" size=3 class="input"> -
															<input type=text name="rece_hphone2" size=4 class="input"> -
															<input type=text name="rece_hphone3" size=4 class="input"></td>
													</tr>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td>주 소</td>
														<td>
															<input type=text name="rece_post" size=7 class="input"> -
															<input type=text name="rece_post2" size=7 class="input">
															<a href="javascript:zipSearch2();"><img src="/images/but_find_zip.gif" border=0 align=absmiddle></a></td>
													</tr>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"></td>
														<td>상세주소</td>
														<td><input type=text name="rece_address" size=70 class="input"></td>
													</tr>
													<tr height=25>
														<td></td>
														<td></td>
														<td><input type=text name="rece_address2" size=70 class="input"></td>
													</tr>
													<tr height=25>
														<td><img src="/images/blue_icon.gif"><br><br></td>
														<td>요청사항<br><br></td>
														<td><textarea name="demand" cols="80" rows="4" class="input"></textarea></td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td style="padding:15 0 20 0">
						<table border=0 cellpadding=0 cellspacing=0 width=100%>
							<tr>
								<td style="padding:0 0 5 0" valign=bottom><img src="/images/order_title04.gif"></td>
							</tr>
							<tr>
								<td height=3 bgcolor=#999999></td>
							</tr>
							<tr>
								<td bgcolor=#F9F9F9 style="padding:10">
									<table border=0 cellpadding=0 cellspacing=2 bgcolor=#ffffff bordercolor=#E1E1E1 width=100%>
										<tr>
											<td style="padding:5">
												<table>
<? if($oper_info->coupon_use == "Y"){ ?>
													<tr>
														<td><img src="/images/blue_icon.gif"></td>
														<td width=100>쿠폰사용</td>
														<td>
															<table border=0 cellpadding=0 cellspacing=0>
																<tr>
																	<td><input type="text" name="coupon_use" style="text-align:right"  size="15" class="input" readonly>&nbsp;원</td>
																	<td width="5"></td>
																	<td><a href="javascript:couponUse();"><img src="/images/coupon_search.gif" border="0"></a></td>
																</tr>
															</table>
														</td>
													</tr>
<? } ?>

<? if($oper_info->reserve_use == "Y"){ ?>
													<tr>
														<td><img src="/images/blue_icon.gif"></td>
														<td width=100>적립금사용</td>
														<td>
															<input type="text" name="reserve_use" style="text-align:right"  size="15" class="input" onchange="reserveUse(this.form);">&nbsp;원  (보유적립금 : <?=number_format($mem_info->reserve)?>원)<br>
															<font color=red>(적립금은 <?=number_format($oper_info->reserve_min)?>원부터 <?=number_format($oper_info->reserve_max)?>원까지 사용이 가능합니다)</font>
														</td>
													</tr>
<?}?>
													<tr>
														<td><img src="/images/blue_icon.gif"></td>
														<td width=100>결제방법</td>
														<td>
															<input type="radio" name="pay_method" value="" style="display:none">
<?
$pay_method = explode("/",$oper_info->pay_method);
for($ii=0; $ii<count($pay_method)-1; $ii++){
	$pay_title = pay_method($pay_method[$ii]);
	if($ii == 0) $checked = "checked";
	else $checked = "";

	if($oper_info->pay_escrow == "Y" && $pay_method[$ii] == "PB" && $total_price >= 100000){
	}else{
		echo "<input type='radio' name='pay_method' value='$pay_method[$ii]' $checked>$pay_title &nbsp;";
	}
}
?>
														</td>
													</tr>
<? if(!strcmp($oper_info->tax_use, "Y")) { ?>
													<tr>
														<td><img src="/images/blue_icon.gif"></td>
														<td width=100 height=30>세금계산서</td>
														<td>
															<table width=100% border=0 cellspacing=0 cellpadding=0>
																<tr>
																	<td>
																		<input type="radio" name="tax_type" value="N" checked onClick="qclick('');">발행안함
																		<input type="radio" name="tax_type" value="T" onClick="qclick('01');">세금계산서 신청
																	</td>
																</tr>
															</table>
														</td>
													</tr>
													<tr>
														<td></td>
														<td></td>
														<td>
															<table id="tax01" style="display:none" bgcolor="C8C8C8" width="500" border="0" cellspacing="1" cellpadding="2">
																<tr>
																	<td bgcolor="#F9F9F9">&nbsp; 사업자 번호</td><td colspan="3" bgcolor="#FFFFFF"><input type="text" name="com_num" value="<?=$mem_info->com_num?>" class="input" size="20"></td>
																</tr>
																<tr>
																	<td width="20%" bgcolor="#F9F9F9">&nbsp; 상 호</td><td width="30%" bgcolor="#FFFFFF"><input type="text" name="com_name" value="<?=$mem_info->com_name?>" class="input"></td>
																	<td width="20%" bgcolor="#F9F9F9">&nbsp; 대표자</td><td width="30%" bgcolor="#FFFFFF"><input type="text" name="com_owner" value="<?=$mem_info->com_owner?>" class="input"></td>
																</tr>
																<tr>
																	<td bgcolor="#F9F9F9">&nbsp; 사업장 소재지</td><td colspan="3" bgcolor="#FFFFFF"><input type="text" name="com_address" value="<?=$mem_info->com_address?>" class="input" size="50"></td>
																</tr>
																<tr>
																	<td bgcolor="#F9F9F9">&nbsp; 업 태</td><td bgcolor="#FFFFFF"><input type="text" name="com_kind" value="<?=$mem_info->com_kind?>" class="input"></td>
																	<td bgcolor="#F9F9F9">&nbsp; 종 목</td><td bgcolor="#FFFFFF"><input type="text" name="com_class" value="<?=$mem_info->com_class?>" class="input"></td>
																</tr>
																<tr>
																	<td bgcolor="#F9F9F9">&nbsp; 전화번호</td><td bgcolor="#FFFFFF"><input type="text" name="com_tel" value="<?=$mem_info->tphone?>" class="input"></td>
																	<td bgcolor="#F9F9F9">&nbsp; 이메일</td><td bgcolor="#FFFFFF"><input type="text" name="com_email" value="<?=$mem_info->email?>" class="input"></td>
																</tr>
															</table>
														</td>
													</tr>
<? } ?>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td height=1 background="/images/dot.gif"></td>
				</tr>
				<tr>
					<td height=80 align=center>
						<input type="image" src="/images/but_pay.gif" border=0></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<img src="/images/but_cancel.gif" border=0 onClick="history.go(-1);" style="cursor:hand">
					</td>
				</tr>
			</form>
			</table>
		</td>
	</tr>
</table>

<?
include "../inc/footer.inc"; 		// 하단디자인
?>