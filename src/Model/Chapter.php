<?php

namespace App\Model;

class Chapter
{
    private $id;
    private $title;
    private $text;
    private $creation_date;
    private $comments = [];

    public function __construct($values = null){
        if ($values != null)
        {
            $this->hydrate($values);
        }
    }

    public function hydrate(array $values){
        foreach ($values as $key => $value)
        {
            $elements = explode("_", $key);
            $newKey = "";
            foreach ($elements as $el) {
                $newKey .= ucfirst($el);
            }
            $method = "set" . ucfirst($newKey);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getCreationdate()
    {
        return $this->creation_date;
    }

    /**
     * @param mixed $creationDate
     */
    public function setCreationdate($creation_date)
    {
        $this->creation_date = $creation_date;
    }

    /**
     * @return array
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param array $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }
}




