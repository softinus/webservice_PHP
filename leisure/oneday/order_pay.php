<?
include "../inc/oneday_header.inc"; 				// 상단디자인
include "../inc/mem_info.inc"; 			// 회원 정보

$page_type = "orderform";
?>

<table border=0 cellpadding=0 cellspacing=0 width=1012 align=center>
	<tr>
		<td align=center>
			<table border=0 cellpadding=0 cellspacing=0 width=100%>
				<tr>
					<td>
						<table border=0 cellpadding=0 cellspacing=0 width=100%>
							<tr>
								<td style="padding:0 0 5 0" valign=bottom><img src="/images/sett_t01.gif"></td>
								<td align=right>
									<table border=0 cellpadding=0 cellspacing=0>
										<tr>
											<td><img src="/images/cart_dir_01.gif"></td>
											<td><img src="/images/cart_dir_02.gif"></td>
											<td><img src="/images/cart_dir_o_03.gif"></td>
											<td><img src="/images/cart_dir_04.gif"></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<? include "prd_ordlist.php"; ?>
<?

$sql = "select * from wiz_dayorder where orderid='$orderid'";
$stm = mysql_query($sql) or die($sql);
$rs = mysql_fetch_array($stm);


foreach($rs as $k=>$v){
	${$k} = ${$k};
	$order_info->$k = $v;
}

?>
			<?include Inc_payment2($pay_method,$oper_info->pay_agent);?>
		</td>
	</tr>
</table>
<?
include "../inc/oneday_footer.inc"; 		// 하단디자인
?>