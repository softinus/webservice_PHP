<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>
<?

// ������ �Ķ���� (�˻������� ������ �ʵ���)
//--------------------------------------------------------------------------------------------------
$param = "dep_code=$dep_code&dep2_code=$dep2_code&dep3_code=$dep3_code";
$param .= "&special=$special&display=$display&coupon_use=$coupon_use&searchopt=$searchopt&searchkey=$searchkey";
$param .= "&brand=$brand&shortage=$shortage&stock=$stock";
//--------------------------------------------------------------------------------------------------

?>

<script language="JavaScript" type="text/javascript">
<!--

//üũ�ڽ����� ����
function onSelect(form){
	if(form.select_tmp.checked){
		selectAll();
	}else{
		selectEmpty(); 
	}
}

//üũ�ڽ� ��ü����
function selectAll(){
	
	var i; 	
	
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].action == "product_save.php"){
			if(document.forms[i].select_checkbox){
				document.forms[i].select_checkbox.checked = true;
			}
		}
	}
	return;
}

//üũ�ڽ� ��������
function selectEmpty(){

	var i;

	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].select_checkbox){
			if(document.forms[i].action == "product_save.php"){
				document.forms[i].select_checkbox.checked = false;
			}
		}
	}
	return;
}

//���û�ǰ ����
function prdDelete(){

	var i;
	var selected = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].action == "product_save.php"){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selected = selected + document.forms[i].prdcode.value + "|";
				}
			}
	}

	if(selected == ""){
		alert("������ ��ǰ�� �������� �ʾҽ��ϴ�.");
		return;
	}else{
		if(confirm("������ ��ǰ�� ���� �����Ͻðڽ��ϱ�?")){
			document.location = "prd_save.php?mode=delete&page=<?=$page?>&<?=$param?>&selected=" + selected;
		}else{
			selectEmpty();
			return;
		}
	}
	return;
	
}

// ī�װ� ����
function catChange(form, idx){
   if(idx == "1"){
      form.dep2_code.options[0].selected = true;
      form.dep3_code.options[0].selected = true;
   }else if(idx == "2"){
      form.dep3_code.options[0].selected = true;
   }
   	form.page.value = 1;
   	form.submit();
}

// ��ǰ����
function prdCopy(prdcode){
	if(confirm("������ ��ǰ�� �ϳ��� �ڵ�����մϴ�.")){
		document.location = "prd_save.php?mode=prdcopy&prdcode=" + prdcode;
	}
}

// ��ǰ���� �����ٿ�
function excelDown(){
	var url = "prd_excel.php?<?=$param?>";
	window.open(url,"excelDown","height=240, width=560, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// ��ǰ���� �����Է� 
function excelUp() {
	var url = "prd_excel_up.php";
	window.open(url,"excelUp","height=520, width=560, menubar=no, scrollbars=no, resizable=no, toolbar=no, status=no, top=100, left=100");
}

// ����� 
function chgShortage(frm) {
	
	frm.page.value = 1;
	
	if(frm.shortage.value == "S") {
		frm.stock.disabled = false;
		frm.stock.focus();
	} else {
		frm.stock.disabled = true;
		frm.submit();
	}
	
}

// üũ�ڽ� ���ø���Ʈ
function selectValue(){
	var i;
	var selvalue = "";
	for(i=0;i<document.forms.length;i++){
		if(document.forms[i].prdcode != null){
			if(document.forms[i].select_checkbox){
				if(document.forms[i].select_checkbox.checked)
					selvalue = selvalue + document.forms[i].prdcode.value + "|";
				}
			}
	}
	return selvalue;
}

//��ǰ�̵�
function movePrd(){
	selvalue = selectValue();

	if(selvalue == ""){
		alert("�̵��� ��ǰ�� �����ϼ���.");
		return false;
	}else{
		var uri = "prd_move.php?selvalue=" + selvalue;
		window.open(uri,"movePrd","width=350,height=150");
	}
}

// ��ǰ����
function copyPrd(){
	selvalue = selectValue();
	if(selvalue == ""){
		alert("������ ��ǰ�� �����ϼ���.");
		return false;
	}else{
		var uri = "prd_copy.php?selvalue=" + selvalue;
		window.open(uri,"copyPrd","width=350,height=150,resizable=yes");
	}
}

//-->
</script>
</head>

			<table border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td><img src="../image/ic_tit.gif"></td>
          <td valign="bottom" class="tit">��ǰ���</td>
          <td width="2"></td>
          <td valign="bottom" class="tit_alt">��ü��ǰ ��� �� �˻��մϴ�.</td>
        </tr>
      </table>

			<br>
      <table width="100%" cellspacing="1" cellpadding="3" border="0" class="t_style">
      <form name="searchForm" action="<?=$PHP_SELF?>" method="get">
      <input type="hidden" name="page" value="<?=$page?>">
        <tr>
          <td width="15%" class="t_name">��ǰ�з�</td>
          <td width="85%" colspan="3" class="t_value">
          	<select name="dep_code" onChange="catChange(this.form,'1');" class="select">
          	<option value=''>:: ��з� ::
						<?
						$sql = "select substring(catcode,1,2) as catcode, catname from wiz_category where depthno = 1 order by priorno01 asc";
						$result = mysql_query($sql) or error(mysql_error());
						while($row = mysql_fetch_object($result)){
						  if($row->catcode == $dep_code)
						     echo "<option value='$row->catcode' selected>$row->catname";
						  else
						     echo "<option value='$row->catcode'>$row->catname";
						}
						?>
          	</select>
          	<select name="dep2_code" onChange="catChange(this.form,'2');" class="select">
          	<option value=''>:: �ߺз� ::
						<?
						if($dep_code != ''){
						   $sql = "select substring(catcode,3,2) as catcode, catname from wiz_category where depthno = 2 and catcode like '$dep_code%' order by priorno02 asc";
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
          	<select name="dep3_code" onChange="catChange(this.form,'3');" class="select">
          	<option value=''>:: �Һз� ::
		        <?
		        if($dep_code != '' && $dep2_code != ''){
		           $sql = "select substring(catcode,5,2) as catcode, catname from wiz_category where depthno = 3 and catcode like '$dep_code$dep2_code%' order by  priorno03 asc";
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
          <td width="15%" class="t_name">�˻�����</td>
          <td width="35%" class="t_value">
            <select name="searchopt" onChange="this.form.page.value=1;">
            <option value="prdname" <? if($searchopt == "prdname") echo "selected"; ?>>��ǰ��
            <option value="prdcode" <? if($searchopt == "prdcode") echo "selected"; ?>>��ǰ�ڵ�
            <option value="prdcom" <? if($searchopt == "prdcom") echo "selected"; ?>>������
            </select>
            <input type="text" size="25" name="searchkey" value="<?=$searchkey?>" class="input">
          </td>
          <td width="15%" class="t_name">��������</td>
          <td width="35%" class="t_value">
          	<select name="coupon_use" onChange="this.form.page.value=1;this.form.submit();">
            <option value="">:: ���� ::
            <option value="Y" <? if($coupon_use == "Y") echo "selected"; ?>>��
            <option value="N" <? if($coupon_use == "N") echo "selected"; ?>>�ƴϿ�
            </select>
          </td>
        </tr>
        <tr>
          <td class="t_name">�����</td>
          <td class="t_value">
            <select name="shortage" onChange="chgShortage(this.form)">
            <option value="">:: ����� ::
            <option value="Y" <? if($shortage == "Y") echo "selected"; ?>>ǰ����ǰ</option>
            <option value="N" <? if($shortage == "N") echo "selected"; ?>>������</option>
            <option value="S" <? if($shortage == "S") echo "selected"; ?>>����</option>
            </select>
            <input type="text" size="5" name="stock" value="<?=$stock?>" class="input" <? if($shortage != "S") echo "disabled" ?>>�� ����
          </td>
          <td class="t_name">��������</td>
          <td class="t_value">
            <select name="display" onChange="this.form.page.value=1;this.form.submit();">
            <option value="">:: ���� ::
            <option value="Y" <? if($display == "Y") echo "selected"; ?>>������
            <option value="N" <? if($display == "N") echo "selected"; ?>>��������
            </select>
          </td>
        </tr>
        <tr>
          <td class="t_name">�׷�</td>
          <td class="t_value">
            <select name="special" onChange="this.form.page.value=1;this.form.submit();">
            <option value="">:: �׷켱�� ::
            <option value="new" <? if($special == "new") echo "selected"; ?>>�Ż�ǰ
            <option value="best" <? if($special == "best") echo "selected"; ?>>����Ʈ��ǰ
            <option value="popular" <? if($special == "popular") echo "selected"; ?>>�α��ǰ
            <option value="recom" <? if($special == "recom") echo "selected"; ?>>��õ��ǰ
            <option value="sale" <? if($special == "sale") echo "selected"; ?>>���ϻ�ǰ
            </select> 
            <input type="image" src="../image/btn_search.gif" align="absmiddle">
          </td>
          <td class="t_name">�귣��</td>
          <td class="t_value">
          	<select name="brand" onChange="this.form.page.value=1;this.form.submit();">
          	<option value="">:: �귣�弱�� ::
          	<?
          	$sql = "select idx, brdname from wiz_brand where brduse != 'N' order by priorno asc";
          	$result = mysql_query($sql) or error(mysql_error());
          	while($row = mysql_fetch_array($result)) {
          	?>
          	<option value="<?=$row[idx]?>" <? if($brand == $row[idx]) echo "selected"; ?>><?=$row[brdname]?></option>
          	<?
          	}
          	?>
          </td>
        </tr>
      
      </table>

      <br>
      
      <?
			$sql = "select prdcode from wiz_product";
			$result = mysql_query($sql) or error(mysql_error());
			$all_total = mysql_num_rows($result);
			
			if(!empty($dep_code)) $catcode_sql = "wc.catcode like '$dep_code$dep2_code$dep3_code%' and ";
			if(!empty($special)) $special_sql = "wp.$special = 'Y' and ";
			if(!empty($display)) $display_sql = "wp.showset = '$display' and ";
			if(!empty($searchopt)) $search_sql = "wp.$searchopt like '%$searchkey%' and ";
			if(!empty($coupon_use)) $coupon_sql = "wp.coupon_use = '$coupon_use' and ";
			if(!empty($brand)) $brand_sql = "wp.brand = '$brand' and ";
			if(!empty($shortage)) {
				if(!strcmp($shortage, "N")) $shortage_sql = " (wp.shortage = '$shortage' or wp.shortage = '') and ";
				else $shortage_sql = " wp.shortage = '$shortage' and ";
			}
			if(!strcmp($shortage, "S")) $stock_sql = " wp.stock <= '$stock' and ";
			
			$sql = "select distinct wp.prdcode from wiz_product wp, wiz_cprelation wc 
			              where $catcode_sql $special_sql $display_sql $search_sql $coupon_sql $brand_sql $shortage_sql $stock_sql wc.prdcode = wp.prdcode order by wp.prior desc, wp.prdcode desc";

			$result = mysql_query($sql) or error(mysql_error());
			$total = mysql_num_rows($result);
			
			$rows = 16;
			$lists = 5;
			$page_count = ceil($total/$rows);
			if(!$page || $page > $page_count) $page = 1;
			$start = ($page-1)*$rows;
			$no = $total-$start;
      ?>
      <table width="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td>�� ��ǰ�� : <b><?=$all_total?></b> , �˻� ��ǰ�� : <b><?=$total?></b></td>
          <td align="right">
          <img src="../image/btn_excel_up.gif" style="cursor:hand" onClick="excelUp();" alt="������ǰ���">
          <img src="../image/btn_excel.gif" style="cursor:hand" onClick="excelDown();">
          <img src="../image/btn_prdadd.gif" style="cursor:hand" onClick="document.location='prd_input.php?<?=$param?>'">
          </td>
        </tr>
      </table> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
      	<form>
      	<tr><td class="t_rd" colspan="20"></td></tr>
        <tr class="t_th">
          <th width="5%"><input type="checkbox" name="select_tmp" onClick="onSelect(this.form)"></th>
          <th width="10%">��ǰ�ڵ�</td>
          <th width="5%"></td>
          <th width="30%">��ǰ��</td>
          <th width="10%">��ǰ����</td>
          <th width="10%">���</td>
          <th width="10%">��������</td>
          <th width="15%">���</td>
        </tr>
        <tr><td class="t_rd" colspan="20"></td></tr>
      	</form>
				<?
				$sql = "select distinct wp.prdcode, wp.prdimg_R, wp.prdname, wp.sellprice, wp.prior, wp.stock from wiz_product wp, wiz_cprelation wc 
				              where $catcode_sql $special_sql $display_sql $search_sql $coupon_sql $brand_sql $shortage_sql $stock_sql wc.prdcode = wp.prdcode order by wp.prior desc, wp.prdcode desc limit $start, $rows";
				$result = mysql_query($sql) or error(mysql_error());
				
				while(($row = mysql_fetch_object($result)) && $rows){
					
					// ��ǰ �̹���
					if(!@file($_SERVER[DOCUMENT_ROOT]."/data/prdimg/".$row->prdimg_R)) $row->prdimg_R = "/images/noimage.gif";
					else $row->prdimg_R = "/data/prdimg/".$row->prdimg_R;
					
				?>
	     <form name="<?=$row->prdcode?>" action="product_save.php" onSubmit="return false;">
        <input type="hidden" name="prdcode" value="<?=$row->prdcode?>">
        <tr> 
          <td align="center" height="52"><input type="checkbox" name="select_checkbox"></td>
          <td align="center"><a href="prd_input.php?mode=update&prdcode=<?=$row->prdcode?>&page=<?=$page?>&<?=$param?>"><?=$row->prdcode?></a></td>
          <td><a href="prd_input.php?mode=update&prdcode=<?=$row->prdcode?>&page=<?=$page?>&<?=$param?>"><img src="<?=$row->prdimg_R?>" width="50" height="50" border="0"></a></td>
          <td><a href="prd_input.php?mode=update&prdcode=<?=$row->prdcode?>&page=<?=$page?>&<?=$param?>"><?=$row->prdname?></a></td>
          <td align="right"><?=number_format($row->sellprice)?>��</td>
          <td align="center"><?=$row->stock?></td>
          <td align="center">
            <table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><a href="prd_save.php?mode=prior&posi=upup&prdcode=<?=$row->prdcode?>&prior=<?=$row->prior?>&page=<?=$page?>&<?=$param?>"><img src="../image/upup_icon.gif" border="0" alt="10�ܰ� ����"></a></td>
              <td width="4"></td>
              <td></td>
            </tr>
            <tr><td height="4"></td></tr>
            <tr>
              <td><a href="prd_save.php?mode=prior&posi=up&prdcode=<?=$row->prdcode?>&prior=<?=$row->prior?>&page=<?=$page?>&<?=$param?>"><img src="../image/up_icon.gif" border="0" alt="1�ܰ� ����"></a></td>
              <td width="4"></td>
              <td><a href="prd_save.php?mode=prior&posi=down&prdcode=<?=$row->prdcode?>&prior=<?=$row->prior?>&page=<?=$page?>&<?=$param?>"><img src="../image/down_icon.gif" border="0" alt="1�ܰ� �Ʒ���"></a></td>
            </tr>
            <tr><td height="4"></td></tr>
            <tr>
              <td></td>
              <td width="4"></td>
              <td><a href="prd_save.php?mode=prior&posi=downdown&prdcode=<?=$row->prdcode?>&prior=<?=$row->prior?>&page=<?=$page?>&<?=$param?>"><img src="../image/downdown_icon.gif" border="0" alt="10�ܰ� �Ʒ���"></a> </td>
            </tr>
            </table>
          </td>
          <td align="center"> 
            <img src="../image/btn_edit_s.gif" style="cursor:hand" onclick="document.location='prd_input.php?mode=update&prdcode=<?=$row->prdcode?>&page=<?=$page?>&<?=$param?>'">
            <input type="image" src="../image/btn_delete_s.gif" style="cursor:hand" onclick="selectEmpty();this.form.select_checkbox.checked=true;prdDelete('<?=$row->prdcode?>');">
            <img src="../image/btn_copy.gif" style="cursor:hand" onclick="prdCopy('<?=$row->prdcode?>');">
          </td>
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

      <table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
      	<tr><td height="5"></td></tr>
        <tr> 
          <td width="33%">
          	<img src="../image/btn_seldel.gif" style="cursor:hand"  onClick="prdDelete();">
          	<img src="../image/btn_prdmove.gif" style="cursor:hand" onClick="movePrd();">
          	<img src="../image/btn_prdcopy.gif" style="cursor:hand" onClick="copyPrd();">
          </td>
          <td width="33%"><? print_pagelist($page, $lists, $page_count, "&$param"); ?></td>
          <td width="33%"></td>
        </tr>
      </table>

<? include "../footer.php"; ?>