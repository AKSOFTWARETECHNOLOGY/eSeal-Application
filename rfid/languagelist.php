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

$content_genre = array();
$genre_sql="SELECT * FROM `genres` WHERE `genre_status`='1'";
$genre_exe=mysql_query($genre_sql);
while($genre_fet=mysql_fetch_array($genre_exe))
{
	$content_genre[$genre_fet['id']]=$genre_fet['genre_name'];
}

$content_language = array();
$language_sql="SELECT * FROM `languages` WHERE `language_status`='1'";
$language_exe=mysql_query($language_sql);
while($language_fet=mysql_fetch_array($language_exe))
{
	$content_language[$language_fet['id']]=$language_fet['language_name'];
}

$languages_sql="SELECT * FROM `languages`";
$languages_exe=mysql_query($languages_sql);
$languages_cnt=@mysql_num_rows($languages_exe); 

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
            Languages List           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
           
            <li class="active">Languages List</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title" style="line-height:30px;">Languages List</h3>
				  <a href="addlanguage.php">
						 <button type="button" class="btn btn-info btn-md" style="float: right;"><i class="fa fa-plus"></i> Add Language</button>
				  </a>
                </div><!-- /.box-header -->
                <div class="box-body">
				<?php if(isset($_REQUEST['succ'])) { ?> <span style="color:green;font-size:16px;font-weight:bold;"> Record Deleted Successfully </span> <?php } ?>
				<?php if(isset($_REQUEST['err'])) { ?> <span style="color:red;font-size:16px;font-weight:bold;"> Record Not Deleted </span> <?php } ?>
				
				<?php 
				if($languages_cnt>0)
				{
				?>
				  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                      <th>ID</th>
                      <th>Language</th>
					  <th>Status</th>
                      <th></th>
                    </tr>
                    </thead>
                    <tbody>
					<?php 
					while($languages_fet=mysql_fetch_array($languages_exe))
					{
					?>
                    <tr>
                      <td><?php echo $languages_fet['id']; ?></td>
                      <td><?php echo $languages_fet['language_name']; ?></td>
					  <td>
					  <?php if($languages_fet['language_status']==1) { ?><span class="label label-success">Active</span><?php } ?>
					  <?php if($languages_fet['language_status']==0) { ?><span class="label label-danger">Deacvite</span><?php } ?>
					  </td>
					  <td>
                      	 
						                      	 
						 <?php if($languages_fet['language_status']==1) { ?>
						 <a href="dolanguageupdate.php?update=0&language_id=<?php echo $languages_fet['id']; ?>"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-pencil"></i> To Deactive</button></a>
						 <?php } ?>
						 <?php if($languages_fet['language_status']==0) { ?>
						 <a href="dolanguageupdate.php?update=1&language_id=<?php echo $languages_fet['id']; ?>"><button type="button" class="btn btn-success btn-xs"><i class="fa fa-pencil"></i> To Aactive</button></a>
						 <?php } ?>

                     	 <!--
						 <a href="bookview.php?book_id=<?php echo $languages_fet['id']; ?>">
						 <button type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</button>
						 </a>
						 
						 <a href="memberedit.html"><button type="submit" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</button></a>
						 -->
						 
						 &nbsp;&nbsp;&nbsp;
                      	 <a href="delete-language.php?delete=1&id=<?php echo $languages_fet['id']; ?>" onclick="return confirm('Are you sure you want to delete this item?');"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-trash-o"></i> Delete</button></a>
                       </td>
                    </tr>
					<?php
					}
					?>
                    </tbody>
                   
                  </table>
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
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>
