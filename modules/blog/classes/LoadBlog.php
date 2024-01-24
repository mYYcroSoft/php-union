<?php

class BlogListResult
{
    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->BlogList = [];
        $this->getBlogs();
    }

    public function getBlogList()
    {
        return $this->BlogList;
    }

    protected function getBlogs()
    {
        $sql = 'SELECT * FROM blog';
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            foreach ($result as $row) {
                $this->BlogList[] = new Blog($row['id'], $this->conn);
            }
            echo 'Blog loaded successfully';
        } else {
            echo 'Error: '.$sql.'<br>'.$this->conn->error;
        }
    }
}

class Blog
{
    public function __construct($id, $conn)
    {
        $this->conn = $conn;
        $this->id = $id;
        $instanceLoadData = $this->loadBlog($this->id);
        $this->title = $instanceLoadData['title'];
        $this->content = $instanceLoadData['content'];
        $this->author = $instanceLoadData['author'];
        $this->date = $instanceLoadData['date'];
    }

    protected function loadBlog($id)
    {
        $sql = "SELECT * FROM blog WHERE id = '$id'";
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            echo 'Error: '.$sql.'<br>'.$this->conn->error;
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getData()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'date' => $this->date,
            'author' => $this->author,
            'content' => $this->content,
        ];
    }

    public function remove()
    {
        $sql = "DELETE FROM blog WHERE id='$this->id'";
        $result = $this->conn->query($sql);
        if ($result) {
        echo 'Blog removed successfully';
        } else {
            echo 'Error: '.$sql.'<br>'.$this->conn->error;
        }
    }

    public function updateData($title, $content, $author, $date)
    {
        if ($title != null) {
            $this->title = $title;
        }
        if ($content != null) {
            $this->content = $content;
        }
        if ($author != null) {
            $this->author = $author;
        }
        if ($date != null) {
            $this->date = $date;
        }
    }

    public function updateDataSQL()
    {
        $sql = "UPDATE blog SET title='$this->title', content='$this->content', author='$this->author', date='$this->date' WHERE id='$this->id'";
        $result = $this->conn->query($sql);
        if ($result) {
            echo 'Blog updated successfully';
        } else {
            echo 'Error: '.$sql.'<br>'.$this->conn->error;
        }
    }
}

/*
$blogList = new BlogListResult($conn);
$blogInstances = $blogList->getBlogList();

echo '<pre>';
foreach ($blogInstances as $blogInstance) {
    print_r($blogInstance->getData());
}

echo '</pre>';
*/
