<?php

namespace MMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attendance
 *
 * @ORM\Table(name="attendance")
 * @ORM\Entity(repositoryClass="MMBundle\Repository\AttendanceRepository")
 */
class Attendance
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
     * @var \DateTime
     *
     * @ORM\Column(name="Data", type="date")
     */
    private $data;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="GodzinaWejscia", type="time")
     */
    private $godzinaWejscia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="GodzinaWyjscia", type="time")
     */
    private $godzinaWyjscia;

    /**
     * @var float
     *
     * @ORM\Column(name="CzasPracy", type="float")
     */
    private $czasPracy;

    /**
     * @var string
     *
     * @ORM\Column(name="Uwagi", type="string", length=255, nullable=true)
     */
    private $uwagi;



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
     * Set data
     *
     * @param \DateTime $data
     *
     * @return Attendance
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set godzinaWejscia
     *
     * @param \DateTime $godzinaWejscia
     *
     * @return Attendance
     */
    public function setGodzinaWejscia($godzinaWejscia)
    {
        $this->godzinaWejscia = $godzinaWejscia;

        return $this;
    }

    /**
     * Get godzinaWejscia
     *
     * @return \DateTime
     */
    public function getGodzinaWejscia()
    {
        return $this->godzinaWejscia;
    }

    /**
     * Set godzinaWyjscia
     *
     * @param \DateTime $godzinaWyjscia
     *
     * @return Attendance
     */
    public function setGodzinaWyjscia($godzinaWyjscia)
    {
        $this->godzinaWyjscia = $godzinaWyjscia;

        return $this;
    }

    /**
     * Get godzinaWyjscia
     *
     * @return \DateTime
     */
    public function getGodzinaWyjscia()
    {
        return $this->godzinaWyjscia;
    }

    /**
     * Set czasPracy
     *
     * @param float $czasPracy
     *
     * @return Attendance
     */
    public function setCzasPracy($czasPracy)
    {
        $this->czasPracy = $czasPracy;

        return $this;
    }

    /**
     * Get czasPracy
     *
     * @return float
     */
    public function getCzasPracy()
    {
        return $this->czasPracy;
    }

    /**
     * Set uwagi
     *
     * @param string $uwagi
     *
     * @return Attendance
     */
    public function setUwagi($uwagi)
    {
        $this->uwagi = $uwagi;

        return $this;
    }

    /**
     * Get uwagi
     *
     * @return string
     */
    public function getUwagi()
    {
        return $this->uwagi;
    }
}
