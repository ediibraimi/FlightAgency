<?php 
      session_start();
      include_once('config.php');

      $id = $_GET['id'];

      $sql = "SELECT * FROM users WHERE id=:id";
      $selectUser = $conn->prepare($sql);
      $selectUser->bindParam(':id', $id);
      $selectUser->execute();
      $user_data = $selectUser->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body class="bg-dark"> 
    <div class="container mt-5">
        <div class="row">
            <div class="col-4 offset-4">
                <h1 class="text-warning">Edit user details</h1>   
                <div class="table-responsive">
                    <form action="updateUsers.php" method="post">

                        <div class="form-floating mb-2">
                            <input type="number" class="form-control" name="id" id="floatingInput" 
                            value="<?php echo $user_data['id'] ?>">
                            <label for="floatingInput">Id</label>
                        </div>

                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="name" id="floatingInput" placeholder="Name"
                            value="<?php echo $user_data['name'] ?>">
                            <label for="floatingInput">name</label>
                        </div>

                        <div class="form-floating mb-2">
                            <input type="text" class="form-control" name="lastname" id="floatingInput" placeholder="lastname"
                            value="<?php echo $user_data['lastname'] ?>">
                            <label for="floatingInput">lastname</label>
                        </div>

                        <div class="form-floating mb-2">
                            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="Email"
                            value="<?php echo $user_data['email'] ?>">
                            <label for="floatingInput">Email</label>
                        </div>

                        <button class="w-100 btn btn-lg btn-warning " type="submit" name="submit">Change</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>