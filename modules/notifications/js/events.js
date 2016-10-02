//on page laod event handler
$( document ).ready(function() {
    setNotificationsState();
    setSoundpack();
});

//volume change event handler
$( '#volume' ).val(function(){
    var volume = getStorage('volume');
    if(volume == null){
        return setStorage('volume', 100);
    }

    return volume;
});

//volume input changel event handler
$( '#volume' ).change(function(){
    store.set('volume', $( this ).val());
});

//play join sound button event handler
$( '#join-sound' ).click(function(){
    playSound('connected');
});

//play left sound button event handler
$( '#left-sound' ).click(function(){
    playSound('disconnected');
});

//on open sound gallery event handler
$('#sound-gallery').on('show.bs.modal', function (e) {
    var soundpack = getStorage('soundpack');
    
    if(soundpack == null){
        return;
    }

    markThumbnail( $( '#' + getStorage('soundpack') + '-sp' ) );
});

//change notification state event handler
$('#enable-notifications').change(function() {
    setStorage('get-notifications', $(this).prop('checked'));
});

//user join event handler
$(document).bind("user-join", function( handle, data ) {
    createPush(data['event'], data['username']);
});

//user left event handler
$(document).bind("user-left", function( handle, data ) {
    createPush(data['event'], data['username']);
});