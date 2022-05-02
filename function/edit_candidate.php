 <script>
   $('#update_form').on("submit", function(event) {
     event.preventDefault();
     if ($('#enick').val() == "") {
       alert("Mohon Isi Nick ");
     } else if ($('#echarid').val() == '') {
       alert("Mohon Isi ID Char");
     } else {
       $.ajax({
         url: "function/update_candidate.php",
         method: "POST",
         data: $('#update_form').serialize(),
         beforeSend: function() {
           $('#update').val("Updating");
         },
         success: function(data) {
           $('#update_form')[0].reset();
           $('#editModal').modal('hide');
           alert(data);
           $("#loadTable").load("function/loadcandidate.php");
         }
       });
     }
   });
 </script>
 <?php
  if (isset($_POST["employee_id"])) {
    include("koneksi.php");
    $output = '';
    $query = "SELECT * FROM candidate WHERE id = '" . $_POST["employee_id"] . "'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_array($result);
    $output .= '
         <form method="post" id="update_form">
           <div class="form-row">
          <div class="form-group col-6">
     <label>Nick</label>
     <input type="hidden" name="id" id="id" value="' . $_POST["employee_id"] . '" class="form-control" />
     <input type="text" name="nick" id="enick" value="' . $row['nick'] . '" class="form-control" />
     </div>
     <div class="form-group col-6">
     <label>ID Char</label>
     <input type="number" name="charid" id="echarid" class="form-control" value="' . $row['charid'] . '" />
     </div>
     
      <div class="form-group col-6">
              <label>Token <img src="dist/img/token.png" width="15px"></label>
              <input type="number" name="token" id="token" value="' . $row['token'] . '" class="form-control" />
          </div>

          <div class="form-group col-6">
              <label>Onigiri <img src="dist/img/onigiri.png" width="15px"></label>
              <input type="number" name="onigiri" id="onigiri" value="' . $row['onigiri'] . '" class="form-control" />
          </div>
    </div>  

     <div class="form-row">
  
        <div class="form-group col-6">
              <label for="discord">Discord <img src="dist/img/discord.png" width="15px"></label>
                <input type="text" class="form-control" id="discord" value="' . $row['discord'] . '" name="discord" placeholder="Discord">
        </div>

         <div class="form-group col-6">
              <label for="nowa">Whatsapp <img src="dist/img/wa.png" width="15px"></label>
                <input type="text" class="form-control" id="nowa"  value="' . $row['nowa'] . '" name="nowa" placeholder="Nomor Whatsapp">
        </div>

</div>


<div class="form-row">
           <div class="form-group col-6">
               <label>Player</label>
     <select name="pchp" id="pchp" class="form-control">';
    if ($row['pchp'] == "PC") {
      $output .= '<option value="PC" selected>PC</option>  
       <option value="Android">Android</option>
        <option value="Unknown Player">Unknown Player</option>';
    } elseif ($row['pchp'] == "Android") {
      $output .= '<option value="PC">PC</option>  
      <option value="Android" selected>Android</option>
      <option value="Unknown Player">Unknown Player</option>';
    } else {
      $output .= '<option value="PC">PC</option>  
      <option value="Android">Android</option>
      <option value="Unknown Player" selected>Unknown Player</option>';
    }

    $output .= '</select>
     </div>
   <div class="form-group col-6">
                  <label>Macro</label>
     <select name="macro" id="macro" class="form-control">';
    if ($row['macro'] == "Yes") {
      $output .= '<option value="Yes" selected>Yes</option>  
       <option value="No">No</option>
        <option value="Unknown Macro">Unknown Macro</option>';
    } elseif ($row['macro'] == "No") {
      $output .= '<option value="Yes">Yes</option>  
      <option value="No" selected>No</option>
      <option value="Unknown Macro">Unknown Macro</option>';
    } else {
      $output .= '<option value="Yes">Yes</option>  
      <option value="No">No</option>
      <option value="Unknown Macro" selected>Unknown Macro</option>';
    }

    $output .= '</select>
        </div>
 
     </div>

 
     <div class="form-row">
   <div class="form-group col-8">
     <input type="submit" name="update" id="update" value="Update" class="btn btn-success" />
    
</div>
</div>
    </form>
    </div>
     ';
    echo $output;
  }
  ?>