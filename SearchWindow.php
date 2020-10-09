<?php
/**
 * Created by PhpStorm.
 * User: Pedro Artico Rodrigues
 * Date: 22/07/2018
 * Time: 07:54
 */

/**
 * This class is responsible for getting the values ​​from the GUI and passing them to the abstract class Search.
 */
class SearchWindow
{
    /**
     * This attribute stores the value of the option selected by the user. Values ​​comprise the range of 1-5.
     * @var String $optionField
     */
    private $optionField;
    /**
     * This attribute stores the URL entered in the corresponding GUI field.
     * @var String $url
     */
    private $url;
    /**
     * This attribute stores keywords entered in the corresponding field of the GUI.
     * @var String $keywordsField
     */
    private $keywordsField;
    /**
     * This attribute stores the inserted topic in the corresponding GUI field.
     * @var String $topicField
     */
    private $topicField;
    /**
     * This attribute stores the value of search engine field.
     * @var String $searchEngineField
     */
    private $searchEngineField;
    /**
     * This attribute stores the numeric value of the year field, obtained in GUI.
     * @var String $yearField
     */
    private $yearField;
    /**
     * This attribute stores the numeric value of the font selection field, obtained in the GUI.
     * @var String $sourceField
     */
    private $sourceField;
	

    /**
     * This attribute stores the value of search button.
     * @var String $searchButton
     */
    private $searchButton;
    /**
     * This attribute stores the value of the combined search button.
     * @var String $combinedSearchButton
     */
    private $combinedSearchButton;
    /**
     * This attribute stores the value of the source management button.
     * @var String $sourceManagementButton
     */
    private $sourceManagementButton;
    /**
     * This attribute stores the value of selection´s degree of sentence compression
     * @var String $degreeOfCompressionField
     */
    private $degreeOfCompressionField;
    /**
     * The constructor has no parameters, and its responsibility is to check if the values ​​are present in the GUI, if they are, it assigns to the corresponding private attributes.
     */
    public function __construct()
    {
        if(isset($_POST['option']))
            $this->optionField = $_POST['option'];
        if(isset($_POST['url']))
            $this->url = $_POST['url'];
        if(isset($_POST['key']))
            $this->keywordsField = $_POST['key'];
        if(isset($_POST['topic']))
            $this->topicField = $_POST['topic'];
        if(isset($_POST['websearch']))
            $this->searchEngineField = $_POST['websearch'];
        if(isset($_POST['year']))
            $this->yearField = $_POST['year'];
        if(isset($_POST['source']))
            $this->sourceField = $_POST['source'];
        if(isset($_POST['submit']))
            $this->searchButton = $_POST['submit'];
        if(isset($_POST['append']))
            $this->combinedSearchButton = $_POST['append'];
        if(isset($_POST['register']))
            $this->sourceManagementButton = $_POST['register'];
        if(isset($_POST['sentenceQuantity']))
            $this->degreeOfCompressionField = $_POST['sentenceQuantity'];
    }
    /**
     * This method gets the option field and returns a String.
     * @return String
     */
    public function getOptionField()
    {
        return $this->optionField;
    }

    /**
     * This method gets the URL field from GUI.
     * @return String
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * This method obtains the value from the keywords field from GUI.
     * @return String
     */
    public function getKeywordsField()
    {
        return $this->keywordsField;
    }

    /**
     * This method obtains the value of topic field from GUI.
     * @return String
     */
    public function getTopicField()
    {
        return $this->topicField;
    }

    /**
     * This method gets the value of selected field from search engines
     * @return String
     */
    public function getSearchEngineField()
    {
        return $this->searchEngineField;
    }

    /**
     * This method gets the year value from GUI
     * @return String
     */
    public function getYearField()
    {
        return $this->yearField;
    }

    /**
     * This method gets the value of selected field from sources
     * @return String
     */
    public function getSourceField()
    {
        return $this->sourceField;
    }

    /**
     * This method gets the search button value.
     * @return String
     */
    public function getSearchButton()
    {
        return $this->searchButton;
    }

    /**
     * This method get the combined search button value.
     * @return String
     */
    public function getCombinedSearchButton()
    {
        return $this->combinedSearchButton;
    }

    /**
     * This method gets the source management button value.
     * @return String
     */
    public function getSourceManagementButton()
    {
        return $this->sourceManagementButton;
    }

    /**
     * This method gets the degree compression field.
     * @return String
     */
    public function getDegreeOfCompressionField()
    {
        return $this->degreeOfCompressionField;
    }


    /**
     * This method is responsible for clearing temporary files when a new search is performed.
     */
    public function cleanTemporaryFiles()
    {
        if(isset($this->searchButton))
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
            if(file_exists('c content.txt'))
            {
                unlink('c content.txt');
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
			
        }
        if(isset($this->combinedSearchButton))
        {
            if(file_exists('clean content.txt'))
            {
                unlink('clean content.txt');
            }
            if(file_exists('dirty content.html'))
            {
                unlink('dirty content.html');
            }
            if(file_exists('c content.txt'))
            {
                unlink('c content.txt');
            }
            if(file_exists('keys.txt'))
            {
                unlink('keys.txt');
            }
            if(file_exists('selected sentences.txt'))
            {
                unlink('selected sentences.txt');
            }			
        }
    }
    /**
     * This method is responsible for updating the font file with each modification and displaying it in the GUI.
     */
    public function reloadSourceFile()
    {
        foreach (file('sources.txt') as $line)
        {
            echo utf8_encode($line) . "\n";
        }
    }
    /**
     * This method is responsible for identifying which search button was clicked, and redirects the user to the sentence screen at the corresponding time.
     */
    public function searchMode()
    {
        if (isset($this->searchButton))
        {
			if((!file_exists('clean content.txt')) || filesize('clean content.txt')==0)
			{
				echo("<script>alert('A busca não retornou resultados! Tente modificar os parâmetros da busca!');</script>");
				$this->cleanTemporaryFiles();
			}	
			else
				echo("<script>window.open('sentence.php');</script>");				
        }
        if (isset($this->combinedSearchButton))
        {
			if((!file_exists('clean content.txt')) || filesize('clean content.txt')==0)
			{
				echo("<script>alert('A busca não retornou resultados! Tente modificar os parâmetros da busca!');</script>");				
			}	
            echo("<script>msg = 'Deseja fazer outra busca?  Clique em OK para continuar buscando, ou CANCELAR para extrair sentenças.';
                if(!confirm(msg)) 
                {
                    window.open('sentence.php');
                }
                </script>");
        }
    }
}