
(function ($) {
    "use strict";

    /*[ Load page ]
    ===========================================================*/
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        loading: true,
        loadingParentElement: 'html',
        loadingClass: 'animsition-loading-1',
        loadingInner: '<div class="loader05"></div>',
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        overlay : false,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'html',
        transition: function(url){ window.location.href = url; }
    });
    
    /*[ Back to top ]
    ===========================================================*/
    var windowH = $(window).height()/2;

    $(window).on('scroll',function(){
        if ($(this).scrollTop() > windowH) {
            $("#myBtn").css('display','flex');
        } else {
            $("#myBtn").css('display','none');
        }
    });

    $('#myBtn').on("click", function(){
        $('html, body').animate({scrollTop: 0}, 300);
    });


    /*==================================================================
    [ Fixed Header ]*/
    var headerDesktop = $('.container-menu-desktop');
    var wrapMenu = $('.wrap-menu-desktop');

    if($('.top-bar').length > 0) {
        var posWrapHeader = $('.top-bar').height();
    }
    else {
        var posWrapHeader = 0;
    }
    

    if($(window).scrollTop() > posWrapHeader) {
        $(headerDesktop).addClass('fix-menu-desktop');
        $(wrapMenu).css('top',0); 
    }  
    else {
        $(headerDesktop).removeClass('fix-menu-desktop');
        $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop()); 
    }

    $(window).on('scroll',function(){
        if($(this).scrollTop() > posWrapHeader) {
            $(headerDesktop).addClass('fix-menu-desktop');
            $(wrapMenu).css('top',0); 
        }  
        else {
            $(headerDesktop).removeClass('fix-menu-desktop');
            $(wrapMenu).css('top',posWrapHeader - $(this).scrollTop()); 
        } 
    });


    /*==================================================================
    [ Menu mobile ]*/
    $('.btn-show-menu-mobile').on('click', function(){
        $(this).toggleClass('is-active');
        $('.menu-mobile').slideToggle();
    });

    var arrowMainMenu = $('.arrow-main-menu-m');

    for(var i=0; i<arrowMainMenu.length; i++){
        $(arrowMainMenu[i]).on('click', function(){
            $(this).parent().find('.sub-menu-m').slideToggle();
            $(this).toggleClass('turn-arrow-main-menu-m');
        })
    }

    $(window).resize(function(){
        if($(window).width() >= 992){
            if($('.menu-mobile').css('display') == 'block') {
                $('.menu-mobile').css('display','none');
                $('.btn-show-menu-mobile').toggleClass('is-active');
            }

            $('.sub-menu-m').each(function(){
                if($(this).css('display') == 'block') { console.log('hello');
                    $(this).css('display','none');
                    $(arrowMainMenu).removeClass('turn-arrow-main-menu-m');
                }
            });
                
        }
    });


    /*==================================================================
    [ Show / hide modal search ]*/
    $('.js-show-modal-search').on('click', function(){
        $('.modal-search-header').addClass('show-modal-search');
        $(this).css('opacity','0');
    });

    $('.js-hide-modal-search').on('click', function(){
        $('.modal-search-header').removeClass('show-modal-search');
        $('.js-show-modal-search').css('opacity','1');
    });

    $('.container-search-header').on('click', function(e){
        e.stopPropagation();
    });


    /*==================================================================
    [ Isotope ]*/
    var $topeContainer = $('.isotope-grid');
    var $filter = $('.filter-tope-group');

    // filter items on button click
    $filter.each(function () {
        $filter.on('click', 'button', function () {
            var filterValue = $(this).attr('data-filter');
            $topeContainer.isotope({filter: filterValue});
        });
        
    });

    // init Isotope
    $(window).on('load', function () {
        var $grid = $topeContainer.each(function () {
            $(this).isotope({
                itemSelector: '.isotope-item',
                layoutMode: 'fitRows',
                percentPosition: true,
                animationEngine : 'best-available',
                masonry: {
                    columnWidth: '.isotope-item'
                }
            });
        });
    });

    var isotopeButton = $('.filter-tope-group button');

    $(isotopeButton).each(function(){
        $(this).on('click', function(){
            for(var i=0; i<isotopeButton.length; i++) {
                $(isotopeButton[i]).removeClass('how-active1');
            }

            $(this).addClass('how-active1');
        });
    });

    /*==================================================================
    [ Filter / Search product ]*/
    $('.js-show-filter').on('click',function(){
        $(this).toggleClass('show-filter');
        $('.panel-filter').slideToggle(400);

        if($('.js-show-search').hasClass('show-search')) {
            $('.js-show-search').removeClass('show-search');
            $('.panel-search').slideUp(400);
        }    
    });

    $('.js-show-search').on('click',function(){
        $(this).toggleClass('show-search');
        $('.panel-search').slideToggle(400);

        if($('.js-show-filter').hasClass('show-filter')) {
            $('.js-show-filter').removeClass('show-filter');
            $('.panel-filter').slideUp(400);
        }    
    });




    /*==================================================================
    [ Cart ]*/
  

    /*==================================================================
    [ Cart ]*/
    $('.js-show-sidebar').on('click',function(){
        $('.js-sidebar').addClass('show-sidebar');
    });

    $('.js-hide-sidebar').on('click',function(){
        $('.js-sidebar').removeClass('show-sidebar');
    });

    /*==================================================================
    [ +/- num product ]*/
    $('.btn-num-product-down').on('click', function(){
        var numProduct = Number($(this).next().val());
        if(numProduct > 0) $(this).next().val(numProduct - 1);
    });

    $('.btn-num-product-up').on('click', function(){
        var numProduct = Number($(this).prev().val());
        $(this).prev().val(numProduct );
    });

    /*==================================================================
    [ Rating ]*/
    $('.wrap-rating').each(function(){
        var item = $(this).find('.item-rating');
        var rated = -1;
        var input = $(this).find('input');
        $(input).val(0);

        $(item).on('mouseenter', function(){
            var index = item.index(this);
            var i = 0;
            for(i=0; i<=index; i++) {
                $(item[i]).removeClass('zmdi-star-outline');
                $(item[i]).addClass('zmdi-star');
            }

            for(var j=i; j<item.length; j++) {
                $(item[j]).addClass('zmdi-star-outline');
                $(item[j]).removeClass('zmdi-star');
            }
        });

        $(item).on('click', function(){
            var index = item.index(this);
            rated = index;
            $(input).val(index+1);
        });

        $(this).on('mouseleave', function(){
            var i = 0;
            for(i=0; i<=rated; i++) {
                $(item[i]).removeClass('zmdi-star-outline');
                $(item[i]).addClass('zmdi-star');
            }

            for(var j=i; j<item.length; j++) {
                $(item[j]).addClass('zmdi-star-outline');
                $(item[j]).removeClass('zmdi-star');
            }
        });
    });
    
    /*==================================================================
    [ Show modal1 ]*/
       // Show modal1
       $('.js-show-modal').on('click', function(e){
        console.log(e)
        e.preventDefault();
        
        // Get product details from data attributes
        var productId = $(this).data('id');
        var productName = $(this).data('name');
        console.log(productName);
        var productPrice = $(this).data('price');
        var productImage = $(this).data('image');

        // Update the modal content
        $('.js-modal1 .js-name-detail').text(productName);
        $('.js-modal1 .mtext-106').text('$' + productPrice);
        $('.js-modal1 .wrap-pic-w img').attr('src', productImage);

        // Show the modal
        $('.js-modal1').addClass('show-modal1');
    });

    // Hide modal1
    $('.js-hide-modal1').on('click', function(){
        $('.js-modal1').removeClass('show-modal1');
    });



})(jQuery);




function user_register(){
    jQuery('.field_error').html('');
    var name=jQuery("#name").val();
    console.log(name)
    var email=jQuery("#email").val();
    var mobile=jQuery("#mobile").val();
    var password=jQuery("#password").val();
    var is_error='';
    if(name==""){
        jQuery('#name_error').html('Please enter name');
        is_error='yes';
    }if(email==""){
        jQuery('#email_error').html('Please enter email');
        is_error='yes';
    }if(mobile==""){
        jQuery('#mobile_error').html('Please enter mobile');
        is_error='yes';
    }if(password==""){
        jQuery('#password_error').html('Please enter password');
        is_error='yes';
    }
    if(is_error==''){
        jQuery.ajax({
            url:'submit-register.php',
            type:'post',
            data:'name='+name+'&email='+email+'&mobile='+mobile+'&password='+password,
            success:function(result){
                if(result=='email_present'){
                    jQuery('#email_error').html('Email id already present');
                }
                if(result=='insert'){
                    jQuery('.register_msg p').html('Thank you for registration');
                }
            }	
        });
    }
    
}

function user_login(){
    jQuery('.field_error').html('');
    var email=jQuery("#login_email").val();
    var password=jQuery("#login_password").val();
    var is_error='';
    if(email==""){
        jQuery('#login_email_error').html('Please enter email');
        is_error='yes';
    }if(password==""){
        jQuery('#login_password_error').html('Please enter password');
        is_error='yes';
    }
    if(is_error==''){
        jQuery.ajax({
            url:'submit-login.php',
            type:'post',
            data:'email='+email+'&password='+password,
            success:function(result){
                console.log(result)
                if(result=='wrong'){
                    jQuery('.login_msg p').html('Please enter valid login details');
                }
                if(result=='valid'){
                    window.location.href=window.location.href;
                }
            }	
        });
    }	
}

function pincodeCheck() {
    jQuery('.field_error').html('');
    var pincode=jQuery("#pincode").val();
    var is_error='';
    if(pincode==""){
        jQuery('#pincode_error').html('Please enter valid pincode');
        is_error='yes';
    }


    if(is_error==''){
    jQuery.ajax({
        url: 'check_pincode.php',
        type: 'POST',
        data: { pincode: pincode }, // Sending the pincode value to the server
        success: function(response) {
            var result = jQuery('#availabilityResult');
            var data = JSON.parse(response);

            // Show success or error message based on response
            if (data.status === "available") {
                result.html('<div class="alert alert-success">Service is available for this pincode!</div>');
            } else {
                result.html('<div class="alert alert-danger">Service is unavailable for this pincode!</div>');
            }
        }
    });
  }
}

function checkPincode() {
    var pincode = document.getElementById("pincode").value; // Get the value of the input
    var is_error='';

    jQuery('#availabilityResult').html(''); 
    jQuery('#pincode_error').html(''); 

    if (pincode.length < 6) { // Assuming a pincode length of 6
        jQuery('#pincode_error').html('Please enter valid pincode');
        is_error='yes';
    }

    if(is_error==''){
    // AJAX request using jQuery
    jQuery.ajax({
        url: 'check_pincode.php', // Your PHP script to handle the request
        type: 'POST',
        data: { pincode: pincode },
        success: function(response) {
            var result = document.getElementById("availabilityResult");

            // Parse the JSON response
            var data = JSON.parse(response);

            jQuery('#pincode_error').html(''); 
            
            // Display message based on the response
            if (data.status === "available") {
                result.innerHTML = '<div class="alert alert-success">Service is available for this pincode!</div>';
            } else {
                result.innerHTML = '<div class="alert alert-danger">Service is unavailable for this pincode!</div>';
            }
        },
        error: function() {
            // Handle error response
            document.getElementById("availabilityResult").innerHTML = '<div class="alert alert-danger">An error occurred while checking the pincode.</div>';
        }
    });
  }
}


function ratingSubmit() {
    // Clear any previous error messages
    jQuery('.field_error').html('');

    // Get the form values
    var review = jQuery("#review").val();
    var name = jQuery("#name").val();
    var email = jQuery("#email").val();
    var rating = jQuery('input[name="rating"]').val(); // Get rating
    var product_id = jQuery('input[name="product_id"]').val(); // Product ID

    var is_error = ''; // Flag to track validation errors

    // Validate the input fields
    if(review == ""){
        jQuery('#review_error').html('Please enter your review');
        is_error = 'yes';
    }
    if(name == ""){
        jQuery('#name_error').html('Please enter your name');
        is_error = 'yes';
    }
    if(email == ""){
        jQuery('#email_error').html('Please enter your email');
        is_error = 'yes';
    }
    if(rating == "" || rating < 1 || rating > 5){
        jQuery('#rating_error').html('Please select a valid rating');
        is_error = 'yes';
    }

    // If there are no validation errors, submit the form via AJAX
    if(is_error == ''){
        jQuery.ajax({
            url: 'review-submit.php',
            type: 'POST',
            data: {
                review: review,
                name: name,
                email: email,
                rating: rating,
                product_id: product_id
            },
            success: function(response) {
                var data = JSON.parse(response);

                // Show success or error message based on response
                if (data.status === "success") {
                    jQuery('#submitResult').html('<div class="alert alert-success">Review submitted successfully!</div>');
                } else {
                    jQuery('#submitResult').html('<div class="alert alert-danger">Error submitting review. Please try again later.</div>');
                }
            },
            error: function() {
                jQuery('#submitResult').html('<div class="alert alert-danger">Error submitting review. Please try again later.</div>');
            }
        });
    }
}




function manage_cart(pid,type){
    console.log('prodid',pid)
	if(type=='update'){
		var qty=jQuery("#"+pid+"qty").val();
	}else{
		var qty=jQuery("#qty").val();
        console.log('quantity',qty);
	}
	jQuery.ajax({
		url:'manage_cart.php',
		type:'post',
		data:'pid='+pid+'&qty='+qty+'&type='+type,
		success:function(result){
			if(type=='update' || type=='remove'){
				window.location.href=window.location.href;
			}
			jQuery('.htc__qua').html(result);
		}	
	});	   
    
}

