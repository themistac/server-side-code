function cancel(url) {
window.location.href = url;
}

// fade 

var Color= new Array();
Color[1] = "ff";
Color[2] = "ee";
Color[3] = "dd";
Color[4] = "cc";
Color[5] = "bb";
Color[6] = "aa";
Color[7] = "99";

function waittofade() {
	if (document.getElementById('infofade')) {
    setTimeout("fadeIn(7)", 1);
	 }
}

function fadeIn(where) {
    if (where >= 1) {
        document.getElementById('infofade').style.backgroundColor = "#ffff" + Color[where];
		  if (where > 1) {
			  where -= 1;
			  setTimeout("fadeIn("+where+")", 250);
			} else {
			  where -= 1;
			  setTimeout("fadeIn("+where+")", 250);
			  document.getElementById('fade').style.backgroundColor = "transparent";
			}

    }
}

function toggleTest() {
Element.toggle('simpletest');
Element.toggle('advancedtest');
return false;
}
