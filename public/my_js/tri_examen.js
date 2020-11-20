$(document).ready(function(){
    let tab = $("a[aria-controls='home']")
    var checks = new Array()

    tab.on('click', function (){
        let index = tab.index(this)
        let texte = tab.eq(index).text()
        let id = tab.eq(index).attr('id')
        alert(id);


        //alert(checks)
        $.ajax({
            type: "POST",
            url: "/tri_examens",
            data:{
                "examen": id
            },
            dataType: "json",
            async: true,
            success: function (data){
                console.log(data)
                let tbody = ""
                let temp = ""

                for(i = 0; i < data.length; i++){
                    tbody="<tr>"
                        tbody+="<td></td>"
                        tbody+="<td>"+data[i]['designation']+"</td>"
                        tbody+="<td>"+data[i]['unite_si']+"</td>"
                        tbody+="<td>"+data[i]['unite_traditionnelle']+"</td>"
                        tbody+="<td><label><input id='check_examen' type='checkbox' value='"+data[i]['id']+"'> choisir</label></td>"
                    tbody+="</tr>"
                    temp+=tbody
                }
                $("#liste").html(temp)
            },
            error: function (e){
                console.error(e)
            }
        })
    })
})