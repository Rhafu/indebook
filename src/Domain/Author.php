<?php

declare(strict_types=1);

namespace Blog\Domain;

final class Author
{
  public function __construct(
    private int $id,
    private string $name,
    private string $photoLink,
    private string $description,
    private string $postsLink
  ) {
  }

  public function id(): int
  {
    return $this->id;
  }

  public function name(): string
  {
    return $this->name;
  }

  public function photoLink(): string
  {
    return $this->photoLink;
  }

  public function description(): string
  {
    return $this->description;
  }

  public function postsLink(): string
  {
    return $this->postsLink;
  }
}



