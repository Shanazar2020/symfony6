<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{
    #[Route('/api/songs/{id<\d+>}', name: 'app_song_getsong', methods: ["GET"])]
    public function getSong(int $id, LoggerInterface $logger): Response
    {
        $song = [
            'id' => $id,
            'name' => 'Skyfall',
            'url' => 'https://symfonycasts.s3.amazonaws.com/sample.mp3',
        ];

        $logger->info('Requested song {song}', [
            'song' => $id
        ]);

        return $this->json($song);
    }

}