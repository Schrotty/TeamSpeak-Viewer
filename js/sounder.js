function PlaySound(file, folder){
    var sound = new Howl({
        src: [ 'sounds/' + folder + '/' + file + '.mp3'],
        volume: store.get('volume') / 100
    });

    sound.play();
}