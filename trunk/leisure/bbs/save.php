<?

include "../inc/common.inc"; 			// DB���ؼ�, ������ �ľ�
include "../inc/util.inc";		// util lib

$code = $_REQUEST["code"];

include "../inc/bbs_info.inc"; 	 	// �Խ��� ����

$upfile_path = "../data/bbs/".$code;				// ���ε����� ��ġ

// �˻� �Ķ����
$param = "code=$code";
if($page != "") $param .= "&page=$page";
if($searchkey != "") $param .= "&searchopt=$searchopt&searchkey=$searchkey";
if($flag=="self") $param .= "&flag=$flag";


if(empty($hphone)){
	$hphone = $hphone1."-".$hphone2."-".$hphone3;
}

function encodeAndUTF8($data){
	return iconv("EUC-KR","UTF-8",$data);
}
function encodeAndEUCKR($data){
	return iconv("UTF-8","EUC-KR",$data);
}


//SQL �Է°� ���ڿ� ����
$name = sql_filter($_POST["name"]);
$email = sql_filter($_POST["email"]);
$tphone = sql_filter($_POST["tphone"]);
$hphone = sql_filter($_POST["hphone"]);
$zipcode = sql_filter($_POST["zipcode"]);
$address = sql_filter($_POST["address"]);
$subject = sql_filter($_POST["subject"]);
$content = sql_filter($_POST["content"]);
$reply = sql_filter($_POST["reply"]);

$addinfo1 = sql_filter($_POST["addinfo1"]);
$addinfo2 = sql_filter($_POST["addinfo2"]);
$addinfo3 = sql_filter($_POST["addinfo3"]);
$addinfo4 = sql_filter($_POST["addinfo4"]);
$addinfo5 = sql_filter($_POST["addinfo5"]);



////////////////////////////////////////////////////////////////////////////////
// ���ۼ�
////////////////////////////////////////////////////////////////////////////////
if($mode == "write"){

	// ���Ա� ����
	$pos = strpos($HTTP_REFERER, $HTTP_HOST);
  if($pos === false) error("�߸��� ��� �Դϴ�.");
/*
  if(!strcmp($bbs_info[spam_check], "Y")) {

	  // �ڵ���Ϲ��� �ڵ� �˻�
	  if(empty($_POST[tmp_vcode]) || empty($_POST[vcode])) {
	  	error("�ڵ���Ϲ��� �ڵ尡 �������� �ʽ��ϴ�.");
	  } else if(strcmp($_POST[tmp_vcode], md5($_POST[vcode]))) {
	  	error("�ڵ���Ϲ��� �ڵ尡 ��ġ���� �ʽ��ϴ�.");
	  }
	}
*/
	// �ۼ����� üũ
	/*
	if($wpermi < $mem_level) {

		// ����ȸ�� üũ
		if(!strcmp($wpermi, "-1")) {

			$sql = "select count(idx) as cnt from wiz_basket as wb left join wiz_order as wo on wb.orderid = wo.orderid
							where wb.prdcode = '$prdcode' and wo.status = 'DC'";
			$result = mysql_query($sql) or error(mysql_error());
			$row = mysql_fetch_array($result);

			if($row[cnt] <= 0) {
				error($bbs_info[permsg],$bbs_info[perurl]);
			}

		} else {
			error($bbs_info[permsg],$bbs_info[perurl]);
		}
	}
*/
	// �弳üũ
	check_abuse($subject); check_abuse($content);

	include "./upfile.inc";		// ÷������ ���ε�

	// �Էµ�����
	$memid = $wiz_session[id];
	$memgrp = $wiz_session[id];
	$name = str_replace("\"","&quot;",$name);
	$subject = str_replace("\"","&quot;",$subject);
	if($passwd == "") $passwd = $wiz_session[passwd];
	if($bbs_info[editor] == "Y") $ctype = "H";


	$sql = "select max(prino) as prino from wiz_bbs where code = '$code'";
	$result = mysql_query($sql) or error(mysql_error());
	if($row = mysql_fetch_array($result)){
		$prino = $row[prino] + 1;
	}
	$grpno = $prino;

	if($writemode=="action"){
	$sql = encodeAndEUCKR("insert into wiz_bbs(idx,prdcode,code,prino,grpno,depno,star,notice,category,memid,memgrp,name,email,tphone,hphone,zipcode,address,subject,content,addinfo1,addinfo2,addinfo3,addinfo4,addinfo5,ctype,privacy,upfile1,upfile2,upfile3,upfile4,upfile5,upfile6,upfile7,upfile8,upfile9,upfile10,upfile11,upfile12,upfile1_name,upfile2_name,upfile3_name,upfile4_name,upfile5_name,upfile6_name,upfile7_name,upfile8_name,upfile9_name,upfile10_name,upfile11_name,upfile12_name,movie1,movie2,movie3,passwd,count,recom,comment,ip,wdate)
					values('','$prdcode','$code','$prino','$grpno','$depno','$star','$notice','$category','$memid','$memgrp','$name','$email','$tphone','$hphone','$zipcode','$address','$subject','$content','$addinfo1','$addinfo2','$addinfo3','$addinfo4','$addinfo5','$ctype','$privacy','$upfile1_tmp','$upfile2_tmp','$upfile3_tmp','$upfile4_tmp','$upfile5_tmp','$upfile6_tmp','$upfile7_tmp','$upfile8_tmp','$upfile9_tmp','$upfile10_tmp','$upfile11_tmp','$upfile12_tmp','$upfile1_name','$upfile2_name','$upfile3_name','$upfile4_name','$upfile5_name','$upfile6_name','$upfile7_name','$upfile8_name','$upfile9_name','$upfile10_name','$upfile11_name','$upfile12_name',
					'$movie1_tmp','$movie2','$movie3','$passwd','$count','$recom','$comment','$REMOTE_ADDR',unix_timestamp('".date('Y-m-d H:i:s')."'))");
	}else{
	$sql = "insert into wiz_bbs(idx,prdcode,code,prino,grpno,depno,star,notice,category,memid,memgrp,name,email,tphone,hphone,zipcode,address,subject,content,addinfo1,addinfo2,addinfo3,addinfo4,addinfo5,ctype,privacy,upfile1,upfile2,upfile3,upfile4,upfile5,upfile6,upfile7,upfile8,upfile9,upfile10,upfile11,upfile12,upfile1_name,upfile2_name,upfile3_name,upfile4_name,upfile5_name,upfile6_name,upfile7_name,upfile8_name,upfile9_name,upfile10_name,upfile11_name,upfile12_name,movie1,movie2,movie3,passwd,count,recom,comment,ip,wdate)
					values('','$prdcode','$code','$prino','$grpno','$depno','$star','$notice','$category','$memid','$memgrp','$name','$email','$tphone','$hphone','$zipcode','$address','$subject','$content','$addinfo1','$addinfo2','$addinfo3','$addinfo4','$addinfo5','$ctype','$privacy','$upfile1_tmp','$upfile2_tmp','$upfile3_tmp','$upfile4_tmp','$upfile5_tmp','$upfile6_tmp','$upfile7_tmp','$upfile8_tmp','$upfile9_tmp','$upfile10_tmp','$upfile11_tmp','$upfile12_tmp','$upfile1_name','$upfile2_name','$upfile3_name','$upfile4_name','$upfile5_name','$upfile6_name','$upfile7_name','$upfile8_name','$upfile9_name','$upfile10_name','$upfile11_name','$upfile12_name',
					'$movie1_tmp','$movie2','$movie3','$passwd','$count','$recom','$comment','$REMOTE_ADDR',unix_timestamp('".date('Y-m-d H:i:s')."'))";
	}
	mysql_query($sql) or error(mysql_error());
	if($writemode=="action"){
		$sql = "select * from wiz_bbs where prdcode='$prdcode' and depno='0' order by wdate desc limit 0,$cmt_limit";
		$result = mysql_query($sql)or die($sql);
		
		header("Content-type:text/xml");
		echo"<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n";
	?>
	<clist>
	<?
		while($row=mysql_fetch_array($result)){
			$name = encodeAndUTF8($row[name]);
			$content = encodeAndUTF8($row[content]);
			$wdate = date("Y.m.d H:i:s",$row[wdate]);
			$prdcode = $row[prdcode];
			$memid = $wiz_session[id];
			$mname = encodeAndUTF8($wiz_session[name]);
			$idx = $row[idx];
			$writeid = $row[memid];
			$star = $row[star];
			if(empty($star)){
				$star = 1;
			}
	?>
		<con idx="<?=$row[idx]?>" prdcode="<?=$prdcode?>" sname="<?=$mname?>" smemid="<?=$memid?>" writeid="<?=$writeid?>" star="<?=$star?>">
			<cname><?=$name?></cname>
			<cdate><?=$wdate?></cdate>
			<content><?=$content?></content>
	<?
			$sql = "select * from wiz_bbs where prdcode='$prdcode' and depno='1' and grpno='$idx' order by wdate asc";
			$stm = mysql_query($sql)or die($sql);
			while($rs=mysql_fetch_array($stm)){
				$rename = encodeAndUTF8($rs[name]);
				$recontent = encodeAndUTF8($rs[content]);
				$rewdate = date("Y.m.d H:i:s",$rs[wdate]);
				$idx = $rs[idx];
				$rewriteid = $rs["memid"];
			?>
			<conrelist idx="<?=$idx?>" smemid="<?=$memid?>" rewriteid="<?=$rewriteid?>">
				<crename><?=$rename?></crename>
				<credate><?=$rewdate?></credate>
				<recontent><?=$recontent?></recontent>
			</conrelist>
			<?
			}
			?>
		</con>
		<?
		}
	?>
	</clist>
	<?

	}else{
		if($code!="reco" && $code!="center"){
			echo "<script>document.location='list.php?code=$code&flag=$flag';</script>";
		}else{
			echo "<script>alert('���������� �ۼ� �Ǿ����ϴ�.');document.location='/index.php';</script>";
		}
	}

////////////////////////////////////////////////////////////////////////////////
// �Խù� ����
////////////////////////////////////////////////////////////////////////////////
}else if($mode == "modify"){

	$sql = "select memid,passwd from wiz_bbs where idx = '$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$bbs_row = mysql_fetch_array($result);


	// �������� üũ
	if(
		$mem_level == "0" || 																																				// ��ü������
		($bbs_info[bbsadmin] != "" && strpos($bbs_info[bbsadmin],$wiz_session[id]) !== false)  ||		// �Խ��ǰ�����
		($bbs_row[memid] != "" && $bbs_row[memid] == $wiz_session[id]) || 													// �ڽ��Ǳ�
		($bbs_row[passwd] != "" && $bbs_row[passwd] == $passwd)																			// ��й�ȣ��ġ
	){
	}else{
		error("��й�ȣ�� ��ġ���� �ʽ��ϴ�.");
	}


	// ÷������ ���ε�
	include "./upfile.inc";

	// �Էµ�����
	$name = str_replace("\"","&quot;",$name);
	$subject = str_replace("\"","&quot;",$subject);
	if($bbs_info[editor] == "Y") $ctype = "H";

	$sql = "update wiz_bbs set star='$star',notice='$notice',category='$category',name='$name',email='$email',tphone='$tphone',hphone='$hphone',zipcode='$zipcode',address='$address',subject='$subject',content='$content',addinfo1='$addinfo1',addinfo2='$addinfo2',addinfo3='$addinfo3',addinfo4='$addinfo4',addinfo5='$addinfo5',ctype='$ctype',privacy='$privacy' $upfile_sql $movie1_sql,movie2='$movie2',movie3='$movie3' where idx = '$idx'";
	mysql_query($sql) or error(mysql_error());

	if($privacy == "Y" && ($bbs_row[memid] == "" || $wiz_session[id] == "")) $param .= "&passwd=$passwd";

	comalert("���� �Ǿ����ϴ�.","view.php?idx=$idx&$param");




////////////////////////////////////////////////////////////////////////////////
// ����ۼ�
////////////////////////////////////////////////////////////////////////////////
}else if($mode == "reply"){

	// ���Ա� ����
	$pos = strpos($HTTP_REFERER, $HTTP_HOST);
  if($pos === false) error("�߸��� ��� �Դϴ�.");
/*
  if(!strcmp($bbs_info[spam_check], "Y")) {

	  // �ڵ���Ϲ��� �ڵ� �˻�
	  if(empty($_POST[tmp_vcode]) || empty($_POST[vcode])) {
	  	error("�ڵ���Ϲ��� �ڵ尡 �������� �ʽ��ϴ�.");
	  } else if(strcmp($_POST[tmp_vcode], md5($_POST[vcode]))) {
	  	error("�ڵ���Ϲ��� �ڵ尡 ��ġ���� �ʽ��ϴ�.");
	  }
	}
*/
	// �ۼ����� üũ
	if($apermi < $mem_level) error($bbs_info[permsg],$bbs_info[perurl]);

	// �弳üũ
	check_abuse($subject); check_abuse($content);

	include "./upfile.inc";		// ÷������ ���ε�

	$sql = "select idx,prdcode,grpno,prino,depno,memid,memgrp,name,email from wiz_bbs where idx='$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_array($result);
	$re_name = $row[name];
	$re_email = $row[email];

	$grpno = $row[idx];
	$prino = $row[prino];
	$depno = ++$row[depno];

	$prdcode = $row[prdcode];

	// �Էµ���Ÿ
	$memid = $wiz_session[id];
	$memgrp = $row[memgrp].",".$memid;
	if($privacy == "Y") $memid = $row[memid];
	$name = str_replace("\"","&quot;",$name);
	$subject = str_replace("\"","&quot;",$subject);
	if($passwd == "") $passwd = $wiz_session[passwd];
	if($bbs_info[editor] == "Y") $ctype = "H";

	$sql = "update wiz_bbs set prino = prino+1 where code = '$code' and prino >= '$prino'";
	$result = mysql_query($sql) or error(mysql_error());

	$sql = "update wiz_bbs set memgrp=concat(memgrp,',','$memid') where idx='$idx' or grpno='$idx'";
	$result = mysql_query($sql) or error(mysql_error());

if($writemode =="action"){
	$sql = encodeAndEUCKR("insert into wiz_bbs(idx,prdcode,code,grpno,prino,depno,star,notice,category,memid,memgrp,name,email,tphone,hphone,zipcode,address,subject,content,addinfo1,addinfo2,addinfo3,addinfo4,addinfo5,ctype,privacy,upfile1,upfile2,upfile3,upfile4,upfile5,upfile6,upfile7,upfile8,upfile9,upfile10,upfile11,upfile12,upfile1_name,upfile2_name,upfile3_name,upfile4_name,upfile5_name,upfile6_name,upfile7_name,upfile8_name,upfile9_name,upfile10_name,upfile11_name,upfile12_name,movie1,movie2,movie3,passwd,count,recom,comment,ip,wdate)
					values('','$prdcode','$code','$grpno','$prino','$depno','$star','$notice','$category','$memid','$memgrp','$name','$email','$tphone','$hphone','$zipcode','$address','$subject','$content','$addinfo1','$addinfo2','$addinfo3','$addinfo4','$addinfo5','$ctype','$privacy','$upfile1_tmp','$upfile2_tmp','$upfile3_tmp','$upfile4_tmp','$upfile5_tmp','$upfile6_tmp','$upfile7_tmp','$upfile8_tmp','$upfile9_tmp','$upfile10_tmp','$upfile11_tmp','$upfile12_tmp','$upfile1_name','$upfile2_name','$upfile3_name','$upfile4_name','$upfile5_name','$upfile6_name','$upfile7_name','$upfile8_name','$upfile9_name','$upfile10_name','$upfile11_name','$upfile12_name',
					'$movie1_tmp','$movie2','$movie3','$passwd','$count','$recom','$comment','$REMOTE_ADDR',unix_timestamp('".date('Y-m-d H:i:s')."'))");
}else{
	$sql = "insert into wiz_bbs(idx,prdcode,code,grpno,prino,depno,star,notice,category,memid,memgrp,name,email,tphone,hphone,zipcode,address,subject,content,addinfo1,addinfo2,addinfo3,addinfo4,addinfo5,ctype,privacy,upfile1,upfile2,upfile3,upfile4,upfile5,upfile6,upfile7,upfile8,upfile9,upfile10,upfile11,upfile12,upfile1_name,upfile2_name,upfile3_name,upfile4_name,upfile5_name,upfile6_name,upfile7_name,upfile8_name,upfile9_name,upfile10_name,upfile11_name,upfile12_name,movie1,movie2,movie3,passwd,count,recom,comment,ip,wdate)
					values('','$prdcode','$code','$grpno','$prino','$depno','$star','$notice','$category','$memid','$memgrp','$name','$email','$tphone','$hphone','$zipcode','$address','$subject','$content','$addinfo1','$addinfo2','$addinfo3','$addinfo4','$addinfo5','$ctype','$privacy','$upfile1_tmp','$upfile2_tmp','$upfile3_tmp','$upfile4_tmp','$upfile5_tmp','$upfile6_tmp','$upfile7_tmp','$upfile8_tmp','$upfile9_tmp','$upfile10_tmp','$upfile11_tmp','$upfile12_tmp','$upfile1_name','$upfile2_name','$upfile3_name','$upfile4_name','$upfile5_name','$upfile6_name','$upfile7_name','$upfile8_name','$upfile9_name','$upfile10_name','$upfile11_name','$upfile12_name',
					'$movie1_tmp','$movie2','$movie3','$passwd','$count','$recom','$comment','$REMOTE_ADDR',unix_timestamp('".date('Y-m-d H:i:s')."'))";
}
	mysql_query($sql) or error(mysql_error());

if($writemode=="action"){
	$sql = "select * from wiz_bbs where prdcode='$prdcode' and depno='0' order by wdate desc limit 0,$cmt_limit";
	$result = mysql_query($sql)or die($sql);
	
	header("Content-type:text/xml");
	echo"<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n";
?>
<clist>
<?
	while($row=mysql_fetch_array($result)){
		//$name = encodeAndUTF8($row[name]);
		$name = encodeAndUTF8($row[name]);
		$content = encodeAndUTF8($row[content]);
		$wdate = date("Y.m.d H:i:s",$row[wdate]);
		$idx = $row[idx];
		$prdcode = $row[prdcode];
		$memid = $wiz_session[id];
		$writeid = $row[memid];
		$star = $row[star];
		if(empty($star)){
			$star = 1;
		}
?>
		<con idx="<?=$row[idx]?>" prdcode="<?=$prdcode?>" sname="<?=$name?>" smemid="<?=$memid?>" writeid="<?=$writeid?>" star="<?=$star?>">
		<cname><?=$name?></cname>
		<cdate><?=$wdate?></cdate>
		<content><?=$content?></content>
<?
		$sql = "select * from wiz_bbs where prdcode='$prdcode' and depno='1' and grpno='$idx' order by wdate desc";
		$stm = mysql_query($sql)or die($sql);
		while($rs=mysql_fetch_array($stm)){
			$rename = encodeAndUTF8($rs[name]);
			$recontent = encodeAndUTF8($rs[content]);
			$rewdate = date("Y.m.d H:i:s",$rs[wdate]);
			$idx = $rs[idx];
			$rewriteid = $rs["memid"]
		?>
		<conrelist idx="<?=$idx?>" smemid="<?=$memid?>" rewriteid="<?=$rewriteid?>">
			<crename><?=$rename?></crename>
			<credate><?=$rewdate?></credate>
			<recontent><?=$recontent?></recontent>
		</conrelist>
		<?
		}
		?>
	</con>
	<?
	}
?>
</clist>
<?
}else{
	echo "<script>document.location='list.php?$param';</script>";
}

////////////////////////////////////////////////////////////////////////////////
// �Խù� ����
////////////////////////////////////////////////////////////////////////////////
}else if($mode == "delete"){

	$param = "yy=".$yy."&mm=".$mm."&dd=".$dd."&prdidx=".$prdidx;

//encodeAndEUCKR
	if($writemode=="action"){

		$sql = encodeAndEUCKR("select memid,passwd,upfile1,upfile2,upfile3,upfile4,upfile5,upfile6,upfile7,upfile8,upfile9,upfile10,upfile11,upfile12,movie1 from wiz_bbs where idx = '$idx'");
		$result = mysql_query($sql) or error(mysql_error());
		$bbs_row = mysql_fetch_array($result);


		$isql = encodeAndEUCKR("select count(idx) as counter from wiz_bbs where grpno = $idx and depno = '1'");
		$istm = mysql_query($isql) or die($isql);
		$count_row = mysql_fetch_array($istm);
		$counter = $count_row[counter];

		if($counter <> 0 ){
			echo "replyerror";
//			comalert("������ �ۼ� �� �ִ� �Խù� �Դϴ�.. ���� �����Ŀ� �����ٶ��ϴ�.","/");
			die();
		}

		// �������� üũ
		if(
		$mem_level == "0" ||																																			// ��ü������
		($bbs_info[bbsadmin] != "" && strpos($bbs_info[bbsadmin],$wiz_session[id]) !== false)  ||	// �Խ��ǰ�����
		($bbs_row[memid] != "" && $bbs_row[memid] == $wiz_session[id]) || 												// �ڽ��Ǳ�
		($bbs_row[passwd] != "" && $bbs_row[passwd] == $passwd)																		// ��й�ȣ��ġ
		){
		}else{
			if($passwd) echo "pwderror";//error("��й�ȣ�� ��ġ���� �ʽ��ϴ�.");
			else "permi"; //error("������ �����ϴ�.");
			die();
		}


	}else{
		$sql = "select memid,passwd,upfile1,upfile2,upfile3,upfile4,upfile5,upfile6,upfile7,upfile8,upfile9,upfile10,upfile11,upfile12,movie1 from wiz_bbs where idx = '$idx'";
		$result = mysql_query($sql) or error(mysql_error());
		$bbs_row = mysql_fetch_array($result);


		$isql = "select count(idx) as counter from wiz_bbs where grpno = $idx and depno = '1'";
		$istm = mysql_query($isql) or die($isql);
		$count_row = mysql_fetch_array($istm);
		$counter = $count_row[counter];

		if($counter <> 0 ){
			comalert("������ �ۼ� �� �ִ� �Խù� �Դϴ�.. ���� �����Ŀ� �����ٶ��ϴ�.","/");
			die();
		}


		// �������� üũ
		if(
		$mem_level == "0" ||																																			// ��ü������
		($bbs_info[bbsadmin] != "" && strpos($bbs_info[bbsadmin],$wiz_session[id]) !== false)  ||	// �Խ��ǰ�����
		($bbs_row[memid] != "" && $bbs_row[memid] == $wiz_session[id]) || 												// �ڽ��Ǳ�
		($bbs_row[passwd] != "" && $bbs_row[passwd] == $passwd)																		// ��й�ȣ��ġ
		){
		}else{
			if($passwd) error("��й�ȣ�� ��ġ���� �ʽ��ϴ�.");
			else error("������ �����ϴ�.");
		}


	}


	for($ii = 1; $ii <= $upfile_max; $ii++) {

		if($bbs_row[upfile.$ii] != ""){
			@unlink($upfile_path."/".$bbs_row[upfile.$ii]);
			@unlink($upfile_path."/S".$bbs_row[upfile.$ii]);
			@unlink($upfile_path."/M".$bbs_row[upfile.$ii]);
		}

	}

	if($bbs_row[movie1] != ""){
		@unlink($upfile_path."/".$bbs_row[movie1]);
	}

	$sql = "delete from wiz_bbs where idx = '$idx'";


	mysql_query($sql) or error(mysql_error());

	if($writemode=="action"){
		$sql = "select * from wiz_bbs where prdcode='$prdcode' and depno='0' order by wdate desc limit 0,$cmt_limit";
	$result = mysql_query($sql)or die($sql);
	
	header("Content-type:text/xml");
	echo"<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n";
?>
<clist>
<?
	while($row=mysql_fetch_array($result)){
		//$name = encodeAndUTF8($row[name]);
		$name = encodeAndUTF8($row[name]);
			if($name==""){
				$name="null";
			}
		$content = ereg_replace("<","&#12296;",$row[content]);
		$content = ereg_replace(">","&#12297;",$content);
		$content = encodeAndUTF8($content);

		$wdate = date("Y.m.d H:i:s",$row[wdate]);
		$idx = $row[idx];
		$prdcode = $row[prdcode];
		$memid = $wiz_session[id];
		$writeid = $row[memid];
		$star = $row[star];
		if(empty($star)){
			$star = 1;
		}
?>
		<con idx="<?=$row[idx]?>" prdcode="<?=$prdcode?>" sname="<?=$name?>" smemid="<?=$memid?>" writeid="<?=$writeid?>" star="<?=$star?>">
		<cname><?=$name?></cname>
		<cdate><?=$wdate?></cdate>
		<content><?=$content?></content>
<?
		$sql = "select * from wiz_bbs where prdcode='$prdcode' and depno='1' and grpno='$idx' order by wdate desc";
		$stm = mysql_query($sql)or die($sql);
		while($rs=mysql_fetch_array($stm)){
			$rename = encodeAndUTF8($rs[name]);
			if($rename==""){
				$rename="null";
			}
			$recontent = ereg_replace("<","&#12296;",$rs[content]);
			$recontent = ereg_replace(">","&#12297;",$recontent);
			$recontent = encodeAndUTF8($recontent);
			$rewdate = date("Y.m.d H:i:s",$rs[wdate]);
			$idx = $rs[idx];
			$rewriteid = $rs["memid"]
		?>
		<conrelist idx="<?=$idx?>" smemid="<?=$memid?>" rewriteid="<?=$rewriteid?>">
			<crename><?=$rename?></crename>
			<credate><?=$rewdate?></credate>
			<recontent><?=$recontent?></recontent>
		</conrelist>
		<?
		}
		?>
	</con>
	<?
	}
?>
</clist>	
<?

	}else{
		if($return <> "" ){
			comalert("���� �Ǿ����ϴ�.",$return);
		}else{
			comalert("���� �Ǿ����ϴ�.","list.php?$param");
		}
	}
////////////////////////////////////////////////////////////////////////////////
// �ڸ�Ʈ �Է�
////////////////////////////////////////////////////////////////////////////////
}else if($mode == "comment"){

	// ���Ա� ����
	$pos = strpos($HTTP_REFERER, $HTTP_HOST);
  if($pos === false) error("�߸��� ��� �Դϴ�.");

  if(!strcmp($bbs_info[spam_check], "Y")) {

	  // �ڵ���Ϲ��� �ڵ� �˻�
	  if(empty($_POST[tmp_vcode]) || empty($_POST[vcode])) {
	  	error("�ڵ���Ϲ��� �ڵ尡 �������� �ʽ��ϴ�.");
	  } else if(strcmp($_POST[tmp_vcode], md5($_POST[vcode]))) {
	  	error("�ڵ���Ϲ��� �ڵ尡 ��ġ���� �ʽ��ϴ�.");
	  }
	}

	// �ۼ����� üũ
	if($cpermi < $mem_level) error($bbs_info[permsg],$bbs_info[perurl]);

	// �弳üũ
	check_abuse($name); check_abuse($content);

	$ctype = "BBS";

	// �Էµ�����
	$memid = $wiz_session[id];
	
	if(empty($name)) $name = $wiz_session[name];

	$name = str_replace("\"","&quot;",$name);
	if($passwd == "") $passwd = $wiz_session[passwd];

	$sql = "insert into wiz_comment(idx,ctype,cidx,prdcode,star,id,name,content,passwd,wdate,wip)
					values('', '$ctype', '$idx', '$prdcode', '$star', '$wiz_session[id]', '$name', '$content', '$passwd', now(), '$_SERVER[REMOTE_ADDR]')";
  $result = mysql_query($sql) or error(mysql_error());

	// ��ۼ� ������Ʈ
	$sql = "select idx from wiz_comment where cidx='$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$comment = mysql_num_rows($result);

	$sql = "update wiz_bbs set comment = '$comment' where idx = '$idx'";
	mysql_query($sql) or error(mysql_error());

	comalert("����� �ۼ��Ͽ����ϴ�.", "/bbs/view.php?code=$code&idx=$idx");

////////////////////////////////////////////////////////////////////////////////
// �ڸ�Ʈ ����
////////////////////////////////////////////////////////////////////////////////
}else if($mode == "delco"){

	$sql = "select id,passwd from wiz_comment where idx='$idx'";
	$result = mysql_query($sql) or error(mysql_error());
	$row = mysql_fetch_array($result);

	// �������� üũ
	if(
	$mem_level == "0" ||																																			// ��ü������
	($bbs_info[bbsadmin] != "" && strpos($bbs_info[bbsadmin],$wiz_session[id]) !== false)  ||	// �Խ��ǰ�����
	($row[id] != "" && $row[id] == $wiz_session[id]) || 																// �ڽ��Ǳ�
	($row[passwd] != "" && $row[passwd] == $passwd)																						// ��й�ȣ��ġ
	){
	}else{
		if($passwd) error("��й�ȣ�� ��ġ���� �ʽ��ϴ�.");
		else error("������ �����ϴ�.");
	}

	$sql = "delete from wiz_comment where idx='$idx'";
  $result = mysql_query($sql) or error(mysql_error());

  // ��ۼ� ������Ʈ
	$sql = "select idx from wiz_comment where cidx='$cidx'";
	$result = mysql_query($sql) or error(mysql_error());
	$comment = mysql_num_rows($result);

	$sql = "update wiz_bbs set comment = '$comment' where idx = '$cidx'";
	mysql_query($sql) or error(mysql_error());

	comalert("����� �����Ͽ����ϴ�.", "/bbs/view.php?code=$code&idx=$bbs_idx");

////////////////////////////////////////////////////////////////////////////////
// ��õ�ϱ�
////////////////////////////////////////////////////////////////////////////////
}else if($mode == "recom"){

	if(strlen($HTTP_COOKIE_VARS["bbs_recom".$idx])==0){

		$sql = "update wiz_bbs set recom = recom + 1 where idx='$idx'";
		$result = mysql_query($sql) or error(mysql_error());

      setcookie("bbs_recom".$idx, "$idx", time()+60*60*24*365);

		echo "<script>alert('��õ�Ǿ����ϴ�.');document.location='view.php?code=$code&idx=$idx&recom=ok&flag=$flag';</script>";

	}else{

		echo "<script>alert('�ѹ��� ��õ�����մϴ�..');document.location='view.php?code=$code&idx=$idx&flag=$flag';</script>";

	}

}



?>