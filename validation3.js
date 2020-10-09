$(document).ready(function()
{
	$("select#opt").change(function()
	{
		var selected = $("#opt option:selected").val();
		if(selected==="0")
		{
			$("#file").hide().val("");
			$("#list").hide().val(0);
			$("#save").hide();
			$("#remove").hide();			
		}
		if(selected==="1")
		{
			$("#file").show().val("");
			$("#list").hide().val(0);
			$("#save").show();
			$("#remove").hide();			
		}
		if(selected==="2")
		{
			$("#file").hide().val("");
			$("#list").show().val(0);
			$("#save").hide();
			$("#remove").hide();			
		}
		if(selected==="3")
		{
			$("#file").hide().val("");
			$("#list").show().val(0);
			$("#save").hide();
			$("#remove").show();			
		}		
	});
		$("select#ontologyList").change(function()
	{
		var selected = $("#ontologyList option:selected").val();
		$("#hide").val(selected);
	});		
		
		
	$("#form_32608").submit(function()
	{
		var selected = $("#opt option:selected").val();
		var selected2 = $("#ontologyList option:selected").val();
		if(selected==="1")
		{	
			if($("#addFile").val()==="")
			{
				alert("Escolha um arquivo!");
				return false;
				
			}
		}	
		if(selected==="3")
		{		
			if(selected2==="Selecione")
			{
				alert("Selecione uma Ontologia!");
				return false;
			}
		}	
	});	
});