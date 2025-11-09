<?php

namespace Assetplan\Herald\Tests\Fixtures;

use Assetplan\Herald\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class QueuedHandler implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public readonly Message $message
    ) {}

    public function handle(): void
    {
        // Queued handler - receives Message in constructor
        // Process the message here
    }
}
