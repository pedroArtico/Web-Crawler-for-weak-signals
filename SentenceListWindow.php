<?php
/**
 * Created by PhpStorm.
 * User: Pedro Artico Rodrigues
 * Date: 24/07/2018
 * Time: 05:13
 */

require_once 'Sentencee.php';

/**
 * This class is responsible for getting the GUI values ​​and passing it to the Sentence class.
 */
class SentenceListWindow
{
    /**
     * This private attribute stores the value of export sentences button.
     * @var String $exportSentencesButton
     */
    private $exportSentencesButton;

    /**
     * This private attribute stores the value of read articles button.
     * @var String $readArticlesButton
     */
    private $readArticlesButton;
    /**
     * This private attribute stores the value of a Sentence.
     * @var Sentence $Sentence
     */
    private $Sentence;

    /**
     * The constructor has no parameters, and its responsibility is to check if the values ​​are present in the GUI, if they are, it assigns to the corresponding private attributes.
     */
    public function __construct()
    {
        if (isset($_POST['showSentences']))
            $this->extractSentencesButton = $_POST['showSentences'];
        if (isset($_POST['exportSentences']))
            $this->exportSentencesButton = $_POST['exportSentences'];
        if (isset($_POST['readArticle']))
            $this->readArticlesButton = $_POST['readArticle'];

        $this->Sentence = new Sentence();
    }


    /**
     * This method gets the export sentences button and returns a String.
     * @return String
     */
    public function getExportSentencesButton()
    {
        return $this->exportSentencesButton;
    }

    /**
     * This method gets the read articles button and returns a String.
     * @return String
     */
    public function getReadArticlesButton()
    {
        return $this->readArticlesButton;
    }

    /**
     * This method gets a Sentence object type.
     * @return Sentence
     */
    public function getSentence()
    {
        return $this->Sentence;
    }

    /**
     * Method that displays the array of statements in the GUI for the user.
     * @return void
     */
    public function listSentences()
    {
        $button = $this->getExportSentencesButton();
        if (!isset($button))
        {
            if (file_exists('combined sentence.txt'))
            {
                if (filesize('combined sentence.txt') == 0)
                {
                    echo("<script>alert('OPS, nenhuma sentença foi extraída! Verifique se os termos inseridos são válidos!')</script>");
                    if (file_exists('keys.txt'))
                    {
                        unlink('keys.txt');
                    }
                    if (file_exists('keywords.txt'))
                    {
                        unlink('keywords.txt');
                    }
                    if (file_exists('urls.txt'))
                    {
                        unlink('urls.txt');
                    }
                    if (file_exists('clean content.txt'))
                    {
                        unlink('clean content.txt');
                    }
                    if (file_exists('dirty content.html'))
                    {
                        unlink('dirty content.html');
                    }
                    if (file_exists('sentences.txt'))
                    {
                        unlink('sentences.txt');
                    }
                    if (file_exists('degree.txt'))
                    {
                        unlink('degree.txt');
                    }
                    if (file_exists('list Urls.txt'))
                    {
                        unlink('list Urls.txt');
                    }
                    if (file_exists('combined sentence.txt'))
                    {
                        unlink('combined sentence.txt');
                    }
                    if (file_exists('selected sentences.txt'))
                    {
                        unlink('selected sentences.txt');
                    }
                    echo("<script>window.close();</script>");
                }
                else
                    for ($i = 0; $i < count($this->Sentence->generateArray()); $i++)
                    {
                        $a = $i + 1;
                        $c = $this->Sentence->generateArray()[$i];
                        echo("$a<input class='element checkbox' name='selected[]' type='checkbox' value='$c' /> <label class='choice' style='text-align: justify; font-weight: bold'>" . $this->Sentence->generateArray()[$i] . "</label>");
					}
            }
            else
					echo("<b>O arquivo de sentenças não existe!</b>");
        }
        if (isset($button))
        {
			$this->cleanTemporary();			
        }
    }

    /**
     * Method that gets the selected sentences and stores them in a file.
     * @return void
     */
    public function getSelectedSentences()
    {
		if(isset($_POST['selected']))
		{	
            $f= fopen('selected sentences.txt', 'a+');
            fwrite($f,implode("",$_POST['selected']));
			fclose($f);

        }
	}
	/**
     * Method that shows the selected sentences.
     * @return void
     */
    public function showSelectedSentences()
    {	if(file_exists('selected sentences.txt'))
		{
			$array = explode(".", file_get_contents('selected sentences.txt'));
			unset($array[count($array)-1]);
			for ($i = 0; $i <count($array);$i++)
			{
				echo("<li style='text-align:justify'><a href='#'>".  $array[$i] . "." ."<br />"."<br />". "</a></li>");
			}
		}
		else
			echo("<b>Se as sentenças não aparecerem, recarregue a página apertando f5</b>");
	}
	
    /**
     * Method that gets the news article link.
     * @return array
     */
    public function getArticles()
    {
		if(file_exists('list Urls.txt'))
		{	
			$a = file_get_contents('list Urls.txt');
			$string = str_replace("'\'", "", $a);
			preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $string, $match);
			return $match[0];
		}
		else
			echo("<b>O arquivo contendo os artigos não existe!<b>");
    }

    /**
     * Method that lists the news article link.
     * @return void
     */
    public function listArticles()
    {
        $article = "Fonte";
        for ($i = 0; $i < count($this->getArticles()); $i++)
        {
            $a = $i + 1;
            echo("<a href=" . $this->getArticles()[$i] . " " . "target='_blank' style='font-size: 16px'>" . $article . " " . $a . "</a> <br/>");
        }
    }
	
	/**
     * This method is responsible for clearing temporary files when close window button is clicked.
     * @return void
     */
    public function cleanTemporary()
    { 
            if(file_exists('sentences.txt'))
            {
                unlink('sentences.txt');
            }
            if(file_exists('degree.txt'))
            {
                unlink('degree.txt');
            }
            if(file_exists('list Urls.txt'))
            {
                unlink('list Urls.txt');
            }
            if(file_exists('combined sentence.txt'))
            {
                unlink('combined sentence.txt');
            }			
    }


    /**
     * This method is responsible for clearing temporary files when a new search is performed.
     */
    public function cleanTemporaryFiles()
    {
        if(isset($_POST['close']))
        {
            if(file_exists('keys.txt'))
            {
                unlink('keys.txt');
            }
            if(file_exists('keywords.txt'))
            {
                unlink('keywords.txt');
            }
            if(file_exists('urls.txt'))
            {
                unlink('urls.txt');
            }
            if(file_exists('clean content.txt'))
            {
                unlink('clean content.txt');
            }
            if(file_exists('dirty content.html'))
            {
                unlink('dirty content.html');
            }
            if(file_exists('sentences.txt'))
            {
                unlink('sentences.txt');
            }
            if(file_exists('degree.txt'))
            {
                unlink('degree.txt');
            }
            if(file_exists('list Urls.txt'))
            {
                unlink('list Urls.txt');
            }
            if(file_exists('combined sentence.txt'))
            {
                unlink('combined sentence.txt');
            }
            if(file_exists('selected sentences.txt'))
            {
                unlink('selected sentences.txt');
            }

			echo("<script>window.close();</script>");
		}
    }


	
}