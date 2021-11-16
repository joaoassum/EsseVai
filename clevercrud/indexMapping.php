<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Personal Mapping</title>
  </head>
  <body>
   <?php require_once 'processMapping.php'; ?>

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
         <a class="nav-link active" href="index.php">Matriz de competência</a>
         <a class="nav-link" href="#">Quadro de delegação</a>
         <a class="nav-link" href="indexMapping.php">Personal mapping</a> 
         </div>
      </div>
   </div>
   </nav>

   <div class="d-flex flex-row justify-content-center">
      <form action="processMapping.php" method="POST">
         <input type="hidden" name="idmapping" value="<?php echo $idmapping; ?>">
         <div class="form-group mb-3 mt-3">
            <label>Nome</label>
            <input type="text" name="name" class="form-control" value="<?php echo $name ?>" placeholder="Nome" required>
         </div>

         <div class="form-group mb-3">
            <label>Idade</label>
            <input type="text" name="idade" class="form-control" value="<?php echo $idade ?>" placeholder="Idade" required>
         </div>

         <div class="form-group mb-3">
            <label>Quais seus amigos?</label>
            <input type="text" name="amigos" class="form-control" value="<?php echo $amigos ?>" placeholder="Quais seus amigos?" required>
         </div>

         <div class="form-group mb-3">
            <label>Possui alguma formação?</label>
            <input type="text" name="formacao" class="form-control" value="<?php echo $formacao ?>" placeholder="Possui alguma formação?" required>
         </div>

         <div class="form-group mb-3">
            <label>Quais seus valores?</label>
            <input type="text" name="valores" class="form-control" value="<?php echo $valores ?>" placeholder="Quais seus valores?" required>
         </div>

         <div class="form-group mb-3">
            <label>Quais suas metas?</label>
            <input type="text" name="metas" class="form-control" value="<?php echo $metas ?>" placeholder="Quais suas metas?" required>
         </div>

         <div class="form-group mb-3">
            <label>Quais seus hobbies?</label>
            <input type="text" name="hobbies" class="form-control" value="<?php echo $hobbies ?>" placeholder="Quais seus hobbies?" required>
         </div>

         <div class="form-group mb-3">
            <label>Quem são seus familiares?</label>
            <input type="text" name="familia" class="form-control" value="<?php echo $familia ?>" placeholder="Quem são seus familiares?" required>
         </div>

         <div class="form-group mb-3">
            <label>De onde você é?</label>
            <input type="text" name="cidade" class="form-control" value="<?php echo $cidade ?>" placeholder="De onde você é?" required>
         </div>

         <div class="form-group mb-3">
            <label>Qual são seus maiores sonhos?</label>
            <input type="text" name="sonhos" class="form-control" value="<?php echo $sonhos ?>" placeholder="Qual são seus maiores sonhos?" required>
         </div>

         <div class="form-group mb-3">
            <label>Quais luagres deseja conhecer?</label>
            <input type="text" name="lugaresConhecer" class="form-control" value="<?php echo $lugaresConhecer ?>" placeholder="Quais luagres deseja conhecer?" required>
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

      $result = $mysqli->query("SELECT * FROM mapping") or die($mysqli->error);

      //pre_r($result);
   ?>

   <div class="d-flex flex-row justify-content-center m-3">
      <table class="table">
         <thead>
            <tr>
               <th>Nome</th>
               <th>Idade</th>
               <th>Amigos</th>
               <th>Formação</th>
               <th>Valores</th>
               <th>Metas</th>
               <th>Hobbies</th>
               <th>Familia</th>
               <th>Cidade</th>
               <th>Sonhos</th>
               <th>Lugares para conhecer</th>
               <th colspan="2">Action</th>
            </tr>
         </thead>
         <?php 
            while($row = $result->fetch_assoc()): ?>
            <tr>
               <td><?php echo $row['name']; ?></td>
               <td><?php echo $row['idade']; ?></td>
               <td><?php echo $row['amigos']; ?></td>
               <td><?php echo $row['formacao']; ?></td>
               <td><?php echo $row['valores']; ?></td>
               <td><?php echo $row['metas']; ?></td>
               <td><?php echo $row['hobbies']; ?></td>
               <td><?php echo $row['familia']; ?></td>
               <td><?php echo $row['cidade']; ?></td>
               <td><?php echo $row['sonhos']; ?></td>
               <td><?php echo $row['lugaresConhecer']; ?></td>
               <td> 
                  <!-- Editar -->
                  <a href="indexMapping.php?edit=<?php echo $row['idmapping']; ?>"
                     class="btn btn-info"> Editar 
                  </a>

                  <!-- Excluir -->
                  <a href="indexMapping.php?delete=<?php echo $row['idmapping']; ?>"
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