<?php
/**
 * Created by PhpStorm.
 * User: Pedro Artico Rodrigues
 * Date: 07/07/2018
 * Time: 20:55
 */
require_once 'Sentencee.php';
require_once 'SpecialWords.php';

/**
 * This class is responsible for handling the content coming from a search. The treatment involves the use of regular expressions and native PHP methods to remove HTML, Javascript and CSS tags.
 */
class Content
{
    /**
     * This private attribute stores an object of type Sentence.
     * @var Sentence $Sentence
     */
    private $Sentence;
    /**
     * This private attribute stores an object of type SpecialWords.
     * @var SpecialWords $SpecialWords
     */
    private $SpecialWords;

    /**
     * The constructor has no parameters and is responsible for creating a Sentence object, an object of SpecialWords class, an object of SearchWindow class and assigning them to the corresponding attributes.
     */
    public function __construct()
    {
        $this->Sentence = new Sentence();
        $this->SpecialWords = new SpecialWords();
    }

    /**
     * This method gets a Sentence object type .
     * @return Sentence
     */
    public function getSentence()
    {
        return $this->Sentence;
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
     * This method is responsible for removing HTML TAGS from a WEB page while maintaining only textual content. The method uses a vector containing all existing TAGS and handles native PHP methods to perform the removal.
     * @param String $dirtyContent represents the content that has HTML tags.
     * @return String
     */
    public function cleanTags($dirtyContent)
    {
        $tags= array ('@<head[^>]*?>.*?</head>@siu', '@<script[^>]*?.*?</script>@siu', '@<object[^>]*?.*?</object>@siu', '@<embed[^>]*?.*?</embed>@siu', '@<applet[^>]*?.*?</applet>@siu', '@<noframes[^>]*?.*?</noframes>@siu', '@<noscript[^>]*?.*?</noscript>@siu', '@<noembed[^>]*?.*?</noembed>@siu','/<header[^>]*>([\s\S]*?)<\/header[^>]*>/', '/<span[^>]*>([\s\S]*?)<\/span[^>]*>/', '/<ul[^>]*>([\s\S]*?)<\/ul[^>]*>/', '/<li[^>]*>([\s\S]*?)<\/li[^>]*>/', '/<iframe[^>]*>([\s\S]*?)<\/iframe[^>]*>/', '/<link[^>]*>([\s\S]*?)<\/link[^>]*>/', '/<form[^>]*>([\s\S]*?)<\/form[^>]*>/', '/<label[^>]*>([\s\S]*?)<\/label[^>]*>/', '/<input[^>]*>([\s\S]*?)<\/input[^>]*>/', '/<button[^>]*>([\s\S]*?)<\/button[^>]*>/', '/<figcaption[^>]*>([\s\S]*?)<\/figcaption[^>]*>/', '/<figure[^>]*>([\s\S]*?)<\/figure[^>]*>/', '/<picture[^>]*>([\s\S]*?)<\/picture[^>]*>/', '/<audio[^>]*>([\s\S]*?)<\/audio[^>]*>/', '/<script[^>]*>([\s\S]*?)<\/script[^>]*>/', '/<table[^>]*>([\s\S]*?)<\/table[^>]*>/', '/<td[^>]*>([\s\S]*?)<\/td[^>]*>/', '/<tr[^>]*>([\s\S]*?)<\/tr[^>]*>/', '/<dl[^>]*>([\s\S]*?)<\/dl[^>]*>/', '/<dt[^>]*>([\s\S]*?)<\/dt[^>]*>/', '/<dd[^>]*>([\s\S]*?)<\/dd[^>]*>/', '/<svg[^>]*>([\s\S]*?)<\/svg[^>]*>/', '/<path[^>]*>([\s\S]*?)<\/path[^>]*>/', '/<image[^>]*>([\s\S]*?)<\/image[^>]*>/', '/<text[^>]*>([\s\S]*?)<\/text[^>]*>/', '/<style[^>]*>([\s\S]*?)<\/style[^>]*>/', '/<base[^>]*>([\s\S]*?)<\/base[^>]*>/', '/<h2[^>]*>([\s\S]*?)<\/h2[^>]*>/', '/<h3[^>]*>([\s\S]*?)<\/h3[^>]*>/', '/<h4[^>]*>([\s\S]*?)<\/h4[^>]*>/', '/<h5[^>]*>([\s\S]*?)<\/h5[^>]*>/', '/<h6[^>]*>([\s\S]*?)<\/h6[^>]*>/', '/<br[^>]*>([\s\S]*?)<\/br[^>]*>/', '/<em[^>]*>([\s\S]*?)<\/em[^>]*>/', '/(<(script|style)\b[^>]*>).*?(<\/\2>)/is', '/<footer[^>]*>([\s\S]*?)<\/footer[^>]*>/');
        $tagsAfterClean=  preg_replace($tags, "", $dirtyContent);
        return strip_tags($tagsAfterClean,"");
    }

    /**
     * This method is responsible for removing unwanted words from the content obtained. These words correspond to specific terms used in journalistic sites.
     * @param String $dirtyContent represents the content that has dirty words.
     * @return String
     */
    public function cleanWords($dirtyContent)
    {
        $insideTags= array ('Assinar:', 'This', 'work is', 'licensed', 'under a', 'more_horiz', "Comentários", "Deixe um comentário", "Copiar este link" ,"Estes são links externos e abrirão numa nova janela", "data-reactid=", "aki","Todos os direitos reservados", " Brasil 247: o seu jornal digital 24 horas por dia, 7 dias por semana © - Brasil 247", "Voltar" );
        return str_ireplace($insideTags, "", $dirtyContent);
    }

    /**
     * This method removes excessive white space from a content.
     * @param String $content represents the content with whitespaces.
     * @return String
     */
    public function removeWhiteSpace($content)
    {
        return preg_replace('/\s+/', ' ', $content);
    }
	

    /**
     * This method removes stopwords from a set of keywords.
     * @param String $key represents the keyword string.
     * @return String
     */
    public function removeSW($key)
    {
        $clean = array();
        $pieces = explode(" ", $key);
        foreach($pieces as $value)
        {
            if((!in_array($value, $this->SpecialWords->stopwordsVector())) && (!empty($value)))
            {
                $clean[] = $value;
            }
        }
        return implode(" ", $clean);
    }

    /**
     * Method responsible for clearing the contents of a file. It involves manipulating other methods of the class itself.
     * @param String $dirty represents the content in its raw form.
     * @return void
     */
    public function cleanContent($dirty)
    {
        $file = fopen('clean content.txt', "a+");
        fwrite($file, $this->removeWhiteSpace($this->cleanWords($this->cleanTags($dirty))));
        fclose($file);
    }
}