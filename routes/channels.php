<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('created-product-channel', function ($user) {
    return ['id' => $user->id, 'name' => $user->name];
});

Broadcast::channel('file-upload-channel.{userId}', function ($user, $userId) {
    return (int) $user->id === (int) $userId;
});
