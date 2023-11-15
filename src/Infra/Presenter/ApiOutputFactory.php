<?php 

namespace Blog\Infra\Presenter;

use Blog\Domain\Entity\Post;

class ApiOutputFactory{

  public static function postReadOutput(Post $post): array
  {
    return [
      'post' => [
        'id' => $post->id(),
        'title' => $post->title(),
        'content' => $post->content(),
        'creation_date' => $post->creationDate()
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
}