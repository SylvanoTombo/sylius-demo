<?php

declare(strict_types=1);

namespace App\Entity\Customer;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Customer\Customer;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Sylius\Component\Customer\Model\CustomerGroup as BaseCustomerGroup;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_customer_group")
 */
class CustomerGroup extends BaseCustomerGroup
{

    /**
     * @ORM\ManyToMany(targetEntity=Customer::class, mappedBy="groups")
     */
    private $customers;

    public function __construct()
    {
        $this->customers = new ArrayCollection();
    }


    /**
     * @return Collection|Customer[]
     */
    public function getCustomers(): Collection
    {
        return $this->customers;
    }

    public function addCustomer(Customer $customer): self
    {
        if (!$this->customers->contains($customer)) {
            $this->customers[] = $customer;
            $customer->addGroup($this);
        }

        return $this;
    }

    public function removeCustomer(Customer $customer): self
    {
        if ($this->customers->removeElement($customer)) {
            $customer->removeGroup($this);
        }

        return $this;
    }
}
