<?php declare(strict_types=1);

namespace Blog\Domain\Repository;

use Blog\Domain\Entity\Post;

interface PostRepositoryInterface
{
  public function findById(int $id): ?Post;
}
