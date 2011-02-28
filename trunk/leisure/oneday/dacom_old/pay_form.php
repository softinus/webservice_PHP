<?
////////////////////////////////////////////////////////////////////////////////////////////////////
//  mertkey 확인 방법
//  1. 상점관리자(서비스: http://pgweb.dacom.net  테스트: http://pgweb.dacom.net/tmert) 접속
//  2. Dacom 에서 받은 테스트 아이디나 서비스 아이디로 로그인
//  3. 계약정보 -> 상점정보관리 -> 결과전송정보 에서 확인이 가능
////////////////////////////////////////////////////////////////////////////////////////////////////

if(!strcmp($oper_info->pay_test, "Y")) {
	$oper_info->pay_id = "tanywiz";
	$oper_info->pay_key = "6f51f77a2b2222d642e20e445101a35f";
}

$mid = $oper_info->pay_id;						//Dacom 제공 상점아이디
$oid = $order_info->orderid;					//주문번호
$amount = $order_info->total_price;		//결제금액
$mertkey = $oper_info->pay_key;				//데이콤에서 발급받은 키값
$hashdata = md5($mid.$oid.$amount.$mertkey);

if($mid == "tanywiz") $test_port = ":7080";

// 신용카드 결제
if($pay_method == "PC"){

	$pay_action = "http://pg.dacom.net".$test_port."/card/cardAuthAppInfo.jsp";

// 계좌이체
}else if($pay_method == "PN"){

	$pay_action = "http://pg.dacom.net".$test_port."/transfer/transferSelectBank.jsp";

// 가상계좌
}else if($pay_method == "PV"){

	$pay_action = "http://pg.dacom.net".$test_port."/cas/casRequestSA.jsp";

// 휴대폰 결제
}else if($pay_method == "PH"){

	$pay_action = "http://pg.dacom.net".$test_port."/wireless/wirelessAuthAppInfo1.jsp";

}
?>

<script language = 'javascript'>
<!--
function openWindow()
{
window.open("","Window","width=330, height=430, status=yes, scrollbars=no,resizable=yes, menubar=no");
document.mainForm.action="<?=$pay_action?>";
document.mainForm.target = "Window";
document.mainForm.submit();
}
//-->

</script>
<!--
        ******* 필독 *******
		 1. 각각의 결제 수단별로 요청정보에 차이가 있을 수 있으니 반드시 메뉴얼을 참고하셔서 결제연동을 하셔야 합니다.
		 2. ret_url 페이지의 경우 고객이 결제를 확인하는 페이지 이므로 쇼핑몰에서 직접 제작하셔야 합니다.
-->
<table border=0 cellpadding=0 cellspacing=0 width=100%>
<form name="mainForm" method="POST" action="">
<!-- 결제를 위한 필수 hidden정보 -->
<input type="hidden" name="hashdata" value="<?=$hashdata?>">		<!-- 결제요청 검증(무결성) 필드-->
<input type="hidden" name="mid" value="<?=$mid?>">					<!-- 상점ID -->
<input type="hidden" name="oid" value="<?=$oid?>">					<!-- 주문번호 -->
<input type="hidden" name="amount" value="<?=$amount?>">			<!-- 결제금액 -->
<input type="hidden" name="ret_url" value="http://<?=$_SERVER["HTTP_HOST"]?>/shop/dacom/order_update.php">					<!-- 팝업창 사용: 리턴URL -->
<input type="hidden" name="buyer" value="<?=$order_info->send_name?>">			<!-- 구매자 -->
<input type="hidden" name="productinfo" value="<?=$order_info->orderid?>">		<!-- 상품명 -->
<input type="hidden" name="note_url" value="http://<?=$_SERVER["HTTP_HOST"]?>/shop/dacom/order_update.php">		<!-- 결제결과 데이타처리URL(웹전송연동방식) -->
<input type="hidden" name="pay_method" value="<?=$pay_method?>">		<!-- wizshop 결제 방식 -->
<input type="hidden" name="formflag" value="Y">		<!-- hidden 값 다시 받을수 있도록 서정 -->


<!-- 통계서비스를 위한 선택적인 hidden정보 -->
<input type="hidden" name="producttype" value="<?=$order_info->orderid?>">
<input type="hidden" name="productcode" value="<?=$order_info->orderid?>">
<input type="hidden" name="buyerid" value="<?=$order_info->send_id?>">
<input type="hidden" name="buyeremail" value="<?=$order_info->send_email?>">
<input type="hidden" name="deliveryinfo" value="<?=$order_info->rece_address?>">
<input type="hidden" name="receiver" value="<?=$order_info->rece_name?>">
<input type="hidden" name="receiverphone" value="<?=$order_info->rece_hphone?>">

<!-- 할부개월 선택창 제어를 위한 선택적인 hidden정보 -->
<input type="hidden" name="install_range" value="">									<!-- 할부개월 범위-->
<input type="hidden" name="install_fr" value="">										<!-- 할부개월범위 시작-->
<input type="hidden" name="install_to" value="">										<!-- 할부개월범위 끝-->

<!-- 무이자 할부(수수료 상점부담) 여부를 선택하는 hidden정보 -->
<input type="hidden" name="noint_inf" value="선택무이자">
<input type="hidden" name="nointerest" value="0">


<!-- 실시간 계좌이체 hidden 정보 -->
<!--input type="hidden" name="pid" value=""-->
<input type="hidden" name="subMertName" value="">
<input type="hidden" name="subMertPhone" value="">
<input type="hidden" name="subMertBusinessNo" value="">
<input type="hidden" name="subMertRepresentativeName" value="">
<input type="hidden" name="taxFreeAmount" value="">
<input type="hidden" name="taxUseYN" value="Y">


<!-- 가상계좌 hidden 정보 -->
<input type="hidden" name="close_date" value="">
<input type="hidden" name="subMertName" value="">
<input type="hidden" name="subMertPhone" value="">
<input type="hidden" name="subMertBusinessNo" value="">
<input type="hidden" name="subMertRepresentativeName" value="">
<input type="hidden" name="taxFreeAmount" value="">
<input type="hidden" name="taxUseYN" value="Y">

<!-- 에스크로 전용 파라미터 정의 시작 -->
<input type=hidden name=escrow_good_id value='<?=$order_info->orderid?>'>
<input type=hidden name=escrow_good_name value='<?=$order_info->orderid?>'>
<input type=hidden name=escrow_good_code value='<?=$order_info->orderid?>'>
<input type=hidden name=escrow_unit_price value='<?=$order_info->total_price?>'>
<input type=hidden name=escrow_quantity value='1'>

<input type=hidden name=escrow_zipcode value='<?=$order_info->rece_post?>'>
<input type=hidden name=escrow_address1 value='<?=$order_info->rece_address?>' >
<input type=hidden name=escrow_address2 value='' >
<input type=hidden name=escrow_buyermobile value='<?=$order_info->rece_hphone?>' >

<input type=hidden name=escrowflag value='<?=$oper_info->pay_escrow?>'>
<!-- 에스크로 전용 파라미터 정의 끝 -->



  <tr>
    <td style="padding:15 0 20 0">
		<table border=0 cellpadding=0 cellspacing=0 width=100%>
		<!--tr><td style="padding:0 0 5 0" valign=bottom><img src="/images/sett_t03.gif"></td></tr-->
		<tr><td height=3 bgcolor=#999999></td></tr>
		<tr><td bgcolor=#F9F9F9 style="padding:10">

			<table border=1 cellpadding=0 cellspacing=2 bgcolor=#ffffff bordercolor=#E1E1E1 width=100%>
			  <tr>
			    <td style="padding:5">
				   <table border=0 cellpadding=0 cellspacing=0>
					  <tr height=25>
						 <td><img src="/images/blue_icon.gif"></td>
						 <td width=100>결제방법</td>
						 <td>: <?=pay_method($pay_method)?></td></tr>
						<?
						// 계좌이체인경우
						if($pay_method == "PN"){
						?>
						<tr height=25>
						 <td><img src="/images/blue_icon.gif"></td>
						 <td width=100>계좌주민번호</td>
						 <td>: <input type="text" name="pid" value="<?=str_replace("-","",$mem_info->resno)?>" class="input"> &nbsp; <font color=red>('-' 미포함, 이체할 계좌의 주민번호와 동일해야합니다.)</font></td></tr>
						<?
					  }
					  ?>
					  <tr height=25>
						 <td><img src="/images/blue_icon.gif"></td>
						 <td>결제금액</td>
						 <td>: <span class="price"><?=number_format($order_info->total_price)?>원</span></td>
					  </tr>
					</table>
			    </td>
			  </tr>
			</table>

		</td></tr>
		</table>
    </td>
  </tr>
  <tr><td height=1 background="/images/dot.gif"></td></tr>
  <tr>
    <td height=80 align=center>
	    <img src="/images/but_pay.gif" onclick="javascript:openWindow()" style="cursor:hand">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    <a href="/"><img src="/images/but_cancel.gif" border=0></a>
     </td>
  </tr>
</form>
</table>