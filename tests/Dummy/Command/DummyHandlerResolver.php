<?php

namespace Dummy\Command;

use Koine\CommandBus\CommandHandlerResolverInterface;
use Koine\CommandBus\CommandInterface;

class DummyHandlerResolver implements CommandHandlerResolverInterface
{
    public function getHandler(CommandInterface $command)
    {
        if ($command instanceof DoDummyThing) {
            return new DoDummyThingHandler();
        }
    }
}
