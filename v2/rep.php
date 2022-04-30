<!DOCTYPE html>  
<html>  
  <head>  
  <title>Ninja Kudeta</title>  
  <script src="jquery.min.js"></script>  
  <link rel="stylesheet" href="bootstrap.min.css" />  
  <script src="bootstrap.min.js"></script>  
 </head>  
 <body>  






  <div class="container" style="width:1000px;"> 

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
         <li><a href="list.php">Member</a></li>
        <li><a href="rep.php">Reputation</a></li>
      </ul>
      <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" id="myInput"  class="form-control" placeholder="Cari..">
        </div>
      
      </form>
   
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


  <div class="card-body">
  <h3 align="center">Ninja Kudeta Reputation</h3>  
    <p> <b></b>.</p>


   <table id="myTable" class="table table-striped">
    <thead>
    <tr>
  <th scope="col">No</th>
      <th scope="col">Nick</th>
  
      <th scope="col">REP</th>
      <th scope="col">JOIN DATE</th>
    </tr>
      <tbody>

<?php

function curl($url, $headers = [], $postFields = [])
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    if (count($postFields) > 0) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
    }

    if (count($headers) > 0) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }
    $result = curl_exec($ch);
    curl_close($ch);
    return [
        'txt' => json_encode($result),
        'json' => json_decode($result, 1)
    ];
}

$response = curl('https://ninjasage.id/leaderboards/clan/ajax/144?_token%20=%20Y09ev6Ys3hEXh4xIVdwkjVWt6LyF7CoCtSsODjGN', ['X-Requested-With: XMLHttpRequest']);
foreach ($response['json']['members'] as $k => $r) {
    $no = $k + 1;
    $id = $r['char_id'];
    $name = $r['char_name'];
    $level = $r['char_level'];
    $rank = $r['char_rank'];
    $reputation = $r['reputation'];
    $gold_donate = $r['gold_donated'];
    $token_donate = $r['token_donated'];
    $join_date = $r['join_date'];

  echo "<tr>";
  echo "<td>".$no."</td>";
        echo "<td>".$name." </td>";
     
            echo "<td>".$reputation."</td>";
             echo "<td>".$join_date."</td>";


   // echo "{$no}. {$name} [{$id}] - {$rank}/{$level} - {$reputation} - {$token_donate}/{$gold_donate} - $join_date\n";
}

   // echo "{$no}. {$name} [{$id}] - {$reputation} - $join_date\n";
 
      //  echo "<td>".$d['pass']."</td>";
       // echo "<td>".$d['mail']."</td>";   
        //echo "<td>".$d['level']."</td>";
        //echo "<td><a href='edit.php?id=$d[id]'>Edit</a> | <a href='delete.php?id=$d[id]' onclick='return Confirm('Yakin Hapus?)''>Delete</a></td></tr>";        

     
   // echo "{$no}. {$name} [{$id}] - {$reputation} - $join_date\n";
  
    ?>
 </tbody>
    </table>
  


</body>

</html>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
