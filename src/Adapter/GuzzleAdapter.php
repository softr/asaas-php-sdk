<?php
namespace Softr\Asaas\Adapter;

// Asaas
use Softr\Asaas\Exception\HttpException;

// Guzzle
use Guzzle\Http\Client;
use Guzzle\Http\ClientInterface;
use Guzzle\Http\Exception\RequestException;


/**
 * Guzzle Adapter
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
class GuzzleAdapter implements AdapterInterface
{
    /**
     * Client Instance
     *
     * @var ClientInterface
     */
    protected $client;

    /**
     * Command Response
     *
     * @var Response
     */
    protected $response;

    /**
     * Constructor
     *
     * @param  string                $token   Access Token
     * @param  ClientInterface|null  $client  Client Instance
     */
    public function __construct($token, ClientInterface $client = null)
    {
        $this->client = $client ?: new Client();

        $this->client->setDefaultOption('headers/access_token', $token);
    }

    /**
     * {@inheritdoc}
     */
    public function get($url)
    {
        try
        {
            $this->response = $this->client->get($url)->send();
        }
        catch(RequestException $e)
        {
            $this->response = $e->getResponse();
            $this->handleError();
        }

        return $this->response->getBody(true);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($url)
    {
        try
        {
            $this->response = $this->client->delete($url)->send();
        }
        catch(RequestException $e)
        {
            $this->response = $e->getResponse();
            $this->handleError();
        }

        return $this->response->getBody(true);
    }

    /**
     * {@inheritdoc}
     */
    public function put($url, $content = '')
    {
        $request = $this->client->put($url, [], $content);

        try
        {
            $this->response = $request->send();
        }
        catch(RequestException $e)
        {
            $this->response = $e->getResponse();

            $this->handleError();
        }

        return $this->response->getBody(true);
    }

    /**
     * {@inheritdoc}
     */
    public function post($url, $content = '')
    {
        $request = $this->client->post($url, [], $content);

        try
        {
            $this->response = $request->send();
        }
        catch(RequestException $e)
        {
            $this->response = $e->getResponse();

            $this->handleError();
        }

        return $this->response->getBody(true);
    }

    /**
     * {@inheritdoc}
     */
    public function getLatestResponseHeaders()
    {
        if(null === $this->response)
        {
            return;
        }

        return [
            'reset'     => (int) (string) $this->response->getHeader('RateLimit-Reset'),
            'remaining' => (int) (string) $this->response->getHeader('RateLimit-Remaining'),
            'limit'     => (int) (string) $this->response->getHeader('RateLimit-Limit'),
        ];
    }

    /**
     * @throws HttpException
     */
    protected function handleError()
    {
        $body = (string) $this->response->getBody(true);
        $code = (int) $this->response->getStatusCode();

        $content = json_decode($body);

        throw new HttpException(isset($content->message) ? $content->message : 'Request not processed.', $code);
    }
}