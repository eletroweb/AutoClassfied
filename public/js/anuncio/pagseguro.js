$(document).ready(function(){
	$('#checkoutModal').on('show.bs.modal', function (e) {
		  $.ajax({
			url: '/pagseguro/startSession',
			dataType: 'json',
			type: 'post',
			data: {_token: $('meta[name="csrf-token"]').attr('content')},
			success: function(data){
				console.log(data[0]);
				PagSeguroDirectPayment.setSessionId(data[0]);
				PagSeguroDirectPayment.onSenderHashReady(function(response){
					if(response != undefined){
						if(response.status == 'error') {
					        console.log(response.message);
					        return false;
					    }

					    hashComprador = response.senderHash; //Hash estará disponível nesta variável.
					    console.log(hashComprador);
					}

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
	});
	$('#cartao').mask('0000-0000-0000-0000');
	$('#month').mask('00');
	$('#year').mask('0000');
	$('#cartao').keyup(function(){
		console.log('Caiu card-number');
		if($(this).cleanVal().length >= 5){
			console.log($(this).cleanVal().length+' <==> ');
			PagSeguroDirectPayment.getBrand({
				cardBin: $(this).cleanVal(),
					success: function(response) {
						//bandeira encontrada
						bin_bandeira = response.bin;
					},
					error: function(response) {
						//tratamento do erro
						console.log(response);
					},
					complete: function(response) {
						//tratamento comum para todas chamadas
						console.log(response);
					}
			});
		}
	});
	$('.tipo_anuncio').change(function(){
		if($(this).val() == 'y'){
			$('#checkoutModal').modal();
		}
	});
	$('#btnPagar').click(function(){
		//console.log('Olá mundo');
		//if ($('#cartao').val().length == 20 && $('#cvv').val().length > 2 && $('#month').val().length == 2 && $('#year').val().length == 0 ) {
			var param = {
			    cardNumber: $('#cartao').cleanVal(),
			    brand: bin_bandeira,
			    cvv: $('#cvv').val(),
			    expirationMonth: $('#month').val(),
			    expirationYear: $('#year').val(),
			    success: function(response) {
			        //token gerado, esse deve ser usado na chamada da API do Checkout Transparente
			        //var result = PagSeguroDirectPayment.createCardToken(param); //Uso esse token no post da transacao
							console.log(response.card.token);
							$('#card-token').val(response.card.token);
							//console.log(result.card.token);
			    },
			    error: function(response) {
			        //tratamento do erro
			        console.log(response);
			    },
			    complete: function(response) {
			        //tratamento comum para todas chamadas
			        console.log(response);
			    }
			}
			PagSeguroDirectPayment.createCardToken(param);
		//}
	});
});
var bin_bandeira = '';
var hashComprador = '';
