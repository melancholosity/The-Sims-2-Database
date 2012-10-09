function getFormAjax (formName) {
	var request=false;
	try {
		request=new XMLHttpRequest();
	}
	catch(e) {
		request=false;
	}
	request.open('GET', "ajax/"+formName, false);
	request.send(null);
	document.getElementById('formplace').innerHTML=request.responseText;
}

function toggleDisabledButtons(element,maxchecked) {
	maxchecked = typeof maxchecked !== 'undefined' ? maxchecked : 2;
	var checkedCount = 0;
	for(var i in element.getElementsByTagName('input')) {
		if(element.getElementsByTagName('input')[i].checked) {
			checkedCount++;
		}
	}
	if(checkedCount < maxchecked) {
		enableAll(element.getElementsByTagName('input'))
	}
	else {
		disableAll(element.getElementsByTagName('input'));
	}
	
}

function disableAll(nodeArray) {
	for(var i in nodeArray) {
		if(nodeArray[i].checked != 1) {
			nodeArray[i].disabled = true;
		}
	}
}

function enableAll(nodeArray) {
	for(var i in nodeArray) {
		nodeArray[i].disabled = false;
	}
}

function clearRadio(whichOnes) {
	var elements = document.getElementsByName(whichOnes);
	for(var i in elements)
		elements[i].checked = false;
}
