<?php

namespace Assetplan\Herald\Jobs;

use Assetplan\Herald\Message;
use Closure;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Laravel\SerializableClosure\SerializableClosure;

class HeraldClosureHandlerJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public Message $message;

    private SerializableClosure $handler;

    public function __construct(Closure $handler, Message $message)
    {
        $this->handler = new SerializableClosure($handler);
        $this->message = $message;
    }

    public function handle(): void
    {
        $closure = $this->handler->getClosure();
        $closure($this->message);
    }
}
