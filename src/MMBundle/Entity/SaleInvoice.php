<?php

namespace MMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SaleInvoice
 *
 * @ORM\Table(name="sale_invoice")
 * @ORM\Entity(repositoryClass="MMBundle\Repository\SaleInvoiceRepository")
 */
class SaleInvoice
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
     * @ORM\ManyToOne(targetEntity="MMBundle\Entity\Contractor", inversedBy="invoice")
     */
    protected $contractors;



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
     * @return SaleInvoice
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
     * @return SaleInvoice
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
     * @return SaleInvoice
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
     * @return SaleInvoice
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
     * @return SaleInvoice
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
     * @return SaleInvoice
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
