<?
include "./inc/common.inc"; 		// DB컨넥션, 접속자 파악
/*
# 코멘트 더 보기 POST 페이지
*/
function encodeAndUTF8($data){
	return iconv("EUC-KR","UTF-8",$data);
}
function encodeAndEUCKR($data){
	return iconv("UTF-8","EUC-KR",$data);
}

$prdcode = $_POST["prdcode"];
$cmt_limit = $_POST["cmt_limit"];


$sql = "select * from wiz_bbs where code='talk' and depno='0' and prdcode='$prdcode' order by wdate desc limit 0,$cmt_limit";
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
		$sql = "select * from wiz_bbs where prdcode='$prdcode' and depno='1' and grpno='$idx' order by wdate desc";
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
