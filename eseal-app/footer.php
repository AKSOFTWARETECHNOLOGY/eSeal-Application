<style>
    .footer {
        height: 300px !important;
    }
</style>
<div class="footer">
<div class="color-part2"></div>
<div class="color-part"></div>
  <div class="container-fluid">
<div class="row block-content">
      <div class="col-md-4 col-sm-4 col-xs-12 account">
        <h3>Get in touch</h3>
          <p>Sri Sai Ganesh Associates,<br/> 
		  1-D First Floor, AM Tower,<br/>
		  Old No: 239, New No: 36, <br/>
		  Angappanaikken Street, Mannady,<br/>
		  Chennai - 600 001</p>
          <p>HotLine: 044-48677050</p>

          <!--
          <p>No.44, MIG, G1/5 Marutham Enclave, 6th Main Road, Mogappair ERI Scheme, Mogappair, Chennai - 600 0037</p>
          <p>Ph No. 044-48677050 </p>
          -->

      </div>
      <div class="col-md-2 col-sm-2 col-xs-12 account">
		<h3>My Account</h3>
          <?php if(isset($_SESSION['exporteruserid'])){ ?>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>
              <li class="hidden"><a href="javascript:void(0);">View Cart</a></li>
            </ul>
          <?php } else { ?>
              <ul>
                  <li><a href="login.php">Login</a></li>
                  <li><a href="user-registration.php">Registration</a></li>
                  <li class="hidden"><a href="javascript:void(0);">View Cart</a></li>
              </ul>
          <?php } ?>
          
          <ul class="social">
              <li><a href="https://www.facebook.com/ssga.eseal.1" target="_blank"><i class="fa fa-facebook"></i></a></li>
              <li><a href="https://twitter.com/ssgaeseal" target="_blank"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://plus.google.com/113423698076331939580" target="_blank"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="https://www.linkedin.com/in/ssga-e-seal-989506154/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
			  <li><a href="https://www.youtube.com/channel/UCEFTQPfpTllUDqFWrgFpV_A" target="_blank"><i class="fa fa-youtube"></i></a></li>
          </ul>
      </div>
	  <div class="col-md-2 col-sm-2 col-xs-12 account">
		<h3>Policy</h3>
		<ul>
		  <li><a href="privacy-policy.php">Privacy Policy</a></li>
		  <li><a href="terms-and-conditions.php">Terms &amp; Conditions</a></li>
		  <li><a href="refund-cancellation.php">Refund &amp; cancellation</a></li>          
		</ul>        
      </div>

      <div class="col-md-4 col-sm-4 col-xs-12 store">
		<h3>Store Hours</h3>
		<ul>
		<li>Monday - Friday : <span>10 AM to 6PM</span></li>
		<li>Saturday :<span>10 AM to 4PM</span></li>
		<li>Sunday : <span>Holiday</span></li>
		</ul>
		</div>
      </div> 
    </div>
</div>
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12" style="float: left;">
                <p style="text-align: left;">SSGA &copy; Copyright 2018 All Rights Reserved.</p>
            </div>

            <div class="col-md-6 col-sm-6 col-xs-12" style="float: right;">
                <p style="text-align: right;">created by <a href="http://www.aramsolutions.com" target="_blank">அறம்</a> </p>
            </div>


        </div>
    </div>
</div>
</div>