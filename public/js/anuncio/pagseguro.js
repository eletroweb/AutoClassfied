$(document).ready(function(){
	$.ajax({
		url: '/pagseguro/startSession',
		dataType: 'json',
		type: 'post',
		data: {_token: $('meta[name="csrf-token"]').attr('content')},
		success: function(data){
			console.log(data[0]);
			PagSeguroDirectPayment.setSessionId(data[0]);
			PagSeguroDirectPayment.onSenderHashReady(function(response){
			    if(response.status == 'error') {
			        console.log(response.message);
			        return false;
			    }

			    hashComprador = response.senderHash; //Hash estará disponível nesta variável.
			    console.log(hashComprador);
			});
			/*PagSeguroDirectPayment.getPaymentMethods({
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
			});*/
		}
	});
	$('#card-number').change(function(){
		if($(this).val().length == 4){
			PagSeguroDirectPayment.getBrand({
				cardBin: document.getElementById('#cartao').value,
					success: function(response) {
						//bandeira encontrada
					},
					error: function(response) {
						//tratamento do erro
					},
					complete: function(response) {
						//tratamento comum para todas chamadas
					}
			});
		}
	});
	$('.tipo_anuncio').change(function(){
		if($(this).val() == 'y'){
			$('#checkoutModal').modal();
		}
	});
});

var hashComprador = '';
