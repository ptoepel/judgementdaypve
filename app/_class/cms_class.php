<?php
class modernCMS{

var $con;
var $host;
var $username;
var $password;
var $db;


	function connect() {
		$this->con = mysqli_connect($this->host,$this->username,$this->password) or die("Error Connecting to MySQL");
		 mysqli_select_db( $this->con,$this->db) or die("DB Select Error");
	}

	function get_content(){
		$sql = "SELECT * FROM cms_content";
		$res = mysqli_query($this->con,$sql) or die("Problem with your cms_content return query");
		while($row = mysqli_fetch_assoc($res)){
			echo '<h2>'. $row['title']. '</h2>';
			echo '<div>'.$row['date'].'</div>';
			echo '<p>'. $row['body'].'</p>';
			echo '<quote>'.$row['author'].'</quote>';
			
		}
	}

}// END CLASS