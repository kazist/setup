<?php

namespace Setup\Currencies\Code\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * Currencies
 *
 * @ORM\Table(name="setup_currencies", indexes={@ORM\Index(name="country_id_index", columns={"country_id"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Currencies extends \Kazist\Table\BaseTable {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255, nullable=true)
     */
    protected $code;

    /**
     * @var string
     *
     * @ORM\Column(name="symbol", type="string", length=255, nullable=true)
     */
    protected $symbol;

    /**
     * @var integer
     *
     * @ORM\Column(name="country_id", type="integer", length=11, nullable=false)
     */
    protected $country_id;

    /**
     * @var string
     *
     * @ORM\Column(name="rate", type="decimal", nullable=true)
     */
    protected $rate;

    /**
     * @var string
     *
     * @ORM\Column(name="buying", type="decimal", nullable=true)
     */
    protected $buying;

    /**
     * @var string
     *
     * @ORM\Column(name="selling", type="decimal", nullable=true)
     */
    protected $selling;

    /**
     * @var integer
     *
     * @ORM\Column(name="published", type="integer", length=11, nullable=false)
     */
    protected $published;

    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", length=11, nullable=false)
     */
    protected $created_by;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=false)
     */
    protected $date_created;

    /**
     * @var integer
     *
     * @ORM\Column(name="modified_by", type="integer", length=11, nullable=false)
     */
    protected $modified_by;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=false)
     */
    protected $date_modified;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Currencies
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Currencies
     */
    public function setCode($code) {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * Set symbol
     *
     * @param string $symbol
     * @return Currencies
     */
    public function setSymbol($symbol) {
        $this->symbol = $symbol;

        return $this;
    }

    /**
     * Get symbol
     *
     * @return string 
     */
    public function getSymbol() {
        return $this->symbol;
    }

    /**
     * Set country_id
     *
     * @param integer $countryId
     * @return Currencies
     */
    public function setCountryId($countryId) {
        $this->country_id = $countryId;

        return $this;
    }

    /**
     * Get country_id
     *
     * @return integer 
     */
    public function getCountryId() {
        return $this->country_id;
    }

    /**
     * Set rate
     *
     * @param string $rate
     * @return Currencies
     */
    public function setRate($rate) {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return string 
     */
    public function getRate() {
        return $this->rate;
    }

    /**
     * Set buying
     *
     * @param string $buying
     * @return Currencies
     */
    public function setBuying($buying) {
        $this->buying = $buying;

        return $this;
    }

    /**
     * Get buying
     *
     * @return string 
     */
    public function getBuying() {
        return $this->buying;
    }

    /**
     * Set selling
     *
     * @param string $selling
     * @return Currencies
     */
    public function setSelling($selling) {
        $this->selling = $selling;

        return $this;
    }

    /**
     * Get selling
     *
     * @return string 
     */
    public function getSelling() {
        return $this->selling;
    }

    /**
     * Set published
     *
     * @param integer $published
     * @return Currencies
     */
    public function setPublished($published) {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return integer 
     */
    public function getPublished() {
        return $this->published;
    }

    /**
     * Get created_by
     *
     * @return integer 
     */
    public function getCreatedBy() {
        return $this->created_by;
    }

    /**
     * Get date_created
     *
     * @return \DateTime 
     */
    public function getDateCreated() {
        return $this->date_created;
    }

    /**
     * Get modified_by
     *
     * @return integer 
     */
    public function getModifiedBy() {
        return $this->modified_by;
    }

    /**
     * Get date_modified
     *
     * @return \DateTime 
     */
    public function getDateModified() {
        return $this->date_modified;
    }

    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate() {
        // Add your code here
    }

}
