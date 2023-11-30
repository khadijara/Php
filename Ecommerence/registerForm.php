<?php

// define variable and set to empty values
$name = $surname = $email = $passwd = $cpasswd = $address = $Cnumber =  $Exdate = $Scode = $Success =  '';
$nameErr = $surnameErr = $emailErr = $passwdErr = $cpasswdErr = $addressErr = $CnumberErr = $ExdateErr =  $ScodeErr = '';


$UserArray = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['name'])) {
        $name = test_input($_POST['name']);
        $UserArray = array('name' => test_input($_POST['name'])) ;
        if (!preg_match("/[a-zA-Z-']*$/", $name)) {
            $nameErr = "Please Enter Letters";
        }
    } else {
        $nameErr = "You forgot to enter Name";
    }

    if (!empty($_POST['surname'])) {
        $surname = test_input($_POST['surname']);
        $UserArray = array('surname' => test_input($_POST['surname'])) ;
        if (!preg_match("/[a-zA-Z-']*$/", $surname)) {
            $surnameErr = "Please Enter Letters";
        }
    } else {
        $surnameErr = "You forgot to enter Surname";
    }
    if (!empty($_POST['email'])) {
        $email = test_input($_POST['email']);
        $UserArray = array('email' => test_input($_POST['email'])) ;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "You Enter wrong email Format";
        }
    } else {
        $emailErr = "Email is Mandatory";
    }

    if (!empty($_POST["passwd"]) && ($_POST["passwd"] == $_POST["cpasswd"])) {
        $passwd = test_input($_POST["passwd"]);
        $UserArray = array('passwd' => test_input($_POST['passwd'])) ;
        $cpasswd = test_input($_POST["cpasswd"]);
        $UserArray = array('cpasswd' => test_input($_POST['cpasswd'])) ;
        if (strlen($_POST["passwd"]) == '5') {
            $passwdErr = "Your Password Must Contain At Least 5 Characters!";
        } elseif (!preg_match("#[0-9]+#", $passwd)) {
            $passwdErr = "Your Password Must Contain At Least 1 Number!";
        } elseif (!preg_match("#[A-Z]+#", $passwd)) {
            $passwdErr = "Your Password Must Contain At Least 1 Capital Letter!";
        } elseif (!preg_match("#[a-z]+#", $passwd)) {
            $passwdErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        }
    } elseif (!empty($_POST["passwd"])) {
        $cpasswdErr = "Please Check You've Entered Or Confirmed Your Password!";
    } else {
        $passwdErr = "Please enter password   ";
    }
    if (!empty($_POST["Cnumber"])) {
        if (strlen($_POST["Cnumber"]) == '16') {
            $Cnumber = test_input($_POST["Cnumber"]);
            $UserArray = array('Cnumber' => test_input($_POST['Cnumber'])) ;
        } else {
            $CnumberErr = "Please enter at least 16 numbers";
        }
        if (empty($_POST["Exdate"])) {
            $ExdateErr = "This one is required";
        }
        if (empty($_POST["Scode"])) {
            $ScodeErr = "This one is required";
        } else {
            if (strlen($_POST["Scode"]) == '3') {
                $Scode = test_input($_POST["Scode"]);
                $UserArray = array('Scode' => test_input($_POST['Scode'])) ;
            } else {
                $ScodeErr = "Please enter 3 digits only";
            }
        }
    }
    if (empty($nameErr) && empty($surnameErr) && empty($emailErr) && empty($passwdErr) && empty($cpasswdErr) && empty($CnumberErr) && empty($ExdateErr) && empty($ScodeErr) && empty($addressErr)) {
            $Success = "Your Registration is accepted";
            $cookie_name = "Khadija";
            $cookie_value = "$email";
           setcookie($cookie_name, $cookie_value, time() + (86400 * 3), "/");
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
