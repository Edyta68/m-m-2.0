<?php

namespace MMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * SaleInvoice
 *
 * @ORM\Table(name="sale_invoice")
 * @ORM\Entity(repositoryClass="MMBundle\Repository\SaleInvoiceRepository")
 * @Vich\Uploadable
 */
class SaleInvoice
{
    /**

     *
     * @var File
     *
     *  @Vich\UploadableField(mapping="file", fileNameProperty="embeddedFile.name", size="embeddedFile.size", mimeType="embeddedFile.mimeType", originalName="embeddedFile.originalName")
     */
    private $file;

    /**
     * @var EmbeddedFile
     *
     * @ORM\Embedded(class="Vich\UploaderBundle\Entity\File")
     */
    private $embeddedFile;

    public function __construct()
    {
        $this->embeddedFile = new EmbeddedFile();
    }


    /**
     * @return File|null
     */

    public function getFile(): ?File
    {
        return $this->file;
    }


    /**
     * @param File|UploadedFile $file
     * @return Document
     */

    public function setFile(File $file = null): SaleInvoice
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return EmbeddedFile
     */

    public function getEmbeddedFile(): EmbeddedFile
    {
        return $this->embeddedFile;
    }

    /**
     * @param EmbeddedFile $embeddedFile
     * @return SaleInvoice
     */
    public function setEmbeddedFile(EmbeddedFile $embeddedFile): SaleInvoice
    {
        $this->embeddedFile = $embeddedFile;
        return $this;
    }
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
     * @ORM\Column(name="tax_id", type="integer")
     */
    private $taxId;


    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string")
     */
    private $number;

    /**
     * @var integer
     *
     * @ORM\Column(name="amount_netto", type="integer")
     */
    private $amountNetto;

    /**
     * @var float
     *
     * @ORM\Column(name="amount_netto_currency", type="float", precision=10, scale=0, nullable=true)
     */
    private $amountNettoCurrency;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=20, nullable=true)
     */
    private $currency;

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
     * Set amountNettoCurrency
     *
     * @param float $amountNettoCurrency
     *
     * @return SaleInvoice
     */
    public function setAmountNettoCurrency($amountNettoCurrency)
    {
        $this->amountNettoCurrency = $amountNettoCurrency;

        return $this;
    }

    /**
     * Get amountNettoCurrency
     *
     * @return float
     */
    public function getAmountNettoCurrency()
    {
        return $this->amountNettoCurrency;
    }

    /**
     * Set currency
     *
     * @param string $currency
     *
     * @return SaleInvoice
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
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
