jQuery(function($){
	$('.woocommerce').on('change', 'input[name="depot_returned"]', function(){
		var thisis = $(this);
		$.ajax({
		  url: window.location.href + '?pintos_retourned=' + thisis.val(),
		  success: function(msg){
			$('.woocommerce input[name="update_cart"]').removeAttr('disabled');

			$('.woocommerce .toggle-tab.checkout-cart input[type="number"]:first').change();
		  }
		});
	});

	function disOptions(i) {
        $('#shipping_option_time option, #shipping_option_time_ta option').each(function () {
            if ($(this).attr('hint') == "1") return;
            if (i==1) {
                var strTime = $(this).val().substring(0, 5).replace(".", "");
               $(this).attr('data-time', strTime);
               var s = $(this).data('time');

               if (s < currTime) {
                   $(this).attr('disabled', 'disabled');
               }
           } else {
               $(this).removeAttr('disabled');
           }
            $(this).trigger('refresh');
        });
    }


    // Disable not relevant time for today
    $(document).on('change', '#shipping_option_day, #shipping_option_day_ta', function () {
        if ($(this).val() == currDay) {
            disOptions(1);
        } else {
            disOptions(0);
        }
    });


    // Checkout Loader
	if ($('body').hasClass('woocommerce-checkout') && !$('body').hasClass('woocommerce-order-received')) {
        $('.entry-title').after('<div class="loader"></div>');

        var checkoutheight = $('.woo-center').height();
        $('.loader').height(checkoutheight);
    }
    setTimeout(function() { $('.loader').fadeOut();}, 1200);
    setTimeout(function() { $('.wcopc').fadeIn();}, 1500);


    // Disable checkout tabs on recieved order page
    if ($('body').hasClass('woocommerce-order-received') && !$('body').hasClass('woocommerce-order-received')) {
        $('.toggle-tab').remove();
    }


    // Select stylization
    $('.delivery-popup select').styler();

	setTimeout(function() {
        // Hide/Show Checkout tabs
        $(document).on('click', '.checkout-tab', function() {

        var openedTab = $(this).next('.toggle-tab');
            openedTab.slideToggle();
            $('.toggle-tab').not(openedTab).slideUp();
        });

        $('.toggle-tab.shipping-block, .toggle-tab.checkout-cart').slideUp();


        // Delivery validation
        $('.payment-tab').on('click', function() {
            $('.shipping-block select').each(function() {
                if ( $(this).val() == null ) {
                    $(this).addClass('notFilled');
                } else {
                    $(this).removeClass('notFilled');
                }
            });
        });

        $('.payment-tab').on('click', function(e) {
            $('select#cardtype, select#expmonth, select#expyear').styler();

            if ( $('.notFilled').size() ) {
                e.stopPropagation();
                $('.wcopc').prepend('<span class="delivery-error">Füllen Sie bitte die Lieferfelder aus</span>');

                setTimeout(function() {
                    $('.delivery-error').fadeOut();
                }, 3000)
            }
        });

        $('.shipping-block select').on('change', function() {
            $(this).removeClass('notFilled');
        });


        // Disable enter click on element
        $('#depot_returned').keydown(function(e) {
            if ( e.keyCode == 13 ) {
                e.preventDefault();
                return false;
            }
        });

    }, 1500);


    // Checkbox to radio button
    $('.input-checkbox').on('click', function() {
        $(this).parent().toggleClass('checked')
    });

    $('.frau .checkbox').on('click', function() {
        if ( $('.herr .checkbox .input-checkbox' ).prop("checked") == true ) {
            $('.herr .checkbox .input-checkbox').removeAttr("checked");
            $('.herr .checkbox').removeClass("checked");
        }
    });

    $('.herr .checkbox').on('click', function() {
        if ( $('.frau .checkbox .input-checkbox').prop("checked") == true ) {
            $('.frau .checkbox .input-checkbox').removeAttr("checked");
            $('.frau .checkbox').removeClass("checked");
        }
    });

    // Checking radio buttons on link click
    $('a.showlogin').on('click', function() {
        $('input#logged-in' ).prop("checked", "checked");
    });
    $('a.loggout-lnk').on('click', function() {
        $('input#logged-out' ).prop("checked", "checked");
    });
    $('input#logged-out').on('change', function() {
        if ( $(this).is(':checked') ) {
            $('a.loggout-lnk')[0].click();
        }
    });

    $('form.checkout.woocommerce-checkout').on('submit', function() {
        setCookie('hidePopup', '', -1);
        setCookie('shop', '', -1);
        setCookie('zipCode', '', -1);
    });



    if ( getCookie('hidePopup') != '1'
        && $('body').hasClass('woocommerce-page')
        && $('body').hasClass('archive')
    ) {

        // Shop/ZIP-code popup
        setTimeout(function() {
            $('html, body').animate({ scrollTop: 0 }, 400);
            $('.delivery-popup').fadeIn(400);
            $('body').addClass('overlay');
        }, 100);

        /// ZIP-code choosing
        $('#zip-code').on('change', function() {
            var zipCode = $('#zip-code').val();
            setCookie('zipCode', zipCode, 1);
            setCookie('shop', '', 1);

            $('.delivery-popup').fadeOut(400);
            $('body').removeClass('overlay');

            setCookie('hidePopup', '1', 1);
        });

        /// shop choosing
        $('#shops li').on('click', function() {
            var shop = $(this).text().substring(2);
            setCookie('shop', shop, 1);
            setCookie('zipCode', '', 1);

            $('.delivery-popup').fadeOut(400);
            $('body').removeClass('overlay');

            setCookie('hidePopup', '1', 1);
        });
    };


    // Get ZIP code from cookie
    if (getCookie('zipCode') && $('body').hasClass('woocommerce-page') ) {
        var zipValue = getCookie('zipCode');

         setTimeout(function() {
            //$('input#shipping_method_0_wcta_local_shipping').prop('checked', 'checked');

             $('.address-tab').on('click', function() {
                 $('#billing_myfield13').val(zipValue);
                 $('#shipping_myfield6').val(zipValue);
             });

            $('#shipping_option_zip_code option').each(function() {
                if( $(this).val() ==  zipValue) {
                    $(this).attr('selected', 'selected').trigger('refresh');
                }
            });
        },1500);
    };

    // Get shop from cookie
    if (getCookie('shop') && $('body').hasClass('woocommerce-page') ) {
        var shop = getCookie('shop');

        setTimeout(function() {
            //$('input#shipping_method_0_wcco_local_shipping').prop('checked', 'checked');

            $('#shipping_option_shop option').each(function () {
                if ($(this).val() == shop) {
                    $(this).attr('selected', 'selected').trigger('refresh');
                }
            });

        },1500);
    };



});




function setCookie(c_name, value, exdays) {
    var exdate = new Date();
    exdays = exdays*1;
    exdate.setDate(exdate.getDate() + exdays);
    var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString() + "; path=/;");
    document.cookie = c_name + "=" + c_value;
};

function getCookie(c_name) {
    var c_value = document.cookie;
    var c_start = c_value.indexOf(" " + c_name + "=");
    if (c_start == -1) {
        c_start = c_value.indexOf(c_name + "=");
    }
    if (c_start == -1) {
        c_value = null;
    } else {
        c_start = c_value.indexOf("=", c_start) + 1;
        var c_end = c_value.indexOf(";", c_start);
        if (c_end == -1) {
            c_end = c_value.length;
        }
        c_value = unescape(c_value.substring(c_start, c_end));
    }
    return c_value;

};