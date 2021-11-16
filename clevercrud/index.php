<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Matriz de compentência</title>
  </head>
  <body>
   <?php require_once 'process.php'; ?>

   <?php 

      if(isset($_SESSION['message'])): ?>

      <div class="alert alert-<?=$_SESSION['msg_type']?>">

         <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
         ?>
         
      </div>
      <?php endif; ?>

   <nav class="navbar navbar-expand-lg navbar-light bg-light">
   <div class="container-fluid">
      <a class="navbar-brand" href="#"><strong>Management3.0</strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
         <div class="navbar-nav">
         <a class="nav-link active"href="index.php">Matriz de competência</a>
         <a class="nav-link" href="#">Quadro de delegação</a>
         <a class="nav-link" href="indexMapping.php">Personal mapping</a> 
         </div>
      </div>
   </div>
   </nav>

   <div class="d-flex flex-row justify-content-center">
      <form action="process.php" method="POST">
         <input type="hidden" name="idmatriz" value="<?php echo $idmatriz; ?>">
         <div class="form-group mb-3 mt-3">
            <label>Nome</label>
            <input type="text" name="name" class="form-control" value="<?php echo $name ?>" placeholder="Nome" required>
         </div>

         <div class="form-group mb-3">
            <label>C#</label>
            <input type="text" name="csharp" class="form-control" value="<?php echo $csharp ?>" placeholder="C#" required>
         </div>

         <div class="form-group mb-3">
            <label>Programação Orientada a Objetos(POO)</label>
            <input type="text" name="poo" class="form-control" value="<?php echo $poo ?>" placeholder="POO" required>
         </div>

         <div class="form-group mb-3">
            <label>Banco de dados(BD)</label>
            <input type="text" name="bd" class="form-control" value="<?php echo $bd ?>" placeholder="Banco de dados" required>
         </div>

         <div class="form-group mb-3">
            <label>Git</label>
            <input type="text" name="git" class="form-control" value="<?php echo $git ?>" placeholder="Git" required>
         </div>

         <div class="form-group mb-3">
            <label>GitHub</label>
            <input type="text" name="github" class="form-control" value="<?php echo $github ?>" placeholder="GitHub" required>
         </div>

         <div class="form-group">

            <?php 
            if ($update == true): ?>
               <button type="submit" class="btn btn-info" name="update">Atualizar</button>
            <?php else: ?>
               <button type="submit" class="btn btn-primary" name="save">Salvar</button>
            <?php endif; ?>
            
         </div>
      </form>
   </div>

   
   <?php
      $mysqli = new mysqli('localhost', 'root', 'password', 'management') or die(mysqli_error($mysqli));

      $result = $mysqli->query("SELECT * FROM matriz") or die($mysqli->error);

      //pre_r($result);
   ?>

   <div class="d-flex flex-row justify-content-center m-3">
      <table class="table">
         <thead>
            <tr>
               <th>Nome</th>
               <th>C#</th>
               <th>POO</th>
               <th>BD</th>
               <th>Git</th>
               <th>GitHub</th>
               <th colspan="2">Action</th>
            </tr>
         </thead>
         <?php 
            while($row = $result->fetch_assoc()): ?>
            <tr>
               <td><?php echo $row['name']; ?></td>
               <td><?php echo $row['csharp']; ?></td>
               <td><?php echo $row['poo']; ?></td>
               <td><?php echo $row['bd']; ?></td>
               <td><?php echo $row['git']; ?></td>
               <td><?php echo $row['github']; ?></td>
               <td> 
                  <!-- Editar -->
                  <a href="index.php?edit=<?php echo $row['idmatriz']; ?>"
                     class="btn btn-info"> Editar 
                  </a>

                  <!-- Excluir -->
                  <a href="index.php?delete=<?php echo $row['idmatriz']; ?>"
                     class="btn btn-danger"> Deletar 
                  </a>
               </td>
            </tr> 
            <?php endwhile; ?>
      </table>
   </div>

   <?php
      pre_r($result->fetch_assoc());
      pre_r($result->fetch_assoc());

      function pre_r($array) {
         echo '<pre>';
         print_r($array);
         echo '</pre>';
      }
   ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>