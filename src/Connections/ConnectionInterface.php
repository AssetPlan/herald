<?php

namespace Assetplan\Herald\Connections;

use Assetplan\Herald\Message;

interface ConnectionInterface
{
    public function consume(): ?Message;

    public function ack(Message $message): void;

    public function nack(Message $message, bool $requeue = false): void;

    public function publish(string $type, array $payload, ?string $id = null): void;

    public function close(): void;
}
