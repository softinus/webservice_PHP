<?

include "../inc/oneday_header.inc"; 			// ��ܵ�����

$page_type = "myshop";
$now_position = "<a href=/>Home</a> &gt; ���̼��� &gt; ȸ������";

include "../inc/page_info.inc"; 		// ������ ����
include "../inc/mem_info.inc"; 		// ȸ�� ����


$page_type = "myshop";
$now_position = "<a href=/>Home</a> &gt; ���̼��� &gt; 1:1 Q&A";

include "../inc/page_info.inc"; 		// ������ ����
//include "../inc/now_position.inc";	// ������ġ
// �Է����� ��뿩��
$info_tmp = explode("/",$page_info->addinfo);
for($ii=0; $ii<count($info_tmp); $ii++){
	$info_use[$info_tmp[$ii]] = true;
}

// �Է����� �ʼ�����
$info_tmp = explode("/",$page_info->addinfo2);
for($ii=0; $ii<count($info_tmp); $ii++){
	$info_ess[$info_tmp[$ii]] = true;
}

?>

<table border=0 cellpadding=0 cellspacing=0 width="1012" align=center>
  <tr>
  	<td align=center>

    <? include "my_menu.php"; ?>

		</td>
	</tr>
	
	<!-- 1:1������Ȳ -->
	<tr><td height="15"></td></tr>
	<tr>
		<td align=center>
			<table border=0 cellpadding=0 cellspacing=0 width="100%">
				<tr><td colspan=5><img src="/images/myshop_m04_01.gif"></td></tr>
				<tr><td colspan=5 bgcolor=#939393 height=3></td></tr>
				<tr height=33>
					<td background="/images/shop_nomal_bar.gif" align=center class="gray" width=110>ó����Ȳ</td>
					<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
					<td background="/images/shop_nomal_bar.gif" align=center class="gray">���ǳ���</td>
					<td background="/images/shop_nomal_bar.gif" align=center width=2><img src="/images/form_line.gif"></td>
					<td background="/images/shop_nomal_bar.gif" align=center class="gray" width=110>�ۼ���</td>
				</tr>
				<tr><td colspan=5 bgcolor=#f7f7f7 height=3></td></tr>
				<?
				$sql = "select idx from wiz_consult where memid = '$wiz_session[id]' order by idx desc";
				$result = mysql_query($sql) or error(mysql_error());
				$total = mysql_num_rows($result);
				
				$rows = 12;
				$lists = 5;
				$page_count = ceil($total/$rows);
				if(!$page || $page > $page_count) $page = 1;
				$start = ($page-1)*$rows;
				
				$sql = "select * from wiz_consult where memid = '$wiz_session[id]' order by idx desc limit $start, $rows";
				$result = mysql_query($sql) or error(mysql_error());
				
				while(($row = mysql_fetch_object($result)) && $rows){
					if($row->status == "N") $row->status = "�����Ϸ�";
					else $row->status = "�亯�Ϸ�";
				?>
				<tr align=center height=28>								
					<td><b><?=$row->status?></b></td>
					<td></td>
					<td align=left>��<a href="my_qnaview.php?idx=<?=$row->idx?>"><?=$row->subject?></a></td>
					<td></td>
					<td><?=$row->wdate?></td>
				</tr>
				<tr><td colspan=5 bgcolor=#dddddd height=1></td></tr>
			<?
			   $rows--;
			}
			if($total <= 0){
			?>
				<tr><td colspan=5 align=center height=50><img src="/images/no_icon.gif" align=absmiddle> �ۼ��� ���ǰ� �����ϴ�.</td></tr>
				<tr><td colspan=5 bgcolor=#dddddd height=1></td></tr>
			<?
			}
			?>
				<tr><td colspan=5 bgcolor=#f7f7f7 height=3></td></tr>
			</table>
		</td>
	</tr>
	<tr>
	  <td height=50>
			<table border=0 cellpadding=0 cellspacing=0 width=100%>
			  <tr>
			    <td style="padding:0 0 0 20"><? print_pagelist($page, $lists, $page_count, ""); ?></td>
			    <td width="80" align="right"><a href="../member_day/my_qnainput.php"><img src="/images/btn_custwrite.gif" border=0></a>&nbsp;&nbsp;</td>
			  </tr>
			</table>
		</td>
   </tr>
	</form>
</table>

<?

include "../inc/oneday_footer.inc"; 		// �ϴܵ�����

?>