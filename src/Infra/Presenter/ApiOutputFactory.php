<?php

namespace Blog\Infra\Presenter;

use Blog\Domain\Entity\Post;
use Illuminate\Support\MessageBag;

class ApiOutputFactory{

  public static function postReadResponse(Post $post): array
  {
    return [
      'post' => [
        'id' => $post->id(),
        'title' => $post->title(),
        'content' => $post->content(),
        'creation_date' => $post->creationDate()->format(\DateTimeInterface::ISO8601)
      ],
      'author' => [
        'id' => $post->author()->id(),
        'name' => $post->author()->name(),
        'description'=> $post->author()->description(),
        'photo_link' => $post->author()->photoLink(),
        'posts_link'=> $post->author()->postsLink(),
      ]
    ];
  }

  public static function postCreateResponse(Post $post): array
  {
    return [
      'post' => [
        'id' => $post->id()
      ]
    ];
  }

  public static function validatorErrorsResponse(MessageBag $messageBag){
    return $messageBag->toArray();
  }
}
