<?php
$insert = false;
if(isset($_POST['name'])){
//make three variables server,username and password
$server = "localhost:3307";
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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Trip site</title> 
    <script>
    function validateForm() {
    //get the form fields
    const namefield = document.forms["myForm"]["name"];
    const agefield = document.forms["myForm"]["age"];
    const genderfield = document.forms["myForm"]["gender"];
    // const emailfield = document.forms["myForm"]["email"];
    const phonefield = document.forms["myForm"]["phone"];
    

    //validate name field
    const nameRegex = /^[a-zA-Z]+$/;
    if(!namefield.value.match(nameRegex)){
        alert("name should only contain letters.");
        return false;
    }


    //validate age field
        const ageRegex = /^([1][8-9]|[2-3][0-9]|[4][0])$/;
        if(!agefield.value.match(ageRegex)){
            alert("age should be between 18 to 40");
            return false;
        }
    //validate email field
    // const emailRegex = /^\S+@\s+\.\S+$/;
    // if(!emailfield.value.match(emailRegex)){
    //     alert("please enter a valid email address");
    //     return false;
    // }

    //validate gender field
    const genderRegex = /^(male|female|other)$/i;
    if(!genderfield.value.match(genderRegex)){
        alert("gender should be male,female or other");
        return false;
    }

    //validate phone field
    const phoneRegex = /^\d{10}$/;
    if(!phonefield.value.match(phoneRegex)){
        alert("phone number should contain 10 digits");
        return false;
    }

    return true;
    }

    </script>
</head>
<body>
    <img src="logo.jpg" class="bg" alt="my logo">
    <div class="container">
        <h1>IIT Kharagpur trip to Spain</h1>
        <p>interseted candidates should register before 31/02/2023 by filling the form</p>
        <?php
            if($insert == true){
                echo "<p class='submitMSG'>successfully submited the form</p>";
            }
        ?>
        <form action="index.php" method="post" name="myForm" onsubmit="return validateForm()">
            <input type="text" name="name" id="name" placeholder="enter your name" required>
            <input type="text" name="age" id="age" placeholder="enter your age" required>
            <input type="text" name="gender" id="gender" placeholder="enter your gender" required>
            <input type="email" name="email" id="email" placeholder="enter your email" required>
            <input type="number" name="number" id="number" placeholder="enter your phone number" required>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="enter any description"></textarea>
            <button type="submit" class="btn">Submit</button>
        </form>
    </div>

</body>
</html>