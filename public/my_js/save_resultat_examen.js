$(document).ready(function(){
    let modifier = $("#btn_modifier_resultat")
    let bouton = $('button[data-target="#modal-default"]')
    bouton.on('click', function(){
        let index = bouton.index(this)
        let value = bouton.eq(index).attr('id')
        let id=bouton.eq(index).attr('name')
        $("#input_modif").val(value)
        $("#input_examen").val(id)
    })
})