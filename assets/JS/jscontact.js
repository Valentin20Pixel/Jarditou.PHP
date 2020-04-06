var ref = document.getElementById("nom");
ref.addEventListener("input", function(event) {
  var verif = /(^[A-Z]+[A-Za-zéèêâîïëûçŒœæ\-\s]+$)/;

  var id = document.getElementById("nom").value;;

  if (!id) {
    document.getElementById("Errnom").textContent="Cette zone est obligatoire.";
    event.preventDefault();
  } else if (!verif.test(id)) {
    document.getElementById("Errnom").textContent="Utilisez que des caractères alphabétiques.";
    event.preventDefault();
  } else {
    document.getElementById("Errnom").textContent="";
  };
});
var ref = document.getElementById("prenom");
ref.addEventListener("input", function(event) {
  var verif = /(^[A-Z]+[A-Za-zéèêâîïëûçŒœæ\-\s]+$)/;

  var id = document.getElementById("prenom").value;;

  if (!id) {
    document.getElementById("Errprenom").textContent="Cette zone est obligatoire.";
    event.preventDefault();
  } else if (!verif.test(id)) {
    document.getElementById("Errprenom").textContent="Utilisez que des caractères alphabétiques.";
    event.preventDefault();
  } else {
    document.getElementById("Errprenom").textContent="";
  };
});
var ref = document.getElementById("naissance");
ref.addEventListener("input", function(event) {
  var verif = /(^[1-2][0-9][0-9][0-9][\-]{1}[0-1][0-9]+[\-]{1}[0-3][0-9]+$)/;

  var id = document.getElementById("naissance").value;;

  if (!id) {
    document.getElementById("Errnaissance").textContent="Cette zone est obligatoire.";
    event.preventDefault();
  } else if (!verif.test(id)) {
    document.getElementById("Errnaissance").textContent="Utilisez que des caractères alphabétiques.";
    event.preventDefault();
  } else {
    document.getElementById("Errnaissance").textContent="";
  };
});
var ref = document.getElementById("code");
ref.addEventListener("input", function(event) {
  var verif = /(^([0-9]{5})$)|^$/;

  var id = document.getElementById("code").value;;

  if (!verif.test(id)) {
    document.getElementById("Errcode").textContent="Utilisez que des caractères numérique au nombre de 5.";
    event.preventDefault();
  } else {
    document.getElementById("Errcode").textContent="";
  };
});
var ref = document.getElementById("adresse");
ref.addEventListener("input", function(event) {
  var verif = /(^[0-9]+[A-za-zéèêâîïëûçŒœæ\-\s]+$)|^$/;

  var id = document.getElementById("adresse").value;;

  if (!verif.test(id)) {
    document.getElementById("Erradrs").textContent="Utilisez que des caractères alphanumériques.";
    event.preventDefault();
  } else {
    document.getElementById("Erradrs").textContent="";
  };
});
var ref = document.getElementById("ville");
ref.addEventListener("input", function(event) {
  var verif = /(^[A-Z]+[A-Za-zéèêâîïëûçŒœæ\-\s]+$)|^$/;

  var id = document.getElementById("ville").value;;

  if (!verif.test(id)) {
    document.getElementById("Errville").textContent="Utilisez que des caractères alphabétiques.";
    event.preventDefault();
  } else {
    document.getElementById("Errville").textContent="";
  };
});
var ref = document.getElementById("mail");
ref.addEventListener("input", function(event) {
  var verif = /(^[A-Za-z0-9éèêâîïëûçŒœæ\-_\.]+@{1}[a-zéèêâîïëûçŒœæ\-_]+[\.]{1}[a-z]+$)/;

  var id = document.getElementById("mail").value;;

  if (!id) {
    document.getElementById("Errmail").textContent="Cette zone est obligatoire.";
    event.preventDefault();
  } else if (!verif.test(id)) {
    document.getElementById("Errmail").textContent="Utilisez que des caractères alphabétiques.";
    event.preventDefault();
  } else {
    document.getElementById("Errmail").textContent="";
  };
});

var ref = document.getElementById("question");
ref.addEventListener("input", function(event) {
  var verif = /([0-9A-Za-zéèêâîïëûçŒœæ\,\.\-\s]+$)/;

  var id = document.getElementById("question").value;;

  if (!id) {
    document.getElementById("Errquestion").textContent="Cette zone est obligatoire.";
    event.preventDefault();
  } else if (!verif.test(id)) {
    document.getElementById("Errquestion").textContent="Utilisez que des caractères alphabétiques.";
    event.preventDefault();
  } else {
    document.getElementById("Errquestion").textContent="";
  };
});