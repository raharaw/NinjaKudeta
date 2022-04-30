<?php
include("koneksi.php");
$count = 1;

if(isset($_POST["employee_id"]))
{
 $output = '';
    $query = "
    DELETE from member where id = '".$_POST["employee_id"]."'
    ";
    if(mysqli_query($connect, $query))
    {
     $output .= '<label class="text-success">Data Berhasil Dihapus</label>';
     $select_query = "SELECT * FROM member ORDER BY id DESC";
     $result = mysqli_query($connect, $select_query);
     $output .= '
      <table class="table table-striped">
       <thead>
      <tr>
        <th width="auto">No</th>  
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
           <td>' . $count. '</td> 
                    <td>' . $row["nick"] . '</td> 
                           <td>' . $row["charid"] . '</td> 
                             <td>' . $row["token"] . ' <img src="token.png" width="15px"></td> 
                               <td>' . $row["onigiri"] . '  <img src="onigiri.png" width="15px"> </td> 
                                 <td>' . $row["pchp"] . '</td> 
                                   <td>' . $row["macro"] . '</td>  
                                      <td>' . $row["finalday"] . '</td>  
            <td><input type="button" name="view" value="Lihat Detail" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>
      <td><input type="button" name="edit" value="Edit" id="' . $row["id"] . '" class="btn btn-warning btn-xs edit_data" /></td>                   
            <td><input type="button" name="delete" value="Hapus" id="' . $row["id"] . '" class="btn btn-danger btn-xs hapus_data" /></td>
           
                    </tr>
      ';
     $count=$count+1;
      }
   
     $output .= '</tbody></table>';
    }else{
    $output .= mysqli_error($connect);
  }

    echo $output;
}
?>