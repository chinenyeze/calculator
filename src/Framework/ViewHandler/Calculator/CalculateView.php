<?php

namespace Company\Calculator\Framework\ViewHandler\Calculator;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class CalculateView
{
    /**
     * CalculateView constructor.
     * @param Twig $twig
     */
    public function __construct(
        public Twig $twig,
    ) {
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $viewData = [
            'name' => 'User',
        ];

        return $this->twig->render($response, 'home.twig', $viewData);
    }
}
