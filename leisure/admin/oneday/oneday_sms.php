<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">SMS알림기능</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">SMS알림기능</td>
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
						<b>SMS알림기능은 상품등록시 작성한 SMS문구를 회원에게 지정한 시간에 자동으로 발송하는 기능을 말합니다.</b><br><br>
						<font color="red">SMS알림기능 서비스 주의사항</font><br>
						- 호스팅을 받고 있는 서버에서 크론을 지원해주어야 합니다.<br />
						- 매일 발송시간 부분은 서버에서 크론설정시 할 수 있습니다. 크론설정 URL의 경우 <strong style="color:#000; text-decoration:underline;">http://<?=$_SERVER[HTTP_HOST]?>/cron/send_sms.php</strong> 입니다.<br />
						- 해당날짜의 판매되는 상품들의 SMS 문구가 수신허용회원 및 구독신청 휴대폰번호로 발송 됩니다.<br/>
						- SMS제휴업체인 아이코드사에 충분한 문자발송비용이 충전또는 정액제에 가입되어 있어야 합니다.<br/>
						<font color="blue">- 호스팅 회사에 크론지원여부를 확인후 원하는 발송시간과 http://<?=$_SERVER[HTTP_HOST]?>/cron/send_sms.php 를 등록요청하시면 됩니다.</font>
						
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