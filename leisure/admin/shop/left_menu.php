<table width="175" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td><img src="../image/left_tit_shop.gif"></td>
	</tr>
	<tr>
		<td style="padding-top:5px"><img src="../image/left_top.gif" width="175" height="10"></td>
	</tr>
	<tr>
		<td background="../image/left_bg.gif" style="padding:0 12 3 15">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
<? if(strpos($wiz_admin[permi], "01-01") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr>
					<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle"><a href="shop_info.php">�⺻��������</a></td>
				</tr>
				<tr>
					<td height="1" bgcolor="#DEDEDE"></td>
				</tr>
<? } ?>
<? if(strpos($wiz_admin[permi], "01-02") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr>
					<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle"><a href="shop_oper.php">���������</a></td>
				</tr>
				<tr>
					<td height="20" style="padding-left:10px"><img src="../image/left_s_arrow.gif" align="absmiddle"><a href="shop_oper.php#pay">��������</a></td>
				</tr>
				<tr>
					<td height="20" style="padding-left:10px"><img src="../image/left_s_arrow.gif" align="absmiddle"><a href="shop_oper.php#del">�������</a></td>
				</tr>
				<tr>
					<td height="20" style="padding-left:10px"><img src="../image/left_s_arrow.gif" align="absmiddle"><a href="shop_oper.php#res">����������</a></td>
				</tr>
				<tr>
					<td height="1" bgcolor="#DEDEDE"></td>
				</tr>
<? } ?>
<? if(strpos($wiz_admin[permi], "01-03") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr>
					<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle"><a href="shop_mailsms.php">����<? if(!strcmp($shop_info->sms_use, "Y")) { ?>/SMS<? } ?>����</a></td>
				</tr>
				<tr>
					<td height="1" bgcolor="#DEDEDE"></td>
				</tr>
				<tr>
					<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle"><a href="shop_mailtest.php">���Ϲ߼��׽�Ʈ</a></td>
				</tr>
				<tr>
					<td height="1" bgcolor="#DEDEDE"></td>
				</tr>
<? } ?>
<? if((strpos($wiz_admin[permi], "01-04") !== false || !strcmp($wiz_admin[designer], "Y")) && !strcmp($shop_info->sms_use, "Y")) { ?>
				<tr>
					<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle"><a href="shop_smsfill.php">SMS����</a></td>
				</tr>
				<tr>
					<td height="1" bgcolor="#DEDEDE"></td>
				</tr>
<? } ?>
<? if(strpos($wiz_admin[permi], "01-05") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr>
					<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle"><a href="shop_admin.php">�����ڼ���</a></td>
				</tr>
				<tr>
					<td height="1" bgcolor="#DEDEDE"></td>
				</tr>
<? } ?>
<? if(strpos($wiz_admin[permi], "01-06") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr>
					<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle"><a href="shop_trade.php">�ŷ�ó����</a></td>
				</tr>
				<tr>
					<td height="1" bgcolor="#DEDEDE"></td>
				</tr>
<? } ?>
<? if(strpos($wiz_admin[permi], "01-07") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr>
					<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle"><a href="shop_coupon.php">��������</a></td>
				</tr>
				<tr>
					<td height="1" bgcolor="#DEDEDE"></td>
				</tr>
<? } ?>
<? if(strpos($wiz_admin[permi], "01-08") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr>
					<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle"><a href="shop_popup.php">�˾�����</a></td>
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