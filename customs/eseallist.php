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

$export_sql="SELECT ei.* FROM `exporter_info` AS `ei`
LEFT JOIN `users` ON users.id = ei.user_id
WHERE `users`.delete_status = 1";
$export_exe=mysql_query($export_sql);
$export_cnt=@mysql_num_rows($export_exe);

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
    <title>Customs Admin Panel </title>
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
                    <div class="box" style="min-height: 600px;">
                        <div class="box-header" style="display: none;">
                            <h3 class="box-title" style="line-height:30px;">Eseal List</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">

                            <div class="row col-sm-12">
                                <form class="datesearch" action="" class="hiddenX" method="post">
                                    <div class="col-sm-3">
                                        <label>Exporter:</label>
                                        <select class="form-control" name="exporterName" id="exporterName" required>
                                            <option value="0"> Select Exporter </option>
                                            <?php
                                            while($export_fet=mysql_fetch_array($export_exe))
                                            {
                                                ?>
                                                <option value="<?php echo $export_fet['user_id']; ?>"> <?php echo $export_fet['iec_code']; ?> - <?php echo $export_fet['name_exporter']; ?> </option>
                                            <?php } ?>
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

                                        <button class="btn btn-warning" name="datesearch" type="submit" style="margin-top: 25px;">Search</button>
                                    </div>
                                </form>
                            </div>
                            <div class="row col-sm-12">
                                <br/><br/>
                            </div>
                            <?php
                            if($order_cnt>0)
                            {
                                ?>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>Exporter Name</th>
                                        <th>Eseal Number</th>
                                        <th>Date of Sealing</th>
                                        <th>E-Seal Status</th>
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
                                            <td><?php echo $order_fet['name_exporter']; ?></td>
                                            <td><?php echo $order_fet['product_sealcode']; ?></td>
                                            <td><?php echo $order_fet['sealing_date']; ?></td>
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
                                                <?php }?></td>
                                            <td>
                                                <a href="esealview.php?eseal_id=<?php echo $order_fet['id']; ?>"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</button></a>
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
            "autoWidth": false,
            "dom": 'Bfrtip',
            "buttons": [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
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
