<?php 
include('conn.php'); 
 session_start();
 $author = $_SESSION['user'];

if(isset($_POST['publish'])){
    if (!empty($_POST['title'])){
    $title = $_POST['title'];
    $desc = $_POST['editor1'];
    $fileTemp = $_FILES['image']['tmp_name'];
    $fileName = $_FILES['image']['name'];
    $filePath = "./img/".basename($fileName);
    move_uploaded_file($fileTemp,$filePath);
  
    $q ="INSERT INTO `posts`(`title`,`description`,`author`,`image`) VALUES ('$title','$desc','$author','$filePath')";
    $query = mysqli_query($con,$q);
    if ($query) {
        header('location:adminPosts.php');
      } else {
          echo "Error: " . $query . "<br>" . mysqli_error($con);
      }
    }else
    {
      echo 'alert("Please enter the details correctly");';
    }
  }

?>
