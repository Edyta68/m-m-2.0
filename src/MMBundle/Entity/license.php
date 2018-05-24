<?php

namespace MMBundle\Entity;

/**
 * license
 */
class license
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $numerinwentarzowy;

    /**
     * @var string
     */
    private $nazwa;

    /**
     * @var string
     */
    private $kluczseryjny;

    /**
     * @var \DateTime
     */
    private $datazakupu;

    /**
     * @var int
     */
    private $idfaktury;

    /**
     * @var \DateTime
     */
    private $wsparcietechnicznedo;

    /**
     * @var string
     */
    private $licencjado;

    /**
     * @var string
     */
    private $stan;

    /**
     * @var string
     */
    private $notatka;


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
     * Set idfaktury
     *
     * @param integer $idfaktury
     *
     * @return license
     */
    public function setIdfaktury($idfaktury)
    {
        $this->idfaktury = $idfaktury;

        return $this;
    }

    /**
     * Get idfaktury
     *
     * @return int
     */
    public function getIdfaktury()
    {
        return $this->idfaktury;
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
}

