<?php
declare(strict_types = 1);

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="item_log")
 */
class ItemLog
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Item
     * @ORM\ManyToOne(targetEntity="Item", inversedBy="logs")
     */
    private $item;

    /**
     * @var string
     * @ORM\Column(type="string", name="user")
     */
    private $user;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", name="date_received")
     */
    private $dateReceived;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", name="date_returned", nullable=true)
     */
    private $dateReturned;

    /**
     * @var string
     * @ORM\Column(type="text", name="peripherals")
     */
    private $peripherals;

    /**
     * ItemLog constructor.
     */
    public function __construct()
    {
        $this->dateReceived = new DateTime('now');
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return Item
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param Item $item
     */
    public function setItem($item)
    {
        $this->item = $item;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return \DateTime
     */
    public function getDateReceived()
    {
        return $this->dateReceived;
    }

    /**
     * @param \DateTime $dateReceived
     */
    public function setDateReceived($dateReceived)
    {
        $this->dateReceived = $dateReceived;
    }

    /**
     * @return \DateTime
     */
    public function getDateReturned()
    {
        return $this->dateReturned;
    }

    /**
     * @return string
     */
    public function getPeripherals()
    {
        return $this->peripherals;
    }

    /**
     * @param string $peripherals
     */
    public function setPeripherals($peripherals)
    {
        $this->peripherals = $peripherals;
    }

    public function returnItem ()
    {
        $this->dateReturned = new DateTime('now');
        $this->item->setAvailable(true);
    }

}