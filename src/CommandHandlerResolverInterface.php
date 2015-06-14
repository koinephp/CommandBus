<?php

namespace Koine\CommandBus;

/**
 * Koine\CommandBus\CommandHandlerResolverInterface
 *
 * @author Marcelo Jacobus <marcelo.jacobus@gmail.com>
 */
interface CommandHandlerResolverInterface
{
    /**
     * @param CommandInterface
     *
     * @throws Exception\CommandHandlerNotFoundException
     *
     * @return CommandHandlerInterface
     */
    public function getHandler(CommandInterface $command);
}
