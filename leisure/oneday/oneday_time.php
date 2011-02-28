						<!--달력-->
						<table width="126" height="56" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="22"><a <?=$param_prev?> style="cursor:pointer"><img src="/image/time_icon_prve.jpg" width="22" height="28" border="0"></a></td>
								<td align="center" class="font04"><?=$dis_mm?>.<?=$dis_dd?></td>
								<td width="22" align="right"><a <?=$param_next?> style="cursor:pointer"><img src="/image/time_icon_next.jpg" width="22" height="28" border="0"></a></td>
							</tr>
						</table>
						<!--달력-->
						<!--남은시간-->
						<table width="201" height="22" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td><img src="/image/time_title_01.jpg" width="125" height="20"></td>
							</tr>
						</table>
						<table width="201" height="64" border="0" cellpadding="0" cellspacing="0" background="/image/time_bg.jpg" style="background-repeat: no-repeat">
							<tr>
								<td valign="top" style="padding-top:16px">
									<table width="197" height="20" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<!--남은시간 Hours-->
											<td width="58" align="center" valign="top">
												<img src="/data/oneday/number_0.gif" id="thour0_1">
												<img src="/data/oneday/number_0.gif" id="thour1_1">
											</td>
											<td width="14"></td>
											<!--남은시간 Min-->
											<td width="56" align="center" valign="top">
												<img src="/data/oneday/number_0.gif" id="tminite0_1">
												<img src="/data/oneday/number_0.gif" id="tminite1_1">
											</td>
											<td width="13"></td>
											<!--남은시간 Second-->
											<td width="56" align="center" valign="top">
												<img src="/data/oneday/number_0.gif" id="ttime0_1">
												<img src="/data/oneday/number_0.gif" id="ttime1_1">
											</td>
										</tr>
									</table>
				<?if($prdcode){		// 판매상품이 있다면 남은시간이 돌아감.?>
									<script>CalcRemaining(<?=$etime?>,1,1);// ( 남은시간, 타이머번호, 1)</script>
				<?}?>
								</td>
							</tr>
						</table>
						<!--남은시간 끝-->