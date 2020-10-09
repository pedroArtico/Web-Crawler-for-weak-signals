$(document).ready(function()
{
    $("#form_register").submit(function()
    {
		var cont=0;
        var option= $("#element_4").val();
        if(option==="1")
        {
            if ($("#url_name").val() === "")
            {
                alert("Nome da fonte inválido!");
                ++cont;
            }
            if ($("#url_register").val() === "")
            {
                alert("URL inválida!");
                ++cont;
            }
			if(cont==0)
			{
				return true;
			}
			else
				return false;
        }
        if(option==="2")
        {
            if($("#sources").val()==="0")
            {
                alert("Uma fonte de pesquisa deve ser selecionada!");
                return false;
            }
        }
    });
});
