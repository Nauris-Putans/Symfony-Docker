<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductsRepository")
 */
class Products
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="product_ID", type="integer", unique=true)
     */
    private $productID;

    /**
     * @var string
     *
     * @ORM\Column(name="product_Name", type="string", length=255)
     */
    private $productName;

    /**
     * @var float
     *
     * @ORM\Column(name="product_Price", type="float")
     */
    private $productPrice;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="product_RegTime", type="datetime")
     */
    private $productRegTime;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set productID
     *
     * @param integer $productID
     *
     * @return Products
     */
    public function setProductID($productID)
    {
        $this->productID = $productID;

        return $this;
    }

    /**
     * Get productID
     *
     * @return int
     */
    public function getProductID()
    {
        return $this->productID;
    }

    /**
     * Set productName
     *
     * @param string $productName
     *
     * @return Products
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;

        return $this;
    }

    /**
     * Get productName
     *
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * Set productPrice
     *
     * @param float $productPrice
     *
     * @return Products
     */
    public function setProductPrice($productPrice)
    {
        $this->productPrice = $productPrice;

        return $this;
    }

    /**
     * Get productPrice
     *
     * @return float
     */
    public function getProductPrice()
    {
        return $this->productPrice;
    }

    /**
     * Set productRegTime
     *
     * @param \DateTime $productRegTime
     *
     * @return Products
     */
    public function setProductRegTime($productRegTime)
    {
        $this->productRegTime = $productRegTime;

        return $this;
    }

    /**
     * Get productRegTime
     *
     * @return \DateTime
     */
    public function getProductRegTime()
    {
        return $this->productRegTime;
    }
}

