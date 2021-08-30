<?php

namespace App\Form;

use App\Entity\Item;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ItemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $collection = $options['collection'];

        $builder
            ->add('name', null, [
                'attr' => [
                    'class' => "form-control mb-3",
                    'placeholder' => "Name",
                    'autofocus' => true
                ],
                'label' => false
            ]);

//        $builder->add('tags', CollectionType::class, [
//            'entry_type' => TagType::class,
//            'entry_options' => ['label' => false],
//            'allow_add' => true,
//        ]);

        foreach ($collection->getExtraFields() as $field) {
            foreach ([1, 2, 3] as $number) {
                if ($collection->getExtraFieldVisibility($field, $number))
                    $builder->add($field . $number, $field == 'text' ? TextareaType::class : null, [
                        'attr' => [
                            'class' => "form-control mb-3",
                            'placeholder' => $collection->getExtraFieldName($field, $number),
                        ],
                        'label' => false
                    ]);
            }
        }

        $builder->add('save', SubmitType::class, [
            'attr' => [
                'class' => 'btn btn-xs btn-primary w-100'
            ]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Item::class,
        ]);

        $resolver->setRequired(['collection']);
    }
}
