<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?

// ������ �Ķ���� (�˻������� ������ �ʵ���)
//--------------------------------------------------------------------------------------------------
$param = "dep_code=$dep_code&dep2_code=$dep2_code&dep3_code=$dep3_code";
$param .= "&searchopt=$searchopt&searchkey=$searchkey&stock_opt=$stock_opt";
//--------------------------------------------------------------------------------------------------

?>

<script language="JavaScript" type="text/javascript">
<!--
// ���ݺ��� �ɼ� ����
function editOption(prdcode){

	var url = "option_edit.php?prdcode=" + prdcode;
	window.open(url,"editOption","height=400, width=400, menubar=no, scrollbars=yes, resizable=yes, toolbar=no, status=no");

}

// ��ǰ���� �����ٿ�
function excelDown(){
	document.location = "prd_excel_stock.php?<?=$param?>";
}

//-->
</script>

			<table border="0" cellspacing="0" cellpadding="2">
			  <tr>
			    <td><img src="../image/ic_tit.gif"></td>
			    <td valign="bottom" class="tit">������</td>
			    <td width="2"></td>
			    <td valign="bottom" class="tit_alt">��� �����մϴ�.</td>
			  </tr>
			</table>
			
			<br>
			<table width="100%" cellspacing="1" cellpadding="3" border="0" class="t_style">
			<form name="searchForm" action="<?=$PHP_SELF?>" method="get">
			<input type="hidden" name="page" value="<?=$page?>">
			<tr>
			<td width="15%" class="t_name">��ǰ�з�</td>
			<td width="85%" class="t_value">
			<select name="dep_code" onChange="this.form.submit();" class="select">
			<option value=''>:: ��з� ::
			<?
			$sql = "select substring(catcode,1,2) as catcode, catname from wiz_category where depthno = 1";
			$result = mysql_query($sql) or error(mysql_error());
			while($row = mysql_fetch_object($result)){
			 if($row->catcode == $dep_code)
			    echo "<option value='$row->catcode' selected>$row->catname";
			 else
			    echo "<option value='$row->catcode'>$row->catname";
			}
			?>
			</select>
			<select name="dep2_code" onChange="this.form.submit();" class="select">
			<option value=''>:: �ߺз� ::
			<?
			if($dep_code != ''){
			 $sql = "select substring(catcode,3,2) as catcode, catname from wiz_category where depthno = 2 and catcode like '$dep_code%'";
			 $result = mysql_query($sql) or error(mysql_error());
			 while($row = mysql_fetch_object($result)){
			    if($row->catcode == $dep2_code)
			       echo "<option value='$row->catcode' selected>$row->catname";
			    else
			       echo "<option value='$row->catcode'>$row->catname";
			 }
			}
			?>
			</select>
			<select name="dep3_code" onChange="this.form.submit();" class="select">
			<option value=''>:: �Һз� ::
			<?
			if($dep_code != '' && $dep2_code != ''){
			 $sql = "select substring(catcode,5,2) as catcode, catname from wiz_category where depthno = 3 and catcode like '$dep_code$dep2_code%'";
			 $result = mysql_query($sql) or error(mysql_error());
			 while($row = mysql_fetch_object($result)){
			    if($row->catcode == $dep3_code)
			       echo "<option value='$row->catcode' selected>$row->catname";
			    else
			       echo "<option value='$row->catcode'>$row->catname";
			 }
			}
			?>
			</select>
			</td>
			</tr>
			<tr>
			<td class="t_name">������</td>
			<td class="t_value">
			 <input type="radio" name="stock_opt" value="all" onclick="this.form.submit();" <? if($stock_opt=="all" || $stock_opt=="") echo "checked"; ?>>��ü
			 <input type="radio" name="stock_opt" value="shortage" onclick="this.form.submit();" <? if($stock_opt=="shortage") echo "checked"; ?>>ǰ��
			 <input type="radio" name="stock_opt" value="lack" onclick="this.form.submit();" <? if($stock_opt=="lack") echo "checked"; ?>>����
			 <input type="radio" name="stock_opt" value="reserve" onclick="this.form.submit();" <? if($stock_opt=="reserve") echo "checked"; ?>>����
			 <input type="radio" name="stock_opt" value="showset" onclick="this.form.submit();" <? if($stock_opt=="showset") echo "checked"; ?>>��������
			</td>
			</tr>
			<tr>
			<td class="t_name">�˻�����</td>
			<td class="t_value">
			 <select name="searchopt" onChange="this.form.page.value=1;">
			 <option value="">:: ���� ::
			 <option value="prdcode" <? if($searchopt == "prdcode") echo "selected"; ?>>��ǰ�ڵ�
			 <option value="prdname" <? if($searchopt == "prdname") echo "selected"; ?>>��ǰ��
			 <option value="prdcom" <? if($searchopt == "prdcom") echo "selected"; ?>>������
			 </select>
			 <input type="text" size="18" name="searchkey" value="<?=$searchkey?>" class="input">
			 <input type="image" src="../image/btn_search.gif" align="absmiddle">
			</td>
			</tr>
			</form>
			</table>

      <br>
      <?
			$sql = "select prdcode from wiz_product";
			$result = mysql_query($sql) or error(mysql_error());
			$all_total = mysql_num_rows($result);

			if(!empty($dep_code)) $catcode_sql = "wc.catcode like '$dep_code$dep2_code$dep3_code%' and ";
			if($stock_opt == "shortage") $stock_sql = " (wp.optcode like '%^0^%' or stock <= 0) and ";
			if($stock_opt == "lack") $stock_sql = " (wp.optcode like '%^1^%' or stock < savestock) and ";
			if($stock_opt == "reserve") $stock_sql = " (wp.optcode not like '%^0^%' and stock > savestock)  and ";
			if($stock_opt == "showset") $stock_sql = "wp.showset = 'N' and ";

			if(!empty($searchopt)) $search_sql = "wp.$searchopt like '%$searchkey%' and ";

			$sql = "select distinct wp.prdcode from wiz_product wp, wiz_cprelation wc
			              where $catcode_sql $stock_sql $search_sql wc.prdcode = wp.prdcode order by wp.prior desc, wp.prdcode desc";
			//echo $sql;
			$result = mysql_query($sql) or error(mysql_error());
			$total = mysql_num_rows($result);

			$rows = 20;
			$lists = 5;

			$page_count = ceil($total/$rows);
			if(!$page || $page > $page_count) $page = 1;
			$start = ($page-1)*$rows;
			$no = $total-$start;

      ?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td>�� ��ǰ�� : <b><?=$all_total?></b> , �˻� ��ǰ�� : <b><?=$total?></b></td>
          <td align="right"><img src="../image/btn_excel.gif" style="cursor:hand" onClick="excelDown();"></td>
        </tr>
        <tr><td height="3"></td></tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      	<tr><td class="t_rd" colspan="20"></td></tr>
        <tr class="t_th">
          <th width="8%">��ǰ�ڵ�</th>
          <th width="8%"></th>
          <th>��ǰ��</th>
          <th width="10%">�ǸŰ�</th>
          <th width="10%">����</th>
          <th width="10%">���</th>
          <th width="10%">�������</th>
          <th width="10%">���</th>
        </tr>
				<tr><td class="t_rd" colspan="20"></td></tr>
      <?
			$sql = "select distinct wp.prdcode, wp.optcode, wp.optcode2, wp.optvalue, wp.prdimg_R, wp.prdname, wp.sellprice, wp.prior, wp.stock, wp.savestock, wp.opt_use from wiz_product wp, wiz_cprelation wc
		              where $catcode_sql $stock_sql $search_sql wc.prdcode = wp.prdcode order by wp.prior desc, wp.prdcode desc limit $start, $rows";
			//echo $sql;
			$result = mysql_query($sql) or error(mysql_error());
		
			while(($row = mysql_fetch_object($result)) && $rows){

				if($row->prdimg_R == "") $row->prdimg_R = "/images/noimage.gif";
				else $row->prdimg_R = "/data/prdimg/$row->prdimg_R";
	
				$reserve = $row->stock - $row->savestock;
				
				// �ɼǺ� ��������ǰ
				if(!strcmp($row->opt_use, "Y")) {
					$short_list = "<table align=center cellpadding=2 cellspacing=1 width=95% border=0 bgcolor=#EBEBEB>";
					$opt1_arr = explode("^", $row->optcode);
					$opt2_arr = explode("^", $row->optcode2);
					$opt_tmp = explode("^^", $row->optvalue);
					
					$no = 0;
					for($ii = 0; $ii < count($opt1_arr) - 1; $ii++) {
						for($jj = 0; $jj < count($opt2_arr) - 1; $jj++) {
							list($price, $reserve, $stock) = explode("^", $opt_tmp[$no]);
		
							if($stock <= 1) $short_list .= "<tr><td width=70% bgcolor=#ffffff><font color='red'>".$opt1_arr[$ii]."/".$opt2_arr[$jj]."</td><td width=30% bgcolor=#ffffff> ".number_format($stock)."��</font></td></tr>";
							else $short_list .= "<tr><td width=70% bgcolor=#ffffff><font color='blue'>".$opt1_arr[$ii]."/".$opt2_arr[$jj]."</td><td width=30% bgcolor=#ffffff> ".number_format($stock)."��</font></td></tr>";
							
							$no++;
						}
					}
					
					$short_list .= "</table>";
				} else {
					$short_list = "";
				}
			?>
		  <form action="prd_save.php?<?=$param?>" method="post">
		  <input type="hidden" name="tmp">
		  <input type="hidden" name="mode" value="stock">
		  <input type="hidden" name="page" value="<?=$page?>">
		  <input type="hidden" name="prdcode" value="<?=$row->prdcode?>">
	     <tr>
          <td height="52" align="center"><?=$row->prdcode?></td>
          <td><a href="prd_input.php?mode=update&prdcode=<?=$row->prdcode?>&shortpage=Y&<?=$param?>&page=<?=$page?>"><img src="<?=$row->prdimg_R?>" width="50" height="50" border="0"></a></td>
          <td style="padding:10 0 10 0"><a href="prd_input.php?mode=update&prdcode=<?=$row->prdcode?>&shortpage=Y&<?=$param?>&page=<?=$page?>"><?=$row->prdname?></a></span><table><tr><td></td></tr></table><?=$short_list?></td>
          <td align="center"><?=number_format($row->sellprice)?>��</td>
          <td align="center"><?=$reserve?></td>
          <td align="center"><input type="text" size="6" name="stock" value="<?=$row->stock?>" <? if($row->stock > 0) echo "class='inputB'"; else echo "class='inputR'"; ?>></td>
          <td align="center"><input type="text" size="6" name="savestock" value="<?=$row->savestock?>" class="input"></td>
          <td align="center"><input type="image" src="../image/btn_edit_s.gif"> <img src="../image/btn_option.gif" style="cursor:hand" onClick="editOption('<?=$row->prdcode?>');"></td>
        </tr>
        <tr><td colspan="20" class="t_line"></td></tr>
        </form>
     	<?
     		$no--;
      	$rows--;
      }

    	if($total <= 0){
    	?>
    		<tr><td height='30' colspan=7 align=center>��ϵ� ��ǰ�� �����ϴ�.</td></tr>
    		<tr><td colspan="20" class="t_line"></td></tr>
    	<?
    	}
      ?>
      </table>

			<table width="100%" border="0" cellspacing="0" cellpadding="0">
      	<tr><td height="5"></td></tr>
      	<tr>
      		<td width="33%"></td>
      		<td width="33%"><? print_pagelist($page, $lists, $page_count, "&$param"); ?></td>
      		<td width="33%"></td>
      	</tr>
     	</table>
      

<? include "../footer.php"; ?>