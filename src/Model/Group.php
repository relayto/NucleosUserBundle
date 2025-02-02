<?php

declare(strict_types=1);

/*
 * This file is part of the NucleosUserBundle package.
 *
 * (c) Christian Gripp <mail@core23.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Nucleos\UserBundle\Model;

abstract class Group implements GroupInterface
{
    /**
     * @var mixed
     */
    protected $id;

    protected string $name;

    /**
     * @var string[]
     */
    protected array $roles;

    /**
     * @param string[] $roles
     */
    public function __construct(string $name, array $roles = [])
    {
        $this->name  = $name;
        $this->roles = $roles;
    }

    public function __toString(): string
    {
        return $this->getName();
    }

    public function addRole(string $role): void
    {
        if (!$this->hasRole($role)) {
            $this->roles[] = strtoupper($role);
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function hasRole(string $role): bool
    {
        return \in_array(strtoupper($role), $this->roles, true);
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function removeRole(string $role): void
    {
        if (false !== $key = array_search(strtoupper($role), $this->roles, true)) {
            unset($this->roles[$key]);
            $this->roles = array_values($this->roles);
        }
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }
}
