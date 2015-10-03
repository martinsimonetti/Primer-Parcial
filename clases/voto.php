<?php
class voto
{
	public $id;
 	public $dni;
  	public $provincia;
  	public $candidato;
  	public $sexo;

  	public function Borrarvoto()
	 {
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from voto 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }

	/*public static function BorrarvotoPorcandidato($candidato)
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from votos 				
				WHERE candidato=:candidato");	
				$consulta->bindValue(':candidato',$candidato, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();

	 }*/
	public function Modificarvoto()
	 {

			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update voto 
				set dni='$this->dni',
				provincia='$this->provincia',
				candidato='$this->candidato',
				sexo='$this->sexo'
				WHERE id='$this->id'");
			return $consulta->execute();

	 }
	
  
	 public function InsertarElvoto()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into voto (dni,provincia,candidato,sexo)values('$this->dni','$this->provincia','$this->candidato','$this->sexo')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				

	 }

	  public function ModificarvotoParametros()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update voto 
				set dni=:dni,
				provincia=:provincia,
				candidato=:candidato,
				sexo=:sexo
				WHERE id=:id");
			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			$consulta->bindValue(':dni',$this->dni, PDO::PARAM_INT);
			$consulta->bindValue(':candidato', $this->candidato, PDO::PARAM_STR);
			$consulta->bindValue(':provincia', $this->provincia, PDO::PARAM_STR);
			$consulta->bindValue(':sexo', $this->sexo, PDO::PARAM_STR);
			return $consulta->execute();
	 }

	 public function InsertarElvotoParametros()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into voto (dni,provincia,candidato,sexo)values(:dni,:provincia,:candidato,:sexo)");
				$consulta->bindValue(':dni', $this->dni, PDO::PARAM_INT);
				$consulta->bindValue(':candidato', $this->candidato, PDO::PARAM_STR);
				$consulta->bindValue(':provincia', $this->provincia, PDO::PARAM_STR);
				$consulta->bindValue(':sexo', $this->sexo, PDO::PARAM_STR);
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	 public function Guardarvoto()
	 {

	 	if($this->id>0)
	 		{
	 			$this->ModificarvotoParametros();
	 		}else {
	 			$this->InsertarElvotoParametros();
	 		}

	 }


  	public static function TraerTodoLosvotos()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,dni as dni, provincia as provincia,candidato as candidato from votos");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "voto");		
	}

	public static function TraerUnvoto($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, dni as dni, provincia as provincia,candidato as candidato from votos where id = $id");
			$consulta->execute();
			$votoBuscado= $consulta->fetchObject('voto');
			return $votoBuscado;				

			
	}

	public static function TraerUnvotocandidato($id,$candidato) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  dni as dni, provincia as provincia,candidato as candidato from votos  WHERE id=? AND candidato=?");
			$consulta->execute(array($id, $candidato));
			$votoBuscado= $consulta->fetchObject('voto');
      		return $votoBuscado;				

			
	}

	public static function TraerUnvotocandidatoParamNombre($id,$candidato) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  dni as dni, provincia as provincia,candidato as candidato from votos  WHERE id=:id AND candidato=:candidato");
			$consulta->bindValue(':id', $id, PDO::PARAM_INT);
			$consulta->bindValue(':candidato', $candidato, PDO::PARAM_STR);
			$consulta->execute();
			$votoBuscado= $consulta->fetchObject('voto');
      		return $votoBuscado;				

			
	}
	
	public static function TraerUnvotocandidatoParamNombreArray($id,$candidato) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select  dni as dni, provincia as provincia,candidato as candidato from votos  WHERE id=:id AND candidato=:candidato");
			$consulta->execute(array(':id'=> $id,':candidato'=> $candidato));
			$consulta->execute();
			$votoBuscado= $consulta->fetchObject('voto');
      		return $votoBuscado;				

			
	}

	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->dni."  ".$this->provincia."  ".$this->candidato;
	}

}