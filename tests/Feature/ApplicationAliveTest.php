<?php

test('the application returns a successful response', function () {
    $response = $this->get($this->baseUrl.'/');

    $response->assertStatus(200);
});