<?
if($exceldown != "ok"){
?>
<html>
<head>
<title>:: ��ǰ���� �ٿ�ε� ::</title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function selBasic(frm){
	
	frm.c_prdgroup.checked = true;
	frm.c_prdname.checked = true;
	frm.c_prdcom.checked = true;
	frm.c_origin.checked = false;
	frm.c_display.checked = false;
	frm.c_shortage.checked = false;
	frm.c_stock.checked = false;
	frm.c_category.checked = true;
	frm.c_brand.checked = true;
	
	frm.c_sellprice.checked = true;
	frm.c_conprice.checked = true;
	frm.c_reserve.checked = false;
	frm.c_option.checked = true;
	
	frm.c_image.checked = true;
	frm.c_stortexp.checked = false;
	frm.c_content.checked = true;
	

}

function selAll(frm){
	
	frm.c_prdgroup.checked = true;
	frm.c_prdname.checked = true;
	frm.c_prdcom.checked = true;
	frm.c_category.checked = true;
	frm.c_brand.checked = true;
	frm.c_origin.checked = true;
	frm.c_display.checked = true;
	frm.c_shortage.checked = true;
	frm.c_stock.checked = true;
	
	frm.c_sellprice.checked = true;
	frm.c_conprice.checked = true;
	frm.c_reserve.checked = true;
	frm.c_option.checked = true;
	
	frm.c_image.checked = true;
	frm.c_stortexp.checked = true;
	frm.c_content.checked = true;
	
	
}
//-->
</script>
</head>

<body leftmargin="5" topmargin="5">
<table><tr><td height="4"></td></table>
<table width="98%" align="center" border="0" cellpadding="3" cellspacing="6" class="t_style">
<form name="frm" action="" method="post">
<input type="hidden" name="exceldown" value="ok">

<input type="hidden" name="dep_code" value="<?=$dep_code?>">
<input type="hidden" name="dep2_code" value="<?=$dep2_code?>">
<input type="hidden" name="dep3_code" value="<?=$dep3_code?>">
<input type="hidden" name="special" value="<?=$special?>">
<input type="hidden" name="display" value="<?=$display?>">
<input type="hidden" name="searchopt" value="<?=$searchopt?>">
<input type="hidden" name="searchkey" value="<?=$searchkey?>">
  <tr>
    <td bgcolor="ffffff">
    <table><tr><td></td></tr></table>
     <table cellspacing="2" cellpadding="0" border="0">
       <tr>
        <td><font color="2369C9"><b>���ñ���</b></font></td>
        <td><input type="radio" name="sel_gubun" onClick="selBasic(this.form);" checked><font color="red"><b>�⺻����</b></font></td>
		  <td><input type="radio" name="sel_gubun" onClick="selAll(this.form);"><font color="red"><b>��ü����</b></font></td>
		  <td></td>
		  <td></td>
		</tr>
		<tr><td height="6"></td></tr>
      <tr>
        <td width="80"><font color="2369C9"><b>�⺻����</b></font></td>
        <td width="100"><input type="checkbox" name="c_prdcode" value="Y" checked>��ǰ�ڵ�</td>
		  <td width="100"><input type="checkbox" name="c_prdname" value="Y" checked>��ǰ��</td>
		  <td width="100"><input type="checkbox" name="c_prdgroup" value="Y" checked>��ǰ�׷�</td>
		  <td width="100"><input type="checkbox" name="c_prdcom" value="Y" checked>������</td>
		</tr>
		<tr>
		  <td></td>
		  <td><input type="checkbox" name="c_category" value="Y" checked>ī�װ�</td>
		  <td><input type="checkbox" name="c_brand" value="Y" checked>�귣��</td>
		  <td><input type="checkbox" name="c_origin" value="Y">������</td>
		  <td><input type="checkbox" name="c_display" value="Y">��ǰ����</td>
		</tr>
		<tr>
		  <td></td>
		  <td><input type="checkbox" name="c_shortage" value="Y">ǰ������</td>
		  <td><input type="checkbox" name="c_stock" value="Y">���</td>
		  <td></td>
		  <td></td>
		</tr>
	   <tr><td height="6"></td></tr>
		<tr>
		   <td><font color="2369C9"><b>���ݹ׿ɼ�</b></font></td>
			<td><input type="checkbox" name="c_sellprice" value="Y" checked>�ǸŰ�</td>
			<td><input type="checkbox" name="c_conprice" value="Y" checked>����</td>
			<td><input type="checkbox" name="c_reserve" value="Y">������</td>
			<td><input type="checkbox" name="c_option" value="Y" checked>�ɼ�</td>
		</tr>
		<tr><td height="6"></td></tr>
		<tr>
		   <td><font color="2369C9"><b>��ǰ����/����</b></font></td>
			<td><input type="checkbox" name="c_image" value="Y" checked>��ǰ����</td>
			<td><input type="checkbox" name="c_stortexp" value="Y">�������ּ�</td>
			<td><input type="checkbox" name="c_content" value="Y" checked>�󼼼���</td>
			<td></td>
		</tr>
    </table>                              
   </td>
 </tr>
</table>
<table align="center">
  <tr><td height="5"></td></tr>
  <tr>
    <td>
    	<input type="image" src="../image/btn_confirm_l.gif"> &nbsp; 
    	<img src="../image/btn_close_l.gif" style="cursor:hand" onClick="self.close();">
    </td>
  </tr>
</form>
</table>

</body>
</html>
<?
}else{

	include "../../inc/common.inc";
	include "../../inc/util.inc";
	
	$filename = "��ǰ����[".date('Ymd')."].xls";

	header( "Content-type: application/vnd.ms-excel" ); 
	header( "Content-Disposition: attachment; filename=$filename" ); 
	header( "Content-Description: PHP4 Generated Data" ); 
  
	echo "<style>\n";
	echo ".xl40\n";
	echo "        {mso-style-parent:style0;\n";
	echo "        mso-number-format:'0_ ';\n";
	echo "        text-align:center;\n";
	echo "        border:.5pt solid black;\n";
	echo "        background:white;\n";
	echo "        mso-pattern:auto none;\n";
	echo "        white-space:normal;}\n";
	echo "-->\n";
	echo "</style>\n";

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
		
	$sql = "select wp.*, wy.catname, wb.brdname
					from wiz_product as wp left join wiz_cprelation as wc on wp.prdcode = wc.prdcode
					left join wiz_category as wy on wc.catcode = wy.catcode
					left join wiz_brand as wb on wp.brand = wb.idx
					where $catcode_sql $special_sql $display_sql $search_sql $coupon_sql $brand_sql $shortage_sql $stock_sql
					wp.prdcode != '' order by wp.prior desc, wp.prdcode desc";
					
   $result = mysql_query($sql) or error(mysql_error());
   $total = mysql_num_rows($result);


	echo "<table border=1>\n";
   echo "  <tr align=center style=font-weight:bold>\n";
   if($c_prdcode == "Y") echo "<td bgcolor=#C0C0C0>��ǰ�ڵ�</td>\n";
   if($c_prdname == "Y") echo "<td bgcolor=#C0C0C0>��ǰ��</td>\n";
   if($c_category == "Y") echo "<td bgcolor=#C0C0C0>��ǰī�װ�</td>\n";
   if($c_prdgroup == "Y") echo "<td bgcolor=#C0C0C0>��ǰ�׷�</td>\n";
   if($c_brand == "Y") echo "<td bgcolor=#C0C0C0>�귣��</td>\n";
   if($c_prdcom == "Y") echo "<td bgcolor=#C0C0C0>������</td>\n";
   if($c_origin == "Y") echo "<td bgcolor=#C0C0C0>������</td>\n";
   if($c_display == "Y") echo "<td bgcolor=#C0C0C0>��ǰ����</td>\n";
   if($c_shortage == "Y") echo "<td bgcolor=#C0C0C0>ǰ������</td>\n";
   if($c_stock == "Y") echo "<td bgcolor=#C0C0C0>���</td>\n";
   if($c_sellprice == "Y") echo "<td bgcolor=#C0C0C0>�ǸŰ�</td>\n";
   if($c_conprice == "Y") echo "<td bgcolor=#C0C0C0>����</td>\n";
   if($c_reserve == "Y") echo "<td bgcolor=#C0C0C0>������</td>\n";
   if($c_option == "Y") {
   	echo "<td bgcolor=#C0C0C0>�Ϲ� �ɼ�1</td>\n";
  	echo "<td bgcolor=#C0C0C0>�Ϲ� �ɼ�2</td>\n";
   	echo "<td bgcolor=#C0C0C0>�Ϲ� �ɼ�3</td>\n";
   	echo "<td bgcolor=#C0C0C0>�����߰� �ɼ�1</td>\n";
   	echo "<td bgcolor=#C0C0C0>�����߰� �ɼ�2</td>\n";
   	echo "<td bgcolor=#C0C0C0>����/��� �ɼ�1</td>\n";
   	echo "<td bgcolor=#C0C0C0>����/��� �ɼ�2</td>\n";
   	echo "<td bgcolor=#C0C0C0>����/��� �ɼǰ�</td>\n";
   }
   if($c_image == "Y") echo "<td bgcolor=#C0C0C0>��ǰ��ǥ����</td>\n";
   if($c_image == "Y") echo "<td bgcolor=#C0C0C0>��ǰ����1</td>\n";
   if($c_image == "Y") echo "<td bgcolor=#C0C0C0>��ǰ����2</td>\n";
   if($c_image == "Y") echo "<td bgcolor=#C0C0C0>��ǰ����3</td>\n";
   if($c_image == "Y") echo "<td bgcolor=#C0C0C0>��ǰ����4</td>\n";
   if($c_image == "Y") echo "<td bgcolor=#C0C0C0>��ǰ����5</td>\n";
   if($c_stortexp == "Y") echo "<td bgcolor=#C0C0C0>�������ּ�</td>\n";
   if($c_content == "Y") echo "<td bgcolor=#C0C0C0>�󼼼���</td>\n";
   echo "   </tr>";

	while($row = mysql_fetch_object($result)){

		if($row->new == "Y") $row->prdgroup .= "/�Ż�ǰ";
		if($row->popular == "Y") $row->prdgroup .= "/�α��ǰ";
		if($row->recom == "Y") $row->prdgroup .= "/��õ��ǰ";
		if($row->sale == "Y") $row->prdgroup .= "/���ϻ�ǰ";
		if($row->best == "Y") $row->prdgroup .= "/����Ʈ��ǰ";
		
		echo "<tr>\n";
	   if($c_prdcode == "Y") echo "<td>$row->prdcode</td>\n";
	   if($c_prdname == "Y") echo "<td>$row->prdname</td>\n";
	   if($c_category == "Y") echo "<td>$row->catname</td>\n";
	   if($c_prdgroup == "Y") echo "<td>$row->prdgroup</td>\n";
   	 if($c_brand == "Y") echo "<td>$row->brdname</td>\n";
	   if($c_prdcom == "Y") echo "<td>$row->prdcom</td>\n";
	   if($c_origin == "Y") echo "<td>$row->origin</td>\n";
	   if($c_display == "Y") echo "<td>$row->showset</td>\n";
	   if($c_shortage == "Y") echo "<td>$row->shortage</td>\n";
	   if($c_stock == "Y") echo "<td>$row->stock</td>\n";
	   if($c_sellprice == "Y") echo "<td>$row->sellprice</td>\n";
	   if($c_conprice == "Y") echo "<td>$row->conprice</td>\n";
	   if($c_reserve == "Y") echo "<td>$row->reserve</td>\n";
	   if($c_option == "Y") {
	   	echo "<td>$row->opttitle5::$row->optcode5</td>\n";
	   	echo "<td>$row->opttitle6::$row->optcode6</td>\n";
	   	echo "<td>$row->opttitle7::$row->optcode7</td>\n";
	   	echo "<td>$row->opttitle3::$row->optcode3</td>\n";
	   	echo "<td>$row->opttitle4::$row->optcode4</td>\n";
	   	echo "<td>$row->opttitle::$row->optcode</td>\n";
	   	echo "<td>$row->opttitle2::$row->optcode2</td>\n";
	   	echo "<td>$row->optvalue</td>\n";
	   }
	   if($c_image == "Y") echo "<td>$row->prdimg_R</td>\n";
	   if($c_image == "Y") echo "<td>/$row->prdimg_L1/$row->prdimg_M1/$row->prdimg_S1/</td>\n";
	   if($c_image == "Y") echo "<td>/$row->prdimg_L2/$row->prdimg_M2/$row->prdimg_S2/</td>\n";
	   if($c_image == "Y") echo "<td>/$row->prdimg_L3/$row->prdimg_M3/$row->prdimg_S3/</td>\n";
	   if($c_image == "Y") echo "<td>/$row->prdimg_L4/$row->prdimg_M4/$row->prdimg_S4/</td>\n";
	   if($c_image == "Y") echo "<td>/$row->prdimg_L5/$row->prdimg_M5/$row->prdimg_S5/</td>\n";
	   if($c_stortexp == "Y") echo "<td>$row->stortexp</td>\n";
	   if($c_content == "Y") echo "<td>".htmlspecialchars($row->content)."</td>\n";
	   echo "   </tr>";

	}
	
	echo "</table>\n";
}
?>