<? include "../../inc/common.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<?
if($mode == "mailsend"){
	
	$subject = "���Ϲ߼� �׽�Ʈ�Դϴ�.";
	$mail_body = "
	-------------------------------------------------
	[�����׽�Ʈ]
	�� ������ ����� ���̸� �̸����� ���ŵȰ� �Դϴ�.
	".date('Y-m-d h:i:s')."
	-------------------------------------------------
	";
	
	$mail = explode(",",$mailtmp);
	for($ii=0;$ii<count($mail);$ii++){
		mail($mail[$ii], $subject, $mail_body, $header);
	}
	
	echo "<script>alert('������ �߼��Ͽ����ϴ�.');history.go(-1);</script>";
	
}
?>

<? include "../header.php"; ?>
<script language="javascript">
<!--
function sendCheck(frm){
	if(frm.mailtmp.value == ""){
		alert("�޴¸����ּҸ� �Է��ϼ���");
		return false;
	}
}
-->
</script>

			<table border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td><img src="../image/ic_tit.gif"></td>
          <td valign="bottom" class="tit">�����׽�Ʈ</td>
          <td width="2"></td>
          <td valign="bottom" class="tit_alt">�������� ������ �� �߼۵Ǵ��� �׽�Ʈ�մϴ�.</td>
        </tr>
      </table>

			<br>
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td style="font-size: 10pt; color: #000000; line-height: 20px;">
          ����Ʈ���� ������ �߼��������� �ұ��ϰ� ������ ���� ���� ���ϴ°��<br>
					���α׷����� �����̱� ���ٴ� ��κ� ���� �Ǵ� �߼��̸����� �����Դϴ�.<br>
					<b>����ϰ� ��� ���α׷��� ���� ����Ʈ ���߿� �̿�� ���α׷����� ���Ϲ߼� ���α׷����� ������ �����ϴ�.</b><br><br>
					�� ���а� �������Ϸ� ������ �߼��ؼ� �ƹ����� ������ �ȵǴ��� �Ϻθ� �Ǵ��� üũ�غ��ñ� �ٶ��ϴ�.<br>
					�Ʒ������ ���� ���ŵ˴ϴ�.<br>
          -------------------------------------------------------------------------------<br>
					[�����׽�Ʈ]<br>
					�� ������ ����� ���̸� �̸����� ���ŵȰ� �Դϴ�.<br>
					2009-10-01 12:12:12<br>
					-------------------------------------------------------------------------------<br>
          </td>
        </tr>
      </table>
			<br>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <form name="frm" action="<?=$PHP_SELF?>" method="post" onSubmit="return sendCheck(this);">
      <input type="hidden" name="mode" value="mailsend">
        <tr>
          <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="6" class="t_style">
              <tr>
                <td width="17%" align="left" class="t_name">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�޴¸����ּ�</td>
                <td class="t_value" colspan="3">
                	<input name="mailtmp" value="" size="60" type="text" class="input">
                	<input type="image" src="../image/btn_sendmail.gif" align="absmiddle"><br>
                	������ ,�� �����ؼ� ������ �Է� (aaa@hanmail.net,bbb@naver.com)
                </td>
              </tr>
            </table></td>
        </tr>
      </form>
      </table>
      <br>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td class="b_title02">���ϼ����� �ȵǴ°��</td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td style="font-size: 10pt; color: #000000; line-height: 20px;">
          
          ���α׷��󿡼� ó���ص帱 �� �ִ� �κ��� �����ϴ�.<br>
					ȣ����ȸ�糪 ���������ڿ��� ���Ϲ߼��׽�Ʈ �� ����� �����ϰ� �ذ��û�� �Ͻñ� �ٶ��ϴ�.<br><br>

					ȣ����ȸ�糪 ���������ڰ� ȭ��Ʈ������ ����� �ʿ��ϴٰ� ��û�Ѱ��<br>
				  �ѱ�������ȣ����� KISA(<a href="http://www.kisarbl.or.kr" target="_blank">http://www.kisarbl.or.kr</a>) ����Ʈ���� ����մϴ�.<br>
					����� SPF Record ���ڵ尪�� ȣ���� ȭ�糪 ���������ڿ��� �����ϰ� ������ ��û�մϴ�.<br>
					
          </td>
        </tr>
      </table>
      
    </td>
  </tr>
</table>

<? include "../footer.php"; ?>