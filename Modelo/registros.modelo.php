<?php
namespace modeloRegistro;
use PDO;

include_once("../Entidad/registros.entidad.php");
include_once("conexion.php");
class Registro{
    private $proceso;
    private $descripcion;
    private $archivo;
    private $idRegistro;
    private $estado;
    private $usuario;
    private $fecha;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;
    public function __construct(\entidadRegistro\Registro $RegistroE)
    {
        $this->conexion = new \Conexion();
        $this->proceso=$RegistroE->getProceso();  
        $this->descripcion=$RegistroE->getDescripcion();   
        $this->archivo=$RegistroE->getArchivo();    
        $this->idRegistro=$RegistroE->getIdRegistro();   
        $this->estado=$RegistroE->getEstado();
        $this->usuario=$RegistroE->getUsuario();    
        $this->fecha=$RegistroE->getFecha();     
    }

    public function guardar()
    {
        session_start();
        $usuario = $_SESSION['id'];
        $fecha = date("Y-m-d");
       $this->consulta="INSERT INTO registros VALUES(NULL, '$this->proceso', '$this->descripcion', '$fecha', '$this->archivo', '$this->estado', '$usuario')";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       if($this->resultado->rowCount()>=1){
            $this->retorno='Se guardo un registro';
        }
        else{
            $this->retorno='Error al guardar registro';
        }
       return $this->retorno;
    }

    public function mostrar()
    {
       $this->consulta="SELECT registros.*, usuarios.usuario FROM registros INNER JOIN usuarios WHERE registros.idUsuario = usuarios.idUsuario";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function mostrarEditar()
    {
       $this->consulta="SELECT registros.*, usuarios.usuario FROM registros INNER JOIN usuarios WHERE registros.idUsuario = usuarios.idUsuario AND registros.idRegistro='$this->idRegistro'";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizar()
    { 
       $this->consulta="UPDATE registros SET proceso='$this->proceso', descripcion='$this->descripcion', archivo='$this->archivo', estado='$this->estado' WHERE idRegistro='$this->idRegistro'";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       if($this->resultado->rowCount()>=1){
            $this->retorno='Se actualizo el registro';
        }
        else{
            $this->retorno='Error al actualizar registro';
        }
       return $this->retorno;
    }

    public function eliminar()
    { 
       $this->consulta="DELETE FROM registros WHERE idRegistro='$this->idRegistro'";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       if($this->resultado->rowCount()>=1){
            $this->retorno='Se elimino el registro';
        }
        else{
            $this->retorno='Error al eliminar registro';
        }
       return $this->retorno;
    }

    public function buscar()
    {
       $this->consulta="SELECT registros.*, usuarios.usuario FROM registros INNER JOIN usuarios WHERE registros.idUsuario = usuarios.idUsuario AND registros.proceso LIKE '%$this->proceso%' AND registros.descripcion LIKE '%$this->descripcion%'AND registros.fecha LIKE '%$this->fecha%' AND registros.estado LIKE '%$this->estado%' AND usuarios.usuario LIKE '%$this->usuario%'";   
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>