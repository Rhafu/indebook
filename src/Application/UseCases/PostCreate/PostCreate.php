<?php

declare(strict_types = 1);

namespace Blog\Application\UseCases\PostCreate;

use Blog\Domain\Entity\Author;
use Blog\Domain\Entity\Post;
use Blog\Infra\Repository\PostPDORepository;

class PostCreate{

  public function __construct(
    private PostPDORepository $postPDORepository
  ){
  }

  public function execute(PostCreateInput $input){
    $author = new Author(1, '', '', '', '');
    $post = new Post($input->title, $input->content, $author);

    $post = $this->postPDORepository->insert($post);

    return new PostCreateOutput($post);
  }
}
