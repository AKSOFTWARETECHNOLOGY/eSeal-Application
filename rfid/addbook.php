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


$city_sql="SELECT * FROM `cities` WHERE `country`='99'";
$city_exe=mysql_query($city_sql);	

$language_sql="SELECT * FROM `languages` WHERE `language_status`='1'";
$language_exe=mysql_query($language_sql);

$genre_sql="SELECT * FROM `genres` WHERE `genre_status`='1'";
$genre_exe=mysql_query($genre_sql);

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
            Add Book Details
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
           
            <li class="active">Add Book Details</li>
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
                  <h3 class="box-title">Add Book Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
				
              </div><!-- /.box -->
				<?php if(isset($_REQUEST['succ'])) { ?> <span style="color:green;font-size:16px;font-weight:bold;"> Record Added Successfully </span> <?php } ?>
				<?php if(isset($_REQUEST['err'])) { ?> <span style="color:red;font-size:16px;font-weight:bold;"> Record Not Added </span> <?php } ?>
			  
	<form class="form-horizontal form-bordered" method="post" action="doaddbook.php" enctype="multipart/form-data">
									
										<div class="form-group">
											<label class="col-md-3 control-label" for="bookTitle">Book Title</label>
											<div class="col-md-6">
												<input type="text" class="form-control" id="bookTitle" name="book_title" required />
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="bookInfo">Book Information</label>
											<div class="col-md-6">
												<textarea class="form-control" id="bookInfo" name="book_info" required></textarea>
											</div>
										</div>										
									
										<div class="form-group">
											<label class="col-md-3 control-label" for="bookPhoto">Book Photo</label>
											<div class="col-md-6">
												<input type="file" class="form-control" id="bookPhoto" name="book_photo" accept="image/*"/>
											</div>
										</div>
										 
										<div class="form-group">
											<label class="col-md-3 control-label" for="bookLanguage">Book Language</label>
											<div class="col-md-6">
												<select class="form-control" id="bookLanguage" name="book_language" required >
													<option value="" selected>Choose Language</option>
													<?php while($language_fet=@mysql_fetch_array($language_exe)) { ?>
													<option value="<?php echo $language_fet['id']; ?>"><?php echo $language_fet['language_name']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										   
										
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="bookGenre">Book Genre</label>
											<div class="col-md-6">
												<select class="form-control" id="bookGenre" name="book_genre" required >
													<option value="" selected>Choose Genre</option>
													<?php while($genre_fet=@mysql_fetch_array($genre_exe)) { ?>
													<option value="<?php echo $genre_fet['id']; ?>"><?php echo $genre_fet['genre_name']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="bookPhoto">Book Attachment</label>
											<div class="col-md-6">
												<input type="file" class="form-control" id="bookAttach" name="book_attach" accept="application/pdf,application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf, image/*" required />
											</div>
										</div>
										
										
										<div class="form-group">
											<label class="col-md-3 control-label" for="userPassword"></label>
											<div class="col-md-6">
												<button type="submit" name="addbook" class="btn btn-success mr-xs mb-sm">Add Book</button>
											</div>
										</div>
									</form>
								
            </div><!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-3">
              <!-- Horizontal Form -->
              <div class="box box-danger" >
                <div class="box-header with-border">
                  <h3 class="box-title">Manage Book Profile</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                  <div class="box-body">
                    <div class="form-group col-md-12">
                       <a href="booklist.php"><button type="submit" class="btn btn-info col-md-12" style="margin-bottom:10px;" >Back to Books List</button></a>
					   
					   
					   <?php /* ?>
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
					   <?php */ ?>
					   
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
