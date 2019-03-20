<?php
namespace Softr\Asaas\Api;

use Softr\Asaas\Adapter\AdapterInterface;
use Softr\Asaas\Entity\Meta;

/**
 * Abstract API
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
abstract class AbstractApi
{
    /**
     * Endpoint Produção
     *
     * @var string
     */
    const ENDPOINT_PRODUCAO = 'https://www.asaas.com/api/v3';

    /**
     * Endpoint Homologação
     *
     * @var string
     */
    const ENDPOINT_HOMOLOGACAO = 'https://sandbox.asaas.com/api/v3';

    /**
     * Endpoint Sandbox
     *
     * @var string
     */
    const ENDPOINT_SANDBOX = 'https://sandbox.asaas.com/api/v3';

    /**
     * Http Adapter Instance
     *
     * @var AdapterInterface
     */
    protected $adapter;

    /**
     * Api Endpoint
     *
     * @var string
     */
    protected $endpoint;

    /**
     * @var Meta
     */
    protected $meta;

    /**
     * Constructor
     *
     * @param  AdapterInterface  $adapter   Adapter Instance
     * @param  string            $ambiente  (optional) Ambiente da API
     */
    public function __construct(AdapterInterface $adapter, $ambiente = 'producao')
    {
        $this->adapter = $adapter;

        switch ($ambiente) {
            case 'sandbox':
                $this->endpoint = static::ENDPOINT_SANDBOX;
                break;
            case 'homologacao':
                $this->endpoint = static::ENDPOINT_HOMOLOGACAO;
                break;
            default:
                $this->endpoint = static::ENDPOINT_PRODUCAO;
        }
    }

    /**
     * Extract results meta
     *
     * @param   \stdClass  $data  Meta data
     * @return  Meta
     */
    protected function extractMeta(\StdClass $data)
    {
        $this->meta = new Meta($data);

        return $this->meta;
    }

    /**
     * Return results meta
     *
     * @return  Meta
     */
    public function getMeta()
    {
        return $this->meta;
    }
}