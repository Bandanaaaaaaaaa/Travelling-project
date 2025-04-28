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
   
$plain_password=$_POST["password"];
$hash=password_hash($plain_password,PASSWORD_DEFAULT);
echo "<h1>$hash</h1>";


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

    function insertQuery($conn, $data, $signup_table)
    {
        $key = implode(", ", array_keys($data));
        $value = "'" .implode("','", array_values($data))."'";
echo "--> $key<br>";
echo "<br>---$value";
        $insert = "INSERT INTO $signup_table ($key) VALUES ($value)";
        mysqli_query($conn, $insert);
    }


    $data = [
        "username" => $_POST["username"],
        "email" => $_POST["email"],
        "password" => $hash,
    ];

    insertQuery($conn, $data, "signup");

$cookie_name="token";
$cookie_value=$_POST["email"];
setcookie($cookie_name, $cookie_value);

if(!isset($_COOKIE[$cookie_name])){
echo"cookie not set $cookie_name ---";
}
else{
echo "cookie set $cookie_name";
}


    include(__DIR__ . "/../VIEWS/profile.html");
}
?>
