<?@header("Content-Type: text/html; charset=euc-kr");
include "../../inc/common.inc"; 
include "../../inc/util.inc";
include "../../inc/func.inc"; 				

if($mode=="pub") {
	
	$orderArr	= explode("|",$selorder);

	for($i=0;$i<(count($orderArr)-1);$i++)  {
		$rs	= query("UPDATE wiz_dayorder d SET status='DC',coupon_number=concat('_U',orderid), coupon_date=CURRENT_TIMESTAMP() WHERE orderid='".$orderArr[$i]."' AND status='OY' AND 'N'=(SELECT isdeliver FROM wiz_dayproduct p WHERE d.prdcode=p.prdcode)");
		
		if(mysql_affected_rows()>0) {

			$sql	= query("SELECT (SELECT prdname FROM wiz_dayproduct p WHERE p.prdcode=d.prdcode) AS prdname, d.* FROM wiz_dayorder d WHERE orderid='".$orderArr[$i]."'");
			$row	= mysql_fetch_array($sql);
			$content	= "[너반나반]".$row["coupon_number"]." ".$row["prdname"];
			send_sms("070-8670-5159", $row["rece_hphone"], $content, "너반나반");
				//메일			
		}
	
	}
	echo "<script>parent.document.location.reload();</script>";
}


?>
