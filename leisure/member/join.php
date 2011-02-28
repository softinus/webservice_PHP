<?
include "../inc/oneday_header.inc";		// 상단디자인
include "../inc/now_position.inc";			// 현재위치
$page_type="join";
include "../inc/page_info.inc";				// 페이지정보

?>
<script language="javascript">
<!--
function checkAgree(){
	if(document.frm.agree.checked != true){
		alert("이용약관에 동의하셔야 가입할 수 있습니다.");
		return;
	}
	if(document.frm.agree2.checked != true){
		alert("개인정보보호정책에 동의하셔야 가입할 수 있습니다.");
		return;
	}
		
	<? if($shop_info->namecheck_use == "Y"){ ?>
		
		var frm = document.nameCheck;
		var name = frm.name.value;
		var resno1 = frm.resno1.value;
		var resno2 = frm.resno2.value;
		
		if(name == ""){
			alert("이름을 입력하세요");
			frm.name.focus();
			return;
		}
		if(resno1 == ""){
			alert("주민번호를 입력하세요");
			frm.resno1.focus();
			return;
		}
		if(resno2 == ""){
			alert("주민번호를 입력하세요");
			frm.resno2.focus();
			return;
		}
		
		document.nameIframe.location = "/member/name_check.php?name=" + name + "&resno1=" + resno1 + "&resno2=" + resno2;

	<? } else { ?>
	
		document.location = "join_form.php";
		
	<? } ?>
}

// 주민번호 자동포커스
function jfocus(frm){
	if(frm.resno2 != null){
		var str = frm.resno1.value.length;
		if(str == 6) frm.resno2.focus();
	}
}
-->
</script>

<table border=0 cellpadding=0 cellspacing=0 width=1012 align=center>
  <tr>
    <td align=center>

			<table border=0 cellpadding=0 cellspacing=0 width=100%>
			<form name="frm">
			<tr><td height=20></td></tr>
			<tr><td><img src="/images/member/tit_agree.gif"></td></tr>
			<tr><td height=4></td></tr>
			<tr>
				<td align=center bgcolor="#f1f1f1" style="padding: 10 10 0 10">
				<textarea rows="12" cols="60" style="width:100%; padding:10 10 10 10"><?=$page_info->content?></textarea><br>
				</td>
			</tr>
			<tr>
				<td height="30" align="center" bgcolor=#f1f1f1>&nbsp; 
				<input name="agree" type="checkbox" value="radiobutton" style="border:0px; background-color:transparent;"><img src="/images/join_agree.gif" align=absmiddle>
				</td>
			</tr>
			
			<tr><td height=20></td></tr>
			<tr><td><img src="/images/member/tit_privacy.gif"></td></tr>
			<tr><td height=4></td></tr>
			<tr>
				<td align=center bgcolor="#f1f1f1" style="padding: 10 10 0 10">
				<textarea rows="12" cols="60" style="width:100%; padding:10 10 10 10"><?=$page_info->content2?></textarea>
				</td>
			</tr>
			<tr>
				<td height=30 align="center" bgcolor=#f1f1f1>&nbsp; 
				<input name="agree2" type="checkbox" value="radiobutton" style="border:0px; background-color:transparent;"><img src="/images/join_agree.gif" align=absmiddle>
				</td>
			</tr>
			</form>
			
			<? if(!strcmp($shop_info->namecheck_use, "Y")) { ?>
			<tr><td height=20></td></tr>
			<tr><td>실명인증</td></tr>
			<tr>
				<td align=center bgcolor="#f1f1f1" style="padding: 10 10 10 10">
					
					<iframe name="nameIframe" style="display:none"></iframe>
        	<table width="300" border="0" cellspacing="6" cellpadding="0">
        	<form name="nameCheck" action="join_form.php" method="post">
						<tr>
							<td valign="bottom" class="text_nor">이름</td>
							<td><input type="text" name="name" class="input" size="30"></td>
						</tr>
						<tr>
							<td valign="bottom" class="text_nor">주민번호</td>
							<td><input type="text" size="13" name="resno1" class="input" onKeyup="jfocus(this.form);" Maxlength="6"> - <input type="password" size="13" name="resno2" class="input" Maxlength="7"></td>
						</tr>
					</form>
				  </table>
				  
				</td>
			</tr>
			<? } ?>
			
			<tr>
				<td height=100 align=center>
				<img src="/images/join_btn_ok.gif" border=0 onClick="checkAgree();" style="cursor:hand"></a>&nbsp;&nbsp;&nbsp;
				<img src="/images/join_btn_cancel.gif" border=0 onClick="history.go(-1);" style="cursor:hand"></a>
				</td>
			</tr>
			</table>
									
    </td>
  </tr>
</table>

<?

include "../inc/oneday_footer.inc"; 		// 하단디자인

?>