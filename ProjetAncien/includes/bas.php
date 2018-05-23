<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- Facebook -->
<script>
    var user = {userId : "", accessToken : "", firstName : "", lastName : "",  email : ""};

    function logIn() {
        FB.login(function (response) {
            console.log(response);
            if(response.status == "connected") {
                user.userId = response.authResponse.userID;
                user.accessToken = response.authResponse.accessToken;

                FB.api('/me',{fields:'first_name,last_name,email'}, function (userData) {

                    user.firstName = userData.first_name;
                    user.lastName = userData.last_name;
                    user.email = userData.email;

                    $.ajax({
                        url: "index.php",
                        method: "POST",
                        data: user,
                        dataType: "text",
                        success: function (ServerResponse, status) {
                            if(status == "success")
                                window.location = "index.php";
                        }
                    })

                });
            }
        }, {scope: 'public_profile, email'})
    }

    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1416192188527534',
            xfbml      : true,
            version    : 'v3.0'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Google -->
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

</body>
</html>