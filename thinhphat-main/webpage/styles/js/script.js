let search_box = document.querySelector(".search-box");
let Btn_search_box = document.querySelector(".bx-search");
let short_description_post = document.querySelector(".shot-description-services");
let show_menu_mobile = document.querySelector(".bx-menu");
let slider_menu = document.querySelector(".slider-menu");
let close_slider = document.querySelector(".bxs-x-circle");
let show_chil_menu_mobile = document.querySelectorAll(".arrow");
let pagination = document.querySelector(".pagination-item");
let close_remove_class = document.querySelector(".close");

Btn_search_box.addEventListener("click", () => {
    search_box.classList.toggle("show");
});

show_menu_mobile.addEventListener("click", () => {
    slider_menu.classList.toggle("show");

});

close_slider.addEventListener("click", () => {
    slider_menu.classList.remove("show");
});

close_remove_class.addEventListener("click", () => {
    slider_menu.classList.remove("show");
});

for (var i = 0; i < show_chil_menu_mobile.length; i++) {
    show_chil_menu_mobile[i].addEventListener("click", (e) => {
        let arrowParent = e.target.parentElement.parentElement;

        arrowParent.classList.toggle("show-menu");
    });
}

// pagination > news


// sticky header top
// var sticky = header.offsetTop;

// window.onscroll = function(){
//     myFunction();
// }

// function myFunction(){
//     if (window.pageYOffset > sticky){
//         header.classList.add("stuck");
//     } else {
//         header.classList.remove("stuck");
//     }
// }

// var slideIndex = 1;
// var header = document.getElementById("myHeader");

// showDivs(slideIndex);

// function plusDivs(n) {
//     showDivs(slideIndex += n);
// }

// function showDivs(n){
//     var x = document.getElementsByClassName("mySlides");

//     if (n > x.length){
//         slideIndex = 1;
//     }

//     if (n < 1){
//         slideIndex = x.length;
//     }

//     for (var i = 0; i < x.length; i++){
//         x[i].style.display = "none";
//     }

//     x[slideIndex-1].style.display = "block";
// }
