<?php
/**
 * Created by PhpStorm.
 * User: Pedro Artico Rodrigues
 * Date: 27/07/2018
 * Time: 16:01
 */

require_once "SourceManagementWindow.php";

/**
 * This class is responsible for managing sources, and contains query, delete, and insert methods.
 */
class SourceManagement
{
    /**
     * This private attribute stores an object of type SourceManagementWindow.
     * @var SourceManagementWindow $FieldValue
     */
    private $FieldValue;

    /**
     * The constructor has no parameters and is responsible for creating a SearchWindow object and an object of the Content class and assigning them to the corresponding attributes
     */
    public function __construct()
    {
        $this->FieldValue = new SourceManagementWindow();
    }

    /**
     * This method get the field value.
     * @return SourceManagementWindow
     */
    public function getFieldValue()
    {
        return $this->FieldValue;
    }

    /**
     * This method has no parameters, and is responsible for the source register.
     * @return void
     *
     */
    public function addSource()
    {
        $add = $this->FieldValue->getAddButton();
        if (isset($add) && $this->FieldValue->getUrlField()!= "" && $this->FieldValue->getUrlNameField() != "")
        {
            if ($this->verifyIfNotExists()== false && filter_var($this->FieldValue->getUrlField(), FILTER_VALIDATE_URL)) 
			{
                $option = "<option value=" . "site:" . $this->FieldValue->getUrlField() . ">" . utf8_decode($this->FieldValue->getUrlNameField()) . "</option>";
                $fp = fopen('sources.txt', "a+");
                fwrite($fp, $option . PHP_EOL);
                fclose($fp);
                echo("<script>alert('Fonte de pesquisa cadastrada com sucesso!')</script>");
			}
			else 
			{
				echo("<script>alert('URL inválida!')</script>");
			}
        }
    }
    /**
     * This method has no parameters, and is responsible for the deletion of sources.
     * @return void
     */
    public function deleteSource()
    {
        $delete = $this->FieldValue->getDeleteButton();
        if (isset($delete))
        {
            $arr = file('sources.txt');
            foreach($arr as $k=>$line)
            {
                if(strpos($line, $this->FieldValue->getSourceList())!==false)
                {
                    unset($arr[$k]);
                }
            }
            file_put_contents('sources.txt',$arr);
            echo("<script>alert('Fonte de pesquisa deletada com sucesso!')</script>");
        }
    }
    /**
     * This method has no parameters, and is responsible for listing the sources.
     * @return void
     */
    public function listSources()
    {
        foreach (file('sources.txt') as $line)
        {
            echo utf8_encode($line) . "\n";
        }
    }
    /**
     * This method checks if a source is already registered and returns a true boolean if the source is, and false otherwise.
     * @return boolean
     */
    public function verifyIfNotExists()
    {
        $arr = file('sources.txt');
        $cont=0;
        foreach ($arr as $k => $line)
        {
            if (strpos($line, $this->FieldValue->getUrlField()) !== false || strpos($line, $this->FieldValue->getUrlNameField()) !== false )
                $cont++;
        }
        if($cont>0)
        {
            print( "<script>alert('Essa fonte já está cadastrada!');</script>");
            return true;
        }
        else
            return false;
    }
}