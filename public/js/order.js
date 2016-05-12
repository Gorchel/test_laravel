jQuery( document ).ready(function() {
    $('body').on('click','.order-sort',function(){
    	var sort = $(this).data('id');

    	$.ajax({
			type: "GET",
		  	url: "order",
		  	data: 'sort=' + sort + '&' + $('#order-filter-form').serialize()
		}).done(function(data) {
			$('#order-table-container').html(data);
		});
    });

     $('body').on('click','#order-filter-submit',function(){
     	$.ajax({
			type: "GET",
		  	url: "order",
		  	data: 'sort=&' + $('#order-filter-form').serialize()
		}).done(function(data) {
			$('#order-table-container').html(data);
		});
     });
});