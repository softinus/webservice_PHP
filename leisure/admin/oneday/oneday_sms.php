<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">SMS�˸����</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">SMS�˸����</td>
	</tr>
</table>

<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="9d9d9d">
	<tr>
		<td width="5" height="5"><img src="../image/check_left_top.gif"></td>
		<td width="100%"></td>
		<td width="5" height="5"><img src="../image/check_right_top.gif"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<table width="100%" border="0" cellspacing="0" cellpadding="6">
				<tr>
					<td><img src="../image/check_tit.gif" width="75" height="19" /></td>
				</tr>
				<tr>
					<td class="chk_alt">
						<b>SMS�˸������ ��ǰ��Ͻ� �ۼ��� SMS������ ȸ������ ������ �ð��� �ڵ����� �߼��ϴ� ����� ���մϴ�.</b><br><br>
						<font color="red">SMS�˸���� ���� ���ǻ���</font><br>
						- ȣ������ �ް� �ִ� �������� ũ���� �������־�� �մϴ�.<br />
						- ���� �߼۽ð� �κ��� �������� ũ�м����� �� �� �ֽ��ϴ�. ũ�м��� URL�� ��� <strong style="color:#000; text-decoration:underline;">http://<?=$_SERVER[HTTP_HOST]?>/cron/send_sms.php</strong> �Դϴ�.<br />
						- �ش糯¥�� �ǸŵǴ� ��ǰ���� SMS ������ �������ȸ�� �� ������û �޴�����ȣ�� �߼� �˴ϴ�.<br/>
						- SMS���޾�ü�� �����ڵ�翡 ����� ���ڹ߼ۺ���� �����Ǵ� �������� ���ԵǾ� �־�� �մϴ�.<br/>
						<font color="blue">- ȣ���� ȸ�翡 ũ���������θ� Ȯ���� ���ϴ� �߼۽ð��� http://<?=$_SERVER[HTTP_HOST]?>/cron/send_sms.php �� ��Ͽ�û�Ͻø� �˴ϴ�.</font>
						
					</td>
				</tr>
			</table>
		</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td width="5" height="5"><img src="../image/check_left_bottom.gif" width="5" height="5" /></td>
		<td></td>
		<td width="5" height="5"><img src="../image/check_right_bottom.gif" width="5" height="5" /></td>
	</tr>
</table>

<? include "../footer.php"; ?>