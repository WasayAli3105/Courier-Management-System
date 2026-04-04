$(document).ready(function(){

    $("#name").on("keyup",function(){
        let name = $(this).val();
        let nameRe = /^[A-Za-z]{3,20}$/;

        if(!nameRe.test(name)){
            $(this).css("border","2px solid red");
            $(this).next("span").html("Enter valid name").css({
                "font-weight":"bold",
                "margin-top":"2px",
                "color":"red"
            })
        }else{
            $(this).css("border","2px solid green");
            $(this).next("span").hide();
        }
    })

    // E-mail
    $("#email").on("keyup",function(){
        let email = $(this).val();
        let mailing = /^[a-z]{3,20}[@][a-z]{5,5}[.][a-z]{3}$/;

        if(!mailing.test(email)){
            $(this).css("border","2px solid red");
            $(this).next("span").html("Enter valid name").css({
                "font-weight":"bold",
                "margin-top":"2px",
                "color":"red"
            })
        }else{
            $(this).css("border","2px solid green");
            $(this).next("span").hide();
        }
    })

    // Password
    $("#password").on("keyup",function(){
        let password = $(this).val();
        let passwordRe = /^(?=.*[A-Za-z])(?=.*\d)([A-Za-z\d]{6,20})$/;

        if(!passwordRe.test(password)){
            $(this).css("border","2px solid red");
            $(this).next("span").html("At least 1 Uppercase & Lowercase").css({
                "font-weight":"bold",
                "margin-top":"2px",
                "color":"red"
            })
        }else{
            $(this).css("border","2px solid green");
            $(this).next("span").hide();
        }
    })

    // Contact
    $("#contact").on("keyup",function(){
        let contact = $(this).val();
        let contactRe = /^{92}{0,9}$/;

        if(!contactRe.test(contact)){
            $(this).css("border","2px solid red");
            $(this).next("span").html("Enter valid name").css({
                "font-weight":"bold",
                "margin-top":"2px",
                "color":"red"
            })
        }else{
            $(this).css("border","2px solid green");
            $(this).next("span").hide();
        }
    })

    // Email
    $("#email").on("keyup",function(){
        let email = $(this).val();
        let mailing = /^[a-z]{3,20}[@][a-z]{5,5}[.][a-z]{3}$/;

        if(!mailing.test(email)){
            $(this).css("border","2px solid red");
            $(this).next("span").html("Enter valid name").css({
                "font-weight":"bold",
                "margin-top":"2px",
                "color":"red"
            })
        }else{
            $(this).css("border","2px solid green");
            $(this).next("span").hide();
        }
    })

    // Parcel Weight
    $("parcelWeight").on("keyup",function(){
        let parcelWeight = $(this).val();
        let weight = /^\d{1,5}(\.\d{1,2})?kg$/;

        if(!weight.test(parcelWeight)){
            $(this).css("border","2px solid red");
            $(this).next(span).html("Follow Pattern").css({
                "font-weight":"bold",
                "margin-top":"2px",
                "color":"red"
            })
        }
    })

        // Required Fields Check
        function checkRequired(id) {
            if ($(id).val().trim() === "") {
                $(id).css("border", "2px solid red");
                $(id).next("div").html("This field is required").css({
                    "color": "red",
                    "font-weight": "bold",
                    "margin-top": "2px"
                });
            }
        }
    
        // Form Submit Validation
        $("form").on("submit", function (e) {
            let isValid = true;
    
            // Check all required fields
            $("input[required], select[required]").each(function () {
                if ($(this).val().trim() === "") {
                    checkRequired(this);
                    isValid = false;
                }
            });
    
            if (!isValid) {
                e.preventDefault(); // Stop form submission if any field is invalid
            }
        });

    // Every Field Is Required
    // function EmtInput(id) {
    //     if ($(id).val() == "") {
    //         $(id).css("border", "1px solid red");
    //         $(id).next('div').html("this field is required to fill").css({
    //             "color": "red",
    //             "font-weigth": "bold",
    //             "margin-top": "2px"

    //         })
    //     }
    // }
    // function EmtInput(id) {
    //     if ($(id).val() == "") {
    //         $(id).css({
    //             "border":"1px solid crimson",
    //             "border-radius":"5px"
    //         });
    //         $(id).next('div').html("this field is required to fill").css({
    //             "color": "red",
    //             "font-weigth": "bold",
    //             "margin-top": "2px"

    //         })
    //     }
    // }


    $("#createAgent").on('click', function () {
        let name = $("#name").val();
        let nameRe = /^[A-Za-z]{3,10}$/;
        let email = $("#email").val();
        let emailRE = /^[\w]{2,}[@][a-z]{5,9}[.][a-z]{3}$/;
        let password = $("#password").val();
        let passwordRE = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[\d])(?=.*[!@#$%&*])[A-Za-z\d!@#$%&*]{8,15}$/;
        let branch = $("#branch").val();
        if (!(name && email && password && branch)) {
            EmtInput("#name");
            EmtInput("#email");
            EmtInput("#password");
            EmtInput("#branch");
        }else if ((!nameRe.test(name)) || (!emailRE.test(email)) || (!passwordRE.test(password)) || (!branch)) {
            alert("data invalid please follow the pattern of every input")
        }
    })
    
})