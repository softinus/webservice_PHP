<table width="175" border="0" cellpadding="0" cellspacing="0">
	<tr><td><img src="../image/left_tit_product.gif"></td></tr>
	<tr>
		<td style="padding-top:5px"><img src="../image/left_top.gif" width="175" height="10"></td>
	</tr>
	<tr>
		<td background="../image/left_bg.gif" style="padding:0 12 3 15">
			<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle">��ǰ����</td>
				</tr>
<? if(strpos($wiz_admin[permi], "04-01") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr>
					<td height="20" style="padding-left:10px"><a href="prd_list.php">- ��ǰ���</a></td>
				</tr>
<? } ?>

<? if(strpos($wiz_admin[permi], "04-02") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr>
					<td height="20" style="padding-left:10px"><a href="prd_input.php">- ��ǰ���</a></td>
				</tr>
<? } ?>

<? if(strpos($wiz_admin[permi], "04-03") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr>
					<td height="20" style="padding-left:10px"><a href="prd_category.php">- ��ǰ�з�����</a></td>
				</tr>
<? } ?>

<? if(strpos($wiz_admin[permi], "04-04") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr>
					<td height="20" style="padding-left:10px"><a href="prd_brand.php">- �귣�����</a></td>
				</tr>
<? } ?>

<? if(strpos($wiz_admin[permi], "04-05") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr>
					<td height="20" style="padding-left:10px"><a href="prd_option.php">- �ɼ��׸� ����</a></td>
				</tr>
<? } ?>

<? if(strpos($wiz_admin[permi], "04-06") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr>
					<td height="20" style="padding-left:10px"><a href="prd_shortage.php">- ������</a></td>
				</tr>
<? } ?>

<? if(strpos($wiz_admin[permi], "04-07") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr>
					<td height="20" style="padding-left:10px"><a href="prd_estimate.php">- ��ǰ�����</a></td>
				</tr>
<? } ?>
				<tr>
					<td height="10"></td>
				</tr>
				<tr>
					<td height="30"><img src="../image/left_m_arrow.gif" align="absmiddle">�ֹ�����</td>
				</tr>
<? if(strpos($wiz_admin[permi], "04-08") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr>
					<td height="20" style="padding-left:10px"><a href="order_list.php">- ��ü�ֹ����</a></td>
				</tr>
<?}?>
<? if(strpos($wiz_admin[permi], "04-09") !== false || !strcmp($wiz_admin[designer], "Y")){ ?>
				<tr>
					<td height="20" style="padding-left:10px"><a href="cancel_list.php">- �ֹ���Ҹ��</a></td>
				</tr>
<?}?>
			</table>
		</td>
	</tr>
	<tr>
		<td><img src="../image/left_bottom.gif" width="175" height="7"></td>
	</tr>
</table>