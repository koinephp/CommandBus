<?php

namespace Dummy\Command;

use Koine\CommandBus\CommandInterface;

/**
 * @author Marcelo Jacobus <marcelo.jacobus@gmail.com>
 */
class DoDummyThing implements CommandInterface
{
    /** @var bool */
    private $executed = false;

    public function setExecuted()
    {
        $this->executed = true;
    }

    public function getExecuted()
    {
        return $this->executed;
    }
}
