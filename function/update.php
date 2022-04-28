<?php
 
 $connect = mysqli_connect("localhost", "root", "", "ninjakudeta");
if(!empty($_POST))
{
 $output = '';
  $nick = mysqli_real_escape_string($connect, $_POST["nick"]);  
    $charid = mysqli_real_escape_string($connect, $_POST["charid"]); 
      $token = mysqli_real_escape_string($connect, $_POST["token"]);  
        $onigiri = mysqli_real_escape_string($connect, $_POST["onigiri"]);   
  $discord = mysqli_real_escape_string($connect, $_POST["discord"]);  
    $nowa = mysqli_real_escape_string($connect, $_POST["nowa"]);  
      $player = mysqli_real_escape_string($connect, $_POST["pchp"]);  
        $macro = mysqli_real_escape_string($connect, $_POST["macro"]);  
          $finalday = mysqli_real_escape_string($connect, $_POST["finalday"]);  
            $warn = mysqli_real_escape_string($connect, $_POST["warn"]);  

    $query = "
    update member set nick = '$nick', charid = '$charid', token ='$token', onigiri ='$onigiri',discord ='$discord' ,nowa ='$nowa',pchp ='$player',macro ='$macro', finalday ='$finalday', warn ='$warn' where id = '$_POST[id]'
    ";
   if(mysqli_query($connect, $query))
    {
     $output .= '<label class="text-success">Data Berhasil Disimpan</label>';
     $select_query = "SELECT * FROM member ORDER BY id DESC";
     $result = mysqli_query($connect, $select_query);
     $output .= '
       <table class="table table-striped">
  <thead>
     
                    <tr>  
        <th width="auto">Nickname</th>  
       <th width="auto">ID</th>
       <th width="auto">Token</th>
       <th width="auto">Onigiri</th>
       <th width="auto">Player</th>
       <th width="auto">Macro</th>
          <th width="auto">Final Day</th>
        <th width="auto">Detail</th>
       <th width="auto">Edit</th>
       <th width="auto">Hapus</th>
                    </tr>
                      </thead>
                        <tbody id="myTable">
     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
       <tr>  
                      
                                   <td>' . $row["nick"] . '</td> 
                           <td>' . $row["charid"] . '</td> 
                             <td>' . number_format($row["token"]) . ' <img src="dist/img/token.png" width="15px"></td> 
                               <td>' . number_format($row["onigiri"]) . '  <img src="dist/img/onigiri.png" width="15px"> </td> 
                                 <td>' . $row["pchp"] . '</td> 
                                   <td>' . $row["macro"] . '</td>  
                                      <td>' . $row["finalday"] . '</td>  
                         <td><input type="button" name="view" value="Lihat Detail" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
             <td><input type="button" name="edit" value="Edit" id="' . $row["id"] . '" class="btn btn-warning btn-xs edit_data" /></td>   
                         <td><input type="button" name="delete" value="Hapus" id="' . $row["id"] . '" class="btn btn-danger btn-xs hapus_data" /></td>
           
                    </tr>
      ';
     }
     $output .= '</tbody></table>';
    }else{
    $output .= mysqli_error($connect);
  }
    echo $output;
}
?>

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