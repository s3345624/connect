<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>&#26080;&#26631;&#39064;&#25991;&#26723;</title>
<?php
$dbms='mysql';
$host='localhost';
$dbName='winestore';
$user='webadmin';
$pass='12345';
$dsn="$dbms:host=$host;dbname=$dbName";
try{
$dbh=new PDO($dsn,$user,$pass);
}catch(PDOException $e){
	die("Error!:".$e->getMessage()."<br/>");}
	
$colname_Recordset1 = "-1";
if (isset($_GET['winename'])) {
  $colname_Recordset1 = (get_magic_quotes_gpc()) ? $_GET['winename'] : addslashes($_GET['winename']);
}

$colname_Recordset2 = "-1";
if (isset($_GET['wineryname'])) {
  $colname_Recordset2 = (get_magic_quotes_gpc()) ? $_GET['wineryname'] : addslashes($_GET['wineryname']);
}

$colname_Recordset3 = "-1";
if (isset($_GET['grape'])) {
  $colname_Recordset3 = (get_magic_quotes_gpc()) ? $_GET['grape'] : addslashes($_GET['grape']);
}
$colname_Recordset4 = "-1";
if (isset($_GET['loweryear'])) {
  $colname_Recordset4 = (get_magic_quotes_gpc()) ? $_GET['loweryear'] : addslashes($_GET['loweryear']);
}
$colname_Recordset5 = "-1";
if (isset($_GET['upperyear'])) {
  $colname_Recordset5 = (get_magic_quotes_gpc()) ? $_GET['upperyear'] : addslashes($_GET['upperyear']);
}

$colname_Recordset6 = "-1";
if (isset($_GET['region'])) {
  $colname_Recordset6 = (get_magic_quotes_gpc()) ? $_GET['region'] : addslashes($_GET['region']);
}


$colname_Recordset7 = "-1";
if (isset($_GET['minimum_stock'])) {
  $colname_Recordset7 = (get_magic_quotes_gpc()) ? $_GET['minimum_stock'] : addslashes($_GET['minimum_stock']);
}
$colname_Recordset8 = "-1";
if (isset($_GET['minimum_ordered'])) {
  $colname_Recordset8 = (get_magic_quotes_gpc()) ? $_GET['minimum_ordered'] : addslashes($_GET['minimum_ordered']);
}
$colname_Recordset9 = "-1";
if (isset($_GET['dollar_min'])) {
  $colname_Recordset9 = (get_magic_quotes_gpc()) ? $_GET['dollar_min'] : addslashes($_GET['dollar_min']);
}
$colname_Recordset10 = "-1";
if (isset($_GET['dollar_max'])) {
  $colname_Recordset10 = (get_magic_quotes_gpc()) ? $_GET['dollar_max'] : addslashes($_GET['dollar_max']);
}
if( $colname_Recordset6 != "ALL")
$query_Recordset1 = "SELECT * FROM resultview WHERE wine_name LIKE '".$colname_Recordset1."%' AND winery_name LIKE '".$colname_Recordset2."%' AND variety='".$colname_Recordset3."' AND year>=".$colname_Recordset4." AND year<=".$colname_Recordset5." AND on_hand>=".$colname_Recordset7." AND qty>=".$colname_Recordset8." AND region_name='".$colname_Recordset6."' AND cost>=".$colname_Recordset9." AND cost<=".$colname_Recordset10;
else
$query_Recordset1 = "SELECT * FROM resultview WHERE wine_name LIKE '".$colname_Recordset1."%' AND winery_name LIKE '".$colname_Recordset2."%' AND variety='".$colname_Recordset3."' AND year>=".$colname_Recordset4." AND year<=".$colname_Recordset5." AND on_hand>=".$colname_Recordset7." AND qty>=".$colname_Recordset8."  AND cost>=".$colname_Recordset9." AND cost<=".$colname_Recordset10;
?>
</head>

<body>
<table width="1200" height="30" border="0" style="color:#009900" >
      <tr>
        <th scope="col" style="width:110px" >wine_name</th>
        <th scope="col" style="width:110px">winery_name</th>
        <th scope="col" style="width:110px">region_name</th>
        <th scope="col" style="width:110px">year</th>
        <th scope="col" style="width:110px">cost</th>
        <th scope="col" style="width:110px">on_hand</th>
        <th scope="col" style="width:110px">variety</th>
        <th scope="col" style="width:110px">qty</th>
        <th scope="col" style="width:110px">revenue</th>
      </tr>
              </table>
			  <?php 
			  foreach($dbh->query($query_Recordset1) as $row){ 
			 ?>
<table width="1200" border="0">
      <tr>
        <th scope="col" style="width:110px"><?php echo $row['wine_name']; ?></th>
        <th scope="col" style="width:110px"><?php echo $row['winery_name']; ?></th>
        <th scope="col" style="width:110px"><?php echo $row['region_name']; ?></th>
        <th scope="col" style="width:110px"><?php echo $row['year'] ?></th>
        <th scope="col" style="width:110px"><?php echo $row['cost']; ?></th>
        <th scope="col" style="width:110px"><?php echo $row['on_hand']; ?></th>
        <th scope="col" style="width:110px"><?php echo $row['variety']; ?></th>
        <th scope="col" style="width:110px"><?php echo $row['qty']; ?></th>
        <th scope="col" style="width:110px"><?php echo $row['revenue']; ?></th>
      </tr>
</table>
<?php  }
?>
</body>
</html>
