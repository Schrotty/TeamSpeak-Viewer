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
        Pace.track(function(){
            $.getJSON({
                data: "json",
                method: "POST",
                url: "lib/GetClientJSON.php"
            }).done(function( data ){
                $( "#viewer-body" ).find("tr").remove();

                var bLeastOne = false;
                var oldData = store.get('tsv_user');
                if(typeof(oldData) == 'undefined'){
                    oldData = new Array();
                }

                var aUsers = [];
                $.each(data, function(index, value) {
                    value.forEach(function(element) {
                        var username = element.toString().split(';')[0]; 
                        aUsers.push(username);
                    }, this);
                }); 

                var sFoundError;
                $.each(data, function(index, value) {
                    if(typeof index != 'undefined'){
                        sFoundError = index;
                    }
                    
                    if(index == "user"){
                        var preChannel = null;
                        value.forEach(function(element) {
                            var arr = element.toString().split(';');
                            if(preChannel != arr[1]){
                                var html = "<tr><td class='client-name first-channel'>" + arr[0] + "</td><td class='first-channel'>" + arr[1]  + "</td></tr>";
                                preChannel = arr[1];
                            }else{
                                var html = "<tr><td class='client-name'>" + arr[0] + "</td><td>" + arr[1]  + "</td></tr>";
                            }  

                            $( "#viewer-body" ).append(html);     
                        }, this);

                        bLeastOne = true;
                    }

                    if(index == "error" || index == 0){
                        $( "#alert-para" ).text(value[0].toString().capitalizeFirstLetter());
                        $( "#alert-panel" ).fadeIn('slow');
                        return;
                    }

                    $( "#alert-panel" ).fadeOut('slow');
                }); 

                if(sFoundError != "error"){
                    findDiffrent(oldData, aUsers);
                    store.set('tsv_user', aUsers);
                }

                if(bLeastOne == false){
                    var html = "<tr><td class='client-name no-user first-channel'>" + getTranslation({
                            language: getStorage('language'),
                            index: 'found-no-user'
                        }) + "</td><td class='no-user first-channel'>-</td></tr>";
                    $( "#viewer-body" ).append(html);  
                }
            });
        });
    }
});
