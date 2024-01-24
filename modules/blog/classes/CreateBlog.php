<?php

echo 'DSD';
error_log('DIR LOAD');

class newBlog
{
    protected $id;
    protected $title;
    protected $content;
    protected $author;
    protected $date;
    protected $conn;

    public function __construct($id, $title, $content, $author, $date, $conn)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->date = $date;
        $this->conn = $conn;
    }

    public function getId()
    {
        return $this->id;
    }

    public function changeData($title, $content, $author, $date)
    {
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
         $this->date = $date;
    }

    public function createBlog()
    {
        $sql = "INSERT INTO blog (id, title, content, author, date) VALUES ('$this->id', '$this->title', '$this->content', '$this->author', '$this->date')";
        $result = $this->conn->query($sql); // Use $this->conn instead of $conn
        if ($result) {
            echo 'Blog created successfully';
        } else {
            echo 'Error: '.$sql.'<br>'.$this->conn->error;
        }
    }

    public function __destruct()
    {
    }
}
