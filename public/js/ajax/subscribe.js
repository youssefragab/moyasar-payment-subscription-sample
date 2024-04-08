$(".subscribe").click(function() {
    var isAuth = $('#is-auth').val();
    if(isAuth == "false") {
        $('#exampleModal').modal('toggle');
        return;
    }
});