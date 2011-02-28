<?
include "../inc/oneday_header.inc"; 			// 상단디자인
include "../inc/mem_info.inc"; 						// 회원 정보
$now_position = "<a href=/>Home</a> &gt; 마이페이지 &gt; 1:1QNA";
include "../inc/now_position.inc"; 				// 현재위치

$sql = "select * from wiz_consult where idx = '$idx'";
$result = mysql_query($sql) or error(mysql_error());
$qna_info = mysql_fetch_object($result);

$qna_info->question = str_replace("\n", "<br>", $qna_info->question);
$qna_info->answer = str_replace("\n", "<br>", $qna_info->answer);
?>
<script language="javascript">
<!--
function delConfrm(){
	if(confirm("삭제하시겠습니까.")){
		document.location = "my_save.php?mode=my_qna&sub_mode=delete&idx=<?=$idx?>";
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
				<tr><td colspan=5 bgcolor=#939393 height=3></td></tr>
				<tr>
			  	<td height="30" width="89" bgcolor="#f1f1f1"><img src="/images/member/write_t_title.gif"></td>
			  	<td style="padding: 0 0 0 5"><?=$qna_info->subject?></td>
			  </tr>
				<tr><td colspan="2" height="1" bgcolor="#e7e7e7"></td></tr>
				<tr>
					<td height="30" bgcolor="#f1f1f1"><img src="/images/member/write_t_q.gif"></td>
					<td style="padding: 2 5 2 5"><?=$qna_info->question?></td>
				</tr>
				<tr><td colspan="2" height="1" bgcolor="#e7e7e7"></td></tr>
				<tr>
					<td height="30" bgcolor="#f1f1f1"><img src="/images/member/write_t_a.gif"></td>
					<td style="padding: 2 5 2 5"><?=$qna_info->answer?></td>
				</tr>
				<tr><td colspan="2" height="1" bgcolor="#e7e7e7"></td></tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td colspan="5" align="right" height=50>
	   <a href="my_qna.php"><img src="/images/btn_mylist.gif" border="0"></a> &nbsp;  
	   <a href="my_qnainput.php?sub_mode=modify&idx=<?=$idx?>"><img src="/images/btn_myedit.gif" border="0"></a> &nbsp; 
	   <a href="javascript:delConfrm();"><img src="/images/btn_mydelete.gif" border="0"></a>
	  </td>
	</tr>
</table>

<?

include "../inc/oneday_footer.inc"; 		// 하단디자인

?>