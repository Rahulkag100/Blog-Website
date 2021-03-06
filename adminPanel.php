<?php
include('conn.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Area | Dashboard</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Black+Ops+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
</head>

<body>

  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#" style=" font-family: 'Black Ops One', cursive;color: white;"><i class="fa fa-comments" aria-hidden="true" style="color:#ff5c33; font-size:23px;"></i>&nbsp;Blogg<span style="color: #ff5c33;">W</span>eb</a>
      </div>
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="adminPanel.php">Dashboard</a></li>
          <li><a href="adminPosts.php">Posts</a></li>
          <li><a href="users.php">Users</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#">Welcome! <?php echo $_SESSION['user']; ?></a></li>
          <li><a href="adminHomePage.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp; Articles</a></li>
          <li><a href="login.php"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
  </nav>

  <header id="header">
    <div class="container">
      <div class="row">
        <div class="col-md-10">
          <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Posts <small>Manage Blog Posts</small></h1>
        </div>
        <div class="col-md-2">
          <div class="postCreate pt-3">
            <button class="btn"><a data-toggle="modal" data-target="#addPage">Create Post</a></button>
          </div>
        </div>
      </div>
    </div>
  </header>

  <section id="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="active">Dashboard</li>
      </ol>
    </div>
  </section>

  <section id="main">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="list-group">
            <a href="index.php" class="list-group-item active main-color-bg">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
            </a>
            <a href="pages.html" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Pages <span class="badge">
                <?php
                $sql = "SELECT posid FROM posts";
                if ($result = mysqli_query($con, $sql)) {
                  $rowcount = mysqli_num_rows($result);
                }
                echo $rowcount;
                ?>
              </span></a>
            <a href="posts.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Posts <span class="badge">
                <?php
                $sql = "SELECT posid FROM posts";
                if ($result = mysqli_query($con, $sql)) {
                  $rowcount = mysqli_num_rows($result);
                }
                echo $rowcount;
                ?>
              </span></a>
            <a href="users.html" class="list-group-item"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="badge">
                <?php
                $sql = "SELECT uid FROM users";
                if ($result = mysqli_query($con, $sql)) {
                  $rowcount = mysqli_num_rows($result);
                }
                echo $rowcount + 1;
                ?>
              </span></a>
          </div>

          <!-- <div class="well">
              <h4>Disk Space Used</h4>
              <div class="progress">
                  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                      60%
              </div>
            </div>
            <h4>Bandwidth Used </h4>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">
                    40%
            </div>
          </div>
            </div> -->
        </div>
        <div class="col-md-9">
          <!-- Website Overview -->
          <div class="panel panel-default">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Website Overview</h3>
            </div>
            <div class="panel-body">
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <?php
                    $sql = "SELECT uid FROM users";
                    if ($result = mysqli_query($con, $sql)) {
                      $rowcount = mysqli_num_rows($result);
                    }
                    echo $rowcount + 1;
                    ?>
                  </h2>
                  <h4>Users</h4>
                </div>
              </div>
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                    <?php
                    $sql = "SELECT posid FROM posts";
                    if ($result = mysqli_query($con, $sql)) {
                      $rowcount = mysqli_num_rows($result);
                    }
                    echo $rowcount;
                    ?>
                  </h2>
                  <h4>Pages</h4>
                </div>
              </div>
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    <?php
                    $sql = "SELECT posid FROM posts";
                    if ($result = mysqli_query($con, $sql)) {
                      $rowcount = mysqli_num_rows($result);
                    }
                    echo $rowcount;
                    ?>
                  </h2>
                  <h4>Posts</h4>
                </div>
              </div>
              <div class="col-md-3">
                <div class="well dash-box">
                  <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>
                    <?php
                    $sql = "SELECT uid FROM users";
                    if ($result = mysqli_query($con, $sql)) {
                      $rowcount = mysqli_num_rows($result);
                    }
                    echo $rowcount + 1;
                    ?>
                  </h2>
                  <h4>Visitors</h4>
                </div>
              </div>
            </div>
          </div>

          <!-- Latest Users -->
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Latest Users</h3>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-hover">
                <tr>
                  <th>Sr No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Joined</th>
                </tr>
                <tr>
                  <?php
                  $serial = 1;
                  $q = "select * from users ORDER BY uid DESC LIMIT 10";
                  $query = mysqli_query($con, $q);
                  while ($res = mysqli_fetch_array($query)) {
                  ?>
                    <td><?php echo $serial;
                        $serial = $serial + 1;  ?></td>
                    <td><?php echo $res['name'];  ?></td>
                    <td><?php echo $res['email'];  ?></td>
                    <td><?php echo $res['joined'];  ?></td>
                </tr>
              <?php
                  }
              ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer id="footer">
    <p>Copyright BlogggWeb, &copy; 2020</p>
  </footer>

  <!-- Modals -->

  <!-- Add Page -->
  <div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="adminInsert.php" enctype="multipart/form-data">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">New Post</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Post Title</label>
              <input type="text" class="form-control" placeholder="Page Title" name="title">
            </div>
            <div class="form-group">
              <label>Post Image</label>
              <input type="file" class="form-control" placeholder="Page Image" name="image">
            </div>
            <div class="form-group">
              <label>Post Description</label>
              <textarea name="editor1" class="form-control" placeholder="Post Description"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" name="publish">Publish</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    CKEDITOR.replace('editor1');
  </script>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>