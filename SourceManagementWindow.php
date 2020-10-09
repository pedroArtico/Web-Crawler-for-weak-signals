<?php
/**
 * Created by PhpStorm.
 * User: Pedro Artico Rodrigues
 * Date: 02/08/2018
 * Time: 14:59
 */

/**
 * This class is responsible for getting the GUI values ​​and passing it to the Source Management class.
 */
class SourceManagementWindow
{
    /**
     * This attribute stores the value of the selected field.
     * @var String $optionField
     */
    private $optionField;
    /**
     * This attribute contains the list of registered sources.
     * @var String $sourceList
     */
    private $sourceList;
    /**
     * This attribute contains a URL name.
     * @var String $urlNameField
     */
    private $urlNameField;
    /**
     * This attribute contains a URL.
     * @var String $urlField
     */
    private $urlField;
    /**
     * This attribute stores the value of the add button.
     * @var String $addButton
     */
    private $addButton;
    /**
     * This attribute stores the value of the delete button.
     * @var String $deleteButton
     */
    private $deleteButton;

    /**
     * The constructor has no parameters, and its responsibility is to check if the values ​​are present in the GUI, if they are, it assigns to the corresponding private attributes.
     */
    public function __construct()
    {
        if(isset($_POST['option_Register']))
            $this->optionField = $_POST['option_Register'];
        if(isset($_POST['sources']))
            $this->sourceList = $_POST['sources'];
        if(isset($_POST['url_name']))
            $this->urlNameField = $_POST['url_name'];
        if(isset($_POST['url_register']))
            $this->urlField = $_POST['url_register'];
        if(isset($_POST['add']))
            $this->addButton = $_POST['add'];
        if(isset($_POST['delete']))
            $this->deleteButton = $_POST['delete'];
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
     * This method gets the source list and returns a string array.
     * @return String
     */
    public function getSourceList()
    {
        return $this->sourceList;
    }

    /**
     * This method gets the URL name and return a string.
     * @return String
     */
    public function getUrlNameField()
    {
        return $this->urlNameField;
    }

    /**
     * This method gets the URL and return a string.
     * @return String
     */
    public function getUrlField()
    {
        return $this->urlField;
    }

    /**
     * This method gets the button value and returns a string.
     * @return String
     */
    public function getAddButton()
    {
        return $this->addButton;
    }

    /**
     * This method gets the delete button value and returns a string.
     * @return String
     */
    public function getDeleteButton()
    {
        return $this->deleteButton;
    }
}