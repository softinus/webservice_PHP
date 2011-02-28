/*
현재 구매인원&구매수량에 따른 AJAX 함수 호출 JS
*/
function reCountForm(prdcode){	// 비동기 전송
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

function reCount(obj){		// 비동기 전송후 받은내용 넣어주기.
//	alert(obj.responseText)
	if(obj.responseText==404){
		alert("페이지 누락 에러 입니다. 관리자에게 문의하세요.");
	}
	var xmlObj = obj.responseXML;
	var plist = xmlObj.getElementsByTagName("plist")[0];
	var prdstatus = plist.getAttribute("prdstatus");												// 현재 재고에 따른 판매상황
	var selllimit = plist.getAttribute("selllimit");													// 제한(인원/구매갯수)
	var mininum = plist.getAttribute("mininum");													// 최소구매인원(그래프비율)

	var buycount = plist.getElementsByTagName("buycount")[0].firstChild.data;		// 총 구매수량
	var personal = plist.getElementsByTagName("personal")[0].firstChild.data;		// 총 구매인원


	var buycountObj = document.getElementById("buycounter");							// 입력할 구매 그래프 Bar Tag Object
	var butpersonalObj = document.getElementById("buypersonal");						// 입력한 구매 인원 Text Tag Object

	if(selllimit == "stock"){
		var bar_width = (186/parseInt(mininum,10))*parseInt(buycount,10);
		if(bar_width > 186){ bar_width = 186; }	 // 그래프 var 최대 너비는 186

		buycountObj.width = bar_width;
		butpersonalObj.innerHTML = buycount;
	}else{
		var bar_width = (186/parseInt(mininum,10))*parseInt(personal,10);
		if(bar_width > 186){ bar_width = 186; }	 // 그래프 var 최대 너비는 186

		buycountObj.width = bar_width;
		butpersonalObj.innerHTML = personal;
	}
	
	// 구매버튼 변경(수량 오링)
	if(prdstatus=="soldout"){
		clearInterval(recounter);
		changeButton('soldout');
	}
}