<?php declare(strict_types=1);

namespace App\Controller;

use App\Form\Type\ProductType;
use App\LoansCorp\Loans\Application\Command\Product\CreateProductCommand;
use App\LoansCorp\Loans\Application\Query\ProductQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Attribute\Route;

class ProductController extends AbstractController
{
    public function __construct(private readonly MessageBusInterface $messageBus) {}

    #[Route('/products', name: 'products', methods: ['GET', 'POST'])]
    public function list(Request $request, ProductQuery $productQuery): Response
    {
        $form = $this->createForm(ProductType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $command = new CreateProductCommand(
                $form->get('title')->getData(),
                $form->get('term')->getData(),
                (string) $form->get('interest')->getData(),
            );

            $this->messageBus->dispatch($command);

            return $this->redirectToRoute('products');
        }

        $products = $productQuery->findAll();

        return $this->render('product/list.html.twig', [
            'products' => $products,
            'form' => $form->createView(),
        ]);
    }
}
