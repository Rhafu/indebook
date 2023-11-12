<?php

declare(strict_types= 1);

namespace Blog\Application;

class PostRead{
  public function __construct(
    private PostRepository $postRepository
  ){
  }

  
}
