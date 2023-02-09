<?php
$pdo = new PDO("mysql:host=localhost;dbname=tourism", "root", "");

if (isset($_GET['country_id'])) {
	$selectstate = $pdo->prepare("SELECT * FROM states where Country_id=" . $_GET['country_id']);
	$selectstate->execute();
	if ($selectstate->rowCount() > 0) {
		echo '<option value="">Select State</option>';
		while ($row = $selectstate->fetch(PDO::FETCH_ASSOC)) {
			echo '<option value=' . $row['Id'] . '>' . $row['StateName'] . '</option>';
		}
	} else {

		echo '<option>No State Found!</option>';
	}
} elseif (isset($_GET['State_id'])) {
	$selectcity = $pdo->prepare("SELECT * FROM city where State_id=" . $_GET['State_id']);
	$selectcity->execute();
	if ($selectcity->rowCount() > 0) {
		echo '<option value="">Select City</option>';
		while ($row = $selectcity->fetch(PDO::FETCH_ASSOC)) {
			echo '<option value=' . $row['Id'] . '>' . $row['CityName'] . '</option>';
		}
	} else {

		echo '<option>No City Found!</option>';
	}
}


?>
