<?

include "../inc/common.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/util.inc"; 		   // ��ƿ ���̺귯��
include "../inc/design_info.inc"; 	// ������ ����

$now_position = "<a href=/>Home</a> &gt; ȸ��Ұ�";
$page_type = "company";

include "../inc/page_info.inc"; 		// ������ ����
include "../inc/header.inc"; 			// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ

?>

<table border=0 cellpadding=0 cellspacing=0 width=98% align="center">
	<tr>
		<td align=center><br>
			<table border=0 cellpadding=0 cellspacing=0 width=100%>
				<tr>
					<td><?=$page_info->content?></td>
				</tr>
			</table>
		</td>
	</tr>
</table>

<?

include "../inc/footer.inc"; 		// �ϴܵ�����

?>