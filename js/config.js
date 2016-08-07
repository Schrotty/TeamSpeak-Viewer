function getConfigData(){
    var config = "config";
    $.ajax({
        url: 'config/config.json',
        async: false,
        success: function(data) {
            config = data;
        }
    });

    return config;
}