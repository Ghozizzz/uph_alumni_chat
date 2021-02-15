$(document).ready(function () {
    $(".link-sign-in").click(function () {
        $("#modal-account .modal-dialog").eq(0).css("display", "flex");
        $("#modal-account .modal-dialog").eq(1).css("display", "none");
        $("#modal-account .modal-dialog").eq(2).css("display", "none");
        $(".modal-body form").eq(0).css("display", "block");
        $(".modal-body form").eq(1).css("display", "none");
        $(".modal-body form").eq(2).css("display", "none");
        $(".modal-header").eq(0).css("display", "block");
        $(".modal-header .account").eq(0).css("display", "block");
        $(".modal-header .verification").eq(0).css("display", "none");
        $(".modal-header .link-sign-up").css("border-bottom", "none");
        $(".modal-header .link-sign-in").css("border-bottom", "5px solid #1C50A3");
        $(".sign-up-success").eq(0).css("display", "none");
        $(".sign-up-failed").eq(0).css("display", "none");
        $(".forget-success").eq(0).css("display", "none");
    });
    $(".link-sign-up").click(function () {
        $("#modal-account .modal-dialog").eq(0).css("display", "flex");
        $("#modal-account .modal-dialog").eq(1).css("display", "none");
        $("#modal-account .modal-dialog").eq(2).css("display", "none");
        $(".modal-body form").eq(0).css("display", "none");
        $(".modal-body form").eq(1).css("display", "block");
        $(".modal-body form").eq(2).css("display", "none");
        $(".modal-header").eq(0).css("display", "block");
        $(".modal-header .account").eq(0).css("display", "block");
        $(".modal-header .verification").eq(0).css("display", "none");
        $(".modal-header .link-sign-in").css("border-bottom", "none");
        $(".modal-header .link-sign-up").css("border-bottom", "5px solid #1C50A3");
        $(".sign-up-success").eq(0).css("display", "none");
        $(".sign-up-failed").eq(0).css("display", "none");
        $(".forget-success").eq(0).css("display", "none");
    });
    // $(".sign-up-action").click(function () {
    // });
    $(".sign-up-action-failed").click(function () {
        $("#modal-account .modal-dialog").eq(0).css("display", "flex");
        $("#modal-account .modal-dialog").eq(1).css("display", "none");
        $("#modal-account .modal-dialog").eq(2).css("display", "none");
        $(".modal-body form").css("display", "none");
        $(".modal-header").eq(0).css("display", "none");
        $(".sign-up-success").eq(0).css("display", "none");
        $(".sign-up-failed").eq(0).css("display", "block");
        $(".forget-success").eq(0).css("display", "none");
    });
    $(".verify-data-action").click(function () {
        $("#modal-account .modal-dialog").eq(0).css("display", "none");
        $("#modal-account .modal-dialog").eq(1).css("display", "flex");
        $("#modal-account .modal-dialog").eq(2).css("display", "none");
        $(".modal-body form").eq(2).css("display", "block");
        $(".modal-header").css("display", "block");
        $(".modal-header .verification").eq(0).css("display", "block");
    });
    $(".forget-data-action").click(function () {
        $("#modal-account .modal-dialog").eq(0).css("display", "none");
        $("#modal-account .modal-dialog").eq(1).css("display", "none");
        $("#modal-account .modal-dialog").eq(2).css("display", "flex");;
        $(".modal-body form").eq(3).css("display", "block");
        $(".modal-header").css("display", "block");
        $(".modal-header .forget").eq(0).css("display", "block");
    });

    var onDragEnter = function (event) {
        $(".br_dropzone").addClass("dragover");
    },

        onDragOver = function (event) {
            event.preventDefault();
            if (!$(".br_dropzone").hasClass("dragover"))
                $(".br_dropzone").addClass("dragover");
        },

        onDragLeave = function (event) {
            event.preventDefault();
            $(".br_dropzone").removeClass("dragover");
        },

        onDrop = function (event) {
            $(".br_dropzone").removeClass("dragover");
            $(".br_dropzone").addClass("dragdrop");
            debugger; console.log(event.originalEvent.dataTransfer.files);
        };

    $(".br_dropzone")
        .on("dragenter", onDragEnter)
        .on("dragover", onDragOver)
        .on("dragleave", onDragLeave)
        .on("drop", onDrop);
});