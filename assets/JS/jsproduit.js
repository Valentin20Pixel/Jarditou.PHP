var ref = document.getElementById("reference");
ref.addEventListener("input", function(event) {
  var verif = /^[0-9A-Za-z\-]+$/;
  
  var id = document.getElementById("reference").value;;
  
  if (!id) {
    document.getElementById("Errref").textContent="Cette zone est obligatoire.";
    event.preventDefault();
  } else if (!verif.test(id)) {
    document.getElementById("Errref").textContent="Utilisez que des caractères alphanumériques en majuscule.";
    event.preventDefault();
  } else {
    document.getElementById("Errref").textContent="";
  };
});



var lib = document.getElementById("libelle");
lib.addEventListener("input", function(event) {
  var verif = /^[0-9A-Za-zéèêâîïëûçŒœæ\-\s]+$/;
  
  var id = document.getElementById("libelle").value;;
  
  if (!id) {
    document.getElementById("Errlib").textContent="Cette zone est obligatoire.";
    event.preventDefault();
  } else if (!verif.test(id)) {
    document.getElementById("Errlib").textContent="Utilisez que des caractères alphanumériques.";
    event.preventDefault();
  } else {
    document.getElementById("Errlib").textContent="";
  };
});

var des = document.getElementById("description");
des.addEventListener("input", function(event) {
  var verif = /^[0-9A-Za-zéèêâîïëûçŒœæ\!\?\;\.\,\-\s]+$/;
  
  var id = document.getElementById("description").value;;
  
  if (!id) {
    document.getElementById("Errdes").textContent="Cette zone est obligatoire.";
    event.preventDefault();
  } else if (!verif.test(id)) {
    document.getElementById("Errdes").textContent="Utilisez que des caractères alphanumériques.";
    event.preventDefault();
  } else {
    document.getElementById("Errdes").textContent="";
  };
});

var pri = document.getElementById("prix");
pri.addEventListener("input", function(event) {
  var verif = /(^[0-9]+(\.[0-9]{1,2})?$)/;
  
  var id = document.getElementById("prix").value;;
  
  if (!id) {
    document.getElementById("Errpri").textContent="Cette zone est obligatoire.";
    event.preventDefault();
  } else if (!verif.test(id)) {
    document.getElementById("Errpri").textContent="Utilisez que des caractères numériques.";
    event.preventDefault();
  } else {
    document.getElementById("Errpri").textContent="";
  };
});

var sto = document.getElementById("stock");
sto.addEventListener("input", function(event) {
  var verif = /(^[0-9]+$)/;
  
  var id = document.getElementById("stock").value;;
  
  if (!id) {
    document.getElementById("Errsto").textContent="Cette zone est obligatoire.";
    event.preventDefault();
  } else if (!verif.test(id)) {
    document.getElementById("Errsto").textContent="Utilisez que des caractères numériques.";
    event.preventDefault();
  } else {
    document.getElementById("Errsto").textContent="";
  };
});

var cou = document.getElementById("couleur");
cou.addEventListener("input", function verif(event) {
  var verif = /^[A-Za-zéèêâîïëûçŒœæ\-\s]+$/;
  
  var id = document.getElementById("couleur").value;;
  
  if (!id) {
    document.getElementById("Errcou").textContent="Cette zone est obligatoire.";
    event.preventDefault();
  } else if (!verif.test(id)) {
    document.getElementById("Errcou").textContent="Utilisez que des caractères numériques.";
    event.preventDefault();
  } else {
    document.getElementById("Errcou").textContent="";
  };
});

var cat = document.getElementById("categorie");
cat.addEventListener("change", function(event) {
  var verif = /(^[0-9]+$)/;
  
  var id = document.getElementById("categorie").checked;;
  
  if (!id) {
    document.getElementById("Errcat").textContent="Cette zone est obligatoire.";
    event.preventDefault();
  } else {
    document.getElementById("Errcat").textContent="";
  };
});
