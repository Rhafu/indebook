<?php

namespace Blog\Infra\Controller;

use Blog\Application\PostRead;
use Blog\Infra\Presenter\ApiOutputFactory;
use Illuminate\Http\JsonResponse;

final class PostReadController
{
  public function __construct(
    private PostRead $postRead
  ){}

  public function __invoke(int $postId) : JsonResponse
  {
    $post = $this->postRead->execute($postId);

    $output = ApiOutputFactory::postReadOutput($post);

    return new JsonResponse($output, 200);
  }
}