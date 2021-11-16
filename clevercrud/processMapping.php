<?php 

session_start();

$mysqli = new mysqli('localhost', 'root', 'password', 'management') or die(mysqli_error($mysqli));

$idmapping = 0;
$update = false;
$name = "";
$idade = "";
$amigos = "";
$formacao = "";
$valores = "";
$metas = "";
$hobbies = "";
$familia = "";
$cidade = "";
$sonhos = "";
$lugaresConhecer = "";

  if(isset($_POST['save'])) {
   $name = $_POST['name'];
   $idade = $_POST['idade'];
   $amigos = $_POST['amigos'];
   $formacao = $_POST['formacao'];
   $valores = $_POST['valores'];
   $metas = $_POST['metas'];
   $hobbies = $_POST['hobbies'];
   $familia = $_POST['familia'];
   $cidade = $_POST['cidade'];
   $sonhos = $_POST['sonhos'];
   $lugaresConhecer = $_POST['lugaresConhecer'];

   $mysqli->query("INSERT INTO mapping (name, idade, amigos, formacao, valores, metas, hobbies, familia, cidade, sonhos, lugaresConhecer) VALUES ('$name', '$idade', '$amigos', '$formacao', '$valores', '$metas', '$hobbies', '$familia', '$cidade', '$sonhos', '$lugaresConhecer')") or die($mysqli->error);

   $_SESSION['message'] = "Dado salvo com sucesso";
   $_SESSION['msg_type'] = "success";

   header("location: indexMapping.php");
}

if(isset($_GET['delete'])) {
   $idmapping = $_GET['delete'];

   $mysqli->query("DELETE FROM mapping WHERE idmapping = $idmapping") or die($mysqli->error);

   $_SESSION['message'] = "Dado salvo com sucesso";
   $_SESSION['msg_type'] = "danger";

   header("location: indexMapping.php");
}

if(isset($_GET['edit'])) {
   $idmapping = $_GET['edit'];

   $update = true;

   $result = $mysqli->query("SELECT * FROM mapping WHERE idmapping = $idmapping") or die($mysqli->error);

   if($result->num_rows){
      $row=$result->fetch_array();

      $name = $row['name'];
      $idade = $row['idade'];
      $amigos = $row['amigos'];
      $formacao = $row['formacao'];
      $valores = $row['valores'];
      $metas = $row['metas'];
      $hobbies = $row['hobbies'];
      $familia = $row['familia'];
      $cidade = $row['cidade'];
      $sonhos = $row['sonhos'];
      $lugaresConhecer = $row['lugaresConhecer'];
   }
}

if(isset($_POST['update'])) {
   $idmapping = $_POST['idmapping'];
   $name = $_POST['name'];
   $idade = $_POST['idade'];
   $amigos = $_POST['amigos'];
   $formacao = $_POST['formacao'];
   $valores = $_POST['valores'];
   $metas = $_POST['metas'];
   $hobbies = $_POST['hobbies'];
   $familia = $_POST['familia'];
   $cidade = $_POST['cidade'];
   $sonhos = $_POST['sonhos'];
   $lugaresConhecer = $_POST['lugaresConhecer'];

   $mysqli->query("UPDATE mapping SET name='$name',idade='$idade', amigos='$amigos', formacao='$formacao', valores='$valores', metas='$metas', hobbies='$hobbies', familia='$familia', cidade='$cidade', sonhos='$sonhos', lugaresConhecer='$lugaresConhecer' WHERE idmapping=$idmapping") or die ($mysqli->error);

   $_SESSION['message'] = "Dado salvo com sucesso";
   $_SESSION['msg_type'] = "warning";

   header('location: indexMapping.php');
}