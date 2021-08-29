<?php

namespace App\Form;

use App\Entity\Topic;
use App\Entity\UserCollection;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserCollectionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                'attr' => [
                    'class' => "form-control mb-3",
                    'placeholder' => "Name",
                    'autofocus' => true
                ],
                'label' => false
            ])
            ->add('description', null, [
                'attr' => [
                    'class' => "form-control mb-3",
                    'placeholder' => "Description",
                ],
                'label' => false
            ])
            ->add('Topic', EntityType::class, [
                'class' => Topic::class,
                'choice_label' => 'name',
                'required' => true,
                'attr' => [
                    'class' => "form-control mb-3",
                    'placeholder' => "Description",
                ],
                'label' => false
            ]);

        $extraFields = ['integer', 'string', 'text', 'date', 'boolean'];

        foreach ($extraFields as $field) {
            foreach ([1, 2, 3] as $number) {
                $builder->add($field . $number . '_name', null, [
                    'attr' => [
                        'class' => "form-control mb-3",
                        'placeholder' => ucfirst($field) . ' field ' . $number . ' name',
                    ],
                    'label' => false
                ]);

                $builder->add($field . $number . '_visible', CheckboxType::class, [
                    'row_attr' => ['class' => "form-check mb-3"],
                    'attr' => ['class' => "form-check-input"],
                    'label' => 'Display ' . $field . ' ' . $number . ' field'
                ]);
            }
        }

        $builder->add('save', SubmitType::class, [
            'attr' => [
                'class' => 'btn btn-primary w-100'
            ]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UserCollection::class,
        ]);
    }
}
