<?
include "../inc/common.inc"; 				// DB���ؼ�, ������ �ľ�
include "../inc/util.inc"; 		   		// ��ƿ ���̺귯��
include "../inc/design_info.inc"; 	// ������ ����
include "../inc/oper_info.inc"; 		// � ����
include "../inc/shop_info.inc"; 		// ���� ����

$now_position = "<a href=/>Home</a> &gt; ��ٱ���";
$page_type = "basket";

include "../inc/page_info.inc"; 		// ������ ����
include "../inc/header.inc"; 				// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ

?>
				
<table border=0 cellpadding=0 cellspacing=0 width=98% align=center>					
	<tr>
		<td align=center>
	
			<table border=0 cellpadding=0 cellspacing=0 width=100%>
				<tr>
					<td>
						<table border=0 cellpadding=0 cellspacing=0 width=100%>
							<tr>
								<td style="padding:0 0 10 0" valign=bottom><img src="/images/cart_01.gif"></td>
								<td align=right>
									<table border=0 cellpadding=0 cellspacing=0>
									<tr>
										<td><img src="/images/cart_dir_o_01.gif"></td>
										<td><img src="/images/cart_dir_02.gif"></td>
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
				<tr>
					<td height=50 align=center>
						<table border=0 cellpadding=5 cellspacing=0>
						<tr>
						<td><a href="javascript:goOrder();"><img src="/images/but_cart_buy.gif" border=0></a></td>
						<td><a href="javascript:history.go(-1);"><img src="/images/but_cart_prew.gif" border=0></a></td>
						<td><a href="prd_save.php?mode=delall"><img src="/images/but_cart_delete.gif" border=0></a></td>
						<td><a href="javascript:history.go(-1);"><img src="/images/but_cart_shop.gif" border=0></a></td>
						<? if(!strcmp($shop_info->estimate_use, "Y")) { ?>
						<td><a href="javascript:printEstimate();"><img src="/images/but_cart_estimate.gif" border=0></a></td>
						<? } ?>
						</tr>
						</table>
					</td>
				</tr>
			</table>
		
		
			<!-- ��ٱ��� �ȳ��޼��� -->
			<table border=0 cellpadding=0 cellspacing=0 width=100%>
				<tr>
				  <td><?=$page_info->content?></td>
				</tr>
			</table>

		</td>
	</tr>
</table>
					
					
<?

include "../inc/footer.inc"; 		// �ϴܵ�����

?>