<?php

declare(strict_types=1);

namespace Goldland\Events\Domain\Model;

use DateTime;

/**
 * This file is part of the "Events" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */

/**
 * Event
 */
class Event extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     *
     * @var int
     */
    protected $title = '';

     /**
     * address
     *
     * @var string
     */
    protected $address = '';

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * program
     *
     * @var string
     */
    protected $program = '';

    /**
     * date
     *
     * @var DateTime
     */
    protected $date = '';

    /**
     * startime
     *
     * @var DateTime
     */
    protected $startime = '';
   
    /**
     * endtime
     *
     * @var DateTime
     */
    protected $endtime = '';

    /**
     * file
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $file = null;

    /**
     * speaker
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Goldland\Events\Domain\Model\Speaker>
     */
    protected $speaker = null;

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
        $this->speaker = $this->speaker ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return int $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param int $title
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Returns the address
     *
     * @return string $address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets the address
     *
     * @param string $address
     * @return void
     */
    public function setAddress(string $address)
    {
        $this->address = $address;
    }

    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Returns the program
     *
     * @return string $program
     */
    public function getProgram()
    {
        return $this->program;
    }

    /**
     * Sets the program
     *
     * @param string $program
     * @return void
     */
    public function setProgram(string $program)
    {
        $this->program = $program;
    }

    /**
     * Get date
     *
     * @return null|DateTime
     */
    public function getDate(): ?DateTime
    {
        return $this->date;
    }

    /**
     * Set date 
     *
     * @param DateTime $date date
     *
     * @return void
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * Get year of date
     *
     * @return false|string
     */
    public function getYearOfDate()
    {
        return $this->getDate()->format('Y');
    }

    /**
     * Get month of date
     *
     * @return false|string
     */
    public function getMonthOfDate()
    {
        return $this->getDate()->format('m');
    }

    /**
     * Get day of date
     *
     * @return int
     */
    public function getDayOfDate(): int
    {
        return (int)$this->date->format('d');
    }

    /**
     * Returns the startime
     *
     * @return DateTime $startime
     */
    public function getStartime()
    {
        return $this->startime;
    }

    /**
     * Sets the startime
     *
     * @param DateTime $startime
     * @return void
     */
    public function setStartime(DateTime $startime)
    {
        $this->startime = $startime;
    }

    /**
     * Returns the endtime
     *
     * @return DateTime $endtime
     */
    public function getEndtime()
    {
        return $this->endtime;
    }

    /**
     * Sets the endtime
     *
     * @param DateTime $endtime
     * @return void
     */
    public function setEndtime(DateTime $endtime)
    {
        $this->endtime = $endtime;
    }

    /**
     * Returns the file
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $file
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Sets the file
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $file
     * @return void
     */
    public function setFile(\TYPO3\CMS\Extbase\Domain\Model\FileReference $file)
    {
        $this->file = $file;
    }

     /**
     * Adds a Speaker
     *
     * @param \Goldland\Events\Domain\Model\Speaker $speaker
     * @return void
     */
    public function addSpeaker(\Goldland\Events\Domain\Model\Speaker $speaker)
    {
        $this->speaker->attach($speaker);
    }

    /**
     * Removes a Speaker
     *
     * @param \Goldland\Events\Domain\Model\Speaker $speakerToRemove The Speaker to be removed
     * @return void
     */
    public function removeSpeaker(\Goldland\Events\Domain\Model\Speaker $speakerToRemove)
    {
        $this->speaker->detach($speakerToRemove);
    }

    /**
     * Returns the speaker
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Goldland\Events\Domain\Model\Speaker> $speaker
     */
    public function getSpeaker()
    {
        return $this->speaker;
    }

    /**
     * Sets the speaker
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Goldland\Events\Domain\Model\Speaker> $speaker
     * @return void
     */
    public function setSpeaker(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $speaker)
    {
        $this->speaker = $speaker;
    }
}
