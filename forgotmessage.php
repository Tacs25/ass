<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Verification</title>
</head>
    <style>

        html {
            height: 100%;
        }
        body {
            padding: 0;
            margin: 0;

        }
        h2 {
            font-size: 45px;
            font-weight: 450;
            line-height: 50px;
            margin: 0;
            padding: 0;
            text-align: center;
            font-family: Calibre, Helvetica Neue, Segoe UI, Helvetica, Arial, Lucida Grande, sans-serif;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-50%);
            }

       


        
    </style>
<body>

<?php 
	if (isset($_GET["email"])){
        $email = $_GET['email'];
    }
            ?>
<h2> <b> Password Reset Email </b> <br> 
    Please check your email <em><?php echo $email ?> </em> for reset password link. <br> 
    Kindly check spam if it is not there. <br>
    <i class="bi bi-envelope-exclamation-fill"
    style="font-size: 11rem; color: green; "></i> </h2>

    
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>