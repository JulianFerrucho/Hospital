function Limpiar(){

	var form=document.form;
	document.form.reset();
	document.form.Identificacion.focus();
	
}

function Validar(){
	
	var form=document.form;
    
    if(form.Identificacion.value==0){
		
		alert("Ingrese Una Identificacion Valida");
		
		form.Identificacion.value="";
		form.Identificacion.focus();
		
		return false;
		
    } else {

        var patron =/[0-9]/;
        var tecla_final = String.fromCharCode(form.Identificacion);
            
        if ((patron.test(tecla_final))==true || form.Identificacion.value.length>=12){

			alert("Ingrese Una Identificacion Valida");
			form.Identificacion.value="";
			form.Identificacion.focus();
            return false;


        }   

    } 
	
	if(form.Clave.value==0){
		
		alert("Ingrese Su Contraseña");
		
		form.Clave.value="";
		form.Clave.focus();
		
		return false;
		
	}
		
	Submit();
	
}

function Submit(){

	var form=document.form;
	
	form.submit();
	
}