<?php 
	
	class Model
	{		
		function connect(){
			$this->conn = new mysqli("localhost","root","","onlineshopping");
			if ($this->conn->connect_errno != 0) {
				die("Error on Database Connection");
			}
		}
		
		function select($sql)
		{
			$this->connect();
			$result=$this->conn->query($sql);			
			$userData=array();
			if ($result->num_rows > 0) {
				while ($row=$result->fetch_object()) {
					array_push($userData, $row);
				}
			}
			return $userData;
		}

		function insert($sql)
		{
			$this->connect();
			$this->conn->query($sql);
			if ($this->conn->affected_rows == 1 && $this->conn->insert_id !=0) {
				return true;
			}else{
				return false;
			}
		}

		function delete($sql){
			$this->connect();
			if($this->conn->query($sql)){
				return true;
			}else{
				return false;
			}

		}
		function update($sql)
		{
			$this->connect();
			$this->conn->query($sql);
			if ($this->conn->affected_rows > 0) {
				return true;
			}else{
				return false;
			}
		}
		public function checkInputValue($text)
		{
			$this->connect();
			$text1=$this->conn->real_escape_string($text);
			$text=htmlentities($text1);
			return $text;
		}
	}
?>