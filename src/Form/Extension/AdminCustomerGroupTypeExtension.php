<?php

namespace App\Form\Extension;

use App\Form\Type\CustomerAutocompleteChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractTypeExtension;
use Sylius\Bundle\CustomerBundle\Form\Type\CustomerGroupType;

class AdminCustomerGroupTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('customers', CustomerAutocompleteChoiceType::class, [
            'multiple' => true,
            'choice_name' => 'firstName'
        ]);
    }

    public function getExtendedTypes()
    {
        return [CustomerGroupType::class];
    }
}
