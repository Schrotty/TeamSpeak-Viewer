function createPush(action, username){
    if(getStorage('get-notifications') == true || getStorage('get-notifications') == null){
        if(action == "user-left" && getStorage('launch') == true){
            store.set('launch', false);
            return;
        }

        var text = getTranslation({language: getStorage('language'), index: 'notification-' + action});
        if(imageExist(username + '.jpg')){
            Push.create(text, {
                body: username,
                icon: getAppFolder() + 'img/avatars/' + username + '.jpg',
                timeout: 4000,
                onClick: function () {
                    this.close();
                }
            });
        }else{
            Push.create(text, {
                body: username,
                timeout: 4000,
                onClick: function () {
                    this.close();
                }
            });
        }

        if(action == "user-left"){
            PlaySound('disconnected', store.get('soundpack'));
        }else{
            PlaySound('connected', store.get('soundpack'));
        }
    }
}

function imageExist(image){
    var sResult = false;
    $.ajax({
        url: getAppFolder() + 'img/avatars/' + image,
        type: 'POST',
        async: false,
        success: function(data) {
            sResult = data;
        }
    })

    return sResult;
}

function setNotificationsState(){
    var getNotifications = getStorage('get-notifications');

    if(getNotifications == null){
        setStorage('get-notifications', false);
        return;
    }

    if(getNotifications == true){
        $('#enable-notifications').bootstrapToggle('on');
        return;
    }

    $('#enable-notifications').bootstrapToggle('off');
}

function setSoundpack(){
    var soundpack = getStorage('soundpack');
    
    if(soundpack == null){
        setStorage('soundpack', 'default');
    }
}

function playSound(playSound){
    var soundpack = getStorage('soundpack');
    if(soundpack == null){
        soundpack = setStorage('soundpack', 'default');
    }

    PlaySound(playSound, store.get('soundpack'));
}