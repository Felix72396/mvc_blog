window.addEventListener("load", function (event) {
    const hidden_element_user_role = document.getElementById("user_role");
    // const btn_edit_array = document.querySelectorAll(".btn-edit");
    


    // I'm using a regular expression to enable a button if the user role is admin or editor
    // and I use pattern which is the variable with the method test to see if it matches
    let pattern = /admin|editor/;
  
    if (hidden_element_user_role != "") {
        if (pattern.test(hidden_element_user_role.value)) {
            let items_array = document.querySelectorAll(".maintenance-permission");

            items_array.forEach(function (item) {
                item.classList.toggle("visible-display-flex");
            });
        }
    }  

    if (hidden_element_user_role.value === "admin") {
            let items_array = document.querySelectorAll(".admin-permission");

            items_array.forEach(function (item) {
                item.classList.toggle("visible-display-flex");
            });
    } 

});
