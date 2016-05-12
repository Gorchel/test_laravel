jQuery( document ).ready(function() {
    $('body').on('click','.order-sort',function(){
    	var handler = $(this).data('id');
    	var rowCount = $('#order-filter-order-count').val();

    	$.ajax({
			type: "GET",
		  	url: "order",
		  	data: {handler: handler,rowCount:rowCount}
		}).done(function(data) {
			alert(data);
		});
    });

     $('body').on('click','#order-filter-submit',function(){
     	$.ajax({
			type: "GET",
		  	url: "order",
		  	data: $('#order-filter-form').serialize()
		}).done(function(data) {
			$('#order-table-container').html(data);
		});
     });
});