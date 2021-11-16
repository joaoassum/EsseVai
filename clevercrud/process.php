<?php 

session_start();

$mysqli = new mysqli('localhost', 'root', 'password', 'management') or die(mysqli_error($mysqli));

$idmatriz = 0;
$update = false;
$name = "";
$csharp = "";
$poo = "";
$bd = "";
$git = "";
$github = "";

  if(isset($_POST['save'])) {
   $name = $_POST['name'];
   $csharp = $_POST['csharp'];
   $poo = $_POST['poo'];
   $bd = $_POST['bd'];
   $git = $_POST['git'];
   $github = $_POST['github'];

   $mysqli->query("INSERT INTO matriz (name, csharp, poo, bd, git, github) VALUES ('$name', '$csharp', '$poo', '$bd', '$git', '$github')") or die($mysqli->error);

   $_SESSION['message'] = "Dado salvo com sucesso";
   $_SESSION['msg_type'] = "success";

   header("location: index.php");
}

if(isset($_GET['delete'])) {
   $idmatriz = $_GET['delete'];

   $mysqli->query("DELETE FROM matriz WHERE idmatriz = $idmatriz") or die($mysqli->error);

   $_SESSION['message'] = "Dado salvo com sucesso";
   $_SESSION['msg_type'] = "danger";

   header("location: index.php");
}

if(isset($_GET['edit'])) {
   $idmatriz = $_GET['edit'];

   $update = true;

   $result = $mysqli->query("SELECT * FROM matriz WHERE idmatriz = $idmatriz") or die($mysqli->error);

   if($result->num_rows){
      $row=$result->fetch_array();

      $name = $row['name'];
      $csharp = $row['csharp'];
      $poo = $row['poo'];
      $bd = $row['bd'];
      $git = $row['git'];
      $github = $row['github'];
   }
}

if(isset($_POST['update'])) {
   $idmatriz = $_POST['idmatriz'];
   $name = $_POST['name'];
   $csharp = $_POST['csharp'];
   $poo = $_POST['poo'];
   $bd = $_POST['bd'];
   $git = $_POST['git'];
   $github = $_POST['github'];

   $mysqli->query("UPDATE matriz SET name='$name',csharp='$csharp', poo='$poo', bd='$bd', git='$git', github='$github' WHERE idmatriz=$idmatriz") or die ($mysqli->error);

   $_SESSION['message'] = "Dado salvo com sucesso";
   $_SESSION['msg_type'] = "warning";

   header('location: index.php');
}