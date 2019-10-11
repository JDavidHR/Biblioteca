
    function soloLetras(e){
       key = e.keyCode || e.which;
       //obteniene el caracter presionado por el usuario que añadiendo la sentencia toLowerCase() convertiríamos la letra a minúscula.
       tecla = String.fromCharCode(key).toLowerCase();
       //en la variable "letras" las letras permitidas por nosotros
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       //guardamos los keyCode de las teclas especiales como (BackSpace , flecha izquierda, flecha derecha, Supr)
       especiales = "8-37-39-46";

       tecla_especial = false
       //se busca si está la tecla presionada por el usuario en el array de teclas especiales "especiales"
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        /*dentro del condicional hacemos uso de la propiedad indexOf() que averigua si una cadena se encuentra dentro de otra cadena devolviendo como 
        valor la posición de la cadena encontrada o el valor de -1 si es que no la encuentra , que para este caso queremos averiguar si el caracter 
        presionado se encuentra entre las letras permitidas*/
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }


    function soloNumeros(e){
       key = e.keyCode || e.which;
       //obteniene el caracter presionado por el usuario que añadiendo la sentencia toLowerCase() convertiríamos la letra a minúscula.
       tecla = String.fromCharCode(key).toLowerCase();
        //en la variable "letras" las letras permitidas por nosotros
       letras = " 0123456789";
       //guardamos los keyCode de las teclas especiales como (BackSpace , flecha izquierda, flecha derecha, Supr)
       especiales = "8-37-39-46";

       tecla_especial = false
       //se busca si está la tecla presionada por el usuario en el array de teclas especiales "especiales"
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        /*dentro del condicional hacemos uso de la propiedad indexOf() que averigua si una cadena se encuentra dentro de otra cadena devolviendo como 
        valor la posición de la cadena encontrada o el valor de -1 si es que no la encuentra , que para este caso queremos averiguar si el caracter 
        presionado se encuentra entre las letras permitidas*/
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }