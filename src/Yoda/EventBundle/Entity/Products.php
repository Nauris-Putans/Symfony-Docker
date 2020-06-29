<?php

namespace Yoda\EventBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @ORM\Table(name="products")
 * @ORM\Entity(repositoryClass="Yoda\EventBundle\Repository\ProductsRepository")
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
     * @var string
     *
     * @ORM\Column(name="product_name", type="string", length=255)
     */
    private $productName;

    /**
     * @var float
     *
     * @ORM\Column(name="product_price", type="float")
     */
    private $productPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="product_des", type="text")
     */
    private $productDes;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="product_regTime", type="date")
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
     * Set productDes
     *
     * @param string $productDes
     *
     * @return Products
     */
    public function setProductDes($productDes)
    {
        $this->productDes = $productDes;

        return $this;
    }

    /**
     * Get productDes
     *
     * @return string
     */
    public function getProductDes()
    {
        return $this->productDes;
    }

    /**
     * Set productRegTime
     *
     * @param DateTime $productRegTime
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
     * @return DateTime
     */
    public function getProductRegTime()
    {
        return $this->productRegTime;
    }
}

