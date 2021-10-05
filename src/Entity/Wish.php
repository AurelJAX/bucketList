<?php

namespace App\Entity;

use App\Repository\WishRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=WishRepository::class)
 */
class Wish
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *
     * @Assert\NotBlank(message="Veuillez renseigner un titre d'idée")
     * @Assert\Length(min="2", max="50",
     *     minMessage = "Titre trop court! Au moins 2 caractères!",
     *     maxMessage = "Titre trop long ! Maximum 50 caractères!",)
     * @ORM\Column(type="string", length=250)
     */
    private $title;

    /**
     * @Assert\NotBlank(message="Veuillez renseigner une description")
     * @Assert\Length(min="2", max="250",
     *     minMessage = "Description trop courte! Au moins 2 caractères!",
     *     maxMessage = "Description trop longue ! Maximum 250 caractères!",)
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     *
     * @Assert\NotBlank(message="Veuillez renseigner un auteur")
     * @Assert\Length(min="2", max="250",
     *     minMessage = "Auteur trop court! Au moins 2 caractères!",
     *     maxMessage = "Auteur trop long ! Maximum 250 caractères!",)
     * @ORM\Column(type="string", length=50)
     */
    private $author;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPublished;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreated;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getDateCreated(): ?\DateTimeInterface
    {
        return $this->dateCreated;
    }

    public function setDateCreated(\DateTimeInterface $dateCreated): self
    {

        $this->dateCreated = $dateCreated;

        return $this;
    }

    public function __construct()
    {
        $this->dateCreated= new DateTime("now");
        $this->isPublished = true;
    }


}
