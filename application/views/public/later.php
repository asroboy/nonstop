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
        <div class="g-signin2" data-onsuccess="onSignIn" style="display:none"></div>
        <a href="<?php echo base_url('Welcome/Logout')?>" onclick="signOut();">Sign out</a>
        <p><?php echo $show['nama']?></p>
        <p><?php echo $show['email']?></p>
        <p><img src="<?php echo $show['file']?>"></p>
        <script>
          function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function () {
              console.log('User signed out.');
            });
          }
        </script>
   </body>
</html>