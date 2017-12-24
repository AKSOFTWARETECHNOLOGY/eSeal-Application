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

/*
SELECT a.tutorial_id, a.tutorial_author, b.tutorial_count
    -> FROM tutorials_tbl a, tcount_tbl b
    -> WHERE a.tutorial_author = b.tutorial_author;

*/
$order_sql="SELECT poi.*, `exporter_info`.`name_exporter`, products.product_name
FROM `product_order_info` AS `poi`
LEFT JOIN `product_order` ON product_order.id = poi.product_order_id
LEFT JOIN `products` ON products.id = poi.product_id
LEFT JOIN `exporter_info` ON exporter_info.id = product_order.product_exporter_id
WHERE poi.product_item_status = 1";
//echo $order_sql;
$order_exe=mysql_query($order_sql);
$order_cnt=@mysql_num_rows($order_exe);
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
                Eseal List
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>

                <li class="active">Eseal List</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" style="line-height:30px;">Eseal List</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <?php
                            if($order_cnt>0)
                            {
                                ?>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>E-seal Number</th>
                                        <th>E-seal Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sl=0;
                                    while($order_fet=mysql_fetch_array($order_exe))
                                    {
                                        $sl++;
                                        ?>
                                        <tr>
                                            <td><?php echo $sl; ?></td>
                                            <td><?php echo $order_fet['product_sealcode']; ?></td>
                                            <td>
                                                <?php
                                                if($order_fet['customs_approve_status']==0) { ?>
                                                    <button type="button" class="btn btn-warning btn-xs">Pending</button>
                                                <?php
                                                }
                                                else if($order_fet['customs_approve_status']==1) { ?>
                                                    <button type="button" class="btn btn-success btn-xs">Success</button>
                                                <?php }
                                                else if($order_fet['customs_approve_status']==2) { ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Tampered</button>
                                                <?php }
                                                else {  ?>
                                                    <button type="button" class="btn btn-info btn-xs">Others</button>
                                                <?php }?></td>
                                            </td>
                                            <td>
                                                <a href="esealview.php?eseal_id=<?php echo $order_fet['id']; ?>"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</button></a>
                                                &nbsp;&nbsp;&nbsp;
                                                <a class="hidden" href="esealedit.php?eseal_id=<?php echo $order_fet['id']; ?>"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-pencil"></i> Edit</button></a>
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
