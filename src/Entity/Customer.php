<?php
namespace Softr\Asaas\Entity;

/**
 * Customer Entity
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
final class Customer extends \Softr\Asaas\Entity\AbstractEntity
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $company;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var string
     */
    public $mobilePhone;

    /**
     * @var string
     */
    public $address;

    /**
     * @var string
     */
    public $addressNumber;

    /**
     * @var string
     */
    public $complement;

    /**
     * @var string
     */
    public $province;
    
    /**
     * @var string Identificador do cliente no seu sistema
     */
    public externalReference;
    
    /**
     * @var bool
	 * @deprecated Property not found on v3 API
     */
    public $foreignCustomer;

    /**
     * @var bool
     */
    public $notificationDisabled;

    /**
     * @var string
     */
    public $city;

    /**
     * @var string
     */
    public $state;

    /**
     * @var string
     */
    public $country;

    /**
     * @var string
     */
    public $postalCode;

    /**
     * @var string
     */
    public $cpfCnpj;

    /**
     * @var string
     */
    public $personType;

    /**
     * @var string
     */
    public $additionalEmails;
    
    /**
     * @var string
     */
    public $municipalInscription;
    
    /**
     * @var string
     */
    public $stateInscription;

    /**
     * @var string
     */
    public $groupName;

    /**
     * @var array
     */
    public $subscriptions = [];

    /**
     * @var array
     */
    public $payments = [];

    /**
     * @var array
     */
    public $notifications = [];
}
