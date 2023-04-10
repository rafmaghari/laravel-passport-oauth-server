<?php

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;

uses(RefreshDatabase::class);

it('can get tasks if user is authenticated', function () {
    $user = User::factory()->create();

    Task::factory(10)->create();

    Passport::actingAs($user);

    $this->getJson('/api/tasks')->assertOk()->assertJsonCount(10, 'data');
});

it('cannot get tasks if user is unauthenticated', function () {

    Task::factory(10)->create();

    $this->getJson('/api/tasks')->assertUnauthorized();
});
