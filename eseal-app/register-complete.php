<?php session_start();
ob_start();

if(isset($_SESSION['exporteruserid']))
{
    header("Location: dashboard.php");
}

include "config.php";
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="images/favicon.png" type="image/png" rel="shortcut icon">
    <link href="css/style-inner.css" type="text/css" rel="stylesheet">

    <link href="ssga/css/style.css" type="text/css" rel="stylesheet">
    <link href="ssga/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="ssga/css/font-awesome.min.css" type="text/css" rel="stylesheet">
    <link href="ssga/css/jquery.bxslider.min.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="ssga/js/jquery-1.12.4.js"></script>
    <script type="text/javascript" src="ssga/js/bootstrap.min.js"></script>
</head>

<body>

<?php //include "top_header.php"; ?>

<?php //include "header.php"; ?>

<?php include "header-new.php"; ?>



<div class="home-about-banner hidden">
<div class="home-about-banner-overlay">
<h3>Registration Complete</h3>
</div>
</div>


<div class="contact-us">
<div class="container">
<div class="row">
    <h3>Registration Complete</h3><br/>
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="account-login">
<h3>New Customers</h3>

<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more</p>


<a href="registration-terms.php"><i class="fa fa-user"></i> Create an Account</a>
</div>
</div>

<div class="col-md-6 col-sm-6 col-xs-12">
<div class="account-sign">
    <?php if(isset($_REQUEST['success'])) { ?>
        <p style="color:green;font-weight:bold"> Your Account Registration Successfully!<br/> We send Account Activation Link to Email Address.</p>
    <?php } ?>

    <?php if(isset($_REQUEST['err'])) { ?>
        <p style="color:red;font-weight:bold"> Invalid Registration Details / Please try again after some time.</p>
    <?php } ?>
<h3>Registered Customers</h3>
<p>If you have an account with us, please log in.</p>


<form name="loginform" id="loginform" action="dologin.php" method="post">
<div class="modal-body">

<div class="form-group row">
<label>Email Id*</label>
<input type="text" name="email" value="" required />
</div>

<div class="form-group row">
<label>Password*</label>
<input type="password" name="password" value=""  required />
</div>


    <div class="form-group row">
        <div class="col-md-6">
            <span><input type="submit" name="login" value="Login" class="account-sign-submit" /></span>
        </div>
        <div class="col-md-6">
            <a href="forgot-login.php">Forgot Your Password ?</a>
        </div>
    </div>

</div>
</form>
</div>
</div>





</div><!-- Row -->
</div><!-- Container Fluid -->
</div><!-- Product category -->


<?php //include "slider.php"; ?>

<?php //include "testimonial.php"; ?>

<?php include "footer.php"; ?>

<?php include "bottom_footer.php"; ?>




<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

<script>
    // Wait for the DOM to be ready
    $(function() {

        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-z\s]+$/i.test(value);
        });

        // Initialize form validation on the registration form.
        // It has the name attribute "registration"
        $("form#loginform").validate({
            // Specify validation rules
            rules: {
                // The key name on the left side is the name attribute
                // of an input field. Validation rules are defined
                // on the right side
                role: "required",
                email: {
                    required: true,
                    // Specify that email should be validated
                    // by the built-in "email" rule
                    email: true
                },
                password: {
                    required: true,
                    minlength: 5,
                    maxlength: 15,
                },
            },
            // Specify validation error messages
            messages: {
                email: "Please enter a valid email address",
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    maxlength: "Your password must be at maximum 15 characters long"
                },
            },
            // Make sure the form is submitted to the destination defined
            // in the "action" attribute of the form when valid
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>

</body>
</html>
