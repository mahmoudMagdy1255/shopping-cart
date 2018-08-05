$(function() {
	
var stripe = Stripe('pk_test_x6eGxz83EoHQaBRSSofj1kUp');

var element = stripe.elements();

var card = element.create('card');

card.mount('#card-element');

$(card).css({
	color : '#32325d',
	fontFamily: 'Helvetica Neue, Helvetica, sans-serif',
	fontSmoothing:'antialiased',
	fontSize : '16px',
	'::placeholder':{
		color : '#aab7c4',
	}
});

var displayError = $('#card-errors');

$(card).on('change', function(event) {
	
	if (event.error) {
		displayError.text(event.error.message);
	}else {
		displayError.text('');
	}

});


var form = $('#checkout-form');

form.on('submit', function(event) {
	

	event.preventDefault();
	
	form.find('#button').prop('disabled' , true);

		stripe.createToken(card).then(function(result){
		
		if (result.error) {
			displayError.text(result.error.message);
		}else {

			stripeTokenHandler(result.token);
		}

	});

});

function stripeTokenHandler(token) {
	
	form.find('#button').prop('disabled' , false);

	var token = token.id;

	form.append( $('<input type ="hidden" name="token" >').val(token) );

	form.get(0).submit();

}

});