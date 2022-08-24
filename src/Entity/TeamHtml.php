<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TeamHtml
 *
 * @ORM\Table(name="team_html")
 * @ORM\Entity
 */
class TeamHtml
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="html", type="string", length=255, nullable=true)
     */
    private $html;

    /**
     * @var string|null
     *
     * @ORM\Column(name="css", type="string", length=255, nullable=true)
     */
    private $css;

    /**
     * @var int|null
     *
     * @ORM\Column(name="project_id", type="integer", nullable=true)
     */
    private $projectId;

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
        return $this->projectId;
    }

    public function setProjectId(?int $projectId): self
    {
        $this->projectId = $projectId;

        return $this;
    }


}
