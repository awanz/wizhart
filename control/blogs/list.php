<?php 
    session_start();
    $status = null;
    $notif = null;
    include_once("../includes/config.php");
    if (!empty($_GET)) {
      if (!empty($_GET['message'])) {
        $status = $_GET['status'];
        $notif = $_GET['message'];
      }
    }
    if (!empty($_SESSION)) {
      if ($_SESSION['login'] != "masuk") {
        header("Location: ../index.php");
      }
    }else{
      header("Location: ../index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="description" content="Wizhart.">
    <title>Blog Lists</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    <?php include_once("../includes/header.php"); ?>
    <?php include_once("../includes/sidebar.php"); ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-rss"></i> Blog Lists</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="#">Blog</a></li>
          <li class="breadcrumb-item"><a href="#">Lists</a></li>
        </ul>
      </div>
      <div class="row">
      <div class="col-md-12">
          <div class="tile">
            <?php 
              if (!empty($notif)) {
                  if ($status == 0) {
                    echo '<div class="alert alert-danger" role="alert"><center>';
                    echo $notif;
                    echo "</center></div>";
                  } 
                  if ($status == 1) {
                    echo '<div class="alert alert-primary" role="alert"><center>';
                    echo $notif;
                    echo "</center></div>";
                  } 
              }
            ?> 
            <div>
              <a href="add.php"><button class="btn btn-primary" type="submit">Add data</button></a>
              <br><br>
            </div>         
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Images</th>
                      <th>Title</th>
                      <th>Content Preview</th>
                      <th>Created by</th>
                      <th>View</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    include '../includes/mysqlbase.php';
                    $db = new MySQLBase($dbhost, $dbname, $dbuser, $dbpass, $dbcharset);
                    $result = $db->getAll("blogs");
                    $no = 1;
                    foreach ($result as $r) {
                  ?>
                    <tr>
                      <td><?= $no ?></td>
                      <td>
                        <img src="../../assets/images/blogs/<?= $r['images'] ?>" width="100px" alt="">
                      </td>
                      <td><?= $r['title'] ?></td>
                      <td><?= $r['content_preview'] ?></td>
                      <td><?= $r['user_id'] ?></td>
                      <td><?= $r['views'] ?></td>
                      <td> 
                        <a href="edit.php?id=<?= $r['id'] ?>">Edit</a> - 
                        <a href="delete.php?id=<?= $r['id'] ?>" onclick="return confirm('Are you sure you want to delete this data?');">Delete</a>
                      </td>
                    </tr>
                  <?php $no++; } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="../assets/js/plugins/pace.min.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="../assets/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../assets/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
  </body>
</html>