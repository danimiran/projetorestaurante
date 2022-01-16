$(document).ready(function() {
    $("#link [href]").each(function() {
        if (this.href.split("?")[0] == window.location.href.split("?")[0]) {
            $(this).addClass("aaa");
        }
    });
});