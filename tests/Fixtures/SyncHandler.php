<?php

namespace Assetplan\Herald\Tests\Fixtures;

use Assetplan\Herald\Message;

class SyncHandler
{
    public function handle(Message $message): void
    {
        // Synchronous handler - no ShouldQueue interface
    }
}
