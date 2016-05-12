var page_count = 1;

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
     	table_update();
     });

     $('body').on('click','.pagination a',function(){
		event.preventDefault();
		page_count = $(this).text();
		table_update();
	})
});

var table_update = function(){
	$.ajax({
			type: "GET",
		  	url: "order",
		  	data: 'sort=&' + $('#order-filter-form').serialize() + '&page=' + page_count,
		}).done(function(data) {
			$('#order-table-container').html(data);
		});
}