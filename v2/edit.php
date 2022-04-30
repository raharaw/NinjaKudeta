<?php
include("koneksi.php");
?>
 <script>
$('#update_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#enick').val() == "")  
  {  
   alert("Mohon Isi Nick ");  
  }  
  else if($('#echarid').val() == '')  
  {  
   alert("Mohon Isi ID Char");  
  }  
 
  else  
  {  
   $.ajax({  
    url:"update.php",  
    method:"POST",  
    data:$('#update_form').serialize(),  
    beforeSend:function(){  
     $('#update').val("Updating");  
    },  
    success:function(data){  
     $('#update_form')[0].reset();  
     $('#editModal').modal('hide');  
     $('#employee_').html(data);  
    }  
   });  
  }  
 });
</script>
<?php 
if(isset($_POST["employee_id"]))
{
 $output = '';
 $query = "SELECT * FROM member WHERE id = '".$_POST["employee_id"]."'";
 $result = mysqli_query($connect, $query);
	$row = mysqli_fetch_array($result);
     $output .= '
         <form method="post" id="update_form">
           <div class="form-row">
          <div class="form-group col-xs-4">
     <label>Nick</label>
     <input type="hidden" name="id" id="id" value="'.$_POST["employee_id"].'" class="form-control" />
     <input type="text" name="nick" id="enick" value="'.$row['nick'].'" class="form-control" />
     </div>
     <div class="form-group col-xs-4">
     <label>ID Char</label>
     <input type="text" name="charid" id="echarid" class="form-control" value="'.$row['charid'].'" />
     </div>
     
      <div class="form-group col-xs-2">
              <label>Token <img src="token.png" width="15px"></label>
              <input type="text" name="token" id="token" value="'.$row['token'].'" class="form-control" />
          </div>

          <div class="form-group col-xs-2">
              <label>Onigiri <img src="onigiri.png" width="15px"></label>
              <input type="text" name="onigiri" id="onigiri" value="'.$row['onigiri'].'" class="form-control" />
          </div>
    </div>  

     <div class="form-row">
  
        <div class="form-group col-xs-6">
              <label for="discord">Discord <img src="discord.png" width="15px"></label>
                <input type="text" class="form-control" id="discord" value="'.$row['discord'].'" name="discord" placeholder="Discord">
        </div>

         <div class="form-group col-xs-6">
              <label for="nowa">Whatsapp <img src="wa.png" width="15px"></label>
                <input type="text" class="form-control" id="nowa"  value="'.$row['nowa'].'" name="nowa" placeholder="Nomor Whatsapp">
        </div>

</div>


<div class="form-row">
           <div class="form-group col-xs-4">
               <label>Player</label>
     <select name="pchp" id="pchp" class="form-control">';
     if($row['pchp']=="PC"){
      $output .= '<option value="PC" selected>PC</option>  
       <option value="Android">Android</option>
        <option value="Unknown Player">Unknown Player</option>';
    }elseif($row['pchp']=="Android"){
          $output .= '<option value="PC">PC</option>  
      <option value="Android" selected>Android</option>
      <option value="Unknown Player">Unknown Player</option>';
   }else{
    $output .= '<option value="PC">PC</option>  
      <option value="Android">Android</option>
      <option value="Unknown Player" selected>Unknown Player</option>';
    }
       
     $output .= '</select>
     </div>
   <div class="form-group col-xs-4">
                  <label>Macro</label>
     <select name="macro" id="macro" class="form-control">';
     if($row['macro']=="Yes"){
      $output .= '<option value="Yes" selected>Yes</option>  
       <option value="No">No</option>
        <option value="Unknown Macro">Unknown Macro</option>';
    }elseif($row['macro']=="No"){
          $output .= '<option value="Yes">Yes</option>  
      <option value="No" selected>No</option>
      <option value="Unknown Macro">Unknown Macro</option>';
   }else{
    $output .= '<option value="Yes">Yes</option>  
      <option value="No">No</option>
      <option value="Unknown Macro" selected>Unknown Macro</option>';
    }
       
     $output .= '</select>
        </div>
   <div class="form-group col-xs-4">
                  <label>Final Day</label>
     <select name="finalday" id="finalday" class="form-control">';
     if($row['finalday']=="Attend"){
      $output .= '<option value="Atend" selected>Attend</option>  
       <option value="Not Attend">Not Attend</option>
        <option value="Unknown Attend">Unknown Attend</option>';
    }elseif($row['macro']=="Not Attend"){
          $output .= '<option value="Attend">Attend</option>  
      <option value="Not Attend" selected>Not Attend</option>
      <option value="Unknown Attend">Unknown Attend</option>';
   }else{
    $output .= '<option value="Attend">Attend</option>  
      <option value="Not Attend">Not Attend</option>
      <option value="Unknown Attend" selected>Unknown Attend</option>';
    }
       
     $output .= '</select>

     </div>
     </div>
<div class="form-row">
   <div class="form-group col-xs-12">
    <label for="warn">Warn User <img src="warn.png" width="15px"></label>
    <textarea name="warn" id="warn" class="form-control" placeholder="Masukan List Warn" rows="5">'.$row['warn'].'</textarea> 
  </div>
</div>
 
     <div class="form-row">
   <div class="form-group col-xs-8">
     <input type="submit" name="update" id="update" value="Update" class="btn btn-success" />
    
</div>
</div>
    </form>
    </div>
     <div class="modal-footer">
    </div>
     ';
    echo $output;
}
?>
