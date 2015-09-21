<?php

namespace KoineTest\CommandBus;

use Dummy\Command\DoDummyThing;
use Dummy\Command\DummyHandlerResolver;
use Dummy\Command\DummyOtherHandlerResolver;
use Dummy\Command\InvalidResolver;
use Dummy\Command\NoHandlerCommand;
use Koine\CommandBus\CommandBus;
use PHPUnit_Framework_TestCase;

/**
 * Koine\CommandBus\CommandBusTest
 *
 * @author Marcelo Jacobus <marcelo.jacobus@gmail.com>
 */
class CommandBusTest extends PHPUnit_Framework_TestCase
{
    /** @var CommandBus */
    private $commandBus;

    public function setUp()
    {
        $this->commandBus = new CommandBus();
        $this->commandBus->addResolver(new DummyOtherHandlerResolver());
        $this->commandBus->addResolver(new DummyHandlerResolver());
    }

    /**
     * @test
     */
    public function canHandleCommandWhenProperlySet()
    {
        $command = new DoDummyThing();
        $response = $this->commandBus->handle($command);
        $this->assertEquals('handled', $response);
        $this->assertTrue($command->getExecuted());
    }

    /**
     * @test
     * @expectedException Koine\CommandBus\Exception\CommandHandlerNotFoundException
     * @expectedExceptionMessage Handler not found for command "Dummy\Command\NoHandlerCommand"
     */
    public function throwsExceptionWhenHandlerIsNotFound()
    {
        $this->commandBus->handle(new NoHandlerCommand());
    }

    /**
     * @test
     * @expectedException Koine\CommandBus\Exception\InvalidCommandHandlerException
     * @expectedExceptionMessage Class "stdClass" does not implement Koine\CommandBus\CommandHandlerInterface
     */
    public function handleThrowsExceptionWhenHandlerDoesNotImplementHandlerInterface()
    {
        $this->commandBus->setResolvers(array(new InvalidResolver()));
        $this->commandBus->handle(new DoDummyThing());
    }

    /**
     * @test
     */
    public function canSetResolvers()
    {
        $resolvers = array(
            new DummyHandlerResolver(),
        );

        $this->commandBus->setResolvers($resolvers);
        $this->assertEquals($resolvers, $this->commandBus->getResolvers());
    }

    /**
     * @test
     */
    public function canRemoveResolver()
    {
        $resolvers = $this->commandBus->getResolvers();

        $this->commandBus->removeResolver($resolvers[1]);
        $this->assertEquals(
            array($resolvers[0]),
            $this->commandBus->getResolvers()
        );
    }
}
