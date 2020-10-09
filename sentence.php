<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Seleção de sentenças</title>
    <link rel="stylesheet" type="text/css" href="view3.css" media="all">
    <link rel="icon" href="sentence.ico" type="image/x-icon" />
    <script type="text/javascript" src="view.js"></script>
    <script type="text/javascript" src="sentences.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
	$(document).ready(function()
	{
		$("#selectAll").click(function()
		{
		$('input:checkbox').prop('checked', $(this).prop('checked'));
		});
	});	
	</script>
	
	
</head>
<body id="main_body" onload="self.opener.location.reload();">
<img id="top" src="top.png" alt="">
<div id="form_container">
    <h1><a>Seleção de sentenças</a></h1>
    <form id="form_22429" class="appnitro"  method="post">
        <div class="form_description">
            <h2 style="text-align: center">Seleção de sentenças</h2>
            <p></p>
        </div>
		<ul>
			<li>
                <label class="description">Selecione as sentenças de interesse, e em seguida, clique em <b style="color:blue">"Exportar sentenças"</b>. Se não houver sentenças interessantes, clique em <b style="color:blue">"Sair"</b></label>
			</li>	
		</ul>		
        <ul >
            <li class="buttons">
                <input type="hidden" name="form_id" value="22429" />
                <input id="showSentences" class="button_text" type="button" name="showSentences" value="Extrair sentenças" onclick="showFields()" />
                <input id="close" name="close" type="submit" value="Fechar" style="display:none" >
            </li>
            <li id="li_2" style="display:none" >
                <label class="description" for="element_1">Sentenças </label>
                <span >
				<input class='element checkbox' id='selectAll' name='selectAll' type='checkbox' /> <label class='choice' style='text-align: justify; font-weight: bold;color:black'>Selecionar todas as sentenças</label>
               <?php
               require_once 'SentenceListWindow.php';	   
               $show = new SentenceListWindow();
               $show->listSentences();
               $show->getSelectedSentences();
			   $show->cleanTemporaryFiles();
               ?>
               </span>
            </li>
            <li id="buttons" class="buttons" style="display:none">
                <input type="hidden" name="form_id" value="22429" />
                <input id="exportSentences" class="button_text" type="submit" name="exportSentences" value="Exportar sentenças" onclick="window.open('selectedSentence.php')"/>				
                <input id="readArticle" class="button_text" type="button" name="readArticle" value="Ver fontes" onclick="window.open('articles.php')"/>
                <input id="close" class="button_text" type="submit" name="close" value="Sair" formaction="sentence.php"/>
				</li>
        </ul>
		<br /><br />
        <div id="footer">
            Generated by <a href="mailto:pedro_artico@hotmail.com">P.A.R</a>
        </div>
</div>
<img id="bottom" src="bottom.png" alt="">
</body>
</html>