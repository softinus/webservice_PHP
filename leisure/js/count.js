/*
���� �����ο�&���ż����� ���� AJAX �Լ� ȣ�� JS
*/
function reCountForm(prdcode){	// �񵿱� ����
	if(!prdcode){
		clearInterval(recounter);
		changeButton();
	}

	var sendData={
	"prdcode":prdcode
	}
	var postUrl="re_count.php";
	httpRequest.sendRequest(postUrl,"post",sendData,true,reCount);
}

function reCount(obj){		// �񵿱� ������ �������� �־��ֱ�.
//	alert(obj.responseText)
	if(obj.responseText==404){
		alert("������ ���� ���� �Դϴ�. �����ڿ��� �����ϼ���.");
	}
	var xmlObj = obj.responseXML;
	var plist = xmlObj.getElementsByTagName("plist")[0];
	var prdstatus = plist.getAttribute("prdstatus");												// ���� ��� ���� �ǸŻ�Ȳ
	var selllimit = plist.getAttribute("selllimit");													// ����(�ο�/���Ű���)
	var mininum = plist.getAttribute("mininum");													// �ּұ����ο�(�׷�������)

	var buycount = plist.getElementsByTagName("buycount")[0].firstChild.data;		// �� ���ż���
	var personal = plist.getElementsByTagName("personal")[0].firstChild.data;		// �� �����ο�


	var buycountObj = document.getElementById("buycounter");							// �Է��� ���� �׷��� Bar Tag Object
	var butpersonalObj = document.getElementById("buypersonal");						// �Է��� ���� �ο� Text Tag Object

	if(selllimit == "stock"){
		var bar_width = (186/parseInt(mininum,10))*parseInt(buycount,10);
		if(bar_width > 186){ bar_width = 186; }	 // �׷��� var �ִ� �ʺ�� 186

		buycountObj.width = bar_width;
		butpersonalObj.innerHTML = buycount;
	}else{
		var bar_width = (186/parseInt(mininum,10))*parseInt(personal,10);
		if(bar_width > 186){ bar_width = 186; }	 // �׷��� var �ִ� �ʺ�� 186

		buycountObj.width = bar_width;
		butpersonalObj.innerHTML = personal;
	}
	
	// ���Ź�ư ����(���� ����)
	if(prdstatus=="soldout"){
		clearInterval(recounter);
		changeButton('soldout');
	}
}