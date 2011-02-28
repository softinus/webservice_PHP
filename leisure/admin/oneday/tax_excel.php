<?php
	include "../../inc/common.inc";
	include "../../inc/util.inc";
	
	$filename = "세금계산서[".date('Ymd')."].xls";

	header( "Content-type: application/vnd.ms-excel" ); 
	header( "Content-Disposition: attachment; filename=$filename" ); 
	header( "Content-Description: PHP4 Generated Data" ); 

	$excel_title = "발급일자	";
	$excel_title .= "상호	";
	$excel_title .= "사업자등록번호	";
	$excel_title .= "대표자	";
	$excel_title .= "품목명	";
	$excel_title .= "공급가액	";
	$excel_title .= "세액	";
	$excel_title .= "소계	";
	$excel_title .= "처리상태	";
	$excel_title .= "상품정보";
	
	echo $excel_title."\n";
	
  if($prev_year){
     $prev_period = $prev_year."-".$prev_month."-".$prev_day;
     $next_period = $next_year."-".$next_month."-".$next_day." 23:59:59";
     $period_sql = " and tax_date >= '$prev_period' and tax_date <= '$next_period'";
  }
  if($status == "") $status_sql = "and tax_pub != ''";
  else $status_sql = "and tax_pub = '$status'";

  if($searchopt && $searchkey) $searchopt_sql = " and $searchopt like '%$searchkey%'";

	$sql = "select * from wiz_tax where tax_date != '' $status_sql $period_sql $searchopt_sql order by tax_date desc";
	$result = mysql_query($sql) or error(mysql_error());

	while($row = mysql_fetch_array($result)){

		$prd_name = "";

		$prd_info = explode("^^", $row[prd_info]);
		$no = 0;
		for($ii = 0; $ii < count($prd_info); $ii++) {
		
			if(!empty($prd_info[$ii])) {
				$tmp_prd = explode("^", $prd_info[$ii]);
				if($ii < 1) $prd_name = $tmp_prd[0];
				$no++;
			}
		}
		
		if($no > 1) {
			$prd_name .= " 외 ".($no-1)."건";
		}

		$excel_data = "";
		$excel_data .= $row[tax_date]."	";
		$excel_data .= $row[com_name]."	";
		$excel_data .= $row[com_num]."	";
		$excel_data .= $row[com_owner]."	";
		$excel_data .= $prd_name."	";
		$excel_data .= $row[supp_price]."	";
		$excel_data .= $row[tax_price]."	";
		$excel_data .= $row[supp_price] + $row[tax_price]."	";
		$excel_data .= $row[tax_pub]."	";
		$excel_data .= $row[prd_info];

		echo $excel_data."\n";
	}
?>