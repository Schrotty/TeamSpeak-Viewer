$( document ).ready(function() {
    setBackground();

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

    $( '.thumbnail' ).click(function(){
        var role = $( this ).attr( 'role' );
        var value = $( this ).attr( 'value' );

        if(role == "background"){
            localStorage.setItem("background", value);
            setBackground();
            return;
        }

        store.set('soundpack', value);
    });

    function setBackground(){
        $( 'html' ).css( 'background-image', 'url(' + window.location.href + '/img/backgrounds/' + localStorage.getItem("background") + ')' );
    }
});