<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ProductController extends AbstractController
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    #[Route('/product', methods: ['GET'])]
    public function number(): Response
    {
        return new Response('Users', 200);
    }

    #[Route('/product', methods: ['POST'])]
    public function createProduct(Request $request, EntityManagerInterface $entityManager, SerializerInterface $serializer): JsonResponse
    {
        $requestData = $request->getContent();

        try {
            $product = $serializer->deserialize($requestData, Product::class, 'json');
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Missing required fields'], 400);

        }

        $entityManager->persist($product);
        $entityManager->flush();

        $data = $serializer->serialize($product, 'json');

        return new JsonResponse(['message' => 'Product created!', 'product' => json_decode($data)], 201);
    }
}