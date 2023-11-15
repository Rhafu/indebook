<?php

declare(strict_types= 1);

namespace Blog\Application;

use Blog\Domain\Entity\Post;
use Blog\Infra\Repository\PostPDORepository;

class PostRead{
  public function __construct(
    private PostPDORepository $postRepository
  ){
  }

  public function execute(int $postId): Post
  {
    $post = $this->postRepository->findById($postId);

    return $post;
  }
}
