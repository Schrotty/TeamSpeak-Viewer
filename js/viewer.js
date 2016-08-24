$( document ).ready(function() {
    var refreshRateInSeconds = 20;

    loadViewerData()
    window.setInterval(function(){
        loadViewerData();
    }, refreshRateInSeconds * 1000);

    $( '#refresh-icon' ).click(function(){
        loadViewerData();
    });

    function loadViewerData(){
        $.ajax({
            data: "json",
            method: "POST",
            url: "lib/Viewer.php"
        }).done(function( data ){
            var obj = jQuery.parseJSON(data);

            $.each(obj, function(index, value) {
                if(index == "user"){
                    $( "#viewer-body" ).find("tr").remove();
                    $( "#viewer-body" ).append(value);
                    return;
                }

                $( "#alert-para" ).text(value[0].toString().capitalizeFirstLetter());
                $( "#alert-panel" ).fadeIn('slow');
            }); 
        });
    }
});