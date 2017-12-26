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

if(isset($_REQUEST['buyproduct']))
{
print_r($_REQUEST);
$Product = $_REQUEST['Product'];
$Quantity = $_REQUEST['Quantity'];

$ProductAmount = $_REQUEST['ProductAmount'];
$TotalAmount = $_REQUEST['TotalAmount'];
$GstAmount = $_REQUEST['GstAmount'];
$ShippingAmount = $_REQUEST['ShippingAmount'];
$DiscountAmount = $_REQUEST['DiscountAmount'];
$GrandAmount = $_REQUEST['GrandAmount'];


$DeliveryName = $_REQUEST['DeliveryName'];
$DeliveryAddress = $_REQUEST['DeliveryAddress'];
$DeliveryCity = $_REQUEST['DeliveryCity'];
$DeliveryState = $_REQUEST['DeliveryState'];
$DeliveryCountry = $_REQUEST['DeliveryCountry'];
$DeliveryPin = $_REQUEST['DeliveryPin'];
$DeliveryMobile = $_REQUEST['DeliveryMobile'];

$PaymentType = $_REQUEST['PaymentType'];
$PaymentNotes = $_REQUEST['PaymentNotes'];

$SaleType = "1";
$SaleStatus = "0";
$SaleDate = date("Y-m-d");

$DeliveryType = "0";
$DeliveryStatus = "0";
$DeliveryDate = "0";

$username = "User";
$date = date("Y-m-d");

$ProductOrder="10000000".time();

$product_count_fetch=0;
$product_id = $Product;
$product_count_sql="SELECT COUNT(*) AS `pro_count` FROM `product_info` WHERE `product_id`='$product_id' AND `product_sale_status`=0";
$product_count_exe=mysql_query($product_count_sql);
$product_count_fet=mysql_fetch_array($product_count_exe);
$product_count_fetch=$product_count_fet['pro_count'];
//echo $product_count_fetch;

    if($product_count_fetch>=$Quantity)
    {
/*
 `product_sale_price`
`product_sale_gst`
`product_sale_delivery`
`product_sale_discount`
`product_sale_total`
`product_sale_grand_total`

'$GstAmount','$ShippingAmount','$DiscountAmount','$GrandAmount'

 */
        $insert_order_sq1 = "INSERT INTO `product_order` (user_id, product_exporter_id, product_id, product_order_id,
    product_sale_quantity, product_sale_price, product_sale_total, product_sale_gst, product_sale_delivery, product_sale_discount, product_sale_grand_total,
    product_sale_type, product_sale_status, product_sale_date, product_sale_payment_type, product_sale_payment_notes,
    product_delivery_name, product_delivery_address, product_delivery_city,  product_delivery_state, product_delivery_country, product_delivery_pincode, product_delivery_mobile,
    product_delivery_type, product_delivery_status, product_delivery_date,
    created_by, updated_by, created_at, updated_at)
    VALUES ('$user_id','$user_id','$Product','$ProductOrder',
    '$Quantity','$ProductAmount','$TotalAmount','$GstAmount','$ShippingAmount','$DiscountAmount','$GrandAmount',
    '$SaleType','$SaleStatus','$SaleDate','$PaymentType','$PaymentNotes',
    '$DeliveryName','$DeliveryAddress','$DeliveryCity','$DeliveryState','$DeliveryCountry','$DeliveryPin','$DeliveryMobile',
    '$DeliveryType', '$DeliveryStatus', '$DeliveryDate',
    '$username','$username','$date','$date')";
        //echo $insert_order_sq1; exit;
        $insert_order_exe = mysql_query($insert_order_sq1);

        $order_id=mysql_insert_id();

        if($order_id>0)
        {
        $product_info_sql="SELECT * FROM `product_info` WHERE `product_id`='$product_id' AND `product_sale_status`=0 ORDER BY `id` ASC LIMIT $Quantity ";
        //echo $product_info_sql;
        $product_info_exe=mysql_query($product_info_sql);
        while($product_info_fet=mysql_fetch_array($product_info_exe)) {
            $product_id = $product_info_fet['product_id'];
            $product_info_id = $product_info_fet['id'];
            $product_unicode = $product_info_fet['product_unicode'];
            $product_sealcode = $product_info_fet['product_sealcode'];
            $product_sale_price = $product_info_fet['product_sale_price'];
            $product_exporter_id = $user_id;
            $product_sale_status = 1;
            $product_sale_date = date("Y-m-d");


            $product_info_update_sql = "UPDATE `product_info` SET `product_exporter_id`='$product_exporter_id',`product_sale_status`='$product_sale_status',`product_sale_date`='$product_sale_date' WHERE `id`='$product_info_id' AND `product_id`='$product_id' AND `product_sale_status`=0";
            //echo $product_info_update_sql;
            $product_info_update_exe = mysql_query($product_info_update_sql);

            /*
             INSERT SQL
            */
            $product_order_info_sql = "INSERT INTO `product_order_info`
            (`user_id`, `product_id`, `product_order_id`, `product_unicode`, `product_sealcode`, `product_exporter_id`,
            `created_by`, `updated_by`, `created_at`, `updated_at`)
            VALUES
            ('$user_id', '$product_id', '$order_id', '$product_unicode', '$product_sealcode','$product_exporter_id',
            '$username', '$username', '$product_sale_date', '$product_sale_date')";
            //echo $product_order_info_sql;
            $product_order_info_exe = mysql_query($product_order_info_sql);

        }

            if($PaymentType=="Online")
            {

                //exit;
                header("Location: product-order.php?order_id=$order_id");

                //header("Location: http://www.ccavenue.com");

            }
            else
            {
                //exit;
                header("Location: product-order.php?order_id=$order_id");

            }


        }
        else
        {
            header("Location: product-buy.php?err=3&msg=all");
        }


    }
    else
    {
        header("Location: product-buy.php?err=2&msg=all");
    }
				

}
else
{
header("Location: product-buy.php?err=1&msg=all");
} 	
	
?>
                            
						