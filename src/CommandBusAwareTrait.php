<?php

namespace Koine\CommandBus;

/**
 * Koine\CommandBus\CommandBusAwareTrait
 *
 * @author Marcelo Jacobus <marcelo.jacobus@gmail.com>
 */
trait CommandBusAwareTrait
{
    /**
     * @var CommandBus
     */
    private $commandBus;

    /**
     * @param CommandBus $commandBus
     *
     * @return self
     */
    public function setCommandBus(CommandHandlerInterface $commandBus)
    {
        $this->commandBus = $commandBus;

        return $this;
    }

    /**
     * @return CommandHandlerInterface
     *
     * @throws \DomainException
     */
    public function getCommandBus()
    {
        if ($this->commandBus === null) {
            throw new \DomainException('Command bus was not set');
        }

        return $this->commandBus;
    }
}
