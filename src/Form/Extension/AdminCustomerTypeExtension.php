<?php

declare(strict_types=1);

namespace App\Form\Extension;

use App\Repository\CustomerGroupRepository;
use Sylius\Bundle\CustomerBundle\Form\Type\CustomerType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceAutocompleteChoiceType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\FormBuilderInterface;

class AdminCustomerTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('groups', ResourceAutocompleteChoiceType::class, [
                'resource' => 'sylius.customer_group',
                'multiple' => true,
                'label' => 'sylius.form.customer.group',
                'choice_name' => 'name',
                'choice_value' => 'id',
                'required' => false,
            ])
        ;

    }

    public function getExtendedTypes(): array
    {
        return [CustomerType::class];
    }
}
