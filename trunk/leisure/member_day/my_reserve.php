<?
include "../inc/oneday_header.inc"; 			// ��ܵ�����

$page_type = "myshop";
$now_position = "<a href=/>Home</a> &gt; ���̼��� &gt; �����ݳ���";

include "../inc/page_info.inc"; 		// ������ ����
include "../inc/mem_info.inc"; 		// ȸ�� ����

$page_type = "join";
include "../inc/page_info.inc"; 		// ������ ����
//include "../inc/now_position.inc";	// ������ġ

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
	

	<!--�����ݳ���-->
	<?
	// ���������ݾ�
	$sql = "select sum(reserve_price) as pre_reserve from wiz_order where send_id = '$wiz_session[id]' and (status = 'OR' or status = 'OY' or status = 'DR' or status = 'DI')";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_object($result);
	$pre_reserve = $row->pre_reserve;
	?>
	<tr><td height="15"></td></tr>
	<tr>
	  <td>
			<table border=0 cellpadding=0 cellspacing=0 width=100%>
			  <tr>
			    <td><img src="/images/myshop_m03_01.gif"></td>
					<td align=right>
					  <img src="/images/myshop_m03_02.gif" align=absmiddle><b> <?=number_format($total_reserve)?>�� </b>&nbsp;&nbsp;&nbsp;
					  <img src="/images/myshop_m03_03.gif" align=absmiddle><b> <?=number_format($pre_reserve)?>��</b>
			    </td>
			  </tr>
			</table>
		</td>
   </tr>
	<tr>
		<td align=center>
			<table border=0 cellpadding=0 cellspacing=0 width=100%>
				<tr><td colspan=7 bgcolor=#939393 height=3></td></tr>
				<tr height=33>
					<td background="/images/shop_nomal_bar.gif" align=center width="20%" class="gray">��������</td>
					<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
					<td background="/images/shop_nomal_bar.gif" align=center class="gray">��������</td>
					<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
					<td background="/images/shop_nomal_bar.gif" align=center width="20%" class="gray">�ֹ���ȣ</td>								
					<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
					<td background="/images/shop_nomal_bar.gif" align=center width="15%" class="gray">�ݾ�</td>
				</tr>
				<tr><td colspan=7 bgcolor=#f7f7f7 height=3></td></tr>
				<?
				$sql = "select idx from wiz_reserve where memid = '$wiz_session[id]' order by wdate desc";
				$result = mysql_query($sql) or error(mysql_error());
				$total = mysql_num_rows($result);
				
				$rows = 12;
				$lists = 5;
				$page_count = ceil($total/$rows);
				if(!$page || $page > $page_count) $page = 1;
				$start = ($page-1)*$rows;
				
				$sql = "select * from wiz_reserve where memid = '$wiz_session[id]' order by wdate desc limit $start, $rows";
				$result = mysql_query($sql) or error(mysql_error());
				
				while(($row = mysql_fetch_object($result)) && $rows){
				?>
				<tr align=center height=28>
					<td><?=$row->wdate?></td>
					<td></td>
					<td align="left">��<?=$row->reservemsg?></td>
					<td></td>
					<td><a href="javascript:orderView('<?=$row->orderid?>');"><?=$row->orderid?></a></td>
					<td></td>
					<td align="right"><?=number_format($row->reserve)?>��&nbsp; &nbsp; </td>
				</tr>
				<tr><td colspan=7 bgcolor=#dddddd height=1></td></tr>
				<?
					$rows--;
				}
				
				if($total <= 0){
				?>
				<tr><td colspan=7 align=center height=50><img src="/images/no_icon.gif" align=absmiddle> ���� �����ݳ����� �����ϴ�.</td></tr>

				<tr><td colspan=7 bgcolor=#dddddd height=1></td></tr>
				<?
				}
				?>
				<tr><td colspan=7 bgcolor=#f7f7f7 height=3></td></tr>
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

include "../inc/oneday_footer.inc"; 		// �ϴܵ�����

?>