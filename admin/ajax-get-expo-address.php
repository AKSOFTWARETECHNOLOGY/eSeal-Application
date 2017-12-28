<?php
include "config.php";
$id=$_REQUEST['id'];
$useraddress_sql="SELECT * FROM `exporter_address` WHERE user_id = '$id'";
$useraddress_exe=mysql_query($useraddress_sql);
?>
<option value="0">Add New Delivery Address / Choose Delivery Address</option>
<?php
while($useraddress_fet=mysql_fetch_array($useraddress_exe))
{
?>
<option value="<?php echo $useraddress_fet['id']; ?>"><?php echo $useraddress_fet['name'] . ' - ' .$useraddress_fet['mobile']; ?></option>
<?php
}
?>

