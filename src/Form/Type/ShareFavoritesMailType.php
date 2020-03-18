<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class ShareFavoritesMailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('to', EmailType::class, ['label' => 'Recipient', 'attr' => ['placeholder' => 'johnsmith@mail.com']])
            ->add('from', EmailType::class, ['label' => 'You name', 'attr' => ['placeholder' => 'John Smith']])
            ->add('send', SubmitType::class, ['label' => 'Share my favorites !'])
        ;
    }
}
