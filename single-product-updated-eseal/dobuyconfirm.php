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

if(isset($_REQUEST['confirm']))
{
    $order_id=$_REQUEST['order_id'];
}
else
{
    exit;
}

if($order_id>0)
{

    $userinfo_sql="SELECT * FROM `exporter_info` WHERE `user_id`='$user_id'";
    $userinfo_exe=mysql_query($userinfo_sql);
    $userinfo=mysql_fetch_array($userinfo_exe);

    $product_order_sql="SELECT * FROM `product_order` WHERE `id`='$order_id' AND `product_exporter_id`='$user_id' ORDER BY `id` DESC";
    $product_order_exe=mysql_query($product_order_sql);
    if(mysql_num_rows($product_order_exe)>0) {
        $product_order_fet=mysql_fetch_array($product_order_exe);

        $product_order_update_sql = "UPDATE `product_order` SET `product_sale_status`='1' WHERE `id`='$order_id' AND `product_exporter_id`='$user_id' AND `product_sale_status`=0";
        //echo $product_order_update_sql;
        $product_order_update_exe = mysql_query($product_order_update_sql);

    }
    else
    {
        header("Location:order-history.php?err=1");
    }

    $Quantity=$product_order_fet['product_sale_quantity'];
    $product_id=$product_order_fet['product_id'];

    $product_info_sql="SELECT * FROM `product_info` WHERE `product_id`='$product_id' AND `product_sale_status`=0 ORDER BY `id` ASC LIMIT $Quantity ";
    //echo $product_info_sql;
    $product_info_exe=mysql_query($product_info_sql);
    while($product_info_fet=mysql_fetch_array($product_info_exe)) {
        $product_id = $product_info_fet['product_id'];
        $product_info_id = $product_info_fet['id'];
        $product_unicode = $product_info_fet['product_unicode'];
        $product_sealcode = $product_info_fet['product_sealcode'];

        $product_sale_price = $product_order_fet['product_sale_price'];
        $product_exporter_id = $user_id;
        $product_sale_status = 1;
        $product_sale_date = date("Y-m-d");


        $product_info_update_sql = "UPDATE `product_info` SET `product_exporter_id`='$product_exporter_id',`product_sale_price`='$product_sale_price',`product_sale_status`='$product_sale_status',`product_sale_date`='$product_sale_date' WHERE `id`='$product_info_id' AND `product_id`='$product_id' AND `product_sale_status`=0";
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

?>