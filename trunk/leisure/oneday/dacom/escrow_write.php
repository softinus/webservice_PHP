<?php
    //	return value
	//  true  : ��������� ����
	//  false : ��������� ����

	function write_success($noti){
        //������ ���� log����� �˴ϴ�. log path���� �� dbó����ƾ�� �߰��Ͽ� �ֽʽÿ�.
		  // �������(C=����Ȯ�ΰ��, R=������ҿ�û, D=������Ұ��, N=NCó����� )
	  // ����Ȯ�ΰ��
		if($noti[txtype] == "C"){

			$sql = "UPDATE wiz_order SET escrow_stats = 'US' where orderid = '$noti[oid]'";
			$result = mysql_query($sql);

		// ������ҿ�û
		}else if($noti[txtype] == "R"){

			$sql = "update wiz_order set status = 'RD', cancelmsg='����ũ�� ������� ��û', escrow_stat = 'UX' where orderid = '$noti[oid]'";
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

