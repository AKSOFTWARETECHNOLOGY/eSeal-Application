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

if(isset($_REQUEST['product_id']))
{
    $product_id=$_REQUEST['product_id'];
}
else
{
    exit;
}

$product_sql="SELECT * FROM `products` WHERE `id`='$product_id' ";
$product_exe=mysql_query($product_sql);
$product_cnt=@mysql_num_rows($product_exe);
$product_fet=mysql_fetch_array($product_exe);
?>
<!DOCTYPE html>
<html>
<head>
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
                View Product
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">View Product</li>
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
                            <h3 class="box-title">View Product Details</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="box-body">

                                <div class="col-md-12">
                                    <style>.control-label{line-height:32px;} .form-group{line-height:32px;}</style>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Product Name</label>
                                        <div class="col-sm-9">
                                            <div class=""><?php echo $product_fet['product_name']; ?></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Product Info</label>
                                        <div class="col-sm-9"><div class="" ><?php echo $product_fet['product_info']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Product Price</label>
                                        <div class="col-sm-9"><div class=""> <?php echo $product_fet['product_price']; ?></div></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Product Status</label>
                                        <div class="col-sm-9"><div class="">
                                                <?php if($product_fet['product_status']  == 1) { ?>
                                                    <button type="button" class="btn btn-success btn-xs">Active</button>
                                                <?php } else { ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Inactive</button>
                                                <?php } ?>
                                        </div></div>
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
                                <a href="productlist.php"><button type="button" class="btn btn-info col-md-12" style="margin-bottom:10px;" >Back to List</button></a>
                                <a href="productedit.php?product_id=<?php echo $product_fet['id']; ?>"><button type="button" class="btn btn-warning col-md-12"  style="margin-bottom:10px;"><i class="fa fa-pencil"></i> Edit</button></a>

                                <?php if($product_fet['product_status']  == 1) { ?>
                                    <a href="product-delete.php?disable=1&product_id=<?php echo $product_fet['id']; ?>" onclick="return confirm('Are you sure you want to disable this product?');"><button type="button" class="btn btn-danger col-md-12"><i class="fa fa-trash-o"></i> Disable</button></a>
                                <?php } else { ?>
                                    <a href="product-delete.php?enable=1&product_id=<?php echo $product_fet['id']; ?>" onclick="return confirm('Are you sure you want to enable this product?');"><button type="button" class="btn btn-success col-md-12"><i class="fa fa-trash-o"></i> Enable</button></a>
                                <?php } ?>


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
</body>
</html>
