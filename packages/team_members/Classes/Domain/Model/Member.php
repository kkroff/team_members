<?php

declare(strict_types=1);

namespace Kkroff\TeamMembers\Domain\Model;

use TYPO3\CMS\Extbase\Annotation as Extbase;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Member
 */
class Member extends AbstractEntity
{
    /**
     * Name of the team member
     *
     * @var string
     * @Extbase\Validate("NotEmpty")
     */
    protected string $name = '';

    /**
     * Role in the company
     *
     * @var string
     * @Extbase\Validate("NotEmpty")
     */
    protected string $role = '';

    /**
     * Department
     *
     * @var string
     * @Extbase\Validate("NotEmpty")
     */
    protected string $department = '';

    /**
     * Photo of the team member
     *
     * @var ObjectStorage<FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected ObjectStorage $photo;

    /**
     * Short description
     *
     * @var string
     */
    protected string $description = '';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->photo = new ObjectStorage();
    }

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns the role
     *
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * Sets the role
     *
     * @param string $role
     * @return void
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    /**
     * Returns the department
     *
     * @return string
     */
    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * Sets the department
     *
     * @param string $department
     * @return void
     */
    public function setDepartment(string $department): void
    {
        $this->department = $department;
    }

    /**
     * Returns the photo
     *
     * @return ObjectStorage<FileReference>
     */
    public function getPhoto(): ObjectStorage
    {
        return $this->photo;
    }

    /**
     * Sets the photo
     *
     * @param ObjectStorage<FileReference> $photo
     * @return void
     */
    public function setPhoto(ObjectStorage $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * Adds a photo
     *
     * @param FileReference $photo
     * @return void
     */
    public function addPhoto(FileReference $photo): void
    {
        $this->photo->attach($photo);
    }

    /**
     * Removes a photo
     *
     * @param FileReference $photo
     * @return void
     */
    public function removePhoto(FileReference $photo): void
    {
        $this->photo->detach($photo);
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
