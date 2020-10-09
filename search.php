<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html charset=utf-8">
    <title>Web Crawler for Weak Signals</title>
    <link rel="stylesheet" type="text/css" href="view.css" media="all">
    <link rel="icon" href="crawlericon_2.ico" type="image/x-icon" />
    <script type="text/javascript" src="view.js"></script>
    <script type="text/javascript" src="searchingFields.js"></script>
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript" src="jqueryValidation.js"></script>
    <script type="text/javascript">
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>
	
	
	
</head>
<body id="main_body" style="background-color: #0044ff">
<img id="top" src="top.png" alt="">
<div id="form_container" >
    <h1 style="background-color: #333333"><a>Crawler</a></h1>
    <form id="form_19052" class="appnitro"  method="post" autocomplete="off" name="data" action="">
        <div class="form_description" >
            <h2 style="text-align: center">Rastreamento de Sinais Fracos</h2>
            <div id="aguarde">Aguarde enquanto o rastreador realiza a busca... Isso pode demorar um pouco...<br/><br/>
</div>
            <p></p>
        </div>
        <ul >
            <li id="li_3">
                <label id="choose" for="option">Opção </label>
                <div>
                    <select class="element select large" id="option" name="option" onchange="blockFields(this); onChangeOpt(this);" >
                        <option value="0" >Selecione uma opção</option>
                        <option value="1">Busca por url</option>
                        <option value="2" >Busca aleatória</option>
                        <option value="3" >Busca específica</option>
                        <option value="5" >Busca por tema</option>
                        <option value="4" >Gerenciamento de Fontes</option>
                    </select>
                </div>
                <p class="guidelines" id="guide_3"  style="display:none"><span style="font-size: small;">Escolha um tipo de busca.</span></p>
            </li>
            <li id="li_1"  style="display:none">
                <label class="description" for="url">Digite a url aqui: </label>
                <div>
                    <input id="url" name="url" class="element text large" type="text" maxlength="255" value=""/>
                </div>
                <p class="guidelines" id="guide_1"  style="display:none"><span style="font-size: small;">A url digitada deverá corresponder a uma fonte encontrada.</span></p>
            </li>
            <li id="li_2" style="display:none">
                <label class="description" for="key">Digite as palavras-chave aqui: </label>
                <div>
                    <input id="key" name="key" class="element text medium" type="text" maxlength="255" value="" />
                </div>
                <p class="guidelines" id="guide_2"  style="display:none"><span style="font-size: small;">Palavras-chave utilizadas para buscar sinais fracos.</span></p>
            </li>
            <li id="li_9" style="display:none">
                <label class="description" for="topic">Digite o tema aqui: </label>
                <div>
                    <input id="topic" name="topic" class="element text medium" type="text" maxlength="255" value="" />
                </div>
                <p class="guidelines" id="guide_2"  style="display:none"><span
                            style="font-size: small;">Tema utilizado para buscar sinais fracos.</span></p>
            </li>
            <li id="li_4" style="display:none">
                <label class="description" for="websearch">Buscador </label>
                <div>
                    <select class="element select medium" id="websearch" name="websearch" >
                        <option value="0" >Selecione o buscador</option>
                        <option value="google" >GOOGLE</option>
                        <option value="google noticias" >GOOGLE NOTICIAS</option>
                        <option value="bing" >BING</option>
                        <option value="bing noticias" >BING NOTICIAS</option>
                    </select>
                </div>
                <p class="guidelines" id="guide_4"  style="display:none"><span style="font-size: small;">É responsável por buscar sinais fracos na Web.</span></p>
            </li>
            <li id="li_5" style="display:none">
                <label class="description" for="year">Ano </label>
                <div>
                    <select class="element select medium" id="year" name="year" >
                        <option value="0" >Selecione o ano</option>
                        <option value="2019" >2019</option>						
                        <option value="2018" >2018</option>
                        <option value="2017" >2017</option>
                        <option value="2016" >2016</option>
                        <option value="2015" >2015</option>
                        <option value="2014" >2014</option>
                        <option value="2013" >2013</option>
                        <option value="2012" >2012</option>
                        <option value="2011" >2011</option>
						<option value="2010" >2010</option>
                        <option value="" >Não especificado</option>
                    </select>
                </div>
                <p class="guidelines" id="guide_5"  style="display:none"><span style="font-size: small;display:none">O ano em que a busca por sinais fracos será feita. Se a opção selecionada for "não especificado", o rastreador não filtrará o ano.</span></p>
            </li>
            <li id="li_6" style="display:none">
                <label class="description" for="source">Fonte </label>
                <div>
                    <select class="element select medium" id="source" name="source" >
                        <option value="0" >Selecione a fonte</option>
                        <?php
                        require_once 'SearchWindow.php';
                        $GUI= new SearchWindow();
                        $GUI->reloadSourceFile();
                        $GUI->cleanTemporaryFiles();
                        ?>
                    </select>
                </div>
                <p class="guidelines" id="guide_6"  style="display:none"><span style="font-size: small;">A fonte de pesquisa em que os sinais fracos serão buscados.</span></p>
            </li>
            <li id="li_8"  style="display:none" >
                <label class="description" for="sentenceQuantity">Compressão de sentenças </label>
                <div>
                    <select class="element select high" id="sentenceQuantity" name="sentenceQuantity" >
                        <option value="0" >Selecione um grau de compressão</option>
                        <option value="0.25" >25% (compressão elevada)</option>
                        <option value="0.50" >50% (compressão média)</option>
                        <option value="0.75" >75% (compressão baixa)</option>
                        <option value="1" >100% (não comprimir)</option>
                    </select>
                </div>
                <p class="guidelines" id="guide_5"><span style="font-size: small;">O grau de compressão equivale à quantidade de sentenças extraídas. Se a opção selecionada for "100% (não comprimir)", todas as sentenças extraídas serão exibidas.</span></p>
            </li>

            <li id="li_7" class="buttons" style="display:flex">
                <input type="hidden" name="form_id" value="19052" />
                <input id="submit" class="button_text" type="submit" name="submit" value="Buscar" style="display:none"/>&nbsp;&nbsp;
                <input id="append" class="button_text" type="submit" name="append" value="Busca combinada" style="display:none"/>
                <input id="register" class="button_text" type="submit" name="register" value="Abrir gerenciador de fontes" onclick="window.open('crud.php')" style="display:none"/>
                <p class="guidelines" id="guide_5"  style="display:none"><span style="font-size: small;">Após uma busca combinada ser iniciada, enquanto for utilizada, o botão "Busca Combinada" deverá ser sempre clicado. Quando não houver mais interesse em combinar buscas, clique no botão "Cancelar" para extrair as sentenças.</span></p>
			</li>
        </ul>
    </form>
    <br/>
    <div id="footer">
        Generated by <a href="mailto:pedro_artico@hotmail.com">P.A.R</a>
    </div>
</div>
<img id="bottom" src="bottom.png" alt="">
<br/>
</body>
</html>
<?php
require_once 'URLSearch.php';
require_once 'GenericSearch.php';
require_once 'SpecificSearch.php';
require_once 'TopicSearch.php';

$urlSearch = new URLSearch();
$genericSearch = new GenericSearch();
$specificSearch = new SpecificSearch();
$topicSearch = new TopicSearch();
$urlSearch->searching();
$genericSearch->searching();
$specificSearch->searching();
$topicSearch->searching();
?>