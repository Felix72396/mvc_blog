window.addEventListener("load", function(event){
    const btn_bars = document.getElementById("btn-img-bars");
    const ul = this.document.querySelector("header nav ul");
    const logo =this.document.querySelector("header nav .logo");

    btn_bars.addEventListener("click", function(){
        ul.classList.toggle("visible-display-flex-bars");
        logo.classList.toggle("no-visible");
    });


});