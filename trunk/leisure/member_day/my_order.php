<?
include "../inc/oneday_header.inc"; 			// 상단디자인
include "../inc/mem_info.inc"; 						// 회원 정보
$page_type = "join";
include "../inc/page_info.inc"; 					// 페이지 정보
$now_position = "<a href=/>Home</a> &gt; 마이페이지 &gt; 주문내역조회";
//include "../inc/now_position.inc"; 				// 현재위치
?>
<script language="JavaScript">
<!--
// 주문상세내역 보기
function orderView(orderid){
	var url = "/oneday/order_view.php?orderid=" + orderid;
	window.open(url, "orderView", "height=640, width=736, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=0, top=0");
}
function orderCoupon(orderid){
	var url = "/oneday/order_coupon.php?orderid=" + orderid;
	window.open(url, "orderCoupon", "height=590, width=700, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, left=0, top=0");
}
//-->
</script>
<style>
img{border:0px;}
</style>
<table border=0 cellpadding=0 cellspacing=0 width="1012" align=center>
  <tr>
  	<td align=center>

    <? include "my_menu.php"; ?>

		</td>
	</tr>

	<!--구매내역-->
	<?
	// 적립예정금액
	$sql = "select sum(reserve_price) as pre_reserve from wiz_dayorder where send_id = '$wiz_session[id]' and (status = 'OR' or status = 'OY' or status = 'DR' or status = 'DI')";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
	$pre_reserve = $row->pre_reserve;
	?>
	<tr><td height="15"></td></tr>
	<tr>
		<td align=center>
			<table border=0 cellpadding=0 cellspacing=0 width="100%">
				<tr><td colspan=15><img src="/images/myshop_m01_01.gif"></td></tr>
				<tr><td colspan=15 bgcolor=#939393 height=3></td></tr>
				<tr height=33>
				<td background="/images/shop_nomal_bar.gif" align=center class="gray">주문일자</td>
					<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
					<td background="/images/shop_nomal_bar.gif" align=center class="gray">주문번호</td>
					<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
					<td background="/images/shop_nomal_bar.gif" align=center class="gray">결제금액</td>
					<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
					<td background="/images/shop_nomal_bar.gif" align=center class="gray">결제방법</td>
					<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
					<td background="/images/shop_nomal_bar.gif" align=center class="gray">처리상태</td>
					<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
					<td background="/images/shop_nomal_bar.gif" align=center class="gray">쿠폰인쇄</td>
					<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
					<td background="/images/shop_nomal_bar.gif" align=center class="gray">상세보기</td>
					<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
					<td background="/images/shop_nomal_bar.gif" align=center class="gray">영수증</td>
				</tr>
				<tr><td colspan=15 bgcolor=#f7f7f7 height=3></td></tr>
				<?
				$sql = "select orderid from wiz_dayorder where send_id = '$wiz_session[id]' and status != '' order by order_date desc";
				$result = mysql_query($sql) or error(mysql_error());
				$total = mysql_num_rows($result);
				
				$rows = 12;
				$lists = 5;
				$page_count = ceil($total/$rows);
				if(!$page || $page > $page_count) $page = 1;
				$start = ($page-1)*$rows;
				
				$sql = "select * from wiz_dayorder where send_id = '$wiz_session[id]' and status != '' order by order_date desc limit $start, $rows";
				$result = mysql_query($sql) or error(mysql_error());
				
				while(($row = mysql_fetch_object($result)) && $rows){
				?>
				<tr align=center height=28>
					<td><?=substr($row->order_date,0,10)?></td>
					<td></td>
					<td><?=$row->orderid?></td>
					<td></td>
					<td><?=number_format($row->total_price)?>원</td>
					<td></td>
					<td><?=pay_method($row->pay_method)?></td>
					<td></td>
					<td><?=order_status($row->status)?></td>
					<td></td>
					<td>
					<?if($row->status == "DC" || $row->status == "DL" ){?>
						<a href="javascript:orderCoupon('<?=$row->orderid?>');">인쇄하기</a>
					<?}else{?>
						&nbsp;
					<?}?>
					</td>
					<td></td>
					<td><a href="javascript:orderView('<?=$row->orderid?>');"><img src="/images/but_view.gif" border="0"></a></td>
					<td></td>
					<td><?=receipt_link($oper_info, $row)?></td>
				</tr>
				<tr><td colspan=15 bgcolor=#dddddd height=1></td></tr>
			<?
				$rows--;
			}
			
			if($total <= 0){
			?>
				<tr><td colspan=15 align=center height=50><img src="/images/no_icon.gif" align=absmiddle> 현재 구매내역이 없습니다.</td></tr>
				<tr><td colspan=15 bgcolor=#f7f7f7 height=3></td></tr>
				<tr><td colspan=15 bgcolor=#dddddd height=1></td></tr>
			<?
			}
			?>
				<tr><td colspan=15 bgcolor=#f7f7f7 height=3></td></tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td align=center height=50>
		
	  <? print_pagelist($page, $lists, $page_count, ""); ?>
	  
	  </td>
	</tr>
</table>

<?

include "../inc/oneday_footer.inc"; 		// 하단디자인

?>