<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace putyourlightson\datastar\events;

/**
 * A Datastar event trait.
 */
trait EventTrait
{
    public ?int $id = null;

    public function __construct(array $config = [])
    {
        foreach ($config as $key => $value) {
            $this->{$key} = $value;
        }
    }

    public function getEventOutput(string $name, array $input): string
    {
        $output = ['event: datastar-' . $name];
        if ($this->id !== null) {
            $output[] = 'id: ' . $this->id;
        }
        $output = array_merge($output, $input);

        return implode("\n", $output) . "\n\n";
    }
}
