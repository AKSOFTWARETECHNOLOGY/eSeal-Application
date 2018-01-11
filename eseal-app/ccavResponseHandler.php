<?php include('Crypto.php')?>
<?php

include "config.php";

	error_reporting(0);
	
	$workingKey='631FABF9536EF6273FB120790DE31E7A';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	echo "<center>";

	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
        if($i==0)
        {
            $order_id=$information[1];
        }
        if($i==1)
        {
            $tracking_id=$information[1];
        }
        if($i==2)
        {
            $bank_ref_no=$information[1];
        }
        if($i==3)
        {
            $order_status=$information[1];
        }
	}

	if($order_status==="Success")
	{

        $product_order_sql="SELECT * FROM `product_order` WHERE `product_order_id`='$order_id'";
        $product_order_exe=mysql_query($product_order_sql);
        if(mysql_num_rows($product_order_exe)>0) {
            $product_order_fet=mysql_fetch_array($product_order_exe);
        }
        else
        {
            exit();
            //header("Location:order-history.php?err=1");
        }
        header("Location:dobuyconfirm.php?confirm=1&order_id=".$product_order_fet['id']);
    ?>
<?php /*
        <form action="dobuyconfirm.php" name="redirect" method="post">
            <input type="hidden" name="order_id" value="<?php echo $product_order_fet['id']; ?>" />
            <button name="confirm" type="submit" class="btn btn-info"> Confirm Order </button>
        </form>
        <script language='javascript'>document.redirect.submit();</script>
*/ ?>
    <?php

		echo "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
		
	}
	else if($order_status==="Aborted")
	{

        $product_order_sql="DELETE FROM `product_order` WHERE `product_order_id`='$order_id'";
        $product_order_exe=mysql_query($product_order_sql);


        echo "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
        echo "<a href='product-buy.php'> Try Again </a>";
	}
	else if($order_status==="Failure")
	{
        $product_order_sql="DELETE FROM `product_order` WHERE `product_order_id`='$order_id'";
        $product_order_exe=mysql_query($product_order_sql);


		echo "<br>Thank you for shopping with us.However,the transaction has been declined.";
        echo "<a href='product-buy.php'> Try Again </a>";
	}
	else
	{
        $product_order_sql="DELETE FROM `product_order` WHERE `product_order_id`='$order_id'";
        $product_order_exe=mysql_query($product_order_sql);


        echo "<br>Security Error. Illegal access detected";
        echo "<a href='product-buy.php'> Try Again </a>";
	}

	echo "<br><br>";
/*
	echo "<table cellspacing=4 cellpadding=4>";
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
	    	echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
	}

	echo "</table><br>";
*/
	echo "</center>";
?>
