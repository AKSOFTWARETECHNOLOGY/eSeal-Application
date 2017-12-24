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
$date = date("Y-m-d");

if(isset($_REQUEST['enquiry_id']))
{
    $enquiry_id=$_REQUEST['enquiry_id'];
}
else
{
    exit;
}

$sql = "UPDATE `complaint_enquiry` SET `read_status` = '1', `updated_by` = '$user_name', `updated_at` = '$date'
            WHERE `complaint_enquiry`.`id` = '$enquiry_id'";
$exe = mysql_query($sql);

$complaint_sql="SELECT complaint_enquiry.*, vendor_info.name_vendor, vendor_info.vendor_code, exporter_info.name_exporter, exporter_info.iec_code FROM `complaint_enquiry`
LEFT JOIN `vendor_info` ON vendor_info.user_id = complaint_enquiry.receiver_id
LEFT JOIN `exporter_info` ON exporter_info.user_id = complaint_enquiry.sender_id
 WHERE complaint_enquiry.complaint_status = 1 and complaint_enquiry.enquiry_id = 0 and `complaint_enquiry`.`id` = '$enquiry_id'";
$complaint_exe=mysql_query($complaint_sql);
$complaint_cnt=@mysql_num_rows($complaint_exe);
$complaint_fet=mysql_fetch_array($complaint_exe);

$conversation_sql = "SELECT complaint_enquiry.* FROM `complaint_enquiry`
 WHERE complaint_enquiry.complaint_status = 1 and complaint_enquiry.enquiry_id = $enquiry_id";
$conversation_exe=mysql_query($conversation_sql);
$conversation_cnt=@mysql_num_rows($conversation_exe);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Panel </title>
    <?php include "head1.php"; ?>
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <style>
        .other-fields{border:2px solid #23aef4; padding:10px;margin-bottom:10px;}
        .conversation{border:2px solid #bcd8e6; padding:10px;margin-bottom:10px;}
    </style>
</head>
<body class="skin-blue sidebar-mini">
<div class="wrapper">
    <?php include "header.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                View Complaint
            </h1>
            <ol class="breadcrumb">
                <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">View Complaint</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">View Complaint Details</h3>
                        </div><!-- /.box-header -->

                        <div class="box-body">

                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-6 control-label">Exporter Name</label>
                                        <div class="col-sm-6">
                                            <div class=""><?php echo $complaint_fet['name_exporter']; ?></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-6 control-label">IEC Code</label>
                                        <div class="col-sm-6"><div class="" ><?php echo $complaint_fet['iec_code']; ?></div></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-6 control-label">Vendor Name</label>
                                        <div class="col-sm-6">
                                            <div class=""><?php echo $complaint_fet['name_vendor']; ?></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="col-sm-6 control-label">Vendor Code</label>
                                        <div class="col-sm-6"><div class="" ><?php echo $complaint_fet['vendor_code']; ?></div></div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            if($conversation_cnt>0)
                            {
                            while($conversation_fet=mysql_fetch_array($conversation_exe)) {
                                ?>
                                <div class="col-md-12 conversation">
                                    <div class="">
                                        <?php
                                        if($conversation_fet['sender_id'] == 2)
                                        {
                                            echo "<b> Admin says, </b>";
                                        }
                                        else{
                                            echo "<b> Exporter says,</b>";
                                        }
                                        ?>
                                    </div>
                                    <div class="">
                                        <h4 class="control-label"><?php echo $conversation_fet['subject']; ?></h4>
                                    </div>
                                    <div class="">
                                        <p><?php echo $conversation_fet['message']; ?></p>
                                    </div>
                                </div>
                            <?php
                            }
                            }
                            ?>

                            <div class="col-md-12">
                                <div class="col-md-2"> </div>

                                <form role="form" action="doreplyenquiry.php?enquiry_id=<?php echo $complaint_fet['id']; ?>" method="post">
                                    <div class="col-md-8 other-fields">
                                        <div class="form-group col-md-12">
                                            <input class="form-control" type="text" value="<?php echo "Re:" . $complaint_fet['subject']; ?>"  readonly/>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <textarea class="form-control" placeholder="message" name="message"></textarea>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input class="form-control" type="hidden" name="subject" value="<?php echo $complaint_fet['subject']; ?>"/>
                                            <input class="form-control" type="hidden" name="receiverId" value="<?php echo $complaint_fet['sender_id']; ?>"/>
                                            <button class="btn btn-info form-group" type="submit">Reply</button>
                                        </div>
                                    </div>
                                </form>

                                <div class="col-md-2"> </div>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!--/.col (left) -->

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
