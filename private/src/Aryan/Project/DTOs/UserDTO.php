<?php
declare(strict_types=1);

namespace Aryan\Project\DTOs;

use DateTime;

/**
 *
 */
class UserDTO {
    // Constants
    public const TABLE_NAME = "users";
    public const USERNAME_MAX_LENGTH = 64;
    public const PASSWORD_HASH_MAX_LENGTH = 72;
    public const EMAIL_MAX_LENGTH = 256;
    
    private int $id;
    private string $username;
    private string $passwordHash;
    private string $email;
    private ?DateTime $creationDate = null;
    private ?DateTime $lastModificationDate = null;
    private array $permissions = [];
    
    public function __construct() {}
    
    public static function fromValues(string $username, string $passwordHash, string $email) : self {
        $object = new self();
        $object->setUsername($username);
        $object->setPasswordHash($passwordHash);
        $object->setEmail($email);
        return $object;
    }
    
    public static function fromDbArray(array $dbAssocArray) : self {
        
        $user = new self();
        
        $user->setId((int) $dbAssocArray["id"]);
        $user->setUsername($dbAssocArray["username"]);
        $user->setPasswordHash($dbAssocArray["password_hash"]);
        $user->setEmail($dbAssocArray["email"]);
        
        // conversion from DB-formatted datetime strings back into DateTime objects.
        $user->setCreationDate(DateTime::createFromFormat(DB_DATETIME_FORMAT, $dbAssocArray["created_at"]));
        
        if (!empty($dbAssocArray["last_modified_at"])) {
            $user->setLastModificationDate(DateTime::createFromFormat(DB_DATETIME_FORMAT, $dbAssocArray["last_modified_at"]));
        }
        
        
        // return the created instance
        return $user;
    }
    
    public function getId(): int {
        return $this->id;
    }
    
    public function setId(int $id): void {
        $this->id = $id;
    }
    
    public function getUsername(): string {
        return $this->username;
    }
    
    public function setUsername(string $username): void {
        $this->username = $username;
    }
    
    public function getPasswordHash(): string {
        return $this->passwordHash;
    }
    
    public function setPasswordHash(string $passwordHash): void {
        $this->passwordHash = $passwordHash;
    }
    
    public function getEmail(): string {
        return $this->email;
    }
    
    public function setEmail(string $email): void {
        $this->email = $email;
    }
    
    public function getCreationDate(): ?DateTime {
        return $this->creationDate;
    }
    
    public function setCreationDate(?DateTime $creationDate): void {
        $this->creationDate = $creationDate;
    }
    
    public function getLastModificationDate(): ?DateTime {
        return $this->lastModificationDate;
    }
    
    public function setLastModificationDate(?DateTime $lastModificationDate): void {
        $this->lastModificationDate = $lastModificationDate;
    }
    
    public function getPermissions(): array {
        return $this->permissions;
    }
    
    public function toArray(): array {
        return [
            "id" => $this->getId(),
            "username" => $this->getUsername(),
            "passwordHash" => $this->getPasswordHash(),
            "email" => $this->getEmail(),
            "creationDate" => $this->getCreationDate() ? $this->getCreationDate()->format('Y-m-d H:i:s') : null,
            "lastModificationDate" => $this->getLastModificationDate() ? $this->getLastModificationDate()->format('Y-m-d H:i:s') : null,
            "permissions" => $this->getPermissionsArray(),
        ];
    }

}