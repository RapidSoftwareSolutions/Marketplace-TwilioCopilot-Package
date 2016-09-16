<?php
/**
 * @author Dmitry Shumytskyi <d.shumytskyi@gmail.com>
 */

namespace TwilioCopilotBundle\Utils;

class Mms extends TwilioCopilotAbstract
{
    /**
     * Send mms message and return associated parameters
     */
    public function SendMms()
    {
        $mms = $this->client->messages->create(
            $this->parameters['to'],
            $this->parameters
        );

        $this->setResponse(['status' => 'success', ['callbackParameters' => [
            'sid' => $mms->sid,
            'dateCreated' => $mms->dateCreated,
            'dateUpdated' => $mms->dateUpdated,
            'accountSid' => $mms->accountSid,
            'to' => $mms->to,
            'from' => $mms->from,
            'status' => $mms->status,
            'price' => $mms->price,
            'direction' => $mms->direction,
            'apiVersion' => $mms->apiVersion,
            'uri' => $mms->uri,
            'subresourceUris' => $mms->subresourceUris,
            'priceUnit' => $mms->priceUnit,
            'dateSent' => $mms->dateSent,
            'errorCode' => $mms->errorCode,
            'errorMessage' => $mms->errorMessage,
            'numMedia' => $mms->numMedia,
            'numSegments' => $mms->numSegments
        ]
        ]]);
    }

}