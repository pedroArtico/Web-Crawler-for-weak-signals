<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Leitura de Fontes</title>
    <link rel="icon" href="articles.ico" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="view4.css" media="all">
    <script type="text/javascript" src="view.js"></script>
</head>
<body id="main_body" link= "#0000FF" alink= "#0000FF" vlink= "#0000FF">
<img id="top" src="top.png" alt="">
<div id="form_container">
    <h1><a>URLs</a></h1>
    <form id="form_22429" class="appnitro"  method="post" action="">
        <div class="form_description">
            <h2 style="text-align: center">Fontes</h2>
            <p></p>
        </div>
        <ul >
            <li id="li_1" >
                <label class="description" for="element_1"> </label>
                <div>
                    <?php
                    require_once 'SentenceListWindow.php';
                    $show = new SentenceListWindow();
                    $show->listArticles();
                    ?>
                </div>
                <p class="guidelines" id="guide_1"><span style="font-size: small;">Clique no link para acessar a página</span></p>
            </li>
        </ul>
    </form>
    <div id="footer">
        Generated by <a href="mailto:pedro_artico@hotmail.com">P.A.R</a>
    </div>
</div>
<img id="bottom" src="bottom.png" alt="">
</body>
</html>