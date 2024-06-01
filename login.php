<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Flight - Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/login.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="bg-dark">
    
<section class="banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="left-side">
                        <div class="logo">
                            <img src="img/logo.png" alt="Flight Template">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="container">
        <div class="row">
            <div class="col-4 offset-4">
                <div class="form-signin mt-5">
                    <form action="loginLogic.php" method="post">
                        <h1 class="h3 mb-3 fw-normal" style="color: white;">Sign in</h1>

                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="email" id="floatingInput" placeholder="email">
                            <label for="floatingInput">email</label>
                        </div>


                        <div class="form-floating mb-2">
                            <input type="password" class="form-control" name="password" id="floatingInput" placeholder="Password">
                            <label for="floatingInput">Password</label>
                        </div>


                        <div class="checkbox mb-3">
                            <label for="" style="color: white;">
                                <input type="checkbox" value="remember-me" name="" id=""> Remember Me
                            </label>
                        </div>

                        <button name="submit" class="w-100 btn btn-lg btn-warning">Sign In</button>
                        <span style="color: white;" >Don't have an account?: </span> <a style="text-decoration: none; color:orange;" href="signUp.php">Sign up</a>

                    </form>
                </div>
            </div>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
