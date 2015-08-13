$('#edu, #lav, #tesi, #skill').hide();
    $(".nav li").each(function(i) {
        $(this).click(function() {
            $("#wrapper").find("div:eq('" + i + "')").show().siblings().hide();
        });
    });