<?
include "../inc/common.inc"; 				// DB���ؼ�, ������ �ľ�
include "../inc/util.inc"; 		   		// ��ƿ ���̺귯��
include "../inc/design_info.inc"; 	// ������ ����
include "../inc/oper_info.inc"; 		// � ����

$now_position = "<a href=/>Home</a> &gt; �ֹ���ȸ.�����ȸ";
$page_type = "orderdel";

include "../inc/page_info.inc"; 		// ������ ����
include "../inc/header.inc"; 				// ��ܵ�����
include "../inc/now_position.inc";	// ������ġ

// �ֹ�����
$sql = "select * from wiz_order where orderid = '$orderid'";
$result = mysql_query($sql) or error(mysql_error());
$order_info = mysql_fetch_object($result);

// �ֹ���� ��ư
get_cancel_btn();

// ����ũ�� ��ư
get_escrow_btn();

// ���ݰ�꼭 ��ư
get_tax_btn();

include "./prd_ordinfo.inc";			// �ֹ�����

?>

<table cellpadding=0 cellspacing=0 width="100%" align=center>
	<tr>
		<td align="center">

			<table width="100%">
				<tr><td height="10"></td></tr>
				<tr>
					<td><?=$ordinfo?></td>
				</tr>
			</table>

			<table width="98%">
				<tr><td height="10"></td></tr>
				<tr><td colspan="3" height=1 bgcolor=#dadada></td></tr>
				<tr><td height="10"></td></tr>
				<tr>
					<td width="30%"><a href="javascript:history.go(-1);"><img src="/images/btn_list.gif" border="0"></a></td>
					<td align="center">
						<?=$cancel_btn?>
						<?=$escrow_btn?>
					</td>
					<td width="30%" align="right">
						<?=$tax_btn?>
					</td>
			  </tr>
			</table>

		</td>
	</tr>
</table>

<?

include "../inc/footer.inc"; 		// �ϴܵ�����

?>