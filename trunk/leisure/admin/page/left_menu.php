			<table width="175" border="0" cellpadding="0" cellspacing="0">
				<tr><td><img src="../image/left_tit_page.gif"></td></tr>
				<tr> 
					<td style="padding-top:5px"><img src="../image/left_top.gif" width="175" height="10"></td>
				</tr>
				<tr> 
					<td background="../image/left_bg.gif" style="padding:0 12 3 15"> 
						<table width="100%" border="0" cellpadding="0" cellspacing="0">
							
							<? if(strpos($wiz_admin[permi], "03-01") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
							<tr> 
								<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle"><a href="page_company.php">회사소개</a></td>
							</tr>
							<tr> 
								<td height="1" bgcolor="#DEDEDE"></td>
							</tr>
							<? } ?>
							
							<? if(strpos($wiz_admin[permi], "03-02") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
							<tr> 
								<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle"><a href="page_join.php">회원가입</a></td>
							</tr>
							<tr> 
								<td height="1" bgcolor="#DEDEDE"></td>
							</tr>
							<? } ?>

							<? if(strpos($wiz_admin[permi], "03-04") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
							<tr> 
								<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle"><a href="page_basket.php">장바구니</a></td>
							</tr>
							<tr> 
								<td height="1" bgcolor="#DEDEDE"></td>
							</tr>
							<? } ?>
							
							<? if(strpos($wiz_admin[permi], "03-05") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
							<tr> 
								<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle"><a href="page_center.php">고객센터</a></td>
							</tr>
							<tr> 
								<td height="1" bgcolor="#DEDEDE"></td>
							</tr>
							<? } ?>
							
							<? if(strpos($wiz_admin[permi], "03-05") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
							<tr> 
								<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle"><a href="page_guide.php">이용안내</a></td>
							</tr>
							<tr> 
								<td height="1" bgcolor="#DEDEDE"></td>
							</tr>
							<? } ?>
							
							<? if(strpos($wiz_admin[permi], "03-07") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
							<tr> 
								<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle"><a href="page_privacy.php">개인정보보호정책</a></td>
							</tr>
							<tr> 
								<td height="1" bgcolor="#DEDEDE"></td>
							</tr>
							<? } ?>
							
							<? if(strpos($wiz_admin[permi], "03-08") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
							<tr> 
								<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle"><a href="page_other.php">기타페이지 </a></td>
							</tr>
							<tr> 
								<td height="1" bgcolor="#DEDEDE"></td>
							</tr>
							<? } ?>

						</table>
					</td>
				</tr>
				<tr> 
					<td><img src="../image/left_bottom.gif" width="175" height="7"></td>
				</tr>
			</table>