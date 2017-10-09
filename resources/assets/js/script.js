$(document).ready(function(){
    $('.fone').mask('(00) 00000-0009');
});

function editContactFields(id)
{
    // pega valores
    name = $("#name_"+id).text();
    lastName = $("#last_name_"+id).text();
    fone1 = $("#fone_1_"+id).text();
    fone2 = $("#fone_2_"+id).text();

    // seta inputs
    var inputName = '<input name="contact['+id+'][name]" value="'+$.trim(name)+'">';
    var inputLastName = '<input name="contact['+id+'][lastName]" value="'+$.trim(lastName)+'">';
    var inputFone1 = '<input name="contact['+id+'][fone1]" value="'+$.trim(fone1)+'">';
    var inputFone2 = '<input name="contact['+id+'][fone2]" value="'+$.trim(fone2)+'">';

    // abre campos para edicao
    $("#name_"+id).html(inputName);
    $("#last_name_"+id).html(inputLastName);
    $("#fone_1_"+id).html(inputFone1);
    $("#fone_2_"+id).html(inputFone2);
    
    $(".dv-comp-save").removeClass("hide");
}

    /*$.ajax({
        type: "POST",
        data: { "buscaLista" : 1, "idComodo": idComodo},             
        url: "../../controller/LocalControle.php",
        dataType: "json",
        success: function(result){             
               // console.log(result);
            if(result != null) {    
                $.each(result, function(k,v) {
                    listEquipOption += '<option value="'+v.rowID+'">'+v.nomeEquipamento+'</option>';                            
                });
                $("#nomeEquip").html(listEquipOption);     
            }  
        },
        error: function(){
            console.log("erro ajax busca comodos");
        }
    });*/