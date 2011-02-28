<? include_once "../inc/common.inc"; ?>
<? include_once "../inc/util.inc"; ?>
<? include_once "../inc/oper_info.inc"; ?>
<?
// SMS발송
if($mode == "sendsms"){

	if($se_num == "") error("보내는이가 없습니다.");
	if($seluser == "") error("받는이가 없습니다.");
	if($message == "") error("보낼 내용이 없습니다.");
	
	$user_list = explode(",",$seluser);
	
	for($ii=0; $ii < count($user_list); $ii++){
	
		$re_num = $user_list[$ii];
		send_sms($se_num, $re_num, $message);
	
	}

	echo "<script>alert('SMS 발송을 완료하였습니다.');self.close();</script>";
	exit;
}
?>
<html>
<head>
<title>:: SMS발송 ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="inc/style.css" rel="stylesheet" type="text/css">
</head>
<body leftmargin="0" topmargin="0">
<form name="frm" action="<?=$PHP_SELF?>" method="post" onSubmit="return inputCheck(this);">
	<input type="hidden" name="mode" value="sendsms">
	<input type="hidden" name="se_name" value="<?=$site_info[site_name]?>">
<table width="430" height="352" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td align="center" valign="top">
			<table width="430" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td><img src="image/sms_title.gif" width="430" height="57"></td>
				</tr>
				<tr>
					<td height="20"></td>
				</tr>
			</table>
			<table width="412" height="222" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td valign="top">
						<table width="412" height="2" border="0" cellpadding="0" cellspacing="0" bgcolor="DBDBDB">
							<tr>
								<td></td>
							</tr>
						</table>
						<table width="412" height="40" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="100" bgcolor="FDFBF6"><img src="image/sms_s_t_01.gif" width="100" height="17"></td>
								<td width="1" bgcolor="E8E5E4"></td>
								<td style="padding-left:5px;"><input name="se_num" type="text" class="form03" id="name1" style="width: 194px; height:22px;" value="<?=$wiz_session[hphone]?>"></td>
							</tr>
						</table>
						<table width="412" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="E8E5E4">
							<tr>
								<td></td>
							</tr>
						</table>
						<table width="412" height="40" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="100" bgcolor="FDFBF6"><img src="image/sms_s_t_02.gif" width="100" height="17"></td>
								<td width="1" bgcolor="E8E5E4"></td>
								<td style="padding-left:5px;"><input name="seluser" type="text" class="form03" id="name2" style="width: 194px; height:22px;" value="<?=$seluser?>"></td>
							</tr>
						</table>
						<table width="412" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="E8E5E4">
							<tr>
								<td></td>
							</tr>
						</table>
						<table width="412" height="137" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td width="100" bgcolor="FDFBF6"><img src="image/sms_s_t_03.gif" width="100" height="17"></td>
								<td width="1" bgcolor="E8E5E4"></td>
								<td style="padding-left:5px;"><textarea name="message" class="form03" style="width: 295px; height:122px;"><?=$msg?></textarea></td>
							</tr>
						</table>
						<table width="412" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="E8E5E4">
							<tr>
								<td></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<table width="202" height="52" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td width="123" align="center"><input type="image" src="image/sms_button_01.gif" width="111" height="37" border="0"></td>
					<td width="79" align="center"><img src="image/sms_button_02.gif" width="67" height="37" border="0"  style="cursor:pointer" onClick="self.close();"></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>
</body>
</html>