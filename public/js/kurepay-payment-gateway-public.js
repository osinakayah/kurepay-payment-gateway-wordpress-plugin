(function( $ ) {

	'use strict';

    $(function () {
        var amount = $('#kure_pay_payment_gateway_amount').val();
        function initTransaction(email, public_key, amount, reference, fullname, phoneNumber) {

            $.ajax({
                method: 'POST',
                url: 'https://payment.kurepay.com/api/init-payment',
                data: {
                    email: email,
                    public_key: public_key,
                    amount: amount,
                    reference: reference,
                    fullname: fullname,
                    phoneNumber: phoneNumber,
                },
                error: function () {
                    
                },
                success: function (responseData, responseStatus) {
                    console.log(responseData, responseStatus);
                    if (responseStatus === "success") {
                        var reference = responseData.data.reference;
                        $('<iframe>', {
                            onload: function () {
                                setTimeout(function(){
                                    $('.kure_pay_payment_gateway-iframe').show();
                                }, 3000)

                            },
                            class: "kure_pay_payment_gateway-iframe",
                            src: 'https://payment.kurepay.com/#/initpayment/'+reference,
                            style: "display:none"
                        }).appendTo('.kure_pay_payment_gateway-modal-content');
                    }
                }
            });
        }
        var modal = $('#kure_pay_payment_gateway-myModal');
        var btn = $('#kure_pay_payment_gateway-myBtn');
        var span = $('.kure_pay_payment_gateway-close');

        btn.click(function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            modal.show();
            var email = $('#kure_pay_payment_gateway_customer_email').val();
            var publicKey = $('#kure_pay_payment_gateway_publicKey').val();
            var reference = new Date().getTime();
            var fullname = $('#kure_pay_payment_gateway_fullname').val();
            var phoneNumber = $('#kure_pay_payment_gateway_phone_number').val();
            initTransaction(email, publicKey, amount, reference, fullname, phoneNumber);

        });
        span.click(function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            modal.hide();
        })

    });

    // var modal = document.getElementById("kure_pay_payment_gateway-myModal");
    //
    // // Get the button that opens the modal
    // var btn = document.getElementById("kure_pay_payment_gateway-myBtn");
    //
    // // Get the <span> element that closes the modal
    // var span = document.getElementsByClassName("kure_pay_payment_gateway-close")[0];
    //
    // // When the user clicks on the button, open the modal
    // btn.onclick = function() {
    //     modal.style.display = "block";
    // }
    //
    // // When the user clicks on <span> (x), close the modal
    // span.onclick = function() {
    //     modal.style.display = "none";
    // }
    //
    // // When the user clicks anywhere outside of the modal, close it
    // window.onclick = function(event) {
    //     if (event.target == modal) {
    //         modal.style.display = "none";
    //     }
    // }
	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 *
	 */

})( jQuery );
