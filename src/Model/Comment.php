<?php


namespace App\Model;


class Comment
{
    private $id;
    private $pseudo;
    private $text;
    private $creationDate;
    private $report;
    private $moderate;
    private $chapterId;


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
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
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
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param mixed $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return mixed
     */
    public function getReport()
    {
        return $this->report;
    }

    /**
     * @param mixed $report
     */
    public function setReport($report)
    {
        $this->report = $report;
    }

    /**
     * @return mixed
     */
    public function getModerate()
    {
        return $this->moderate;
    }

    /**
     * @param mixed $moderate
     */
    public function setModerate($moderate)
    {
        $this->moderate = $moderate;
    }

    /**
     * @return mixed
     */
    public function getChapterId()
    {
        return $this->chapterId;
    }

    /**
     * @param mixed $chapterId
     */
    public function setChapterId($chapterId)
    {
        $this->chapterId = $chapterId;
    }


}