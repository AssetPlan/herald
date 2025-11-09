<?php

namespace Assetplan\Herald\Jobs;

use Assetplan\Herald\Message;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class HandleHeraldMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(
        public readonly string|object $handler,
        public readonly Message $message
    ) {}

    public function handle(): void
    {
        $handler = $this->handler;

        // If handler is a string, resolve from container
        if (is_string($handler)) {
            $handler = app($handler);
        }

        // Call the handle method
        $handler->handle($this->message);
    }
}
