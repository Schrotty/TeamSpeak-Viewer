$( document ).ready(function() {
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

    /* ### Gallery Settings ### */
    /*$('#background-gallery').on('shown.bs.modal', function () {
        $.ajax({
            url: 'lib/Gallery.php',
            async: false,
            success: function(data) {
                $( '#gallery-body' ).empty(); 
                $( '#gallery-body' ).append(data);
            }
        });
    })*/

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