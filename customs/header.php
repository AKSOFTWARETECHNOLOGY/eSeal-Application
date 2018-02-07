
      <header class="main-header">
        <!-- Logo -->
        <a href="dashboard.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">
          <img src="images/ssg.png" width="100%" class="hidden">
          <img src="../images/logo-white.png" alt="Sri Sai Ganesh Associates" title="Sri Sai Ganesh Associates" class="img-responsive">
          </span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">
          <img src="../images/logo-white.png" alt="Sri Sai Ganesh Associates" title="Sri Sai Ganesh Associates" class="img-responsive" style="
    width: 120%;padding: 10px 0px 0px 0px;" />
          <img src="images/ssg.png" width="40%" class="hidden"></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
               
              
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image" />
                  <span class="hidden-xs">Customs</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      Customs Manager
                    </p>
                  </li>
                   
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="customs-profile.php" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
               
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar col-md-3 col-sm-3 col-xs-12" style="width:23% !important;padding: 0px !important;">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel hidden">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />

            </div>
            <div class="pull-left info">
              <p>Customs</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
           
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <h3 style="text-align: center;color: #fff;">Dashboard</h3>
          <ul class="sidebar-menu">
            <li class="header hidden">Dashboard</li>
            <li class="active treeview">
              <a href="dashboard.php">
                <i class="ion ion-pie-graph"></i> <span>Dashboard</span>
              </a>
            </li>
			<li class="treeview">
              <a href="exporterlist.php">
                <i class="ion ion-android-contact"></i> <span>Exporters</span>
              </a>
            </li>
              <li class="treeview">
                  <a href="eseallist.php">
                      <i class="ion ion-android-contact"></i> <span>E-Seal Status</span>
                  </a>
              </li>

            <li class="treeview">
              <a href="logout.php">
                <i class="ion ion-log-out"></i> <span>Logout</span>
              </a>
            </li>
        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
