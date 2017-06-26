<?php

require_once 'insert.php';
$objFisier=new insert();
if(isset($_POST['btn-upload']))
{    
     
 $files = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $size = $_FILES['file']['size'];
 $type = $_FILES['file']['type'];
 $folder="../uploads/";
 

 $size = $size/1024;  

 $new_file_name = strtolower($files);
 
 $file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$file))
 {
  $FisierAdded=$objFisier->addFisier($file,$type,$size)
          ?>
  <script>
  alert('successfully uploaded');

        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('error while uploading file');

        </script>
  <?php
 }
}
?>