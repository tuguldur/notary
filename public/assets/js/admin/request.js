$(function() {
    $("#request-table").on("click", ".request-data", function() {
        var id = $(this).attr("data-key");
        $("#request").modal("show");
        $.get("/request/" + id, function(req) {
            $("#name").val(req.name);
            $("#email").val(req.email);
            $("#registration_number").val(req.registration_number);
            $("#phone").val(req.phone);
            $("#picture").attr("src", req.picture);
            $("#download").attr("href", req.picture);
            $("#user_id").val(req.notary_id);
            $("#request_id").val(req.conf_id);
            $("#status_input").val(req.status);
            if (req.status == 0) {
                $("#status").html(
                    '<span class="badge badge-success">Баталгаажсан</span>'
                );
                $("#save").html("Цуцлах");
            } else if (req.status == 1) {
                $("#status").html(
                    '<span class="badge badge-secondary">Хүлээгдэж буй</span>'
                );
                $("#save").html("Батлах");
            }
            $("#request-loader").addClass("d-none");
            $("#request-main").removeClass("d-none");
        });
    });
    $("#request").on("hidden.bs.modal", function() {
        $("#name,#email,#registration_number,#phone,#user_id,#request_id").val(
            ""
        );
        $("#picture").attr("src", "");
        $("#download").attr("href", "");
        $("#request-loader").removeClass("d-none");
        $("#request-main").addClass("d-none");
    });
});
