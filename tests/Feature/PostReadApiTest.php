<?php

test("should return a post ", function () {
  $response = $this->get($this->baseUrl.'api/post/1');

  $response->assertStatus(200);
  $return = json_decode($response->getContent(), true);

  expect($return['post']['id'])->toBe(1);
  expect($return['author']['id'])->toBe(1);
});