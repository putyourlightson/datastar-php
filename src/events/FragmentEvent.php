<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace putyourlightson\datastar\events;

/**
 * A Datastar fragment event.
 */
class FragmentEvent implements EventInterface
{
    use EventTrait;

    public ?string $selector = null;
    public ?string $merge = null;
    public ?string $settle = null;
    public ?string $vt = null;

    /**
     * @inerhitdoc
     */
    public function getOutput(): string
    {
        $content = trim($this->content);
        if (empty($content)) {
            return '';
        }

        $output = [];
        if ($this->selector !== null) {
            $output[] = 'data: selector ' . $this->selector;
        }
        if ($this->merge !== null) {
            $output[] = 'data: merge ' . $this->merge;
        }
        if ($this->settle !== null) {
            $output[] = 'data: settle ' . $this->settle;
        }
        if ($this->vt !== null) {
            $output[] = 'data: vt ' . $this->vt;
        }
        $output[] = 'data: fragment';

        $lines = explode("\n", $content);
        foreach ($lines as $line) {
            $output[] = 'data: ' . $line;
        }

        return $this->getEventOutput('fragment', $output);
    }
}
