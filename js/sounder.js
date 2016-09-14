function PlaySound(file, folder){
    var sound = new Howl({
        src: [ 'modules/sounds/' + folder + '/' + file + '.mp3'],
        volume: stiore.get('volume') / 100
    });

    sound.play();
}