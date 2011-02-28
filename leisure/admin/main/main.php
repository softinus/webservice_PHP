<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<table width="100%"  border="0" cellspacing="0" cellpadding="0">
	<tr><td height="3"></td></tr>
	<tr>
		<td width="52%" align="left" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="49%">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><img src="../image/tit_noworder.gif" height="16" /></td>
							</tr>
							<tr>
								<td height="9"></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			
			<table width="100%"  border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td colspan="2">
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							<tr><td colspan="20" class="t_rd"></td></tr>
							<tr class="t_th">
								<th width="15%">주문날짜</th>
								<th width="22%">주문번호</th>
								<th width="10%">주문자</th>
								<th width="19%">결제금액</th>
								<th width="19%">결제방법</th>
								<th width="15%" align="center">주문상태</th>
							</tr>
							<tr><td colspan="20" class="t_rd"></td></tr>
<?
$sql = "select * from wiz_dayorder where status != '' order by orderid desc limit 7";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
while($row = mysql_fetch_array($result)){
?>
							<tr align="center">
								<td width="15%" height="24" style="padding-top:5 "><a href="../oneday/order_info.php?orderid=<?=$row[orderid]?>"><?=substr($row[order_date],0,10)?></a></td>
								<td width="22%" class="font_12_3" style="padding-top:5 "><a href="../oneday/order_info.php?orderid=<?=$row[orderid]?>"><?=$row[orderid]?></a></td>
								<td width="10%" style="padding-top:5 "><a href="../oneday/order_info.php?orderid=<?=$row[orderid]?>"><?=$row[send_name]?></a> </td>
								<td width="19%" align="right" style="padding:5 15 0 0"><a href="../oneday/order_info.php?orderid=<?=$row[orderid]?>"><?=number_format($row[total_price])?>원</a></td>
								<td width="19%" style="padding-top:5 "><a href="../oneday/order_info.php?orderid=<?=$row[orderid]?>"><?=pay_method($row[pay_method])?></a></td>
								<td width="15%" class="font_12_3" align="center" style="padding-top:2 "><a href="../oneday/order_info.php?orderid=<?=$row[orderid]?>"><?=order_status($row[status])?></td>
							</tr>
							<tr align="center">
								<td height="1" colspan="10" background="../image/dot_bg.gif"></td>
							</tr>
<?
}
if($total <= 0){
?>
							<tr align="center">
								<td  height="168" style="padding-top:5 " align="center" colspan="6">주문내역이 없습니다.</td>
							</tr>
							<tr align="center">
								<td height="1" colspan="10" background="../image/dot_bg.gif"></td>
							</tr>
<?
}
?>
						</table>
					</td>
				</tr>
			</table>
		</td>
		<td width="2%"></td>
		<td width="46%" align="left" valign="top">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td><img src="../image/tit_log.gif" width="84" height="16" /></td>
				</tr>
				<tr>
					<td height="9"></td>
				</tr>
				<tr>
					<td>
						<table width="100%" border="0" cellpadding="10" cellspacing="3" bgcolor="e3e3e3">
							<tr>
								<td bgcolor="#FFFFFF">
									<table width="100%" border="0" cellspacing="0" cellpadding="0" background="../image/graph_bg2.gif" style="background-position:bottom;">
										<tr>

<?
$substring_sql = "substring(time,5,2)";
$time_gubun = "월";
$pr_start = 1; $pr_end = 12;

$prev_period = date("Y")."010100";
$next_period = date("Y")."123124";

$period_sql = " where time >= '$prev_period' and time <= '$next_period' ";

$sql = "select sum(cnt) as total_cnt from wiz_contime";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
$total_cnt = $row->total_cnt;

$sql = "select sum(cnt) as cnt, $substring_sql as time from wiz_contime $period_sql group by $substring_sql order by $substring_sql asc";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);

while($row = mysql_fetch_object($result)){
	$row->time = $row->time/1;
	$percent = ceil(($row->cnt/$total_cnt)*100);
	$cnt_list[$row->time][cnt] = $row->cnt;
	$cnt_list[$row->time][percent] = $percent;
}

for($pr_start; $pr_start <= $pr_end; $pr_start++){
?>
											<td height="195" width="8%" align="center" valign="bottom"><span class="s01"><?=$cnt_list[$pr_start][cnt]?></span>
												<table width="13" border="0" cellspacing="1" cellpadding="0" bgcolor="3796d1">
													<tr>
														<td background="../image/graph_bg.gif" height='<?=($cnt_list[$pr_start][percent]*1.9)?>'  style="background-repeat:repeat-y"></td>
													</tr>
												</table>
											</td>
<?
}
?> 	
										</tr>
									</table>
									<table width="100%" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td height="22" width="8%" align="center">1월</td>
											<td width="8%" align="center">2월</td>
											<td width="8%" align="center">3월</td>
											<td width="8%" align="center">4월</td>
											<td width="8%" align="center">5월</td>
											<td width="8%" align="center">6월</td>
											<td width="8%" align="center">7월</td>
											<td width="8%" align="center">8월</td>
											<td width="8%" align="center">9월</td>
											<td width="8%" align="center">10월</td>
											<td width="8%" align="center">11월</td>
											<td width="8%" align="center">12월</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<br>

<?
// 주문정보
$sql = "select status, count(orderid) as order_cnt, sum(total_price) as order_price from wiz_dayorder group by status";
$result = mysql_query($sql) or error(mysql_error());

while($row = mysql_fetch_object($result)){
// 주문완료
	if($row->status == "OY" || $row->status == "DR" || $row->status == "DI" || $row->status == "DC"){
		$order_com += $row->order_cnt;
		$order_price += $row->order_price;
	}

// 미결제건
	if($row->status == "OR"){
		$order_acc += $row->order_cnt;
	}

// 미배송건
	if($row->status == "OY"){
		$order_del += $row->order_cnt;
	}
}

?>
<?
// 오늘매출액
$sdate = date('Y-m-d')." 00:00:00";
$edate = date('Y-m-d')." 23:59:59";
$sql = "select sum(total_price) as today_price from wiz_dayorder where order_date >= '$sdate' and order_date <= '$edate' and (status='OY' or status='DR' or status='DI' or status='DC')";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
$today_price = $row->today_price;

// 이달매출액
$sdate = date('Y-m')."-01 00:00:00";
$edate = date('Y-m')."-31 23:59:59";
$sql = "select sum(total_price) as month_price from wiz_dayorder where order_date >= '$sdate' and order_date <= '$edate' and (status='OY' or status='DR' or status='DI' or status='DC')";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
$month_price = $row->month_price;

// 올해매출액
$sdate = date('Y')."-01-01 00:00:00";
$edate = date('Y')."-12-31 23:59:59";
$sql = "select sum(total_price) as year_price from wiz_dayorder where order_date >= '$sdate' and order_date <= '$edate' and (status='OY' or status='DR' or status='DI' or status='DC')";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
$year_price = $row->year_price;

// 총매출액
$sql = "select sum(total_price) as total_price from wiz_dayorder where (status='OY' or status='DR' or status='DI' or status='DC')";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
$total_price = $row->total_price;
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="52%">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="7"><img src="../image/center01_left_top.gif" /></td>
					<td width="99%" background="../image/center01_top_bg.gif" height="7" style="background-repeat:repeat-x"></td>
					<td width="7"><img src="../image/center01_right_top.gif" /></td>
				</tr>
				<tr>
					<td background="../image/center01_left_bg.gif" width="7" style="background-repeat:repeat-y"></td>
					<td>
						<table width="100%" border="0" cellspacing="0" cellpadding="10">
							<tr>
								<td height="90" valign="top" bgcolor="#FFFFFF">
									<table width="100%" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td height="27" colspan="2" align="left" valign="top"><img src="../image/tit_shopinfo.gif" width="57" height="14" /></td>
										</tr>
										<tr>
											<td width="13" height="30">&nbsp;</td>
											<td valign="top">
												<table width="100%" border="0" cellpadding="0" cellspacing="1" class="t_style">
													<tr>
														<td width="20%" height="29" align="center" class="t_name">주문건</td>
														<td width="30%" align="right" class="t_value">
															<table border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td><strong><?=number_format($order_com)?>건</strong></td>
																	<td><a href="../order/order_list.php"><img src="../image/bt_go.gif" border="0" valign="middle" hspace="7" /></a></td>
																</tr>
															</table>
														</td>
														<td width="20%" align="center" class="t_name">금액</td>
														<td width="30%" align="right" class="t_value">
															<table border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td><strong><?=number_format($order_price)?>원</strong></td>
																	<td><a href="../order/order_list.php"><img src="../image/bt_go.gif" border="0" valign="middle" hspace="7" /></a></td>
																</tr>
															</table>
														</td>
													</tr>
													<tr>
														<td height="29" align="center" class="t_name">미결제건</td>
														<td align="right" class="t_value">
															<table border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td><strong><?=number_format($order_acc)?>건</strong></td>
																	<td><a href="../order/order_list.php?s_status=OR"><img src="../image/bt_go.gif" border="0" valign="middle" hspace="7" /></a></td>
																</tr>
															</table>
														</td>
														<td width="20%" align="center" class="t_name">미배송건</td>
														<td width="30%" align="right" class="t_value">
															<table border="0" cellspacing="0" cellpadding="0">
																<tr>
																	<td><strong><?=number_format($order_del)?>건</strong></td>
																	<td><a href="../order/order_list.php?s_status=OY"><img src="../image/bt_go.gif" border="0" valign="middle" hspace="7" /></a></td>
																</tr>
															</table>
														</td>
													</tr>
												</table>
												<br />
												<table width="100%" border="0" cellspacing="0" cellpadding="1">
													<tr>
														<td width="50%">
															<table width="100%" border="0" cellpadding="3" cellspacing="0" class="t_name">
																<tr>
																	<td width="45%" height="25" align="left">&nbsp;&nbsp;오늘매출액</td>
																	<td width="5%" align="center"><img src="../image/ic_arrow_red_h.gif" width="4" height="7" /></td>
																	<td align="right"><strong><?=number_format($today_price)?> 원</strong>&nbsp;&nbsp;</td>
																</tr>
																<tr>
																	<td height="25" align="left">&nbsp;&nbsp;올해매출액</td>
																	<td align="center"><img src="../image/ic_arrow_red_h.gif" width="4" height="7" /></td>
																	<td align="right"><strong><?=number_format($year_price)?> 원</strong>&nbsp;&nbsp;</td>
																</tr>
															</table>
														</td>
														<td width="1" bgcolor="#ffffff"></td>
														<td width="50%">
															<table width="100%" border="0" cellpadding="3" cellspacing="0" class="t_name">
																<tr>
																	<td width="45%" height="25" align="left">&nbsp;&nbsp;이달매출액</td>
																	<td width="5%" align="center"><img src="../image/ic_arrow_red_h.gif" width="4" height="7" /></td>
																	<td align="right"><strong><?=number_format($month_price)?> 원</strong>&nbsp;&nbsp;</td>
																</tr>
																<tr>
																	<td height="25" align="left">&nbsp;&nbsp;총매출액</td>
																	<td align="center"><img src="../image/ic_arrow_red_h.gif" width="4" height="7" /></td>
																	<td align="right"><strong><?=number_format($total_price)?> 원</strong>&nbsp;&nbsp;</td>
																</tr>
															</table>
														</td>
													</tr>
												</table>
											</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
					<td background="../image/center01_right_bg.gif" width="7" style="background-repeat:repeat-y"></td>
				</tr>
				<tr>
					<td width="7"><img src="../image/center01_left_bottom.gif" /></td>
					<td width="99%" background="../image/center01_bottom_bg.gif" height="7" style="background-repeat:repeat-x"></td>
					<td width="7"><img src="../image/center01_right_bottom.gif" /></td>
				</tr>
			</table>
		</td>
		<td width="2%">&nbsp;</td>
		<td width="46%">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="7"><img src="../image/center01_left_top.gif" /></td>
					<td width="99%" background="../image/center01_top_bg.gif" height="7" style="background-repeat:repeat-x"></td>
					<td width="7"><img src="../image/center01_right_top.gif" /></td>
				</tr>
				<tr>
					<td background="../image/center01_left_bg.gif" width="7" style="background-repeat:repeat-y"></td>
					<td>
						<table width="100%" border="0" cellspacing="0" cellpadding="10">
							<tr>
								<td height="120" valign="top" bgcolor="#FFFFFF">
									<table width="100%" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td height="27" colspan="2" align="left" valign="top"><img src="../image/tit_member.gif" width="79" height="14" /></td>
										</tr>
										<tr>
											<td width="13" height="30">&nbsp;</td>
											<td valign="top">
<?
// 오늘회원가입수
$sdate = date('Y-m-d')." 00:00:00";
$edate = date('Y-m-d')." 23:59:59";
$sql = "select count(id) as today_cnt from wiz_member where wdate >= '$sdate' and wdate <= '$edate'";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
$today_cnt = $row->today_cnt;

// 이달회원가입수
$sdate = date('Y-m')."-01 00:00:00";
$edate = date('Y-m')."-31 23:59:59";
$sql = "select count(id) as month_cnt from wiz_member where wdate >= '$sdate' and wdate <= '$edate'";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
$month_cnt = $row->month_cnt;

// 올해회원가입수
$sdate = date('Y')."-01-01 00:00:00";
$edate = date('Y')."-12-31 23:59:59";
$sql = "select count(id) as year_cnt from wiz_member where wdate >= '$sdate' and wdate <= '$edate'";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
$year_cnt = $row->year_cnt;

// 전체회원수
$sql = "select count(id) as total_cnt from wiz_member";
$result = mysql_query($sql) or error(mysql_error());
$row = mysql_fetch_object($result);
$total_cnt = $row->total_cnt;
?>
												<table width="100%" border="0" cellpadding="0" cellspacing="1" class="t_style">
													<tr>
														<td width="30%" height="32" align="center" class="t_name">오늘가입수</td>
														<td width="70%" align="right" class="t_value"><strong><?=number_format($today_cnt)?> 건</strong> &nbsp; </td>
													</tr>
													<tr>
														<td height="32" align="center" class="t_name">이달가입수</td>
														<td align="right" class="t_value"><strong><?=number_format($month_cnt)?> 건</strong> &nbsp; </td>
													</tr>
													<tr>
														<td height="32" align="center" class="t_name">올해가입수</td>
														<td align="right" class="t_value"><strong><?=number_format($year_cnt)?> 건</strong> &nbsp; </td>
													</tr>
													<tr>
														<td height="32" align="center" class="t_name">전체회원수</td>
														<td align="right" class="t_value"><strong><?=number_format($total_cnt)?> 건</strong> &nbsp; </td>
													</tr>
												</table>	
											</td>
										</tr>
										<tr><td height="3"></td></tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
					<td background="../image/center01_right_bg.gif" width="7" style="background-repeat:repeat-y"></td>
				</tr>
				<tr>
					<td width="7"><img src="../image/center01_left_bottom.gif" /></td>
					<td width="99%" background="../image/center01_bottom_bg.gif" height="7" style="background-repeat:repeat-x"></td>
					<td width="7"><img src="../image/center01_right_bottom.gif" /></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<br>
<?/*?>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td width="32%" align="left" valign="top">
			<table width="100%"  border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td align="left" background="../image/tit_bg.gif"><img src="../image/tit_01.gif" /></td>
								<td align="right" background="../image/tit_bg.gif"><a href="../bbs/bbs_pro_list.php"><img src="../image/tit_more.gif" border="0"/></a></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>

<!-- 최근게시물 -->
						<table width="100%"  border="0" cellpadding="0" cellspacing="0">
							<tr><td height="5"></td></tr>
<?
$limit = 5;
$sql = "select *, date_format(from_unixtime(wdate), '%Y-%m-%d') as wdate from wiz_bbs where code != 'memout' order by idx desc limit $limit";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
while($row = mysql_fetch_object($result)){
?>
							<tr>
								<td height="25"><img src="../image/left_s_arrow.gif"></td>
							<?if($code=="talk"){?>
								<td width="75%"><a href="../bbs/bbs_view.php?code=<?=$row->code?>&idx=<?=$row->idx?>"><?=cut_str($row->subject,20)?></a></td>
							<?}else{?>
								<td width="75%"><a href="../bbs/bbs_view.php?code=<?=$row->code?>&idx=<?=$row->idx?>"><?=cut_str($row->content,20)?></a></td>
							<?}?>
								<td width="25%" align="right"><a href="../bbs/bbs_view.php?code=<?=$row->code?>&idx=<?=$row->idx?>"><?=str_replace("-","/",$row->wdate)?></a></td>
							</tr>
							<tr align="center">
								<td height="1" colspan="3" background="../image/dot_bg.gif"></td>
							</tr>
<?
}
if($total <= 0){
?>
							<tr>
								<td height="25" colspan="3" align="center">등록된 게시물이 없습니다.</td>
							</tr>
							<tr align="center">
								<td height="1" colspan="3" background="../image/dot_bg.gif"></td>
							</tr>
<?
}
?>
						</table>
<!-- 최근게시물 -->
					</td>
				</tr>
			</table>
		</td>
		<td width="2%"></td>
		<td width="32%" align="left" valign="top">
			<table width="100%"  border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td align="left" background="../image/tit_bg.gif"><img src="../image/tit_02.gif" /></td>
								<td align="right" background="../image/tit_bg.gif"><a href="../member/member_qna.php"><img src="../image/tit_more.gif" border="0"/></a></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
<!-- 1:1상담문의 -->
						<table width="100%"  border="0" cellpadding="0" cellspacing="0">
							<tr><td height="5"></td></tr>
<?
$sql = "select idx,name,subject,wdate from wiz_consult order by idx desc limit 5";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
while($row = mysql_fetch_object($result)){
?>
							<tr>
								<td height="25"><img src="../image/left_s_arrow.gif"></td>
								<td width="75%" style="padding-top:3 "><a href="../member/member_qna_input.php?idx=<?=$row->idx?>"><?=cut_str($row->subject,20)?></a></td>
								<td width="35%" height="30" align="center"><a href="../member/member_qna_input.php?idx=<?=$row->idx?>"><?=str_replace("-","/",$row->wdate)?></a></td>
							</tr>
							<tr align="center">
								<td height="1" colspan="2" background="../image/dot_bg.gif"></td>
							</tr>
<?
}
if($total <= 0){
?>
							<tr>
								<td height="25" colspan="3" align="center">등록된 1:1상담이 없습니다.</td>
							</tr>
							<tr align="center">
								<td height="1" colspan="3" background="../image/dot_bg.gif"></td>
							</tr>
<?
}
?>
						</table>
<!-- 1:1상담문의 -->

					</td>
				</tr>
			</table>
		</td>
		<td width="2%" align="left" valign="top"></td>
		<td width="32%" align="left" valign="top">
			<table width="100%"  border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td align="left" background="../image/tit_bg.gif"><img src="../image/tit_03.gif" /></td>
								<td align="right" background="../image/tit_bg.gif"><a href="../product/prd_estimate.php"><img src="../image/tit_more.gif" border="0"/></a></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td colspan="2">

<!-- 상품평 -->
						<table width="100%"  border="0" cellpadding="0" cellspacing="0">
							<tr><td height="5"></td></tr>
<?
$sql = "select idx, name, prdcode, subject, date_format(from_unixtime(wdate), '%Y/%m/%d') as wdate, wdate as wtime from wiz_bbs where code = 'review' and prdcode != '' order by idx desc limit 5";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);
while($row = mysql_fetch_object($result)){
	$ttime = mktime(0,0,0,date('m'),date('d'),date('Y'));
	$wtime = $row->wtime;
	if(($ttime-$wtime)/86400 <= 1) $new_icon = "<img src='../image/bbs/icon_new.gif' border='0' align='absmiddle'>";	// new
	else $new_icon = "";
?>
							<tr>
								<td height="25"><img src="../image/left_s_arrow.gif"></td>
								<td width="75%"><a href="../product/prd_estimate.php"><?=cut_str($row->subject,20)?></a> <?=$new_icon?></td>
								<td width="35%"><a href="../product/prd_estimate.php"><?=str_replace("-","/",$row->wdate)?></a></td>
							</tr>
							<tr align="center">
								<td height="1" colspan="3" background="../image/dot_bg.gif"></td>
							</tr>
<?
}
if($total <= 0){
?>
							<tr>
								<td height="25" colspan="3" align="center">등록된 상품평이 없습니다.</td>
							</tr>
							<tr align="center">
								<td height="1" colspan="3" background="../image/dot_bg.gif"></td>
							</tr>
<?
}
?>
						</table>
<!-- 상품평 -->
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<?*/?>
<? include "../footer.php"; ?>