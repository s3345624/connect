<?php

require_once("MiniTemplator.class.php");
require_once('connect.php');

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
mysql_select_db($database_winestore, $winestore);
if( $colname_Recordset6 != "ALL")
$query_Recordset1 = "SELECT * FROM resultview WHERE wine_name LIKE '".$colname_Recordset1."%' AND winery_name LIKE '".$colname_Recordset2."%' AND variety='".$colname_Recordset3."' AND year>=".$colname_Recordset4." AND year<=".$colname_Recordset5." AND on_hand>=".$colname_Recordset7." AND qty>=".$colname_Recordset8." AND region_name='".$colname_Recordset6."' AND cost>=".$colname_Recordset9." AND cost<=".$colname_Recordset10;
else
$query_Recordset1 = "SELECT * FROM resultview WHERE wine_name LIKE '".$colname_Recordset1."%' AND winery_name LIKE '".$colname_Recordset2."%' AND variety='".$colname_Recordset3."' AND year>=".$colname_Recordset4." AND year<=".$colname_Recordset5." AND on_hand>=".$colname_Recordset7." AND qty>=".$colname_Recordset8."  AND cost>=".$colname_Recordset9." AND cost<=".$colname_Recordset10;
$Recordset1 = mysql_query($query_Recordset1) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$t=new MiniTemplator;
$ok=$t->readTemplateFromFile("minitemplator.html");
if(!$ok) die("MiniTemplator.readTemplateFromFile failed.");
if (($row_Recordset1 = mysql_fetch_assoc($Recordset1)) ==0)
echo "No result";
do{
if ($totalRows_Recordset1 > 0) { 
$t->setVariable("wine_name",$row_Recordset1['wine_name']);
$t->setVariable("winery_name",$row_Recordset1['winery_name']);
$t->setVariable("region_name",$row_Recordset1['region_name']);
$t->setVariable("year",$row_Recordset1['year']);
$t->setVariable("cost",$row_Recordset1['cost']);
$t->setVariable("on_hand",$row_Recordset1['on_hand']);
$t->setVariable("variety",$row_Recordset1['variety']);
$t->setVariable("qty",$row_Recordset1['qty']);
$t->setVariable("revenue",$row_Recordset1['revenue']);
$t->addBlock("result");
}
}while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));

$t->generateOutput();
mysql_free_result($Recordset1);
?>