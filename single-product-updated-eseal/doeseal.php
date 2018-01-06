<?php session_start();
ob_start();

if(!isset($_SESSION['exporteruserid']))
{
	header("Location: login.php");
}

include "config.php";


$user_id=$_SESSION['exporteruserid'];
$user_role=$_SESSION['exporteruserrole'];
$user_name=$_SESSION['exporterusername'];
$user_email=$_SESSION['exporteruseremail'];

if(isset($_REQUEST['addseal']))
{
//print_r($_REQUEST);exit;


$id = $_REQUEST['id'];

$iec_no = $_REQUEST['iec_no'];
$pan_no = $_REQUEST['pan_no'];
$gst_no = $_REQUEST['gst_no'];

$sealing_date = $_REQUEST['sealing_date'];
$sealing_time = $_REQUEST['sealing_time'];

$shipping_no = $_REQUEST['shipping_no'];
$shipping_date = $_REQUEST['shipping_date'];

$trailer_truck_no = $_REQUEST['trailer_truck_no'];
$driver_number = $_REQUEST['driver_number'];
$driver_licence = $_REQUEST['driver_licence'];
$driver_name = $_REQUEST['driver_name'];

$container_size = $_REQUEST['container_size'];
$container_no = $_REQUEST['container_no'];

$destination_port = $_REQUEST['destination_port'];
$terminal_name = $_REQUEST['terminal_name'];

$form_no = $_REQUEST['form_no'];
$eway_no = $_REQUEST['eway_no'];
$seal_type = $_REQUEST['seal_type'];
$cfs_reach_time = $_REQUEST['cfs_reach_time'];
$notes = $_REQUEST['notes'];

$product_item_status = "1";
$SaleType = "Online";
$SaleStatus = "0";
$SaleDate = date("Y-m-d");

$DeliveryType = "0";
$DeliveryStatus = "0";
$DeliveryDate = "0";

$username = "User";
$date = date("Y-m-d");

$ProductOrder="10000000".time();

$product_order_info_count_fetch=0;
$product_order_info_count_sql="SELECT COUNT(*) AS `pro_count` FROM `product_order_info` WHERE `id`='$id' AND `product_exporter_id`='$user_id' AND `customs_approve_status`='0'";
$product_order_info_count_exe=mysql_query($product_order_info_count_sql);
$product_order_info_count_fet=mysql_fetch_array($product_order_info_count_exe);
$product_order_info_count_fetch=$product_order_info_count_fet['pro_count'];

//echo $product_order_info_count_fetch;
//echo $product_order_info_count_sql;
//exit;

    if($product_order_info_count_fetch>0)
    {

            $product_order_info_update_sql="UPDATE `product_order_info` SET
                                        `iec_no`='$iec_no',`pan_no`='$pan_no',`gst_no`='$gst_no',
                                        `sealing_date`='$sealing_date',`sealing_time`='$sealing_time',
                                        `shipping_no`='$shipping_no',`shipping_date`='$shipping_date',
                                        `trailer_truck_no`='$trailer_truck_no',`driver_number`='$driver_number',
                                        `driver_licence`='$driver_licence',`driver_name`='$driver_name',
                                        `container_size`='$container_size',`container_no`='$container_no',
                                        `destination_port`='$destination_port',`terminal_name`='$terminal_name',
                                        `form_no`='$form_no',`eway_no`='$eway_no',
                                        `seal_type`='$seal_type',`cfs_reach_time`='$cfs_reach_time',
                                        `product_item_status`='$product_item_status',`notes`='$notes'
                                        WHERE `id`='$id' AND `product_exporter_id`='$user_id' AND `customs_approve_status`='0'";
            //echo $product_order_info_update_sql;
            $product_order_info_update_exe=mysql_query($product_order_info_update_sql);


        /* START UPLOAD */
        if (count($_FILES['file']['name'])>0) {
            $j = 0; //Variable for indexing uploaded image

            $target_path = "multiple_image_upload/uploads/"; //Declaring Path for uploaded images
            for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array

                $validextensions = array("jpeg", "jpg", "png", "pdf", "csv", "doc", "docx", "xls", "xlsx");  //Extensions which are allowed
                $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.)
                $file_extension = end($ext); //store extensions in the variable

                $target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
                $j = $j + 1;//increment the number of uploaded images according to the files in array

                if (($_FILES["file"]["size"][$i] < 100000000) //Approx. 100kb files can be uploaded.
                    && in_array($file_extension, $validextensions)) {
                    if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder

                        //echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';

                        $eseal_attachment_name =$ext[0];
                        $eseal_attachment_path =$target_path;
                        $eseal_attachment_status =1;

                        $insert_attachment_sq1 = "INSERT INTO `eseal_attachment` (eseal_id, eseal_attachment_name, eseal_attachment_path,eseal_attachment_status)
                        VALUES ('$id','$eseal_attachment_name','$eseal_attachment_path','$eseal_attachment_status')";

                        $insert_attachment_exe = mysql_query($insert_attachment_sq1);


                    } else {//if file was not moved.

                        //echo $j. ').<span id="error">please try again!.</span><br/><br/>';

                    }
                } else {//if file size and file type was incorrect.

                    //echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';

                }
            }

        }
        /* END UPLOAD */

        header("Location: my-seal-status.php?success=1&msg=all");
    }
    else
    {
        header("Location: my-seal.php?error=2&msg=all");
    }
				

}
else
{
header("Location: my-seal.php?error=1&msg=all");
} 	
	
?>
                            
						