<?php

namespace App\Controller;

use App\Form\HistoryType;
use App\Service\OpenAiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index( Request $request , OpenAiService $openAi ): Response
    {
        $form = $this->createForm(HistoryType::class );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $history = $openAi->getHistory( $data['theme'] );

            return $this->render('home/history.html.twig', [
                'history' => $history ?? null,
            ]);
        }

        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
