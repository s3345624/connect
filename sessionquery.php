<?php 
require_once('connect.php');?>
<?php
session_start();
$_SESSION["username"]="Brian";
mysql_select_db($database_winestore, $winestore);
$query_Region = "SELECT * FROM region ORDER BY region_name ASC";
$Region = mysql_query($query_Region, $winestore) or die(mysql_error());
$row_Region = mysql_fetch_assoc($Region);
$totalRows_Region = mysql_num_rows($Region);

mysql_select_db($database_winestore, $winestore);
$query_grape_variety = "SELECT variety FROM grape_variety ORDER BY variety ASC";
$grape_variety = mysql_query($query_grape_variety, $winestore) or die(mysql_error());
$row_grape_variety = mysql_fetch_assoc($grape_variety);
$totalRows_grape_variety = mysql_num_rows($grape_variety);

mysql_select_db($database_winestore, $winestore);
$query_loweryear = "SELECT distinct `year` FROM wine ORDER BY `year` ASC";
$loweryear = mysql_query($query_loweryear, $winestore) or die(mysql_error());
$row_loweryear = mysql_fetch_assoc($loweryear);
$totalRows_loweryear = mysql_num_rows($loweryear);

mysql_select_db($database_winestore, $winestore);
$query_upperyaer = "SELECT distinct `year` FROM wine ORDER BY `year` DESC";
$upperyaer = mysql_query($query_upperyaer, $winestore) or die(mysql_error());
$row_upperyaer = mysql_fetch_assoc($upperyaer);
$totalRows_upperyaer = mysql_num_rows($upperyaer);

mysql_select_db($database_winestore, $winestore);
$query_maxdollor = "SELECT max(price) FROM items";
$maxdollor = mysql_query($query_maxdollor, $winestore) or die(mysql_error());
$row_maxdollor = mysql_fetch_assoc($maxdollor);
$totalRows_maxdollor = mysql_num_rows($maxdollor);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Query</title>
<script language="javascript" >
function ss()
{
if ((document.form1.dollar_min.value*1) > (document.form1.dollar_max.value*1))
{
alert("Min dollar must be less than Max dollar");
return false;
}

}
</script>
</head>

<body>
<form  name="form1" id="form1" action="sessionresult.php" method="get" target="_self" onsubmit="return ss()"  >
<table width="1125"  border="0">
  <tr>
    <th width="25" scope="col">&nbsp;</th>
    <th width="25" scope="col">&nbsp;</th>
    <th width="25" scope="col">&nbsp;</th>
    <th width="8" scope="col">&nbsp;</th>
    <th width="46" scope="col">&nbsp;</th>
    <th width="48" scope="col">&nbsp;</th>
    <th width="117" scope="col">&nbsp;</th>
    <th width="56" scope="col">&nbsp;</th>
    <th width="197" scope="col">&nbsp;</th>
    <th width="48" scope="col">&nbsp;</th>
    <th width="154" scope="col">&nbsp;</th>
    <th width="54" scope="col">&nbsp;</th>
    <th width="168" scope="col">&nbsp;</th>
    <th width="25" scope="col">&nbsp;</th>
    <th width="25" scope="col">&nbsp;</th>
    <th width="38" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="8" align="center"><h1>Serach Engineer </h1></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="9" align="center">WineName<input name="winename" id="winename" style="width:100px; height:20px;" type="text" /> &nbsp;  &nbsp; &nbsp;WineryName<input name="wineryname" type="text" style="width:100px; height:20px;" id="wineryname" /> &nbsp; &nbsp; &nbsp;<input name="search" type="submit" value="query" style="height:30px;width:70px;" />  </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>Region</td>
    <td><select name="region" >
      <?php
do {  
?>
      <option value="<?php echo $row_Region['region_name']?>"><?php echo $row_Region['region_name']?></option>
      <?php
} while ($row_Region = mysql_fetch_assoc($Region));
  $rows = mysql_num_rows($Region);
  if($rows > 0) {
      mysql_data_seek($Region, 0);
	  $row_Region = mysql_fetch_assoc($Region);
  }
?>
	</select>      </td>
    <td>Grape variety</td>
    <td><select name="grape">
      <?php
do {  
?>
      <option value="<?php echo $row_grape_variety['variety']?>"><?php echo $row_grape_variety['variety']?></option>
      <?php
} while ($row_grape_variety = mysql_fetch_assoc($grape_variety));
  $rows = mysql_num_rows($grape_variety);
  if($rows > 0) {
      mysql_data_seek($grape_variety, 0);
	  $row_grape_variety = mysql_fetch_assoc($grape_variety);
  }
?>
	</select></td>
    <td>Lower Bound </td>
    <td><select name="loweryear">
      <?php
do {  
?>
      <option value="<?php echo $row_loweryear['year']?>"><?php echo $row_loweryear['year']?></option>
      <?php
} while ($row_loweryear = mysql_fetch_assoc($loweryear));
  $rows = mysql_num_rows($loweryear);
  if($rows > 0) {
      mysql_data_seek($loweryear, 0);
	  $row_loweryear = mysql_fetch_assoc($loweryear);
  }
?>
	</select></td>
    <td>Upper Bound </td>
    <td><select name="upperyear">
      <?php
do {  
?>
      <option value="<?php echo $row_upperyaer['year']?>"><?php echo $row_upperyaer['year']?></option>
      <?php
} while ($row_upperyaer = mysql_fetch_assoc($upperyaer));
  $rows = mysql_num_rows($upperyaer);
  if($rows > 0) {
      mysql_data_seek($upperyaer, 0);
	  $row_upperyaer = mysql_fetch_assoc($upperyaer);
  }
?>
	</select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3">A minimum number of wines in stock</td>
    <td><input name="minimum_stock" type="text" style="width:30px; " value="0" /></td>
    <td colspan="3">A minimum number of wines ordered</td>
    <td><input name="minimum_ordered" type="text" style="width:30px; " value="0"/></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="8" align="center">Dollar Cost Range 
      <input  name="dollar_min" type="text" style="width:60px;" id="dollar_min" value="0"  />
      -
      <input  name="dollar_max" type="text" style="width:60px;" id="dollar_max" value="<?php echo $row_maxdollor['max(price)']; ?>"   /> </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
</body>
</html>
<?php
mysql_free_result($Region);

mysql_free_result($grape_variety);

mysql_free_result($loweryear);

mysql_free_result($upperyaer);

mysql_free_result($maxdollor);
?>
