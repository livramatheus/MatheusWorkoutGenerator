$(document).ready(function () {

    $('#modal_info').on('show.bs.modal', function (event) {
        var oButton = $(event.relatedTarget);
        var sDescription = oButton.data('stimulusdescription');
        var sExplanation = oButton.data('stimulusexplanation');
        var modal = $(this);
        modal.find('.modal-title').text('How to do a ' + sDescription + "?");
        modal.find('.modal-body').text(sExplanation);
    })

    $("#terms").click(function () {
        $("#btn-workout-generate").prop('disabled', function (i, val) {
                return !val;
        });
        $("#btn-workout-search").prop('disabled', function (i, val) {
                return !val;
        });
        $("#workout-search").prop('disabled', function (i, val) {
                return !val;
        });
    });

    $(document).on("click", '#btn-workout-copy-key', function () {
        let sWorkoutKey = $("#workout-key").text();
        let oTemp = jQuery('<input type="text" id="temp">');
        $("#page_content").append(oTemp);
        oTemp.val(sWorkoutKey);
        oTemp.select();
        document.execCommand("copy");
        oTemp.remove();
        $.fn.manageToastContent('Cool', 'Workout key ' + sWorkoutKey + ' copied to clipboard!');
        $('#toast-interaction').toast('show');

    });

    jQuery.fn.manageToastContent = function (sTitle, sText) {
        $("#toast-title").text(sTitle);
        $("#toast-text").text(sText);
    };

    $("#form-workout-generate").submit(function () {
        let oFormData = new FormData(this);
        oFormData.append('ajax', true);

        if ($("#workout-group").val().length > 0 && $("#workout-level").val() !== "") {
            $.ajax({
                method: "POST",
                url: "index.php",
                data: oFormData,
                processData: false,
                contentType: false,
                success: function (sData) {
                    console.log(sData)
                    let oReturn = JSON.parse(sData);
                    if (oReturn.state) {
                        let oEntities = jQuery(oReturn.content);
                        $("#page_content").empty();
                        $("#page_content").html(oEntities);
                        $('[data-toggle="popover"]').popover();
                    } else {
                        $.fn.manageToastContent('No!', oReturn.content);
                        $('#toast-interaction').toast('show');
                    }
                }
            });
        }

        return false;
    });

    $("#form-workout-seach").submit(function () {
        let oFormData = new FormData(this);
        oFormData.append('ajax', true);

        if ($("#workout-search").val()) {
            $.ajax({
                method: "POST",
                url: "index.php",
                data: oFormData,
                processData: false,
                contentType: false,
                success: function (sData) {
                    let oReturn = JSON.parse(sData);
                    if (!oReturn.state) {
                        $.fn.manageToastContent('No!', 'Requested workout not found!');
                        $('#toast-interaction').toast('show');
                    } else {
                        let oEntities = jQuery(oReturn.content);
                        $("#page_content").empty();
                        $("#page_content").html(oEntities);
                        $('[data-toggle="popover"]').popover();
                    }
                    $("#image_front").remove();
                }
            });
        }

        return false;
    });
});

(function () {
    'use strict';
    window.addEventListener('load', function () {
        var aForms = document.getElementsByClassName('needs-validation');
        var oValidation = Array.prototype.filter.call(aForms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
