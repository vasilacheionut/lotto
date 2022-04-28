<?php
  $title = "Update";
  include "header.php";  
?>
<form action="" method="post">
  <button type="submit" class="float-right btn btn-success" name="update">Update</button>  
</form>
<?php if ($user->is_login() && $user->getRole() == 2 && isset($_POST['update'])) : ?>                             
<div class="container">
  <div class="row">
     <?php
        $result_ruote_read = $ruote->read();
        foreach ($result_ruote_read as $key) {
          $ruote_nome_archivio->create_ruota($key['id'],$key['ruota']);    
            echo "Created Ruota ". $key['ruota'] ." ". $key['nome'] . '<br/>';          
          $ruote_nome_archivio->frequenze_5($key['id'],$key['ruota']);
            echo "Created frequenze_5 ". $key['ruota'] ." ". $key['nome'] . '<br/>';                    
          $ruote_nome_archivio->frequenze_4($key['id'],$key['ruota']);
            echo "Created frequenze_4 ". $key['ruota'] ." ". $key['nome'] . '<br/>';                              
          $ruote_nome_archivio->frequenze_3($key['id'],$key['ruota']);          
            echo "Created frequenze_3 ". $key['ruota'] ." ". $key['nome'] . '<br/>';                              
          $ruote_nome_archivio->frequenze_2($key['id'],$key['ruota']);          
            echo "Created frequenze_2 ". $key['ruota'] ." ". $key['nome'] . '<br/>';                              
          $ruote_nome_archivio->frequenze_1($key['id'],$key['ruota']);          
            echo "Created frequenze_1 ". $key['ruota'] ." ". $key['nome'] . '<br/>';                              
        }        
     ?>
  </div>
</div>
<?php else : ?>
<?php
  $location = "index.php";
  header("location:$location");
?>
<?php endif; ?>   


<?php
  include "footer.php";
?>