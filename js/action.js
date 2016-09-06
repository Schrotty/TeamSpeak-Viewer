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
        var newBackground = $( this ).attr( 'value' );
        localStorage.setItem("background", newBackground);

        setBackground();
    });

    function setBackground(){
        $( 'html' ).css( 'background-image', 'url(' + window.location.href + '/img/backgrounds/' + localStorage.getItem("background") + ')' );
    }
});