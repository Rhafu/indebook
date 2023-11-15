<?php

use Blog\Infra\Repository\PostPDORepository;
use Blog\Domain\Entity\Post;

test("should returns a post from database", function () {

  /** @var PostPDORepository */
  $postRepository = resolve(PostPDORepository::class);

  $input = 1;

  $post = $postRepository->findById($input);

  expect($post)->toBeInstanceOf(Post::class);
  expect($post->id())->toBe($input);
});
