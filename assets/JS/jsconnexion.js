//  voici mon controle de RegEx coté JS de mon formulaire de connexion
var ID = document.getElementById("login");
ID.addEventListener("input", function(event) {
  var verif = /(^[0-9A-Za-zéèêâîïëûçŒœæ\_\-]+$)/;
  
  var id = document.getElementById("login").value;;
  
  if (!id) {
    document.getElementById("ErrID").textContent="Cette zone est obligatoire.";
    event.preventDefault();
  } else if (!verif.test(id)) {
    document.getElementById("ErrID").textContent="Utilisez que des caractères alphanumériques.";
    event.preventDefault();
  } else {
    document.getElementById("ErrID").textContent="";
  };
});

var pass = document.getElementById("password");
pass.addEventListener("input", function(event) {
  var verif = /(^[0-9A-Za-zéèêâîïëûçŒœæ\.\_\-]+$)/;
  
  var id = document.getElementById("password").value;;
  
  if (!id) {
    document.getElementById("Errpassword").textContent="Cette zone est obligatoire.";
    event.preventDefault();
  } else if (!verif.test(id)) {
    document.getElementById("Errpassword").textContent="Utilisez que des caractères alphanumériques.";
    event.preventDefault();
  } else {
    document.getElementById("Errpassword").textContent="";
  };
});
