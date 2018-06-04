<?php

namespace MMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PurchaseInvoice
 *
 * @ORM\Table(name="purchase_invoice")
 * @ORM\Entity(repositoryClass="MMBundle\Repository\PurchaseInvoiceRepository")
 */
class PurchaseInvoice
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * @var integer
     *
     * @ORM\Column(name="file_id", type="integer")
     */
    private $fileId;

    /**
     * @var integer
     *
     * @ORM\Column(name="tax_id", type="integer")
     */
    private $taxId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="integer")
     */
    private $number;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount_netto", type="integer")
     */
    private $amountNetto;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount_brutto", type="integer")
     */
    private $amountBrutto;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="MMBundle\Entity\Equipment", mappedBy="invoice")
     */
    private $equipments;

    /**
     * @ORM\ManyToOne(targetEntity="MMBundle\Entity\Contractor", inversedBy="invoice")
     */
    protected $contractors;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->equipments = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
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
     * @return integer
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
     * @return integer
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
     * @return integer
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
     * @return integer
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
     * @return integer
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

    /**
     * Set contractors
     *
     * @param \MMBundle\Entity\Contractor $contractors
     *
     * @return PurchaseInvoice
     */

    public function setContractors(\MMBundle\Entity\Contractor $contractors = null)
    {
        $this->contractors = $contractors;

        return $this;
    }

    /**
     * Get contractors
     *
     * @return \MMBundle\Entity\Contractor
     */
    public function getContractors()
    {
        return $this->contractors;
    }

}
