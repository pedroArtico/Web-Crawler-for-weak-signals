<?php
/**
 * Created by PhpStorm.
 * User: Pedro Artico Rodrigues
 * Date: 17/07/2018
 * Time: 14:29
 */
require_once 'Content.php';

/**
 * This abstract class is the super class responsible for searching for weak signals on the Web.
 */
abstract class Search
{
    /**
     * This protected attribute stores an object of type SearchWindow.
     * @var SearchWindow $Search
     */
    protected $Search;
    /**
     * This protected attribute stores an object of type Content.
     * @var Content $Content
     */
    protected $Content;

    /**
     * The constructor has no parameters and is responsible for creating a Search window object and an object of the Content class and assigning them to the corresponding attributes.
     */
    public function __construct()
   {
       $this->Search = new SearchWindow();
       $this->Content = new Content();
   }

    /**
     * This method gets the content.
     * @return Content
     */
    public function getContent()
   {
       return $this->Content;
   }

    /**
     * This method gets the SearchWindow.
     * @return SearchWindow
     */
    public function getSearch()
   {
       return $this->Search;
   }

    /**
     * This method receives a URL as a parameter and is responsible for downloading a Web page. The method, in addition to storing HTML page in a file, returns a String decoding HTML tags.
     * @param String $url represents the URL entered by a user, or by a search engine.
     * @return string
     */
    public function downloadWebPage($url)
   {
       $crl = curl_init();
       curl_setopt ($crl, CURLOPT_URL,$url);
       curl_setopt($crl, CURLOPT_FAILONERROR, true);
       curl_setopt($crl, CURLOPT_FOLLOWLOCATION, true);
       curl_setopt($crl, CURLOPT_AUTOREFERER, true);
       curl_setopt ($crl, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt ($crl, CURLOPT_CONNECTTIMEOUT, 1200);
       set_time_limit(1200);
       $ret = curl_exec($crl);
       curl_close($crl);
       file_put_contents('dirty content.html',html_entity_decode($ret, ENT_QUOTES));
       return html_entity_decode($ret, ENT_QUOTES);
   }

    /**
     * This method takes an matrix and converts it to an array.
     * @param array $matrix is the matrix that would be converted to array.
     * @return array
     */
    public function matrixToArray($matrix)
   {
       $array=array();
       for($i=0;$i<count($matrix[0]);$i++)
       {
           $array[]=$matrix[0][$i];
       }
       return $array;
   }

    /**
     * This method reads a file containing URLs and applies REGEX, extracting them and storing them in an matrix.
     * @return array
     */
    public function getURLs()
   {
       $a = file_get_contents('urls.txt');
       $string = str_replace("'\'", "", $a);
       preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $string, $match);
       return $this->matrixToArray($match);
   }

    /**
     * This method receives a degree of compression field value and writes it to a file.
     * @param String $degree is the degree of compression chosen by the user, ranging from 0.25 to 1.0.
     * @return void
     */
    public function writeDegreeOfCompressionField($degree)
   {
        file_put_contents('degree.txt',$degree);
   }

    /**
     * This method is responsible for fetching the contents of a search.
     * @return void
     */
      public function contentSearching()
   {
       $array = $this->getURLs();
       for ($i = 0; $i < count($array); $i++)
       {
           if($array[$i]!= "http://www.google.com/preferences?hl=pt-BR&fg=1")
           {
               if(strpos($array[$i],"UTF-8")==false)
               {
                   if(strpos($array[$i],"video")==false)
                   {
                       if(strpos($array[$i],"youtube")==false)
                       {
                           $content[$i] = ($this->downloadWebPage($array[$i]));
                           if(!empty(trim($content[$i]) || $content[$i]==" "))
                           {
                               $this->Content->cleanContent($content[$i]);
                               $url[] = $array[$i]."\r\n"."\r\n";
                           }
                       }
                   }
               }
           }
       }
       file_put_contents("list urls.txt", $url);
   }

    /**
     * This method checks whether one of the search buttons has been clicked, returning a boolean.
     * @return boolean
     */
    public function verifyIfSearchExists()
   {
       $submit= $this->Search->getSearchButton();
       $combinedSearch= $this->Search->getCombinedSearchButton();
       if ((isset($submit) || isset($combinedSearch)))
       {
           return true;
       }
       else
           return false;
   }

    /**
     * This abstract method has four different implementations in the subclasses, being responsible for calling other methods that make up the system.
     * @return void
     */
    public abstract function searching();
}