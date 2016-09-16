<?php
/**
 * @author Dmitry Shumytskyi <d.shumytskyi@gmail.com>
 */

namespace TwilioCopilotBundle\Utils;

use Twilio\Rest\Client;

abstract class TwilioCopilotAbstract
{
    /**
     * @var mixed
     */
    protected $response;
    /**
     * @var string
     */
    protected $accountSid;
    /**
     * @var string
     */
    protected $accountToken;
    /**
     * @var mixed
     */
    protected $parameters;
    /**
     * @var mixed
     */
    protected $client;

    /**
     * TwilioCopilotAbstract constructor.
     *
     * @param $request
     */
    public function __construct($request)
    {
        $this->request = $request->getCurrentRequest();
        $this->body = json_decode($this->request->getContent(), true);
        $this->accountSid = $this->body['args']['accountSid'];
        $this->accountToken = $this->body['args']['accountToken'];
        $this->unsetCredentials();
        $this->clearEmpty();
        $this->client = new Client($this->accountSid, $this->accountToken);
    }

    /**
     * @param $responseMessage
     */
    public function setResponse($responseMessage)
    {
        if ($responseMessage['status'] == 'error') {
            $this->response = ['callback' => 'error', 'contextWrites' => ['to' => $responseMessage['errno']]];
        } else {
            $this->response = ['callback' => 'success', 'contextWrites' => ['to' => $responseMessage[0]['callbackParameters']]];
        }
    }

    /**
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }

    public function unsetCredentials()
    {
        unset($this->body['args']['accountSid']);
        unset($this->body['args']['accountToken']);
    }

    public function clearEmpty()
    {
        $this->parameters = array_filter($this->body['args'], function ($value) {
            return $value !== '';
        });
    }

}