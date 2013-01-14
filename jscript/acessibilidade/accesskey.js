document.onkeydown = function(e){
	var keychar;

	// Internet Explorer
	try {
		keychar = String.fromCharCode(event.keyCode);
		e = event;
	}

	// Firefox, Opera, Chrome, etc...
	catch(err) {
		keychar = String.fromCharCode(e.keyCode);
	}

	if (e.altKey && keychar == '1' || e.altKey && e.shiftKey && keychar == '1') {
		setTimeout(function() { document.getElementById('conteudo').focus(); }, 0);
		return false;
	}
	if (e.altKey && keychar == '2' || e.altKey && e.shiftKey && keychar == '2') {
		setTimeout(function() { document.getElementById('menuPrincipal').focus(); }, 0);
		return false;
	}
	if (e.altKey && keychar == '3' || e.altKey && e.shiftKey && keychar == '3') {
		setTimeout(function() { document.getElementById('menuSecundario').focus(); }, 0);
		return false;
	}
}