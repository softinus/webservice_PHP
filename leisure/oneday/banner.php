<?
include "../inc/oneday_header.inc"; 			// ��ܵ�����
$page_type = "banner";
include "../inc/page_info.inc"; 		// ������ ����
$now_position = "<a href=/>Home</a> &gt; �̿�ȳ�";
include "../inc/now_position.inc";

 $sql = "select * from wiz_advert";
 $result = mysql_query($sql)or die($sql);
 $advert_info = mysql_fetch_object($result);
 $imgPath = "data/oneday/";
 $imgPath2 = "/data/oneday/";

if($wiz_session[id]){
	$textUrl = $advert_info->advert_url."?rid=".base64_encode($wiz_session[id]);
	$imgUrl = '<a href="'.$advert_info->advert_url.'?rid='.base64_encode($wiz_session[id]).'"><img src="'.$advert_info->advert_url.$imgPath.$advert_info->advert_img.'" border="0" /></a>';
}else{
	$textUrl = "�α����� �Ͻø� ȸ������ ȫ��URL�� �� �� �ֽ��ϴ�.";
	$imgUrl = "�α����� �Ͻø� ȸ������ ȫ��URL�� �� �� �ֽ��ϴ�.";
}
?>
 <script>
 function onCopyUrl(type){
	 var formObj = document.recoForm;
	 var doc = formObj.texturl;
	 doc.select();
	 var clip = doc.createTextRange();
	 clip.execCommand('copy');
	 alert("Ŭ�����忡 ���� �Ͽ����ϴ�. Ctrl + V�� �ٿ��ֱ� �ϼ���!")
 }
function onCopyUrl2(type){
	 var formObj = document.recoForm;
	 var doc = formObj.imgurl;
	 doc.select();
	 var clip = doc.createTextRange();
	 clip.execCommand('copy');
	 alert("Ŭ�����忡 ���� �Ͽ����ϴ�. Ctrl + V�� �ٿ��ֱ� �ϼ���!")
}
 </script>
 <form name="recoForm">
<table width="1012" height="683" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr> 
		<td valign="top"style="padding-left:33px; padding-top:40px;">
			<table width="932" height="32" border="0" cellpadding="0" cellspacing="0">
				<tr> 
					<td valign="top"><img src="image/s_t_banner.gif" width="191" height="32"></td>
				</tr>
				<tr> 
					<td height="33" valign="top">&nbsp;</td>
				</tr>
			</table>
			<table width="932" height="289" border="0" cellpadding="0" cellspacing="0">
				<tr> 
					<td height="271" colspan="2" valign="top"><img src="image/banner_image_01.gif" width="932" height="271"></td>
				</tr>
				<tr> 
					<td width="143" valign="top"><img src="image/banner_title_02.gif" width="255" height="69"></td>
					<td width="789" height="166" valign="top" style="padding-top:36px;">
						<table width="677" height="53" border="0" cellpadding="0" cellspacing="1" bgcolor="B2B2B2">
							<tr>
								<td bgcolor="#FFFFFF" style="padding-left:10px;">
									<table width="654" height="22" border="0" cellpadding="0" cellspacing="0">
										<tr> 
											<td width="582"><input name="texturl" type="text" class="form01" style="width: 577px; height:29px;" value="<?=$textUrl?>"></td>
											<td width="72" align="right"><img src="image/banner_button_01.gif" width="61" height="27" border="0" onclick="onCopyUrl('texturl')" style="cursor:pointer" /></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<table width="677" height="52" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td>- ����� �ּҸ� �޽��� ��ȭâ�̳� �Խ��ǿ� �÷�������~<br>
								- �������� ������� �Ұ����� ������� Ŭ���� ������ ��쿣 ������ ��� �ݾ��� ��ҵǿ��� ������ �ּ���.</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr> 
					<td width="143" valign="top"><img src="image/banner_title_03.gif" width="255" height="69"></td>
					<td height="270" valign="top"style="padding-top:36px;">
						<table width="677" height="105" border="0" cellpadding="0" cellspacing="1" bgcolor="B2B2B2">
							<tr> 
								<td bgcolor="#FFFFFF" style="padding-left:10px;">
									<table width="654" height="22" border="0" cellpadding="0" cellspacing="0">
										<tr> 
											<td width="165">
												<table width="158" height="83" border="0" cellpadding="0" cellspacing="1" bgcolor="E3E1E1">
													<tr>
														<td bgcolor="#FFFFFF"><img src="<?=$imgPath2.$advert_info->advert_img?>" width="153" height="44" /></td>
													</tr>
												</table>
											</td>
											<td>
												<textarea name="imgurl" cols="10" rows="10" style="width:410px; height:80px;" class="form01"><?=$imgUrl?></textarea>
											</td>
											<td width="72" align="right"><img src="image/banner_button_02.gif" width="61" height="81" border="0" onclick="onCopyUrl2('imgurl')" style="cursor:pointer" /></td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
						<table width="677" height="52" border="0" cellpadding="0" cellspacing="0">
							<tr> 
								<td>- �̹��� ������ : 153*44<br>
								- ���̹� ��α׳� Ƽ���丮 �� ��α׸� ��Ͻô� ���̶�� ��α׿� ��Ź�غ�����.</td>
							</tr>
						</table> 
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>
<?
include "../inc/oneday_footer.inc"; 		// �ϴܵ�����
?>