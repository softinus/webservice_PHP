<?php

// 원데이몰 카테고리정보

if($catcode == ""){
	$one_catlist = '<a href="/" style="color:#FF9900;"><strong>전체</strong></a><font color="">ㅣ</font>';
}else{
	$one_catlist = '<a href="/" style="color:#fff;">전체</a><font color="">ㅣ</font>';
}
$sql = "select * from wiz_daycategory where depthno='1' and catuse != 'N' order by priorno01 asc, priorno02 asc, priorno03 asc";
$result = mysql_query($sql)or die($sql);
$isFirst = true;
while($row = mysql_fetch_array($result)){
	if($catcode == $row[catcode]){
		if($isFirst){
			$one_catlist .= '<a href="'.$PHP_SELF.'?catcode='.$row[catcode].'" style="color:#FF9900;"><strong>'.$row[catname].'</strong></a>';
			$isFirst = false;
		}else{
			$one_catlist .= '<font color="">ㅣ</font><a href="'.$PHP_SELF.'?catcode='.$row[catcode].'" style="color:#FF9900;"><strong>'.$row[catname].'</strong></a>';
		}
	}else{
		if($isFirst){
			$one_catlist .= '<a href="'.$PHP_SELF.'?catcode='.$row[catcode].'" style="color:#fff">'.$row[catname].'</a>';
			$isFirst = false;
		}else{
			$one_catlist .= '<font color="">ㅣ</font><a href="'.$PHP_SELF.'?catcode='.$row[catcode].'" style="color:#fff">'.$row[catname].'</a>';
		}
	}

}


if($catcode){
	$cat_sql = "and wc.catcode like '$catcode%'"; // 지역별 검색
}



// 시간정보
$currentTime = time();
$currentDate = date("Y-m-d H:i:s", $currentTime);
if(empty($yy)) $yy = date("Y",$currentTime);
if(empty($mm)) $mm = date("m",$currentTime);
if(empty($dd)) $dd = date("d",$currentTime);
$hh = date("H",$currentTime);
$ii = date("i",$currentTime);
$ss = date("s",$currentTime);
$chk_start  = mktime(00,00,00,$mm,$dd,$yy);			// Query 체크 용 타임스탬프
$chk_end = mktime(23,59,59,$mm,$dd,$yy);			// Query 체크 용 타임스탬프

$chk_time = mktime($hh,$ii,$ss,$mm,$dd,$yy);


$total_day	= date("t", mktime(0, 0, 0, $mm, 1, $yy));

// 날짜이동정보

if($total_day == $dd){
	$prev_yy = $yy;
	$prev_mm = $mm;
	$prev_dd = $dd-1;
	if($mm == 12){
		$next_yy = $yy+1;
		$next_mm = 1;
		$next_dd = 1;
	}else{
		$next_yy = $yy;
		$next_mm = $mm+1;
		$next_dd = 1;
	}
}else if($dd==1){
	$next_yy = $yy;
	$next_mm = $mm;
	$next_dd = $dd+1;

	if($mm == 1){
		$prev_yy = $yy-1;
		$prev_mm = 12;
		$prev_dd = 31;
	}else{
		$prev_yy = $yy;
		$prev_mm = $mm-1;
		$prev_dd = date("t", mktime(0, 0, 0, $prev_mm, 1, $prev_yy));
	}
}else{
	$prev_yy = $yy;
	$prev_mm = $mm;
	$prev_dd = $dd-1;
	$next_yy = $yy;
	$next_mm = $mm;
	$next_dd = $dd+1;
}

$next_timestamp  = mktime(00,00,00,$next_mm,$next_dd,$next_yy);			// 다음날 타임스탬프정보
$param_prev = " onclick='location.href=\"".$PHP_SELF."?yy=".$prev_yy."&mm=".$prev_mm."&dd=".$prev_dd."\"'";
$param_next = " onclick='location.href=\"".$PHP_SELF."?yy=".$next_yy."&mm=".$next_mm."&dd=".$next_dd."\"'";

if($next_timestamp > $currentTime){
	$param_next = " onclick='alert(\"좋은 상품으로 다음날 찾아뵙겠습니다.\")'";
}




// 디스플레이용 날짜정보
if(strlen($mm)==1) $dis_mm= "0".$mm; else $dis_mm = $mm;
if(strlen($dd)==1) $dis_dd= "0".$dd; else $dis_dd = $dd;
if(strlen($hh)==1) $dis_hh= "0".$hh; else $dis_hh = $hh;
if(strlen($ii)==1) $dis_ii= "0".$ii; else $dis_ii = $ii;
if(strlen($ss)==1) $dis_ss= "0".$ss; else $dis_ss = $ss;


if($prdidx)	$prdsql	= " and wp.prdcode='".$prdidx."'";

// 오늘의 상품 정보 가져오기
$sql = "select * from wiz_dayproduct wp, wiz_daycprelation wc where $catcode_sql  wc.prdcode = wp.prdcode and $chk_time >= unix_timestamp(selldate) and unix_timestamp(selllastdate) > $chk_time $cat_sql $prdsql";


$result = mysql_query($sql)or die($sql);
$prd_row = mysql_fetch_array($result);
$prd_count = mysql_num_rows($result);


if($prd_count != 0){
	// 시간정보
	$selldate = $prd_row[selldate];
	$selllastdate = $prd_row[selllastdate];
	$starttime = $prd_row[starttime];
	$endtime = $prd_row[endtime];

	// 남은시간정보
	$end_selldate = substr($selllastdate,0,10)." ".$endtime;		// 판매종료 일시
	$end_selltime = mktime(substr($end_selldate,11,2), substr($end_selldate,14,2), substr($end_selldate,17,2), substr($end_selldate,5,2),substr($end_selldate,8,2),substr($end_selldate,0,4));
	//판매종료 타임스탬프
	$etime = $end_selltime - $currentTime; // 남은시간정보

	// 상품정보
	$prdcode = $prd_row[prdcode];		//상품코드
	$prdname = $prd_row[prdname];		//상품명
	$conprice = $prd_row[conprice];		//정상가
	$sellprice = $prd_row[sellprice];		//판매가
	$discount_per = $prd_row[discount_per];	//할인율
	$buy_mininum = $prd_row["buy_mininum "];				// 1인 최소 구매개수
	$buy_maxnum = $prd_row["buy_maxnum"];				// 1인 최대 구매개수
	$selllimit = $prd_row[selllimit];			//판매횟수 제한 타입

	$content = $prd_row[content];		// 상품정보
	$coupon_con = $prd_row[coupon_con];	// 쿠폰사용안내
	$shopguide = $prd_row[shopguide];	// 매장안내

	$abspath = $_SERVER[DOCUMENT_ROOT]."/data/prdimg"; 
	$imgpath = "/data/prdimg";


	$prdimg1 = $prd_row[prdimg_L1];
	$prdimg2 = $prd_row[prdimg_L2];
	$prdimg3 = $prd_row[prdimg_L3];
	$prdimg4 = $prd_row[prdimg_L4];
	$prdimg5 = $prd_row[prdimg_L5];

	if(@file($abspath."/".$prdimg1)){
		$mainImg1 = $imgpath."/".$prdimg1;
	}
	if(@file($abspath."/".$prdimg2)){
		$mainImg2 = $imgpath."/".$prdimg2;
	}
	if(@file($abspath."/".$prdimg3)){
		$mainImg3 = $imgpath."/".$prdimg3;
	}
	if(@file($abspath."/".$prdimg4)){
		$mainImg4 = $imgpath."/".$prdimg4;
	}
	if(@file($abspath."/".$prdimg5)){
		$mainImg5 = $imgpath."/".$prdimg5;
	}


	// 상품구매카운트
	$sql = "select sum(amount) as amount, count(orderid) as counter from wiz_dayorder where prdcode='$prdcode' group by prdcode";
	$stm = mysql_query($sql)or die($sql);
	$buy_row = mysql_fetch_array($stm);


	//구매조건
	if($selllimit == "personal"){
		$minBuyNo = $prd_row["personal_mininum"];		// 구매성사위한 최소인원수
		$maxBuyNo = $prd_row["personal_maxnum"]	;	// 구매성사후에 최대인원수(재고)
		$buy_counter = $buy_row[counter];
	}else{
		$minBuyNo = $prd_row["stock_mininum"];			// 구매성사위한 최소구매수
		$maxBuyNo = $prd_row["stock_maxnum"];			// 구매성사후에 최대구매수(재고)
		$buy_counter = $buy_row[amount];
	}
	if(empty($buy_counter)) $buy_counter = 0;
	$buy_counter = $buy_counter + $prd_row[addstock];


	if($minBuyNo==0) $minBuyNo = 1;
	$bar_width = (186/$minBuyNo) * $buy_counter;
	if($bar_width > 186){
		$bar_width = 186;		// 바 최대너비 200
	}
}


//원데이설정정보 - 주문버튼, 품절버튼 (시간)
$oneday_path = "/data/oneday/";
$button_buy = $oneday_path.$oper_info->button_buy;				// 구매버튼
$button_soldout = $oneday_path.$oper_info->button_soldout;		// 품절버튼
if($prdcode){
	if($chk_end < $currentTime){
		$button_img = $oneday_path.$oper_info->button_soldout;				// 시간도이 안지났으나 이전상품일시
		$msg = "onclick=\"alert('".$oper_info->timemsg."')\"";
		$buyStatus = "N";
	}else{
		$button_img = $oneday_path.$oper_info->button_buy;				// 정상 구매
		$msg = "onclick='order()';";
		$buyStatus = "Y";
	}
}else{
	$button_img = $oneday_path.$oper_info->button_soldout;					// 상품이 없을때
	$msg = "onclick=\"alert('".$oper_info->timemsg."')\"";
	$buyStatus = "N";
}




//원데이설정정보 - 주문버튼, 품절버튼 (재고)
if($buyStatus != "N"){
	if($prdcode){
		if($maxBuyNo <= $buy_counter){
			$button_img = $oneday_path.$oper_info->button_soldout;				// 상품을 다 판매했을시
		$msg = "onclick=\"alert('".$oper_info->countmsg."')\"";
		}else{
			$button_img = $oneday_path.$oper_info->button_buy;				// 정상 구매
			$msg = "onclick='order();'";
		}
	}else{
		$button_img = $oneday_path.$oper_info->button_soldout;					// 상품이 없을때
		$msg = "onclick=\"alert('".$oper_info->countmsg."')\"";
	}
}
?>
