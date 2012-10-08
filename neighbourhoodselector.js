function showSub (neighbourhood) {
	var subhoodlists=document.getElementsByClassName('subneighbourhoods');
	for(var i=0; i<subhoodlists.length; i++) {
		subhoodlists[i].style.display='none';
	}
	document.getElementById(neighbourhood).style.display='block';
}

function showHousehold (subneighbourhood) {
	var householdlists=document.getElementsByClassName('households');
	for(var i=0; i<householdlists.length; i++) {
		householdlists[i].style.display='none';
	}
	document.getElementById(subneighbourhood).style.display='block';
}

function showSims (household) {
	var simslists=document.getElementsByClassName('sims');
	for(var i=0; i<simslists.length; i++) {
		simslists[i].style.display='none';
	}
	document.getElementById(household).style.display='block';
}
