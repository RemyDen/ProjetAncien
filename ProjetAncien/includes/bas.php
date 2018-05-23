<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- Facebook -->
<script>
    function statusChangeCallback(response) {
        if (response.status === 'connected') {
            console.log('Récupération des informations...');
            FB.api('/me?fields=email,last_name,first_name,name', function (response) {
                console.log('Connecté en tant que ' + response.name);
                console.log(response.email);
                //window.location.reload()
            });
        }
    }

    function init() {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    }

    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1718320808254376',
            xfbml      : true,
            version    : 'v3.0'
        });

        /*init();*/
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Google
<script>
    function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
    };
</script>
-->

</body>
</html>