<?php

namespace Koine\CommandBus;

use Koine\CommandBus\Exception\CommandHandlerNotFoundException;
use Koine\CommandBus\Exception\InvalidCommandHandlerException;

/**
 * Koine\CommandBus\CommandBus
 *
 * @author Marcelo Jacobus <marcelo.jacobus@gmail.com>
 */
class CommandBus implements CommandHandlerInterface
{
    /** @var CommandHandlerResolverInterface[] */
    private $resolvers = array();

    public function handle(CommandInterface $command)
    {
        return $this->getHandler($command)->handle($command);
    }

    /**
     * @param CommandHandlerResolverInterface $resolver
     *
     * @return self
     */
    public function addResolver(CommandHandlerResolverInterface $resolver)
    {
        $this->resolvers[] = $resolver;

        return $this;
    }

    /**
     * @param CommandHandlerResolverInterface $resolver
     *
     * @return self
     */
    public function removeResolver(CommandHandlerResolverInterface $resolver)
    {
        foreach ($this->getResolvers() as $i => $existingResolver) {
            if ($existingResolver === $resolver) {
                unset($this->resolvers[$i]);
                break;
            }
        }

        return $this;
    }

    /**
     * @param CommandHandlerResolverInterface[] $resolvers
     *
     * @return self
     */
    public function setResolvers(array $resolvers)
    {
        $this->resolvers = array();

        foreach ($resolvers as $resolver) {
            $this->addResolver($resolver);
        }

        return $this;
    }

    /**
     * @return CommandHandlerResolverInterface[]
     */
    public function getResolvers()
    {
        return $this->resolvers;
    }

    /**
     * @param CommandInterface $command
     *
     * @throws \Exception
     * @throws \DomainException
     * @throws \RuntimeException
     *
     * @return CommandHandlerInterface
     */
    private function getHandler(CommandInterface $command)
    {
        foreach ($this->getResolvers() as $resolver) {
            $handler = $resolver->getHandler($command);

            if ($handler === null) {
                continue;
            }

            if (!$handler instanceof CommandHandlerInterface) {
                throw new InvalidCommandHandlerException(
                    sprintf(
                        'Class "%s" does not implement %s',
                        get_class($handler),
                        'Koine\CommandBus\CommandHandlerInterface'
                    )
                );
            }

            return $handler;
        }

        throw new CommandHandlerNotFoundException(
            sprintf(
                'Handler not found for command "%s"',
                get_class($command)
            )
        );
    }
}
