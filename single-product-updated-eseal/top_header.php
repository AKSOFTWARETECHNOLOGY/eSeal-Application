<div class="top-bar">
<div class="container-fluid">
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="mail-link">
<ul>
<li><a href="javascript:void(0);"><i class="fa fa-envelope"></i> Email: ssgassociates2015@gmail.com</a></li>
<li><i class="fa fa-phone"></i> Hotline: (+91) 94880 15119</li>
</ul>
</div><!--Mail Link-->
</div><!--Column 6-->

<div class="col-md-6 col-sm-6 col-xs-12">
<div class="mail-link mail-right">

<?php if(isset($_SESSION['exporteruserid'])){ ?>
<ul>
<li><a href="dashboard.php"><i class="fa fa-user"></i> Welcome <?php echo $_SESSION['exporterusername']; ?></a></li>
<li><a href="my-account.php"><i class="fa fa-asterisk"></i> My Account</a></li>
<li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
</ul>
<?php } else { ?>
<ul>
<li><a href="login.php"><i class="fa fa-lock"></i> Login</a></li>
<li><a href="registration-terms.php"><i class="fa fa-user"></i> Register</a></li>
</ul>
<?php } ?>

</div><!--Mail Link-->
</div><!--Column 6-->

</div><!--Row-->
</div><!--Container-->
</div><!--Top Bar-->

