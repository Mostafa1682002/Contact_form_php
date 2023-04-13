<?php

if (isset($_POST['send'])) {
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $mesage = filter_var(trim($_POST['mesage']), FILTER_SANITIZE_STRING);
    $Errors = [];
    if (empty($username)) {
        $Errors['user_requierd'] = "Please Enter Your name....";
    }
    if (empty($email)) {
        $Errors['email_requierd'] = "Please Enter Your email....";
    }
    if (empty($phone)) {
        $Errors['phone_requierd'] = "Please Enter Your phone....";
    }
    if (empty($mesage)) {
        $Errors['mesage_requierd'] = "Please Enter Your message....";
    }
    // $connection = new PDO('mysql:host=sql207.eb2a.com;dbname=eb2a_33593927_contact_form;charset=utf8;', 'eb2a_33593927', 'most1682002');
    $connection = new PDO('mysql:host=localhost;dbname=contact_form;charset=utf8;', 'root', '');
    if (isset($_POST['send']) && empty($Errors)) {
        $connection->query("INSERT INTO `message` (`Name`, `Email`, `Phone`, `Message`) VALUES ('$username', '$email', '$phone', '$mesage')");
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- CSS file  -->
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Form Contact</title>
</head>

<body>


    <div class="container mt-5">
        <?php if (isset($_POST['send']) && empty($Errors)) { ?>
            <p class="alert alert-success">Your Massege Is Send</p>
        <?php } ?>
        <h1 class="text-center m-3">Contact Form</h1>
        <form action="" method="post" class="form">
            <div class="mb-3">
                <i class="fas fa-home"></i>
                <input class="form-control " type="text" value="<?php echo (!empty($username) && !empty($Errors)) ? $username : ''; ?>" name="username" placeholder="Enter your username">
                <span class="astric">*</span>
            </div>
            <?php
            if (!empty($Errors['user_requierd'])) {
                echo "<p class='alert alert-danger'>" . $Errors['user_requierd'] . "</p>";
            }
            ?>
            <div class="mb-3">
                <i class="fas fa-envelope"></i>
                <input class="form-control" type="email" value="<?php echo !empty($email) && !empty($Errors) ? $email : ''; ?>" name="email" placeholder="Enter your email">
                <span class="astric">*</span>
            </div>
            <?php
            if (!empty($Errors['email_requierd'])) {
                echo "<p class='alert alert-danger'>" . $Errors['email_requierd'] . "</p>";
            }
            ?>
            <div class="mb-3">
                <i class="fas fa-phone"></i>
                <input class="form-control" value="<?php echo !empty($phone) && !empty($Errors) ? $phone : ''; ?>" type="number" name="phone" placeholder="Enter your phone number">
                <span class="astric">*</span>
            </div>
            <?php
            if (!empty($Errors['phone_requierd'])) {
                echo "<p class='alert alert-danger'>" . $Errors['phone_requierd'] . "</p>";
            }
            ?>
            <div class="mb-3">
                <i class="fas fa-message"></i>
                <textarea class="form-control" name="mesage" placeholder="Enter your Message"><?php echo (!empty($mesage) && !empty($Errors)) ? $mesage : ''; ?></textarea>
                <span class="astric">*</span>
            </div>
            <?php if (!empty($Errors['mesage_requierd'])) {
                echo "<p class='alert alert-danger'>" . $Errors['mesage_requierd'] . "</p>";
            } ?>
            <div>
                <i class="fa-solid fa-paper-plane text-light"></i>
                <input type="submit" value="Send" name="send" class="btn btn-primary">
            </div>
        </form>
    </div>
    <!-- bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>