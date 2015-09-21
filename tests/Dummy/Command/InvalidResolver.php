<?php

namespace Dummy\Command;

use Koine\CommandBus\CommandHandlerResolverInterface;
use Koine\CommandBus\CommandInterface;

/**
 * Dummy\Command\InvalidResolver
 */
class InvalidResolver implements CommandHandlerResolverInterface
{
    public function getHandler(CommandInterface $command)
    {
        return new \StdClass();
    }
}
