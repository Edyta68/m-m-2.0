<?php

namespace MMBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;
/**
 * PurchaseInvoice
 */
class PurchaseInvoice
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $contractorId;

    /**
     * @var int
     */
    private $fileId;

    /**
     * @var int
     */
    private $taxId;

    /**
     * @var string
     */
    private $title;

    /**
     * @var int
     */
    private $number;

    /**
     * @var int
     */
    private $amountNetto;

    /**
     * @var int
     */
    private $amountBrutto;

    protected $equipments;
    protected $licenses;

    public function __construct()
    {
        $this->equipments = new ArrayCollection();
        $this->licenses = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set contractorId
     *
     * @param integer $contractorId
     *
     * @return PurchaseInvoice
     */
    public function setContractorId($contractorId)
    {
        $this->contractorId = $contractorId;

        return $this;
    }

    /**
     * Get contractorId
     *
     * @return int
     */
    public function getContractorId()
    {
        return $this->contractorId;
    }

    /**
     * Set fileId
     *
     * @param integer $fileId
     *
     * @return PurchaseInvoice
     */
    public function setFileId($fileId)
    {
        $this->fileId = $fileId;

        return $this;
    }

    /**
     * Get fileId
     *
     * @return int
     */
    public function getFileId()
    {
        return $this->fileId;
    }

    /**
     * Set taxId
     *
     * @param integer $taxId
     *
     * @return PurchaseInvoice
     */
    public function setTaxId($taxId)
    {
        $this->taxId = $taxId;

        return $this;
    }

    /**
     * Get taxId
     *
     * @return int
     */
    public function getTaxId()
    {
        return $this->taxId;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return PurchaseInvoice
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set number
     *
     * @param integer $number
     *
     * @return PurchaseInvoice
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set amountNetto
     *
     * @param integer $amountNetto
     *
     * @return PurchaseInvoice
     */
    public function setAmountNetto($amountNetto)
    {
        $this->amountNetto = $amountNetto;

        return $this;
    }

    /**
     * Get amountNetto
     *
     * @return int
     */
    public function getAmountNetto()
    {
        return $this->amountNetto;
    }

    /**
     * Set amountBrutto
     *
     * @param integer $amountBrutto
     *
     * @return PurchaseInvoice
     */
    public function setAmountBrutto($amountBrutto)
    {
        $this->amountBrutto = $amountBrutto;

        return $this;
    }

    /**
     * Get amountBrutto
     *
     * @return int
     */
    public function getAmountBrutto()
    {
        return $this->amountBrutto;
    }

    /**
     * Add equipment
     *
     * @param \MMBundle\Entity\Equipment $equipment
     *
     * @return PurchaseInvoice
     */
    public function addEquipment(\MMBundle\Entity\Equipment $equipment)
    {
        $this->equipments[] = $equipment;

        return $this;
    }

    /**
     * Remove equipment
     *
     * @param \MMBundle\Entity\Equipment $equipment
     */
    public function removeEquipment(\MMBundle\Entity\Equipment $equipment)
    {
        $this->equipments->removeElement($equipment);
    }

    /**
     * Get equipments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEquipments()
    {
        return $this->equipments;
    }
}
