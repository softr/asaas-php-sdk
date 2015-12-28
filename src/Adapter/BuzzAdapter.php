<?php
namespace Softr\Asaas\Adapter;


// Asaas
use Softr\Asaas\Exception\HttpException;
use Softr\Asaas\Adapter\BuzzAsaasAuthListener;

// Buzz
use Buzz\Browser;
use Buzz\Client\Curl;
use Buzz\Client\FileGetContents;
use Buzz\Message\Response;


/**
 * Buzz Adapter
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
class BuzzAdapter implements AdapterInterface
{
    /**
     * Browser Instance
     *
     * @var Browser
     */
    protected $browser;

    /**
     * Constructor
     *
     * @param  string        $token    Access Token
     * @param  Browser|null  $browser  (optional) Browser Instance
     */
    public function __construct($token, Browser $browser = null)
    {
        $this->browser = $browser ?: new Browser(function_exists('curl_exec') ? new Curl() : new FileGetContents());

        $this->browser->addListener(new BuzzAsaasAuthListener($token));
    }

    /**
     * {@inheritdoc}
     */
    public function get($url)
    {
        $response = $this->browser->get($url);

        $this->handleResponse($response);

        return $response->getContent();
    }

    /**
     * {@inheritdoc}
     */
    public function delete($url)
    {
        $response = $this->browser->delete($url);

        $this->handleResponse($response);
    }

    /**
     * {@inheritdoc}
     */
    public function put($url, $content = '')
    {
        $response = $this->browser->put($url, [], $content);

        $this->handleResponse($response);

        return $response->getContent();
    }

    /**
     * {@inheritdoc}
     */
    public function post($url, $content = '')
    {
        $response = $this->browser->post($url, [], $content);

        $this->handleResponse($response);

        return $response->getContent();
    }

    /**
     * {@inheritdoc}
     */
    public function getLatestResponseHeaders()
    {
        if(null === $response = $this->browser->getLastResponse())
        {
            return;
        }

        return [
            'reset'     => (int) $response->getHeader('RateLimit-Reset'),
            'remaining' => (int) $response->getHeader('RateLimit-Remaining'),
            'limit'     => (int) $response->getHeader('RateLimit-Limit'),
        ];
    }

    /**
     * @param Response $response
     *
     * @throws HttpException
     */
    protected function handleResponse(Response $response)
    {
        if($response->isSuccessful())
        {
            return;
        }

        $this->handleError($response);
    }

    /**
     * @param Response $response
     *
     * @throws HttpException
     */
    protected function handleError(Response $response)
    {
        $body = (string) $response->getContent();
        $code = (int) $response->getStatusCode();

        $content = json_decode($response->getContent());

        throw new HttpException(isset($content->message) ? $content->message : 'Request not processed.', $code);
    }
}