<?php

namespace App\Entity;

use App\Repository\InteractionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InteractionRepository::class)]
class Interaction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?bool $user_favorite = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $comment = null;

    #[ORM\Column]
    private ?int $user_id = null;

    #[ORM\Column]
    private ?int $post_id = null;

    #[ORM\ManyToOne(inversedBy: 'interacciones')]
    #[ORM\JoinColumn(nullable: false)]
    private ?USER $POST = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isUserFavorite(): ?bool
    {
        return $this->user_favorite;
    }

    public function setUserFavorite(?bool $user_favorite): self
    {
        $this->user_favorite = $user_favorite;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getPostId(): ?int
    {
        return $this->post_id;
    }

    public function setPostId(int $post_id): self
    {
        $this->post_id = $post_id;

        return $this;
    }

    public function getPOST(): ?USER
    {
        return $this->POST;
    }

    public function setPOST(?USER $POST): self
    {
        $this->POST = $POST;

        return $this;
    }
}
