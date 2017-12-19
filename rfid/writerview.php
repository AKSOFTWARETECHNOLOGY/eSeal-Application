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

if(isset($_REQUEST['user_id']))
{
	$user_id=$_REQUEST['user_id'];
}
else
{
	exit;
}


$user_country = array();
$country_sql="SELECT * FROM `countries` WHERE `country_status`='1' AND `id`='99'";
$country_exe=mysql_query($country_sql);
while($country_fet=mysql_fetch_array($country_exe))
{
	$user_country[$country_fet['id']]=$country_fet['name'];
}

$user_city = array();
$city_sql="SELECT * FROM `cities` WHERE `city_status`='1' AND `country`='99'";
$city_exe=mysql_query($city_sql);
while($city_fet=mysql_fetch_array($city_exe))
{
	$user_city[$city_fet['id']]=$city_fet['city_name'];
}



$writer_sql="SELECT * FROM `writer` WHERE `user_id`='$user_id' ";
$writer_exe=mysql_query($writer_sql);
$writer_cnt=@mysql_num_rows($writer_exe);
$writer_fet=mysql_fetch_array($writer_exe);
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
            View Writer Profile
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
           
            <li class="active">View Writer Profile</li>
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
                  <h3 class="box-title">View Writer Personal Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                 
                   <div class="col-md-12">
                   <style>.control-label{line-height:32px;} .form-group{line-height:32px;}</style>
                    <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Name</label>
                      <div class="col-sm-9">
                        <div  class=""><?php echo $writer_fet['name']; ?></div>
                      </div>
                    </div> 
					<div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">E-Mail</label>
                      <div class="col-sm-9"><div type="email" class="" ><?php echo $writer_fet['email']; ?></div></div>
                    </div>                    
                    <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Phone Number</label>
                      <div class="col-sm-9"><div type="text" class=""> <?php echo $writer_fet['telephone']; ?></div></div>
                    </div>
                    <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Address</label>
                      <div class="col-sm-9">
					  <div type="text" class="" placeholder="Address">
					  <?php echo $writer_fet['address']; ?>
					  </div>
					  </div>
                    </div>
					<div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">City</label>
                      <div class="col-sm-9"><div type="email" class="" ><?php echo $user_city[$writer_fet['city']]; ?></div></div>
                    </div>                    
                    <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Country</label>
                      <div class="col-sm-9"><div type="text" class=""><?php echo $user_country[$writer_fet['country']]; ?></div></div>
                    </div>

					<div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Bio</label>
                      <div class="col-sm-9">
					  <div type="text" class="" placeholder="Bio">
					  <?php echo $writer_fet['bio']; ?>
					  </div>
					  </div>
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
                  <h3 class="box-title">Writer Profile</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                  <div class="box-body">
                    <div class="form-group col-md-12">
                       <a href="writerlist.php"><button type="submit" class="btn btn-warning col-md-12" style="margin-bottom:10px;" >Back to Writers List</button></a>
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
  </body>
</html>
