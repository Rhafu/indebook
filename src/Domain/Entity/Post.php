<?php

declare(strict_types=1);

namespace Blog\Domain\Entity;

use Blog\Domain\Entity\Author;

class Post
{
  private int $id;

  private \DateTimeInterface $creationDate;

  public function __construct(
    private string $title,
    private string $content,
    private Author $author
  ) {
  }

  public function setId(int $id): void
  {
    $this->id = $id;
  }

  public function setCreationDate(string $creationDate): void
  {
    $dateTimeCreationDate = new \DateTime($creationDate);
    $this->creationDate = $dateTimeCreationDate;
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

  public function creationDate(): \DateTimeInterface
  {
    return $this->creationDate;
  }

  public function author(): Author
  {
    return $this->author;
  }
}