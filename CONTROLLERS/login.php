<?php
echo "<h1>login</h1>";
//get the details from database -> DONE
//and verify the user email and password -> DONE
//Make the cookie secure

$conn = mysqli_connect("localhost", "user", "@Manp2003", "Travelling");

$sql = "select email from signup";
$result = mysqli_query($conn, $sql);
$find_email = "SELECT * from signup WHERE email='$_POST[email]'";
$result = mysqli_query($conn, $find_email);

if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);
    $hash = $row["password"];
    if (password_verify($_POST["password"], $hash)) {
        $cookie_name = "token";
        $cookie_value = $_POST["email"];
        setcookie($cookie_name, $cookie_value);
        include(__DIR__ . '/../VIEWS/profile.html');

    } else {

        echo 'Invalid password.';

    }

} else {
    include(__DIR__ . "/../VIEWS/signup.html");
}

mysqli_close($conn);


?>