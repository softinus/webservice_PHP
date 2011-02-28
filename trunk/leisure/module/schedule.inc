<?
$sch_code = "schedule";
include_once "$DOCUMENT_ROOT/inc/common.inc";
include_once "$DOCUMENT_ROOT/inc/sch_info.inc";

if(!empty($_GET[idx])) $param = "&idx=$_GET[idx]";
if(!empty($_GET[code])) $param .= "&code=$_GET[code]";
if(!empty($_GET[prdcode])) $param .= "&prdcode=$_GET[prdcode]";
if(!empty($_GET[catcode])) $param .= "&catcode=$_GET[catcode]";

if (!$year) { $year	= date("Y"); $month	= date("m"); }

$prev_sch = date("Y-m",mktime(0,0,0,$month-1,1,$year));
$prevArray = split("-",$prev_sch);
$prevYear = $prevArray[0];
$prevMonth = $prevArray[1];

$next_sch = date("Y-m",mktime(0,0,0,$month+1,1,$year));
$nextArray = split("-",$next_sch);
$nextYear = $nextArray[0];
$nextMonth = $nextArray[1];

$nnext = date("Y-m",mktime(0,0,0,$month+2,1,$year));
$nnextArray = split("-",$nnext);
$nnextYear = $nnextArray[0];
$nnextMonth = $nnextArray[1];

$first_day	= date("w",mktime(0,0,0,$month,1,$year)) + 1;
$total_day	= date("t", mktime(0, 0, 0, $month, 1, $year));

$start_month	= $year."-".$month."-01";
$last_month = $year."-".$month."-".$total_day;

// 스케쥴 가져오기
$sql = "select *, from_unixtime(wdate, '%e') as day_idx from wiz_bbs where code='$code' and from_unixtime(wdate, '%Y-%m-%d') between '$start_month' and '$last_month' order by wdate";
$result = mysql_query($sql);

$day_bak = "";
while ($row = mysql_fetch_array($result)) {

	$day_idx = $row[day_idx];
	if($day_bak == $day_idx) $seq_idx++;
	else $seq_idx = 0;
	$day_bak = $day_idx;

	$schedule_list[$day_idx][$seq_idx][subject] = $row[subject];
	$schedule_list[$day_idx][$seq_idx][idx] = $row[idx];

}

// 버튼설정
$prev_btn = "<a href='".$PHP_SELF."?year=".$prevYear."&month=".$prevMonth.$param."'><img border=0 src='".$skin_dir."/image/s_prev.gif'></a>";
$next_btn = "<a href='".$PHP_SELF."?year=".$nextYear."&month=".$nextMonth.$param."'><img border=0 src='".$skin_dir."/image/s_next.gif'></a>";
$sch_url = " onClick=\"document.location='/schedule/list.php?code=".$code."&year=".$year."&month=".$month."'\";";

$schedule = "

<table width='174' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td><img src='".$skin_dir."/image/main_top_line.gif'></td>
  </tr>
  <tr>
    <td align='center' background='".$skin_dir."/image/main_bg.gif' style='padding-top:5px;padding-bottom:5px'>

			<table border='0' cellpadding='0' cellspacing='0' width='147' id='table1'>
				<tr>
					<td width='148'>
						<div align='center'>
							<table border='0' cellpadding='0' cellspacing='0' id='table2'>
								<tr>
									<td width='15' style='padding-top: 2px'>".$prev_btn."</td>
									<td width='40' class='c_date'>".$year.".".$month."</td>
									<td width='16' style='padding-top: 2px'>".$next_btn."</td>
								</tr>
							</table>
				  </div></td>
				</tr>
				<tr>
					<td height='5'></td>
				</tr>
				<tr>
					<td> <img border='0' src='".$skin_dir."/image/date.gif' height='13'></td>
				</tr>
				<tr>
					<td>
						<table border='0' cellpadding='0' cellspacing='0' width='100%' id='table3'>";

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

							$schedule .= "<tr height='".$cell_height."'>";

							for ($j=1; $j<=7; $j++) {
								if ((!$day) && ($j == $first_day)) $day = 1;

								$day_color = "black";
								if ($j == 7) $day_color = "blue";
								if ($j == 1) $day_color = "red";

								if ($day > 0){

									if($schedule_list[$day]) $td_color = "#A1DE8D";
									else $td_color = "#FFFFFF";

								  $day_sch = "";
								  for($k=0;$k<count($schedule_list[$day]);$k++){
								  	if($k==0) $day_sch = $schedule_list[$day][$k][subject];
									  else $day_sch .= "\n".$schedule_list[$day][$k][subject];
									}

									$tmp_day = $day;
									if(!strcmp($day, date('j')) && !strcmp($month, date('m'))) $day = "<b>".$day."</b>";

									$schedule .= "<td bgcolor='".$td_color."' width='21' height='17' class='c_nor' align='center'>
																	<font color='".$day_color."' title='".$day_sch."' style='cursor:hand'; ".$sch_url.">".$day."</font>
																</td>";

									$day = $tmp_day;
									
								}else{

									$schedule .= "<td bgcolor=#ffffff></td>";
								}

								if ($day != $total_day) {
									if (($day > 0) && ($day < $total_day)) $day++;
								} else {
									$day = "&nbsp;";
								}
							}
							$schedule .= "</tr>";
						}


$schedule .= "

						</table>
					</td>
				</tr>
			</table>

    </td>
  </tr>
  <tr>
    <td><img src='".$skin_dir."/image/main_bottom_line.gif'></td>
  </tr>
</table>
";
$schedule_list = null;
?>