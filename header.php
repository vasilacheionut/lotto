<?php
  include 'config.php';
  if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $verifica = $_POST['verifica'];
    $verifica_min = $_POST['verifica_min'];
    $verifica_max = $_POST['verifica_max'];
  } else {
    $verifica = '';
    $verifica_min = 3;
    $verifica_max = 5;    
  }     
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

  <!-- My Style-->
  <link rel="stylesheet" href="assets/style.css">

  <title>Lotto - <?= $title; ?></title>
</head>

<body>
  <?php
  if ($user->is_login()) {
    $result_ruota_selezionata_read_single = $ruota_selezionata->read_single($user->getId());   
    foreach ($result_ruota_selezionata_read_single as $key) {
      $result_user = $user->read_single($key['user_id']);
      $result_ruote = $ruote->read_single($key['ruote_id']);      
      $nome = $result_ruote[0]['nome'];
      $ruota = $result_ruote[0]['ruota'];      
    }        
  } else {
    $result_ruota_selezionata_read_single = $ruota_selezionata->read_single(1);   
    foreach ($result_ruota_selezionata_read_single as $key) {
      $result_user = $user->read_single($key['user_id']);
      $result_ruote = $ruote->read_single($key['ruote_id']);      
      $nome = $result_ruote[0]['nome'];
      $ruota = $result_ruote[0]['ruota'];      
    }    
  }
    // $ruota = "BA"
    // "ruota_BA_archivio"
    $ruote_nome_archivio->setTable($ruota);
  ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <a class="navbar-brand" href=".">Ruote</a>    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="archivio.php">Archivio</a>
          </li>    
          <li class="nav-item">
            <a class="nav-link" href="ruota.php">Ruota <span class='text-danger'><?= $nome; ?></span></a>
          </li>                      
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Frequenze
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="frequenze1.php">Frequenze 1</a>
              <a class="dropdown-item" href="frequenze2.php">Frequenze 2</a>
              <a class="dropdown-item" href="frequenze3.php">Frequenze 3</a>
              <a class="dropdown-item" href="frequenze4.php">Frequenze 4</a>
              <a class="dropdown-item" href="frequenze5.php">Frequenze 5</a>              
            </div>
          </li>                
          <?php if ($user->is_login() && $user->getRole() == 2) : ?>        
          <li class="nav-item">
            <a class="nav-link" href="users.php">Users</a>
          </li>
          <?php endif; ?>          

      </ul>
      <form class="form-inline my-2 my-lg-0" action="verifica.php" method="post">
      <div class="form-row">
        <div class="col">
          <input type="number" class="form-control" id="verifica_min"  name="verifica_min" value="<?= $verifica_min; ?>" min="0" max="5">
        </div>
        <div class="form-check">
          <span>/</span>
        </div>      
        <div class="col">
          <input type="number" class="form-control" id="verifica_max"  name="verifica_max" value="<?= $verifica_max; ?>" min="0" max="5">
        </div>
      </div>        
        <input class="form-control mr-sm-2" type="verifica" id='verifica' name='verifica' placeholder="Ruota <?= $nome; ?> : 1,2,3,4,5" aria-label="verifica" value="<?= $verifica; ?>">
        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Verifica</button>
        <?php if ($user->is_login()) : ?>
          <div class="dropdown">
            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user" aria-hidden="true"> <?php echo $user->getDisplayName(); ?></i>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="configura.php">Configura Ruota</a>                                  
              <div class="dropdown-divider"></div>                  
              <a class="dropdown-item" href="profilo.php">Mio profilo</a>           
              <div class="dropdown-divider"></div>          
              <?php if ($user->is_login() && $user->getRole() == 2) : ?>                             
              <a class="dropdown-item" href="update.php">Aggiorna</a>                            
              <div class="dropdown-divider"></div>
              <?php endif; ?>              
              <a class="btn btn-outline-danger btn-sm btn-block" href="logout.php">Logout</a>
            </div>
          </div>
        <?php else : ?>
          <a class="btn btn-outline-success my-2 my-sm-0" href="login.php">Login</a>
          <a class="btn btn-outline-secondary my-2 my-sm-0" href="register.php">Register</a>
        <?php endif; ?>
      </form>
    </div>
  </nav>

  <div class="container-fluid up-space">
    <!-- Content here -->