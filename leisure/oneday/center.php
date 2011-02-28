<?
include "../inc/oneday_header.inc"; 			// 상단디자인
$page_type = "center";
include "../inc/page_info.inc"; 					// 페이지 정보
?>

<table width="1012" height="683" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr>
		<td valign="top"style="padding-left:33px; padding-top:30px;">
			
			<table width="932" height="32" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td valign="top"><img src="image/customer_title.gif" width="191" height="32"></td>
				</tr>
				<tr>
					<td height="20" valign="top">&nbsp;</td>
				</tr>
			</table>
			<? $code = "center"; include $_SERVER[DOCUMENT_ROOT]."/bbs/input.php"; ?>
			
		</td>
	</tr>
</table>

<?
include "../inc/oneday_footer.inc"; 		// 하단디자인
?>