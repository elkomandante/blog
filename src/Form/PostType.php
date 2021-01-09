<?php

namespace App\Form;

use App\Entity\Post;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\NotBlank;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('content', CKEditorType::class, [
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('excerpt', null, [
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('imageFile', FileType::class, [
                'constraints' => [
                    new Image([
                        'maxSize' => '1024k'
                    ])
                ],
                'mapped' => false,
                'required' =>false
            ])
            ->add('thumbnailImageFile', FileType::class, [
                'constraints' => [
                    new Image([
                        'maxSize' => '1024k'
                    ])
                ],
                'mapped' => false,
                'required' =>false
            ])
            ->add('isPublished',null , [
                    'required' => false
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
