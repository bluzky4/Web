<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
@session_start;
require_once '../insert.php';
require_once 'meniu.php';
$objSelect= new insert();

?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>

<div id="body">
 <table width="80%" border="1">
    <tr>
        <th colspan="4">your uploads...<label><a href="upload.php">upload new files...</a></label></th>
    </tr>
    <tr>
    <td>File Name</td>
    <td>File Type</td>
    <td>File Size(KB)</td>
    <td>View</td>
    </tr>
    <?php
 $allData= $objSelect->select();
 $sql=$allData;
 $row=$sql;
 if($row)
 {
  ?>
        <tr>
        <td><?php echo $row['file']; ?></td>
        <td><?php echo $row['type']; ?></td>
        <td><?php echo $row['size']; ?></td>
        <td><a href="uploads/<?php echo $row['file'] ?>" ><strong>view file</strong></a></td>
        </tr>
        <?php
 }
 ?>
    </table>
    
</div>
</body>
</html>