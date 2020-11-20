$(document).ready(function(){
    $("#edit_anamnese").on("click", function(){
        let texte = $("#anamnese_description").text()
        $("textarea#anamnese_modif").val(texte)
        $("#btn_modif_anamnese").on("click", function(){
            $("textarea#anamnese_modif").val(texte)
            console.log($("textarea#anamnese_modif").val())
        })
    })
})