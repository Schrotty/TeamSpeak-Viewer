$( document ).ready(function() {
    store.set('is-mobile-device', isMobileDevice());

    setLanguage();
    setBackground();
    setTheme(getStorage('theme'));

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

    $( '.lang-option' ).click(function(){
        store.set('language', $( this ).attr( 'value' ));
        setLanguage();
    });

    $( '.theme-option' ).click(function(){
        store.set('theme', $( this ).attr( 'value' ));
        setTheme(getStorage('theme'));
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
        var id = getStorage('background');
        
        if(id == null){
            return;
        }

        var obj = $( '#' + (id.split('.')[0]).split('/')[1] );

        markThumbnail( obj );
        activateNavigation();
    })

    $('#next-page').click(function(){
        nextGalleryPage();
    });

    $('#previous-page').click(function(){
        previousGalleryPage();
    });
});