<?php
/**
 * Created by PhpStorm.
 * User: ban
 * Date: 2018-12-17
 * Time: 14:07
 */

class request
{
    private $title;
    private $author;
    private $isbn;
    private $keyword;
    private $language;
    private $laboratory;
    private $university;


    function __construct1($title, $author, $isbn, $keyword, $laboratory, $language, $university){

        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->keyword = $keyword;
        $this->laboratory = $laboratory;
        $this->language = $language;
        $this->university = $university;
    }

    function __construct() {

    }

    function create() {

    }
}