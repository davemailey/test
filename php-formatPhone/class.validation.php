<?php
/*!
 * DB HOST: localhost
 * DB USER: root
 * DB PASS: hell
 */

 
class Validations {
	//! Put all your processing methods in this class
	
	// properties
	public $phone;

	// methods
	public function checkPhone($phone) {
		// remove all non digits from string and get string length
		$phoneNumber = preg_replace("/[^0-9]/", "", $phone);
		$phoneLen = strlen($phoneNumber);
		
		// if string length is 7, 10, or 11, INSERT INTO AKT_Eval_db
		if ($phoneLen == 7 || $phoneLen == 10 || $phoneLen == 11) {
			
			$con = new mysqli('localhost', 'root', 'hell', 'AKT_Eval_db');
			   
			$selectedDatabase = mysqli_select_db($con, 'akt_eval') or die("Couldn't open akt_eval");

			$sql = "INSERT INTO akt_phone (phone)
					VALUES ('{$phoneNumber}')";

			if ($con->query($sql) === TRUE) {
				echo "New record created successfully";
				
			} else {
				echo "Error: " . $sql . "<br>" . $con->error;
			}
			$con->close();
		}else{
			echo "Not valid";
		}
	}

}
?>