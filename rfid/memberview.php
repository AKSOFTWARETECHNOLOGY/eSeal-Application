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
            View Member Profile
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
           
            <li class="active">View Member Profile</li>
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
                  <h3 class="box-title">View Member Personal Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                 
                   <div class="col-md-12">
                   <style>.control-label{line-height:32px;} .form-group{line-height:32px;}</style>
                    <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Name</label>
                      <div class="col-sm-9">
                        <div  class="">Saravanan</div>
                      </div>
                    </div>
                    <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Father Name </label>
                      <div class="col-sm-9"><div type="text" class="" >S</div></div>
                    </div>
                  
                   <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Gender</label>
                      <div class="col-sm-9"><div class="">
                        Male
                      </div></div>
                    </div>
                  
                    <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Phone Number</label>
                      <div class="col-sm-9"><div type="text" class=""> 91 987654321</div></div>
                    </div>
                    <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">E-Mail</label>
                      <div class="col-sm-9"><div type="email" class="" >memberprofile@gmail.com</div></div>
                    </div>
                    <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Address</label>
                      <div class="col-sm-9"><div type="text" class="" placeholder="Address">23/34, Street Nagar Road,
                      Chennai- 613005, Tamilnadu, India.</div></div>
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
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Member Profile</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                
                  <div class="box-body">
                    <div class="form-group col-md-12">
                       <a href="memberlist.php"><button type="submit" class="btn btn-warning col-md-12" style="margin-bottom:10px;" >View Member Profile List</button></a>
                       <a href="memberedit.php"><button type="submit" class="btn btn-info col-md-12" style="margin-bottom:10px;">Edit Member Profile</button></a>
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
