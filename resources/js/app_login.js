const input_forms = document.querySelectorAll(".input_form");

input_forms.forEach((el) => {
    el.addEventListener("focus", () => {
        el.classList.contains("error_password")
            ? el.classList.remove("error_password")
            : null;
    });
});


window.addEventListener('load',()=>{

    input_forms.forEach(el=>{
        //el.value = ''
    })
})