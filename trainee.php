<?php
  $hostname = 'localhost';
  $database = 'traineedb';
  $username = 'root';
  $password = '';

  // opening a connection
  $conn = new mysqli ($hostname, $username, $password, $database);

  if ($conn->connect_error) {
    die($conn->connect_error);
  }
  $fName = $_POST['fName'];
  $lName = $_POST['lName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  if (isset($_POST['grpfit'])) $grpfit = true; else $grpfit = false;
  if (isset($_POST['prtrain'])) $prtrain = true; else $prtrain = false;
  if (isset($_POST['nutr'])) $nutr = true; else $nutr = false;

  $reference = $_POST['reference'];
  $questions = $_POST['questions'];

  $query = "INSERT INTO trainee(fName, lName, email, phone, grpfit, prtrain, nutr, reference, questions) VALUES('$fName', '$lName', '$email', '$phone', '$grpfit', '$prtrain', '$nutr', '$reference', '$questions')";

  $results = $conn->query($query);
  if (!$results) {
    echo "Insert failed";
  }
  else {
    echo "Insert successfully!";
  }

  $query = "select * from trainee";
  $results = $conn->query($query);

  if (!$results) {
    echo "Select error";
  }

  while ($row = mysqli_fetch_array($results)) {
    echo $row['id']." ".$row['fName']." ".$row['lName']. " " .$row['email']. " " .$row['phone'] ."<br/>";
  }
?>
