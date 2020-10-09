<?php
/**
 * Created by PhpStorm.
 * User: Pedro Artico Rodrigues
 * Date: 27/07/2018
 * Time: 21:41
 */

require_once 'SpecialWords.php';

/**
 * This class has the responsibility of extracting sentences from the contents of a WEB search.
 */
class Sentence
{
    /**
     * This private attribute stores an object of type SpecialWords.
     * @var SpecialWords $SpecialWords
     */
    private $SpecialWords;

    /**
     * The constructor has no parameters and is responsible for creating a SpecialWord object and assigning to the corresponding attribute.
     */
    public function __construct()
    {
        $this->SpecialWords = new SpecialWords();
    }

    /**
     * This method gets a SpecialWords object type.
     * @return SpecialWords
     */
    public function getSpecialWords()
    {
        return $this->SpecialWords;
    }

    /**
     * This method is responsible for clearing the keyword file, removing excessive whitespaces.
     * @return array
     */
    public function keywordsFileClean()
    {
		if(file_exists('keys.txt'))
		{	
			$key = file_get_contents('keys.txt');
			$clean= explode(" ",preg_replace('/\s+/', ' ', trim($key)));
			return $clean;
		}
	}

    /**
     * This method is responsible for separating the contents of the search file into sentences delimited by "." .
     * @return array
     */
    public function getSentencesFromFile()
    {
		if(file_exists('clean content.txt'))
		{			
			$sentences=array();
			$content = file_get_contents('clean content.txt');
			$c= preg_replace('/(\s)+/', ' ', trim($content));
			$array= explode(".",$c);
			for($i=0;$i<count($array);$i++)
			{
				$sentences[$i]=$array[$i].".";
			}
			return $sentences;
		}
	}

    /**
     * Method that searches for escape characters and unwanted characters, returning true, if they exist, and false if they do not exist.
     * @param String $sentence is the sentence extracted from the contents of a Web search.
     * @return boolean
     */
    public function checkForTrash($sentence)
	{
		if(preg_match('/^[^a-z]*$/', $sentence{0})) 
		{
			return false;
		} 
		else 
		{
			return true;
		}
	}

    /**
     * This method gets the size of a sentence (considering all the characters present).
     * @param String $sentence is the sentence extracted from the contents of a Web search.
     * @return int
     */
    public function filterSentencesBySize($sentence)
    {
        return strlen(implode("",(array)$sentence));
    }

    public function cleanSentences()
    {
        $trash=array("=", "{", "}","www","@","query","window");
        $vector=$this->getSentencesFromFile();
        for($i=0;$i<count($trash);$i++)
        {
            for($j=0;$j<count($vector);$j++)
            {
                if ((strpos($vector[$j], $trash[$i])==true) && ($this->checkForTrash($vector[$j])==true))
                {
                    $vector[$j]=" ";
                }
            }
        }
        return $vector;
    }
    /**
     * This method makes the extractive summarizing of the sentences according to the degree of compression established by the user.
     */
    public function extractSentences()
	{
		$degree= file_get_contents('degree.txt');
	    $sentences= array();
		for($i=0;$i<count($this->keywordsFileClean());$i++)
		{
			for($j=0;$j<count($this->cleanSentences());$j++)
			{
			    if ((strpos(strtolower($this->SpecialWords->removeAccents($this->SpecialWords->removePunctuationCharacters($this->getSentencesFromFile()[$j]))), strtolower($this->SpecialWords->removeAccents($this->SpecialWords->removePunctuationCharacters($this->keywordsFileClean()[$i]))))==true) && ($this->filterSentencesBySize($this->getSentencesFromFile()[$j])>34 && $this->filterSentencesBySize($this->getSentencesFromFile()[$j])<220))
				{
					$sentences[$j]= $this->getSentencesFromFile()[$j];
                    $this->getSentencesFromFile()[$j]="a";
				}
			}
		}	
		file_put_contents('sentences.txt',$sentences);
		$sentence=array();
        $array = explode(".", file_get_contents('sentences.txt'));
        unset($array[count($array)-1]);
        for ($i = 0; $i <ceil(count($array)*$degree);$i++)
        {
            $sentence[$i] = $array[$i] . ".";
        }
		
        $f=fopen('combined sentence.txt','a+');
        fwrite($f,implode(" ",$sentence));
	}

    /**
     * Generates an array of sentences that will be displayed to the user.
     * @return array
     */
    public function generateArray()
    {
        $sentence=array();
        $array = explode(".", file_get_contents('combined sentence.txt'));
        unset($array[count($array)-1]);
        for ($i = 0; $i <count($array);$i++)
        {
            $sentence[$i] = $array[$i] . ".";
        }
        return $sentence;
    }

    /**
     * Generates an array containing the statements that have been selected by the user as possible weak signals.
     * @return array
     */
    public function selectedSentencesArray()
    {
        $selected=array();
        $sentences= file_get_contents('selected sentences.txt');
        for($i=0;$i<count(explode('.',$sentences));$i++)
        {
            $selected[$i]=explode('.',$sentences)[$i].".";
        }
        unset($selected[count($selected)-1]);
        return $selected;
    }
}