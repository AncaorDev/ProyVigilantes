<?php
// Mejorar esta *#$%&$
class gestionBD extends mysqli {
  private $conexion;
  private $server=HOST;
  private $usuario=USER;
  private $password=PASS;
  private $base_datos=DBNAME;

  /*La función construct para ejecutar automaticamente la conexion al instanciarla*/
  public function __construct(){
    $this->conectar();
  }
  /*Evitamos el clonaje del objeto. Patrón Singleton*/
  private function __clone(){ }
  /*La funcion destruc destruye la clase cuando no se utiliza */
  //private function __destruct(){ }

  /*La funcion conextar es privada*/
  private function conectar(){
    try {
      $this->conexion=new mysqli($this->server, $this->usuario, $this->password, $this->base_datos);
      if ($this->conexion->connect_errno) {
      echo "Falló la conexión a MySQL (MariaBD - mysqli): 
      (" . $mysqli->connect_errno . " - " .$mysqli->connect_error . ") Codigo : " . $mysqli->connect_error;
      }
      // mysqli_select_db($this->conexion,$this->base_datos);
      //$this->set_charset('utf8');
      //@mysqli_query("SET NAMES 'utf8'");
      mysqli_set_charset($this->conexion,"utf8");
    } catch (Exception $e) {
      throw $e;
    }
  }
  // Función para ejecutar una sentencia sql
  public function ejecutar($sql){
      try {
        $this->stmn=mysqli_query($this->conexion,$sql);
        if (!$this->stmn) {
          return $this->conexion->error;
        } else {
          return $this->stmn;
        }  
      } catch (Exception $e) {
        throw $e;
      }
  }
  /*Funcion que nos permite extraer un array*/
  public function recorrer($sql){
    try {
      return mysqli_fetch_array($sql); 
    } catch (Exception $e) {
      throw $e;
    }
  }
  // Función para obtener la cantidad de datos
  public function filas($sql){
    try {
      return mysqli_num_rows($sql);    
    } catch (Exception $e) {
      throw $e;
    }
  }
  // Función para obtener la cantidad de datos de frente
  public function filasrow($sql){
    try {
      return mysqli_num_rows(mysqli_query($this->conexion,$sql));    
    } catch (Exception $e) {
      throw $e;
    }
  }
  // Función para liberar sql
  public function liberar($sql){
    try {
      return mysqli_free_result($sql);
    } catch (Exception $e) {
      throw $e;
    }
  }
  // Función para cerrar la conexion
  public function cerrar(){
    try {
      mysqli_close($this -> conexion);
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function ejecutararray($sql){
    try {   
      $lista=array();
      $rs=mysqli_query($this -> conexion,$sql);
      if (!$rs) {
        return $lista = ['std' => 'false' , 'error' => $this -> conexion->error];
      } else {
        while($fila=mysqli_fetch_array($rs)){
        $lista[]=$fila; //El array lista es la coleccion de filas
        }
        return $lista;
      }
    }
    catch(Exception $ex){
       throw $ex; 
    }
  }
  public function lastId(){
    try {
       return mysqli_insert_id($this -> conexion);
    } catch (Exception $e) {
      throw $e;
    }
  }
}
