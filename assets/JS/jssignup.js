var signID = document.getElementById("Identifiant");
signID.addEventListener("input", function() {
    var verif = /(^[0-9A-Za-zéèêâîïëûçŒœæ\_\-]+$)/;

    var id = document.getElementById("Identifiant").value;

    if (!id) {
        document.getElementById("ErrSID").textContent = "Cette zone est obligatoire.";
        event.preventDefault();
    } else if (!verif.test(id)) {
        document.getElementById("ErrSID").textContent = "Utilisez que des caractères alphanumériques.";
        event.preventDefault();
    } else {
        document.getElementById("ErrSID").textContent = "";
    };
});
var signPW = document.getElementById("passwd");
signPW.addEventListener("input", function() {
    var verif = /(^[0-9A-Za-zéèêâîïëûçŒœæ\&\/\%\@\.\_\-]+$)/;

    var ps = document.getElementById("passwd").value;

    if (!ps) {
        document.getElementById("ErrSPW").textContent = "Cette zone est obligatoire.";
        event.preventDefault();
    } else if (!verif.test(ps)) {
        document.getElementById("ErrSPW").textContent = "Utilisez que des caractères alphanumériques.";
        event.preventDefault();
    } else {
        document.getElementById("ErrSPW").textContent = "";
    };
});

var signCPW = document.getElementById("confpasswd");
signCPW.addEventListener("input", function() {
    var verif = /(^[0-9A-Za-zéèêâîïëûçŒœæ\&\/\%\@\.\_\-]+$)/;

    var ps = document.getElementById("confpasswd").value;
    if (!ps) {
        document.getElementById("ErrSCPW").textContent = "Cette zone est obligatoire.";
        event.preventDefault();
    } else if (!verif.test(ps)) {
        document.getElementById("ErrSCPW").textContent = "Utilisez que des caractères alphanumériques.";
        event.preventDefault();
    } else {
        document.getElementById("ErrSCPW").textContent = "";
    };
    return ps;
});
$('#Identifiant').tooltip()
$('#passwd').tooltip()
$('#confpasswd').tooltip()
