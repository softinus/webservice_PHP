<?
include "../inc/oneday_header.inc"; 	// 디자인 정보
include "../inc/design_info.inc"; 	// 디자인 정보

$now_position = "<a href=/>Home</a> &gt; 로그인";
$page_type = "login";

include "../inc/page_info.inc"; 		// 페이지 정보
include "../inc/now_position.inc";	// 현재위치

if($prev == "") $prev = $HTTP_REFERER;
else $prev = "http://".$HTTP_HOST.$prev;

?>
<script language="JavaScript">
<!--
function inputCheck(frm){
	if(frm.id.value == ""){
		alert("아이디를 입력하세요");
		frm.id.focus();
		return false;
	}
	if(frm.passwd.value == ""){
		alert("비밀번호를 입력하세요");
		frm.passwd.focus();
		return false;
	}
	
	if(frm.secure_login != undefined) {	
		if(!frm.secure_login.checked){
			frm.action = "/member/login_handle.php";
		}
	}
}
-->
</script>

<table border=0 cellpadding=0 cellspacing=0 width=1012 align=center>
	<tr>
		<td height=150 align=center><img src="/images/member_login_01.gif"></td>
	</tr>
	<tr>
		<td height=300>
			<table width="1012" border="0" cellspacing="0" cellpadding="0">
			<form name="frm" action="<?=$ssl?>/member/login_handle.php" method="post" onSubmit="return inputCheck(this);">
				<input type="hidden" name="prev" value="<?=$prev?>">
				<tr>
					<td>
						<table width="90%"  align="center" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><img src="/images/member_login_t01.gif"></td>
							</tr>
							<tr>
								<td>
									<table border=0 cellpadding=0 cellspacing=0 width=100%>
										<tr>
											<td width=10 height=10 background="/images/box_l.gif"></td>
											<td background="/images/box_t.gif"></td>
											<td width=10 background="/images/box_cor02.gif"></td>
										</tr>
										<tr>
											<td background="/images/box_l.gif"></td>
											<td style="padding:10;">
												<table border=0 cellpadding=0 cellspacing=0 align=center>
													<tr>
														<td width=270>
															<table border=0 cellpadding=0 cellspacing=0 align=center>
																<tr>
																	<td><img src="/images/member_login_id.gif" align=absmiddle></td>
																	<td><input type="text" name="id" style="width:120px" class="input"></td>
																</tr>
																<tr>
																	<td height=8></td>
																</tr>
																<tr>
																	<td><img src="/images/member_login_pw.gif" align=absmiddle></td>
																	<td><input type="password" name="passwd" style="width:120px" class="input"></td>
																</tr>
						<?=$hide_ssl_start?>
																<tr>
																	<td></td>
																	<td><input type="checkbox" name="secure_login" value="Y" checked>보안접속</td>
																</tr>
						<?=$hide_ssl_end?>
															</table>
														</td>
														<td valign="top"><input name="image" type="image" src="/images/member_btn_login.gif"></td>
													</tr>
												</table>
											</td>
											<td background="/images/box_r.gif"></td>
										</tr>
										<tr>
											<td height=10 background="/images/box_cor03.gif"></td>
											<td background="/images/box_b.gif"></td>
											<td background="/images/box_cor04.gif"></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td align="center" style="padding:10 20 20 20">
									<table border=0 cellpadding=0 cellspacing=0>
										<tr height=30>
											<td><img src="/images/member_login_btn_join.gif"></td>
											<td><a href="join.php"><img src="/images/member_login_btn_join_01.gif" border=0></a></td>
											<td width=50></td>
											<td><img src="/images/member_login_btn_idsearch.gif"></td>
											<td><a href="id_search.php"><img src="/images/member_login_btn_idsearch_01.gif" border=0></a></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</form>
			</table>
<? if($order == "true"){ ?>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<table width="90%" align="center" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><img src="/images/member_login_02.gif"></td>
							</tr>
							<tr>
								<td>
									<table border=0 cellpadding=0 cellspacing=0 width=100%>
										<tr>
											<td width=10 height=25 background="/images/member_login_02_bg01.gif"></td>
											<td bgcolor="3BBF6D" style="padding-left:30;"><img src="/images/member_login_02_02.gif"></td>
											<td width=10 background="/images/member_login_02_bg02.gif"></td>
										</tr>
										<tr>
											<td background="/images/box_l.gif"></td>
											<td  style="padding:10 0 0 10;">
												<table border=0 cellpadding=0 cellspacing=0>
													<tr>
														<td><img src="/images/member_login_02_01.gif"></td>
														<td><a href="/shop/order_form.php?order_guest=true"><img src="/images/member_login_btn_nomem.gif" border=0></a></td>
													</tr>
												</table>
											</td>
											<td background="/images/box_r.gif"></td>
										</tr>
										<tr>
											<td height=10 background="/images/box_cor03.gif"></td>
											<td background="/images/box_b.gif"></td>
											<td background="/images/box_cor04.gif"></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
<? } ?>

<? if($orderlist == "true"){ ?>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
			<form action="/shop/order_list.php" method="get">
				<input type="hidden" name="order_guest" value="true">
				<tr>
					<td>
						<table width="90%" align="center" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><img src="/images/member_login_03.gif"></td>
							</tr>
							<tr>
								<td>
									<table border=0 cellpadding=0 cellspacing=0 width=100%>
										<tr>
											<td width=10 height=25 background="/images/member_login_02_bg01.gif"></td>
											<td bgcolor="3BBF6D" style="padding-left:30;"><img src="/images/member_login_03_01.gif"></td>
											<td width=10 background="/images/member_login_02_bg02.gif"></td>
										</tr>
										<tr>
											<td background="/images/box_l.gif"></td>
											<td  style="padding:10 0 0 10">
												<table border=0 cellpadding=0 cellspacing=0>
													<tr>
														<td width=140><img src="/images/member_login_o_name.gif" align=absmiddle><input type=text name="send_name" size=10 class="input"></input></td>
														<td width=220><img src="/images/member_login_o_no.gif" align=absmiddle><input type=text name="orderid" size=16 class="input"></input></td>
														<td><input type="image" src="/images/member_login_btn_o_nomem.gif" border=0></td>
													</tr>
												</table>
											</td>
											<td background="/images/box_r.gif"></td>
										</tr>
										<tr>
											<td height=10 background="/images/box_cor03.gif"></td>
											<td background="/images/box_b.gif"></td>
											<td background="/images/box_cor04.gif"></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</form>
			</table>
<? } ?>
		</td>
	</tr>
</table>

<?

include "../inc/oneday_footer.inc"; 		// 하단디자인

?>