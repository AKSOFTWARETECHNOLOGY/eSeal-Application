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
                Edit Product
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edit Product</li>
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
                            <h3 class="box-title">Edit Product Details</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="doupdateproduct.php?product_id=<?php echo $product_fet['id']; ?>" method="post">
                            <div class="box-body">

                                <div class="col-md-12">
                                    <style>.control-label{line-height:32px;} .form-group{line-height:32px;}</style>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Product Name<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="productName" id="productName" value="<?php echo $product_fet['product_name']; ?>" />
                                            <div id="errProdName" style="color:red"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Product Info</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="productInfo"><?php echo $product_fet['product_info']; ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Product Price<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="number" step="0.01" name="productPrice" id="productPrice" value="<?php echo $product_fet['product_price']; ?>" />
                                            <div id="errProdPrice" style="color:red"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat save-prod">Save Changes</button>
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
                                <a href="productlist.php"><button type="submit" class="btn btn-warning col-md-12" style="margin-bottom:10px;" >Back to Products List</button></a>
                                <a style="display:none;"href="memberedit.php"><button type="submit" class="btn btn-info col-md-12" style="margin-bottom:10px;">Edit Member Profile</button></a>
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
        $(".save-prod").click(function(){
            $("div#errProdName").html( " " );
            $("div#errProdPrice").html( " " );
            var prodName = $('#productName').val();
            if(!prodName){
                $("div#errProdName").html( "This field is required" );
                return false;
            }
            var prodPrice = $('#productPrice').val();
            if(!prodPrice){
                $("div#errProdPrice").html( "This field is required" );
                return false;
            }
        });
    });
</script>
</body>
</html>
