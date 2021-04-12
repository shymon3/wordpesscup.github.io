jQuery(document).ready(function($) {
    $( '.corporate-event-install-plugins' ).click( function ( e ) {
        e.preventDefault();

        $( this ).addClass( 'updating-message' );
        $( this ).text( corporate_event_adi_install.btn_text );

        $.ajax({
            type: "POST",
            url: ajaxurl,
            data: {
                action     : 'corporate_event_getting_started',
                security : corporate_event_adi_install.nonce,
                slug : 'advanced-import',
                filename : 'advanced-import',
                request : 1
            },
            
            success:function( response ) {
                setTimeout(function(){
                    $.ajax({
                        type: "POST",
                        url: ajaxurl,
                        data: {
                            action     : 'corporate_event_getting_started',
                            security : corporate_event_adi_install.nonce,
                            slug : 'wp-event-partners',
                            filename : 'wpeventpartners',
                            request : 2
                        },
                        success:function( response ) {
                            setTimeout(function(){

                                $.ajax({
                                    type: "POST",
                                    url: ajaxurl,
                                    data: {
                                        action     : 'corporate_event_getting_started',
                                        security : corporate_event_adi_install.nonce,
                                        slug : 'wep-demo-import',
                                        filename : 'wep-demo-import',
                                        request : 3
                                    },
                                    success:function( response ) {

                                        var extra_uri, redirect_uri, dismiss_nonce;
                                        redirect_uri = corporate_event_adi_install.adminurl+'/themes.php?page=advanced-import&browse=all';
                                        window.location.href = redirect_uri;

                                    },
                                    error: function( xhr, ajaxOptions, thrownError ){
                                        console.log(thrownError);
                                    }
                                } );
                            }, 2000 );

                        },
                        error: function( xhr, ajaxOptions, thrownError ){
                            console.log(thrownError);
                        }
                    } );
                    

                }, 2000 );
            },
                       
            error: function( xhr, ajaxOptions, thrownError ){
                console.log(thrownError);
            }
        });
    } );
} );