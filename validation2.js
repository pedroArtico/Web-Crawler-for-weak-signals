function onSelect(select) {
    if (select.value === "0" || select.value === "1" || select.value === "2" || select.value === "3") {
        document.getElementById("addFile").value = "";
        document.getElementById("ontologyList").value = "Selecione";
    }
}