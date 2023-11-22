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
     * @var string
     */
    public $object;

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
    public $installment;

    /**
     * @var string
     */
    public $paymentLink;

    /**
     * @var string
     */
    public $subscription;

    /**
     * @var string
     */
    public $billingType;

    /**
     * @var bool
     */
    public $canBePaidAfterDueDate;

    /**
     * @var bool
     */
    public $deleted;

    /**
     * @var bool
     */
    public $anticipated;

    /**
     * @var bool
     */
    public $anticipable;

    /**
     * @var bool
     */
    public $postalService;

    /**
     * @var string
     */
    public $pixTransaction;

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
    public $transactionReceiptUrl;

    /**
     * @var string
     */
    public $boletoUrl;

    /**
     * @var string
     */
    public $bankSlipUrl;

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
     * @var string Identificador do título no sistema origem
     */
    public $externalReference;

    /**
     * @var int
     */
    public $installmentNumber;

    /**
     * @var array|string
     */
    public $discount;

    /**
     * @var array|string
     */
    public $fine;

    /**
     * @var array|string
     */
    public $interest;

    /**
     * @param  string  $dueDate
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = static::convertDateTime($dueDate);
    }

    /**
     * @param  string  $originalDueDate
     */
    public function setOriginalDueDate($originalDueDate)
    {
        $this->originalDueDate = static::convertDateTime($originalDueDate);
    }

    /**
     * @param  string  $paymentDate
     */
    public function setPaymentDate($paymentDate)
    {
        $this->paymentDate = static::convertDateTime($paymentDate);
    }

    /**
     * @param  string  $clientPaymentDate
     */
    public function setClientPaymentDate($clientPaymentDate)
    {
        $this->clientPaymentDate = static::convertDateTime($clientPaymentDate);
    }

    /**
     * @param  string  $creditDate
     */
    public function setCreditDate($creditDate)
    {
        $this->creditDate = static::convertDateTime($creditDate);
    }

    /**
     * @param  string  $estimatedCreditDate
     */
    public function setEstimatedCreditDate($estimatedCreditDate)
    {
        $this->estimatedCreditDate = static::convertDateTime($estimatedCreditDate);
    }
}