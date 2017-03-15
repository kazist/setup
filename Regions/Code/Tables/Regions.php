<?php

namespace Setup\Regions\Code\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * Regions
 *
 * @ORM\Table(name="setup_regions")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Regions extends \Kazist\Table\BaseTable {

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
     * @ORM\Column(name="name", type="text", nullable=false)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255, nullable=true)
     */
    protected $country;

    /**
     * @var string
     *
     * @ORM\Column(name="fips", type="string", length=255, nullable=true)
     */
    protected $fips;

    /**
     * @var string
     *
     * @ORM\Column(name="iso", type="string", length=255, nullable=true)
     */
    protected $iso;

    /**
     * @var string
     *
     * @ORM\Column(name="timezone_id", type="string", length=255, nullable=true)
     */
    protected $timezone_id;

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
     * @return Regions
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
     * Set country
     *
     * @param string $country
     * @return Regions
     */
    public function setCountry($country) {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry() {
        return $this->country;
    }

    /**
     * Set fips
     *
     * @param string $fips
     * @return Regions
     */
    public function setFips($fips) {
        $this->fips = $fips;

        return $this;
    }

    /**
     * Get fips
     *
     * @return string 
     */
    public function getFips() {
        return $this->fips;
    }

    /**
     * Set iso
     *
     * @param string $iso
     * @return Regions
     */
    public function setIso($iso) {
        $this->iso = $iso;

        return $this;
    }

    /**
     * Get iso
     *
     * @return string 
     */
    public function getIso() {
        return $this->iso;
    }

    /**
     * Set timezone_id
     *
     * @param string $timezoneId
     * @return Regions
     */
    public function setTimezoneId($timezoneId) {
        $this->timezone_id = $timezoneId;

        return $this;
    }

    /**
     * Get timezone_id
     *
     * @return string 
     */
    public function getTimezoneId() {
        return $this->timezone_id;
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

}
