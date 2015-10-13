<?php
class voto
{
	public $id;
 	public $dni;
  	public $provincia;
  	public $localidad;
  	public $direccion;
  	public $candidato;
  	public $sexo;

  	public function Borrarvoto()
	 {
 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("CALL BorrarVoto($this->id)");
		$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
		$consulta->execute();
		return $consulta->rowCount();
	 }

	public function Modificarvoto()
	 {
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
			CALL ModificarVoto('$this->id','$this->candidato','$this->provincia','$this->sexo','$this->localidad','$this->direccion')");
		return $consulta->execute();
	 }
	  
	 public function InsertarElvoto()
	 {
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("
			CALL InsertarVoto('$this->dni','$this->provincia','$this->candidato','$this->sexo','$this->localidad','$this->direccion')");
		$consulta->execute();
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }

	 public function Guardarvoto()
	 {
	 	if($this->id>0)
 		{
 			$this->Modificarvoto();
 		}
 		else
 		{
 			$this->InsertarElvoto();
 			include("partes/contarVotos.php");
 			return $contador;
 		} 			
 	}

  	public static function TraerTodoLosvotos()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerTodoLosVotos()");
		$consulta->execute();			
		return $consulta->fetchAll(PDO::FETCH_CLASS, "voto");		
	}

	public static function TraerUnvoto($id)
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("CALL TraerUnVoto('$id')");
		$consulta->execute();
		$votoBuscado= $consulta->fetchObject('voto');
		return $votoBuscado;			
	}
}