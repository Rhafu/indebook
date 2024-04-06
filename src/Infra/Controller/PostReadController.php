<?php

namespace Blog\Infra\Controller;

use Blog\Application\UseCases\PostRead\PostRead;
use Blog\Application\UseCases\PostRead\PostReadInput;
use Blog\Infra\Presenter\ApiOutputFactory;
use Illuminate\Http\JsonResponse;

final class PostReadController
{
  public function __construct(
    private PostRead $postRead
  ){
  }

  public function __invoke(int $postId) : JsonResponse
  {
    $input = new PostReadInput($postId);
    $output = $this->postRead->execute($input);

    if(!$output->post) {
      return new JsonResponse(status: 404);
    }

    return new JsonResponse(ApiOutputFactory::postReadResponse($output->post), 200);
  }
}
