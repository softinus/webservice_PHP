<?
include "../inc/oneday_header.inc"; 			// ��ܵ�����

$page_type = "myshop";
$now_position = "<a href=/>Home</a> &gt; ���̼��� &gt; ȸ��Ż��";

include "../inc/page_info.inc"; 		// ������ ����
include "../inc/mem_info.inc"; 		// ȸ�� ����

//include "../inc/now_position.inc";	// ������ġ
?>
<script language="JavaScript">
<!--
function inputCheck(frm){

	var reason = 0;
	if(frm.out_reason.checked == true) reason++;
	if(frm.out_reason2.checked == true) reason++;
	if(frm.out_reason3.checked == true) reason++;
	if(frm.out_reason4.checked == true) reason++;
	if(frm.out_reason5.checked == true) reason++;
	if(frm.out_reason6.checked == true) reason++;
	if(frm.out_reason7.checked == true) reason++;
	if(frm.out_reason8.checked == true) reason++;
	
	if(reason <= 0){
		alert("�����ߴ� ���� �������ּ���");
		frm.out_reason.focus();
		return false;
	}
	if(frm.message.value == ""){
		alert("���ɾ ��� ��Ź�帳�ϴ�.");
		frm.message.focus();
		return false;
	}
	if(!confirm("���� Ż���Ͻðڽ��ϱ�?")) return false;
}
//-->
</script>

<table border=0 cellpadding=0 cellspacing=0 width="1012" align=center>
  <tr>
  	<td align=center>

    <? include "my_menu.php"; ?>

		</td>
	</tr>

	<!-- ȸ��Ż�� -->
	<tr><td height="15"></td></tr>
	<tr>
		<td align=center>
			<table border=0 cellpadding=0 cellspacing=0 width="100%">
			<form name="frm" action="my_save.php" method="post" onSubmit="return inputCheck(this)">
      <input type="hidden" name="mode" value="my_out">
			<tr><td><img src="/images/myshop_m08_01.gif"></td></tr>
			<tr><td bgcolor=#939393 height=3></td></tr>
			<tr>
				<td style="padding:10 20 10 20" bgcolor=#f7f7f7>
					���Բ��� ȸ�� Ż�� ���ϽŴٴ� ���� ���θ��� ���񽺰� ���� �����ϰ� �����߳� ���ϴ�.<br>
					�����ϼ̴� ���̳� �Ҹ������� �˷��ֽø� ���� �ݿ��ؼ�<br>
					������ �������� �ذ��� �帮���� ����ϰڽ��ϴ�. �ƿ﷯ ȸ�� Ż����� �Ʒ� ������ �����Ͻñ� �ٶ��ϴ�.<br><br>

					1. ȸ�� Ż�� �� ������ ������ ��ǰ ��ǰ �� A/S�� ���� ���ڻ�ŷ� ����� �Һ��� ��ȣ�� ���� ������ �ǰ���<br>
					   &nbsp;&nbsp;&nbsp;������ ��ȣ��å������ ���� �˴ϴ�.<br>
					2. Ż�� �� ���Բ��� �����ϼ̴� �������� ���� �˴ϴ�.
				</td>
			</tr>
			<tr><td bgcolor=#dddddd height=1></td></tr>
			<tr>
				<td>			
					<table border=0 cellpadding=0 cellspacing=0 width=100%>
						<tr height=28>
							<td width=20><img src="/images/blue_icon.gif"></td>
							<td width=100><img src="/images/my_out_01.gif"></td>
							<td>
							<input name="out_reason" value="������ �Ҹ�" type="checkbox" style="border:0px; background-color:transparent;">������ �Ҹ�
							<input name="out_reason2" value="��ۺҸ�" type="checkbox" style="border:0px; background-color:transparent;">��ۺҸ� 
							<input name="out_reason3" value="��ȯ/ȯ��/��ǰ �Ҹ�" type="checkbox" style="border:0px; background-color:transparent;">��ȯ/ȯ��/��ǰ �Ҹ�
							<input name="out_reason4" value="�湮 �󵵰� ����" type="checkbox" style="border:0px; background-color:transparent;">�湮 �󵵰� ���� 
							<br>
							<input name="out_reason5" value="��ǰ���� �Ҹ�" type="checkbox" style="border:0px; background-color:transparent;">��ǰ���� �Ҹ�
							<input name="out_reason6" value="���� �������� ���" type="checkbox" style="border:0px; background-color:transparent;">���� �������� ��� 
							<input name="out_reason7" value="���θ��� �ŷڵ� �Ҹ�" type="checkbox" style="border:0px; background-color:transparent;">���θ��� �ŷڵ� �Ҹ�
							<input name="out_reason8" value="���� ��� �Ҹ�" type="checkbox" style="border:0px; background-color:transparent;">���� ��� �Ҹ� 
							</td>
						</tr>
						<tr><td colspan=3 bgcolor=#eeeeee></td></tr>
						<tr height=28>
							<td><img src="/images/blue_icon.gif"></td>
							<td><img src="/images/my_out_03.gif"></td>
							<td style="padding:3 0 3 0"><textarea name="message" cols="70" rows="3" class="input"></textarea></td>
						</tr>
					</table>
				</td>
				</tr>
				<tr><td bgcolor=#f7f7f7 height=3></td></tr>
				<tr><td bgcolor=#dddddd height=1></td></tr>
				<tr>
					<td colspan="5" align="center" height=50>
						<input type="image" src="/images/btn_myconfirm.gif" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<img src="/images/btn_mycancel.gif" border="0" onClick="history.go(-1);" style="cursor:hand">
					</td>
				</tr>
				</form>
				</table>
		</td>
	</tr>
</table>

<?

include "../inc/oneday_footer.inc"; 		// �ϴܵ�����

?>