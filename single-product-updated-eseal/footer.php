<div class="footer">
<div class="footer-overlay">
  <div class="container">

      <div class="col-md-3 col-sm-3 col-xs-12 account">
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
      </div>
      <div class="col-md-3 col-sm-3 col-xs-12 account">
        <h3>Policy</h3>
        <ul>
          <li><a href="privacy-policy.php">Privacy Policy</a></li>
          <li><a href="terms-and-conditions.php">Terms &amp; Conditions</a></li>
          <li><a href="refund-cancellation.php">Refund &amp; cancellation</a></li>          
        </ul>
      </div>
	  <div class="col-md-3 col-sm-3 col-xs-12">
        <h3>Get in touch</h3>
          <p>Sri Sai Ganesh Associates,<br/> 1-D First Floor, AM Tower, <br/>Old No: 239, New No: 36, Angappanaikken Street, Mannady, Chennai - 600 001</p>
          <p>(+91) 94880 15119 , (+91) 88256 23258.</p>

          <!--
          <p>No.44, MIG, G1/5 Marutham Enclave, 6th Main Road, Mogappair ERI Scheme, Mogappair, Chennai - 600 0037</p>
          <p>(+91) 94880 15119 , (+91) 88256 23258.</p>
          -->
        <ul class="social">
          <li><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
          <li><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
          <li><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
		  <li><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
        </ul>
      </div>
	  
<div class="col-md-3 col-sm-3 col-xs-12 store">
<h3>Store Hours</h3>
<ul>
<li>Monday - Thursday : <span>10 AM to 7PM</span></li>
<li>Friday : <span>10 AM to 8PM</span></li>
<li>Saturday :<span>10 AM to 6PM</span></li>
<li>Sunday : <span>Holiday</span></li>
        </ul>
</div>
       
    </div>
  </div>
</div>
<div class="footer-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <p>SSGA © Copyright 2016-2017 All Rights Reserved.</p>
            </div>
        </div>
    </div>
</div>
</div>
