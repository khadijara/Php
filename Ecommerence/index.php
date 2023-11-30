<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    * {
        box-sizing: border-box;
        top: 50%;
        left: 50%;
        right: 50%;
    }

    h2 {
        background-color: lightcoral;
    }

    .container {
        padding: 16px;
        background-color: lightgray;
    }
</style>

<body>

    <?php require_once './registerForm.php'; ?>

    <h2> Ecommerce Registration Form</h2>


    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <div class="container">

            Name: <input type="text" name="name" value="<?php echo $name; ?>">
            <span class="error"> * <?php echo $nameErr; ?> </span> <br>

            <br>Surname: <input type="text" name="surname" value="<?php echo $surname; ?>">
            <span class="error"> * <?php echo $surnameErr; ?> </span> <br>

            <br> Email: <input type="email" name="email" value="<?php echo $email; ?>">
            <span class="error"> * <?php echo $emailErr; ?> </span><br>

            <br> Password: <input type="password" name="passwd" value="<?php echo $passwd; ?>">
            <span class="error"> * <?php echo $passwdErr; ?> </span><br>

            <br> Confirm Password: <input type="password" name="cpasswd" value="<?php echo $cpasswd; ?>">
            <span class="error"> * <?php echo $cpasswdErr; ?> </span><br>

            <br> Shipping Address: <input type="text" name="address" value="<?php echo $address; ?>">
            <span class="error"> <?php echo $addressErr; ?> </span><br>

            <br> Card Number: <input type="number" name="Cnumber" value="<?php echo $Cnumber; ?>">
            <span class="error"> <?php echo $CnumberErr; ?> </span><br>

            <br> Expiry Date: <input type="date" name="Exdate" value="<?php echo $Exdate; ?>">
            <span class="error"> <?php echo $ExdateErr; ?> </span><br>

            <br> Security Code: <input type="number" name="Scode" value="<?php echo $Scode; ?>">
            <span class="error"> <?php echo $ScodeErr; ?> </span><br>

            <br><input type="Submit" name="Register" value="Register" >
        </div>
    </form>



</body>

</html>