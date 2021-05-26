<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "enroll";

    //create connetion
    $conn = new mysqli($servername,$username,$password,$database);

    //check connection
    if($conn->connect_error){
        die("connection failed" . $conn->connect_error);
    }

    //Create table

    // $sql = "CREATE TABLE REGISTER (
    //     id INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //     Full_Name VARCHAR (40) NOT NULL,
    //     Full_Address VARCHAR (120) NOT NULL,
    //     City VARCHAR (30) NOT NULL,
    //     Pin INT (6) NOT NULL,
    //     Category VARCHAR (11) NOT NULL,
    //     Help_Type VARCHAR (20) NOT NULL,
    //     Messages VARCHAR (150)
    // )";

    // if ($conn->query($sql) === TRUE){
    //     echo " bana di";
    // } else {
    //     echo " ni banai";
    // }

    //var declaration
    $name = $_POST["fname"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $pin = $_POST["pin"];
    $Category = $_POST["Category"];
    $Help_type = $_POST["helpType"];
    $message = $_POST["message"];
    $status = 0;

    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo '<script>alert("File is not an image.")</script>';
    header("Location: ../enroll.html");
    $uploadOk = 0;
  }
}

$file_name = $_FILES['fileToUpload']['name'];

// Check if file already exists
    if (file_exists($target_file)) {
        echo '<script>alert("Sorry, file already exists.")</script>';
        header("Location: ../enroll.html");
        $uploadOk = 0;
    }

// Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo '<script>alert("Sorry, your file is too large.")</script>';
        header("Location: ../enroll.html");
        $uploadOk = 0;
    }

// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo '<script>alert("Sorry, only JPG, JPEG, PNG files are allowed.")</script>';
        header("Location: ../index.html");
        $uploadOk = 0;
    }

// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo '<script>alert("Sorry, your file was not uploaded.")</script>';
        header("Location: ../enroll.html");
// if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo '<script>console.log("Your details are uploaded!")</script>';        
    } else {
        echo '<script>alert("Sorry, there was an error uploading your file.")</script>';
        header("Location: ../enroll.html");
    }
}

$sql = "INSERT INTO REGISTER (Full_Name, Full_Address, City, Pin, Category, Help_Type, Messages, File_Name, Status) VALUES ('$name', '$address', '$city', '$pin', '$Category', '$Help_type', '$message', '$file_name', '$status')";

if ($conn->query($sql) === TRUE) {
        ?>
        <script>
        alert("Successfully uploaded!");
        window.location.href = "../index.html";
        </script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>