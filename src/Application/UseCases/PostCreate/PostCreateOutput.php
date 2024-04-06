<?php

declare(strict_types = 1);

namespace Blog\Application\UseCases\PostCreate;

use Blog\Domain\Entity\Post;
readonly class PostCreateOutput{

  public function __construct(
    public Post $post
  ){
  }
}