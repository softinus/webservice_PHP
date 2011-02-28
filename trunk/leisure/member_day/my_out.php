<?
include "../inc/oneday_header.inc"; 			// 상단디자인

$page_type = "myshop";
$now_position = "<a href=/>Home</a> &gt; 마이쇼핑 &gt; 회원탈퇴";

include "../inc/page_info.inc"; 		// 페이지 정보
include "../inc/mem_info.inc"; 		// 회원 정보

//include "../inc/now_position.inc";	// 현재위치
?>
<script language="JavaScript">
<!--
function inputCheck(frm){

	var reason = 0;
	if(frm.out_reason.checked == true) reason++;
	if(frm.out_reason2.checked == true) reason++;
	if(frm.out_reason3.checked == true) reason++;
	if(frm.out_reason4.checked == true) reason++;
	if(frm.out_reason5.checked == true) reason++;
	if(frm.out_reason6.checked == true) reason++;
	if(frm.out_reason7.checked == true) reason++;
	if(frm.out_reason8.checked == true) reason++;
	
	if(reason <= 0){
		alert("미흡했던 점을 선택해주세요");
		frm.out_reason.focus();
		return false;
	}
	if(frm.message.value == ""){
		alert("진심어린 충고 부탁드립니다.");
		frm.message.focus();
		return false;
	}
	if(!confirm("정말 탈퇴하시겠습니까?")) return false;
}
//-->
</script>

<table border=0 cellpadding=0 cellspacing=0 width="1012" align=center>
  <tr>
  	<td align=center>

    <? include "my_menu.php"; ?>

		</td>
	</tr>

	<!-- 회원탈퇴 -->
	<tr><td height="15"></td></tr>
	<tr>
		<td align=center>
			<table border=0 cellpadding=0 cellspacing=0 width="100%">
			<form name="frm" action="my_save.php" method="post" onSubmit="return inputCheck(this)">
      <input type="hidden" name="mode" value="my_out">
			<tr><td><img src="/images/myshop_m08_01.gif"></td></tr>
			<tr><td bgcolor=#939393 height=3></td></tr>
			<tr>
				<td style="padding:10 20 10 20" bgcolor=#f7f7f7>
					고객님께서 회원 탈퇴를 원하신다니 저희 쇼핑몰의 서비스가 많이 부족하고 미흡했나 봅니다.<br>
					불편하셨던 점이나 불만사항을 알려주시면 적극 반영해서<br>
					고객님의 불편함을 해결해 드리도록 노력하겠습니다. 아울러 회원 탈퇴시의 아래 사항을 숙지하시기 바랍니다.<br><br>

					1. 회원 탈퇴 시 고객님의 정보는 상품 반품 및 A/S를 위해 전자상거래 등에서의 소비자 보호에 관한 법률에 의거한<br>
					   &nbsp;&nbsp;&nbsp;고객정보 보호정책에따라 관리 됩니다.<br>
					2. 탈퇴 시 고객님께서 보유하셨던 적립금은 삭제 됩니다.
				</td>
			</tr>
			<tr><td bgcolor=#dddddd height=1></td></tr>
			<tr>
				<td>			
					<table border=0 cellpadding=0 cellspacing=0 width=100%>
						<tr height=28>
							<td width=20><img src="/images/blue_icon.gif"></td>
							<td width=100><img src="/images/my_out_01.gif"></td>
							<td>
							<input name="out_reason" value="고객서비스 불만" type="checkbox" style="border:0px; background-color:transparent;">고객서비스 불만
							<input name="out_reason2" value="배송불만" type="checkbox" style="border:0px; background-color:transparent;">배송불만 
							<input name="out_reason3" value="교환/환불/반품 불만" type="checkbox" style="border:0px; background-color:transparent;">교환/환불/반품 불만
							<input name="out_reason4" value="방문 빈도가 낮음" type="checkbox" style="border:0px; background-color:transparent;">방문 빈도가 낮음 
							<br>
							<input name="out_reason5" value="상품가격 불만" type="checkbox" style="border:0px; background-color:transparent;">상품가격 불만
							<input name="out_reason6" value="개인 정보유출 우려" type="checkbox" style="border:0px; background-color:transparent;">개인 정보유출 우려 
							<input name="out_reason7" value="쇼핑몰의 신뢰도 불만" type="checkbox" style="border:0px; background-color:transparent;">쇼핑몰의 신뢰도 불만
							<input name="out_reason8" value="쇼핑 기능 불만" type="checkbox" style="border:0px; background-color:transparent;">쇼핑 기능 불만 
							</td>
						</tr>
						<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
						<tr height=28>
							<td><img src="/images/blue_icon.gif"></td>
							<td><img src="/images/my_out_03.gif"></td>
							<td style="padding:3 0 3 0"><textarea name="message" cols="70" rows="3" class="input"></textarea></td>
						</tr>
					</table>
				</td>
				</tr>
				<tr><td bgcolor=#f7f7f7 height=3></td></tr>
				<tr><td bgcolor=#dddddd height=1></td></tr>
				<tr>
					<td colspan="5" align="center" height=50>
						<input type="image" src="/images/btn_myconfirm.gif" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<img src="/images/btn_mycancel.gif" border="0" onClick="history.go(-1);" style="cursor:hand">
					</td>
				</tr>
				</form>
				</table>
		</td>
	</tr>
</table>

<?

include "../inc/oneday_footer.inc"; 		// 하단디자인

?>