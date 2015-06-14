<?php

namespace Koine\CommandBus;

/**
 * Koine\CommandBus\CommandHandlerInterface
 *
 * @author Marcelo Jacobus <marcelo.jacobus@gmail.com>
 */
interface CommandHandlerInterface
{
    /**
     * @param CommandInterface $command
     *
     * @throws \DomainException
     * @throws \RuntimeException
     * @throws \Exception
     *
     * @return mixed
     */
    public function handle(CommandInterface $command);
}
