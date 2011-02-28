<?
	include "../../inc/common.inc";
	include "../../inc/util.inc";

	$filename = "������[".date('Ymd')."].xls";

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

	if(!empty($dep_code)) $catcode_sql = "wc.catcode like '$dep_code$dep2_code$dep3_code%' and ";
	if($stock_opt == "shortage") $stock_sql = " (wp.optcode like '%^0^%' or stock <= 0) and ";
	if($stock_opt == "lack") $stock_sql = " (wp.optcode like '%^1^%' or stock < savestock) and ";
	if($stock_opt == "reserve") $stock_sql = " (wp.optcode not like '%^0^%' and stock > savestock)  and ";
	if($stock_opt == "showset") $stock_sql = "wp.showset = 'N' and ";

	if(!empty($searchopt)) $search_sql = "wp.$searchopt like '%$searchkey%' and ";

	$sql = "select distinct wp.prdcode, wp.optcode, wp.optcode2, wp.optvalue, wp.prdimg_R, wp.prdname, wp.sellprice, wp.prior, wp.stock, wp.savestock, wp.opt_use from wiz_product wp, wiz_cprelation wc
              where $catcode_sql $stock_sql $search_sql wc.prdcode = wp.prdcode order by wp.prior desc, wp.prdcode desc";
   $result = mysql_query($sql) or error(mysql_error());


	echo "<table border=1>\n";
   echo "  <tr align=center style=font-weight:bold>\n";
   echo "<td bgcolor=#C0C0C0>��ǰ�ڵ�</td>\n";
   echo "<td bgcolor=#C0C0C0>��ǰ��</td>\n";
   echo "<td bgcolor=#C0C0C0>�ǸŰ�</td>\n";
   echo "<td bgcolor=#C0C0C0>����</td>\n";
   echo "<td bgcolor=#C0C0C0>���</td>\n";
   echo "<td bgcolor=#C0C0C0>�������</td>\n";
   echo "   </tr>";

	while($row = mysql_fetch_object($result)){

		$reserve = $row->stock - $row->savestock;

		echo "<tr>\n";
	   	echo "<td>$row->prdcode</td>\n";
	   	echo "<td>$row->prdname</td>\n";
	   	echo "<td>$row->sellprice</td>\n";
	   	echo "<td>$reserve</td>\n";
	   	echo "<td>$row->stock</td>\n";
	   	echo "<td>$row->savestock</td>\n";
	   echo "   </tr>";

	}

	echo "</table>\n";

?>