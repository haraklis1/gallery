<?php

namespace Awesomeirko\GalleryBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PhotosType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name')
                ->add('description')
                ->add('isAlbumCover', 'checkbox', array(
                    'required' => false,
                ))
                ->add('albumId', 'hidden')
                ->add('file', 'file')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Awesomeirko\GalleryBundle\Entity\Photos'
        ));
    }

    public function getName() {
        return 'awesomeirko_gallerybundle_photostype';
    }

}
