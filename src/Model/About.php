<?php


namespace App\Model;


class About
{
    private $id;
    private $text;



    public function __construct($values = null)
    {
        if ($values != null)
        {
            $this->hydrate($values);
        }
    }

    public function hydrate(array $values)
    {
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

}