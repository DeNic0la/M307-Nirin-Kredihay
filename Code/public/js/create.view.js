window.addEventListener("load", function(){
    let form = document.getElementById("createForm");

    form.addEventListener('submit', function(e){
        let prename = document.getElementById("prename");
        let lastname = document.getElementById("lastname");
        let email = document.getElementById("email");
        let tel = document.getElementById("tel");
        let rate = document.getElementById("rate");
        let package = document.getElementById("package");

        let Errors = [];
        trimField(prename);
        trimField(lastname);
        trimField(email);
        trimField(tel);
        trimField(rate);
        let hasErrors = false;

        if (prename.value.length < 1){
            hasErrors = true
            document.getElementById("error-prename").innerHTML = 'Der Vorname darf nicht Leer sein';
        }
        if (lastname.value.length < 1){
            hasErrors = true
            document.getElementById("error-lastname").innerHTML = 'Der Nachname darf nicht Leer sein';
        }
        if (email.value.length < 1|| !email.value.includes('@')){
            hasErrors = true
            document.getElementById("error-email").innerHTML = 'Bitte geben sie eine gültige E-Mail adresse ein';
        }
        if (rate.value.length < 1|| isNaN(rate.value) ||parseInt(rate.value)>10||parseInt(rate.value)<1){
            hasErrors = true
            document.getElementById("error-rate").innerHTML = 'Bitte geben sie einene gültige Rate ein (1-10)';
        }
        if (rate.value.length > 0 && !tel.value.match(/[0-9+ ()-]/)){
            hasErrors = true
            document.getElementById("error-tel").innerHTML = 'Die eingegebene Telefonnummer ist in einem ungültigen Format';
        }
        if (isNaN(package.value)){
            hasErrors = true
            document.getElementById("error-package").innerHTML = 'Wählen sie ein Packet aus';
        }
        if (hasErrors){
            e.preventDefault();
        }

    })
});

function trimField(field){
    field.value = field.value.trim();
}