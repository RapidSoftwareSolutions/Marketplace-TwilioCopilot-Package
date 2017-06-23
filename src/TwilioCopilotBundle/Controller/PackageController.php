<?php

namespace TwilioCopilotBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\RestException;

/**
 * @author Dmitry Shumytskyi <d.shumytskyi@gmail.com>
 */
class PackageController extends Controller
{
    /**
     *
     * @Route("/api/{packageName}", requirements={"packageName": "TwilioCopilot"})
     * @Method({"GET"})
     *
     * @return JsonResponse
     */
    public function metadataAction()
    {
        return new JsonResponse($this->getParameter('app_bundle.metadata'));
    }

    /**
     *
     * @Route("/api/{packageName}/sendSms", requirements={"packageName": "TwilioCopilot"})
     * @Method({"POST"})
     *
     * @return JsonResponse
     */
    public function sendSmsAction()
    {
        try {
            $twilio = $this->get('app_bundle.sms');
            try {
                $twilio->sendSms();
            } catch (RestException $e) {
                $twilio->setResponse(['status' => 'error', 'errno' => $e->getMessage()]);
            }

            return new JsonResponse($twilio->getResponse());
        } catch (ConfigurationException $e) {
            return new JsonResponse(['callback' => 'error', 'contextWrites' => ['to' => $e->getMessage()]]);
        }
    }

    /**
     *
     * @Route("/api/{packageName}/sendMms", requirements={"packageName": "TwilioCopilot"})
     * @Method({"POST"})
     *
     * @return JsonResponse
     */
    public function sendMmsAction()
    {
        try {
            $twilio = $this->get('app_bundle.mms');
            try {
                $twilio->sendMms();
            } catch (RestException $e) {
                $twilio->setResponse(['status' => 'error', 'errno' => $e->getMessage()]);
            }

            return new JsonResponse($twilio->getResponse());
        } catch (ConfigurationException $e) {
            return new JsonResponse(['callback' => 'error', 'contextWrites' => ['to' => $e->getMessage()]]);
        }
    }

    /**
     *
     * @Route("/api/{packageName}/webhookEvent", requirements={"packageName": "Twilio"})
     * @Method({"POST"})
     *
     * @return JsonResponse
     */
    public function webhookEventAction()
    {
        $request = new Request();
        $body = json_decode($request->getContent(), true);
        $reply = [
            "http_resp" => "",
            "client_msg" => $body['args']['body'],
            "params" => $body['args']['params']
        ];
        $result['callback'] = 'success';
        $result['contextWrites']['to'] = $reply;
        return new JsonResponse($result);
    }

}