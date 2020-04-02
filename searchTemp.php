
              <div class="row">
                <div class="col-md-12">
                  <form action="search.php" method="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for..." name="searchQuery">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button" name="search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                      </span>
                    </div>
                  </form>
                </div>
              </div>
              <br>
              
<table class="table table-striped table-hover">
                <tr>
                  <th>Sr. No</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
                <tr>
                  <?php
                  if (isset($_POST['search'])) {
                    $search = $_POST['searchQuery'];
                    $q = "select * from posts where `sn`=$search";
                    $query = mysqli_query($con, $q);
                    while ($res = mysqli_fetch_array($query)) {
                  ?>
                      <td><?php echo $res['sn'];  ?></td>
                      <td><?php echo $res['title'];  ?></td>
                      <td><?php echo $res['author'];  ?></td>
                      <td><?php echo $res['created'];  ?></td>
                      <td><a class="btn btn-primary btn-sm" href="edit.php">Edit</a> <a class="btn btn-danger btn-sm" href="delete.php?author=<?php echo $res['author']; ?>">Delete</a></td>
                </tr>
            <?php
                    }
                  }
            ?>