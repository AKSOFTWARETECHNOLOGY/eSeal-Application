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

if(isset($_REQUEST['book_id']))
{
	$book_id=$_REQUEST['book_id'];
}
else
{
	exit;
}


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


$publisher_sql="SELECT * FROM `publisher` WHERE `user_id`='$user_id' ";
$publisher_exe=mysql_query($publisher_sql);
$publisher_cnt=@mysql_num_rows($publisher_exe);
$publisher_fet=mysql_fetch_array($publisher_exe);


$publisher_book_sql="SELECT * FROM `publisher_book` WHERE `id`='$book_id'";
$publisher_book_exe=mysql_query($publisher_book_sql);
$publisher_book_cnt=@mysql_num_rows($publisher_book_exe);
$publisher_book_fet=mysql_fetch_array($publisher_book_exe);
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
            View Publisher Book Details
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
           
            <li class="active">View Publisher Book Details</li>
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
                  <h3 class="box-title">View Publisher Book Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                 
                   <div class="col-md-12">
                   <style>.control-label{line-height:32px;} .form-group{line-height:32px;}</style>
                    
					<div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Title</label>
                      <div class="col-sm-9">
                        <div  class=""><?php echo $publisher_book_fet['book_title']; ?></div>
                      </div>
                    </div> 
 					<?php if($publisher_book_fet['book_photo']!="") { ?>
					<div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Photo</label>
                      <div class="col-sm-9">
                        <div  class=""><img src="<?php echo $publisher_book_fet['book_photo']; ?>" style="height:150px;" /></div>
                      </div>
                    </div> 
					<?php } ?>
					<div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Language</label>
                      <div class="col-sm-9"><div type="email" class="" ><?php echo $content_language[$publisher_book_fet['book_language']]; ?></div></div>
                    </div>                    
                    <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Genre</label>
                      <div class="col-sm-9"><div type="text" class=""><?php echo $content_genre[$publisher_book_fet['book_genre']]; ?></div></div>
                    </div>
					<div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Attachment</label>
                      <div class="col-sm-9"><div type="text" class="">
					  <?php if($publisher_book_fet['book_attach']!="") { ?>
						<a href="../<?php echo $publisher_book_fet['book_attach']; ?>" alt="" target="_blank"> DOWNLOAD </a>
 					  <?php } else { ?>
						None
					  <?php } ?>
					  </div></div>
                    </div>
					
                    <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Details</label>
                      <div class="col-sm-9">
					  <div type="text" class="" placeholder="Info">
					  <?php echo $publisher_book_fet['book_info']; ?>
					  </div>
					  </div>
                    </div>
					</div> 
                   <div class="col-md-1"></div>   
                  </div><!-- /.box-body -->

                 
                </form>
              </div><!-- /.box -->

           
		   
			   <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">View Publisher Personal Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                 
                   <div class="col-md-12">
                   <style>.control-label{line-height:32px;} .form-group{line-height:32px;}</style>
                    <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Name</label>
                      <div class="col-sm-9">
                        <div  class=""><?php echo $publisher_fet['name']; ?></div>
                      </div>
                    </div> 
					<div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">E-Mail</label>
                      <div class="col-sm-9"><div type="email" class="" ><?php echo $publisher_fet['email']; ?></div></div>
                    </div>                    
                    <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Phone Number</label>
                      <div class="col-sm-9"><div type="text" class=""> <?php echo $publisher_fet['telephone']; ?></div></div>
                    </div>
                    <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Address</label>
                      <div class="col-sm-9">
					  <div type="text" class="" placeholder="Address">
					  <?php echo $publisher_fet['address']; ?>
					  </div>
					  </div>
                    </div>
					<div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">City</label>
                      <div class="col-sm-9"><div type="email" class="" ><?php echo $user_city[$publisher_fet['city']]; ?></div></div>
                    </div>                    
                    <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Country</label>
                      <div class="col-sm-9"><div type="text" class=""><?php echo $user_country[$publisher_fet['country']]; ?></div></div>
                    </div>

					<div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Bio</label>
                      <div class="col-sm-9">
					  <div type="text" class="" placeholder="Bio">
					  <?php echo $publisher_fet['bio']; ?>
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
                  <h3 class="box-title">Publisher Book Profile</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                  <div class="box-body">
                    <div class="form-group col-md-12">
                       <a href="booklist.php"><button type="submit" class="btn btn-info col-md-12" style="margin-bottom:10px;" >Back to Books List</button></a>
					   
					   
					   <?php if($publisher_book_fet['book_status']==0) { ?>
					   <a href="dobookupdate.php?update=1&book_id=<?php echo $publisher_book_fet['id']; ?>&user_id=<?php echo $publisher_book_fet['user_id']; ?>">
					   <button type="button" class="btn btn-success col-md-12" style="margin-bottom:10px;">Approve Book</button>
					   </a>
					   
					   <a href="dobookupdate.php?update=2&book_id=<?php echo $publisher_book_fet['id']; ?>&user_id=<?php echo $publisher_book_fet['user_id']; ?>">
					   <button type="button" class="btn btn-danger col-md-12" style="margin-bottom:10px;">Reject Book</button>
					   </a>
					   <?php } else if($publisher_book_fet['book_status']==1){ ?>
					   <a href="dobookupdate.php?update=0&book_id=<?php echo $publisher_book_fet['id']; ?>&user_id=<?php echo $publisher_book_fet['user_id']; ?>">
					   <button type="button" class="btn btn-warning col-md-12" style="margin-bottom:10px;">Pending Book</button>
					   </a>
					   
					   <a href="dobookupdate.php?update=2&book_id=<?php echo $publisher_book_fet['id']; ?>&user_id=<?php echo $publisher_book_fet['user_id']; ?>">
					   <button type="button" class="btn btn-danger col-md-12" style="margin-bottom:10px;">Reject Book</button>
					   </a>
					   <?php } else if($publisher_book_fet['book_status']==2){ ?>
					   <a href="dobookupdate.php?update=1&book_id=<?php echo $publisher_book_fet['id']; ?>&user_id=<?php echo $publisher_book_fet['user_id']; ?>">
					   <button type="button" class="btn btn-success col-md-12" style="margin-bottom:10px;">Approve Book</button>
					   </a>
					   
					   <a href="dobookupdate.php?update=0&book_id=<?php echo $publisher_book_fet['id']; ?>&user_id=<?php echo $publisher_book_fet['user_id']; ?>">
					   <button type="button" class="btn btn-warning col-md-12" style="margin-bottom:10px;">Pending Book</button>
					   </a>
					   <?php } ?>
					   
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
