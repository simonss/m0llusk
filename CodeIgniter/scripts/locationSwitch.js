document.addEventListener('DOMContentLoaded', function() {
   var checkbox = document.querySelector('input[type="checkbox"]');

   checkbox.addEventListener('change', function () {
      if (checkbox.checked) {
          loadTallinn();
      } else {
          loadTartu();
      }

   });
});

function loadTallinn() {
    console.log("Tallinn");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            parseXML(this);
            console.log("request done.");
            location.href="#Tallinn";
        }
    };
    xhttp.open("GET", "https://paevakad1.000webhostapp.com/index.php/Home/ajax_load_tallinn", true);
    xhttp.send();
}

function loadTartu() {
    console.log("Tartu");
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            parseXML(this);
            console.log("request done.");
            location.href="#Tartu";
        }
    };
    xhttp.open("GET", "https://paevakad1.000webhostapp.com/index.php/Home/ajax_load_tartu", true);
    xhttp.send();
}

function parseXML(xml) {

    var parser = new DOMParser();
    var xmlDoc = parser.parseFromString(xml.responseText, "text/xml");
    var result = "";


    var x = xmlDoc.getElementsByTagName("element");
    for (i=0; i<x.length; i++) {
        result += "<div class='col-xs-18 col-sm-6 col-md-3'><div class='thumbnail right-caption span4'><img src='http://placehold.it/120x160' alt=''><div class='caption'><h1>";
        result += x[i].getElementsByTagName("toidunimi")[0].childNodes[0].nodeValue + "&nbsp;&nbsp;&nbsp;&nbsp;";
        result += x[i].getElementsByTagName("hind")[0].childNodes[0].nodeValue + "€</h1><h5> ";
        result += x[i].getElementsByTagName("toidukoht")[0].childNodes[0].nodeValue + " </h5><p>";
        result += x[i].getElementsByTagName("lisainfo")[0].childNodes[0].nodeValue + "</p></div></div></div>";
    }
    document.getElementById("toidud_data").innerHTML = result;

}

function loadCity() {
    var hash;
    if (window.location.href.indexOf('#') > -1)
    {
        hash = window.location.href.split('#')[1];
    }
    if (hash === "Tallinn") {
        document.querySelector('input[type="checkbox"]').checked = true;
        loadTallinn();
    } else {
        loadTartu();
    }
}