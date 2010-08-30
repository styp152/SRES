document.oncontextmenu = function(){return false}

//--------------------------------------
// Funcion para dar focus a un objeto
//--------------------------------------
	function focusObjeto(idObject, tecla, event){
		if (event.keyCode == tecla) {
			document.getElementById(idObject).focus();
		}
		return;
	}
//--------------------------------------

//--------------------------------------
// Funcion para dar focus a un objeto
//--------------------------------------
	function detectaNavegador(){
		var nombre = navigator.appName
		if (nombre == "Microsoft Internet Explorer"){
		  window.open('../banner/bannerExplorer.php','banner');
		  window.open('../error/templates/internetExplorer.html','principal');
		}
		return;
	}
//--------------------------------------

//--------------------------------------
// Funcion para el resaltado de la fila
// al pasar el raton sobre una fila de
// una tabla de consulta
//--------------------------------------
  function resaltado(IdObjeto){
    document.getElementById(IdObjeto).className="for_lblFilTablaSel";
  }
//--------------------------------------

//--------------------------------------
// Funcion para el resaltado de la fila
// al pasar el raton sobre una fila de
// una tabla de consulta
//--------------------------------------
  function noresaltado(IdObjeto, tipo){
    if (tipo == "par"){
      document.getElementById(IdObjeto).className="for_lblFilTablaPar";
    }
    else{
      document.getElementById(IdObjeto).className="for_lblFilTablaImpar";
    }
  }
//--------------------------------------