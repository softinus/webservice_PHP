<?
include "../inc/common.inc"; 				// DB컨넥션, 접속자 파악
include "../inc/util.inc"; 					// 유틸 라이브러리
include "../inc/design_info.inc"; 	// 디자인 정보
include "../inc/oper_info.inc"; 		// 운영 정보


///////////////////////////////////////////
/// PG사 결제 완료시 꼭 반환되어야할 값들//
///////////////////////////////////////////
/* $orderid : 주문번호
/* $resmsg : 오류 및 반환 메세지
/* $rescode : 성공반환 메세지
/* $pay_method : wizshop 결제종류
*//////////////////////////////////////////
 
//if($pay_method != "PB"){
	//Pay_result($oper_info->pay_agent);
	$presult=Pay_result($oper_info->pay_agent,$rescode);

  //////// 쓰레기 장바구니 데이터 삭제 ////////////
  @mysql_query("DELETE FROM wiz_basket_tmp WHERE (now()- INTERVAL 10 DAY) < wdate");
//}
$now_position = "<a href=/>Home</a> &gt; 주문하기 &gt; 주문완료";
$page_type = "ordercom";

include "../inc/page_info.inc"; 		// 페이지 정보
include "../inc/header.inc"; 			// 상단디자인
include "../inc/now_position.inc";	// 현재위치

?>
<script language="JavaScript">
<!--
function orderView(orderid){
   var url = "/shop/order_view.php?orderid=" + orderid + "&print=ok";
   window.open(url, "orderView", "height=650, width=736, menubar=no, scrollbars=yes, resizable=yes, toolbar=no, status=no, left=0, top=0");
}
//-->
</script>
<table border=0 cellpadding=0 cellspacing=0 width=98% align=center>
  <tr>
    <td align=center>

		  <table border=0 cellpadding=0 cellspacing=0 width=100%>
		    <tr>
		      <td>
				    <table border=0 cellpadding=0 cellspacing=0 width=100%>
				      <tr>
				      	<td style="padding:0 0 5 0" valign=bottom></td>
					      <td align=right>
							  <table border=0 cellpadding=0 cellspacing=0>
							  <tr><td><img src="/images/cart_dir_01.gif"></td>
								<td><img src="/images/cart_dir_02.gif"></td>
								<td><img src="/images/cart_dir_03.gif"></td>
								<td><img src="/images/cart_dir_o_04.gif"></td></tr>
							  </table>
					      </td>
					    </tr>
				    </table>
		      </td>
		    </tr>
		  </table>
			<?

			// 주문정보
			$sql = "SELECT * FROM wiz_order WHERE orderid = '$presult[orderid]'";
			$result = mysql_query($sql) or error(mysql_error());
			$order_info = mysql_fetch_object($result);

			//echo $orderid;

			// 주문성공
			if($presult[rescode] == "0000" && strlen($presult[rescode]) == 4){

				// 주문완료 메일/sms발송
				include "./prd_ordinfo.inc";				// 주문내역
				include "./prd_ordmail.inc";		// 메일발송내용

				$re_info[name] = $order_info->send_name;
				$re_info[email] = $order_info->send_email;
				$re_info[hphone] = $order_info->send_hphone;

				send_mailsms("order_com", $re_info, $ordmail);

			?>
			<table border=0 cellpadding=0 cellspacing=0 width=100%>
			  <tr><td align="center"><?=$ordinfo?></td></tr>
			  <tr><td height=10></td></tr>
			  <tr>
			  	<td align="center">

			  	  <table border=0 cellpadding=0 cellspacing=0 width=98%>
			      <tr><td height=1 background="/images/dot.gif"></td></tr>
			      </table>

			    </td>
			  </tr>
			  <tr><td height="80" align="center"><a href="javascript:orderView('<?=$presult[orderid]?>');"><img src="/images/btn_print.gif" border="0"></a></td></tr>
			</table>
			<?

			// 주문실패
			}else{
			?>
			<table border=0 cellpadding=0 cellspacing=0 width=96%>
				<tr><td height=3 bgcolor=#999999></td></tr>
				<tr>
					<td bgcolor=#F9F9F9 style="padding:10">

						<table border=1 cellpadding=0 cellspacing=2 bgcolor=#ffffff bordercolor=#E1E1E1 width=100%>
						  <tr>
						    <td style="padding:5">
							   <table width=100% border=0 cellpadding=0 cellspacing=0>
								  <tr height=25><td align="center"><font color=red><b>결제시 에러가 발생하였습니다.</b></font></td></tr>
								  <tr height=25><td align="center">결과메세지 : <?=$presult[resmsg]?></td></tr>
								  <tr><td height=20></td></tr>
								  <tr><td height=1 background="/images/dot.gif"></td></tr>
								  <tr><td align="center" height=80><a href="order_pay.php?orderid=<?=$presult[orderid]?>&pay_method=<?=$order_info->pay_method?>"><img src="/images/but_re.gif" border="0"></a></td></tr>
								</table>
						    </td>
						  </tr>
						</table>

				  </td>
				</tr>
		  </table>
			<?
			}
			?>


		</td>
  </tr>
</table>
<?

include "../inc/footer.inc"; 		// 하단디자인

?>