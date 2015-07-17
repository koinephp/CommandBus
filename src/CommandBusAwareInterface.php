<?php

namespace Koine\CommandBus;

/**
 * Koine\CommandBus\CommandBusAwareInterface
 *
 * @author Marcelo Jacobus <marcelo.jacobus@gmail.com>
 */
interface CommandBusAwareInterface
{
    /**
     * @param CommandBus $commandBus
     *
     * @return self
     */
    public function setCommandBus(CommandHandlerInterface $commandBus);

    /**
     * @return CommandHandlerInterface
     *
     * @throws \DomainException
     */
    public function getCommandBus();
}
