<?php

namespace App\Controller;

// Imports
use App\Entity\ComputerParts;
use App\Utils\ThePagination;
use App\Utils\CreateEditForm;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class ComputerPartsController extends Controller
{
    /**
     * @Route("/", name="product_list", methods={"GET"})
     */
    public function index(Request $request) {

        // Get request for sorting
        $sortType = (!empty($_GET['type']) ? $_GET['type'] : 'Name');

        // Set pagination
        $parts = ThePagination::setup($this, $sortType, $request);

        return $this->render('computer_parts/index.html.twig', 
            array(
                'parts' => $parts,
            )
        );
        
    }

    /**
     * @Route("/product-create", name="product_create", methods={"GET","POST"})
     */
    public function newComponent(Request $request) {
        
        $part = new ComputerParts();

        // Get Create Form
        $mod = CreateEditForm::getForm($this, $part, $request);
        $form = $mod['form'];

        // When form is submitted and is valid
        if($form->isSubmitted() && $form->isValid()) {

            // Add new item
            CreateEditForm::addEditPart($this, $mod);

            // Redirect to Product list
            return $this->redirectToRoute('product_list');

        }

        return $this->render('computer_parts/newComponent.html.twig', 
            array(
                'form' => $mod['form']->createView(),
            )
        );
    }

    /**
     * @Route("/product-edit/{id}", name="product_edit", methods={"GET","POST"})
     */
    public function editComponent(Request $request, $id) {

        // Get Selected Product from Database
        $part = $this->getDoctrine()->getRepository(ComputerParts::class)->find($id);

        // Get Edit Form
        $mod = CreateEditForm::getForm($this, $part, $request);
        $form = $mod['form'];

        // When form is submitted and is valid
        if($form->isSubmitted() && $form->isValid()) {

            // Update product
            CreateEditForm::addEditPart($this, $mod);

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
                'part' => $part,
            )
        );

    }


    /**
     * @Route("/delete/{id}", name="delete_record", methods={"DELETE"})
     */
    public function deleteRecord(Request $request, $id) {

        // Get product from database via id
        $part = $this->getDoctrine()->getRepository(ComputerParts::class)->find($id);

        // $filesystem = new Filesystem();
        // $filesystem->remove($request->getPathInfo() . '/' . $part['productpicture']);

        // Delete selected product via id 
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($part);
        $entityManager->flush();

        $response = new Reponse();
        $response->send();
    }

}
