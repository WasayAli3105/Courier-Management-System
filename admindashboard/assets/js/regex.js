$(document).ready(function () {

function showError(input, message) {
    $(input).css("border", "2px solid red");
    $(input).next("span").html(message).css({
        "font-weight": "bold",
        "margin-top": "2px",
        "color": "red"
    }).show();
}

function showSuccess(input) {
    $(input).css("border", "2px solid green");
    $(input).next("span").hide();
}

// Name Validation (Only letters & spaces allowed)
$("#name").on("keyup", function () {
    let name = $(this).val();
    let nameRe = /^[A-Za-z\s]+$/;

    if (!nameRe.test(name)) {
        showError(this, "Only letters & spaces allowed!");
    } else if (name.length < 3 || name.length > 20) {
        showError(this, "Name must be between 3-20 characters.");
    } else {
        showSuccess(this);
    }
});

// Email Validation (Improved regex for all valid emails)
$("#email").on("keyup", function () {
    let email = $(this).val();
    let emailRe = /^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/;

    if (!emailRe.test(email)) {
        showError(this, "Enter a valid email (example@domain.com)");
    } else {
        showSuccess(this);
    }
});

// Password Validation
$("#password").on("keyup", function () {
    let password = $(this).val();
    let passwordRe = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%&*])[A-Za-z\d!@#$%&*]{5,15}$/;

    if (!passwordRe.test(password)) {
        showError(this, "Must have uppercase, lowercase, number & special character.");
    } else {
        showSuccess(this);
    }
});

// Parcel Weight Validation
$("#parcelWeight").on("keyup", function () {
    let parcelWeight = $(this).val();
    let weightRe = /^\d{1,5}(\.\d{1,2})?kg$/;

    if (!weightRe.test(parcelWeight)) {
        showError(this, "Enter valid weight (e.g., 10kg, 5.5kg)");
    } else {
        showSuccess(this);
    }
});

// Form Submission Validation
$("form").on("submit", function (e) {
    let isValid = true;

    $("input[required], select[required]").each(function () {
        if ($(this).val().trim() === "") {
            showError(this, "This field is required");
            isValid = false;
        }
    });

    if (!isValid) {
        e.preventDefault(); // Stop form submission if validation fails
        alert("Please correct the errors before submitting.");
    }
});

});

