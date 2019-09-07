<?php

    class Conexion{
        private $user="root";
		private $pass="";
		private $host="localhost";
		private $dataBase="turisteando1";
		private $port="3306";
        private $link;

        public function __construct(){
			$this->setConnection();
		}

		public function setConnection(){
			$this->link = mysqli_connect($this->host, $this->user, $this->pass, $this->dataBase, $this->port);

			if (!$this->link){
				echo "Conexion Fallida\n";
				exit;
			}else{
				//echo  "Conexion Exitosa!";;
			}
        }

        public function closeConnection(){
			mysqli_close($this->link);
		}

		public function executeQuery($sql){
			return mysqli_query($this->link, $sql);
		}

		public function getRow($resultado){
			return mysqli_fetch_array($resultado);
		}

		public function countRegisters($resultado){
			return mysqli_num_rows($resultado);
		}

		public function freeResult($resultado){
			mysqli_free_result($resultado);
		}

		public function getuser(){
			return $this->user;
		}

		public function getDataBase(){
			return $this->dataBase;
		}
    }

  /*$conexion= new Conexion();
  $query="CALL Funcion_SignUp_Cliente('Peter', 'Peter','Anguila','98765465','PeterAnguila@gmail.com', @men, @booleano);";
      $resultados=$conexion->executeQuery($query);

      $query="SELECT @men, @booleano;";
      $select= $conexion->executeQuery($query);
      $respuesta=$conexion->getRow($select);
  //$respuesta=$respuesta[0];
  $conexion->closeConnection();
  var_dump($respuesta);*/
?>