document.addEventListener("DOMContentLoaded", start);

var start = new function() {
    var clickables = document.getElementsByClassName("menu-item-has-children");
    for(i = 0; i < clickables.length; i++)
    {
        clickables[i].addEventListener("click", function(el) {
            if(el.currentTarget.classList.contains("show-children")) {
                el.currentTarget.classList.remove("show-children");
                return;
            }

            el.currentTarget.classList.add("show-children");
        });
    }
};
