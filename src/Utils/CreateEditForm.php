<?php

namespace App\Utils;

use App\Controller\ComputerPartsController;
use App\Entity\ComputerParts;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\Integer;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Forms Class
 */
class CreateEditForm extends controller {

    public static function getForm(ComputerPartsController $obj, ComputerParts $part, Request $request) {

       $form = $obj->createFormBuilder($part)
        
            // Product Name Field
            ->add('productName', TextType::class, 
                array(
                    'label' => 'Name', 
                    'required' => true,
                    'attr'=> array(
                        'class' => 'form-control'
                    )
                )
            )
        
            // Product Price Field
            ->add('productPrice', TextType::class,
                array(
                    'label' => 'Price', 
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control'
                    )
                )
            )
        
            // Product Description Field
            ->add('productDescription', TextareaType::class,
                array(
                    'label' => 'Description', 
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control'
                    )
                )
            )
        
            // Product Picture Field
            ->add('productPicture', FileType::class, 
                array(
                    'label' => 'Picture', 
                    'data_class' => null,
                    'required' => false,
                    'attr' => array(
                        'class' => 'form-control'
                    )
                )
            )
        
            // Product Save Button
            ->add('save', SubmitType::class,
                array(
                    'label' => 'Save', 
                    'attr' => array(
                        'class' => 'btn btn-primary mt-3'
                    )
                )
            )
            ->getForm();

        $form->handleRequest($request);

        return array(
            'form' => $form,
            'part' => $part,
        );

    }

    public static function addEditPart(ComputerPartsController $obj, Array $mod) {

        $form = $mod['form'];
        $part = $mod['part'];


        // Set submitted data
        $computerPart = $form->getData();

        // Set image upload path
        $directory = $obj->get('kernel')->getProjectDir() . '/public/images/uploads/';

        // Assign Picture Data
        $file = $form['productPicture']->getData();

        // Store original filename
        $part->setProductPicture($file->getClientOriginalName());

        if ($file instanceof UploadedFile) {
            //$fileName = $part->getProductPicture();

            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move to directory location
            $file->move($directory, $fileName);
            
            // Save Filename as Picture Value
            $part->setProductPicture($fileName);
        }
        
        // Save to database
        $entityManager = $obj->getDoctrine()->getManager();
        $entityManager->persist($computerPart);
        $entityManager->flush();
        //

    }

}
