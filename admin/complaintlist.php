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

$complaint_sql="SELECT complaint_enquiry.*, users.name FROM `complaint_enquiry`
LEFT JOIN `users` ON complaint_enquiry.sender_id = users.id
 WHERE complaint_enquiry.complaint_status = 1 and complaint_enquiry.enquiry_id = 0 and users.delete_status = 1";
$complaint_exe=mysql_query($complaint_sql);
$complaint_cnt=@mysql_num_rows($complaint_exe);
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
                Complaint List
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>

                <li class="active">Complaint List</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title" style="line-height:30px;">Complaint List</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <?php
                            $slno = 1;
                            if($complaint_cnt>0)
                            {
                                ?>
                                <table id="example2" class="display nowrap" >
                                    <thead>
                                    <tr>
                                        <th>S. No.</th>
                                        <th>Sender</th>
                                        <th>Query</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while($complaint_fet=mysql_fetch_array($complaint_exe))
                                    {
                                        ?>
                                        <tr <?php if($complaint_fet['read_status'] == 0){ ?> style="font-weight:bold"; <?php } ?>>
                                            <td><?php echo $slno++; ?>
                                            <td><?php echo $complaint_fet['name']; ?></td>
                                            <td><?php echo $complaint_fet['subject']; ?></td>
                                            <td>
                                                <a href="complaintview.php?enquiry_id=<?php echo $complaint_fet['id']; ?>"><button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</button></a>
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
                                <p><b> No Records found. </b></p>
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
            "autoWidth": false,
            "dom": 'Bfrtip',
            "buttons": [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        });

    });
</script>
<!--
<script src="https://code.jquery.com/jquery-1.12.4.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.0/js/dataTables.buttons.min.js" type="text/javascript"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.0/js/buttons.html5.min.js" type="text/javascript"></script>

-->


</body>
</html>
