<?php
namespace Softr\Asaas\Entity;

/**
 * Payment Entity
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
final class Payment extends \Softr\Asaas\Entity\AbstractEntity
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $customer;

    /**
     * @var string
     */
    public $subscription;

    /**
     * @var string
     */
    public $billingType;

    /**
     * @var float
     */
    public $value;

    /**
     * @var float
     */
    public $netValue;

    /**
     * @var float
     */
    public $originalValue;

    /**
     * @var float
     */
    public $interestValue;

    /**
     * @var float
     */
    public $grossValue;

    /**
     * @var string
     */
    public $dueDate;

    /**
     * @var string
     */
    public $status;

    /**
     * @var string
     */
    public $nossoNumero;

    /**
     * @var string
     */
    public $description;

    /**
     * @var string
     */
    public $invoiceNumber;

    /**
     * @var string
     */
    public $invoiceUrl;

    /**
     * @var string
     */
    public $boletoUrl;

    /**
     * @var int
     */
    public $installmentCount;

    /**
     * @var float
     */
    public $installmentValue;

    /**
     * @var string
     */
    public $creditCardHolderName;

    /**
     * @var string
     */
    public $creditCardNumber;

    /**
     * @var string
     */
    public $creditCardExpiryMonth;

    /**
     * @var string
     */
    public $creditCardExpiryYear;

    /**
     * @var string
     */
    public $creditCardCcv;

    /**
     * @var string
     */
    public $creditCardHolderFullName;

    /**
     * @var string
     */
    public $creditCardHolderEmail;

    /**
     * @var string
     */
    public $creditCardHolderCpfCnpj;

    /**
     * @var string
     */
    public $creditCardHolderAddress;

    /**
     * @var string
     */
    public $creditCardHolderAddressNumber;

    /**
     * @var string
     */
    public $creditCardHolderAddressComplement;

    /**
     * @var string
     */
    public $creditCardHolderProvince;

    /**
     * @var string
     */
    public $creditCardHolderCity;

    /**
     * @var string
     */
    public $creditCardHolderUf;

    /**
     * @var string
     */
    public $creditCardHolderPostalCode;

    /**
     * @var string
     */
    public $creditCardHolderPhone;

    /**
     * @var string
     */
    public $creditCardHolderPhoneDDD;

    /**
     * @var string
     */
    public $creditCardHolderMobilePhone;

    /**
     * @var string
     */
    public $creditCardHolderMobilePhoneDDD;

    /**
     * @param  string  $dueDate
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = static::convertDateTime($dueDate);
    }
}