setTimeout(function(){ 
    var msg = document.getElementsByClassName("alertaDeErro");
        while(msg.length > 0){
            msg[0].parentNode.removeChild(msg[0]);
            }
}, 5000);

function Onlynumbers(e)
{
	var tecla=new Number();
	if(window.event) {
		tecla = e.keyCode;
	}
	else if(e.which) {
		tecla = e.which;
	}
	else {
		return true;
	}
	if((tecla >= "97") && (tecla <= "122")){
		return false;
	}
}

function msg(){
  alert("Cadastro Realizado com sucesso!");
}