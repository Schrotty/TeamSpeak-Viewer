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

    if(getParameterByName('lang') != language){
        window.location.replace("/?lang=" + language);
    }
}

function setBackground(){
    var background = getStorage('background');
    if(background == null){
        background = setStorage('background', 'default.jpeg');
    }
    
    $( 'html' ).css( 'background-image', 'url(/img/backgrounds/' + background + ')' );
}

function setSoundpack(){
    var soundpack = getStorage('soundpack');
    
    if(soundpack == null){
        setStorage('soundpack', 'default');
    }
}