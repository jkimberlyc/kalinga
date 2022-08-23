const container = document.querySelector(".container-login"),
    pwShowHide = document.querySelectorAll(".showHidePw"),
    pwFields = document.querySelectorAll(".password"),
    signUp = document.querySelector(".signup-link"),
    login = document.querySelector(".login-link");
// patientForm = document.querySelector(".patientForm"),
// doctorForm = document.querySelector(".doctorForm"),
// ask= document.querySelector(".ask"),
// doctorSignup= document.querySelector(".doctorSignup"),
// patientSignup= document.querySelector(".patientSignup");



// show/hide password and change icon //
pwShowHide.forEach(eyeIcon => {
    eyeIcon.addEventListener("click", () => {
        pwFields.forEach(pwField => {
            if (pwField.type === "password") {
                pwField.type = "text";

                pwShowHide.forEach(icon => {
                    icon.classList.replace("uil-eye-slash", "uil-eye");
                })
            } else {
                pwField.type = "password";

                pwShowHide.forEach(icon => {
                    icon.classList.replace("uil-eye", "uil-eye-slash");
                })
            }
        })
    })
})

//signup ang login form//
signUp.addEventListener("click", () => {
    container.classList.add("active");
    // ask.style.opacity='1'
    // doctorForm.style.opacity='0'
    // patientForm.style.opacity='0'


});

login.addEventListener("click", () => {
    container.classList.remove("active");
});


// doctorSignup.addEventListener("click", ( )=>{

//     container.classList.add("active");
//     ask.style.opacity='0'
//     doctorForm.style.opacity='1'
//     patientForm.style.opacity='0'
//     alert('Hello')

// });


// patientSignup.addEventListener("click", ( )=>{
//     container.classList.add("active");
//     ask.style.opacity='0'
//     doctorForm.style.opacity='0'
//     patientForm.style.opacity='1'
//     alert('Hello')

// });
