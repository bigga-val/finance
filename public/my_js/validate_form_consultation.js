// ce fichier permet de valider le formulaire de consultation dans le cabinet du medecin et le soumettre avec ajax
$(document).ready(function(){
    console.log("trois")
    console.log("bien")
    let btn_form = $("#btn_submit_consultation")
    $("#check_examen").on("checked", function(){
        alert(this.val())
    })
    btn_form.on('click', function(){
        alert('submitted')
        let nevrose = $("#nevrose")
        let anamnese = $("#anamnese")
        let complement = $("#complement")
        let ant_medical = $("#ant_medical")
        let ant_chirurgical = $("#ant_chirurgical")
        let ant_familial = $("#ant_familial")
        let ant_colateral = $("#ant_colateral")
        let ant_description = $("#ant_description")
        let tete_cou = $("#tete_cou")
        let tronc = $("#tronc")
        let membres = $("#membres")
        let divers = $("#divers")
        let conclusion = $("#conclusion")
        let traitement = $("#traitement")
        let patient = $("#patient")
        let id_signes = $("#id_signes")
        var checks = new Array()

        $.each($("#check_examen:checked"), function(){
            checks.push($(this).val());
        });
        //console.log(checks)
        $("#recherche").val(checks)

        $.ajax({
            type:"GET",
            url: "/new_consultation",
            data: {
                "nevrose": nevrose.val(),
                "anamnese": anamnese.val(),
                "complement": complement.val(),
                "ant_medical": ant_medical.val(),
                "ant_chirurgical": ant_chirurgical.val(),
                "ant_familial": ant_familial.val(),
                "ant_colateral":ant_colateral.val(),
                "ant_description": ant_description.val(),
                "tete_cou": tete_cou.val(),
                "tronc": tronc.val(),
                "membres": membres.val(),
                "divers": divers.val(),
                "conclusion": conclusion.val(),
                "traitement": traitement.val(),
                "signes": id_signes.val(),
                "check": checks
            },
            dataType: "json",
            async: true,
            success: function(data){
                location.reload();

                //console.log(data)
                //console.log(checks)
            },
            error: function(e){
                console.error(e)
            }
        })



    })


})