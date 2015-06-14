<?php

namespace Dummy\Command;

use Koine\CommandBus\CommandHandlerInterface;
use Koine\CommandBus\CommandInterface;

/**
 * @author Marcelo Jacobus <marcelo.jacobus@gmail.com>
 */
class DoDummyThingHandler implements CommandHandlerInterface
{
    public function handle(CommandInterface $command)
    {
        $command->setExecuted();
        return 'handled';
    }
}
