<?php

// �����̸� ī�װ�������

if($catcode == ""){
	$one_catlist = '<a href="/" style="color:#FF9900;"><strong>��ü</strong></a><font color="">��</font>';
}else{
	$one_catlist = '<a href="/" style="color:#fff;">��ü</a><font color="">��</font>';
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
			$one_catlist .= '<font color="">��</font><a href="'.$PHP_SELF.'?catcode='.$row[catcode].'" style="color:#FF9900;"><strong>'.$row[catname].'</strong></a>';
		}
	}else{
		if($isFirst){
			$one_catlist .= '<a href="'.$PHP_SELF.'?catcode='.$row[catcode].'" style="color:#fff">'.$row[catname].'</a>';
			$isFirst = false;
		}else{
			$one_catlist .= '<font color="">��</font><a href="'.$PHP_SELF.'?catcode='.$row[catcode].'" style="color:#fff">'.$row[catname].'</a>';
		}
	}

}


if($catcode){
	$cat_sql = "and wc.catcode like '$catcode%'"; // ������ �˻�
}



// �ð�����
$currentTime = time();
$currentDate = date("Y-m-d H:i:s", $currentTime);
if(empty($yy)) $yy = date("Y",$currentTime);
if(empty($mm)) $mm = date("m",$currentTime);
if(empty($dd)) $dd = date("d",$currentTime);
$hh = date("H",$currentTime);
$ii = date("i",$currentTime);
$ss = date("s",$currentTime);
$chk_start  = mktime(00,00,00,$mm,$dd,$yy);			// Query üũ �� Ÿ�ӽ�����
$chk_end = mktime(23,59,59,$mm,$dd,$yy);			// Query üũ �� Ÿ�ӽ�����

$chk_time = mktime($hh,$ii,$ss,$mm,$dd,$yy);


$total_day	= date("t", mktime(0, 0, 0, $mm, 1, $yy));

// ��¥�̵�����

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

$next_timestamp  = mktime(00,00,00,$next_mm,$next_dd,$next_yy);			// ������ Ÿ�ӽ���������
$param_prev = " onclick='location.href=\"".$PHP_SELF."?yy=".$prev_yy."&mm=".$prev_mm."&dd=".$prev_dd."\"'";
$param_next = " onclick='location.href=\"".$PHP_SELF."?yy=".$next_yy."&mm=".$next_mm."&dd=".$next_dd."\"'";

if($next_timestamp > $currentTime){
	$param_next = " onclick='alert(\"���� ��ǰ���� ������ ã�ƺ˰ڽ��ϴ�.\")'";
}




// ���÷��̿� ��¥����
if(strlen($mm)==1) $dis_mm= "0".$mm; else $dis_mm = $mm;
if(strlen($dd)==1) $dis_dd= "0".$dd; else $dis_dd = $dd;
if(strlen($hh)==1) $dis_hh= "0".$hh; else $dis_hh = $hh;
if(strlen($ii)==1) $dis_ii= "0".$ii; else $dis_ii = $ii;
if(strlen($ss)==1) $dis_ss= "0".$ss; else $dis_ss = $ss;


if($prdidx)	$prdsql	= " and wp.prdcode='".$prdidx."'";

// ������ ��ǰ ���� ��������
$sql = "select * from wiz_dayproduct wp, wiz_daycprelation wc where $catcode_sql  wc.prdcode = wp.prdcode and $chk_time >= unix_timestamp(selldate) and unix_timestamp(selllastdate) > $chk_time $cat_sql $prdsql";


$result = mysql_query($sql)or die($sql);
$prd_row = mysql_fetch_array($result);
$prd_count = mysql_num_rows($result);


if($prd_count != 0){
	// �ð�����
	$selldate = $prd_row[selldate];
	$selllastdate = $prd_row[selllastdate];
	$starttime = $prd_row[starttime];
	$endtime = $prd_row[endtime];

	// �����ð�����
	$end_selldate = substr($selllastdate,0,10)." ".$endtime;		// �Ǹ����� �Ͻ�
	$end_selltime = mktime(substr($end_selldate,11,2), substr($end_selldate,14,2), substr($end_selldate,17,2), substr($end_selldate,5,2),substr($end_selldate,8,2),substr($end_selldate,0,4));
	//�Ǹ����� Ÿ�ӽ�����
	$etime = $end_selltime - $currentTime; // �����ð�����

	// ��ǰ����
	$prdcode = $prd_row[prdcode];		//��ǰ�ڵ�
	$prdname = $prd_row[prdname];		//��ǰ��
	$conprice = $prd_row[conprice];		//����
	$sellprice = $prd_row[sellprice];		//�ǸŰ�
	$discount_per = $prd_row[discount_per];	//������
	$buy_mininum = $prd_row["buy_mininum "];				// 1�� �ּ� ���Ű���
	$buy_maxnum = $prd_row["buy_maxnum"];				// 1�� �ִ� ���Ű���
	$selllimit = $prd_row[selllimit];			//�Ǹ�Ƚ�� ���� Ÿ��

	$content = $prd_row[content];		// ��ǰ����
	$coupon_con = $prd_row[coupon_con];	// �������ȳ�
	$shopguide = $prd_row[shopguide];	// ����ȳ�

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


	// ��ǰ����ī��Ʈ
	$sql = "select sum(amount) as amount, count(orderid) as counter from wiz_dayorder where prdcode='$prdcode' group by prdcode";
	$stm = mysql_query($sql)or die($sql);
	$buy_row = mysql_fetch_array($stm);


	//��������
	if($selllimit == "personal"){
		$minBuyNo = $prd_row["personal_mininum"];		// ���ż������� �ּ��ο���
		$maxBuyNo = $prd_row["personal_maxnum"]	;	// ���ż����Ŀ� �ִ��ο���(���)
		$buy_counter = $buy_row[counter];
	}else{
		$minBuyNo = $prd_row["stock_mininum"];			// ���ż������� �ּұ��ż�
		$maxBuyNo = $prd_row["stock_maxnum"];			// ���ż����Ŀ� �ִ뱸�ż�(���)
		$buy_counter = $buy_row[amount];
	}
	if(empty($buy_counter)) $buy_counter = 0;
	$buy_counter = $buy_counter + $prd_row[addstock];


	if($minBuyNo==0) $minBuyNo = 1;
	$bar_width = (186/$minBuyNo) * $buy_counter;
	if($bar_width > 186){
		$bar_width = 186;		// �� �ִ�ʺ� 200
	}
}


//�����̼������� - �ֹ���ư, ǰ����ư (�ð�)
$oneday_path = "/data/oneday/";
$button_buy = $oneday_path.$oper_info->button_buy;				// ���Ź�ư
$button_soldout = $oneday_path.$oper_info->button_soldout;		// ǰ����ư
if($prdcode){
	if($chk_end < $currentTime){
		$button_img = $oneday_path.$oper_info->button_soldout;				// �ð����� ���������� ������ǰ�Ͻ�
		$msg = "onclick=\"alert('".$oper_info->timemsg."')\"";
		$buyStatus = "N";
	}else{
		$button_img = $oneday_path.$oper_info->button_buy;				// ���� ����
		$msg = "onclick='order()';";
		$buyStatus = "Y";
	}
}else{
	$button_img = $oneday_path.$oper_info->button_soldout;					// ��ǰ�� ������
	$msg = "onclick=\"alert('".$oper_info->timemsg."')\"";
	$buyStatus = "N";
}




//�����̼������� - �ֹ���ư, ǰ����ư (���)
if($buyStatus != "N"){
	if($prdcode){
		if($maxBuyNo <= $buy_counter){
			$button_img = $oneday_path.$oper_info->button_soldout;				// ��ǰ�� �� �Ǹ�������
		$msg = "onclick=\"alert('".$oper_info->countmsg."')\"";
		}else{
			$button_img = $oneday_path.$oper_info->button_buy;				// ���� ����
			$msg = "onclick='order();'";
		}
	}else{
		$button_img = $oneday_path.$oper_info->button_soldout;					// ��ǰ�� ������
		$msg = "onclick=\"alert('".$oper_info->countmsg."')\"";
	}
}
?>