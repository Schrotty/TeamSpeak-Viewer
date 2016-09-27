$( document ).ready(function() {
    loadLanguage();
    setBackground();

    /* ### Volume Settings ### */
    $( '#volume' ).val(store.get('volume'));

    $( '#volume' ).change(function(){
        store.set('volume', $( this ).val());
    });

    $( '#join-sound' ).click(function(){
        PlaySound('connected', store.get('soundpack'));
    });

    $( '#left-sound' ).click(function(){
        PlaySound('disconnected', store.get('soundpack'));
    });

    $( '#settings-icon' ).click( function(){
        if($( '#settings-panel' ).css( 'display' ) == "none"){
            $( '#settings-panel' ).fadeIn('slow');
            return;
        }

        $( '#settings-panel' ).fadeOut('slow');
    });

    $( '#close-icon' ).click( function(){
        $( '#settings-panel' ).fadeOut('slow');
    });

    $( '.option' ).click(function(){
        store.set('language', $( this ).attr( 'value' ));
        loadLanguage();
    });

    $( '.thumbnail-wrapper' ).click(function(){
        markThumbnail( this );
        var role = $( this ).attr( 'role' );
        var value = $( this ).attr( 'value' );
        var id = $( this ).attr( 'id' );

        if(role == "background"){
            store.set( 'background', value );
            setBackground();
            return;
        }

        store.set('soundpack', value);
    });

    $('#background-gallery').on('show.bs.modal', function (e) {
        var id = store.get( 'background' ).split( '.' )[0];
        var obj = $( '#' + id );

        markThumbnail( obj );
    })

    $('#sound-gallery').on('show.bs.modal', function (e) {
        markThumbnail( $( '#' + store.get( 'soundpack' ) + '-sp' ) );
    })

    function markThumbnail(data){
        $(".thumbnail-wrapper").each(function() {
            $( this ).removeClass( 'marked' ); 
        });

        $( data ).addClass( 'marked' );
    }

    function loadLanguage(){
        if(getParameterByName('lang') != store.get('language')){
            window.location.replace("/?lang=" + store.get('language'));
        }
    }

    function setBackground(){
        $( 'html' ).css( 'background-image', 'url(/img/backgrounds/' + store.get("background") + ')' );
    }
});