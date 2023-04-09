let arrow = document.querySelectorAll(".arrow");
const body = document.querySelector("body"),
      sidebar = body.querySelector(".sidebar-1"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");

let breadcrumb_dashboard = document.querySelector(".breadcrumb-item");


function hasClass(ele, cls){
    return ('' + ele.className + '').indexOf('' + cls + '') > -1;   
}

for (var i = 0; i < arrow.length; i++){
    arrow[i].addEventListener('click', (e) => {
        let arrowParent = e.target.parentElement.parentElement;
    
        arrowParent.classList.toggle("show");
    });
}

modeSwitch.addEventListener("click", () => {
    body.classList.toggle("dark");
});
