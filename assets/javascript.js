function openTabs(oHandle){

	var oBody = oHandle.nextElementSibling;

	 if (oBody.className == ''){

	 	//close all opened tabs

	 	var aDiv = document.getElementById('accordion').children;

	 	for(var iCount=0; iCount< aDiv.length;iCount++){

	 		aDiv[iCount].children[0].className="";
	 		aDiv[iCount].children[1].className="";

	 	}

	 	// document.getElementById(sInputId);
	 	// sInputId.children.className = "open";
	 	oBody.className = "show";
	 	oHandle.className="open";

	 	// bOpen == true;

	 }else{

	 	// sInputId.children.className="closed";
	 	oBody.className = "";
	 	oHandle.className="";
	 }
}

window.onload =function(){

	var aImages = document.getElementById("productPicker").children;
	var oProductMain = document.getElementById("productMain");

	for(var iCount=0; iCount<aImages.length; iCount++){
		aImages[iCount].onmouseover = function(){
			oProductMain.firstElementChild.remove();
			var clone = this.cloneNode(true);
			oProductMain.appendChild(clone);

		}

	}

}



function showQuickLook(){

	var oOverlay = document.getElementById("overlay");
	oOverlay.className = "show";

	var oQuickLookBox = document.getElementById("quickLookBox");
	oQuickLookBox.className = "show";
}

function hideQuickLook(){
	var oOverlay = document.getElementById("overlay");
	oOverlay.className = "";

	var oQuickLookBox = document.getElementById("quickLookBox");
	oQuickLookBox.className = "";
}



