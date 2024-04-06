<?php

declare(strict_types= 1);

namespace Blog\Application\UseCases\PostRead;

use Blog\Domain\Entity\Post;
use Blog\Infra\Repository\PostPDORepository;

class PostRead{
  public function __construct(
    private PostPDORepository $postRepository
  ){
  }

  public function execute(PostReadInput $input): PostReadOutput
  {
    $post = $this->postRepository->findById($input->postId);

    return new PostReadOutput($post);
  }
}
