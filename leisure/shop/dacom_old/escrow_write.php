<?php
    //	return value
	//  true  : 결과연동이 성공
	//  false : 결과연동이 실패

	function write_success($noti){
        //결제에 관한 log남기게 됩니다. log path수정 및 db처리루틴이 추가하여 주십시요.	
	    
	  // 수령확인결과
		if($noti[txtype] == "C"){
			
			//$sql = "update wiz_order set status = 'DC' where orderid = '$noti[oid]'";
			//$result = mysql_query($sql);
			
		// 구매취소요청
		}else if($noti[txtype] == "R"){
			
			$sql = "update wiz_order set status = 'RD', cancelmsg='에스크로 구매취소 요청' where orderid = '$noti[oid]'";
			$result = mysql_query($sql);
			
		}
	    return true;
	}

	function write_failure($noti){
	    return true;
	}

    function write_hasherr($noti) {
		return true;
    }

	function get_param($name){
		global $HTTP_POST_VARS, $HTTP_GET_VARS;
		if (!isset($HTTP_POST_VARS[$name]) || $HTTP_POST_VARS[$name] == "") {
			if (!isset($HTTP_GET_VARS[$name]) || $HTTP_GET_VARS[$name] == "") {
				return false;
			} else {
                 return $HTTP_GET_VARS[$name];
			}
		}
		return $HTTP_POST_VARS[$name];
	}

?>

