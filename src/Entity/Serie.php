<?php

namespace App\Entity;

use App\Repository\SerieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SerieRepository::class)
 */
class Serie
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
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $annee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $jacquette_path;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="ref_serie")
     */
    private $images;

    /**
     * @ORM\ManyToMany(targetEntity=reponse::class, inversedBy="series")
     */
    private $reponses;

    /**
     * @ORM\OneToOne(targetEntity=reponse::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $correcte_reponse;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->reponses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getJacquettePath(): ?string
    {
        return $this->jacquette_path;
    }

    public function setJacquettePath(string $jacquette_path): self
    {
        $this->jacquette_path = $jacquette_path;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setRefSerie($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getRefSerie() === $this) {
                $image->setRefSerie(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|reponse[]
     */
    public function getReponses(): Collection
    {
        return $this->reponses;
    }

    public function addReponse(reponse $reponse): self
    {
        if (!$this->reponses->contains($reponse)) {
            $this->reponses[] = $reponse;
        }

        return $this;
    }

    public function removeReponse(reponse $reponse): self
    {
        $this->reponses->removeElement($reponse);

        return $this;
    }

    public function getCorrecteReponse(): ?reponse
    {
        return $this->correcte_reponse;
    }

    public function setCorrecteReponse(reponse $correcte_reponse): self
    {
        $this->correcte_reponse = $correcte_reponse;

        return $this;
    }
}
