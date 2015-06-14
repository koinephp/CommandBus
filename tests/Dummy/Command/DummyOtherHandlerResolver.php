<?php

namespace Dummy\Command;

use Koine\CommandBus\CommandHandlerResolverInterface;
use Koine\CommandBus\CommandInterface;
use Koine\CommandBus\Exception\CommandHandlerNotFoundException as Exception;

class DummyOtherHandlerResolver implements CommandHandlerResolverInterface
{
    public function getHandler(CommandInterface $command)
    {
        throw new Exception('Cannot find resolver');
    }
}
