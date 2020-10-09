function blockFields(select)
{
    switch (select.value)
    {
        case "0":
            document.getElementById("li_1").style.display = "none";
            document.getElementById("li_2").style.display = "none";
            document.getElementById("li_4").style.display = "none";
            document.getElementById("li_5").style.display = "none";
            document.getElementById("li_6").style.display = "none";
            document.getElementById("li_8").style.display = "none";
            document.getElementById("li_9").style.display = "none";
            document.getElementById("submit").style.display = "none";
			document.getElementById("append").style.display = "none";
			document.getElementById("register").style.display = "none";
            break;
        case "1":
            document.getElementById("li_1").style.display = "block";
            document.getElementById("li_2").style.display = "none";
            document.getElementById("li_4").style.display = "none";
            document.getElementById("li_5").style.display = "none";
            document.getElementById("li_6").style.display = "none";
            document.getElementById("li_8").style.display = "none";
            document.getElementById("li_9").style.display = "none";
			document.getElementById("submit").style.display = "block";
			document.getElementById("append").style.display = "block";
			document.getElementById("register").style.display = "none";
            break;
        case "2":
            document.getElementById("li_1").style.display = "none";
            document.getElementById("li_2").style.display = "block";
            document.getElementById("li_4").style.display = "block";
            document.getElementById("li_5").style.display = "block";
            document.getElementById("li_6").style.display = "none";
            document.getElementById("li_8").style.display = "none";
            document.getElementById("li_9").style.display = "none";
			document.getElementById("submit").style.display = "block";
			document.getElementById("append").style.display = "block";
			document.getElementById("register").style.display = "none";
            break;
        case "3":
            document.getElementById("li_1").style.display = "none";
            document.getElementById("li_2").style.display = "block";
            document.getElementById("li_4").style.display = "block";
            document.getElementById("li_5").style.display = "block";
            document.getElementById("li_6").style.display = "block";
            document.getElementById("li_8").style.display = "none";
            document.getElementById("li_9").style.display = "none";
			document.getElementById("submit").style.display = "block";
			document.getElementById("append").style.display = "block";
			document.getElementById("register").style.display = "none";
            break;
        case "4":
            document.getElementById("li_1").style.display = "none";
            document.getElementById("li_2").style.display = "none";
            document.getElementById("li_4").style.display = "none";
            document.getElementById("li_5").style.display = "none";
            document.getElementById("li_6").style.display = "none";
            document.getElementById("li_8").style.display = "none";
            document.getElementById("li_9").style.display = "none";
			document.getElementById("submit").style.display = "none";
			document.getElementById("append").style.display = "none";
            document.getElementById("register").style.display = "block";
            break;
        case "5":
            document.getElementById("li_1").style.display = "none";
            document.getElementById("li_2").style.display = "none";
            document.getElementById("li_4").style.display = "block";
            document.getElementById("li_5").style.display = "block";
            document.getElementById("li_6").style.display = "block";
            document.getElementById("li_8").style.display = "none";
            document.getElementById("li_9").style.display = "block";
            document.getElementById("submit").style.display = "block";
            document.getElementById("append").style.display = "block";
            document.getElementById("register").style.display = "none";
            break;
		
        default:
            alert("Houve um problema nos campos, atualize a página!" +
                "Se o erro persistir, contate o suporte com o código de erro: error in method blockFields()")

    }
}

function onChangeOpt(select) {
    if (select.value === "0" || select.value === "1" || select.value === "2" || select.value === "3"|| select.value === "4"|| select.value === "5") {
        document.getElementById("url").value = "";
        document.getElementById("key").value = "";
		document.getElementById("topic").value = "";
        document.getElementById("websearch").value = "0";
        document.getElementById("year").value = "0";
        document.getElementById("source").value = "0";
        document.getElementById("sentenceQuantity").value = "0";
    }
}
