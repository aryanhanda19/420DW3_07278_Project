<?php

namespace Aryan\Project\DTOs;

class PermissionDTO {
    public const TABLE_NAME = "permissions";
    
    // Properties
    private int $id;
    
    public function getId() : int {
        return $this->id;
    }
    
    public function setId(int $id) : void {
        $this->id = $id;
    }
    
    public function getPermissionIdentifier() : string {
        return $this->permissionIdentifier;
    }
    
    public function setPermissionIdentifier(string $permissionIdentifier) : void {
        $this->permissionIdentifier = $permissionIdentifier;
    }
    
    public function getPermissionName() : string {
        return $this->permissionName;
    }
    
    public function setPermissionName(string $permissionName) : void {
        $this->permissionName = $permissionName;
    }
    
    public function getPermissionDescription() : string {
        return $this->permissionDescription;
    }
    
    public function setPermissionDescription(string $permissionDescription) : void {
        $this->permissionDescription = $permissionDescription;
    }
    
    public function getDateCreated() : ?DateTime {
        return $this->dateCreated;
    }
    
    public function setDateCreated(?DateTime $dateCreated) : void {
        $this->dateCreated = $dateCreated;
    }
    
    public function getDateLastModified() : ?DateTime {
        return $this->dateLastModified;
    }
    
    public function setDateLastModified(?DateTime $dateLastModified) : void {
        $this->dateLastModified = $dateLastModified;
    }
    
    public function getDateDeleted() : ?DateTime {
        return $this->dateDeleted;
    }
    
    public function setDateDeleted(?DateTime $dateDeleted) : void {
        $this->dateDeleted = $dateDeleted;
    }
    private string $permissionIdentifier;
    private string $permissionName;
    private string $permissionDescription;
    private ?DateTime $dateCreated = null;
    private ?DateTime $dateLastModified = null;
    private ?DateTime $dateDeleted = null;
    
    // Constructor, static methods, and getter/setter methods...
    
    // Additional methods
    
    /**
     * Converts the PermissionDTO object into an associative array.
     *
     * @return array The associative array representation of the PermissionDTO object
     */
    public function toArray(): array {
        return [
            'id' => $this->id,
            'permissionIdentifier' => $this->permissionIdentifier,
            'permissionName' => $this->permissionName,
            'permissionDescription' => $this->permissionDescription,
            'dateCreated' => $this->dateCreated ? $this->dateCreated->format('Y-m-d H:i:s') : null,
            'dateLastModified' => $this->dateLastModified ? $this->dateLastModified->format('Y-m-d H:i:s') : null,
            'dateDeleted' => $this->dateDeleted ? $this->dateDeleted->format('Y-m-d H:i:s') : null,
        ];
    }
    
}