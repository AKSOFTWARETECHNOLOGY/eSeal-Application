<?php session_start();
ob_start();

if(!isset($_SESSION['adminuserid']))
{
    header("Location: index.php");
}

include "config.php";

$user_id=$_SESSION['adminuserid'];
$user_role=$_SESSION['adminuserrole'];
$user_name=$_SESSION['adminusername'];
$user_email=$_SESSION['adminuseremail'];

$product_sql="SELECT * FROM `products` WHERE `products`.product_status = 1 and `products`.user_id = $user_id";
$product_exe=mysql_query($product_sql);
$product_cnt=@mysql_num_rows($product_exe);
$product_fet=mysql_fetch_array($product_exe);
$prodId = $product_fet['id'];

$inv_sql="SELECT * FROM `product_info` as `pi` WHERE `pi`.product_id = $prodId and `pi`.product_sale_status = 0";
$inv_exe=mysql_query($inv_sql);
$inv_cnt=@mysql_num_rows($inv_exe);
//$product_fet=mysql_fetch_array($product_exe);

$product_count_fetch=0;
$product_id = 1;
$product_count_sql="SELECT COUNT(*) AS `pro_count` FROM `product_info` WHERE `product_id`='$product_id' AND `product_sale_status`=0 AND `product_exporter_id` IS NULL";
$product_count_exe=mysql_query($product_count_sql);
$product_count_fet=mysql_fetch_array($product_count_exe);
$product_count_fetch=$product_count_fet['pro_count'];


$export_sql="SELECT ei.* FROM `exporter_info` AS `ei`
LEFT JOIN `users` ON users.id = ei.user_id
WHERE `users`.delete_status = 1";
$export_exe=mysql_query($export_sql);
$export_cnt=@mysql_num_rows($export_exe);

?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .req{
            color : red;
        }
    </style>

    <meta charset="UTF-8">
    <title>Admin Panel </title>
    <?php include "head1.php"; ?>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
    <?php include "header.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Buy Product
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Buy Product</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-9">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Buy Product Details</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="dobuyproduct.php" method="post">
                            <div class="box-body">

                                <div class="col-md-12">
                                    <style>.control-label{line-height:32px;} .form-group{line-height:32px;}</style>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Product Name<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <select name="productName" id="productName" class="form-control">
                                                <option value="0"> Select Product </option>
                                                <option value="<?php echo $product_fet['id']; ?>"> <?php echo $product_fet['product_name']; ?> </option>
                                            </select>
                                            <div class="err" id="errProductName" style="color:red"></div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Exporter Name<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="exporterName" id="exporterName">
                                                <option value="0"> Select Exporter </option>
                                                <?php
                                                while($export_fet=mysql_fetch_array($export_exe))
                                                {
                                                ?>
                                                <option value="<?php echo $export_fet['id']; ?>"> <?php echo $export_fet['name_exporter']; ?> </option>
                                                <?php } ?>
                                            </select>
                                            <div class="err" id="errExporterName" style="color:red"></div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Quantity<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="quantity" id="quantity">
                                                <option value="0"> Select Quantity </option>
                                                <?php if($product_count_fetch>=10) { ?>
                                                    <option value="10">10</option>
                                                <?php } ?>
                                                <?php if($product_count_fetch>=20) { ?>
                                                    <option value="20">20</option>
                                                <?php } ?>
                                                <?php if($product_count_fetch>=30) { ?>
                                                    <option value="30">30</option>
                                                <?php } ?>
                                                <?php if($product_count_fetch>=40) { ?>
                                                    <option value="40">40</option>
                                                <?php } ?>
                                                <?php if($product_count_fetch>=50) { ?>
                                                    <option value="50">50</option>
                                                <?php } ?>
                                                <?php if($product_count_fetch>=60) { ?>
                                                    <option value="60">60</option>
                                                <?php } ?>
                                                <?php if($product_count_fetch>=70) { ?>
                                                    <option value="70">70</option>
                                                <?php } ?>
                                                <?php if($product_count_fetch>=80) { ?>
                                                    <option value="80">80</option>
                                                <?php } ?>
                                                <?php if($product_count_fetch>=90) { ?>
                                                    <option value="90">90</option>
                                                <?php } ?>
                                                <?php if($product_count_fetch>=100) { ?>
                                                    <option value="100">100</option>
                                                <?php } ?>
                                            </select>
                                            <div class="err" id="errQuantity" style="color:red"></div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Payment Option<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="payment" id="payment">
                                                <option value="0"> Select Payment Option </option>
                                                <option value="Cash On Delivery"> Cash On Delivery </option>
                                                <option value="NEFT"> NEFT </option>
                                                <option value="Cheque/DD"> Cheque/DD </option>
                                            </select>
                                            <div class="err" id="errPayment" style="color:red"></div>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <input type="hidden" name="userId" value="<?php echo $product_fet['user_id']; ?>" />
                                        <button type="submit" class="btn btn-primary btn-block btn-flat buy-prod">BUY</button>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            </div><!-- /.box-body -->
                        </form>
                    </div><!-- /.box -->
                </div><!--/.col (left) -->

                <!-- right column -->
                <div class="col-md-3">
                    <!-- Horizontal Form -->
                    <div class="box box-danger" >
                        <div class="box-header with-border">
                            <h3 class="box-title">Product</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->

                        <div class="box-body">
                            <div class="form-group col-md-12">
                                <a href="productlist.php"><button type="submit" class="btn btn-warning col-md-12" style="margin-bottom:10px;" >Back to Product List</button></a>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!--/.col (right) -->
            </div>   <!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <?php include "footer.php"; ?>

</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $(".buy-prod").click(function(){
            $("div.err").html( "  " );
            var prodId = $('#productName').val();
            if(prodId == 0){
                $("div#errProductName").html( "This field is required" );
                return false;
            }
            var expId = $('#exporterName').val();
            if(expId == 0){
                $("div#errExporterName").html( "This field is required" );
                return false;
            }
            var quantity = $('#quantity').val();
            if(quantity == 0){
                $("div#errQuantity").html( "This field is required" );
                return false;
            }
            var pay = $('#payment').val();
            if(pay == 0){
                $("div#errPayment").html( "This field is required" );
                return false;
            }

        });
    });
</script>
</body>
</html>
