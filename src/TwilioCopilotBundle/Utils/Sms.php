<?php
/**
 * @author Dmitry Shumytskyi <d.shumytskyi@gmail.com>
 */

namespace TwilioCopilotBundle\Utils;

class Sms extends TwilioCopilotAbstract
{
    /**
     * Send sms message and return associated parameters
     */
    public function SendSms()
    {
        $sms = $this->client->messages->create(
            $this->parameters['to'],
            $this->parameters
        );

        $this->setResponse(['status' => 'success', ['callbackParameters' => [
            'sid' => $sms->sid,
            'body' => $sms->body,
            'dateCreated' => $sms->dateCreated,
            'dateUpdated' => $sms->dateUpdated,
            'accountSid' => $sms->accountSid,
            'to' => $sms->to,
            'from' => $sms->from,
            'status' => $sms->status,
            'price' => $sms->price,
            'direction' => $sms->direction,
            'apiVersion' => $sms->apiVersion,
            'uri' => $sms->uri,
            'subresourceUris' => $sms->subresourceUris,
            'priceUnit' => $sms->priceUnit,
            'dateSent' => $sms->dateSent,
            'errorCode' => $sms->errorCode,
            'errorMessage' => $sms->errorMessage,
            'numMedia' => $sms->numMedia,
            'numSegments' => $sms->numSegments
        ]
        ]]);
    }

}