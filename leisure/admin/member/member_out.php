<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?

// ������ �Ķ���� (�˻������� ������ �ʵ���)
//------------------------------------------------------------------------------------------------------------------------------------
$param = "searchopt=$searchopt&searchkey=$searchkey";
//------------------------------------------------------------------------------------------------------------------------------------

?>

<script language="JavaScript" type="text/javascript">
<!--

// Ż��ȸ�� ����
function delMemout(idx){
	if(confirm('�����Ͻðڽ��ϱ�?')){
		document.location = 'member_save.php?mode=memoutdel&idx=' + idx;
	}
}

//-->
</script>


		<table border="0" cellspacing="0" cellpadding="2">
		  <tr>
		    <td><img src="../image/ic_tit.gif"></td>
		    <td valign="bottom" class="tit">Ż��ȸ��</td>
		    <td width="2"></td>
		    <td valign="bottom" class="tit_alt">Ż��ȸ�� ���</td>
		  </tr>
		</table>			
		<br>	  
	  
      
		<table width="100%" cellspacing="1" cellpadding="3" border="0" class="t_style">
		<form name="searchForm" action="<?=$PHP_SELF?>" method="get">
		<input type="hidden" name="page" value="<?=$page?>">
		<input type="hidden" name="detailsearch" value="<?=$detailsearch?>">
			<tr>
				<td width="15%" class="t_name">���ǰ˻�</td>
				<td width="85%" class="t_value">
				<select name="searchopt" class="select">
				 <option value="name" <? if($searchopt == "name") echo "selected"; ?>>����
				 <option value="memid" <? if($searchopt == "memid") echo "selected"; ?>>���̵�
				 </select>
				 <input type="text" name="searchkey" value="<?=$searchkey?>" class="input">
				 <input type="image" src="../image/btn_search.gif" align="absmiddle">
				</td>
			</tr>
		</form>
		</table>
		
		<?
		
		if($searchkey != "") $searchkey_sql = " and $searchopt = '$searchkey' ";
		
		$sql = "select idx from wiz_bbs where code = 'memout' $searchkey_sql order by idx desc";
		$result = mysql_query($sql) or error(mysql_error());
		$total = mysql_num_rows($result);
		
		$rows = 20;
		$lists = 5;
		$page_count = ceil($total/$rows);
		if(!$page || $page > $page_count) $page = 1;
		$start = ($page-1)*$rows;
		$no = $total-$start;
		
		?>
		<br>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr><td class="t_rd" colspan="20"></td></tr>
		  <tr class="t_th">
		    <th width="8%" align="center">��ȣ</th>
		    <th width="10%" align="center">ȸ����</th>
		    <th width="30%" align="center">Ż�����</th>
		    <th width="35%" align="center">�����</th>
		    <th width="10%" align="center">Ż����</th>
		    <th width="10%" align="center">���</th>
		  </tr>
		  <tr><td class="t_rd" colspan="20"></td></tr>
		<?
		$sql = "select idx,memid,name,subject,content,from_unixtime(wdate) as wdate from wiz_bbs where code = 'memout' $searchkey_sql order by idx desc limit $start, $rows";
		$result = mysql_query($sql) or error(mysql_error());
		
		while(($row = mysql_fetch_object($result)) && $rows){
		$row->content = str_replace("\n","",$row->content);
		?>
		  <tr><td height="2"></td></tr>
		  <tr>
		    <td align="center"><?=$no?></td>
		    <td align="center"><?=$row->name?><br>(<?=$row->memid?>)</td>
		    <td align="center"><?=$row->subject?></td>
		    <td align="center"><?=$row->content?></td>
		    <td align="center"><?=$row->wdate?></td>
		    <td align="center"><input name="Button3" type="button" class="gbtn" value="����" onclick="delMemout('<?=$row->idx?>');"></td>
		  </tr>
		  <tr><td height="2"></td></tr>
		  <tr><td colspan="20" class="t_line"></td></tr>
		<?
			$no--;
			$rows--;
		}
		
		if($total <= 0){
		?>
			<tr><td height=30 colspan=10 align=center>Ż��ȸ���� �����ϴ�.</td></tr>
			<tr><td colspan='20' class='t_line'></td></tr>
		<?
		}
		?>
		</table>

		<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
			<tr><td height="5"></td></tr>
		  <tr>
		    <td width="33%"></td>
		    <td width="33%"><? print_pagelist($page, $lists, $page_count, "&$param"); ?></td>
		    <td width="33%"></td>
		  </tr>
		</table>



<? include "../footer.php"; ?>