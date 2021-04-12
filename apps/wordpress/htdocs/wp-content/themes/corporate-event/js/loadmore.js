jQuery(function($){
	$('body').on('click', '.loadmore', function() {
 
		var button = $(this);
		var data = {
			'action': 'corporate_event_loadmore',
			'page' : corporate_event_loadmore_params.current_page,
		};
 
		$.ajax({
			url : corporate_event_loadmore_params.ajaxurl,
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...');
			},
			success : function( data ) {
				if( data ) { 
					$( 'div.blog-list-block' ).append(data);
					button.text( 'More Posts' );
					corporate_event_loadmore_params.current_page++;
 
					if ( corporate_event_loadmore_params.current_page == corporate_event_loadmore_params.max_page ) { 
						button.remove();
					}
				} else {
					button.remove();
				}
			}
		});
	});
});