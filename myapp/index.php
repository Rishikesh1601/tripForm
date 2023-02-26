<?php
$insert = false;
if(isset($_POST['name'])){
//make three variables server,username and password
$server = "localhost";
$username = "root";
$password = "";

//now make a connection variable 
$con = mysqli_connect($server,$username,$password);
if(!$con){
    die("connection to this database failed due to".mysqli_connect_error());
}
// echo "successfully connected to the database";


//make all the variables which you want to store in the database
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$number = $_POST['number'];
$desc = $_POST['desc'];

//now make a sql query to insert all the things in the database
//remove sr no as it is auto generated
// make it trip.trip as the trip database stores the trip table
$sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone no`, `description`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$number', '$desc', current_timestamp());";
// echo $sql;

//now we need to make these changes to the database
//for which we use object
if($con->query($sql) == true){
    // echo "successfully inserted";
    $insert = true;
}else{
    echo "error: $sql <br> $con->error";
}

$con->close();

}
//now take all the html content and paste it here
?>



