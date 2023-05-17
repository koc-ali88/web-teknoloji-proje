function formTemizle() {
    var form = document.getElementById("iletisim-form");
    form.reset();
    document.getElementById("username-error-message").innerHTML = "";
    document.getElementById("email-error-message").innerHTML = "";
    document.getElementById("password-error-message").innerHTML = "";
    document.getElementById("secim-error-message").innerHTML = "";
    document.getElementById("address-error-message").innerHTML = "";
    document.getElementById("radio-error-message").innerHTML = "";
    document.getElementById("isFormCleared").style.color = "red";
    document.getElementById("isFormCleared").innerHTML = "Form temizlendi!";
}