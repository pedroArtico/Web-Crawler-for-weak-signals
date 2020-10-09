function changeSources(select)
{
    if(select.value!=="0")
    {
        document.getElementById("url_register").value = select.value;
        document.getElementById("url_name").value = document.getElementById('sources').options[document.getElementById('sources').selectedIndex].text;
		}
    else
    {
        document.getElementById("url_register").value = "";
        document.getElementById("url_name").value= "";
    }
}

function onSelect(select) {
    if (select.value === "0" || select.value === "1" || select.value === "2" || select.value === "3") {
        document.getElementById("sources").value = "0";
        document.getElementById("url_name").value = "";
        document.getElementById("url_register").value = "";
    }
}

function blockRegisterFields(select)
{
    switch (select.value)
    {
        case "0":
            document.getElementById("li_3").style.display = "none";
            document.getElementById("li_2").style.display = "none";
            document.getElementById("li_1").style.display = "none";
            document.getElementById("add").style.display = "none";
			document.getElementById("delete").style.display = "none";
			
            break;
        case "1":
            document.getElementById("li_3").style.display = "none";
            document.getElementById("li_2").style.display = "block";
            document.getElementById("li_1").style.display = "block";
            document.getElementById("url_name").disabled = false;
            document.getElementById("url_register").disabled = false;
            document.getElementById("url_name").style.backgroundColor = "#FFFFFF";
            document.getElementById("url_register").style.backgroundColor = "#FFFFFF";
            document.getElementById("add").style.display = "block";
            document.getElementById("delete").style.display = "none";
            break;
			
        case "2":
            document.getElementById("li_3").style.display = "block";
            document.getElementById("li_2").style.display = "none";
            document.getElementById("li_1").style.display = "none";
            document.getElementById("add").style.display = "none";
            document.getElementById("delete").style.display = "block";
            break;
			
		case "3":
            document.getElementById("li_3").style.display = "block";
            document.getElementById("li_2").style.display = "block";
            document.getElementById("li_1").style.display = "block";
            document.getElementById("url_name").disabled = true;
            document.getElementById("url_register").disabled = true;
            document.getElementById("url_name").style.backgroundColor = "#D8D8D8";
            document.getElementById("url_register").style.backgroundColor = "#D8D8D8";
            document.getElementById("add").style.display = "none";
            document.getElementById("delete").style.display = "none";
            break;
        default:
            alert("Houve um problema nos campos, atualize a página!" + " "+
                "Se o erro persistir, contate o suporte com o código de erro: error in method blockRegisterFields()")

    }
}
