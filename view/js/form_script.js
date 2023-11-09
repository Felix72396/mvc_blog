window.addEventListener("load", function (event) {
    
    const frm_delete_container = document.querySelector(".frm-delete-container");
    const label_delete = document.querySelector(".frm-delete-container label");
    const btn_delete_array = document.querySelectorAll(".btn-delete");
    const btn_cancel_delete = document.querySelector(".frm-delete-container .btn-cancel-delete");
    const hidden_content_id = document.getElementById("hidden-content-id");

    const frm_insert_container = document.querySelector(".frm-insert-container");
    const btn_insert = document.getElementById("btn-insert");
    const btn_cancel_insert = document.querySelector(".frm-insert-container .btn-cancel-insert");

    btn_delete_array.forEach(function(btn_delete){
        btn_delete.addEventListener("click", function(){  
            frm_delete_container.classList.toggle("visible-display-flex");
            label_delete.textContent = `Are you sure you want to remove post #${btn_delete.getAttribute("data-post-index")}?`;
            hidden_content_id.value = btn_delete.getAttribute("data-id");
        });
    }); 

    btn_cancel_delete.addEventListener("click", function(){
        frm_delete_container.classList.toggle("visible-display-flex");
    });

    btn_insert.addEventListener("click", function(){
        frm_insert_container.classList.toggle("visible-display-flex");
    });

    btn_cancel_insert.addEventListener("click", function(){
        frm_insert_container.classList.toggle("visible-display-flex");
    });



    const textbox_array = document.querySelectorAll(":is(input[type='email'], input[type='text'], input[type='password'])");
    const btn_clean = document.getElementById("id-btn-clean");
    let input ="";
 
    textbox_array.forEach(function (txt) {
        txt.addEventListener("focus", function () {
            if (txt.value != "") {
                btn_clean.style.display = "flex";
                txt.parentElement.appendChild(btn_clean);
                input = txt;
            }
            else {
                btn_clean.style.display = "none";
            }

        });

        btn_clean.addEventListener("click", function () {
            if (input.value != "") 
            {
                input.value = "";
                btn_clean.style.display = "none";
            }
        });
  
        txt.addEventListener("input", function () {
            if (txt.value != "") {
                btn_clean.style.display = "flex";
                txt.parentElement.appendChild(btn_clean);
                // input = txt;
            }
            else {
                btn_clean.style.display = "none";
            }
        });

    });

    
});
