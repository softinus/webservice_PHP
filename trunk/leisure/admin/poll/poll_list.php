<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?
$param = "code=".$code."&searchopt=".$searchopt."&searchkey=".$searchkey;
?>
<script language="JavaScript" type="text/javascript">
<!--
function delConfirm(idx){
	if(confirm("���� �Ͻðڽ��ϱ�?")){
		document.location = "poll_save.php?mode=delete&idx=" + idx + "&<?=$param?>";
	}
}
//-->
</script>

	  <table border="0" cellspacing="0" cellpadding="2">
	    <tr>
	      <td><img src="../image/ic_tit.gif"></td>
	      <td valign="bottom" class="tit">�������</td>
	      <td width="2"></td>
	      <td valign="bottom" class="tit_alt">������ ���/����/���� �մϴ�.</td>
	    </tr>
	  </table>	
	  		
	  <br>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
    <form name="searchForm" action="<?=$PHP_SELF?>" method="get">
    <input type="hidden" name="page" value="<?=$page?>">
    <input type="hidden" name="code" value="<?=$code?>">
      <tr>
        <td bgcolor="ffffff">
          <table width="100%" border="0" cellspacing="1" cellpadding="3" class="t_style">
          <tr>
          <td width="15%" class="t_name">���ǰ˻�</td>
          <td width="85%" class="t_value">

           <table cellspacing="2" cellpadding="0">
           <tr>
           <td>
             <select name="searchopt" class="select">
             <option value="subject">������</option>
             <option value="content">����</option>
             </select>
           </td>
           <td><input type="text" name="searchkey" value="<?=$searchkey?>" class="input"></td>
           <td><input type="image" src="../image/btn_search.gif" align="absmiddle"></td>
           </tr>
           </table>
           <script language="javascript">
           <!--
           searchopt = document.searchForm.searchopt;
           for(ii=0; ii<searchopt.length; ii++){
             if(searchopt.options[ii].value == "<?=$searchopt?>")
               searchopt.options[ii].selected = true;
           }
           -->
           </script>

         </td>
         </tr>
         </table>
        </td>
      </tr>
    </form>
    </table>
    <table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr><td height="10"></td></tr>
    </table>
		<?
		$today = date('n-d');
		$toyear = date('Y');

		$age_syear = substr($toyear-($s_age+9),-2)+1;
		$age_eyear = substr($toyear-$s_age,-2)+2;

		$join_sdate = $prev_year."-".$prev_month."-".$prev_day;
		$join_edate = $next_year."-".$next_month."-".$next_day;

		$sql = "select count(idx) as all_total from wiz_poll where code = '$code'";
		$result = mysql_query($sql) or error(mysql_error());
		$row = mysql_fetch_object($result);
		$all_total = $row->all_total;

		if($searchopt != "") $search_sql .= " and $searchopt like '%$searchkey%' ";

		$sql = "select * from wiz_poll where code = '$code' $search_sql order by idx desc";
		$result = mysql_query($sql) or error(mysql_error());
		$total = mysql_num_rows($result);

		$rows = 20;
		$lists = 5;
		$page_count = ceil($total/$rows);
		if(!$page || $page > $page_count) $page = 1;
		$start = ($page-1)*$rows;
		$no = $total-$start;

		if($start>1) mysql_data_seek($result,$start);

		?>
		<table width="100%" border="0" cellspacing="0" cellpadding="2">
		  <tr>
		    <td class="tit_sub"><img src="../image/ics_tit.gif"> �� ������ : <b><?=$all_total?></b></td>
		    <td align="right">
        <img src="../image/btn_polladd.gif" style="cursor:hand" onClick="document.location='poll_input.php?mode=insert&code=<?=$code?>';">
        </td>
		  </tr>
		</table>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    	<tr><td class="t_rd" colspan="20"></td></tr>
      <tr class="t_th">
        <th width="8%">��ȣ</th>
        <th>����</th>
        <th width="15%">�Ⱓ</th>
        <th width="10%">�����ڼ�</th>
        <th width="10%">���࿩��</th>
        <th width="10%">���</th>
      </tr>
			<tr><td class="t_rd" colspan="20"></td></tr>
			<?
			while(($row = mysql_fetch_array($result)) && $rows){
			?>
	      <tr>
	        <td height="30" align="center"><?=$no?></td>
	        <td align="center"><a href="poll_input.php?mode=update&idx=<?=$row[idx]?>&page=<?=$page?>&<?=$param?>"><?=$row[subject]?></a></td>
	        <td align="center"><?=$row[sdate]?>~<?=$row[edate]?></td>
	        <td align="center"><?=$row[cnt]?></td>
	        <td align="center"><? if($row[polluse] == "Y" && $row[edate] >= date('Y-m-d')) echo "������"; else echo "<font color=red>��������</font>"; ?></td>
	        <td align="center">
	        <img src="../image/btn_edit_s.gif" style="cursor:hand" onClick="document.location='poll_input.php?mode=update&idx=<?=$row[idx]?>&page=<?=$page?>&<?=$param?>';">
	        <img src="../image/btn_delete_s.gif" style="cursor:hand" onClick="delConfirm('<?=$row[idx]?>')">
	        </td>
	      </tr>
	      <tr><td colspan="20" class="t_line"></td></tr>
			<?
				$no--;
				$rows--;
			}
			             
			if($total <= 0){
			?>
	  	  <tr><td height="30" colspan="10" align="center">��ϵ� ������ �����ϴ�.</td></tr>
	      <tr><td colspan="20" class="t_line"></td></tr>
			<?
			}
			?>
    </table>

    <br>
    <table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="33%"></td>
        <td width="33%"><? print_pagelist($page, $lists, $page_count, $param); ?></td>
        <td width="33%"></td>
      </tr>
    </table>
      	
<? include "../footer.php"; ?>