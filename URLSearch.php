<?php
/**
 * Created by PhpStorm.
 * User: Pedro Artico Rodrigues
 * Date: 14/08/2018
 * Time: 13:26
 */
require_once "Searchh.php";

/**
 * This class is responsible for searching for weak signals from a specific URL chosen by a user, that is, search engines are not used.
 */
class URLSearch extends Search
{
    /**
     * This method checks if all requirements (fields filled) to perform a URLSearch are satisfied.
     * @return boolean
     */
    public function verifyIfURLSearch()
    {
        if(($this->Search->getOptionField() == '1' && $this->Search->getUrl()!="" && $this->Search->getDegreeOfCompressionField()!='0' && filter_var($this->Search->getUrl(), FILTER_VALIDATE_URL)))
        {
           return true;
        }
        else
           return false;
    }
    /**
     * This method is responsible for getting the URL entered by the user and writing it to a file.
     * @param String $URLs is the parameter that contains the URL entered by the user.
     * @return void
     */
    public function writeURLs($URLs)
    {
        $fp= fopen('list Urls.txt','a+');
        fwrite($fp,$URLs. "\r\n");
        fclose($fp);
    }
    /**
     * This polymorphic method has no parameters, and is responsible for calling all methods of other classes that compose a URLSearch.
     * @return void
     */
    public function searching()
    {
        if((($this->verifyIfSearchExists()==true)) && ($this->verifyIfURLSearch()==true))
        {
            $this->Content->cleanContent($this->downloadWebPage($this->Search->getUrl()));
            $this->Content->getSpecialWords()->extractKeywords();
            $this->writeDegreeOfCompressionField($this->Search->getDegreeOfCompressionField());
            $this->writeURLs($this->Search->getUrl());
            $this->Content->getSpecialWords()->stemmingKeywords();
            $this->Content->getSentence()->extractSentences();
            $this->Search->searchMode();
        }
    }
}