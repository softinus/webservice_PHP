<script language="JavaScript">
<!--
function bbsCheck(frm){

	for(var i=0; i<frm.elements.length; i++){
		if(frm.elements[i].name=="agree" && frm.elements[i].checked==false){
			alert("개인정보이용약관에 동의하셔야 합니다.");
			return false;
		}
	}


	if(frm.name.value == ""){
		alert("작성자를 입력하세요.");
		frm.name.focus();
		return false;
	}
	if(frm.subject.value == ""){
		alert("제목을 입력하세요.");
		frm.subject.focus();
		return false;
	}
	if(frm.content.value == ""){
		alert("내용을 입력하세요.");
		try{ frm.content.focus(); }
		catch(e){ }
		return false;
	}
	if (frm.vcode != undefined && (hex_md5(frm.vcode.value) != md5_norobot_key)) {
		alert("자동등록방지코드를 정확히 입력해주세요.");
		frm.vcode.focus();
		return false;
	}
}
-->
</script>
<style>
.form03{font-size:11px !important; color:#444 !important;}
</style>
<form name="frm" action="/bbs/save.php" method="post" enctype="multipart/form-data" onSubmit="return bbsCheck(this)">
	<input type="hidden" name="code" value="<?=$code?>">
	<input type="hidden" name="mode" value="<?=$mode?>">
	<input type="hidden" name="idx" value="<?=$idx?>">
	<input type="hidden" name="page" value="<?=$page?>">
	<input type="hidden" name="searchopt" value="<?=$searchopt?>">
	<input type="hidden" name="searchkey" value="<?=$searchkey?>">
	<input type="hidden" name="prdcode" value="<?=$prdcode?>">
	<input type="hidden" name="tmp_vcode" value="<?=md5($norobot_key)?>">
			<table width="932" height="582" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center" valign="top">
						<table width="710" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td height="40"><img src="image/customer_tx_t_01.gif" width="116" height="29"></td>
							</tr>
							<tr>
								<td><textarea name="textarea" style="width: 710px; height:200px;"><?=$page_info->content2?></textarea></td>
							</tr>
							<tr>
								<td height="50"><input type="checkbox" name="agree" value="Y">동의합니다.</td>
							</tr>
						</table>
						<table width="710" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td><img src="image/c_tx_01.gif" width="139" height="27"></td>
							</tr>
							<tr>
								<td height="200" valign="top">
									<table width="710" height="2" border="0" cellpadding="0" cellspacing="0" bgcolor="ACACAC">
										<tr>
											<td></td>
										</tr>
									</table>
									<table width="710" height="36" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td width="100" bgcolor="FDFBF6"><img src="image/c_t_01.gif" width="100" height="17"></td>
											<td width="1" bgcolor="E8E5E4"></td>
											<td style="padding-left:5px;"><input name="name" type="text" class="form03" id="name" style="width: 134px; height:22px;" value="<?=$name?>"></td>
										</tr>
									</table>
									<table width="710" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="E8E5E4">
										<tr>
											<td></td>
										</tr>
									</table>
									<table width="710" height="36" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td width="100" bgcolor="FDFBF6"><img src="image/c_t_02.gif" width="100" height="17"></td>
											<td width="1" bgcolor="E8E5E4"></td>
											<td style="padding-left:5px;"><input name="email" type="text" class="form03" id="emil" style="width: 194px; height:22px;" value="<?=$email?>"></td>
										</tr>
									</table>
									<table width="710" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="E8E5E4">
										<tr>
											<td></td>
										</tr>
									</table>
									<table width="710" height="36" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td width="100" bgcolor="FDFBF6"><img src="image/c_t_03.gif" width="100" height="17"></td>
											<td width="1" bgcolor="E8E5E4"></td>
											<td style="padding-left:5px;"><input name="addinfo1" type="text" class="form03" id="homepy" style="width: 194px; height:22px;" value="<?=$addinfo1?>"></td>
										</tr>
									</table>
									<table width="710" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="E8E5E4">
										<tr>
											<td></td>
										</tr>
									</table>
									<table width="710" height="36" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td width="100" bgcolor="FDFBF6"><img src="image/c_t_04.gif" width="100" height="17"></td>
											<td width="1" bgcolor="E8E5E4"></td>
											<td style="padding-left:5px;">
												<input name="tphone1" type="text" class="form03" id="tel01" style="width: 56px; height:22px;" value="<?=$tphone1?>" />
												-
												<input name="tphone2" type="text" class="form03" id="tel02" style="width: 56px; height:22px;" value="<?=$tphone1?>" />
												-
												<input name="tphone3" type="text" class="form03" id="tel03" style="width: 56px; height:22px;" value="<?=$tphone1?>" />
											</td>
										</tr>
									</table>
									<table width="710" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="E8E5E4">
										<tr>
											<td></td>
										</tr>
									</table>
									<table width="710" height="36" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td width="100" bgcolor="FDFBF6"><img src="image/c_t_05.gif" width="100" height="17"></td>
											<td width="1" bgcolor="E8E5E4"></td>
											<td style="padding-left:5px;"><input name="subject" type="text" class="form03" id="subject" style="width: 510px; height:22px;"></td>
										</tr>
									</table>
									<table width="710" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="E8E5E4">
										<tr>
											<td></td>
										</tr>
									</table>
									<table width="710" height="38" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td width="100" bgcolor="FDFBF6"><img src="image/c_t_06.gif" width="100" height="17"></td>
											<td width="1" bgcolor="E8E5E4"></td>
											<td height="220" style="padding-left:5px;"><textarea name="content" style="width: 595px; height:200px;"></textarea></td>
										</tr>
									</table>
									<table width="710" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="E8E5E4">
										<tr>
											<td></td>
										</tr>
									</table>


  <?=$hide_spam_check_start?>
									<table width="710" height="36" border="0" cellpadding="0" cellspacing="0">
										<tr>
											<td width="100" bgcolor="FDFBF6"><img src="image/c_t_07.gif" width="100" height="17"></td>
											<td width="1" bgcolor="E8E5E4"></td>
											<td style="padding-left:5px;"><?=$spam_check?></td>
										</tr>
									</table>
  <?=$hide_spam_check_end?>

									<table width="710" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="DEB07A">
										<tr>
											<td></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<table width="710" height="100" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td align="center"><?=$confirm_btn?></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
</form>
		</td>
	</tr>
</table>