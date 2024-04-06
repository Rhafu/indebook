<?php declare(strict_types=1);

namespace Blog\Domain\Factory;

use Blog\Domain\Entity\Post;
use Blog\Domain\Entity\Author;
use stdClass;

final class PostFactory
{
  public static function create(stdClass $data): Post
  {
    $author = new Author(
      $data->authorId,
      $data->authorName,
      $data->authorPhotoLink,
      $data->authorDescription,
      $data->authorPostsLink
    );

    $post = new Post(
      $data->postTitle,
      $data->postContent,
      $author
    );
    $post->setId($data->postId);
    $post->setCreationDate($data->postCreationDate);

    return $post;
  }
}
