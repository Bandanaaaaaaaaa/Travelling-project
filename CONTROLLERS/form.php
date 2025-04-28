<?php
//get the data save into database;
//set cookie


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $servername = 'localhost';
    $username = 'user';
    $password = "@Manp2003";
    $dbname = "Travelling";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("connection failed" . mysqli_connect_error());
    }
   


    $signup_table = "
CREATE TABLE IF NOT EXISTS signup(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(30) NOT NULL,
password TEXT NOT NULL
)";

    $table = mysqli_query($conn, $signup_table);
    if ($table) {

        echo "Table created successfullt<br>";
    } else {
        echo "no table";
    }

    if (isset($_POST["register"])) {
        echo "register";
    }
    function insertQuery($conn, $data, $signup_table)
    {
        $key = implode(", ", array_keys($data));
        $value =  "'" .implode("','", array_values($data)) ."'";
        $insert = "INSERT INTO $signup_table ($key) VALUES ($value)";
        mysqli_query($conn, $insert);
    }


    $data = [
        "username" => $_POST["username"],
        "email" => $_POST["email"],
        "password" => $_POST["password"],
    ];

    insertQuery($conn, $data, "signup");




    include(__DIR__ . "/../VIEWS/profile.html");
}
?>