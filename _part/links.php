  <!-- Google Font -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Fontawesome Icon font -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>

  <!-- Twitter Bootstrap css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- jquery.fancybox  -->
  <link rel="stylesheet" href="css/jquery.fancybox.css">

  <!-- animate -->
  <link rel="stylesheet" href="css/animate.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="css/main.css">

  <!-- media-queries -->
  <link rel="stylesheet" href="css/media-queries.css">

  <!-- Modernizer Script for old Browsers -->
  <script src="js/modernizr-2.6.2.min.js"></script>



  <!-- Twitter Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- Main jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Single Page Nav -->
  <script src="js/jquery.singlePageNav.min.js"></script>
  <!-- jquery.fancybox.pack -->
  <script src="js/jquery.fancybox.pack.js"></script>
  <!-- jquery.mixitup.min -->
  <script src="js/jquery.mixitup.min.js"></script>
  <!-- jquery.parallax -->
  <script src="js/jquery.parallax-1.1.3.js"></script>
  <!-- jquery.countTo -->
  <script src="js/jquery-countTo.js"></script>
  <!-- jquery.appear -->
  <script src="js/jquery.appear.js"></script>
  <!-- Contact form validation -->
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>
  <!-- Google Map -->
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
  <!-- jquery easing -->
  <script src="js/jquery.easing.min.js"></script>
  <!-- jquery easing -->
  <script src="js/wow.min.js"></script>
  <script>
  	var wow = new WOW({
  		boxClass: 'wow', // animated element css class (default is wow)
  		animateClass: 'animated', // animation css class (default is animated)
  		offset: 120, // distance to the element when triggering the animation (default is 0)
  		mobile: false, // trigger animations on mobile devices (default is true)
  		live: true // act on asynchronously loaded content (default is true)
  	});
  	wow.init();
  </script>
  <!-- Custom Functions -->
  <script src="js/custom.js"></script>

  <script type="text/javascript">
  	$(function() {
  		/* ========================================================================= */
  		/*	Contact Form
  		/* ========================================================================= */

  		$('#contact-form').validate({
  			rules: {
  				name: {
  					required: true,
  					minlength: 2
  				},
  				email: {
  					required: true,
  					email: true
  				},
  				message: {
  					required: true
  				}
  			},
  			messages: {
  				name: {
  					required: "come on, you have a name don't you?",
  					minlength: "your name must consist of at least 2 characters"
  				},
  				email: {
  					required: "no email, no message"
  				},
  				message: {
  					required: "um...yea, you have to write something to send this form.",
  					minlength: "thats all? really?"
  				}
  			},
  			submitHandler: function(form) {
  				$(form).ajaxSubmit({
  					type: "POST",
  					data: $(form).serialize(),
  					url: "process.php",
  					success: function() {
  						$('#contact-form :input').attr('disabled', 'disabled');
  						$('#contact-form').fadeTo("slow", 0.15, function() {
  							$(this).find(':input').attr('disabled', 'disabled');
  							$(this).find('label').css('cursor', 'default');
  							$('#success').fadeIn();
  						});
  					},
  					error: function() {
  						$('#contact-form').fadeTo("slow", 0.15, function() {
  							$('#error').fadeIn();
  						});
  					}
  				});
  			}
  		});
  	});
  </script>