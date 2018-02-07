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

$fromDate = isset($_REQUEST['fromDate']) ? $_REQUEST['fromDate'] : null;
$toDate = isset($_REQUEST['toDate']) ? $_REQUEST['toDate'] : null;
$saleStatus = isset($_REQUEST['saleStatus']) ? $_REQUEST['saleStatus'] : null;
$date = date("Y-m-d");

if ($saleStatus == 1) {
    if($fromDate != null || $fromDate != 0) {
        if ($toDate != null || $toDate != 0) {
            $product_sql = "SELECT product_info.*, products.product_name, exporter_info.name_exporter FROM `product_info`
            LEFT JOIN `products` ON products.id = product_info.product_id
            LEFT JOIN `exporter_info` ON product_info.product_exporter_id = exporter_info.user_id
            WHERE `product_info`.user_id = $user_id and product_info.product_added_date between '$fromDate' and '$toDate'";
            $product_exe = mysql_query($product_sql);
            $product_cnt = @mysql_num_rows($product_exe);
        }
        else{
            $product_sql = "SELECT product_info.*, products.product_name, exporter_info.name_exporter FROM `product_info`
            LEFT JOIN `products` ON products.id = product_info.product_id
            LEFT JOIN `exporter_info` ON product_info.product_exporter_id = exporter_info.user_id
            WHERE `product_info`.user_id = $user_id and product_info.product_added_date between '$fromDate' and '$date'";
            $product_exe = mysql_query($product_sql);
            $product_cnt = @mysql_num_rows($product_exe);
        }
    }
    else{
        $product_sql = "SELECT product_info.*, products.product_name, exporter_info.name_exporter FROM `product_info`
            LEFT JOIN `products` ON products.id = product_info.product_id
            LEFT JOIN `exporter_info` ON product_info.product_exporter_id = exporter_info.user_id
            WHERE `product_info`.user_id = $user_id";
        $product_exe = mysql_query($product_sql);
        $product_cnt = @mysql_num_rows($product_exe);
    }
}

else if ($saleStatus == 2) {
    if($fromDate != null || $fromDate != 0) {
        if ($toDate != null || $toDate != 0) {
            $product_sql = "SELECT product_info.*, products.product_name, exporter_info.name_exporter FROM `product_info`
            LEFT JOIN `products` ON products.id = product_info.product_id
            LEFT JOIN `exporter_info` ON product_info.product_exporter_id = exporter_info.user_id
            WHERE `product_info`.user_id = $user_id and `product_info`.product_sale_status = 1 and product_info.product_added_date between '$fromDate' and '$toDate'";
            $product_exe = mysql_query($product_sql);
            $product_cnt = @mysql_num_rows($product_exe);
        }
        else{
            $product_sql = "SELECT product_info.*, products.product_name, exporter_info.name_exporter FROM `product_info`
            LEFT JOIN `products` ON products.id = product_info.product_id
            LEFT JOIN `exporter_info` ON product_info.product_exporter_id = exporter_info.user_id
            WHERE `product_info`.user_id = $user_id and `product_info`.product_sale_status = 1 and product_info.product_added_date between '$fromDate' and '$date'";
            $product_exe = mysql_query($product_sql);
            $product_cnt = @mysql_num_rows($product_exe);
        }
    }
    else{
        $product_sql = "SELECT product_info.*, products.product_name, exporter_info.name_exporter FROM `product_info`
            LEFT JOIN `products` ON products.id = product_info.product_id
            LEFT JOIN `exporter_info` ON product_info.product_exporter_id = exporter_info.user_id
            WHERE `product_info`.user_id = $user_id and `product_info`.product_sale_status = 1";
        $product_exe = mysql_query($product_sql);
        $product_cnt = @mysql_num_rows($product_exe);
    }
}

else if ($saleStatus == 3) {
    if($fromDate != null || $fromDate != 0) {
        if ($toDate != null || $toDate != 0) {
            $product_sql = "SELECT product_info.*, products.product_name, exporter_info.name_exporter FROM `product_info`
            LEFT JOIN `products` ON products.id = product_info.product_id
            LEFT JOIN `exporter_info` ON product_info.product_exporter_id = exporter_info.user_id
            WHERE `product_info`.user_id = $user_id and `product_info`.product_sale_status = 0 and product_info.product_added_date between '$fromDate' and '$toDate'";
            $product_exe = mysql_query($product_sql);
            $product_cnt = @mysql_num_rows($product_exe);
        }
        else{
            $product_sql = "SELECT product_info.*, products.product_name, exporter_info.name_exporter FROM `product_info`
            LEFT JOIN `products` ON products.id = product_info.product_id
            LEFT JOIN `exporter_info` ON product_info.product_exporter_id = exporter_info.user_id
            WHERE `product_info`.user_id = $user_id and `product_info`.product_sale_status = 0 and product_info.product_added_date between '$fromDate' and '$date'";
            $product_exe = mysql_query($product_sql);
            $product_cnt = @mysql_num_rows($product_exe);
        }
    }
    else{
        $product_sql = "SELECT product_info.*, products.product_name, exporter_info.name_exporter FROM `product_info`
            LEFT JOIN `products` ON products.id = product_info.product_id
            LEFT JOIN `exporter_info` ON product_info.product_exporter_id = exporter_info.user_id
            WHERE `product_info`.user_id = $user_id and `product_info`.product_sale_status = 0";
        $product_exe = mysql_query($product_sql);
        $product_cnt = @mysql_num_rows($product_exe);
    }
}

else{
    $product_sql="SELECT product_info.*, products.product_name, exporter_info.name_exporter FROM `product_info`
LEFT JOIN `products` ON products.id = product_info.product_id
LEFT JOIN `exporter_info` ON product_info.product_exporter_id = exporter_info.user_id
 WHERE `product_info`.user_id = $user_id";
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
<style>
    th{
        text-align: center;
        text-transform: uppercase;
    }
</style>
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
                    <div class="box" style="min-height: 600px;">
                        <div class="box-body">
                            <div class="row">
                                <a href="add-product-inventories.php?inventory_id=1" style="float: right; margin-right: 10px;"><button type="button" class="btn btn-info btn-xs" style="margin-bottom: 10px;">Add Product Inventories</button></a>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="add-bulk-inventories.php?inventory_id=1" style="float: right; margin-right: 10px;"><button type="button" class="btn btn-info btn-xs" style="margin-bottom: 10px;">Add Bulk Inventories</button></a>
                            </div>

                            <div class="row col-sm-12">
                                <form class="datesearch" action="" method="get">
                                    <div class="col-sm-3">
                                        <label>Sale Status:</label>
                                        <select class="form-control" name="saleStatus" id="saleStatus" required>
                                            <option value="1"> All </option>
                                            <option value="2"> Sold </option>
                                            <option value="3"> Instock </option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>From:</label>
                                        <input class="form-control" type="date" name="fromDate" id="fromDate" value=""/>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>To:</label>
                                        <input class="form-control" type="date" name="toDate" id="toDate" value=""/>
                                    </div>
                                    <div class="col-sm-3">
                                        <label>&nbsp;</label>
                                        <button class="btn btn-warning datesearch" type="submit" style="margin-top: 25px;">Search</button>
                                    </div>
                                </form>
                            </div>
                            <div class="row col-sm-12">
                                <br/>
                            </div>

                            <?php
                            if($product_cnt>0)
                            {
                                ?>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>SlNo</th>
                                        <th>Product Name</th>
                                        <th>E-Seal Number</th>
                                        <th>Date of Product Added</th>
                                        <th>Status</th>
                                        <th class="hidden">Exporter Name</th>
                                        <th class="hidden">Sold Date</th>
                                        <th class="hidden">Sale Price</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sl=0;
                                    while($product_fet=mysql_fetch_array($product_exe))
                                    {
                                        $sl++;
                                        ?>
                                        <tr>
                                            <td><?php echo $sl; ?></td>
                                            <td><?php echo $product_fet['product_name']; ?></td>
                                            <td><?php echo $product_fet['product_sealcode']; ?></td>
                                            <td><?php echo $product_fet['product_added_date'];; ?></td>
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
                                            <td class="hidden"><?php echo $product_fet['name_exporter']; ?></td>
                                            <td class="hidden"><?php echo $product_fet['product_sale_date']; ?></td>
                                            <td class="hidden"><?php echo $product_fet['product_sale_price']; ?></td>
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


<?php /* ?>
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
 <?php */ ?>


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

<?php /* ?>
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
<link href="https://cdn.datatables.net/buttons/1.5.0/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css">
<?php */ ?>

<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.5.0/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.5.0/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.5.0/js/buttons.print.min.js"></script>
<script>

    $(document).ready(function() {
        $('#example2').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'csv', 'excel', 'pdf'
            ]
        } );
    } );

</script>
</body>
</html>
