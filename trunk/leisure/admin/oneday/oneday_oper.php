<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/oper_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?

$code = "review";
$sql = "select * from wiz_bbsinfo where code = '$code'";
$result = mysql_query($sql) or error(mysql_error());
$review_info = mysql_fetch_array($result);

$code = "qna";
$sql = "select * from wiz_bbsinfo where code = '$code'";
$result = mysql_query($sql) or error(mysql_error());
$qna_info = mysql_fetch_array($result);

?>

<script language="JavaScript" src="/js/util_lib.js"></script>
<script language="JavaScript" type="text/javascript">
<!--

// 적립금 비율 다시적용
function setReserve(){

	var frm = document.frm;
	var reserve_per = frm.reserve_per.value;
	
	if(Check_Num(reserve_per)){
		if(confirm("모든 상품의 적립금이 상품가격의 "+reserve_per+"% 로 일괄적용 됩니다.\n\n진행하시겠습니까?")){
			document.location = "shop_save.php?mode=setreserve&reserve_per=" + reserve_per;
		}
	}else{
		alert("숫자를 입력하세요");
		frm.reserve_per.value = "";
		frm.reserve_per.focus();
	}
	
}

//PG사 클릭시 설명문구
function pg_dec(no){
	var pgdoc=document.getElementById("pgdec");
	if(no == "1"){
		//데이콤 설명
		pgdoc.innerHTML = "<b>데이콤 관리자 > 계약정보 > 상점정보관리 > '승인결과전송여부' 를 전송(웹전송)</b>으로 꼭 변경하세요.<br>반드시 변경해야 카드결제 연동이 정상적으로 이루어집니다.";
	}else if(no =="2"){
		//KCP설명
		pgdoc.innerHTML = "<b>KCP에서 발급받은 아이디를 입력하세요.</b><br>반드시 변경해야 카드결제 연동이 정상적으로 이루어집니다.";
	}else if(no =="3"){
		//이니시스 설명
		pgdoc.innerHTML = "<b>이니시스에서 받으신 키파일을 /shop/INICIS/key/아이디명</b>으로 업로드하시고<br>발급 받은 가맹점 아이디를 꼭입력하여주세요.<br>반드시 변경해야 카드결제 연동이 정상적으로 이루어집니다.";
	}else if(no =="4"){
		//올더게이트 설명
		pgdoc.innerHTML = "<b>올더게이트에서 발급받은 아이디를 입력하세요.</b><br>실거래 아이디가 아닐경우 오류메세지가 나타날수 있습니다.<br>반드시 변경해야 카드결제 연동이 정상적으로 이루어집니다.";
	}
}

// 은행계좌번호 등록
function accIns() {
	
	var url = "pay_account.php";
  window.open(url,"pay_Account","height=200, width=400, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no");

}

// 은행계좌번호 수정
function accMod(no) {
	
	var url = "pay_account.php?mode=update&no=" + no;
  window.open(url,"pay_Account","height=200, width=400, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no");

}

// 은행계좌번호 삭제
function accDel(no) {
	
	if(confirm("은행계좌번호를 삭제하시겠습니까?")) {
		document.location = "pay_account.php?save=true&mode=delete&no=" + no;
	}
		
}
-->
</script>
<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">원데이몰설정</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">원데이몰 운영에 필요한 정보를 설정합니다.</td>
	</tr>
</table>
<a name="pay">
	<br>
	<table width="100%" border="0" cellspacing="0" cellpadding="2">
		<tr>
			<td class="tit_sub"><img src="../image/ics_tit.gif"> 결제정보</td>
		</tr>
	</table>
	<table width="100%" border="0" cellpadding="5" cellspacing="1" class="t_style">
	<form name="frm" action="shop_save.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="tmp">
		<input type="hidden" name="mode" value="oper_info">
		<tr>
			<td width="15%" class="t_name">원데이몰결제방법</td>
			<td width="85%" class="t_value">
<?
$pay_method="";
$pay_list = explode("/",$oper_info->pay_method_day);
for($ii=0; $ii<count($pay_list); $ii++){
	$pay_method[$pay_list[$ii]] = true;
}
?>
<!--
				<input type="checkbox" name="pay_method_day[]" value="PB" <? if($pay_method["PB"]==true) echo "checked";?>>무통장입금&nbsp;
-->
				<input type="checkbox" name="pay_method_day[]" value="PC" <? if($pay_method["PC"]==true) echo "checked";?>>카드결제&nbsp;
				<input type="checkbox" name="pay_method_day[]" value="PN" <? if($pay_method["PN"]==true) echo "checked";?>>계좌이체&nbsp;
				<!--
				<input type="checkbox" name="pay_method_day[]" value="PV" <? if($pay_method["PV"]==true) echo "checked";?>>가상계좌&nbsp;
				-->
				<input type="checkbox" name="pay_method_day[]" value="PH" <? if($pay_method["PH"]==true) echo "checked";?>>휴대폰결제
			</td>
		</tr>
	</table>
	<br>
	<br>
	<table width="100%" border="0" cellspacing="0" cellpadding="2">
		<tr>
			<td class="tit_sub"><img src="../image/ics_tit.gif"> 원데이몰 상점정보</td>
		</tr>
	</table>
	<table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
		<tr>
			<td class="t_name" width="15%">숫자 이미지0</td>
			<td class="t_value" width="35%"><img src="/data/oneday/<?=$oper_info->number0?>" align="absmiddle"/> <input name="number0" type="file" class="input"></td>
			<td class="t_name" width="15%">숫자 이미지1</td>
			<td class="t_value" width="35%"><img src="/data/oneday/<?=$oper_info->number1?>" align="absmiddle"/> <input name="number1" type="file" class="input"></td>
		</tr>
		<tr>
			<td class="t_name">숫자 이미지2</td>
			<td class="t_value"><img src="/data/oneday/<?=$oper_info->number2?>" align="absmiddle"/> <input name="number2" type="file" class="input"></td>
			<td class="t_name">숫자 이미지3</td>
			<td class="t_value"><img src="/data/oneday/<?=$oper_info->number3?>" align="absmiddle"/> <input name="number3" type="file" class="input"></td>
		</tr>
		<tr>
			<td class="t_name">숫자 이미지4</td>
			<td class="t_value"><img src="/data/oneday/<?=$oper_info->number4?>" align="absmiddle"/> <input name="number4" type="file" class="input"></td>
			<td class="t_name">숫자 이미지5</td>
			<td class="t_value"><img src="/data/oneday/<?=$oper_info->number5?>" align="absmiddle"/> <input name="number5" type="file" class="input"></td>
		</tr>
		<tr>
			<td class="t_name">숫자 이미지6</td>
			<td class="t_value"><img src="/data/oneday/<?=$oper_info->number6?>" align="absmiddle"/> <input name="number6" type="file" class="input"></td>
			<td class="t_name">숫자 이미지7</td>
			<td class="t_value"><img src="/data/oneday/<?=$oper_info->number7?>" align="absmiddle"/> <input name="number7" type="file" class="input"></td>
		</tr>
		<tr>
			<td class="t_name">숫자 이미지8</td>
			<td class="t_value"><img src="/data/oneday/<?=$oper_info->number8?>" align="absmiddle"/> <input name="number8" type="file" class="input"></td>
			<td class="t_name">숫자 이미지9</td>
			<td class="t_value"><img src="/data/oneday/<?=$oper_info->number9?>" align="absmiddle"/> <input name="number9" type="file" class="input"></td>
		</tr>
		<tr>
			<td class="t_name">주문버튼 이미지</td>
			<td class="t_value"><img src="/data/oneday/<?=$oper_info->button_buy?>" /> <input name="button_buy" type="file" class="input"><br /></td>
			<td class="t_name">품절버튼 이미지</td>
			<td class="t_value"><img src="/data/oneday/<?=$oper_info->button_soldout?>" /> <input name="button_soldout" type="file" class="input"><br /></td>
		</tr>
		<tr>
			<td class="t_name">판매시간 종료시 메세지</td>
			<td class="t_value" colspan="3"><input name="timemsg" type="text" class="input" size="60" value="<?=$oper_info->timemsg?>" /></td>
		</tr>
		<tr>
			<td class="t_name">구매인원 마감시 메세지</td>
			<td class="t_value" colspan="3"><input name="countmsg" type="text" class="input" size="60" value="<?=$oper_info->countmsg?>" /></td>
		</tr>
		<tr>
			<td class="t_name">SNS 알리미 사용</td>
			<td class="t_value" colspan="3">
<?
$arrSns =explode(",",$oper_info->sns);
?>
				<input name="sns[]" type="checkbox" value="twiter" <?if(in_array("twiter",$arrSns)){echo "checked";}?> /> 트위터
				<input name="sns[]" type="checkbox" value="me2day" <?if(in_array("me2day",$arrSns)){echo "checked";}?> /> 미투데이
				<input name="sns[]" type="checkbox" value="cyworld" <?if(in_array("cyworld",$arrSns)){echo "checked";}?> /> 싸이월드
				<input name="sns[]" type="checkbox" value="facebook" <?if(in_array("facebook",$arrSns)){echo "checked";}?> /> 페이스북
				<input name="sns[]" type="checkbox" value="sms" <?if(in_array("sms",$arrSns)){echo "checked";}?> /> SMS
				<input name="sns[]" type="checkbox" value="email" <?if(in_array("email",$arrSns)){echo "checked";}?> /> E-mail
			</td>
		</tr>
	</table>
	<table width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td height="10" colspan="3"></td>
		</tr>
		<tr>
			<td width="10"></td>
			<td class="alert">숫자이미지</td>
			<td class="alert">: 남은시간 카운터에서 숫자 이미지 사용됩니다.</td>
		</tr>
		<tr>
			<td width="10"></td>
			<td class="alert">주문/품절버튼</td>
			<td class="alert">: 마감전 주문가능시의 구매버튼과 마감후의 품절을 나타내는 이미지를 올려주세요.</td>
		</tr>
		<tr>
			<td width="10"></td>
			<td class="alert">메세지</td>
			<td class="alert">: 판매시간이 될 메세지와 구매인원/개수 마감시 메세지를 구분하여 입력할수 있습니다..</td>
		</tr>
	</table>
	<br>
	<table align="center" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td>
				<input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
				<img src="../image/btn_cancel_l.gif" style="cursor:hand" onClick="history.go(-1);">
			</td>
		</tr>
</form>
	</table>

<? include "../footer.php"; ?>