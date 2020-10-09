<?php
/**
 * Created by PhpStorm.
 * User: Pedro Artico Rodrigues
 * Date: 07/08/2018
 * Time: 20:20
 */

require_once "SearchEngine.php";
require_once "Searchh.php";

/**
 * This class is responsible for searching for weak signals through a user-specified keywords. In this type of search, search engines are used.
 */
class SpecificSearch extends Search
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
     * This private attribute stores the value of source.
     * @var String $source
     */
    private $source;

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
     * This method gets a SearchEngine type object.
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
     * This method gets a source.
     * @return String
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * This method is responsible for writing the data (the parameters themselves) to a text file.
     * @param String $keywords represents the keywords in which the user wishes to search for weak signals.
     * @param String $year represents the year in which the user wishes to search for weak signals.
     * @param String $source represents the source chosen by the user to search for weak signals.
     * @return void
     */
    public function writeSpecificSearchOnFile($keywords, $year, $source)
    {
        $file = fopen('keywords.txt', "w");
        fwrite($file, $this->Content->getSpecialWords()->removeAccents($this->Content->removeSW($this->Content->getSpecialWords()->removePunctuationCharacters($keywords))) . " " . $source . " " . $year);
        fclose($file);
        $file2 = fopen('keys.txt', "w");
        fwrite($file2, $this->Content->getSpecialWords()->removeAccents($this->Content->removeSW($this->Content->getSpecialWords()->removePunctuationCharacters($keywords))));
        fclose($file2);
    }

    /**
     * This method checks if all requirements (fields filled) to perform a SpecificSearch are satisfied.
     * @return boolean
     */
    public function verifyISpecificSearch()
    {
        if(($this->Search->getOptionField() == '3' && $this->Search->getKeywordsField()!="" && $this->Search->getSearchEngineField()!='0' && $this->Search->getYearField()!='0' && $this->Search->getSourceField()!='0' && $this->Search->getDegreeOfCompressionField()!='0'))
        {
            return true;
        }
        else
            return false;
    }

    /**
     * This polymorphic method has no parameters, and is responsible for calling all methods of other classes that compose a SpecificSearch.
     * @return void
     */
    public function searching()
    {
        if ((($this->verifyIfSearchExists()==true)) && ($this->verifyISpecificSearch()==true))
        {
            $this->writeSpecificSearchOnFile($this->Search->getKeywordsField(),$this->Search->getYearField(),$this->Search->getSourceField());
            $this->SearchEngine->chooseSearchEngine($this->Search->getSearchEngineField());
            $this->contentSearching();
            $this->writeDegreeOfCompressionField($this->Search->getDegreeOfCompressionField());
            $this->Content->getSpecialWords()->stemmingKeywords();
            $this->Content->getSentence()->extractSentences();
            $this->Search->searchMode();
        }
    }

}