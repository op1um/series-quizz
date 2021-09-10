<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageRepository::class)
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image_path;

    /**
     * @ORM\ManyToOne(targetEntity=serie::class, inversedBy="images")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ref_serie;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImagePath(): ?string
    {
        return $this->image_path;
    }

    public function setImagePath(string $image_path): self
    {
        $this->image_path = $image_path;

        return $this;
    }

    public function getRefSerie(): ?serie
    {
        return $this->ref_serie;
    }

    public function setRefSerie(?serie $ref_serie): self
    {
        $this->ref_serie = $ref_serie;

        return $this;
    }
}
