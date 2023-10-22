<?php

declare(strict_types=1);

namespace Blog\Domain;

use Blog\Domain\Author;

class Post
{
  public function __construct(
    private int $id,
    private string $title,
    private string $body,
    private string $creationDate,
    private Author $author
  ) {
  }

  public function id(): int
  {
    return $this->id;
  }

  public function title(): string
  {
    return $this->title;
  }

  public function body(): string
  {
    return $this->body;
  }

  public function creationDate(): string
  {
    return $this->body;
  }

  public function author(): Author
  {
    return $this->author;
  }
}