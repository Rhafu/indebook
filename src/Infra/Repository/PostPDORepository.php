<?php

namespace Blog\Infra\Repository;

use Blog\Domain\Repository\PostRepositoryInterface;
use Blog\Domain\Entity\Post;
use Blog\Infra\Gateway\PdoDatabaseConnection;
use Blog\Domain\Factory\PostFactory;

final class PostPDORepository implements PostRepositoryInterface
{

  private \PDO $connection;

  public function __construct(
    private PdoDatabaseConnection $pdo
  ) {
    $this->connection = $pdo->connection();
  }

  public function insert(Post $post): Post 
  {
    $postSql = '
    INSERT INTO post 
    (title, content, author_id)
    VALUES (:title, :content, :author_id)
    ';

    $stmt = $this->connection->prepare($postSql);

    $stmt->execute([
      ':title' => $post->title(),
      ':content' => $post->content(),
      ':author_id' => $post->author()->id()
    ]);

    $post->setId($this->connection->lastInsertId());
    /**
     * TODO: consultar post pelo ID para recuperar a data de criação.
     */
    return $post;
  }

  // $pdo->lastInsertId();
  
  public function findById(int $id): ?Post
  {
    $postSql = '
    SELECT
      post.id AS postId,
      post.title AS postTitle,
      post.content AS postContent,
      post.creation_date AS postCreationDate,
      author.id AS authorId,
      author.name AS authorName,
      author.photo_link AS authorPhotoLink,
      author.description AS authorDescription,
      author.posts_link AS authorPostsLink
    FROM
      post
    INNER JOIN
      author
    ON
      author.id = post.author_id
    WHERE
      post.id = :postId;
    ';

    $stmt = $this->connection->prepare($postSql);

    $stmt->execute([
      ':postId' => $id
    ]);

    $return = $stmt->fetchObject();
    if(!$return) {
      return null;
    }

    $post = PostFactory::create($return);
    return $post;
  }
}