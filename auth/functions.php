<?php

include '../config/connect.php';

function register($request) {
    global $conn;
    
    $email = strtolower(trim($request['email'])); 

    if ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
        echo "<script>
            alert('Format email tidak sesuai!');
        </script>";
        return;
    }

    $resultCheckEmail = mysqli_query($conn, "SELECT email FROM users WHERE email='$email'");

    if (mysqli_num_rows($resultCheckEmail) > 0) { 
        echo "<script>
            alert('Email sudah dipakai! Ganti dengan email lain!');
        </script>";
        return;
    }

    $password = mysqli_real_escape_string($conn, $request['password']);
    $password2 = mysqli_real_escape_string($conn, $request['password2']);

    if ($password !== $password2) {
        echo "<script>
            alert('Password tidak sama!');
        </script>";
        return;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $password2 = password_hash($password2, PASSWORD_DEFAULT);

    $result = mysqli_query($conn, "INSERT INTO users (id, email, password) VALUES (id, '$email', '$password')");
    
    if ($result) {
        echo "<script>
                alert('Berhasil membuat akun! Silakan login ulang');
                window.location.replace('login.php');
            </script>";
    } else {
        mysqli_error($conn);
    }
}

function login($request) {
    global $conn;

    $email = trim($request['email']);
    $password = $request['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if(mysqli_num_rows($result) === 1) {

        $dataFetch = mysqli_fetch_assoc($result);

        if( password_verify($password, $dataFetch['password']) ) {

            $_SESSION['login'] = true;
            header('Location: ../index.php');
            exit;
        } else {
            echo "<script>
                alert('Password tidak sesuai');
            </script>";
            return;
        }

    } else {
        echo "<script>
                alert('Email tidak sesuai');
            </script>";
            return;
    }
}
