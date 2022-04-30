<?php  
//index.php
include("koneksi.php");
session_start();
if($_SESSION['status'] !="login"){
  header("location:index.php");
}
//include_once("koneksi.php");
$query = "SELECT * FROM member ORDER BY id DESC";
$result = mysqli_query($connect , $query);
 ?>  
<!DOCTYPE html>  
<html>  
  <head>  
  <title>Ninja Kudeta</title>  

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="jquery.min.js"></script>
   <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>

     <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap.min.js"></script>
     
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
     

      <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
     <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
     
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />  
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap.min.css" />  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap.min.css" />  


 <link rel="stylesheet" href="bootstrap.min.css" />  

   <script src="bootstrap.min.js"></script>  
  <script src="1.js"></script>  
  <!-- Jquery DataTables -->

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
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


 <h3 align="center">Daftar Member Ninja Kudeta</h3>  

   <div class="table-responsive">
    <div align="right">
     <button type="button" name="age" id="age" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Tambah Member</button>
    </div>
    <br/>
    <div id="employee_table">
 <table id="myTable" class="table table-striped table-hover" style="width:100%">
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
     
      <?php
      $count = 1;
      while($row = mysqli_fetch_array($result))
      {
      ?>
      <tr>
         <td><?php echo $count ?></td>
       <td><?php echo $row["nick"]; ?></td>
       <td><?php echo $row["charid"]; ?></td>
           <td><?php echo $row["token"]; ?> <img src="token.png" width="15px"> </td>
               <td><?php echo $row["onigiri"]; ?> <img src="onigiri.png" width="15px"> </td>
                   <td><?php echo $row["pchp"]; ?></td>

                       <td><?php echo $row["macro"]; ?></td>
                          <td><?php echo $row["finalday"]; ?></td>
                  
                             
       <td><input type="button" name="view" value="Lihat Detail" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>
       <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-warning btn-xs edit_data" /></td> 
      <td><input type="button" name="delete" value="Hapus" id="<?php echo $row["id"]; ?>" class="btn btn-danger btn-xs hapus_data" /></td> 
       
      </tr>
      <?php
      $count=$count+1;
      }
      ?>

     </table>
    </div>
     <div class="col-md-12 text-center">
      <ul class="pagination pagination-lg pager" id="myPager"></ul>
     
   </div>
<center>Season 2 Clan War</center>   
  </div>
 </body>  
</html>  

<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Input Data Member</h4>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
      <div class="form-row">
          <div class="form-group col-xs-4">
              <label>Nickname</label>
               <input type="text" name="nick" id="nick" class="form-control"  placeholder="Nickname"/>

          </div>
          <div class="form-group col-xs-2">
              <label>ID Char</label>
              <input type="text" name="charid" id="charid" class="form-control" placeholder="Char ID" />
          </div>

          <div class="form-group col-xs-2">
              <label>Token <img src="token.png" width="15px"></label>
              <input type="text" name="token" id="token" class="form-control" />
          </div>

          <div class="form-group col-xs-2">
              <label>Onigiri <img src="onigiri.png" width="15px"></label>
              <input type="text" name="onigiri" id="onigiri" class="form-control" />
          </div>
     </div>     

    <div class="form-row">
  
        <div class="form-group col-xs-6">
              <label for="discord">Discord <img src="discord.png" width="15px"></label>
                <input type="text" class="form-control" id="discord" name="discord" placeholder="Discord">
        </div>

         <div class="form-group col-xs-6">
              <label for="nowa">Whatsapp <img src="wa.png" width="15px"></label>
                <input type="text" class="form-control" id="nowa" name="nowa" placeholder="Nomor Whatsapp">
        </div>

</div>

<div class="form-row">
           <div class="form-group col-xs-4">
               <label>Player</label>
     <select name="pchp" id="pchp" class="form-control">
      <option value="PC">PC User</option>  
      <option value="Android">Android</option>
       <option value="Unknown Player">Unknown Player</option>
     </select>
        </div>

         <div class="form-group col-xs-4">
                   <label>Macro</label>
     <select name="macro" id="macro" class="form-control">
      <option value="Yes">Yes</option>  
      <option value="No">No</option>
       <option value="Unknown Macro">Unknown Macro</option>
     </select>
        </div>

           <div class="form-group col-xs-4">
           <label>Final Day</label>
     <select name="finalday" id="finalday" class="form-control">
      <option value="Attend">Attend</option>  
      <option value="Not Attend">Not Attend</option>
       <option value="Unknown Attend">Unknown Attend</option>
     </select>
        </div>

</div>

<div class="form-row">
   <div class="form-group col-xs-12">
    <label for="warn">Warn User <img src="warn.png" width="15px"></label>
    <textarea name="warn" id="warn" class="form-control"  placeholder="Masukan List Warn" rows="5"></textarea> 
  </div>
</div>

<label>     
 </label>
   
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br><br>
<br>
<br>
<br><br>
<br><br>
<div class="form-row">
   <div class="form-group col-xs-8">
 <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
<br>
<br>
   
 </form>

</div>
 <div class="modal-footer">
    </div>
   </div>
  </div>
 </div>
</div>


<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Detail Data Member</h4>
   </div>
   <div class="modal-body" id="detail_karyawan">
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>


<div id="editModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Edit Data Member</h4>
   </div>
   <div class="modal-body" id="form_edit">
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>


<script>
   $(document).ready(function() {
    var table = $('#myTable').DataTable( {
        responsive: true,
        autoWidth: false,
        lengthChange: false,

        buttons: [
            {
                extend: 'excel',
                split: [ 'pdf'],
            }
        ]
    } );
 
    table.buttons().container()
        .appendTo( '#myTable_wrapper .col-sm-6:eq(0)' );
} );
</script>

<script>  
$(document).ready(function(){
// Begin Aksi Insert
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#nick').val() == "")  
  {  
   alert("Mohon Isi Nickname ");  
  }  
  else if($('#charid').val() == '')  
  {  
   alert("Mohon Isi Char ID");  
  }  
 
  else  
  {  
   $.ajax({  
    url:"insert.php",  
    method:"POST",  
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){  
     $('#insert_form')[0].reset();  
     $('#add_data_Modal').modal('hide');  
     $('#employee_table').html(data);  
    }  
   });  
  }  
 });
//END Aksi Insert

//Begin Tampil Detail Karyawan
 $(document).on('click', '.view_data', function(){
  var employee_id = $(this).attr("id");
  $.ajax({
   url:"select.php",
   method:"POST",
   data:{employee_id:employee_id},
   success:function(data){
    $('#detail_karyawan').html(data);
    $('#dataModal').modal('show');
   }
  });
 });
//End Tampil Detail Karyawan
 
//Begin Tampil Form Edit
  $(document).on('click', '.edit_data', function(){
  var employee_id = $(this).attr("id");
  $.ajax({
   url:"edit.php",
   method:"POST",
   data:{employee_id:employee_id},
   success:function(data){
    $('#form_edit').html(data);
    $('#editModal').modal('show');
   }
  });
 });
//End Tampil Form Edit

//Begin Aksi Delete Data
 $(document).on('click', '.hapus_data', function(){
  var employee_id = $(this).attr("id");
  $.ajax({
   url:"delete.php",
   method:"POST",
   data:{employee_id:employee_id},
   success:function(data){
   $('#employee_table').html(data);  
   }
  });
 });
}); 
//End Aksi Delete Data
 </script>

