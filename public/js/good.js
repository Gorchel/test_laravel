var page_count = 1;

jQuery( document ).ready(function() {
	$('body').on('click','.good-sort',function(){
    	var sort = $(this).data('id');

    	$.ajax({
			type: "GET",
		  	url: "good",
		  	data: {
		  		'good-count': $('#good-row-count').val(),
		  		'sort': sort
		  	}
		}).done(function(data) {
			$('#good-table-container').html(data);
		});
    });

	$('body').on('change','#good-row-count',function(){
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
	  	url: "good",
	  	data: 'good-count=' + $('#good-row-count').val() + '&page=' + page_count,
	}).done(function(data) {
		$('#good-table-container').html(data);
	});
}