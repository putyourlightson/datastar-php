<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace putyourlightson\datastar;

/**
 * A Datastar event class.
 */
class DatastarEvent
{
    public int $id = 0;
    public string $type = 'fragment';
    public string $content = '';
    public string $selector = '';
    public string $merge = 'morph_element';
    public string $settle = '0';
    public string $vt = 'false';

    public function __construct(array $config = [])
    {
        foreach ($config as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * Returns the output for this event.
     */
    public function getOutput(): string
    {
        $content = trim($this->content);
        if (empty($content)) {
            return '';
        }

        return match ($this->type) {
            'fragment' => $this->getFragmentOutput($content),
            'redirect' => $this->getRedirectOutput($content),
            'error' => $this->getErrorOutput($content),
            'signal' => $this->getSignalOutput($content),
            'signal-ifmissing' => $this->getSignalIfMissingOutput($content),
            default => '',
        };
    }

    private function getFragmentOutput(string $content): string
    {
        $output = [
            'event: datastar-fragment',
            'id: ' . $this->id,
            'data: selector ' . $this->selector,
            'data: merge ' . $this->merge,
            'data: settle ' . $this->settle,
            'data: vt ' . $this->vt,
            'data: fragment',
        ];

        $lines = explode("\n", $content);
        foreach ($lines as $line) {
            $output[] = 'data: ' . $line;
        }

        return $this->getStringOutput($output);
    }

    private function getRedirectOutput(string $content): string
    {
        return $this->getStringOutput([
            'event: datastar-fragment',
            'id: ' . $this->id,
            'data: redirect ' . $content,
        ]);
    }

    private function getErrorOutput(string $content): string
    {
        return $this->getStringOutput([
            'event: datastar-fragment',
            'id: ' . $this->id,
            'data: error ' . $content,
        ]);
    }

    private function getSignalOutput(string $content): string
    {
        return $this->getStringOutput([
            'event: datastar-signal',
            'id: ' . $this->id,
            'data: ' . $content,
        ]);
    }

    private function getSignalIfMissingOutput(string $content): string
    {
        return $this->getStringOutput([
            'event: datastar-signal-ifmissing',
            'id: ' . $this->id,
            'data: ' . $content,
        ]);
    }

    private function getStringOutput(array $output): string
    {
        return implode("\n", $output) . "\n\n";
    }
}
