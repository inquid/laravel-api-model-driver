<?php

use Illuminate\Support\Facades\DB;

it('generated SELECT URL is correct', function () {
    $connection = DB::connection();

    expect($connection->select('posts'))->toBe([
        'post1' => ['id' => 1, 'name' => 'My cool post!']
    ]);
});
