/*
	 [authdate ������Ģ]
	
	 1. mertid + tid + mert_key => �������ڿ�
	 2. md5(�������ڿ�) => authdata
	 mert_key�� �����޿��� �߱��� ������ ����Ű(private key)�� ���������ڿ��� Ȯ�� ����
*/

function showReceiptByTID(mertid, tid, authdata, mode)
{
	var receiptURL = "";
	var testURL = "http://pgweb.dacom.net:7085";
	var svcURL = "http://pgweb.dacom.net";
	
	if (mode == "service") {
		receiptURL = svcURL;
	} else {
		receiptURL = testURL;
	}
	
	window.open(receiptURL+"/pg/wmp/etc/jsp/Receipt_Link.jsp?mertid="+mertid+"&tid="+tid+"&authdata="+authdata,"eCreditReceipt","toolbar=no, location=no, status=no, menubar=no, scrollbars=no, resizable=no, width=450, height=600");
}

/*
	 [authdate ������Ģ]
	 1. mertid + orderdate + orderid + mert_key => �������ڿ�
	 2. md5(�������ڿ�) => authdata
	 mert_key�� �����޿��� �߱��� ������ ����Ű(private key)�� ���������ڿ��� Ȯ�� ����
*/

function showReceipt(mertid, orderdate, orderid, authdata)
{
	window.open("http://pgweb.dacom.net/pg/wmp/etc/jsp/Receipt_Link.jsp?mertid="+mertid+"&orderdate="+orderdate+"&orderid="+orderid+"&authdata="+authdata,"eCreditReceipt","toolbar=no, location=no, status=no, menubar=no, scrollbars=no, resizable=no, width=450, height=600");
}

/*	 
	[authdate ������Ģ]
	
	 1. mertid + orderid + paytype + mert_key => �������ڿ�
	 2. md5(�������ڿ�) => authdata
	 mert_key�� �����޿��� �߱��� ������ ����Ű(private key)�� ���������ڿ��� Ȯ�� ���� 
*/

function showReceiptByOID(mertid, orderid, paytype, authdata, mode)
{
	var receiptURL = "";
	var testURL = "http://pgweb.dacom.net:7085";
	var svcURL = "http://pgweb.dacom.net";
	
	if (mode == "service") {
		receiptURL = svcURL;
	} else {
		receiptURL = testURL;
	}
	
	if(paytype=="SC0040") {
		window.open(receiptURL+"/pg/wmp/etc/jsp/Receipt_Link.jsp?mertid="+mertid+"&orderid="+orderid+"&paytype="+paytype+"&authdata="+authdata,"eCreditReceipt","toolbar=no, location=no, status=no, menubar=no, scrollbars=no, resizable=no, width=800, height=300");
	} else {
		window.open(receiptURL+"/pg/wmp/etc/jsp/Receipt_Link.jsp?mertid="+mertid+"&orderid="+orderid+"&paytype="+paytype+"&authdata="+authdata,"eCreditReceipt","toolbar=no, location=no, status=no, menubar=no, scrollbars=no, resizable=no, width=450, height=600");
	}
}

 
/*	 
	 [�ŷ�����Ȯ�μ� + ���ݿ����� �ڹٽ�ũ��Ʈ ����]
	 �۾�����  : ���翡�� �������� ��ũ��Ʈ�� �����ϱ����� 2���� js ������ import�ؾ��ϴ� ���� �ؼ�

	1. ��û�Ķ����
 	var paramStr = "";
	var receiptURL = "";
	var testURL = "http://pg.dacom.net:7080/transfer/cashreceipt.jsp";
	var svcURL = "http://pg.dacom.net/transfer/cashreceipt.jsp";
	----------------------------------------------------------------------------------
	2. ���� Ÿ�� ����
	if(stype == "CAS" || stype == "cas" || stype == "SC0040"){
	}

*/

function showCashReceipts(mid, oid, seqno, stype, mode) {
		var paramStr = "";
		var receiptURL = "";
		var testURL = "http://pg.dacom.net:7080/transfer/cashreceipt.jsp";
		var svcURL = "http://pg.dacom.net/transfer/cashreceipt.jsp";

		if (mid == "" || oid == "") {
			return ;
		}

		if(stype == "CAS" || stype == "cas" || stype == "SC0040"){
			stype = "SC0040";
			if (seqno == "") seqno = "001";
			paramStr = "orderid="+oid+"&mid="+mid+"&seqno="+seqno+"&servicetype="+stype;
		}else if(stype == "BANK" || stype == "bank" || stype == "SC0030"){
			stype = "SC0030";
			paramStr = "orderid="+oid+"&mid="+mid+"&servicetype="+stype;
		}else if(stype == "CR" || stype == "cr" || stype == "SC0100"){
			stype = "SC0100";
					paramStr = "orderid="+oid+"&mid="+mid+"&servicetype="+stype;
		}

		if (mode == "service") {
			receiptURL = svcURL;
		} else {
			receiptURL = testURL;
		}
		
		popupWin = window.open(receiptURL+"?"+paramStr, "popWinName","menubar=0,toolbar=0,scrollbars=no,width=380,height=600,resize=1,left=252,top=116");	
}

/*
  �ּ� ǥ�⿡ �־ ����! 
  �� ��ũ��Ʈ ���Ͽ� �Լ��� �߰��� ��, ���� �ּ� (//) �� ���� ���� ���ʽÿ�. 
  Ư�� ������ �� �� ��ũ��Ʈ�� ��Ŭ��� �ؼ� ���� ������ �����ؼ� ���� ���� �ִ� �� �մϴ�.
  �� ������ ������ �߻��ϰ� �˴ϴ�. 
  �ּ��� �ݵ�� ������ ������.
*/