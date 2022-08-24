<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TeamProject
 *
 * @ORM\Table(name="team_project")
 * @ORM\Entity
 */
class TeamProject
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $user_id;

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

    public function getUserId(): ?int
    {
//dd( "dddd", $this->user_id );
        return $this->user_id;
    }

    public function setUserId(int $user_id ): self
    {
//        $user_id =  $userid->getId();s
//        dd( "set",  $user_id  );

//        $this->user_id = $userid->getId();
        $this->user_id = $user_id;
        return $this;
    }
    
    
    public function __toString(){
       return $this->getUserId();
   }


}
