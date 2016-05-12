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

     	$.ajax({
			type: "GET",
		  	url: "good",
		  	data: {'good-count': $(this).val()}
		}).done(function(data) {
			$('#good-table-container').html(data);
		});
     });
});

