<?php

 /* code for connection and database selection */
 $server = "localhost";
 $user = "root";
 $pass = "";
 $dbname = "dbtest";

 $dbcon = new MySQLi("$server","$user","$pass","$dbname");
 
 if($dbcon->connect_error)
 {
  echo "ERROR -> ".$dbcon->connect_error;
 }
 /* code for connection and database selection */


/* code for data insert */
if(isset($_POST['save']))
{

     $fn = $dbcon->real_escape_string($_POST['fn']);
     $ln = $dbcon->real_escape_string($_POST['ln']);
 
  $SQL = $dbcon->prepare("INSERT INTO data(fn,ln) VALUES(?,?)");
  $SQL->bind_param("ss",$fn,$ln);
  $SQL->execute();
  
  if(!$SQL)
  {
   echo $MySQLiconn->error;
  } 
}
/* code for data insert */


/* code for data delete */
if(isset($_GET['del']))
{
 $SQL = $dbcon->prepare("DELETE FROM data WHERE id=".$_GET['del']);
 $SQL->bind_param("i",$_GET['del']);
 $SQL->execute();
 header("Location: index.php");
}
/* code for data delete */



/* code for data update */
if(isset($_GET['edit']))
{
 $SQL = $dbcon->query("SELECT * FROM data WHERE id=".$_GET['edit']);
 $getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
 $SQL = $dbcon->prepare("UPDATE data SET fn=?, ln=? WHERE id=?");
 $SQL->bind_param("ssi",$_POST['fn'],$_POST['ln'],$_GET['edit']);
 $SQL->execute();
 header("Location: index.php");
}
/* code for data update */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP CRUD Tutorial with MySQLi extension</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>
<center>
<div id="header">
 <label>By : <a href="http://cleartuts.blogspot.com/">cleartuts - programming blog</a></label>
</div>
<br />
<a href="http://cleartuts.blogspot.com/2015/03/php-crud-tutorial-with-mysqli-extension.html" title="Tutorial link" ><h1>PHP CRUD Tutorial with MySQLi extension(Statements)</h1></a>
<br />
<div id="form">
<form method="post">
<table width="100%" border="1" cellpadding="15">
<tr>
<td><input type="text" name="fn" placeholder="First Name" value="<?php if(isset($_GET['edit'])) echo $getROW['fn'];  ?>" /></td>
</tr>
<tr>
<td><input type="text" name="ln" placeholder="Last Name" value="<?php if(isset($_GET['edit'])) echo $getROW['ln'];  ?>" /></td>
</tr>
<tr>
<td>
<?php
if(isset($_GET['edit']))
{
 ?>
 <button type="submit" name="update">update</button>
 <?php
}
else
{
 ?>
 <button type="submit" name="save">save</button>
 <?php
}
?>
</td>
</tr>
</table>
</form>

<br /><br />

<table width="100%" border="1" cellpadding="15" align="center">
<?php
$res = $dbcon->query("SELECT * FROM data");

while($row=$res->fetch_array())
{
 ?>
    <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['fn']; ?></td>
    <td><?php echo $row['ln']; ?></td>
    <td><a href="?edit=<?php echo $row['id']; ?>" onclick="return confirm('sure to edit !'); " >edit</a></td>
    <td><a href="?del=<?php echo $row['id']; ?>" onclick="return confirm('sure to delete !'); " >delete</a></td>
    </tr>
    <?php
}

?>
</table>
</div>
</center>
</body>
</html>