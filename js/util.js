String.prototype.capitalizeFirstLetter = function() {
    return this.charAt(0).toUpperCase() + this.slice(1);
}

window.paceOptions = {
    ajax: {
        trackMethods: ['GET', 'POST']
    }
}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function playSound(playSound){
    var soundpack = getStorage('soundpack');
    if(soundpack == null){
        soundpack = setStorage('soundpack', 'default');
    }

    PlaySound(playSound, store.get('soundpack'));
}

function getStorage(index){
    var value;

    try {
        value = store.get( index );
    }
    catch(err) {
        value = null;
    }

    return value;
}

function setStorage(index, value){
    store.set(index, value);

    return value;
}

function markThumbnail(data){
    $(".thumbnail-wrapper").each(function() {
        $( this ).removeClass( 'marked' ); 
    });

    $( data ).addClass( 'marked' );
}

function setLanguage(){
    var language = getStorage('language');
    if(language == null){
        language = setStorage('language', 'en');
    }

    var lang = getParameterByName('lang');
    if(lang != language){
        var appFolder = getAppFolder();
        if(appFolder != '/'){
            var shortAppFolder = appFolder.substring(0, appFolder.length - 1);
            window.location.replace( shortAppFolder + "?lang=" + language);
            return;
        }

        window.location.replace("?lang=" + language);
    }
}

function setBackground(){
    var background = getStorage('background');
    if(background == null){
        background = setStorage('background', 'default.jpeg');
    }
    
    $( 'html' ).css( 'background-image', 'url(' + getAppFolder() + 'img/backgrounds/' + background + ')' );
}

function setSoundpack(){
    var soundpack = getStorage('soundpack');
    
    if(soundpack == null){
        setStorage('soundpack', 'default');
    }
}

function getAppFolder(){
    var path = location.pathname.split('/');
    if (path[path.length-1].indexOf('.php')>-1) {
        path.length = path.length - 1;
    }

    return path.join('/');
}

function nextGalleryPage(){
    var iCurrentPage = $( '.active-page' ).attr( 'id' );

    console.log(iCurrentPage);

    $.each($( '.gallery-page' ), function() {
        var id = $( this ).attr( 'id' );
        if(parseInt(id) - parseInt(1) == parseInt(iCurrentPage)){
            $( '#' + iCurrentPage ).removeClass('active-page');
            $( '#' + id ).addClass('active-page');
        }

        if(parseInt(id) == $( '.gallery-page' ).length){
            $( '#next-page' ).addClass('disabled');
            $( '#previous-page' ).removeClass('disabled');
        }
    })
}

function previousGalleryPage(){
    var iCurrentPage = $( '.active-page' ).attr( 'id' );

    console.log(iCurrentPage);

    $.each($( '.gallery-page' ), function() {
        var id = $( this ).attr( 'id' );
        if(parseInt(id) + parseInt(1) == parseInt(iCurrentPage)){
            $( '#' + iCurrentPage ).removeClass('active-page');
            $( '#' + id ).addClass('active-page');
        }

        if(parseInt(id) == $( '.gallery-page' ).length - parseInt(id)){
            $( '#next-page' ).removeClass('disabled');
            $( '#previous-page' ).addClass('disabled');
        }
    })
}

function activateNavigation(){
    var pages = $( '.gallery-page' );
    console.log(pages.length);
    if(pages.length > 1){
        $( '.gallery-nav' ).css( 'display', 'block' );
    }
}

function getTranslation(language, index, type = null){
    var sResult = null;
    $.ajax({
        url: 'lib/Translation.php',
        type: 'POST',
        async: false,
        data:{
            lang: language,
            index: index,
            info: type
        },
        success: function(data) {
            sResult = data;
        }
    })

    return sResult;
}