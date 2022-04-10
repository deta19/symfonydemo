<?php

namespace App\Entity;

use App\Repository\TeamHtmlRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TeamHtmlRepository::class)
 */
class TeamHtml
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $html;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $css;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $project_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHtml(): ?string
    {
        return $this->html;
    }

    public function setHtml(?string $html): self
    {
        $this->html = $html;

        return $this;
    }

    public function getCss(): ?string
    {
        return $this->css;
    }

    public function setCss(?string $css): self
    {
        $this->css = $css;

        return $this;
    }

    public function getProjectId(): ?int
    {
        return $this->project_id;
    }

    public function setProjectId(?int $project_id): self
    {
        $this->project_id = $project_id;

        return $this;
    }
}
