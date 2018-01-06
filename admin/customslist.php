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

if(isset($_REQUEST['fromDate'])){
    if($_REQUEST['fromDate'] != null){
        $fromDate = $_REQUEST['fromDate'] . ' 00:00:00';
    }
    else{
        $fromDate = null;
    }
}
else{
    $fromDate = null;
}

if(isset($_REQUEST['toDate'])){
    if($_REQUEST['toDate'] != null){
        $toDate = $_REQUEST['toDate'] . ' 00:00:00';
    }
    else{
        $toDate = null;
    }
}
else{
    $toDate = null;
}

$customsStatus = isset($_REQUEST['customsStatus']) ? $_REQUEST['customsStatus'] : null;
$date = date("Y-m-d"). ' 00:00:00';

if ($customsStatus != 2 && !(is_null($customsStatus))) {
    if($fromDate != null) {
        if ($toDate != null) {
            $custom_sql="SELECT ci.*, `countries`.`name` AS country_name, cities.city_name, terminals.terminals_name, ports.ports_name, users.delete_status
FROM `customs_info` AS `ci`
LEFT JOIN `users` ON users.id = ci.user_id
LEFT JOIN `countries` ON countries.id = ci.country
LEFT JOIN `cities` ON cities.id = ci.city
LEFT JOIN `ports` ON ports.id = ci.port
LEFT JOIN `terminals` ON terminals.id = ci.terminal
WHERE `users`.delete_status = $customsStatus and ci.created_at between '$fromDate' and '$toDate'";
        }
        else{
            $custom_sql="SELECT ci.*, `countries`.`name` AS country_name, cities.city_name, terminals.terminals_name, ports.ports_name, users.delete_status
FROM `customs_info` AS `ci`
LEFT JOIN `users` ON users.id = ci.user_id
LEFT JOIN `countries` ON countries.id = ci.country
LEFT JOIN `cities` ON cities.id = ci.city
LEFT JOIN `ports` ON ports.id = ci.port
LEFT JOIN `terminals` ON terminals.id = ci.terminal
WHERE `users`.delete_status = $customsStatus and ci.created_at between '$fromDate' and '$date'";
        }
    }
    else{
        $custom_sql="SELECT ci.*, `countries`.`name` AS country_name, cities.city_name, terminals.terminals_name, ports.ports_name, users.delete_status
FROM `customs_info` AS `ci`
LEFT JOIN `users` ON users.id = ci.user_id
LEFT JOIN `countries` ON countries.id = ci.country
LEFT JOIN `cities` ON cities.id = ci.city
LEFT JOIN `ports` ON ports.id = ci.port
LEFT JOIN `terminals` ON terminals.id = ci.terminal
WHERE `users`.delete_status = $customsStatus";
    }
}
else if ($customsStatus == 2) {
    if($fromDate != null || $fromDate != 0) {
        if ($toDate != null || $toDate != 0) {
            $custom_sql="SELECT ci.*, `countries`.`name` AS country_name, cities.city_name, terminals.terminals_name, ports.ports_name, users.delete_status
FROM `customs_info` AS `ci`
LEFT JOIN `users` ON users.id = ci.user_id
LEFT JOIN `countries` ON countries.id = ci.country
LEFT JOIN `cities` ON cities.id = ci.city
LEFT JOIN `ports` ON ports.id = ci.port
LEFT JOIN `terminals` ON terminals.id = ci.terminal
WHERE ci.created_at between '$fromDate' and '$toDate'";
        }
        else{
            $custom_sql="SELECT ci.*, `countries`.`name` AS country_name, cities.city_name, terminals.terminals_name, ports.ports_name, users.delete_status
FROM `customs_info` AS `ci`
LEFT JOIN `users` ON users.id = ci.user_id
LEFT JOIN `countries` ON countries.id = ci.country
LEFT JOIN `cities` ON cities.id = ci.city
LEFT JOIN `ports` ON ports.id = ci.port
LEFT JOIN `terminals` ON terminals.id = ci.terminal
WHERE ci.created_at between '$fromDate' and '$date'";
        }
    }
    else{
        $custom_sql="SELECT ci.*, `countries`.`name` AS country_name, cities.city_name, terminals.terminals_name, ports.ports_name, users.delete_status
FROM `customs_info` AS `ci`
LEFT JOIN `users` ON users.id = ci.user_id
LEFT JOIN `countries` ON countries.id = ci.country
LEFT JOIN `cities` ON cities.id = ci.city
LEFT JOIN `ports` ON ports.id = ci.port
LEFT JOIN `terminals` ON terminals.id = ci.terminal";
    }
}
else{
    $custom_sql="SELECT ci.*, `countries`.`name` AS country_name, cities.city_name, terminals.terminals_name, ports.ports_name, users.delete_status
FROM `customs_info` AS `ci`
LEFT JOIN `users` ON users.id = ci.user_id
LEFT JOIN `countries` ON countries.id = ci.country
LEFT JOIN `cities` ON cities.id = ci.city
LEFT JOIN `ports` ON ports.id = ci.port
LEFT JOIN `terminals` ON terminals.id = ci.terminal";
}

$custom_exe=mysql_query($custom_sql);
$custom_cnt=@mysql_num_rows($custom_exe);
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
                Customs List
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>

                <li class="active">Customs List</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box" style="min-height: 600px;">
                        <div class="box-header">
                            <h3 class="box-title" style="line-height:30px;">Customs List</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <a href="add-customs.php" style="float: right; margin-right: 10px;"><button type="button" class="btn btn-info btn-xs" style="margin-bottom:10px;">Add Customs</button></a>
                            </div>

                            <div class="row col-sm-12">
                                <form class="datesearch" action="" method="get">
                                    <div class="col-sm-3">
                                        <label>Customs Status:</label>
                                        <select class="form-control" name="customsStatus" id="customsStatus" required>
                                            <option value="2"> All </option>
                                            <option value="1"> Active </option>
                                            <option value="0"> Inactive </option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 hidden">
                                        <label>From:</label>
                                        <input class="form-control" type="date" name="fromDate" id="fromDate" value=""/>
                                    </div>
                                    <div class="col-sm-3 hidden">
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
                            if($custom_cnt>0)
                            {
                                ?>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Sl.No</th>
                                        <th>Customs Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Port</th>
                                        <th>Terminal</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sl=0;
                                    while($custom_fet=mysql_fetch_array($custom_exe))
                                    {
                                        $sl++;
                                        ?>
                                        <tr>
                                            <td><?php echo $sl; ?></td>
                                            <td><?php echo $custom_fet['name_customs']; ?></td>
                                            <td><?php echo $custom_fet['mobile']; ?></td>
                                            <td><?php echo $custom_fet['email']; ?></td>
                                            <td><?php echo $custom_fet['ports_name']; ?></td>
                                            <td><?php echo $custom_fet['terminals_name']; ?></td>
                                            <td>
                                                <?php if($custom_fet['delete_status'] == 1)
                                                {?>
                                                    <button type="button" class="btn btn-success btn-xs">Active</button>
                                                <?php
                                                }
                                                else{
                                                    ?>
                                                    <button type="button" class="btn btn-danger btn-xs">Inactive</button>
                                                <?php
                                                }?>
                                            </td>
                                            <td>
                                                <a href="customsview.php?customs_id=<?php echo $custom_fet['id']; ?>"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</button></a>
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
