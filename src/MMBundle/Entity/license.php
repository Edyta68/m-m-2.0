<?php

namespace MMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * license
 *
 * @ORM\Table(name="license")
 * @ORM\Entity(repositoryClass="MMBundle\Repository\licenseRepository")
 */
class license
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
     * @var string
     *
     * @ORM\Column(name="Numerinwentarzowy", type="string", length=255, unique=true)
     */
    private $numerinwentarzowy;

    /**
     * @var string
     *
     * @ORM\Column(name="Nazwa", type="string", length=255)
     */
    private $nazwa;

    /**
     * @var string
     *
     * @ORM\Column(name="Kluczseryjny", type="string", length=255, unique=true)
     */
    private $kluczseryjny;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Datazakupu", type="date")
     */
    private $datazakupu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Wsparcietechnicznedo", type="date")
     */
    private $wsparcietechnicznedo;

    /**
     * @var string
     *
     * @ORM\Column(name="Licencjado", type="string", length=255)
     */
    private $licencjado;

    /**
     * @var string
     *
     * @ORM\Column(name="Stan", type="string", length=255)
     */
    private $stan;

    /**
     * @var string
     *
     * @ORM\Column(name="Notatka", type="string", length=255, nullable=true)
     */
    private $notatka;

    /**
     * @var \MMBundle\Entity\PurchaseInvoice
     *
     * @ORM\ManyToOne(targetEntity="MMBundle\Entity\PurchaseInvoice", inversedBy="licenses")
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
     * Set numerinwentarzowy
     *
     * @param string $numerinwentarzowy
     *
     * @return license
     */
    public function setNumerinwentarzowy($numerinwentarzowy)
    {
        $this->numerinwentarzowy = $numerinwentarzowy;

        return $this;
    }

    /**
     * Get numerinwentarzowy
     *
     * @return string
     */
    public function getNumerinwentarzowy()
    {
        return $this->numerinwentarzowy;
    }

    /**
     * Set nazwa
     *
     * @param string $nazwa
     *
     * @return license
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
     * Set kluczseryjny
     *
     * @param string $kluczseryjny
     *
     * @return license
     */
    public function setKluczseryjny($kluczseryjny)
    {
        $this->kluczseryjny = $kluczseryjny;

        return $this;
    }

    /**
     * Get kluczseryjny
     *
     * @return string
     */
    public function getKluczseryjny()
    {
        return $this->kluczseryjny;
    }

    /**
     * Set datazakupu
     *
     * @param \DateTime $datazakupu
     *
     * @return license
     */
    public function setDatazakupu($datazakupu)
    {
        $this->datazakupu = $datazakupu;

        return $this;
    }

    /**
     * Get datazakupu
     *
     * @return \DateTime
     */
    public function getDatazakupu()
    {
        return $this->datazakupu;
    }

    /**
     * Set wsparcietechnicznedo
     *
     * @param \DateTime $wsparcietechnicznedo
     *
     * @return license
     */
    public function setWsparcietechnicznedo($wsparcietechnicznedo)
    {
        $this->wsparcietechnicznedo = $wsparcietechnicznedo;

        return $this;
    }

    /**
     * Get wsparcietechnicznedo
     *
     * @return \DateTime
     */
    public function getWsparcietechnicznedo()
    {
        return $this->wsparcietechnicznedo;
    }

    /**
     * Set licencjado
     *
     * @param string $licencjado
     *
     * @return license
     */
    public function setLicencjado($licencjado)
    {
        $this->licencjado = $licencjado;

        return $this;
    }

    /**
     * Get licencjado
     *
     * @return string
     */
    public function getLicencjado()
    {
        return $this->licencjado;
    }

    /**
     * Set stan
     *
     * @param string $stan
     *
     * @return license
     */
    public function setStan($stan)
    {
        $this->stan = $stan;

        return $this;
    }

    /**
     * Get stan
     *
     * @return string
     */
    public function getStan()
    {
        return $this->stan;
    }

    /**
     * Set notatka
     *
     * @param string $notatka
     *
     * @return license
     */
    public function setNotatka($notatka)
    {
        $this->notatka = $notatka;

        return $this;
    }

    /**
     * Get notatka
     *
     * @return string
     */
    public function getNotatka()
    {
        return $this->notatka;
    }

    /**
     * Set invoice
     *
     * @param \MMBundle\Entity\PurchaseInvoice $invoice
     *
     * @return license
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
