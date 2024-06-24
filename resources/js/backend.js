


const btnUpload = document.getElementById("btn_upload");
const inputPhoto = document.getElementById("photo");

btnUpload?.addEventListener("click", () => {
    inputPhoto.click();
});

inputPhoto?.addEventListener("change", (f) => {
    const { name } = f.target.files[0];
    btnUpload.innerText = name.substring(0, 10);
    console.log(name);
});


const menuButton = document.getElementById('menu-button')
const menuDashboard = document.getElementById('menu_dashboard')

const headerDashboard = document.getElementById('header_dashboard');

if (menuDashboard) {

    headerDashboard.addEventListener('click',function(el){
        if (el.target.className === 'header') {
            menuDashboard?.classList.add('show_menu_dashboard')
        }
    })
    
}

menuButton?.addEventListener('click',()=>{
    menuDashboard?.classList.toggle('show_menu_dashboard')
})


