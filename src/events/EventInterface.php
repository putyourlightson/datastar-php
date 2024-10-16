<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace putyourlightson\datastar\events;

/**
 * A Datastar event interface.
 */
interface EventInterface
{
    /**
     * Returns the output for this event.
     */
    public function getOutput(): string;
}
