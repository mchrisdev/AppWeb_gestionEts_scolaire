


$('.btnUpdate').click(function(){
    var iduser = $(this).attr('data-id');
    var nameuser = $(this).attr('data-name');
    var roleuser = $(this).attr('data-role');
    
    $('#id_user').val(iduser);
    $('#name').val(nameuser);
    $('#role').val(roleuser);
});