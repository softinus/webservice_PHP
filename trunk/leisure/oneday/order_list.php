<?

include "../inc/common.inc"; 			// DB���ؼ�, ������ �ľ�

// �α��� ���� ������� �α��� �������� �̵�
if(empty($wiz_session[id]) && empty($order_guest)){
	echo "<script>document.location='/member/login.php?prev=$PHP_SELF&orderlist=true';</script>";
	exit;
}

if(!empty($send_name)) $param = "send_name=$send_name&orderid=$orderid&order_guest=$order_guest";

include "../inc/util.inc"; 		   // ��ƿ ���̺귯��
include "../inc/design_info.inc"; 	// ������ ����
include "../inc/oper_info.inc"; 		// � ����

$now_position = "<a href=/>Home</a> &gt; �ֹ���ȸ.�����ȸ";
$page_type = "orderdel";

include "../inc/page_info.inc"; 		// ������ ����
include "../inc/header.inc"; 			// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ

?>

<table border=0 cellpadding=0 cellspacing=0 width=98% align=center>
  <tr>
  	<td align=center>
			<table border=0 cellpadding=0 cellspacing=0 width=100%>
				<tr><td colspan=15><img src="/images/myshop_m01_01.gif"></td></tr>
				<tr><td colspan=15 bgcolor=#939393 height=3></td></tr>
				<tr height=33>
					<td background="/images/shop_nomal_bar.gif" align=center class="gray">�ֹ�����</td>
					<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
					<td background="/images/shop_nomal_bar.gif" align=center class="gray">�ֹ���ȣ</td>
					<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
					<td background="/images/shop_nomal_bar.gif" align=center class="gray">�����ݾ�</td>
					<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
					<td background="/images/shop_nomal_bar.gif" align=center class="gray">�������</td>
					<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
					<td background="/images/shop_nomal_bar.gif" align=center class="gray">�ֹ�����</td>
					<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
					<td background="/images/shop_nomal_bar.gif" align=center class="gray">�����ô</td>
					<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
					<td background="/images/shop_nomal_bar.gif" align=center class="gray">�󼼺���</td>
					<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
					<td background="/images/shop_nomal_bar.gif" align=center class="gray">������</td>
				</tr>
				<tr><td colspan=15 bgcolor=#f7f7f7 height=3></td></tr>
				<?
		    if($wiz_session[id] != ""){
		    	$search_sql = " send_id = '$wiz_session[id]' ";
		    } else {
		    	$search_sql = " orderid = '$orderid' and send_name = '$send_name' ";
		    }
		    
		    $sql = "select orderid from wiz_order where $search_sql and status != '' order by order_date desc";
		    $result = mysql_query($sql) or error(mysql_error());
		    $total = mysql_num_rows($result);

				$no = 0;
				$rows = 12;
				$lists = 5;
				$page_count = ceil($total/$rows);
				if(!$page || $page > $page_count) $page = 1;
				$start = ($page-1)*$rows;

		    $sql = "select * from wiz_order where $search_sql and status != '' order by order_date desc limit $start, $rows";
		    $result = mysql_query($sql) or error(mysql_error());
		    
		    while(($row = mysql_fetch_object($result)) && $rows){

		    	$stacolor = "259D28";
					if($row->status == "OC" || $row->status == "RC" || $row->status == "RD") $stacolor = "ED1C24";

		    ?>
				<tr align=center height=35>
					<td><?=$row->order_date?></td>
					<td></td>
					<td><a href="order_detail.php?orderid=<?=$row->orderid?>&page=<?=$page?>&<?=$param?>"><?=$row->orderid?></a></td>
					<td></td>
					<td align=right><?=number_format($row->total_price)?>��&nbsp;</td>
					<td></td>
					<td><?=pay_method($row->pay_method)?></td>
					<td></td>
					<td align=center><font color="<?=$stacolor?>"><?=order_status($row->status)?></font></td>
					<td></td>
					<td><a href="<?=$oper_info->del_trace?><?=$row->deliver_num?>" target="_blank"><img src="/images/but_trace.gif" border="0"></a></td>
					<td></td>
					<td><a href="order_detail.php?orderid=<?=$row->orderid?>&page=<?=$page?>&<?=$param?>"><img src="/images/but_view.gif" border="0"></a></td>
					<td></td>
					<td><?=receipt_link($oper_info, $row)?></td>
					<td>

					</td>
				</tr>
				<tr><td colspan=15 bgcolor=#dddddd height=1></td></tr>
				<?
					$rows--;
				}
				if($total <= 0){
					echo "<tr><td colspan=15 align=center height=50><img src=/images/no_icon.gif align=absmiddle>���ų����� �����ϴ�.</td></tr>";
					echo "<tr><td colspan=15 bgcolor=#dddddd height=1></td></tr>";
				}
				?>
			</table>

			<table width="100%" height="50"  border="0" cellspacing="0" cellpadding="0">
			  <tr>
			  	<td width="30%"></td>
			    <td width="30%"><? print_pagelist($page, $lists, $page_count, $param); ?></td>
			    <td width="30%"></td>
			  </tr>
			</table>

		</td>
	</tr>
	<tr><td align=center height=250><img src="/images/order_step.gif"></td></tr>
</table>

<?

include "../inc/footer.inc"; 		// �ϴܵ�����

?>