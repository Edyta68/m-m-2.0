<?php

namespace MMBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * Document
 *
 * @ORM\Table(name="document")
 * @ORM\Entity(repositoryClass="MMBundle\Repository\DocumentRepository")
 * @Vich\Uploadable
 */
class Document
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

    public function setFile(File $file = null): Document
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
     * @return Document
     */
    public function setEmbeddedFile(EmbeddedFile $embeddedFile): Document
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
     * @var string
     *
     * @ORM\Column(name="IDWlasne", type="string", length=255, nullable=false)
     */
    private $iDWlasne;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DataDokumentu", type="date")
     */
    private $dataDokumentu;

    /**
     * @var integer
     *
     * @ORM\Column(name="StronyDokumentu", type="integer")
     */
    private $stronyDokumentu;

    /**
     * @var string
     *
     * @ORM\Column(name="Notatka", type="string", length=255, nullable=true)
     */
    private $notatka;



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
     * Set iDWlasne
     *
     * @param integer $iDWlasne
     *
     * @return Document
     */
    public function setIDWlasne($iDWlasne)
    {
        $this->iDWlasne = $iDWlasne;

        return $this;
    }

    /**
     * Get iDWlasne
     *
     * @return integer
     */
    public function getIDWlasne()
    {
        return $this->iDWlasne;
    }

    /**
     * Set dataDokumentu
     *
     * @param \DateTime $dataDokumentu
     *
     * @return Document
     */
    public function setDataDokumentu($dataDokumentu)
    {
        $this->dataDokumentu = $dataDokumentu;

        return $this;
    }

    /**
     * Get dataDokumentu
     *
     * @return \DateTime
     */
    public function getDataDokumentu()
    {
        return $this->dataDokumentu;
    }

    /**
     * Set stronyDokumentu
     *
     * @param integer $stronyDokumentu
     *
     * @return Document
     */
    public function setStronyDokumentu($stronyDokumentu)
    {
        $this->stronyDokumentu = $stronyDokumentu;

        return $this;
    }

    /**
     * Get stronyDokumentu
     *
     * @return integer
     */
    public function getStronyDokumentu()
    {
        return $this->stronyDokumentu;
    }

    /**
     * Set notatka
     *
     * @param string $notatka
     *
     * @return Document
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
