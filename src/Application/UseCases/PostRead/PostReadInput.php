<?php

declare(strict_types=1);

namespace Blog\Application\UseCases\PostRead;

final readonly class PostReadInput{

    public function __construct(
        public int $postId
    ){
    }
}
