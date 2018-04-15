function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    var id_token = googleUser.getAuthResponse().id_token;
    //console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    //console.log('Name: ' + profile.getName());
    //console.log('Image URL: ' + profile.getImageUrl());
    //console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.

    var email = profile.getEmail();
    var xhr = new XMLHttpRequest();
    //if (action == 'register') {
    //    xhr.open('POST', 'http://localhost/Codeigniter/index.php/Home/login_google/register');
    //} else {
    xhr.open('POST', 'https://paevakad1.000webhostapp.com/index.php/Home/login_google/');
    //}
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        console.log('Signed in as: ' + xhr.responseText);
        location.href="https://paevakad1.000webhostapp.com/index.php/";
    };
    xhr.send('idtoken=' + id_token + '&email=' + email);
}