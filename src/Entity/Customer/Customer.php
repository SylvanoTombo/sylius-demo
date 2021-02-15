<?php

declare(strict_types=1);

namespace App\Entity\Customer;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Customer\CustomerGroup;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Sylius\Component\Core\Model\Customer as BaseCustomer;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_customer")
 */
class Customer extends BaseCustomer
{
    /**
     * @ORM\ManyToMany(targetEntity=CustomerGroup::class, inversedBy="customers")
     * @ORM\JoinTable(
     *  name="boldy_customer_customer_groups",
     *  joinColumns={
     *      @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     *  },
     *  inverseJoinColumns={
     *      @ORM\JoinColumn(name="customer_group_id", referencedColumnName="id")
     *  }
     * )
     */
    private $groups;

    public function __construct()
    {
        $this->groups = new ArrayCollection();
    }


/**
     * @return Collection|CustomerGroup[]
     */
    public function getGroups(): Collection
    {
        return $this->groups;
    }

    public function addGroup(CustomerGroup $group): self
    {
        if (!$this->groups->contains($group)) {
            $this->groups[] = $group;
        }

        return $this;
    }

    public function removeGroup(CustomerGroup $group): self
    {
        $this->groups->removeElement($group);

        return $this;
    }
}
