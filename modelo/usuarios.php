<?php
//declaracion de la clase
class usuario {
    //atributos
    private $documento;
    private $contrasena;


    //creacion de metodos donde recibe y captura los datos ingresados para el incio de sesion
    public function __construct(){}
    

    public function setdocumento($documento){
        $this->documento = $documento;
    }
    
     
   
    
    
    public function setcontrasena($contrasena){
        $this->contrasena = $contrasena;
    }
  

    public function getdocumento(){
        return $this->documento;
    }
    
    
    
   
    
    public function getcontrasena(){
        return $this->contrasena;
    }
   
}
?>
