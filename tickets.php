<?php
session_start();

include_once('config.php');

if (empty($_SESSION['name'])) {
  header("Location: login.php");
}

if ($_SESSION['is_admin'] != 'true') {
  header("Location: index.html");
}

$sql = "SELECT * FROM ticket_orders";

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
      scale: 1.4;
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
            <th class="bg-dark text-warning">From</th>
            <th class="bg-dark text-warning">To</th>
            <th class="bg-dark text-warning">Deperture Date</th>
            <th class="bg-dark text-warning">Return date</th>
            <th class="bg-dark text-warning">Trip</th>
            <th class="bg-dark text-warning">Update</th>
            <th class="bg-dark text-warning">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users_data as $user_data) { ?>
            <tr>
              <td class="bg-warning"> <?php echo $user_data['id']; ?> </td>
              <td class="bg-warning"> <?php echo $user_data['from_location']; ?> </td>
              <td class="bg-warning"> <?php echo $user_data['to_location']; ?> </td>
              <td class="bg-warning"> <?php echo $user_data['departure_date']; ?> </td>
              <td class="bg-warning"> <?php echo $user_data['return_date']; ?> </td>
              <td class="bg-warning"> <?php echo $user_data['trip_type']; ?> </td>
              <td class="bg-warning"> <a class="btn btn-dark text-warning" style="text-decoration: none;" href="editTicket.php?id=<?= $user_data['id']; ?>">Update</a> </td>
              <td class="bg-warning"> <a class="btn btn-dark text-warning" style="text-decoration: none;" href="deleteTicket.php?id=<?= $user_data['id']; ?>">Delete</a> </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>



  </main>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>