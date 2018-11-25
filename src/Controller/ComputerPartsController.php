<?php

namespace App\Controller;

// Imports
use App\Entity\ComputerParts;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\Integer;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class ComputerPartsController extends Controller
{
    /**
     * @Route("/", name="product_list", methods={"GET"})
     */
    public function index(Request $request)
    {

        $sortType = (!empty($_GET['type']) ? $_GET['type'] : 'Name');

        // Retrieve the entity manager of Doctrine
        $entityManager = $this->getDoctrine()->getManager();
        
        // Get some repository of data, in our case we have an Parts entity
        $partsRepository = $entityManager->getRepository(ComputerParts::class);
                
        // Find all the data on the Parts table, filter your query as you need
        $allPartsQuery = $partsRepository->createQueryBuilder('p')
            ->orderBy('p.product' . $sortType, 'ASC')
            ->getQuery();
        
        /* @var $paginator \Knp\Component\Pager\Paginator */
        $paginator  = $this->get('knp_paginator');
        
        // Paginate the results of the query
        $parts = $paginator->paginate(
            // Doctrine Query, not results
            $allPartsQuery,
            // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
            10
        );

        return $this->render('computer_parts/index.html.twig', 
            array(
                'parts'   => $parts,
            )
        );
    }

    /**
     * @Route("/product-create", name="product_create", methods={"GET","POST"})
     */
    public function newComponent(Request $request) {
        $part = new ComputerParts();

        $form = $this->createFormBuilder($part)

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
                    'required' => true,
                    'attr' => array(
                        'class' => 'form-control'
                    )
                )
            )

            // Save Button
            ->add('save', SubmitType::class,
                array(
                    'label' => 'Create', 
                    'attr' => array(
                        'class' => 'btn btn-primary mt-3'
                    )
                )
            )
            ->getForm();

        
        $form->handleRequest($request);

        // When form is submitted and is valid
        if($form->isSubmitted() && $form->isValid()) {

            // Set submitted data
            $computerPart = $form->getData();

            // Set image upload path
            $directory = $this->get('kernel')->getProjectDir() . '/public/images/uploads/';

            // Assign Picture Data
            $file = $form['productPicture']->getData();

            // Store original filename
            $part->setProductPicture($file->getClientOriginalName());

            if ($file instanceof UploadedFile) {
                $fileName = $part->getProductPicture();

                // Move to directory location
                $file->move($directory, $fileName);
                
                // Save Filename as Picture Value
                $part->setProductPicture($fileName);
            }
            
            // Save to database
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($computerPart);
            $entityManager->flush();
            //

            // Redirect to Product list
            return $this->redirectToRoute('product_list');
        }

        return $this->render('computer_parts/newComponent.html.twig', 
            array(
                'form' => $form->createView(),
            )
        );
    }

    /**
     * @Route("/product-edit/{id}", name="product_edit", methods={"GET","POST"})
     */
    public function editComponent(Request $request, $id) {

        // Get Selected Product from Database
        $part = $this->getDoctrine()->getRepository(ComputerParts::class)->find($id);

        $form = $this->createFormBuilder($part)
        
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

        // When form is submitted and is valid
        if($form->isSubmitted() && $form->isValid()) {

            // Set submitted data
            $computerPart = $form->getData();

            // Set image upload path
            $directory = $this->get('kernel')->getProjectDir() . '/public/images/uploads/';

            // Assign Picture Data
            $file = $form['productPicture']->getData();

            // Store original filename
            $part->setProductPicture($file->getClientOriginalName());

            if ($file instanceof UploadedFile) {
                $fileName = $part->getProductPicture();

                // Move to directory location
                $file->move($directory, $fileName);
                
                // Save Filename as Picture Value
                $part->setProductPicture($fileName);
            }
            
            // Save to database
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($computerPart);
            $entityManager->flush();
            //

            // Redirect to Product list
            return $this->redirectToRoute('product_list');
        }

        return $this->render('computer_parts/editComponent.html.twig', 
            array(
                'form' => $form->createView(),
                'current_image' => '/images/uploads/' . $part->getProductPicture()
            )
        );
    }


    /**
     * @Route("/product-details/{id}", name="product_details")
     */
    public function showDetails($id) {

        // Get Detail of product from database via id
        $part = $this->getDoctrine()->getRepository(ComputerParts::class)->find($id);

        return $this->render('computer_parts/showDetails.html.twig',
            array(
                'part' => $part
            )
        );
    }


    /**
     * @Route("/delete/{id}", name="delete_record", methods={"DELETE"})
     */
    public function deleteRecord(Request $request, $id) {

        // Get product from database via id
        $part = $this->getDoctrine()->getRepository(ComputerParts::class)->find($id);

        // Delete selected product via id 
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($part);
        $entityManager->flush();

        $response = new Reponse();
        $response->send();
    }

}
