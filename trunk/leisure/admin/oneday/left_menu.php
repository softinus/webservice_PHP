<table width="175" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td><img src="../image/left_tit_oneday.gif"></td>
	</tr>
	<tr> 
		<td style="padding-top:5px"><img src="../image/left_top.gif" width="175" height="10"></td>
	</tr>
	<tr> 
		<td background="../image/left_bg.gif" style="padding:0 12 3 15"> 
			<table width="100%" border="0" cellpadding="0" cellspacing="0">



<? if(strpos($wiz_admin[permi], "05-01") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr> 
					<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle"><a href="oneday_oper.php">�����̸� ����</a></td>
				</tr>
				<tr> 
					<td height="1" bgcolor="#DEDEDE"></td>
				</tr>
<? } ?>
<? if(strpos($wiz_admin[permi], "05-02") !== false || strpos($wiz_admin[permi], "05-03") !== false || strpos($wiz_admin[permi], "05-04") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr> 
					<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle">�����̸� ��ǰ����</td>
				</tr>
<? }?>
<? if(strpos($wiz_admin[permi], "05-02") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr> 
					<td height="20" style="padding-left:10px;"><a href="prd_category.php"> - ��������</a></td>
				</tr>
<? } ?>
<? if(strpos($wiz_admin[permi], "05-03") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr> 
					<td height="20" style="padding-left:10px;"><a href="prd_list.php"> - ��ǰ�޷�</a> / <a href="prd_list2.php">���</a></td>
				</tr>
<? } ?>

<? if(strpos($wiz_admin[permi], "05-04") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr> 
					<td height="20" style="padding-left:10px;"><a href="prd_input.php"> - ��ǰ���</a></td>
				</tr>
<? } ?>
				
				<tr> 
					<td height="1" bgcolor="#DEDEDE"></td>
				</tr>
				<tr> 
					<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle">�����̸� �ֹ�����</td>
				</tr>
<? if(strpos($wiz_admin[permi], "05-05") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr> 
					<td height="20" style="padding-left:10px;"><a href="order_list.php"> - ��ü�ֹ����</a></td>
				</tr>
<?}?>

<? if(strpos($wiz_admin[permi], "05-07") !== false || strpos($wiz_admin[permi], "05-08") !== false || strpos($wiz_admin[permi], "05-09") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr> 
					<td height="1" bgcolor="#DEDEDE"></td>
				</tr>
				<tr> 
					<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle">�����̸� ��Ÿ����</td>
				</tr>

<?}?>
<? if(strpos($wiz_admin[permi], "05-07") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr> 
					<td height="20" style="padding-left:10px;"><a href="oneday_company.php"> - ���޾�ü����</a></td>
				</tr>
<? } ?>
<? if(strpos($wiz_admin[permi], "05-08") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr> 
					<td height="20" style="padding-left:10px;"><a href="oneday_sns.php"> - ������û����</a></td>
				</tr>
<? } ?>
<? if(strpos($wiz_admin[permi], "05-09") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr> 
					<td height="20" style="padding-left:10px;"><a href="oneday_md.php"> - MD����</a></td>
				</tr>
<? } ?>

<? if(strpos($wiz_admin[permi], "05-10") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr> 
					<td height="20" style="padding-left:10px;"><a href="oneday_advert.php"> - ȫ������</a></td>
				</tr>
<? } ?>

<? if(strpos($wiz_admin[permi], "05-11") !== false || strpos($wiz_admin[permi], "05-12") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
			<tr> 
					<td height="1" bgcolor="#DEDEDE"></td>
				</tr>
				<tr> 
					<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle">�˸����</td>
				</tr>
<?}?>
<? if(strpos($wiz_admin[permi], "05-11") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr> 
					<td height="20" style="padding-left:10px;"><a href="oneday_email.php"> - �̸��Ͼ˸����</a></td>
				</tr>
<? } ?>

<? if(strpos($wiz_admin[permi], "05-12") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr> 
					<td height="20" style="padding-left:10px;"><a href="oneday_sms.php"> - SMS�˸����</a></td>
				</tr>
<? } ?>
			</table>
		</td>
	</tr>
	<tr> 
		<td><img src="../image/left_bottom.gif" width="175" height="7"></td>
	</tr>
</table>