<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace putyourlightson\datastar;

/**
 * A Datastar response class.
 */
class DatastarResponse
{
    public function __construct()
    {
        $this->sendHeaders();

        ob_start();
    }

    /**
     * Sends the headers for the response if not already sent.
     */
    public function sendHeaders(): void
    {
        if (headers_sent()) {
            return;
        }

        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        header('Connection: keep-alive');
    }

    /**
     * Sends a Datastar event.
     */
    public function sendEvent(DatastarEvent $event): void
    {
        $output = $event->getOutput();

        if (empty($output)) {
            return;
        }

        ob_clean();
        echo $output;
        ob_flush();
        flush();
    }
}
