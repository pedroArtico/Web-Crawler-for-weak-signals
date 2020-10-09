<?php
/**
 * Created by PhpStorm.
 * User: Pedro Artico Rodrigues
 * Date: 09/07/2018
 * Time: 22:43
 */
require_once "SearchEngine.php";
require_once "Searchh.php";

/**
 * This class is responsible for searching for weak signals through a user-specified keywords. In this type of search, search engines are used, but sources are not used.
 */
class GenericSearch extends Search
{
    /**
     * This private attribute stores the value of keywords.
     * @var String $keywords
     */
    private $keywords;
    /**
     * This private attribute stores an object of type SearchEngine.
     * @var SearchEngine $SearchEngine
     */
    private $SearchEngine;
    /**
     * This private attribute stores the value of a year.
     * @var String $year
     */
    private $year;

    /**
     * The constructor has no parameters and is responsible for creating a SearchEngine object and assigning to corresponding attribute.
     */
    public function __construct()
    {
        parent::__construct();
        $this->SearchEngine = new SearchEngine();
    }

    /**
     * This method gets keywords.
     * @return String
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * This method gets a SearchEngine object type.
     * @return SearchEngine
     */
    public function getSearchEngine()
    {
        return $this->SearchEngine;
    }

    /**
     * This method gets a year.
     * @return String $year
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * This method is responsible for writing the data (the parameters themselves) to a text file.
     * @param String $keywords represents the keywords in which the user wishes to search for weak signals.
     * @param String $year represents the year in which the user wishes to search for weak signals.
     * @return void
     */
    public function writeGenericSearchOnFile($keywords, $year)
    {
        $file = fopen('keywords.txt', "w");
        fwrite($file,  $this->Content->getSpecialWords()->removeAccents($this->Content->removeSW($this->Content->getSpecialWords()->removePunctuationCharacters($keywords))) . " " . $year);
        fclose($file);
        file_put_contents('keys.txt', $this->Content->getSpecialWords()->removeAccents($this->Content->removeSW($this->Content->getSpecialWords()->removePunctuationCharacters($keywords))));
    }

    /**
     * This method checks if all requirements (fields filled) to perform a GenericSearch are satisfied.
     * @return boolean
     */
    public function verifyGenericSearch()
    {
        if(($this->Search->getOptionField() == '2' && $this->Search->getKeywordsField()!="" && $this->Search->getSearchEngineField()!='0' && $this->Search->getYearField()!='0' && $this->Search->getDegreeOfCompressionField()!='0'))
        {
            return true;
        }
        else
            return false;
    }

    /**
     * This polymorphic method has no parameters, and is responsible for calling all methods of other classes that compose a GenericSearch.
     * @return void
     */
    public function searching()
    {
        if (($this->verifyIfSearchExists()==true) && ($this->verifyGenericSearch()==true) )
        {
            $this->writeGenericSearchOnFile($this->Search->getKeywordsField(), $this->Search->getYearField());
            $this->SearchEngine->chooseSearchEngine($this->Search->getSearchEngineField());
            $this->contentSearching();
            $this->writeDegreeOfCompressionField($this->Search->getDegreeOfCompressionField());
            $this->Content->getSpecialWords()->stemmingKeywords();
            $this->Content->getSentence()->extractSentences();
            $this->Search->searchMode();
        }
    }
}