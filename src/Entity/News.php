<?php

namespace App\Entity;

use App\Repository\NewsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=NewsRepository::class)
 */
class News
{
    public function __construct()
    {
        $this->setDeleted(0);
    }

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $anons;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $publish;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $active;

    /**
     * @ORM\Column(type="integer")
     */
    private $deleted;

    /**
     * Дата удаления
     * @var $deleted_date \DateTime
     * @ORM\Column (type="datetime", nullable=true)
     */
    private $deleted_date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAnons(): ?string
    {
        return $this->anons;
    }

    public function setAnons(?string $anons): self
    {
        $this->anons = $anons;

        return $this;
    }

    public function getPublish(): ?\DateTimeInterface
    {
        return $this->publish;
    }

    public function setPublish(?\DateTimeInterface $publish): self
    {
        $this->publish = $publish;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getActive(): ?int
    {
        return $this->active;
    }

    public function setActive(?int $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getDeleted(): ?int
    {
        return $this->deleted;
    }

    public function setDeleted(int $deleted): self
    {
        $this->deleted = $deleted;

        return $this;
    }

    public function getDeletedDate(): ?\DateTimeInterface
    {
        return $this->deleted_date;
    }

    public function setDeletedDate(?\DateTimeInterface $deleted_date): self
    {
        $this->deleted_date = $deleted_date;

        return $this;
    }
}
