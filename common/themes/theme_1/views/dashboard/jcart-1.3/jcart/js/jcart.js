
// jCart v1.3
// http://conceptlogic.com/jcart/

$(function() {

	var JCART = (function() {


// var full = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '');

// alert(full);
		// This script sends Ajax requests to config-loader.php and relay.php using the path below
		// We assume these files are in the 'jcart' directory, one level above this script
		// Edit as needed if using a different directory structure
		var path = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '')+'/hotpot/common/themes/theme_1/views/dashboard/jcart-1.3/jcart',
			container = $('#jcart'),
			token = $('[name=jcartToken]').val(),
			tip = $('#jcart-tooltip');

		var config = (function() {
			var config = null;
			$.ajax({
				url: path + '/config-loader.php',
				data: {
					"ajax": "true"
				},
				dataType: 'json',
				async: false,
				success: function(response) {
					config = response;
				},
				error: function() {
					alert('Ajax error: Edit the path in jcart.js to fix.');
				}
			});
			return config;
		}());

		var setup = (function() {
			if(config.tooltip === true) {
				tip.text(config.text.itemAdded);
	
				// Tooltip is added to the DOM on mouseenter, but displayed only after a successful Ajax request
				$('.jcart [type=submit]').mouseenter(
					function(e) {
						var x = e.pageY + 25,
							y = e.pageX + -10;
						$('body').append(tip);
						tip.css({top: y + 'px', left: x + 'px'});
					}
				)
				.mousemove(
					function(e) {
						var y = e.pageY + 25,
						x = e.pageX + -10;
						tip.css({top: y + 'px', left: x + 'px'});
					}
				)
				.mouseleave(
					function() {
						tip.hide();
					}
				);
			}

			// Remove the update and empty buttons since they're only used when javascript is disabled
			$('#jcart-buttons').remove();

			// Default settings for Ajax requests
			$.ajaxSetup({
				type: 'POST',
				url: path + '/relay.php',
				success: function(response) {
					// Refresh the cart display after a successful Ajax request
					container.html(response);

					container.find('#subtotal-details').hide();
					
					$('#jcart-buttons').remove();
				},
				// See: http://www.maheshchari.com/jquery-ajax-error-handling/
				error: function(x, e) {
					var s = x.status, 
						m = 'Ajax error: ' ; 
					if (s === 0) {
						m += 'Check your network connection.';
					}
					if (s === 404 || s === 500) {
						m += s;
					}
					if (e === 'parsererror' || e === 'timeout') {
						m += e;
					}
					alert(m);
				}
			});
		}());

		// Check hidden input value
		// Sent via Ajax request to jcart.php which decides whether to display the cart checkout button or the PayPal checkout button based on its value
		// We normally check against request uri but Ajax update sets value to relay.php

		// If this is not the checkout the hidden input doesn't exist and no value is set
		var isCheckout = $('#jcart-is-checkout').val();

		function add(form) {
			// Input values for use in Ajax post
			var itemQty = form.find('[name=' + config.item.qty + ']'),
				itemAdd = form.find('[name=' + config.item.add + ']');

			// Add the item and refresh cart display
			$.ajax({
				data: form.serialize() + '&' + config.item.add + '=' + itemAdd.val(),
				success: function(response) {

					// Momentarily display tooltip over the add-to-cart button
					if (itemQty.val() > 0 && tip.css('display') === 'none') {
						tip.fadeIn('100').delay('400').fadeOut('100');
					}

					container.html(response);
					container.find('#subtotal-details').hide();
					$('#jcart-buttons').remove();
				}
			});
		}

		function update(updatedId, newQty) {
			// The id of the item to update
			//var updateId = input.parent().find('[name="jcartItemId[]"]').val();
			
			// qtyID = input.parent().find('.qty').attr('id');
			// updatedId = qtyID.split('-')[1];
			// e.preventDefault();
	        // Get the field name
	        // fieldName = $(this).attr('id');
	        // alert(fieldName);
	        // // Get its current value
	        // var currentVal = parseInt(input.parent().find('#'+qtyID).val());
	        

// alert(currentVal)
	        // // If is not undefined
	        // if (!isNaN(currentVal)) {
	        // 	currentVal++;
	        //     // Increment
	        //     input.parent().find('#'+qtyID).val(currentVal);

	        // } else {
	        //     // Otherwise put a 0 there
	        //     input.parent().find('#'+qtyID).val(0);
	        // }

			// The new quantity
			// var newQty = input.val();

			// As long as the visitor has entered a quantity
			if (newQty) {

				// Update the cart one second after keyup
				var updateTimer = window.setTimeout(function() {

					// Update the item and refresh cart display
					$.ajax({
						data: {
							"jcartUpdate": 1, // Only the name in this pair is used in jcart.php, but IE chokes on empty values
							"itemId": updatedId,
							"itemQty": newQty,
							"jcartIsCheckout": isCheckout,
							"jcartToken": token
						}

					});
				}, 1000);

				//container.find('#subtotal-details').hide();
					
			}



			// If the visitor presses another key before the timer has expired, clear the timer and start over
			// If the timer expires before the visitor presses another key, update the item
			// input.keydown(function(e){
			// 	if (e.which !== 9) {
			// 		window.clearTimeout(updateTimer);
			// 	}	
			// });
		}

		function remove(link) {
			// Get the query string of the link that was clicked
			var queryString = link.attr('href');
			queryString = queryString.split('=');

			// The id of the item to remove
			var removeId = queryString[1];

			// Remove the item and refresh cart display
			$.ajax({
				type: 'GET',
				data: {
					"jcartRemove": removeId,
					"jcartIsCheckout": isCheckout
				}
			});
		}

		// Add an item to the cart
		//$('.jcart').submit(function(e) {
		$(document).on("submit", ".jcart", function (e) {
			//e.preventDefault();
			
			add($(this));

			e.preventDefault();
		});

		// Prevent enter key from submitting the cart
		container.keydown(function(e) {
			if(e.which === 13) {
				e.preventDefault();
			}
		});

		// Update an item in the cart
		container.delegate('.qtyplus', 'click', function(e){
			e.preventDefault();

			qtyID = $(this).parent().find('.qty').attr('id');
			//alert(qtyID)
			updatedId = qtyID.split('-')[1];

	        // // Get its current value
	        var currentVal = parseInt($(this).parent().find('#'+qtyID).val());
	        
	        // If is not undefined
	        if (!isNaN(currentVal) && currentVal != 0) {
	        	currentVal++;
	            // Increment
	            $(this).parent().find('#'+qtyID).val(currentVal);

	        } else {
	            // Otherwise put a 0 there
	            $(this).parent().find('#'+qtyID).val(1);
	        }

			update(updatedId, currentVal);
		});

		container.delegate('.qtyminus', 'click', function(e){
			e.preventDefault();

			qtyID = $(this).parent().find('.qty').attr('id');
			//alert(qtyID)
			updatedId = qtyID.split('-')[1];

	        // // Get its current value
	        var currentVal = parseInt($(this).parent().find('#'+qtyID).val());
	        currentVal--;
	        // If is not undefined
	        if (!isNaN(currentVal) && currentVal != 0) {
	        	
	            // Increment
	            $(this).parent().find('#'+qtyID).val(currentVal);

	        } else {
	            // Otherwise put a 0 there
	            $(this).parent().find('#'+qtyID).val(1);
	        }

			update(updatedId, currentVal);
		});

		// Remove an item from the cart
		container.delegate('.jcart-remove', 'click', function(e){
			remove($(this));
			e.preventDefault();
		});

        container.delegate('#bill-detail', 'click', function(e){
	        e.preventDefault();
	        container.find("#subtotal-details").toggle();
	   	});

        

        // Stop acting like a button

   
    // This button will decrement the value till 0
    /*$(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });*/

	}()); // End JCART namespace

}); // End the document ready function