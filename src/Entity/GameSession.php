<?php

namespace App\Entity;

use App\Repository\GameSessionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GameSessionRepository::class)
 */
class GameSession
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $game_date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_joker_obt;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_joker_used;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="gameSessions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $player;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGameDate(): ?\DateTimeInterface
    {
        return $this->game_date;
    }

    public function setGameDate(\DateTimeInterface $game_date): self
    {
        $this->game_date = $game_date;

        return $this;
    }

    public function getNbJokerObt(): ?int
    {
        return $this->nb_joker_obt;
    }

    public function setNbJokerObt(?int $nb_joker_obt): self
    {
        $this->nb_joker_obt = $nb_joker_obt;

        return $this;
    }

    public function getNbJokerUsed(): ?int
    {
        return $this->nb_joker_used;
    }

    public function setNbJokerUsed(?int $nb_joker_used): self
    {
        $this->nb_joker_used = $nb_joker_used;

        return $this;
    }

    public function getPlayer(): ?User
    {
        return $this->player;
    }

    public function setPlayer(?User $player): self
    {
        $this->player = $player;

        return $this;
    }
}
