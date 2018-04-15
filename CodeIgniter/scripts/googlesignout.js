function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
        console.log('User signed out.');
        location.href="http://localhost/Codeigniter/index.php/Home/logout";
    });
}

function onLoad() {
        gapi.load('auth2', function () {
            gapi.auth2.init();
        });
}