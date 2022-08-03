<?php

// untuk mencari data
// jika tombol submit di klik maka akan menjalankan perintah sbg berikut
if (isset($_REQUEST['Submit']) && isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $___mysqli_res = mysqli_connect_error() ? $___mysqli_res : false;

    $query = "SELECT name, age, email, password FROM users WHERE id = '$id';";
    $hasil = mysqli_query($mysqli,  $query) or die('<pre>' . ((is_object($mysqli)) ? mysqli_error($mysqli) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>');

    // Get results
    while ($row = mysqli_fetch_assoc($hasil)) {
        // Get values
        $name = $row["name"];
        $age = $row["age"];
        $email = $row["email"];
        $pass = $row["password"];

        // Feedback for end user

        $html .= "
                <pre>ID: {$id}<br />First name: {$name}<br />Age: {$age}<br />Email: {$email}<br />Pass: {$pass}</pre>";
    }

    // $mysqli -> close()
} else {
    $html = "Error dan pencarian belum diisi ";
}
