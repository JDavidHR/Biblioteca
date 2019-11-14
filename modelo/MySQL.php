<?php
    //declaracion de la clase
 class MySQL{
    
    //Datos de validacion para la conexion
    private $ipServidor ="localhost";
    private $usuarioBase ='root';
    private $contrasena = '';
    private $bd ='biblioteca3';

    private $conexion;

    

    //Metodo para conectar la base de datos
    public function conectar(){
        $this->conexion = mysqli_connect($this->ipServidor, $this->usuarioBase, $this->contrasena, $this->bd);

    if($this->conexion)
    {
        //echo "conexion exitosa";

    }else{
        die('error de conexion (' . mysql_connect_errno() . ') '.mysql_connect_errno());
    }
    return($this->conexion);
    }

    public function conexionBD($nombreBD){
        mysqli_select_db($nombreBD, $this->conexion);
       
    }

    //Metodo que cierra la conexion
    public function desconectar(){
        mysqli_close($this->conexion);
    }

    //Metodo que efectua una consulta devuelve su resultado
    public function efectuarConsulta($consulta){

        mysqli_query($this->conexion, "SET lc_time_names = 'es_ES'" ); 
        //AÃ±ade el uso de caracteres especiales como tildes con el formato utf8
        mysqli_query($this->conexion, "SET NAMES 'utf8'");
        mysqli_query($this->conexion, "SET CHARACTER 'utf8'");

       $this->resultadoConsulta = mysqli_query($this->conexion, $consulta);
     
        
        return $this->resultadoConsulta; 
    }

    //Ingresa Registros a una tabla en la base de datos
    public function ingresoRegistro($registro){
        
        mysqli_query("SET NAMES 'utf8'");
        mysqli_query("SET CHARACTER 'utf8'");
        
        mysqli_query($registro);
    }


    //creacion del backup de la base de datos
     public function crearBackup(){
        include '../controlador/function.php';
        backDb($this->ipServidor, $this->$$usuarioBase, $this->$contrasena, $this->$bd);
    }
}

?>
