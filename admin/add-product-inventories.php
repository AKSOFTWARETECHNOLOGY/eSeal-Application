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

if(isset($_REQUEST['inventory_id']))
{
    $inventory_id=$_REQUEST['inventory_id'];
}
else
{
    exit;
}

$product_sql="SELECT product_info.*, products.product_name, products.product_price FROM `product_info` LEFT JOIN `products` ON products.id = product_info.product_id WHERE `product_info`.user_id = $user_id";
$product_exe=mysql_query($product_sql);
$product_cnt=@mysql_num_rows($product_exe);
$product_fet=mysql_fetch_array($product_exe);

$prod_sql="SELECT * from products WHERE product_status = 1";
$prod_exe=mysql_query($prod_sql);
$prod_results = array();
while($row = mysql_fetch_assoc($prod_exe)) {
    array_push($prod_results, $row);
}

$seal_sql="SELECT max(product_sealcode) as maxCode from product_info";
$seal_exe=mysql_query($seal_sql);
$seal_fet=mysql_fetch_array($seal_exe);
$code = $seal_fet['maxCode'];
$seal = str_replace('SSGA', '', $code);
if($seal=="")
{
    $maxseal =  10000001;
    $sealcode = 'SSGA' . $maxseal;
}
else
{
    $maxseal =  $seal + 1;
    $sealcode = 'SSGA' . $maxseal;
}

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
                Add New Product Inventory
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Add Product Inventory</li>
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
                            <h3 class="box-title">Add New Product Inventory</h3>
                        </div><!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="doaddinventory.php" method="post">
                            <div class="box-body">

                                <div class="col-md-12">
                                    <style>.control-label{line-height:32px;} .form-group{line-height:32px;}</style>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">Product Name<span class="req"> *</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="productId" id="productId">
                                                <option value="0">Select Product</option>
                                                <?php
                                                foreach($prod_results as $key => $value){ ?>
                                                    <option value="<?php echo $value['id']; ?>"><?php echo $value['product_name']; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <input type="hidden" name="productPrice" value="<?php echo $product_fet['product_price'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 hidden">
                                        <label class="col-sm-3 control-label">Product Code</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="unicode" id="unicode" value="" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-3 control-label">E-Seal Number</label>
                                        <div class="col-sm-9">
                                            <input class="form-control" type="text" name="sealcode" id="unicode" value="<?php echo $sealcode; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 hidden">
                                        <label class="col-sm-3 control-label">Product Sale Price</label>
                                        <div class="col-sm-9">
                                            <input class="form-control"  type="number" name="salePrice" id="salePrice" value="0" />
                                            <div id="errProdPrice" style="color:red"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat add-prod">Add</button>
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
                                <a href="inventorieslist.php"><button type="submit" class="btn btn-warning col-md-12" style="margin-bottom:10px;" >Back to Product Inventory List</button></a>
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
