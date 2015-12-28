<?php
namespace Softr\Asaas\Entity;

/**
 * City Entity
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
final class City extends \Softr\Asaas\Entity\AbstractEntity
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $ibgeCode;

    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $districtCode;

    /**
     * @var string
     */
    public $district;

    /**
     * @var string
     */
    public $state;
}