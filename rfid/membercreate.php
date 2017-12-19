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
            Create New Member Profile
           
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
           
            <li class="active">Create New Member Profile</li>
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
                  <h3 class="box-title">Member Personal Details</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form">
                  <div class="box-body">
                 
                   <div class="col-md-12">
                   <style>.control-label{line-height:32px;}</style>
                    <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Name</label>
                      <div class="col-sm-9">
                        <input   type="text" class="form-control" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Father Name </label>
                      <div class="col-sm-9"><input type="text" class="form-control"  placeholder="Father Name"></div>
                    </div>
                 
                   <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Gender</label>
                      <div class="col-sm-9"><select class="form-control">
                        <option>Male</option>
                        <option>Female</option>
                      </select></div>
                    </div>
                    
                    <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Phone Number</label>
                      <div class="col-sm-9"><input type="text" class="form-control"  placeholder="Phone Number"></div>
                    </div>
                    <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">E-Mail</label>
                      <div class="col-sm-9"><input type="text" class="form-control"  placeholder="E-Mail"></div>
                    </div>
                    <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Address</label>
                      <div class="col-sm-9"><textarea type="text" class="form-control" placeholder="Address"></textarea></div>
                    </div>
                     
                    <div class="form-group col-md-12">
                      <label class="col-sm-3 control-label">Image</label>
                      <div class="col-sm-9"><input type="file" id="exampleInputFile"></div>
                     
                    </div>
                    
                      
                      
                  	</div> 
                   <div class="col-md-1"></div>   
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-success" style="float:right;">Save Profile</button>
                  </div>
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
