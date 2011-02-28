
			<table width="236" height="719" border="0" cellpadding="0" cellspacing="12" bgcolor="#EBE8E8">
				<tr>
					<td height="249" align="center" valign="top" bgcolor="#FFFFFF">

						<!--알리미-->
						<table width="100%" height="70" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td align="center">
									<table width="90" border="0" cellspacing="0" cellpadding="0">
										<tr>
										<?
										$arrSns = explode(",",$oper_info->sns);
										?>
										<?if(in_array("sms",$arrSns)){?>
											<td><img src="/image/right_icon_01.jpg" width="28" height="26" border="0" onclick="sns_sms('<?=$prdname?>')" style="cursor:pointer" title="SMS" /></td>
										<?}?>
										<?if(in_array("me2day",$arrSns)){?>
											<td><img src="/image/right_icon_02.jpg" width="28" height="26" border="0" onclick="sns_me2day('<?=$prdname?>','<?=$shop_info->shop_url?>','')" style="cursor:pointer" title="미투데이" /></td>
										<?}?>
										<?if(in_array("twiter",$arrSns)){?>
											<td><img src="/image/right_icon_03.jpg" width="28" height="26" border="0" onclick="sns_twitter('<?=$prdname?>','<?=$shop_info->shop_url?>','')" style="cursor:pointer" title="트위터" /></td>
										<?}?>
										<?if(in_array("cyworld",$arrSns)){?>
											<td><img src="/image/right_icon_05.jpg" width="28" height="26" border="0" onclick="sns_cyworld('<?=$prdname?>','<?=$shop_info->shop_url?>','')" style="cursor:pointer" title="싸이월드" /></td>
										<?}?>
										<?if(in_array("facebook",$arrSns)){?>
											<td><img src="/image/right_icon_06.jpg" width="28" height="26" border="0" onclick="sns_facebook('<?=$prdname?>','<?=$shop_info->shop_url?>')" style="cursor:pointer" title="페이스북" /></td>
										<?}?>
										<?if(in_array("email",$arrSns)){?>
											<td><img src="/image/right_icon_04.jpg" width="28" height="26" border="0" onclick="sns_email('<?=$prdname?>')" style="cursor:pointer" title="이메일" /></td>
										<?}?>
										</tr>
									</table>
								</td>
							</tr>
						</table>

						<!--구독하기-->
						<form name="feedForm" method="post" action="/oneday/feed.php" onsubmit="return onFeed(this)">
						<table width="171" height="42" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="64"><img src="/image/left_title_01.jpg" width="64" height="19" title="구독하기" /></td>
								<td align="right">
									<input type="image" src="/image/right_btn_app.jpg" width="53" height="23" />
									<img src="/image/bt2.jpg" width="48" height="23" style="cursor:pointer" onclick="notReveive(document.feedForm);" />
								</td>
							</tr>
						</table>
						<table width="171" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td height="24"><img src="/image/login_email.jpg" width="32" height="12"></td>
								<td width="20" height="24" align="center"><input type="checkbox" name="type" value="email"></td>
								<td height="24"><input name="feed_email" type="text" class="form01" style="width: 121px"></td>
							</tr>
							<tr>
								<td height="24"><img src="/image/login_hp.jpg" width="32" height="12"></td>
								<td height="20" align="center"><input type="checkbox" name="type" value="sms"></td>
								<td height="24"><input name="feed_sms" type="text" class="form01" style="width: 121px"></td>
							</tr>
						</table>
						</form>

						<table width="90" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
							<tr>
								<td></td>
							</tr>
						</table>
						<table width="171" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><img src="/image/right_title_02.jpg" width="171" height="35"></td>
							</tr>
						</table>
						<table width="171" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><img src="/image/right_text_01.jpg" width="56" height="16"></td>
							</tr>
							<tr>
								<td height="25" class="font05">02.123-4567</td>
							</tr>
							<tr>
								<td height="43" valign="top"><img src="/image/right_time.jpg" width="138" height="31"></td>
							</tr>
						</table>
						<table width="171" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><img src="/image/right_text_02.jpg" width="114" height="16"></td>
							</tr>
							<tr>
								<td height="25" class="font05">02.123-4567</td>
							</tr>
							<tr>
								<td height="43" valign="top"><img src="/image/right_time.jpg" width="138" height="31"></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>