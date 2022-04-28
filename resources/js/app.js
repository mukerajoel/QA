require("./bootstrap");

const toggler = document.querySelector("input[data-theme-toggler]");

toggler &&
    toggler.addEventListener("change", () => {
        const bodyTheme = document
            .querySelector("body")
            .getAttribute("aria-theme");

        if (bodyTheme === "dark") {
            document.querySelector("body").setAttribute("aria-theme", "light");
        } else {
            document.querySelector("body").setAttribute("aria-theme", "dark");
        }
    });



$(document).ready(function() {
    $("#formButton").click(function() {
    $("#form1").toggle();
    });
});