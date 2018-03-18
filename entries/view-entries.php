<?php
	include '../db/connection.php';

	$gresult = ''; //declare global variable
	$db_table = 'db_table';

	//Insert or Update information
	if(isset($_POST['action_type']))
	{
		if($_POST['action_type'] == 'add' or $_POST['action_type'] == 'edit'){
			//Sanitize the data and assign to variables
			$index = $_POST['idx'];
      $firstname = mysqli_real_escape_string($link, strip_tags($_POST['firstname']));
      $lastname = mysqli_real_escape_string($link, strip_tags($_POST['lastname']));
      $address = mysqli_real_escape_string($link, strip_tags($_POST['address']));
      $city = mysqli_real_escape_string($link, strip_tags($_POST['city']));
      $state = mysqli_real_escape_string($link, strip_tags($_POST['state']));
      $zip = mysqli_real_escape_string($link, strip_tags($_POST['zip']));
      $email = mysqli_real_escape_string($link, strip_tags($_POST['email']));
      $phone = mysqli_real_escape_string($link, strip_tags($_POST['phone']));

			if($_POST['action_type'] == 'add'){
      	$sql = "INSERT INTO `" . $db_table . "` SET
      		`FirstName` = '$firstname',
      		`LastName` = '$lastname',
      		`Address` = '$address',
      		`City` = '$city',
      		`State` = '$state',
      		`Zip` = '$zip',
      		`Email` = '$email',
      		`Phone` = '$phone'";
			} else {
				$sql = "UPDATE `" . $db_table . "` SET
      		`FirstName` = '$firstname',
      		`LastName` = '$lastname',
      		`Address` = '$address',
      		`City` = '$city',
      		`State` = '$state',
      		`Zip` = '$zip',
      		`Email` = '$email',
      		`Phone` = '$phone'
					WHERE `Index` = '$index'";
			}

			if (!mysqli_query($link, $sql)) {
				echo 'Error Saving Data. ' . mysqli_error($link);
				exit();
			}
		}
		header('Location: table.php');
		exit();
	}
	//End Insert or Update information

	//Start of edit read
	if(isset($_POST['action']) and $_POST['action']=='edit'){
		$idx = (isset($_POST['idx']) ? $_POST['idx'] : '');
		$sql = "SELECT * FROM `" . $db_table . "` WHERE `Index` = '$idx'";

		$result = mysqli_query($link, $sql);

		if(!$result){
			echo mysqli_error($link);
			exit();
		}

		$gresult = mysqli_fetch_array($result);

		include 'update.php';
		exit();
	}
	//end of edit read

	//Start Delete
	if(isset($_POST['action']) and $_POST['action'] == 'delete'){
		$idx = (isset($_POST['idx']) ? $_POST['idx'] : '');
		$sql = "DELETE FROM `" . $db_table . "` WHERE `Index` = '$idx'";

		$result = mysqli_query($link, $sql);

		if(!$result){
			echo mysqli_error($link);
			exit();
		}
	}
	//End Delete

	//Read information from database
	$sql = "SELECT * FROM `" . $db_table . "`";
	$result = mysqli_query($link, $sql);

	if(!$result){
		echo mysqli_error($link);
		exit();
	}

	$entry_list = array();
	//Loop through each row on array and store the data to $entry_list[]
	while($rows = mysqli_fetch_array($result)){
		$entry_list[] = array('Index' => $rows['Index'],
						'FirstName' => $rows['FirstName'],
						'LastName' => $rows['LastName'],
						'Address' => $rows['Address'],
						'City' => $rows['City'],
						'State' => $rows['State'],
						'Zip' => $rows['Zip'],
						'Email' => $rows['Email'],
						'Phone' => $rows['Phone']);
	}
	include 'table.php';
	exit();
?>
