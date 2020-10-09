$(document).ready(function()
{
    $("#form_19052").submit(function()
    {
       var option= $("#option").val();
       var cont=0;
       if(option==="1")
       {
           if($("#url").val()==="")
           {
               alert("Campo URL não pode estar em branco!");
               ++cont;
           }
           if($("#sentenceQuantity").val()==="0")
           {
               alert("Selecione um grau de compressão válido!");
               ++cont;
           }
           if(cont>0)
           {
               return false;
           }
           else
			   $("#li_3").hide();
			   $("#li_7").hide();
			   $("#aguarde").show();
               return true;				
       }
        if(option==="2")
        {
            if($("#key").val()==="")
            {
                alert("O campo de palavras-chave não pode estar em branco!");
                ++cont;
            }
            if($("#websearch").val()==="0")
            {
                alert("Selecione um buscador!");
                ++cont;
            }
            if($("#year").val()==="0")
            {
                alert("Selecione um ano!");
                ++cont;
            }
            if($("#sentenceQuantity").val()==="0")
            {
                alert("Selecione um grau de compressão válido!");
                ++cont;
            }
            if(cont>0)
            {
                return false;
            }
            else
				$("#li_3").hide();
				$("#li_7").hide();
				$("#aguarde").show();
                return true;				
		}
        if(option==="3")
        {
            if($("#key").val()==="")
            {
                alert("O campo de palavras-chave não pode estar em branco!");
                ++cont;
            }
            if($("#websearch").val()==="0")
            {
                alert("Selecione um buscador!");
                ++cont;
            }
            if($("#year").val()==="0")
            {
                alert("Selecione um ano!");
                ++cont;
            }
            if($("#source").val()==="0")
            {
                alert("Selecione uma fonte de pesquisa!");
                ++cont;
            }
            if($("#sentenceQuantity").val()==="0")
            {
                alert("Selecione um grau de compressão válido!");
                ++cont;
            }
            if(cont>0)
            {
                return false;
            }
            else
				$("#li_3").hide();
				$("#li_7").hide();
				$("#aguarde").show();
                return true;				
		}
        if(option==="5")
        {
            if($("#topic").val()==="")
            {
                alert("O campo tema não pode estar em branco!");
                ++cont;
            }
            if($("#websearch").val()==="0")
            {
                alert("Selecione um buscador!");
                ++cont;
            }
            if($("#year").val()==="0")
            {
                alert("Selecione um ano!");
                ++cont;
            }
            if($("#source").val()==="0")
            {
                alert("Selecione uma fonte de pesquisa!");
                ++cont;
            }
            if($("#sentenceQuantity").val()==="0")
            {
                alert("Selecione um grau de compressão válido!");
                ++cont;
            }
            if(cont>0)
            {
                return false;
            }
            else
				$("#li_3").hide();
				$("#li_7").hide();
				$("#aguarde").show();
                return true;				
		}
    });
});

