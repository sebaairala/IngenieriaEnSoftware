/*======================================
=            OBJETO USUARIO            =
======================================*/

var user = {

	nombre: null,
	email:null,
	pass:null;
	pass2:null,
	foto:null,
	token:null
}

/*=====  End of OBJETO USUARIO  ======*/

/*===============================================
=            METODOS OBJETO USUARIO            =
===============================================*/

//creacion de ususario -> falta
//login - > listo
//recuperacion lacuenta -> falta

//usuario administrador
//modificacion


//kor del programa: recorrido del usuario

//info producto
//rol: usuario final.
//rol: administracion. 

//fecha de entrega final: 


var mU = {

	login:function(){

		var datos = new FormData();
		//appends
		$.ajax({
			url:"",
        	method: "GET",
        	data: datos,
        	cache: false,
        	contentType: false,
        	processData: false,
        	dataType: "jsonp",
        	success:function(respuesta){

        	}
		})

	}

	verificarToken:function(){

		if(localStorage.getItem("token") != null){

		}else{

			return false;
		}
	}
}


/*=====  End of METODOS OBJETO USUARIO  ======*/

