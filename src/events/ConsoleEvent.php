<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace putyourlightson\datastar\events;

/**
 * A Datastar console event.
 */
class ConsoleEvent implements EventInterface
{
    use EventTrait;

    public string $content = '';
    public string $mode = 'log';

    /**
     * @inerhitdoc
     */
    public function getOutput(): string
    {
        $output = ['data: ' . $this->mode . ' ' . $this->content];

        return $this->getEventOutput('console', $output);
    }
}
