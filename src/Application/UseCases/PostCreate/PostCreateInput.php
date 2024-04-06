<?php

declare(strict_types = 1);

namespace Blog\Application\UseCases\PostCreate;

readonly class PostCreateInput{

  public function __construct(
    public string $title,
    public string $content
  ){
  }
}
