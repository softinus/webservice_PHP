
						<table width="201" height="25" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="28" align="center" class="font03"><?=$minBuyNo?></td>
								<td width="173"  class="cond_msg">
								<?if($selllimit=="personal"){?>
									�� �̻� ���Ž� �ŷ��� ����˴ϴ�.
								<?}else{?>
									�� �̻� ���Ž� �ŷ��� ����˴ϴ�.
								<?}?>
								</td>
							</tr>
						</table>
						
						<table width="201" height="25" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="28" class="current_buyed">����</td>
								<td width="53" align="center" class="font02" id="buypersonal"><?=$buy_counter?></td>
								<td width="120" class="current_buyed">
								<?if($selllimit=="personal"){?>
									���� �����ϼ̽��ϴ�.
								<?}else{?>
									���� �ǸŵǾ����ϴ�.
								<?}?>
								</td>
							</tr>
						</table>
						<table width="90" height="10" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td></td>
							</tr>
						</table>
						<table width="201" height="13" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="7"><img src="/image/time_line_01.jpg" width="7" height="13"></td>
								<td background="/image/time_line_bg.jpg" width="186"><img src="/image/time_line_center.jpg" width="<?=$bar_width?>" height="13"  id="buycounter"></td>
								<td width="8"><img src="/image/time_line_right2.jpg" width="8" height="13"></td>
							</tr>
						</table>
						<table width="200" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="100" class="bar_number">0</td>
								<td width="101" align="right" class="bar_number"><?=$maxBuyNo?></td>
							</tr>
						</table>
