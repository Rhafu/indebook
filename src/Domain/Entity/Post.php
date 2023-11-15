<?php

declare(strict_types=1);

namespace Blog\Domain\Entity;

use Blog\Domain\Entity\Author;

class Post
{
  public function __construct(
    private int $id,
    private string $title,
    private string $content,
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

  public function content(): string
  {
    return $this->content;
  }

  public function creationDate(): string
  {
    return $this->creationDate;
  }

  public function author(): Author
  {
    return $this->author;
  }
}