<?php session_start();
ob_start();

include "config.php";

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>FAQ</title>
<link href="images/favicon.png" type="image/png" rel="shortcut icon">
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
<link href="css/font-awesome.min.css" type="text/css" rel="stylesheet">
<link href="css/owl.carousel.css" type="text/css" rel="stylesheet">
<link href="css/jquery.bxslider.min.css" type="text/css" rel="stylesheet">
<link href="css/jquery.accordion.css" type="text/css" rel="stylesheet">
<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/owl.carousel.js" type="text/javascript"></script>
<script src="js/jquery.bxslider.min.js" type="text/javascript"></script>
<script src="js/jquery.accordion.js" type="text/javascript"></script>
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


        $('#only-one [data-accordion]').accordion();

        $('#multiple [data-accordion]').accordion({
          singleOpen: false
        });

        $('#single[data-accordion]').accordion({
          transitionEasing: 'cubic-bezier(0.455, 0.030, 0.515, 0.955)',
          transitionSpeed: 200
        });
      
			  
            });
</script>
</head>

<body>

<?php include "top_header.php"; ?>

<?php include "header.php"; ?>

<div class="home-about-banner">
<div class="home-about-banner-overlay">
<h3>FAQ</h3>
</div>
</div>


<div class="faq">
<div class="container">
<div class="row">
<div class="col-md-12 col-sm-12 col-xs-12">

 <section id="only-one" data-accordion-group>
      <section data-accordion>
        <button data-control>1) What is RFID electronic self-sealing facility for exporters?</button>
        <div data-content>
          <article><p>The Central Board of Excise & Customs has allowed exporters the facility of self-sealing containers at their own premises subject to the condition that they use electronic seals (circular number 26/2017 dated 1st July 2017). This system has replaced the earlier procedure where exporters had the facility for requesting an officer of Central Excise Dept. to be present at their premises at the time of stuffing a container and having it sealed using a one- time mechanical bolt seal. This procedure permitted export of goods without any examination at the port.</p></article>
        </div>
      </section>
	  
	  <section data-accordion>
        <button data-control>2) What type of seal is to be used in self-sealing?</button>
        <div data-content>
          <article><p>
		  The specifications of seals to be used under the new self-sealing procedure has been prescribed under circular 36/2017 dated 28th August 2017. The specification of the seal reproduced below:
		  <span class="blue-color">" The RFID seal shall conform to ISO 17712:2013 (H) and ISO/IEC 18000-6 Class 1 Gen 2 which is globally accepted in industrial applications and can be read with the use of UHF (i.e. 860 MHz to 960 MHz) Reader-Scanners. The manufacturer or vendor, as the case may be, shall be in possession of certifications required for conformance of the ISO standard ISO 17712:2013 (H) namely, clauses 4, 5 and 6 "</span>
		  Under this procedure exporters are required to purchase RFID seals conforming to the above standards directly from vendors. Sri Sai Ganesh Associates conform to this standard.
		  </p></article>
        </div>
      </section>
	  
	  	  <section data-accordion>
        <button data-control>3) Can all exporters procure RFID seals and stuff containers at their factory or warehouse under self-sealing procedures?</button>
        <div data-content>
          <article>
		  <p><b>CBEC has permitted automatic self-sealing facility to four categories of exporters:</b></p>
		  <ul>
		  <li>All Authorized Economic Operators (AEOs)</li>
		  <li>All Exporters who were already enjoying self-sealing permission</li>
		  <li>All Exporters who have been availing the facility of sealing in the presence of a central excise officer.</li>
		  <li>Status Holders recognized by DGFT holding a valid status holder certificate All other exporters are also eligible for this facility provided they seek permission from their jurisdictional customs office. An officer of the Customs Dept. will visit the exporter’s premises for verification as a part of the process of allowing permission for self-sealing. The Dept. has made a performance pledge to decide on your application for self-sealing within 15 days. We strongly urge all exporters to seek this permission and avail the facility of self-sealing. An Exporter shall be able avoid examination at CFS and straight away save thousands of rupees and time.</li>
		  </ul>
		  </article>
        </div>
      </section>
	  
	  
	  	  <section data-accordion>
        <button data-control>4) How do I start using RFID Sri Sai Ganesh Associates for self-sealing?</button>
        <div data-content>
          <article>
		  <p>
Sri Sai Ganesh Associates and the Sri Sai Ganesh Associates App have been customized to meet the requirements of the new customs procedure prescribed under circular numbers 26/2017 and 36/2017. Each seal comes with a laser engraved serial number as prescribed by the CBEC in the format LYNK-1234-5678, which you will be uploading in the online shipping bill as well as on the Lynkseal App. The Sri Sai Ganesh Associates App is enabled for you to upload shipment data as required by para 4(a) of the circular 36/2017. Our customized Sri Sai Ganesh Associates Reader will scan the seal and verify its authenticity by giving a message on the reader’s screen. To enjoy this highly automated system, you have to just register on the Sri Sai Ganesh Associates website and provide your IEC number and other identifying particulars (please refer to para 2(e) of Circular 36/2017 dated 28.8.2017). The data you provide serves two purposes. Firstly, it is part of the security drill put in place by customs to ensure that exporters procure seals directly and “chain of custody” is visible. Secondly, the data gathered at the time of registration enables you use the web application with many of the required fields being auto-populated. Please rest assured that Sri Sai Ganesh Associates.com maintains highest global standards in data privacy		  
		  </p></article>
        </div>
      </section>
	  
	  
	   <section data-accordion>
        <button data-control>5) How do I buy RFID Sri Sai Ganesh Associates?</button>
        <div data-content>
          <article>
		  <p>
Once you have completed the registration form, you can click on shop now and securely purchase the seals online. The date for registration and online purchases will be communicated very soon on your email, registered mobile number and on the website.
		  </p></article>
        </div>
      </section>
	  
	  <section data-accordion>
        <button data-control>6) How many seals can I buy at a time?</button>
        <div data-content>
          <article>
		  <p>
RFID Sri Sai Ganesh Associates comes in boxes of 10 seals. For a single order of 50 pieces or more, we have special offers and you should contact us on <b>ssgassociates2015@gmail.com</b>
		  </p></article>
        </div>
      </section>
	  
	  <section data-accordion>
        <button data-control>7) How will I use the seal to lock the container?</button>
        <div data-content>
          <article>
		  <p>
Sri Sai Ganesh Associates™ are designed like the conventional bolt seal (bottle seal) so as to give the same experience and ease of sealing a container, which your logistics team has been accustomed to. Just push the bolt into the cap and you are done!
		  </p></article>
        </div>
      </section>
	  
	  
	   <section data-accordion>
        <button data-control>8) How secure is this seal?</button>
        <div data-content>
          <article>
		  <p>
It is 100% secure! The seal comes with a sophisticated anti-tamper technology and fully conforms to the technical specifications prescribed by CBEC. The readers to be supplied by us at all ports and ICDs will detect the seal is tampered in any way. Our app is designed to also alert you on your mobile and email.
		  </p></article>
        </div>
      </section>
	  
	  <section data-accordion>
        <button data-control>9) What will happen when the container reaches the Port gate / ICD?</button>
        <div data-content>
          <article>
		  <p>
We are setting up a state of the art eco-system to ensure maximum security of your container and best possible gate access to ports and ICDs. Sri Sai Ganesh Associates shall provide handheld readers at all Ports / ICDs. Upon arrival of the trailer, the seal will be scanned using our Sri Sai Ganesh Associates reader. The data on the seal will be uploaded in real time to our secure servers for an integrity check. Those containers whose seals are intact will receive Direct Port Entry (DPE), saving you costs and time associated with the container being taken through a CFS.
		  </p></article>
        </div>
      </section>
	  
	  <section data-accordion>
        <button data-control>10) How will Sri Sai Ganesh Associates be delivered to me? </button>
        <div data-content>
          <article>
		  <p>
Sri Sai Ganesh Associates is consciously aware of your time critical needs. Blue Dart ®, the best courier firm in the business of express deliveries, is our logistics partner. They ensure that each of your orders is delivered to you anywhere in India as fast as possible and as securely as possible.
		  </p></article>
        </div>
      </section>
	  
	    <section data-accordion>
        <button data-control>11) How do I place repeat orders?  </button>
        <div data-content>
          <article>
		  <ul>
		  <li>Email us at <b>ssgassociates2015@gmail.com</b> to buy in bulk and avail special offers.</li>
		  <li>Give us a standing instruction to ship you a specified quantity every month. Our customer executive can be contacted at <b>ssgassociates2015@gmail.com</b> to assist you with this process.</li>
		  <li>Visit the site each time and buy with speed and ease.</li>
		  </ul>
		  </article>
        </div>
      </section>
	  
	  <section data-accordion>
        <button data-control>12) Can I also buy a reader for my use?   </button>
        <div data-content>
          <article>
		  <p>We have deployed specialized readers meant for use by Indian customs. The data downloaded from RFID Sri Sai Ganesh Associates is securely read on the device and simultaneously uploaded on secure servers for access by officers of customs. However, you will have access to read your shipment data by using a log in ID and password which we will provide to you upon registration. Of course, for other applications that we offer, you are most welcome to reach us with your requirement for Readers and / or a complete RFID solution. Just email us at <b><b>ssgassociates2015@gmail.com</b>.</b></p>
		  </article>
        </div>
      </section>

</section>
</div><!-- Column 12 -->

</div><!-- Row -->
</div><!-- Container Fluid -->
</div><!-- Product category -->


<?php include "slider.php"; ?>

<?php include "testimonial.php"; ?>

<?php include "footer.php"; ?>

<?php include "bottom_footer.php"; ?> 

</body>
</html>
