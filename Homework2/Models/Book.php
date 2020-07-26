<?php
require "Author.php";
require "Publisher.php";

class Book
{
    public string $id;
    public string $title;
    private string $author_id;
    private string $publisher_id;
    public string $publish_year;
    public string $created_at;
    public ?string $updated_at;


    public Author $author;
    public Publisher $publisher;

    public function __construct()
    {
        $queryBuilder = new QueryBuilder(DatabaseConnection::getInstance());
        $this->author = $queryBuilder->getOne("SELECT * FROM authors WHERE id=" . $this->author_id, 'Author');
        $this->publisher = $queryBuilder->getOne("SELECT * FROM publishers WHERE id=$this->publisher_id", 'Publisher');
    }
}
