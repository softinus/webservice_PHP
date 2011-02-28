<? include "../../inc/common.inc"; ?>
<? include "../../inc/util.inc"; ?>
<? include "../../inc/shop_info.inc"; ?>
<? include "../../inc/admin_check.inc"; ?>
<? include "../header.php"; ?>

<?
$param = "group=$group&searchopt=$searchopt&keyword=$keyword&dep_code=$dep_code&dep2_code=$dep2_code&dep3_code=$dep3_code";
?>

<table border="0" cellspacing="0" cellpadding="2">
	<tr>
		<td><img src="../image/ic_tit.gif"></td>
		<td valign="bottom" class="tit">공급업체분석</td>
		<td width="2"></td>
		<td valign="bottom" class="tit_alt">공급업체별 매출 통계분석</td>
	</tr>
</table>

<br>

<table width="100%" cellspacing="1" cellpadding="3" border="0" class="t_style">
<form name="frm" action="<?=$PHP_SELF?>" method="get">
<!--
	<tr>
		<td class="t_name">지역분류</td>
		<td class="t_value" colspan="3">
			<input type="radio" name="catcode" value="all" <?if($catcode == "all" || $catcode == ""){?>checked<?}?>/> 전체
		
<?
$sql = "select * from wiz_daycategory  where depthno='1' order by priorno01 asc, priorno02 asc, priorno03 asc";
$result = mysql_query($sql)or die($sql);
while($row = mysql_fetch_array($result)){
?>
			<input type="radio" name="catcode" value="<?=$row["catcode"]?>" <?if($catcode == $row["catcode"]){?>checked<?}?>/> <?=$row["catname"]?>
<?
}
?>	
		</td>
	</tr>
	-->
	<tr>
		<td width="15%" class="t_name">공급업체</td>
		<td width="85%" class="t_value">
			<select name="company" class="select2">
				<option value="">::: 공급업체 :::</option>
			<?
			$csql = "select * from wiz_company order by wdate desc";
			$cresult = mysql_query($csql)or die($csql);
	
			while($rs = mysql_fetch_array($cresult)){
			?>
				<option <?if($company==$rs[idx]){?>selected<?}?> value="<?=$rs[idx]?>"><?=$rs[company]?></option>
			<?
			}	
			?>
			</select>
			<input type="image" src="../image/btn_search.gif" align="absmiddle">
		</td>
		<!--
		<td width="15%" class="t_name">조건</td>
		<td width="45%" class="t_value">
			<select name="searchopt">
				<option value="">:: 조건선택 ::</option>
				<option value="wp.prdname" <? if($searchopt == "wp.prdname") echo "selected"; ?>>상품명</option>
				<option value="wp.prdcode" <? if($searchopt == "wp.prdcode") echo "selected"; ?>>상품코드</option>
			</select>
			<input type="text" name="keyword" value="<?=$keyword?>" class="input">
			<input type="image" src="../image/btn_search.gif" align="absmiddle">
		</td>
		-->
	</tr>
</form>
</table>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td height="10"></td>
	</tr>
</table>


<?
/*
$view_orderby = "desc";
$deimg_orderby = "desc";
$basket_orderby = "desc";
$order_orderby = "desc";
$cancel_orderby = "desc";
$com_orderby = "desc";

if($orderkey == "viewcnt"){
	if($orderby == "asc" || $orderby == "") $view_orderby = "desc";
	else $view_orderby = "asc";
}else if($orderkey == "deimgcnt"){
	if($orderby == "asc" || $orderby == "") $deimg_orderby = "desc";
	else $deimg_orderby = "asc";
}else if($orderkey == "basketcnt"){
	if($orderby == "asc" || $orderby == "") $basket_orderby = "desc";
	else $basket_orderby = "asc";
}else if($orderkey == "ordercnt"){
	if($orderby == "asc" || $orderby == "") $order_orderby = "desc";
	else $order_orderby = "asc";
}else if($orderkey == "cancelcnt"){
	if($orderby == "asc" || $orderby == "") $cancel_orderby = "desc";
	else $cancel_orderby = "asc";
}else if($orderkey == "comcnt"){
	if($orderby == "asc" || $orderby == "") $com_orderby = "desc";
	else $com_orderby = "asc";
}
*/


// 상품그룹
if(!empty($group)) $group_sql = " and wp.$group = 'Y' ";
// 조건검색
if(!empty($searchopt)) $searchopt_sql = " and wp.$searchopt like '%$keyword%' ";
// 상품분류
if(!empty($catcode) && $catcode != "all") $searchopt_sql .= " and wc.catcode like '$catcode%' ";
// 공급업체
if(!empty($catcode) && $catcode != "all") $searchopt_sql .= " and wp.company_idx like '$company%' ";
// 정렬순서
if(!empty($orderkey) && !empty($orderby)) $order_sql = " order by $orderkey $orderby, wp.prior desc";
else $order_sql = " order by wp.prior desc";
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="20" align="right">발급(배송)완료된 상품만 통계에 표기 됩니다.</td>
	</tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td class="t_rd" colspan="20"></td>
	</tr>
	<tr class="t_th">
		<th width="50">No</th>
		<th>공급업체명</th>
		<th width="100">판매수량</th>
		<th width="100">총판매가</th>
		<th width="100">수수료</th>
		<!--
		<th width="100">업체결제비</th>
		<th width="100">마진</th>
		-->
	</tr>
	<tr>
		<td class="t_rd" colspan="20"></td>
	</tr>
<?

$sql = "select distinct(wp.company_idx) from";
$sql .= " wiz_dayproduct wp, wiz_daycprelation wc where wp.prdcode = wc.prdcode";
$sql .= " $searchopt_sql $order_sql ";
$result = mysql_query($sql) or error(mysql_error());
$total = mysql_num_rows($result);

/*
$sql = "select distinct(wp.prdcode) from wiz_dayproduct wp inner join wiz_daycprelation as wc on wp.prdcode = wc.prdcode where wp.prdcode != '' $group_sql $searchopt_sql $order_sql";
*/
$rows = 12;
$lists = 5;
if(!$page) $page = 1;
$page_count = ceil($total/$rows);
$start = ($page-1)*$rows;
$no = $total-$start;



/*$sql = "select distinct(wp.prdcode), wp.prdname, wp.prdimg_R, wp.viewcnt, wp.deimgcnt, wp.basketcnt, wp.ordercnt, wp.cancelcnt, wp.comcnt 
from wiz_dayproduct wp inner join wiz_daycprelation as wc on wp.prdcode = wc.prdcode
where wp.prdcode != '' $group_sql $searchopt_sql $order_sql limit $start, $rows";*/


/*
$sql = "select distinct(wp.company_idx), wp.accounts, wp.money, wp.commission, wp.company, wp.sellprice, wp.prdimg_R, wp.ordercnt, wp.cancelcnt, wp.comcnt , sum(wo.amount) as count, sum(wo.total_price) as total_price from";
$sql .= " wiz_dayproduct wp, wiz_daycprelation wc , wiz_dayorder wo ";
$sql .= " where wp.prdcode = wc.prdcode and ";
$sql .= " wo.prdcode = wp.prdcode and wo.status='DC'";
$sql .= " group by wp.company_idx ";
*/

$sql = "select company, idx from wiz_company order by idx desc";
$result = mysql_query($sql) or die($sql);

while(($row = mysql_fetch_object($result))){

	$isql = "select sum(wo.amount) as count, sum(wo.total_price) as total_price from wiz_dayproduct wp, wiz_dayorder wo, wiz_basket wb where wp.company_idx = '$row->idx' and  wo.status='DC' and wp.prdcode = wb.prdcode and wb.orderid=wo.orderid ";
	$istm = mysql_query($isql) or die($isql);
	$rs = mysql_fetch_array($istm);
	
	$total_com = 0;
	$query = "select wp.accounts, wp.sellprice as sellprice, wp.money as money, wb.amount  as amount ";
	$query .= " from wiz_dayproduct wp, wiz_basket wb, wiz_dayorder wo where ";
	$query .= " wp.prdcode = wb.prdcode and ";
	$query .= " wb.orderid=wo.orderid and ";
	$query .= " wp.company_idx = '$row->idx' and ";
	$query .= " wo.status='DC' ";
	$query .= " group by wo.orderid";
	$rst = mysql_query($query) or die($query);


	while($rows = mysql_fetch_object($rst)){
		//수수료
		if($rows->accounts == "money"){	 // 공급가
			$commission = ( $rows->sellprice - $rows->money) * $rows->amount;
		}else{
			$commission = (($rows->sellprice * $rows->commission) / 100)  * $rows->amount;
		}

		$total_com = $total_com + $commission;
		
	}

?>
	<tr>
		<td align="center" height="28"><?=$no?></td>
		<td style="padding-left:20px;"><?=$row->company?></td>
		<td align="center"><?=number_format($rs[count])?> EA</td>
		<td align="center"><?=number_format($rs[total_price])?>원</td>
		<td align="center"><?=number_format($total_com)?>원</td>
	</tr>
	<tr>
		<td colspan="20" class="t_line"></td>
	</tr>
<?
	$no--;
	$rows--;
}
?>
</table>

<br>
<!--
<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="33%"></td>
		<td width="33%"><? print_pagelist($page, $lists, $page_count, "&orderkey=$orderkey&orderby=$orderby&$param"); ?></td>
		<td width="33%" align="right"></td>
	</tr>
</table>
-->

<? include "../footer.php"; ?>