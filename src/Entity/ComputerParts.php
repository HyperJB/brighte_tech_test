<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ComputerPartsRepository")
 */
class ComputerParts
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", length=255)
     */
    private $productName;

    /**
     * @ORM\Column(type="integer")
     */
    private $productPrice;

    /**
     * @ORM\Column(type="text", length=65535)
     */
    private $productDescription;


    /**
     * @ORM\Column(type="text", length=255)
     * @Assert\NotBlank(message="Please, upload the photo.") 
     * @Assert\File(mimeTypes={ "image/png", "image/jpeg", "image/gif" }) 
     */
    private $productPicture;

    
    // Getters
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductName() {
        return $this->productName;
    }

    public function getProductprice() {
        return $this->productPrice;
    }

    public function getProductDescription() {
        return $this->productDescription;
    }

    public function getProductPicture() {
        return $this->productPicture;
    }

    // Setters
    public function setProductName($productName) {
        $this->productName = $productName;
    }

    public function setProductPrice($productPrice) {
        $this->productPrice = $productPrice;
    }

    public function setProductDescription($productDescription) {
        $this->productDescription = $productDescription;
    }

    public function setProductPicture($productPicture) {
        $this->productPicture = $productPicture;
    }

}
