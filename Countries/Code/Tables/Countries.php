<?php

namespace Setup\Countries\Code\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * Countries
 *
 * @ORM\Table(name="setup_countries")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Countries extends \Kazist\Table\BaseTable {

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
     * @ORM\Column(name="code", type="string", length=2, nullable=false)
     */
    protected $code;

    /**
     * @var string
     *
     * @ORM\Column(name="code3", type="string", length=3, nullable=true)
     */
    protected $code3;

    /**
     * @var integer
     *
     * @ORM\Column(name="currency_id", type="integer", length=11, nullable=true)
     */
    protected $currency_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="timezone_id", type="integer", length=11, nullable=true)
     */
    protected $timezone_id;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="string", length=255, nullable=true)
     */
    protected $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="string", length=255, nullable=false)
     */
    protected $longitude;

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
     * @return Countries
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
     * @return Countries
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
     * Set code3
     *
     * @param string $code3
     * @return Countries
     */
    public function setCode3($code3) {
        $this->code3 = $code3;

        return $this;
    }

    /**
     * Get code3
     *
     * @return string 
     */
    public function getCode3() {
        return $this->code3;
    }

    /**
     * Set currency_id
     *
     * @param integer $currencyId
     * @return Countries
     */
    public function setCurrencyId($currencyId) {
        $this->currency_id = $currencyId;

        return $this;
    }

    /**
     * Get currency_id
     *
     * @return integer 
     */
    public function getCurrencyId() {
        return $this->currency_id;
    }

    /**
     * Set timezone_id
     *
     * @param integer $timezoneId
     * @return Countries
     */
    public function setTimezoneId($timezoneId) {
        $this->timezone_id = $timezoneId;

        return $this;
    }

    /**
     * Get timezone_id
     *
     * @return integer 
     */
    public function getTimezoneId() {
        return $this->timezone_id;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     * @return Countries
     */
    public function setLatitude($latitude) {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string 
     */
    public function getLatitude() {
        return $this->latitude;
    }

    /**
     * Set longitude
     *
     * @param string $longitude
     * @return Countries
     */
    public function setLongitude($longitude) {
        $this->longitude = $longitude;

        return $this;
    }

    /**
     * Get longitude
     *
     * @return string 
     */
    public function getLongitude() {
        return $this->longitude;
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
