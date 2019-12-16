<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GoodRepository")
 */
class Good
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Item;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItem(): ?string
    {
        return $this->Item;
    }

    public function setItem(string $Item): self
    {
        $this->Item = $Item;

        return $this;
    }

    public function update( $request)
    {
        $data = $request->request->get('form');
        $this->setItem($data['item']);
    }

    public function remove()
    {

    }
}
