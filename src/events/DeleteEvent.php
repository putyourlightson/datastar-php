<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace putyourlightson\datastar\events;

/**
 * A Datastar delete event.
 */
class DeleteEvent implements EventInterface
{
    use EventTrait;

    public string $selector = '';

    /**
     * @inerhitdoc
     */
    public function getOutput(): string
    {
        $output = ['data: selector ' . $this->selector];

        return $this->getEventOutput('redirect', $output);
    }
}
