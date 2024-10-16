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

    /**
     * @inerhitdoc
     */
    public function getOutput(): string
    {
        $output = ['data: ' . $this->content];

        return $this->getEventOutput('redirect', $output);
    }
}
