
<?php /* ?>
<div class="banner">
    <ul class="bxslider">
        <li><img src="images/bg1.jpg"></li>
        <li><img src="images/bg2.jpg"></li>
        <li><img src="images/bg3.jpg"></li>
        <li><img src="images/bg4.jpg"></li>
    </ul>
</div>
<?php */ ?>


<div class="banner">
    <ul class="bxslider">
        <li><img src="ssga/images/1.jpg" alt="" title="" class="img-responsive" /></li>
        <li><img src="ssga/images/2.jpg" alt="" title="" class="img-responsive" /></li>
    </ul>
</div>

<style>
    .big-hr::before {
        border-top: 100px solid #f48929;
    }
    .big-hr::after {
        border-top: 100px solid #f48929;
    }

    .big-hr {
        margin-top: -70px;
        max-width: 700px;
        height: 100px;
        padding-top: 5px;
    }

    .normal-stiff {
        padding: 100px 0 30px 0px;
    }
</style>
<div class="normal-stiff">
    <!--<hr>-->
    <div class="container">
        <div class="row">
            <div class="big-hr">
                <div class="text-left" style="margin-right:40px;">
                    <h2>Sri Sai Ganesh Associates</h2>
                    <p>helps manufacturers with gaining full control of their supply chain.</p>
                </div>
                <div class="request">
                    <?php if(isset($_SESSION['exporteruserid'])){ ?>
                    <a class="btnn btn-success btn-lg" href="product-buy.php">BUY NOW</a>
                    <?php } else { ?>
                    <a class="btnn btn-success btn-lg" href="login.php">BUY NOW</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>