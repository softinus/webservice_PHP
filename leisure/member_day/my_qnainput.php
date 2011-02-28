<?
include "../inc/oneday_header.inc"; 			// 상단디자인

$page_type = "myshop";
$now_position = "<a href=/>Home</a> &gt; 마이쇼핑 &gt; 1:1 Q&A";

include "../inc/page_info.inc"; 		// 페이지 정보
//include "../inc/now_position.inc";	// 현재위치
include "../inc/mem_info.inc"; 		// 회원 정보

if($sub_mode == "") $sub_mode = "insert";

$sql = "select * from wiz_consult where idx = '$idx'";
$result = mysql_query($sql) or error(mysql_error());
$qna_info = mysql_fetch_object($result);

?>
<script language="javascript">
<!--
function inputCheck(frm){
	
	if(frm.subject.value == ""){
		alert("제목을 입력하세요.");
		frm.subject.focus();
		return false;
	}
	
	if(frm.question.value == ""){
		alert("내용을 입력하세요.");
		frm.question.focus();
		return false;
	}

}
-->
</script>

<table border=0 cellpadding=0 cellspacing=0 width="1012" align=center>
  <tr>
  	<td align=center>

    <? include "my_menu.php"; ?>

		</td>
	</tr>
	
	<!--1:1문의현황-->
	<tr><td height="15"></td></tr>
	<tr><td><img src="/images/myshop_m04_02.gif"></td></tr>
	<tr>
		<td align=center>
	
			<table border=0 cellpadding=0 cellspacing=0 width="100%">
			<form name="frm" action="my_save.php" method="post" onSubmit="return inputCheck(this)">
			<input type="hidden" name="idx" value="<?=$idx?>">
			<input type="hidden" name="mode" value="my_qna">
			<input type="hidden" name="sub_mode" value="<?=$sub_mode?>">
			<tr><td colspan=5 bgcolor=#939393 height=3></td></tr>
				
			<tr>
				<td height="30" width="89" bgcolor="#f1f1f1"><img src="/images/member_day/write_t_title.gif"></td>
				<td>&nbsp; <input type="text" name="subject" value="<?=$qna_info->subject?>" size="60" class="input"></td>
			</tr>
			<tr><td colspan="2" height="1" bgcolor="#e7e7e7"></td></tr>
			<tr>
				<td height="30" bgcolor="#f1f1f1"><img src="/images/member_day/write_t_q.gif"></td>
				<td style="padding:5 0 5 0">&nbsp; <textarea name="question" cols="85" rows="5" class="input"><?=$qna_info->question?></textarea></td></tr>
			<tr><td colspan="2" height="1" bgcolor=#ffffff></td></tr>
			<tr><td colspan="2" height="1" bgcolor="#e7e7e7"></td></tr>
			<tr>
				<td colspan="2" align="center" height=63>
					<input type="image" src="/images/btn_myconfirm.gif" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<img src="/images/btn_mycancel.gif" border="0" onClick="history.go(-1)" style="cursor:hand">
				</td>
			</tr>
			</form>
			</table>
		
		</td>
	</tr>
</table>

<?
include "../inc/oneday_footer.inc"; 		// 하단디자인
?>