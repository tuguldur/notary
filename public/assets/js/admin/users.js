$(function() {
    $("#add_user").click(function() {
        $("#users").modal("show");
        $("#user-loader").addClass("d-none");
        $("#user-main").removeClass("d-none");
        $("#delete-user").hide();
    });
    $("#users").on("shown.bs.modal", function() {
        $("#save-user").prop("disabled", false);
    });
    $("#password_next").keyup(function() {
        var e = $("#password").val();
        var new_password = e.trim();
        var p = $(this).val();
        var password = p.trim();
        if (password != new_password) {
            $("#save-user").prop("disabled", true);
            $("#add_password_next").html("Нууц үг таарахгүй байна.");
        } else {
            $("#save-user").prop("disabled", false);
            $("#add_password_next").html("");
        }
    });
    $("#email").blur(function() {
        var e = $(this).val();
        var email = e.trim();
        var token = $('meta[name="csrf-token"]').attr("content");
        $.post("/user/check/email/", {
            email,
            _token: token
        }).done(function(e) {
            if (e == "true") {
                $("#save-user").prop("disabled", true);
                $("#add_email").html("Цахим хаяг бүртгэлтэй байна.");
            } else {
                $("#save-user").prop("disabled", false);
                $("#add_email").html("");
            }
        });
    });
    $("#registration_number").blur(function() {
        var e = $(this).val();
        var registration_number = e.trim();
        var token = $('meta[name="csrf-token"]').attr("content");
        $.post("/user/check/registration_number", {
            registration_number,
            _token: token
        }).done(function(e) {
            if (e == "true") {
                $("#save-user").prop("disabled", true);
                $("#add_registration_number").html(
                    "Регистрийн дугаар бүртгэлтэй байна."
                );
            } else {
                $("#save-user").prop("disabled", false);
                $("#add_registration_number").html("");
            }
        });
    });
    $("#user-table").on("click", ".user-data", function() {
        var id = $(this).attr("data-key");
        $("#delete-user")
            .show()
            .attr("data-key", id);
        var userKey = $("#delete-user").attr("user-key");
        if (userKey == id) {
            $("#delete-user").hide();
        }
        $("#user_id").val(id);
        $("#users").modal("show");
        $.get("/user/" + id, function(user) {
            console.log(user);
            $("#username").val(user.name);
            $("#email").val(user.email);
            $("#registration_number").val(user.registration_number);
            $("#role_select").val(user.type);
            $("#user-loader").addClass("d-none");
            $("#user-main").removeClass("d-none");
        });
    });
    $("#users").on("hidden.bs.modal", function() {
        $("#username,#email,#password,#password_next,#registration_number").val(
            ""
        );
        $("#role_select").val("1");
        $("#user_id").val("0");
        $("#user-loader").removeClass("d-none");
        $("#user-main").addClass("d-none");
    });
    $("#user_").submit(function(e) {
        var e = $("#password").val();
        var new_password = e.trim();
        var p = $("#password_next").val();
        var password = p.trim();
        $("#save-user").prop("disabled", true);
        if (new_password == password) {
            return true;
        } else {
            return false;
        }
    });
    $("#delete-user").click(function() {
        var id = $(this).attr("data-key");
        $.get("/user/delete/" + id, function(e) {
            if (e == "ok") $("#users").modal("hide");
            location.reload();
        });
    });
});
