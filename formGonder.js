function formGonder() {
    document.getElementById("isFormCleared").innerHTML = "";
    var form = document.getElementById("iletisim-form");
    var usernameGirdi = document.getElementById("inputUsername");
    var emailGirdi = document.getElementById("staticEmail");
    var sifreGirdi = document.getElementById("inputPassword");
    var adresGirdi = document.getElementById("inputAddress");
    var nameIsValid = true;
    var mailIsValid = true;
    var passIsValid = true;
    var secimIsValid = true;
    var adresIsValid = true;

    if (!usernameGirdi.checkValidity()) {
        nameIsValid = false;
        document.getElementById("username-error-message").style.color = "red";
        document.getElementById("username-error-message").innerHTML = "Lütfen kullanıcı adı giriniz.";
    }
    else {
        var usernameRegex = /^[a-zA-Z0-9]+$/;
        if (!usernameGirdi.value.match(usernameRegex)) {
            nameIsValid = false;
            document.getElementById("username-error-message").style.color = "red";
            document.getElementById("username-error-message").innerHTML = "Kullanıcı adı özel karakter içeremez.";
        }
        else {
            nameIsValid = true;
            document.getElementById("username-error-message").style.color = "green";
            document.getElementById("username-error-message").innerHTML = "Kullanıcı adı uygun.";
        }
    }

    if (!emailGirdi.checkValidity()) {
        mailIsValid = false;
        document.getElementById("email-error-message").style.color = "red";
        document.getElementById("email-error-message").innerHTML = "Lütfen email giriniz.";
    }
    else {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailGirdi.value.match(emailRegex)) {
            mailIsValid = false;
            document.getElementById("email-error-message").style.color = "red";
            document.getElementById("email-error-message").innerHTML = "Email adresinin formatı yanlış.";
        }
        else {
            mailIsValid = true;
            document.getElementById("email-error-message").style.color = "green";
            document.getElementById("email-error-message").innerHTML = "Email adresi uygun.";
        }
    }

    if (!sifreGirdi.checkValidity()) {
        passIsValid = false;
        document.getElementById("password-error-message").style.color = "red";
        document.getElementById("password-error-message").innerHTML = "Lütfen şifre giriniz.";
    }
    else {
        if (sifreGirdi.value.length < 8) {
            passIsValid = false;
            document.getElementById("password-error-message").style.color = "red";
            document.getElementById("password-error-message").innerHTML = "Şifreniz 8 karakter uzunluğunda olmalı.";
        }
        else {
            passIsValid = true;
            document.getElementById("password-error-message").style.color = "green";
            document.getElementById("password-error-message").innerHTML = "Şifre uygun.";
        }
    }

    if (document.getElementById("sehirSec").selectedIndex == 0) {
        secimIsValid = false;
        document.getElementById("secim-error-message").style.color = "red";
        document.getElementById("secim-error-message").innerHTML = "Şehir seçiniz.";
    }
    else {
        secimIsValid = true;
        document.getElementById("secim-error-message").innerHTML = "";
    }

    if (!adresGirdi.checkValidity()) {
        adresIsValid = false;
        document.getElementById("address-error-message").style.color = "red";
        document.getElementById("address-error-message").innerHTML = "Lütfen adres giriniz.";
    }
    else {
        adresIsValid = true;
        document.getElementById("address-error-message").innerHTML = "";
    }

    var radioButtons = document.getElementsByName("inlineRadioOptions");
    var radioButtonChecked = false;

    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked) {
            radioButtonChecked = true;
            break;
        }
    }

    if (radioButtonChecked) {
        document.getElementById("radio-error-message").innerHTML = "";
    }
    else {
        document.getElementById("radio-error-message").style.color = "red";
        document.getElementById("radio-error-message").innerHTML = "En az bir tanesini işaretlemeniz gerekiyor.";
    }


    if (nameIsValid && mailIsValid && passIsValid && secimIsValid && adresIsValid && radioButtonChecked) {
        form.submit();
    }
}