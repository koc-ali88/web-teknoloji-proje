function formGonderQuery() {
    $("#isFormCleared").html("");
    var form = $("#iletisim-form");
    var usernameGirdi = $("#inputUsername");
    var emailGirdi = $("#staticEmail");
    var sifreGirdi = $("#inputPassword");
    var adresGirdi = $("#inputAddress");
    var nameIsValid = true;
    var mailIsValid = true;
    var passIsValid = true;
    var secimIsValid = true;
    var adresIsValid = true;

    if (!usernameGirdi[0].checkValidity()) {
        nameIsValid = false;
        $("#username-error-message").css("color", "red");
        $("#username-error-message").html("Lütfen kullanıcı adı giriniz.");
    } else {
        var usernameRegex = /^[a-zA-Z0-9]+$/;
        if (!usernameGirdi.val().match(usernameRegex)) {
            nameIsValid = false;
            $("#username-error-message").css("color", "red");
            $("#username-error-message").html("Kullanıcı adı özel karakter içeremez.");
        } else {
            nameIsValid = true;
            $("#username-error-message").css("color", "green");
            $("#username-error-message").html("Kullanıcı adı uygun.");
        }
    }

    if (!emailGirdi[0].checkValidity()) {
        mailIsValid = false;
        $("#email-error-message").css("color", "red");
        $("#email-error-message").html("Lütfen email giriniz.");
    } else {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailGirdi.val().match(emailRegex)) {
            mailIsValid = false;
            $("#email-error-message").css("color", "red");
            $("#email-error-message").html("Email adresinin formatı yanlış.");
        } else {
            mailIsValid = true;
            $("#email-error-message").css("color", "green");
            $("#email-error-message").html("Email adresi uygun.");
        }
    }

    if (!sifreGirdi[0].checkValidity()) {
        passIsValid = false;
        $("#password-error-message").css("color", "red");
        $("#password-error-message").html("Lütfen şifre giriniz.");
    } else {
        if (sifreGirdi.val().length < 8) {
            passIsValid = false;
            $("#password-error-message").css("color", "red");
            $("#password-error-message").html("Şifreniz 8 karakter uzunluğunda olmalı.");
        } else {
            passIsValid = true;
            $("#password-error-message").css("color", "green");
            $("#password-error-message").html("Şifre uygun.");
        }
    }

    if ($("#sehirSec").prop("selectedIndex") == 0) {
        secimIsValid = false;
        $("#secim-error-message").css("color", "red");
        $("#secim-error-message").html("Şehir seçiniz.");
    } else {
        secimIsValid = true;
        $("#secim-error-message").html("");
    }

    if (!adresGirdi[0].checkValidity()) {
        adresIsValid = false;
        $("#address-error-message").css("color", "red");
        $("#address-error-message").html("Lütfen adres giriniz.");
    } else {
        adresIsValid = true;
        $("#address-error-message").html("");
    }

    var radioButtons = $("input[name='inlineRadioOptions']");
    var radioButtonChecked = false;

    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked) {
            radioButtonChecked = true;
            break;
        }
    }

    if (radioButtonChecked) {
        $("#radio-error-message").html("");
    } else {
        $("#radio-error-message").css("color", "red");
        $("#radio-error-message").html("En az bir tanesini işaretlemeniz gerekiyor.");
    }

    if (nameIsValid && mailIsValid && passIsValid && secimIsValid && adresIsValid && radioButtonChecked) {
        form.submit();
    }
}
