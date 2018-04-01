function kasutajatyyp() {
    var radios = document.getElementsByName("usertype");
    for (var i=0; i<radios.length; i++) {
        if (radios[i].checked) {
            //alert(radios[i].value + " clicked");
            if (radios[i].value === "arikasutaja") {
                document.getElementById("business1").style.display="block";
                document.getElementById("business2").style.display="block";
                document.getElementById("business3").style.display="block";
            } else if (radios[i].value === "tavakasutaja") {
                document.getElementById("business1").style.display="none";
                document.getElementById("business2").style.display="none";
                document.getElementById("business3").style.display="none";
            }
            break;
        }
    }
}
