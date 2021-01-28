<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-signin-scope" content="profile email">
        <meta name="google-signin-client_id" content="798569669209-elklm6qe6h15vt9vn76fmlajcuqko5f5.apps.googleusercontent.com">
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <script src="<?php echo base_url()?>assets/backend/plugins/jquery/jquery.min.js"></script>
    </head>
    <body>
        <div class="g-signin2" data-onsuccess="onSignIn"></div>
        <script>
            function onSignIn(googleUser) {
                // Useful data for your client-side scripts:
                var profile = googleUser.getBasicProfile();
                var id_token = googleUser.getAuthResponse().id_token;
                var nama = profile.getName();
                var email = profile.getEmail();
                var file = profile.getImageUrl();
                 
                $.ajax({
                    url  : '<?php echo base_url('Auth/Google')?>',
                    type : "POST",
                    data : {nama:nama , email:email, file:file},
                    success: function(data){
                        var hasil = data.split("/-/");
                        window.location = hasil[1];
                    },
                    error: function (){
              
                    }
                });
                return false;
            }
        </script>
   </body>
</html>