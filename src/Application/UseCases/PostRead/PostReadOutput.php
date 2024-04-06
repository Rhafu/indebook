<?php declare(strict_types=1);

namespace Blog\Application\UseCases\PostRead;

use Blog\Domain\Entity\Post;

final readonly class PostReadOutput
{
  public function __construct(
    public ?Post $post
  ){
  }
}
