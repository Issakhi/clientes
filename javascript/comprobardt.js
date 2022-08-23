var mensaje = "Inserte los campos requeridos *";
var erTelefono = "Inserte un número teléfono valido";
var erEmail = "Inserte un correo valido";

function comprobarCliente(){
    var nombre = document.getElementById("nombContacto");
    var direccion = document.getElementById("dirContacto");
    var telefono = document.getElementById("telContacto").value;
    var email = document.getElementById("emailContacto").value;
     
    var comEmail= validarEmail(email);
    var comprobarTelefono = validarTelefono(telefono);
    if(
            nombre.value == '' ||
            direccion.value =='' ||
            telefono.value =='' ||
            email.value == ''
        ){
            document.getElementById("clienteMensaje").style.color = "red";
            document.getElementById("clienteMensaje").innerHTML = mensaje;
    }else{
        
          if(comprobarTelefono){
              document.getElementById("colorCTel").style.color = "black";
                if(comEmail){
                     document.formcliente.submit();
                }else{
                    document.getElementById("colorCEmail").style.color = "red";
                }
            }else{

                 document.getElementById("colorCTel").style.color = "red";
            }
    }
}

function comprobarContacto(){

     var codigo = document.getElementById("cod").value;
     var nombre = document.getElementById("nomContacto");
     var telefono = document.getElementById("telContacto").value;
     var email = document.getElementById("emailContacto").value;

     var comprobaEmail = validarEmail(email);
     var comprobarTelefono = validarTelefono(telefono);
     var comprobarCod = validarCodigo(codigo);

     if(
            cod.value == ""||
            nombre.value ==""||
            telefono.value ==""||
            email.value == ""
        ){
            document.getElementById("clienteMensaje").style.color = "red";
            document.getElementById("clienteMensaje").innerHTML = mensaje;
     }else{
         if(comprobarCod){
                document.getElementById("codColor").style.color = "black";
                    if(comprobarTelefono){
                        document.getElementById("telContColor").style.color = "black";
                            if(comprobaEmail){
                                    document.formContacto.submit();
                                }else{
                                    document.getElementById("emailContColor").style.color = "red";
                                }
                    }else{
                            document.getElementById("telContColor").style.color = "red";
                    }
            }else{
                document.getElementById("codColor").style.color = "red";   
            }
    }

}

function editarCliente(){
    
    var nombre = document.getElementById("nomEditar");
    var direccion = document.getElementById("dirEditar");
    var telefono = document.getElementById("telEditar");
    var email = document.getElementById("emailEditar");
    
    var comprobarEmail = validarEmail(email.value);
    var comprobarTelefono = validarTelefono(telefono.value);

    if(
        nombre.value == ""||
        direccion.value == ""||
        telefono.value == ""||
        email.value == ""
    ){
        alert(mensaje);
    }else{
        if(comprobarTelefono){
          
            if(comprobarEmail){
                   
                    document.clienteEditado.submit();
            }else{
                   alert(erEmail);
            }

        }else{
           alert(erTelefono);
        }
    }
}

function editarContacto(){

     var nombre = document.getElementById("nomEdContacto");
     var direccion = document.getElementsByName("dirEdContacto");
     var telefono = document.getElementById("telEdContacto");
     var email = document.getElementById("emailEdContacto");
     var codigo = document.getElementById("codEditar");

     var telComprobado = validarTelefono(telefono.value);
     var emailComprobado = validarEmail(email.value);
     var codigoComprobado = validarCodigo(codigo.value);

     if(
         nombre.value ==""||
         direccion.value ==""||
         telefono.value ==""||
         email.value ==""||
         codigo.value ==""
     ){
         alert(mensaje);
     }else{
         if(telComprobado){
             
             if(emailComprobado){

                 if(codigoComprobado){

                     document.formEdContacto.submit();

                 }else{
                     alert(erCodCliente);
                 }
             }else{
                 alert(erEmail);
             }
         }else{
             alert(erTelefono);
         }
   }
}
    
function validarEmail(email){
    return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email);
}

function validarTelefono(telefono){
    return /^[0-9]{9}$/.test(telefono);
}

function validarCodigo(codigo){
    return /^[1-9]{1,9}$/.test(codigo);
}

