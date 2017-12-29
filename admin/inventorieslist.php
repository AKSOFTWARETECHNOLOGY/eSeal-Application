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

if($_REQUEST['sold']){
    $product_sql="SELECT product_info.*, products.product_name FROM `product_info`
LEFT JOIN `products` ON products.id = product_info.product_id
WHERE `product_info`.user_id = $user_id and `product_info`.product_sale_status = 1";
    $product_exe=mysql_query($product_sql);
    $product_cnt=@mysql_num_rows($product_exe);
}
else if($_REQUEST['instock']){
    $product_sql="SELECT product_info.*, products.product_name FROM `product_info`
LEFT JOIN `products` ON products.id = product_info.product_id
WHERE `product_info`.user_id = $user_id and `product_info`.product_sale_status = 0";
    $product_exe=mysql_query($product_sql);
    $product_cnt=@mysql_num_rows($product_exe);
}
else{
    $product_sql="SELECT product_info.*, products.product_name FROM `product_info` LEFT JOIN `products` ON products.id = product_info.product_id WHERE `product_info`.user_id = $user_id";
    $product_exe=mysql_query($product_sql);
    $product_cnt=@mysql_num_rows($product_exe);
}

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
                Product Inventories List
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>

                <li class="active">Product Inventories List</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="row">
                                <a href="add-product-inventories.php?inventory_id=1" style="float: right; margin-right: 10px;"><button type="button" class="btn btn-info btn-xs" style="margin-bottom: 10px;">Add Product Inventories</button></a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="add-bulk-inventories.php?inventory_id=1" style="float: right; margin-right: 10px;"><button type="button" class="btn btn-info btn-xs" style="margin-bottom: 10px;">Add Bulk Inventories</button></a>
                            </div>

                            <div class="row col-sm-4">

                                <div class="row">
                                    <a href="inventorieslist.php?all=1" style="margin-left: 10px;"><button type="button" class="btn btn-info" style="margin-bottom: 10px;">All</button></a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="inventorieslist.php?sold=1" style="margin-left: 10px;"><button type="button" class="btn btn-info" style="margin-bottom: 10px;">Sold</button></a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="inventorieslist.php?instock=1" style="margin-left: 10px;"><button type="button" class="btn btn-info" style="margin-bottom: 10px;">Instock</button></a>
                                </div>
                            </div>
                            <div class="row col-sm-8">
                                <form class="datesearch" action="" class="hidden" method="post" style="display:none;">
                                    <div class="col-sm-1">
                                        <label>From:</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input class="form-control" type="date" name="fromDate" value=""/>
                                    </div>
                                    <div class="col-sm-1"> </div>

                                    <div class="col-sm-1">
                                        <label>To:</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input class="form-control" type="date" name="toDate" value=""/>
                                    </div>
                                    <div class="col-sm-1"> </div>

                                    <div class="col-sm-2">
                                        <button class="btn btn-warning" name="datesearch" type="submit">Search</button>
                                    </div>
                                </form>
                            </div>

                            <div class="row" style="line-height: 2px;"></div>


                            <?php
                            if($product_cnt>0)
                            {
                                ?>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>SlNo</th>
                                        <th>Product Name</th>
                                        <th class="hidden">Product Code</th>
                                        <th>E-Seal Number</th>
                                        <th>Date of Product Added</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sl=0;
                                    while($product_fet=mysql_fetch_array($product_exe))
                                    {
                                        $sl++;
                                        $added_date = substr($product_fet['created_at'], 0, 10);
                                        ?>
                                        <tr>
                                            <td><?php echo $sl; ?></td>
                                            <td><?php echo $product_fet['product_name']; ?></td>
                                            <td class="hidden"><?php echo $product_fet['product_unicode']; ?></td>
                                            <td><?php echo $product_fet['product_sealcode']; ?></td>
                                            <td><?php echo $added_date; ?></td>
                                            <td>
                                                <?php if($product_fet['product_sale_status'] == 0){
                                                    ?>
                                                    <button type="button" class="btn btn-success btn-xs"> Instock </button>
                                                <?php
                                                }
                                                else if($product_fet['product_sale_status'] == 1){
                                                    ?>
                                                    <button type="button" class="btn btn-warning btn-xs"> Sold </button>
                                                <?php
                                                }?>
                                            </td>
                                            <td>
                                                <a href="inventoryview.php?inventory_id=<?php echo $product_fet['id']; ?>"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</button></a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>

                                </table>
                            <?php
                            }
                            else{
                                ?>
                                <p><b> Records are being updated. </b></p>
                            <?php
                            }
                            ?>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->


                </div><!-- /.col -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <?php include "footer.php"; ?>

</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<!-- DATA TABES SCRIPT -->
<script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js" type="text/javascript"></script>
<!-- page script -->
<script type="text/javascript">
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
</body>
</html>
