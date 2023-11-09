window.addEventListener("load", function (event) {
    const btn_user_info = document.getElementById("btn-user-info");
    const info_container = document.querySelector(".user-info-container");

    btn_user_info.addEventListener("click", function(){
        info_container.classList.toggle("user-info-container-show");
    });

    const lbl = document.getElementById("lbl-content-file-path");
    const file = document.getElementById("content-file-id");
    const btn_save_profile_picture = document.getElementById("btn-save-profile-picture");
    const form =this.document.querySelector(".img-file-container form");
    file.addEventListener("change", function(){
        btn_save_profile_picture.style.display = "block";
        lbl.innerHTML = `${file.value}`;
    });

    // btn_save_profile_picture.addEventListener("submit", function(event){

    // });

    form.addEventListener('submit', function(){
        setInterval(function(){
            window.location.reload();
        }, 3000);
    });

});