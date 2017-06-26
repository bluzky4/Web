<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
@session_start();
require_once '../propuneri.php';
require_once'meniu.php';

?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <div id="content">
<div id="body">
 <form action="#" method="post" enctype="multipart/form-data">
 <input type="file" name="file" />
 <button type="submit" name="btn-upload">upload</button>
 </form>
    <br /><br />
    <?php
 if(isset($_GET['success']))
 {
  ?>
        <label>File Uploaded Successfully...  <a href="view.php">click here to view file.</a></label>
        <?php
 }
 else if(isset($_GET['fail']))
 {
  ?>
        <label>Problem While File Uploading !</label>
        <?php
 }
 else
 {
  ?>
        <label>Try to upload any files(PDF, DOC, TXT)</label>
        <?php
 }
 ?>
</div>
    </div>
</body>
</html>