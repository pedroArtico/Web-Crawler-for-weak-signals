<?php
/**
 * Created by PhpStorm.
 * User: Pedro Artico Rodrigues
 * Date: 20/07/2018
 * Time: 23:43
 */

/**
 * This class is responsible for Web browsers, and contains methods that match calls to python scripts.
 */
class SearchEngine
{
    /**
     * This method is responsible for calling a python script that performs a Google search and generates a URL file.
     * @return void
     */
    public function googleSearch()
    {
        shell_exec(escapeshellcmd('python Google.py'));
    }

    /**
     * This method is responsible for calling a python script that performs a Google News search and generates a URL file.
     * @return void
     */
    public function googleNewsSearch()
    {
        shell_exec(escapeshellcmd('python GoogleNoticias.py'));
    }

    /**
     * This method is responsible for calling a python script that performs a Bing search and generates a URL file.
     * @return void
     */
    public function bingSearch()
    {
        shell_exec(escapeshellcmd('python Bing.py'));
    }

    /**
     * This method is responsible for calling a python script that performs a Bing News search and generates a URL file.
     * @return void
     */
    public function bingNewsSearch()
    {
        shell_exec(escapeshellcmd('python BingNoticias.py'));
    }

    /**
     * This method is responsible for triggering one of the class methods, and has an option as the parameter.
     * @param String $option represents the search engine chosen by the user.
     * @return void
     */
    public function chooseSearchEngine($option)
    {
        switch($option)
        {
            case "google":
                $this->googleSearch();
                break;

            case "google noticias":
                $this->googleNewsSearch();
                break;

            case "bing":
                $this->bingSearch();
                break;

            case "bing noticias":
                $this->bingNewsSearch();
                break;

            default:
                print("<script>alert('Um erro ocorreu, atualize a página! Se o erro persistir, contate o suporte enviando a seguinte mensagem: Error in method chooseSearchEngine(option).');</script>");
        }
    }
}