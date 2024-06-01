<?php
session_start();

include_once('config.php');

if (empty($_SESSION['name'])) {
  header("Location: login.php");
}

if ($_SESSION['is_admin'] != 'true') {
  header("Location: index.html");
}

$sql = "SELECT * FROM contact_messages";

$selectUsers = $conn->prepare($sql);
$selectUsers->execute();

$users_data = $selectUsers->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="./css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .nav-link:hover {
      scale: 1.1;
    }
  </style>
</head>

<body class="bg-dark">
  <nav class="navbar navbar-expand-lg bg-warning navbar-warning">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <?php echo "Welcome " . $_SESSION['name']; ?>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">Admin</a>
          </li>
          
        </ul>
        <div class="d-flex">
          <a href="logout.php">
            <button class="btn btn-outline-dark">Logout
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </button>
          </a>
        </div>
      </div>
    </div>
  </nav>

  <main>
    <div class="d-flex justify-content-center align-items-center py-3 mb-3 border-bottom">
      <h1 class="h1"> Tickets Dashboard</h1>
    </div>
    <div class="container">
      <h2 class="text-warning">Flights managment</h2>
      <table class="table table-striped table-sm">
        <thead>
          <tr class="table-warning">
            <th class="bg-dark text-warning">Id</th>
            <th class="bg-dark text-warning">name</th>
            <th class="bg-dark text-warning">email</th>
            <th class="bg-dark text-warning">messages</th>
            <th class="bg-dark text-warning">Phone Number</th>
        </thead>
        <tbody>
          <?php foreach ($users_data as $user_data) { ?>
            <tr>
              <td class="bg-warning"> <?php echo $user_data['id']; ?> </td>
              <td class="bg-warning"> <?php echo $user_data['name']; ?> </td>
              <td class="bg-warning"> <?php echo $user_data['email']; ?> </td>
              <td class="bg-warning"> <?php echo $user_data['message']; ?> </td>
              <td class="bg-warning"> <?php echo $user_data['phone_number']; ?> </td>
           </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>



  </main>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>