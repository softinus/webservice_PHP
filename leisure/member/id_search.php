<?

include "../inc/common.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/util.inc";		      // util ���̺귯��
include "../inc/oper_info.inc";			// �����
include "../inc/shop_info.inc"; 		// ���� ����
include "../inc/design_info.inc"; 	// ������ ����

$now_position = "<a href=/>Home</a> &gt; ���̵� / ��й�ȣ ã��";
$page_type = "login";

include "../inc/page_info.inc"; 		// ������ ����
include "../inc/header.inc"; 			// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ

if($idsearch == "ok"){
	
	$resno = $resno."-".$resno2;
	$sql = "select id,passwd,name,email,hphone from wiz_member where name = '$name' and email = '$email' and resno = '$resno'";
	$result = mysql_query($sql) or error(mysql_error());
	
	if($row = mysql_fetch_object($result)){
	
		$re_info[id] = $row->id;
		$re_info[pw] = $row->passwd;
		$re_info[name] = $row->name;
		$re_info[email] = $row->email;
		$re_info[hphone] = $row->hphone;
		send_mailsms("mem_idpw", $re_info);

		comalert("���̵�� ��й�ȣ�� ȸ������ �̸��Ϸ� ������Ƚ��ϴ�.", "http://".$HTTP_HOST.$PHP_SELF);
	
	}else{
	
		error("ȸ�������� ��ġ���� �ʽ��ϴ�.");
	
	}
   
}

?>

<table border=0 cellpadding=0 cellspacing=0 width=98% align=center>
<form name="frm" action="<?=$ssl?><?=$PHP_SELF?>" method="post">
<input type="hidden" name="idsearch" value="ok">
<tr>
	<td align=center>
		
		<table width="90%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td><img src="/images/member_idsearch_01.gif"></td>
			</tr>
  		<tr>
		    <td>
		    	<table border=0 cellpadding=0 cellspacing=0 width=100%>
		        <tr>
		          <td width=10 height=10 background="/images/box_l.gif"></td>
		          <td background="/images/box_t.gif"></td>
		          <td width=10 background="/images/box_cor02.gif"></td>
		        </tr>
		        <tr>
		          <td background="/images/box_l.gif"></td>
		          <td style="padding:10;">
		          	<table border=0 cellpadding=0 cellspacing=0 align=center>
									<tr height=27>
										<td width=300><img src="/images/member_name.gif" align=absmiddle><input type=text name="name" class=input></input></td>
										<td rowspan=3><input type="image" src="/images/member_btn_ok.gif"></td>
									</tr>
									<tr height=27><td><img src="/images/member_email.gif" align=absmiddle><input type=text name="email" class=input></input></td></tr>
									<tr height=27><td><img src="/images/member_jumin.gif" align=absmiddle><input type=text name="resno" size=10 class=input></input> - <input type=password name="resno2" size=10 class=input></input></td></tr>
								</table>
							</td>
		          <td background="/images/box_r.gif"></td>
		        </tr>
		        <tr>
		          <td height=10 background="/images/box_cor03.gif"></td>
		          <td background="/images/box_b.gif"></td>
		          <td background="/images/box_cor04.gif"></td>
		        </tr>
		    	</table>
		  	</td>
			</tr>
		</table>

	</td>
</tr>
<tr><td height=50 style="padding:0 0 0 50"><img src="/images/member_searchid_02.gif"></td></tr>
</form>
</table>

<?

include "../inc/footer.inc"; 		// �ϴܵ�����

?>