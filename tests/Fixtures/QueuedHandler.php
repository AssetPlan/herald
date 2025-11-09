<?php

namespace Assetplan\Herald\Tests\Fixtures;

use Assetplan\Herald\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class QueuedHandler implements ShouldQueue
{
    use Queueable;

    public function handle(Message $message): void
    {
        // Queued handler - implements ShouldQueue
    }
}
