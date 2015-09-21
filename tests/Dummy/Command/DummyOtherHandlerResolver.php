<?php

namespace Dummy\Command;

use Koine\CommandBus\CommandHandlerResolverInterface;
use Koine\CommandBus\CommandInterface;

class DummyOtherHandlerResolver implements CommandHandlerResolverInterface
{
    public function getHandler(CommandInterface $command)
    {
    }
}
