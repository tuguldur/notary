$(function() {
    $(".add_user").click(function() {
        var id = $(this).attr("data-id");
        var type = $(this).attr("data-type");
        var reg_number = $(this).attr("data-user");
        $("#user_registration_number").val(reg_number);
        if (type == "accreditation")
            $("#user_dialog_form").attr(
                "action",
                "/contract/accreditation/user"
            );
        else $("#user_dialog_form").attr("action", "/contract/loan/user");
        $("#type_id").val(id);
        $("#user_dialog").modal("show");
    });
});
$("#user_dialog").on("hidden.bs.modal", function() {
    $("#type_id,#user_registration_number").val("");
    $("#user_dialog_form").attr("action", "/");
});
