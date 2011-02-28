<?
include "../inc/oneday_header.inc"; 			// 상단디자인

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
//include "../inc/now_position.inc";	// 현재위치

?>
<script language="JavaScript">
<!--
function orderView(orderid){
   var url = "/oneday/order_view.php?orderid=" + orderid + "&print=ok";
   window.open(url, "orderView", "height=650, width=736, menubar=no, scrollbars=yes, resizable=yes, toolbar=no, status=no, left=0, top=0");
}
//-->
</script>
<table border=0 cellpadding=0 cellspacing=0 width=1012 align=center>
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
			$sql = "SELECT * FROM wiz_dayorder WHERE orderid = '$presult[orderid]'";
			$result = mysql_query($sql) or error(mysql_error());
			$order_info = mysql_fetch_object($result);

/*			주문성공시 옵션 재고 감소
			$sql = "select * from wiz_basket where orderid = '$presult[orderid]'";
			$result = mysql_query($sql);

			while($basket_info = mysql_fetch_array($result)){

				$optcode = explode("^",$basket_info[optcode]);

				$sql = "select * from wiz_dayproduct where prdcode='$basket_info[prdcode]'";
				$stm = mysql_query($sql)or die($sql);
				$prdinfo=mysql_fetch_array($stm);
				$arrOptCode = explode("^",$prdinfo[optcode]);
				$arrOptValue = explode("^^",$prdinfo[optvalue]);
				$changeOptValue = "";
				for($i=0; $i<count($arrOptValue); $i++){
					$arrOptValue2 = explode("^",$arrOptValue[$i]);

					if($arrOptValue2[0] != ""){
						if($arrOptCode[$i]==$optcode[0]){
								if($arrOptValue2[2] != 0){
									$changeOptValue .= $arrOptValue2[0]."^".$arrOptValue2[1]."^".($arrOptValue2[2]-1)."^^";
								}else{
									$changeOptValue .= $arrOptValue2[0]."^".$arrOptValue2[1]."^".($arrOptValue2[2])."^^";
								}
						}else{
							$changeOptValue .= $arrOptValue2[0]."^".$arrOptValue2[1]."^".($arrOptValue2[2])."^^";
						}
					}
				}

				$sql = "update wiz_dayproduct set optvalue = '$changeOptValue' where prdcode='$basket_info[prdcode]'";
				mysql_query($sql)or die($sql);
			}

*/
			//echo $orderid;

			// 주문성공
			if($presult[rescode] == "0000" && strlen($presult[rescode]) == 4){

				// 주문완료 메일/sms발송
				include "./prd_ordinfo.php";				// 주문내역


				if($wiz_session[reco]=="Y" && $wiz_session[rid] != ""){

					$sql = "select advert_point from wiz_advert ";
					$result = mysql_query($sql) or die($sql);
					$advert_info = mysql_fetch_array($result);
					$advert_point = $advert_info[advert_point];

					$orderid = $presult[orderid];
					$prdcode = $order_info->prdcode;
					$advert_id = $wiz_session[rid];
					$user_id = $wiz_session[id];
					$reserve = ($prd_price * $advert_point) / 100;


					$sql = "select count(idx) as counter from wiz_advertinfo where advert_id='$advert_id' and user_id='$user_id'";
					$result = mysql_query($sql)or die($sql);
					$rs = mysql_fetch_array($result);
					
					$check_no = $rs[counter];
					if($check_no == 0){
						$sql = "insert into wiz_advertinfo(orderid, prdcode, advert_id, user_id, reserve, wdate) values('$orderid','$prdcode','$advert_id','$user_id','$reserve',now())";
						$result = mysql_query($sql) or die($sql);
					}
				}


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
include "../inc/oneday_footer.inc"; 		// 하단디자인
?>