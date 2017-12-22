<?php session_start();
ob_start();

include "config.php";

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>E-Seal Procedure</title>
<link href="images/favicon.png" type="image/png" rel="shortcut icon">
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="css/font-awesome.min.css" type="text/css" rel="stylesheet">
<link href="css/owl.carousel.css" type="text/css" rel="stylesheet">
<link href="css/jquery.bxslider.min.css" type="text/css" rel="stylesheet">
<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/owl.carousel.js" type="text/javascript"></script>
<script src="js/jquery.bxslider.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
				autoplay:true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true,
					navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
                  },
                  600: {
                    items:2,
                    nav: true,
					navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
                  },
                  1000: {
                    items: 2,
                    nav: true,
                    loop: false,
                    margin: 20,
					navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"]
                  }
                }
              })
			  
			  $('.bxslider').bxSlider({
			mode: 'horizontal',
			moveSlides: 1,
			slideMargin: 40,
			infiniteLoop: true,
			slideWidth:550,
			minSlides:1,
			maxSlides:2,
			speed: 800,
			//auto:true,
		});
			  
			  
	$(window).scroll(function(){
  var sticky = $('.main-header'),
      scroll = $(window).scrollTop();

  if (scroll >= 100) sticky.addClass('fixed');
  else sticky.removeClass('fixed');
});
			  
            });
</script>
</head>

<body>

<?php include "top_header.php"; ?>

<?php include "header.php"; ?>


<div class="home-about-banner hidden">
<div class="home-about-banner-overlay">
<h3>About Us</h3>
</div>
</div>


<div class="home-about">
    <div class="container">
        <div class="row web-inner-top">
            <h3>E-Seal Procedure</h3>
            <p><i>Electronic Sealing of Container by exporter under self-sealing procedure WEF 01.10.2017</i></p>

            <div class="col-md-12 col-sm-12 col-xs-12 about-img">
                <h2>How it Works ?</h2>
                <img src="images/eseal-procedure.png" alt="E-Seal Procedure" title="E-Seal Procedure" class="img-responsive">
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12 about-us">
                <h4>Objective : </h4>
                <p>In order to do ease export of the goods, now sealing for export will be electronic in absence of the CBEC official. Presence of the Superintendent of GST is not required for sealing of export container only intimation would be suffice with effect from 01st October 2017.</p>

                <h4>Exporter Responsibility :</h4>
                <ul>
                    <li>To inform the details of the premises (factory or warehouse or any other place), where container stuffing is to be carried out, to the jurisdictional customs officer.</li>
                    <li>The exporter should be registered under the GST.</li>
                    <li>Declare the physical serial number of <b>the E-Seal</b> at the time of filling the online integrated shipping bill.</li>
                    <li>Exporter shall directly procure the <b>RFID tamper proof one time bolt seal</b>bearing unique number from <b>brand vendors</b> (Brand in format ABCD XXXX XXXX) where ABCD stand for brand of vendor and 8X stand for numeric value.</li>
                </ul>

                <h4>Procedure for Permission of self-sealing :</h4>
                <ul>
                    <li>Exporter shall inform the jurisdictional Custom Superintendent or Appraiser of Customs, <b>at least 15 days before the first planned movement of a consignment,</b> about the intention to follow self- sealing procedure for export goods from the factory premises or warehouse.</li>
                    <li>The jurisdictional Superintendent or an Appraiser or an Inspector of Customs shall visit the premises from where the export goods will be stuffed & sealed for export.</li>
                    <li>The Superintendent/Inspector of Customs shall inspect the premises with regard to viability of stuffing of container in the premises and submit a report to the jurisdictional Deputy/ Assistant Commissioner of Customs within 48 hours.</li>
                    <li>The jurisdictional Deputy/Assistant Commissioner of Customs shall forward the proposal, in this regard to the Principal Commissioner/Commissioner of Customs who would grant permission for self-sealing at the approved premises.</li>
                    <li>Once the permission is granted, the exporter shall furnish <b>only intimation to the jurisdictional Superintendent or Customs each time self-sealing</b> is carried out at approved premises.</li>
                    <li>Self-Sealing permission once given by a Principal Commissioner/Commissioner of Customs shall be <b>valid for export at all the customs stations.</b></li>
                    <li>The customs formation granting the self-sealing permission shall circulate the permission along with <b class="blue">GSTIN</b> of the exporter to all Custom Houses/Station concerned.</li>
                    <li>Transport document for movement of self-sealed container by an exporter from factory or warehouse shall be same as the transport document prescribed under the <b class="blue">GST Laws.</b></li>
                    <li>The exporter shall seal the container with the <b>tamper proof electronic-seal of standard specification.</b> The electronic seal should have a unique number which should be declared in the Shipping Bill</li>
                    <li>Before sealing the container, the exporter shall feed the data such as name of the exporter, IEC code, GSTIN number, description of the goods, tax invoice number name of the authorized signatory (for
                        Affixing the e-seal) and Shipping Bill number in the electronic seal. Thereafter, container shall be sealed with the same electronic seal before leaving the premises.</li>

                </ul>

                <h4>Following category of exporter don no required fresh permission (i.e. no need to follow the procedure for permission)</h4>
                <ul>
                    <li>The exporters who were availing sealing at their factory premises under system of supervised factory stuffing, will be automatically entitled for self-sealing procedure.</li>
                    <li>All Exporter AEOs(Authorized economic operators)</li>
                </ul>


                <h4></h4>
                <p></p>


                <h4></h4>
                <p></p>


                <h4></h4>
                <p></p>


                <h4></h4>
                <p></p>


                <h4></h4>
                <p></p>


                <h4></h4>
                <p></p>

            </div>

        </div>

        <!--<div class="row web-inner-top">
        <div class="col-md-3 col-sm-3 col-xs-12 abt-img">
        <img src="images/eseal1.jpg" alt="" title="" class="img-responsive img-circle">
        </div>

        <div class="col-md-9 col-sm-9 col-xs-12 about-us">
        <p>To our credit we sold the first official mobile handset in India in 1995 and have since been instrumental in evolution of mobile industry in the country. In 2015, we entered into a joint venture with Wistron Corporation of Taiwan to set up world class manufacturing facilities for Smartphone and Smart devices in India under Make in India initiative. Optiemus is also the brand licensee for BlackBerry Smartphones for Indian subcontinent and under the agreement manufactures, distributes, markets & provides post sales services. The Group has an extensive presence in telecom retail business with stores across India under the Mobility World and Univercell brands. The group’s flagship company, Optiemus Infracom is listed across all the major stock exchanges in the country, including BSE, NSE.</p>
        </div>
        </div>-->

        <!--<div class="row web-inner-top">
        <div class="col-md-9 col-sm-9 col-xs-12 about-us">
        <p>Optiemus Telematics Pvt. Ltd marks the entry of Sri Sai Ganesh Associates into the field of telematics, bringing to this industry its core philosophy of always introducing world class technology with speed and scalability. Optiemus Telematics welcomes its customers to a new era in B2B transactions with end to end digital experience starting from online procurement to easy to use cloud hosted applications, all customized to provide you with agility, visibility and security in your logistics operations.</p>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 abt-img">
        <img src="images/eseal1.jpg" alt="" title="" class="img-responsive img-circle">
        </div>

        </div>--><!-- Row -->
    </div><!-- Container -->
</div><!-- Home About -->



<!-- Row -->
</div><!-- Container -->
</div><!-- Home About -->







<?php //include "welcome.php"; ?>

<?php //include "slider.php"; ?>

<?php //include "testimonial.php"; ?>

<?php include "footer.php"; ?>

<?php include "bottom_footer.php"; ?>

 
</body>
</html>
