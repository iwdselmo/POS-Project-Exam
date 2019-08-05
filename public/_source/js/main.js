$(function(){
	

	var utils ={

		init: function(){
			utils.ui.init();
		},
		ui:{
			init: function(){
				utils.ui.posClick();
				utils.ui.couponCode();
			},
			posClick: function(){
				$('ul.product-lists-card li.products-card').each(function(i){
					$(this).on('click', function(){
						var main = $(this);
						var name = $(this).data('name');
						var id = $(this).data('id');
						var price = $(this).data('price');
						var vat = $(this).data('vat');
						
						$('.cart-list').append('<div data-id="'+id+'" class="cart-item row" data-vat="'+vat+'" data-total="'+price+'"><div class="col-md-6">'+name+'</div><div class="col-md-6">₱ '+price+'</div></div>');
						var total = 0;
						$('.cart-list .cart-item').each(function(i, price){
							var price = $(this).data('total');

							total = total += parseInt(price);
						});

						var vatTotal = 0;
						$('.cart-list .cart-item').each(function(i, vat){
							var vat = $(this).data('vat');

							vatTotal = vatTotal += parseFloat(vat);
						});

						var items = [];
						$('.cart-list .cart-item').each(function(i){
							var id = $(this).data('id');

							items.push(id);
						});

						$('form#cart input.vat').val(vatTotal);
						$('form#cart input.total').val(total);
						$('form#cart input.items').val(items);
						$('.cart-total').text('₱ '+total);
					});
				});
			},
			couponCode: function(){
				$('a.calculate').on('click', function(e){
					e.preventDefault();
					var code = $('form#cart input.code').val();
					$.ajax({
						type: 'GET',
						url: '/check-code',
						data: {code:code},
						success: function(data){
							console.log(data);
							if(data == 'false'){
								alert('PROMO CODE DOESNT EXIST');
							}else{
								var percent = parseFloat(data) / 100;
								var initialTotal = $('form#cart input.total').val();
								var initialVat = $('form#cart input.vat').val();

								var midTotal = initialTotal * percent;
								var midVat = initialVat * percent;

								var finalTotal = initialTotal - midTotal;
								var finalVat = initialVat - midVat;

								$('form#cart input.vat').val(finalVat);
								$('form#cart input.total').val(finalTotal);
								$('.cart-total').text('₱ '+finalTotal);
							}
						}
					});
				});
			}
		}
	};

	utils.init();
	
});



