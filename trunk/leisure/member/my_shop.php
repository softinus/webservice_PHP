<?
include "../inc/oneday_header.inc"; 			// ��ܵ�����
include "../inc/mem_info.inc"; 						// ȸ�� ����
$page_type = "join";
include "../inc/page_info.inc"; 					// ������ ����
$now_position = "<a href=/>Home</a> &gt; ���������� &gt; ���̼�";
include "../inc/now_position.inc"; 				// ������ġ
?>
<script language="JavaScript">
<!--
// �ֹ��󼼳��� ����
function orderView(orderid){
	var url = "/shop/order_view.php?orderid=" + orderid;
	window.open(url, "orderView", "height=640, width=736, menubar=no, scrollbars=yes, resizable=no, toolbar=no, status=no, left=0, top=0");
}
//-->
</script>

<table border=0 cellpadding=0 cellspacing=0 width="1012" align=center>
  <tr>
  	<td align=center>

    <? include "my_menu.php"; ?>

		</td>
	</tr>

	<!-- ���ų��� -->
	<tr><td height="15"></td></tr>
	<tr>
		<td align=center>
			
			<table border=0 cellpadding=0 cellspacing=0 width=100%>
			<tr>
		  	<td colspan=12><img src="/images/myshop_m01_01.gif"></td>
		  	<td align="right"><a href="/member/my_order.php"><img src="/images/but_more.gif" border="0"></a></td>
		  </tr>
			<tr><td colspan=13 bgcolor=#939393 height=3></td></tr>
			<tr height=33>
				<td background="/images/shop_nomal_bar.gif" align=center class="gray">�ֹ�����</td>
				<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
				<td background="/images/shop_nomal_bar.gif" align=center class="gray">�ֹ���ȣ</td>
				<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
				<td background="/images/shop_nomal_bar.gif" align=center class="gray">�����ݾ�</td>
				<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
				<td background="/images/shop_nomal_bar.gif" align=center class="gray">�������</td>
				<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
				<td background="/images/shop_nomal_bar.gif" align=center class="gray">����</td>
				<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
				<td background="/images/shop_nomal_bar.gif" align=center class="gray">�󼼺���</td>
			</tr>
			<tr><td colspan=13 bgcolor=#f7f7f7 height=3></td></tr>
			<?
			$sql = "select * from wiz_order where send_id = '$wiz_session[id]' and status != '' order by order_date desc limit 5";
      $result = mysql_query($sql) or error(mysql_error());
      $total = mysql_num_rows($result);
      
      $rows = 12;
      $lists = 5;
      $page_count = ceil($total/$rows);
      if(!$page || $page > $page_count) $page = 1;
      $start = ($page-1)*$rows;
      if($start>1) mysql_data_seek($result,$start);
      
      while(($row = mysql_fetch_object($result)) && $rows){
      ?>
			<tr align=center height=28>
				<td><?=substr($row->order_date,0,10)?></td>
				<td></td>
				<td><?=$row->orderid?></td>
				<td></td>
				<td><?=number_format($row->total_price)?>��</td>
				<td></td>
				<td><?=pay_method($row->pay_method)?></td>
				<td></td>
				<td><?=order_status($row->status)?></td>
				<td></td>
				<td><a href="javascript:orderView('<?=$row->orderid?>');"><img src="/images/but_view.gif" border="0"></a></td>
			</tr>
			<tr><td colspan=13 bgcolor=#dddddd height=1></td></tr>
			<?
				$rows--;
			}
			
			if($total <= 0){
			?>
			<tr><td colspan=13 align=center height=50><img src="/images/no_icon.gif" align=absmiddle> ���� ���ų����� �����ϴ�.</td></tr>
			<tr><td colspan=13 bgcolor=#dddddd height=1></td></tr>
			<?
			}
			?>
			<tr><td colspan=13 bgcolor=#f7f7f7 height=3></td></tr>
			</table>
		</td>
	</tr>

	<!--�������-->
  <? if($oper_info->coupon_use == "Y"){ ?>
	<tr><td height="15"></td></tr>
	<tr>
		<td align=center>
			<table border=0 cellpadding=0 cellspacing=0 width=100%>
			<tr><td colspan=13><img src="/images/myshop_m01_011.gif"></td></tr>
			<tr><td colspan=13 bgcolor=#939393 height=3></td></tr>
			<tr height=33>
				<td background="/images/shop_nomal_bar.gif" align=center class="gray" width="10%">��ȣ</td>
				<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
				<td background="/images/shop_nomal_bar.gif" align=center class="gray">������</td>
				<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
				<td background="/images/shop_nomal_bar.gif" align=center class="gray">�Ⱓ</td>
				<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
				<td background="/images/shop_nomal_bar.gif" align=center class="gray" width="10%">���ξ�</td>
				<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
				<td background="/images/shop_nomal_bar.gif" align=center class="gray" width="10%">��뿩��</td>
			</tr>
			<tr><td colspan=13 bgcolor=#f7f7f7 height=3></td></tr>
			<?
			$sql = "select * from wiz_mycoupon where memid='$wiz_session[id]' and coupon_sdate <= curdate() and coupon_edate >= curdate() order by idx desc";
      $result = mysql_query($sql) or error(mysql_error());
      $total = mysql_num_rows($result);
      
      $rows = 12;
      $lists = 5;
      $page_count = ceil($total/$rows);
      if(!$page || $page > $page_count) $page = 1;
      $start = ($page-1)*$rows;
      if($start>1) mysql_data_seek($result,$start);
      $no = $total - $start;
      while(($row = mysql_fetch_object($result)) && $rows){
      	if($row->coupon_use == "Y") $row->coupon_use = "�����";
      	else  $row->coupon_use = "�̻��";
      ?>
			<tr align=center height=28>
				<td><?=$no?></td>
				<td></td>
				<td><?=$row->coupon_name?></td>
				<td></td>
				<td><?=$row->coupon_sdate?> ~ <?=$row->coupon_edate?></td>
				<td></td>
				<td><?=$row->coupon_dis?><?=$row->coupon_type?></td>
				<td></td>
				<td><?=$row->coupon_use?></td>
			</tr>
			<tr><td colspan=13 bgcolor=#dddddd height=1></td></tr>
			<?
				$no--;
				$rows--;
			}
			
			if($total <= 0){
			?>
			<tr><td colspan=13 align=center height=50><img src="/images/no_icon.gif" align=absmiddle> ������ �����ϴ�.</td></tr>
			<tr><td colspan=13 bgcolor=#dddddd height=1></td></tr>
			<?
			}
			?>
			<tr><td colspan=13 bgcolor=#f7f7f7 height=3></td></tr>
			</table>
		</td>
	</tr>
	<? } ?>
	
</table>

<?

include "../inc/oneday_footer.inc"; 		// �ϴܵ�����

?>