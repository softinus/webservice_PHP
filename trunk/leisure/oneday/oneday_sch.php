<?
include "../inc/oneday_header.inc"; 				// 상단디자인
$subimg = "";																// 상단이미지
/*$now_position = "<a href=/>Home</a> &gt; 지난상품보기";	// 현재위치
include "../inc/now_position.inc";
*/
?>
<style>
/*달력 TBL 테이블*/
.calendarTbl{background:gray;}
.calendarTbl tr{background:#fff;}
.calendarTbl thead tr th{background:#ddd; height:30px; font-size:14px; font-family:Comic Sans MS; color:gray;}
.calendarTbl tbody tr td{height:80px; vertical-align:top; text-align:right; font-size:13px;}

.calendarTbl tbody tr td span{ font-size:13px; text-align:center; display:block;}
.calendarTbl tbody tr td a{ color:gray !important; text-align:center; /*상품 폰트 색상*/ display:block; padding-bottom:5px;}
.sundayColor{color:#f00;}/*일요일*/
.satdayColor{color:#00f;}/*토요일*/
</style>

<?
/* 검색 정보 캐치*/
if(!empty($catcode)) $catcode_sql = "wc.catcode like '$catcode%' and ";
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

/* 달력 날짜정보 캐치*/
if(!$year){
	$year	= date("Y");
}
if(!$month){
 $month	= date("m");
}
$prev = date("Y-m",mktime(0,0,0,$month-1,1,$year));
$prevArray = split("-",$prev);
$prevYear = $prevArray[0];
$prevMonth = $prevArray[1];

$next = date("Y-m",mktime(0,0,0,$month+1,1,$year));
$nextArray = split("-",$next);
$nextYear = $nextArray[0];
$nextMonth = $nextArray[1];

$nnext = date("Y-m",mktime(0,0,0,$month+2,1,$year));
$nnextArray = split("-",$nnext);
$nnextYear = $nnextArray[0];
$nnextMonth = $nnextArray[1];

$day = "";
$first_day	= date("w",mktime(0,0,0,$month,1,$year)) + 1;  
$total_day	= date("t", mktime(0, 0, 0, $month, 1, $year));

$chk_start  = mktime(00,00,01,$month,01,$year);
$chk_end = mktime(23,59,59,$month,$total_day,$year);

$sql = "select * from wiz_dayproduct wp, wiz_daycprelation wc where $catcode_sql $special_sql $display_sql $search_sql $coupon_sql $brand_sql $shortage_sql $stock_sql wc.prdcode = wp.prdcode and $chk_start < unix_timestamp(selldate) and unix_timestamp(selldate) < $chk_end";
$result = mysql_query($sql) or die($sql);



$arrProduct = "";	// 해당날짜 상품 정보
while($row = mysql_fetch_array($result)){
	$thisday = substr($row[selldate],8,2);

	$sql = "select count(orderid) as counter from wiz_dayorder where prdcode = '$row[prdcode]'";
	$result = mysql_query($sql)or die($sql);
	$rs = mysql_fetch_array($result);
	$buygoods = $rs[counter];


	if($arrProduct[$thisday] != ""){
		$arrProduct[$thisday] .= '|<table width="100%" height="108" border="0" cellpadding="0" cellspacing="0"><tr> <td align="center" valign="top"><table  width="90" height="78" border="0" cellpadding="0" cellspacing="0"><tr><td><img src="/data/prdimg/'.$row[prdimg_S1].'" width="102" height="72" border="0"/></td></tr></table><table width="100%" height="29" border="0" cellpadding="0" cellspacing="0"><tr> <td align="center"><font color="999999">'.$row[prdname].'</font></td></tr><tr><td align="center">구매인원 : '.$buygoods.'명</td></tr></table></td></tr></table>';
	}else{

		$arrProduct[$thisday] .= '<table width="100%" height="108" border="0" cellpadding="0" cellspacing="0"><tr> <td align="center" valign="top"><table  width="90" height="78" border="0" cellpadding="0" cellspacing="0"><tr><td><img src="/data/prdimg/'.$row[prdimg_S1].'" width="102" height="72" border="0"/></td></tr></table><table width="100%" height="29" border="0" cellpadding="0" cellspacing="0"><tr> <td align="center"><font color="999999">'.$row[prdname].'</font></td></tr><tr><td align="center">구매인원 : '.$buygoods.'명</td></tr></table></td></tr></table>';
	}
}

?>

<script>
function onSearch(formObj){

	formObj.submit();

}
</script>


<table width="1012" height="683" border="0" align="center" cellpadding="0" cellspacing="0">
	<tr> 
		<td valign="top"style="padding-left:33px; padding-top:40px;">
			<table  width="932" height="32" border="0" cellpadding="0" cellspacing="0">
				<tr> 
					<td valign="top"><img src="image/oneday_sch_title.gif" width="191" height="32"></td>
				</tr>
				<tr> 
					<td height="33" valign="top">&nbsp;</td>
				</tr>
			</table>
			<table width="932" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center" valign="top">
						<table  width="889" height="80" border="0" cellpadding="0" cellspacing="0">
							<tr> 
								<td width="296">
									<table  width="280" height="40" border="0" cellpadding="0" cellspacing="0">
										<tr> 
											<td width="53"><img src="image/oneday_t_01.gif" width="53" height="19"></td>
											<td width="227">
	<form name="searchForm" action="<?=$PHP_SELF?>" method="get">
												<select name="catcode" class="select" onchange="onSearch(this.form)">
													<option value="">전체</option>
<?
$sql = "select * from wiz_daycategory where depthno='1' and catuse!='N' order by priorno01 asc, priorno02 asc, priorno03 asc";
$result = mysql_query($sql)or die($sql);
while($row = mysql_fetch_array($result)){
?>
													<option value="<?=$row[catcode]?>" <?if($row[catcode] == $catcode){?>selected<?}?>><?=$row[catname]?></option>
<?
}
?>
												</select>
											</td>
										</tr>
									</table>
									<table width="280" height="40" border="0" cellpadding="0" cellspacing="0">
										<tr> 
											<td width="53" valign="top"><img src="image/oneday_t_02.gif" width="53" height="19"></td>
											<td width="227" valign="top">
												<select name="year" class="select" onchange="onSearch(this.form)">
													<option>:: 년 ::</option>
<?for($i=date("Y")-1; $i<=date("Y")+1; $i++){?>
													<option value="<?=$i?>" <?if($year==$i){?>selected<?}?>><?=$i?></option>
<?}?>
												</select> 년
												<select name="month" class="select" onchange="onSearch(this.form)">
													<option>:: 월 ::</option>
<?for($i=1; $i<=12; $i++){?>
													<option value="<?=$i?>" <?if($month==$i){?>selected<?}?>><?=$i?></option>
<?}?>
												</select> 월
		</form>
											</td>
										</tr>
									</table>
								</td>

<?
if(number_format($month)==1){
	$prevyear = $year -1;
	$nextyear = $year;
	$prevmonth = 12;
	$nextmonth = $month +1;
}else if(number_format($month)==12){
	$prevyear = $year;
	$nextyear = $year+1;
	$prevmonth = $month-1;
	$nextmonth = 1;
}else{
	$prevyear = $year;
	$nextyear = $year;
	$prevmonth = $month-1;
	$nextmonth = $month+1;
}


$year1 = substr($year,0,1);
$year2 = substr($year,1,1);
$year3 = substr($year,2,1);
$year4 = substr($year,3,1);


if(number_format($month) < 10){
	$month1 = "0";
	$month2 = number_format($month);
}else{
	$month1 = substr(number_format($month),0,1);
	$month2 = substr(number_format($month),1,1);
}
?>

								<td width="296" align="center">
									<table  width="208" height="37" border="0" cellpadding="0" cellspacing="0">
										<tr> 
											<td width="22"><a href="<?=$PHP_SELF?>?catcode=<?=$catcode?>&month=<?=$prevmonth?>&year=<?=$prevyear?>"><img src="image/b_rel.gif" width="22" height="22" border="0"></a></td>
											<td align="center">
												<img src="image/number/number_y<?=$year1?>.gif">
												<img src="image/number/number_y<?=$year2?>.gif">
												<img src="image/number/number_y<?=$year3?>.gif">
												<img src="image/number/number_y<?=$year4?>.gif">
												<img src="image/b_dot.gif" width="10" height="25">
												<img src="image/number/number_<?=$month1?>.gif" >
												<img src="image/number/number_<?=$month2?>.gif" >
											</td>
											<td width="22"><a href="<?=$PHP_SELF?>?catcode=<?=$catcode?>&month=<?=$nextmonth?>&year=<?=$nextyear?>"><img src="image/b_nex.gif" width="22" height="22" border="0"></a></td>
										</tr>
									</table>
								</td>
								<td width="296">&nbsp;</td>
							</tr>
						</table>
						<table width="889" height="406" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td align="center" valign="top">
									<table  width="889" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="#2E2E2E">
										<tr> 
											<td></td>
										</tr>
									</table>
									<table width="889" height="35" border="0" cellpadding="0" cellspacing="0" bgcolor="F9F9F9">
										<tr align="center"> 
											<td width="126"><strong><font color="FF0000">SUN</font></strong></td>
											<td width="1" bgcolor="E7E7E7"></td>
											<td width="126"><strong>MON</strong></td>
											<td width="1" bgcolor="E7E7E7"></td>
											<td width="126"><strong>TUE</strong></td>
											<td width="1" bgcolor="E7E7E7"></td>
											<td width="126"><strong>WED</strong></td>
											<td width="1" bgcolor="E7E7E7"></td>
											<td width="126"><strong>THU</strong></td>
											<td width="1" bgcolor="E7E7E7"></td>
											<td width="126"><strong>FRI</strong></td>
											<td width="1" bgcolor="E7E7E7"></td>
											<td width="126"><strong>SAT</strong></td>
										</tr>
									</table>
									<table width="889" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="E7E7E7">
										<tr>
											<td></td>
										</tr>
									</table>
									<table width="889" height="145" border="0" cellpadding="0" cellspacing="0" bgcolor="999999">
<?
if(($first_day > 5) && ((floor($total_day / 5) == 6) || (floor($total_day / 5) == 7))) {
	$line = 6;
	if($total_day == 30 && $first_day == 6) $line--;
} else if(($first_day == 1) && ($total_day == 28)) {
	$line = 4;
} else {
	$line = 5;
}




$k = 0;

for ($i=1; $i<=$line; $i++) {
	echo "<tr>";
	for ($j=1; $j<=7; $j++) {
		$day_sch = "";
		if ((!$day) && ($j == $first_day)) $day = 1;

		$day_color = "";
		if ($j == 7) $day_color = " class='satdayColor' ";
		if ($j == 1) $day_color = " class='sundayColor' ";
		if($yy."-".$mm."-".$day == date("Y-m-d")){
			$tdbgcolor = "#5BCE0E";
		}else{
			$tdbgcolor = "#FFFFFF";
		}


		if ($day > 0){
			if($schedule_list[$day]) $td_color = "#A1DE8D";
			else $td_color = "#FFFFFF";
			$day_img = "<img src='/admin/manage/image/schedule/day".$day."-".$day_color.".gif'>";
			$day_sch = "";

			for($k=0;$k<count($schedule_list[$day]);$k++){
				$day_sch .= "&nbsp;<a href='view.php?idx=".$schedule_list[$day][$k][idx].$param."'>".$schedule_list[$day][$k][subject]."</a><br>";
			}
		}else{
			$day_img = "";
		}


		if(strlen($day) == 1){
			$currentDate = $year."-".$month."-0".$day;
		}else{
			$currentDate = $year."-".$month."-".$day;
		}

		$tmp_day = $day;
		if(!strcmp($day, date('j')) && !strcmp($month, date('m'))) $day = "<strong>".$day."</strong>";


		echo	"<td  text-align:center;  width='126'>";

		echo '<table  width="126" height="145" border="0" cellpadding="5" cellspacing="4" bgcolor="'.$tdbgcolor.'">';
		echo '<tr> ';
		echo '<td valign="top" bgcolor="#FFFFFF">';
		echo '<table  width="100%" height="19" border="0" cellpadding="0" cellspacing="0">';
		echo '<tr> ';
		echo '<td width="16%"><strong>'.$day.'</strong></td>';
		echo '<td width="84%">&nbsp;</td>';
		echo '</tr>';
		echo '</table>';

		
		if($day != "" && $day != "&nbsp;"){
			if($arrProduct[strip_tags($day)]){
				$thisDayArrProduct = explode("|",$arrProduct[strip_tags($day)]);
				for($p=0; $p<count($thisDayArrProduct); $p++){
					echo $thisDayArrProduct[$p];
				}
			}else{	
				echo '<table width="100%" height="108" border="0" cellpadding="0" cellspacing="0">';
				echo '<tr>';
				echo '<td>&nbsp;</td>';
				echo '</tr>';
				echo '</table>';
			}
		}


		echo '</td></tr></table></td>'.chr(10);
		if($j != 7){
			echo '<td width="1" bgcolor="E7E7E7"></td>';
		}



	// 여기까지
		$day = $tmp_day;

		if ($day != $total_day) {
			if (($day > 0) && ($day < $total_day)) $day++;
		} else {
			$day = "&nbsp;";
		}
	}
	echo "</tr></table>";
	echo '<table width="889" height="1" border="0" cellpadding="0" cellspacing="0" bgcolor="E7E7E7"><tr> <td></td></tr></table>';
	echo '<table width="889" height="145" border="0" cellpadding="0" cellspacing="0" bgcolor="F9F9F9"><tr align="center"> ';
}
?>
										</tbody>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
<?
include "../inc/oneday_footer.inc"; 		// 하단디자인
?>