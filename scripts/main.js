document.addEventListener("DOMContentLoaded", start);

var start = new function() {
    var clickables = document.getElementsByClassName("menu-item-has-children");
    for(i = 0; i < clickables.length; i++)
    {
        clickables[i].addEventListener("click", function(el) {
            if(el.target.classList.contains("show-children")) {
                el.target.classList.remove("show-children");
            }
            else {
                el.target.classList.add("show-children");
            }
        });
    }
};
