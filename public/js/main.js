$('.close').click(function(){
    $('.alert').hide('slow')
});
$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  })