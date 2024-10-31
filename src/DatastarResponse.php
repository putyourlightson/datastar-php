<?php
/**
 * @copyright Copyright (c) PutYourLightsOn
 */

namespace putyourlightson\datastar;

use putyourlightson\datastar\events\EventInterface;

/**
 * A Datastar response class.
 */
class DatastarResponse
{
    public function __construct()
    {
        $this->sendHeaders();
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

        // Disable buffering for Nginx
        // https://nginx.org/en/docs/http/ngx_http_proxy_module.html#proxy_buffering
        header('X-Accel-Buffering: no');
    }

    /**
     * Sends a Datastar event.
     */
    public function sendEvent(EventInterface $event): void
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

    /**
     * Ends the request.
     */
    public function end(): void
    {
        exit();
    }
}
