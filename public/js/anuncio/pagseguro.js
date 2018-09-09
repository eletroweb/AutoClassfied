$(document).ready(function(){
	$.ajax({
		url: '/pagseguro/startSession',
		dataType: 'json',
		type: 'post',
		data: {_token: $('meta[name="csrf-token"]').attr('content')},
		success: function(data){
			console.log(data[0]);
			PagSeguroDirectPayment.setSessionId(data[0]);
			PagSeguroDirectPayment.getPaymentMethods({
				amount: 50.00,
				success: function(response) {
					console.log(response);
				},
				error: function(response) {
					console.log(response);
				},
				complete: function(response) {
					//console.log(response);
				}
			});
		}
	})
});

var hashComprador = '';
