<?php
  $title = "Frequenze 5";
  include "header.php";
  $frequenze->setTable($ruota, 5);
  $result_frequenze = $frequenze->read();  
?>

<div class="container">

  <div class="table-responsive">
    <table class="table  table-hover table-bordered table-sm text-center">      
      <thead class='thead-dark'>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Ruota</th>          
          <th scope="col">Data</th>
          <th scope="col">N1</th>
          <th scope="col">N2</th>
          <th scope="col">N3</th>
          <th scope="col">N4</th>
          <th scope="col">N5</th>
          <th scope="col">Frequenza</th>	          
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($result_frequenze as $key) {
          echo "<tr>";
            echo '<td>' . $key['id'] . '</td>';
            echo '<td>' . $key['ruota'] . '</td>';            
            echo '<td>' . $key['data'] . '</td>';
            echo '<td>' . $key['n1'] . '</td>';
            echo '<td>' . $key['n2'] . '</td>';   
            echo '<td>' . $key['n3'] . '</td>';     
            echo '<td>' . $key['n4'] . '</td>';                        
            echo '<td>' . $key['n5'] . '</td>';                        
            echo '<td>' . $key['frequenza'] . '</td>';
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

</div>
<?php
  include "footer.php";
?>