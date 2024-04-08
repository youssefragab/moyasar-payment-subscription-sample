$("#login-form").on("submit", function(e) {

    e.preventDefault();

    var form = $(this);
    var url = form.attr("action");
    var type = form.attr("method");
    var data = form.serialize();

    form.find("button").html("Login...");
    form.find("button").css('opacity','0.5')

    $.ajax({
        url: url,
        type: type,
        data: data,
        success: function(response) {
            if (response.success == "true") {

                window.location.href = window.location.href;
                
            } else {
                $(".error-group p").html(response.message)
                $(".error-group").show();
                form.find("button").html("Login");
                form.find("button").css('opacity','1') 
            }
        }
    });

});