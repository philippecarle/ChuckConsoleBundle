<?php

namespace KK\Labs\ChuckConsoleBundle\EventListener;

use KK\Labs\ChuckConsoleBundle\ChuckFactService\ChuckAPIService;
use KK\Labs\ChuckConsoleBundle\Command\ChuckCommand;
use Symfony\Component\Console\Event\ConsoleTerminateEvent;

/**
 * Class ConsoleTerminateListener
 * @package KK\Labs\ChuckConsoleBundle\EventListener
 */
class ConsoleTerminateListener
{
    /**
     * @var ChuckAPIService
     */
    private $chuckApiService;

    /**
     * @var array
     */
    private $enabledEnvironments;

    /**
     * @var string
     */
    private $env;

    /**
     * ConsoleTerminateListener constructor.
     * @param ChuckAPIService $chuckAPIService
     */
    public function __construct(ChuckAPIService $chuckAPIService, $environments = [], $env)
    {
        $this->chuckApiService = $chuckAPIService;
        $this->enabledEnvironments = $environments;
        $this->env = $env;
    }

    /**
     * @param ConsoleTerminateEvent $event
     */
    public function onConsoleTerminate(ConsoleTerminateEvent $event)
    {
        if (
            !$event->getCommand() instanceof ChuckCommand
            && in_array($this->env, $this->enabledEnvironments)
            && $fact = $this->chuckApiService->getFact()
        ) {
            $event->getOutput()->writeln($fact);
        }
    }
}
