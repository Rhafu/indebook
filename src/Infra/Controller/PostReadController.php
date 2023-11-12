<?php

namespace Blog\Infra\Controller;

use Blog\Application\PostRead;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class PostReadController
{
  public function __construct(
    private PostRead $postRead
  ){}

  public function __invoke(int $postId) : JsonResponse
  {
    $output = $this->postRead->execute($postId);

    return new JsonResponse(json_encode($output), 200);
  }
}