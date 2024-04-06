<?php

declare(strict_types=1);

namespace Blog\Infra\Controller;
use Blog\Application\UseCases\PostCreate\PostCreate;
use Blog\Application\UseCases\PostCreate\PostCreateInput;
use Blog\Infra\Presenter\ApiOutputFactory;
use Blog\Infra\Validations\PostCreateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class PostCreateController{

  public function __construct(
    // private PostCreateRequest $request
    private Request $request,
    private PostCreate $postCreate
  ){
  }

  public function __invoke(){
    // $body = $this->request->validated();
    // $body = $this->request->only(['title', 'content']);
    $input = new PostCreateInput(
      $this->request->input('title'),
      $this->request->input('content')
    );

    $output = $this->postCreate->execute($input);

    return new JsonResponse(ApiOutputFactory::postCreateResponse($output->post), 200);

    // if(!$output->success) {
    //   return $output->message, 500;
    // }

    // return 200;

  }
}