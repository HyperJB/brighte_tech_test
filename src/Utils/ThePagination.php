<?php

namespace App\Utils;

use App\Controller\ComputerPartsController;
use App\Entity\ComputerParts;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * ThePagination Class
 */
class ThePagination extends controller {

    public static function setup(ComputerPartsController $obj, $type, Request $request) {

        // Retrieve the entity manager of Doctrine
        $entityManager = $obj->getDoctrine()->getManager();
        
        // Get some repository of data, in our case we have an Parts entity
        $partsRepository = $entityManager->getRepository(ComputerParts::class);
                
        // Find all the data on the Parts table, filter your query as you need
        $allPartsQuery = $partsRepository->createQueryBuilder('p')
            ->orderBy('p.product' . $type, 'ASC')
            ->getQuery();
        
        /* @var $paginator \Knp\Component\Pager\Paginator */
        $paginator  = $obj->get('knp_paginator');
        
        // Paginate the results of the query
        $parts = $paginator->paginate(
            // Doctrine Query, not results
            $allPartsQuery,
            // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
            10
        );

        return $parts;

    }

}