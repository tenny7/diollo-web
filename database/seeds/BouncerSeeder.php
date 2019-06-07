<?php

use Bouncer;
use Illuminate\Database\Seeder;

class BouncerSeeder extends Seeder
{
    public function run()
    {
        Bouncer::allow('admin')->everything();
        Bouncer::forbid('admin')->toManage(User::class);

        Bouncer::allow('editor')->to('create', Post::class);
        Bouncer::allow('editor')->toOwn(Post::class);

        // etc.
    }
}
