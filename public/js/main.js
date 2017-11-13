$('.close').click(function () {
    $('.alert').hide('slow')
});
/*$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
});*/
$(".LinkModal").click(function (oEvt) {
    oEvt.preventDefault();
    var Id = $(this).attr("rel");
    $(".modal-content").fadeIn(1000).html('<div style="text-align:center; margin-right:auto; margin-left:auto">Patientez...</div>');
    $.ajax({
        type: "GET",
        data: "Id=" + Id,
        url: "modal/" + Id,
        success: function (data) {
            $(".modal-content").fadeIn(1000).html(data);
        },
        error: function (msg) {
            $(".modal-body").addClass("tableau_msg_erreur").fadeOut(800).fadeIn(800).fadeOut(400).fadeIn(400).html('<div style="margin-right:auto; margin-left:auto; text-align:center">Impossible de charger cette page</div>');
        }
    });
});
$('#table').stacktable();
