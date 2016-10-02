$( document ).ready(function() {
    setLanguage();
    setBackground();
    setSoundpack();

    /* ### Volume Settings ### */
    $( '#volume' ).val(function(){
        var volume = getStorage('volume');
        if(volume == null){
            return setStorage('volume', 100);
        }

        return volume;
    });

    $( '#volume' ).change(function(){
        store.set('volume', $( this ).val());
    });

    $( '#join-sound' ).click(function(){
        playSound('connected');
    });

    $( '#left-sound' ).click(function(){
        playSound('disconnected');
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
        setLanguage();
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

        var obj = $( '#' + id.split('.')[0] );

        markThumbnail( obj );
        activateNavigation();
    })

    $('#sound-gallery').on('show.bs.modal', function (e) {
        var soundpack = getStorage('soundpack');
        
        if(soundpack == null){
            return;
        }

        markThumbnail( $( '#' + getStorage('soundpack') + '-sp' ) );
    })

    $('#next-page').click(function(){
        nextGalleryPage();
    });

    $('#previous-page').click(function(){
        previousGalleryPage();
    });
});