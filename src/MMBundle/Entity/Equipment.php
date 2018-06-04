<?php

namespace MMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipment
 *
 * @ORM\Table(name="equipment")
 * @ORM\Entity(repositoryClass="MMBundle\Repository\EquipmentRepository")
 */
class Equipment
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
     * @ORM\Column(name="NrInwentarzowy", type="integer")
     */
    private $nrInwentarzowy;

    /**
     * @var string
     *
     * @ORM\Column(name="Nazwa", type="string", length=255)
     */
    private $nazwa;

    /**
     * @var string
     *
     * @ORM\Column(name="NrSeryjny", type="string", length=255)
     */
    private $nrSeryjny;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DataZakupu", type="date")
     */
    private $dataZakupu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="TerminGwarancji", type="date")
     */
    private $terminGwarancji;

    /**
     * @var float
     *
     * @ORM\Column(name="WartoscNetto", type="float")
     */
    private $wartoscNetto;

    /**
     * @var string
     *
     * @ORM\Column(name="KogoSprzet", type="string", length=255)
     */
    private $kogoSprzet;

    /**
     * @var string
     *
     * @ORM\Column(name="Notatki", type="string", length=255)
     */
    private $notatki;

    /**
     * @var \MMBundle\Entity\PurchaseInvoice
     *
     * @ORM\ManyToOne(targetEntity="MMBundle\Entity\PurchaseInvoice", inversedBy="equipments")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="invoice_id", referencedColumnName="id")
     * })
     */
    private $invoice;



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
     * Set nrInwentarzowy
     *
     * @param integer $nrInwentarzowy
     *
     * @return Equipment
     */
    public function setNrInwentarzowy($nrInwentarzowy)
    {
        $this->nrInwentarzowy = $nrInwentarzowy;

        return $this;
    }

    /**
     * Get nrInwentarzowy
     *
     * @return integer
     */
    public function getNrInwentarzowy()
    {
        return $this->nrInwentarzowy;
    }

    /**
     * Set nazwa
     *
     * @param string $nazwa
     *
     * @return Equipment
     */
    public function setNazwa($nazwa)
    {
        $this->nazwa = $nazwa;

        return $this;
    }

    /**
     * Get nazwa
     *
     * @return string
     */
    public function getNazwa()
    {
        return $this->nazwa;
    }

    /**
     * Set nrSeryjny
     *
     * @param string $nrSeryjny
     *
     * @return Equipment
     */
    public function setNrSeryjny($nrSeryjny)
    {
        $this->nrSeryjny = $nrSeryjny;

        return $this;
    }

    /**
     * Get nrSeryjny
     *
     * @return string
     */
    public function getNrSeryjny()
    {
        return $this->nrSeryjny;
    }

    /**
     * Set dataZakupu
     *
     * @param \DateTime $dataZakupu
     *
     * @return Equipment
     */
    public function setDataZakupu($dataZakupu)
    {
        $this->dataZakupu = $dataZakupu;

        return $this;
    }

    /**
     * Get dataZakupu
     *
     * @return \DateTime
     */
    public function getDataZakupu()
    {
        return $this->dataZakupu;
    }

    /**
     * Set terminGwarancji
     *
     * @param \DateTime $terminGwarancji
     *
     * @return Equipment
     */
    public function setTerminGwarancji($terminGwarancji)
    {
        $this->terminGwarancji = $terminGwarancji;

        return $this;
    }

    /**
     * Get terminGwarancji
     *
     * @return \DateTime
     */
    public function getTerminGwarancji()
    {
        return $this->terminGwarancji;
    }

    /**
     * Set wartoscNetto
     *
     * @param float $wartoscNetto
     *
     * @return Equipment
     */
    public function setWartoscNetto($wartoscNetto)
    {
        $this->wartoscNetto = $wartoscNetto;

        return $this;
    }

    /**
     * Get wartoscNetto
     *
     * @return float
     */
    public function getWartoscNetto()
    {
        return $this->wartoscNetto;
    }

    /**
     * Set kogoSprzet
     *
     * @param string $kogoSprzet
     *
     * @return Equipment
     */
    public function setKogoSprzet($kogoSprzet)
    {
        $this->kogoSprzet = $kogoSprzet;

        return $this;
    }

    /**
     * Get kogoSprzet
     *
     * @return string
     */
    public function getKogoSprzet()
    {
        return $this->kogoSprzet;
    }

    /**
     * Set notatki
     *
     * @param string $notatki
     *
     * @return Equipment
     */
    public function setNotatki($notatki)
    {
        $this->notatki = $notatki;

        return $this;
    }

    /**
     * Get notatki
     *
     * @return string
     */
    public function getNotatki()
    {
        return $this->notatki;
    }

    /**
     * Set invoice
     *
     * @param \MMBundle\Entity\PurchaseInvoice $invoice
     *
     * @return Equipment
     */
    public function setInvoice(\MMBundle\Entity\PurchaseInvoice $invoice = null)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * Get invoice
     *
     * @return \MMBundle\Entity\PurchaseInvoice
     */
    public function getInvoice()
    {
        return $this->invoice;
    }
}
