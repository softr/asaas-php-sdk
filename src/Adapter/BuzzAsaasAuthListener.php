<?php
namespace Softr\Asaas\Adapter;


// Buzz
use Buzz\Message\MessageInterface;
use Buzz\Message\RequestInterface;
use Buzz\Listener\ListenerInterface;


/**
 * Buzz Asass Auth Listener
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
class BuzzAsaasAuthListener implements ListenerInterface
{
    /**
     * Access Token
     *
     * @var  string
     */
    private $token;

    /**
     * Constructor
     *
     * @param  string  $token  Access Token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Execute before send request
     *
     * @param   RequestInterface  $request  Request instance
     */
    public function preSend(RequestInterface $request)
    {
        $request->addHeader('access_token: ' . $this->token);
    }

    /**
     * Execute after request
     *
     * @param   RequestInterface  $request   Request Instance
     * @param   MessageInterface  $response  Response Instance
     */
    public function postSend(RequestInterface $request, MessageInterface $response)
    {
        // Nothing here
    }
}