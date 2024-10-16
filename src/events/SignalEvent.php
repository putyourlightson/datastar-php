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

    public ?string $ifmissing = null;
    public string $store = '';

    /**
     * @inerhitdoc
     */
    public function getOutput(): string
    {
        $output = [];
        if ($this->ifmissing !== null) {
            $output[] = 'data: ifmissing ' . $this->ifmissing;
        }
        $output[] = 'data: store ' . $this->store;

        return $this->getEventOutput('signal', $output);
    }
}
