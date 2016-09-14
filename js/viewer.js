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
                url: "lib/Viewer.php"
            }).done(function( data ){
                $( "#viewer-body" ).find("tr").remove();

                var oldData = store.get('tsv_user');

                var aUsers = [];
                $.each(data, function(index, value) {
                    value.forEach(function(element) {
                        var username = element.toString().split(';')[0]; 
                        aUsers.push(username);
                    }, this);
                }); 

                findDiffrent(oldData, aUsers);
                store.set('tsv_user', aUsers);

                $.each(data, function(index, value) {
                    if(index == "user"){
                        value.forEach(function(element) {
                            var arr = element.toString().split(';');     
                            var html = "<tr><td class='client-name'>" + arr[0] + "</td><td>" + arr[1]  + "</td></tr>";

                            $( "#viewer-body" ).append(html);     
                        }, this);
                        
                        return;
                    }

                    $( "#alert-para" ).text(value[0].toString().capitalizeFirstLetter());
                    $( "#alert-panel" ).fadeIn('slow');
                }); 
            });
        });
    }

    function findDiffrent(oldData, newData){
        $.each(oldData, function(index, value){
            var username = value.toString().split(';')[0];
            if(newData.indexOf(username) == -1){
                createPush("left", "User Left:", username);
            }
        });

        $.each(newData, function(index, value){
            var username = value.toString().split(';')[0];
            if(oldData.indexOf(username) == -1){
                createPush("join", "User Joined:", username);
            }
        });
    }

    function createPush(action, text, username){
        Push.create(action, {
            body: username,
            timeout: 4000,
            onClick: function () {
                this.close();
            }
        });

        if(action == "left"){
            //PlaySound('disconnected', store.get('soundpack'));
        }else{
            //PlaySound('connected', store.get('soundpack'));
        }
    }
});