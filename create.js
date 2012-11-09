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

function toggleJobLevel(jobselector) {
	var levelRadios = document.getElementsByName("level");
	if(jobselector[jobselector.selectedIndex].value == "" || jobselector[jobselector.selectedIndex].value=="Retired") {
		for(var i in levelRadios) {
			levelRadios[i].disabled = true;
			levelRadios[i].checked = false;
		}
	} else {
		for(var i in levelRadios) {
			levelRadios[i].disabled = false;
		}
	}
}

function toggleGraduated(majorselector) {
	var graduatedRadios = document.getElementsByName("graduated");
	if(majorselector.options[majorselector.selectedIndex].value == "") {
		for(var i in graduatedRadios) {
			graduatedRadios[i].checked = false;
			graduatedRadios[i].disabled = true;
		}
	} else {
		for(var i in graduatedRadios) {
			graduatedRadios[i].disabled = false;
		}
	}
}

function enableWithHonours() {
	var withHonours = document.getElementsByName('withhonours');
	for(var i in withHonours) {
		withHonours[i].disabled = false;
	}
}

function disableWithHonours() {
	var withHonours = document.getElementsByName('withhonours');
	for(var i in withHonours) {
		withHonours[i].disabled = true;
		withHonours[i].checked = false;
	}
}

function toggleBadges(badgecheckbox) {
	var badgeradios = document.getElementsByName(badgecheckbox.name + "badge");
	if(badgecheckbox.checked) {
		for(var i in badgeradios) {
			badgeradios[i].disabled = false;
		}
	} else {
		for(var i in badgeradios) {
			badgeradios[i].checked = false;
			badgeradios[i].disabled = true;
		}
	}
}

function clearNA(what) {
	document.getElementById(what+"NA").checked = false;
}

function clearAll(what) {
	var radios = document.getElementById(what+'fieldset').getElementsByTagName('input');
	for(var i in radios) {
		// make sure we don't unset ourself!
		if(radios[i].value != "N/A")
			radios[i].checked = false;
	}
}

var memoriesCount = 1;

function addMemories(node) {
	var selectNode = document.createElement('li');
	var withNode = document.createElement('li');
	selectNode.className = "option";
	selectNode.innerHTML = "<select\
						name=\"memories"+memoriesCount+"\">\
						<option>\
						</option>\
						<option>\
							First Kiss\
						</option>\
						<option>\
							Moved Out\
						</option>\
						<option>\
							First WooHoo\
						</option>\
						<option>\
							Graduated\
						</option>\
						<option>\
							Grew Up Well\
						</option>\
						<option>\
							Reached Top of Career\
						</option>\
					</select>";
	withNode.className = "option";
	withNode.innerHTML = "<label for=\"memorieswith"+memoriesCount+"\">\
						With:\
					</label>\
						<input\
							type=\"text\"\
							name=\"memorieswith"+memoriesCount+"\"\
						/>";
	node.parentNode.insertBefore(selectNode,node);
	node.parentNode.insertBefore(withNode,node);
	node.parentNode.insertBefore(document.createElement('br'),node);
	memoriesCount++;
}
