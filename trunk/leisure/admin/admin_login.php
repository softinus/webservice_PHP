<?
session_start();
if($wiz_admin[id] != ""){
echo "<script>document.location='./main/main.php';</script>";
exit;
}

include_once "$_SERVER[DOCUMENT_ROOT]/inc/common.inc";
?>
<html>
<head>
<title>:: 쇼핑몰 관리자 ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<title>Untitled Document</title>
<link href="./style.css" rel="stylesheet" type="text/css">
<script language="javascript">
<!--
function inputCheck(frm){

   if(frm.admin_id.value == ""){
      alert("관리자 아이디를 입력하세요");
      frm.admin_id.focus();
      return false;
   }

   if(frm.admin_pw.value == ""){
      alert("관리자 비밀번호를 입력하세요");
      frm.admin_pw.focus();
      return false;
   }

}

function loginFocus(){

   var frm = document.frm;
   var admin_id = frm.admin_id.value;
   var admin_pw = frm.admin_pw.value;

   if(admin_id == ""){
      frm.admin_id.focus();
   }else{
      if(admin_pw == "") frm.admin_pw.focus();
   }

}

-->
</script>
</head>

<body onLoad="loginFocus();">

<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td valign="top" bgcolor="f7f7f7">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td height="200"></td>
				</tr>
				<tr>
					<td height="1" bgcolor="d6d6d6"></td>
				</tr>
				<tr>
					<td height="280" align="center" bgcolor="#FFFFFF">
						<table border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><img src="./image/login_txt_login.gif" width="263" height="153" /></td>
								<td width="40">&nbsp;</td>
								<td><img src="./image/login_txt_vline.gif" width="24" height="227" /></td>
								<td width="20">&nbsp;</td>
								<td>
									<table border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td>
												<table border="0" cellspacing="0" cellpadding="0">
												<form name="frm" action="./admin_check.php" method="post" onSubmit="return inputCheck(this);">
													<tr>
														<td height="30" align="left" style="padding-left:63px;" width="210" colspan="2">
															<input type="radio" name="admin_mode" value="admin"  <? if($admin_mode == "") echo "checked"; ?>/> 사이트관리자
															<input type="radio" name="admin_mode" value="company" <? if($admin_mode == "company") echo "checked"; ?> /> 공급업체
														</td>
													</tr>
													<tr>
														<td>
															<table border="0" cellspacing="0" cellpadding="1">
																<tr>
																	<td><img src="./image/login_txt_id.gif" width="63" height="10" /></td>
																	<td><input type="text" name="admin_id" value="<?=$admin_id?>" class="login_input" style="width:160px"></td>
																</tr>
																<tr>
																	<td><img src="./image/login_txt_pw.gif" width="63" height="10" /></td>
																	<td><input type="password" name="admin_pw" value="<?=$admin_pw?>" class="login_input" style="width:160px"></td>
																</tr>
															</table>
														</td>
														<td style="padding-left:6px"><input type="image" src="./image/login_bt_login.gif"></td>
													</tr>
												</form>
												</table>
											</td>
										</tr>
										<tr>
											<td height="15"></td>
										</tr>
										<tr>
											<td style="padding-left:63px"><img src="./image/login_txt_01.gif" width="229" height="26" /></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td height="1" bgcolor="d6d6d6"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>