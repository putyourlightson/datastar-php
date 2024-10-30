<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace putyourlightson\datastar\events;

/**
 * A Datastar signal event.
 */
class SignalEvent implements EventInterface
{
    use EventTrait;

    public ?string $onlyIfMissing = null;
    public string $store = '';

    /**
     * @inerhitdoc
     */
    public function getOutput(): string
    {
        $output = [];
        if ($this->onlyIfMissing !== null) {
            $output[] = 'data: onlyIfMissing ' . $this->onlyIfMissing;
        }
        $output[] = 'data: store ' . $this->store;

        return $this->getEventOutput('signal', $output);
    }
}
