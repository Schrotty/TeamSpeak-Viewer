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
        localStorage.setItem("tsv_background_" + window.location.href, newBackground);

        setBackground();
    });

    function setBackground(){
        $( 'html' ).css( 'background-image', 'url(' + window.location.href + '/img/backgrounds/' + localStorage.getItem("tsv_background_" +  window.location.href) + ')' );
    }
});