<?php

namespace App\Service;

use Orhanerday\OpenAi\OpenAi;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class OpenAiService
{

    public function __construct( private ParameterBagInterface $parameterBag )
    {
    }

    public function getHistory( string $theme ) : string
    {
        $openAiKey = $this->parameterBag->get('OPENAI_API_KEY');

        $openAi = new OpenAi($openAiKey);

        $complete = $openAi->completion([
            'model' => 'text-davinci-003',
            'prompt' => 'Père Noël, raconte moi une histoire sur ' . $theme,
            'max_tokens' => 3500,
            'temperature' => 0,
            'frequency_penalty' => 0.5,
            'presence_penalty' => 0,
        ]);

        $json = json_decode( $complete, true );

        if ( isset( $json['choices'][0]['text'] ) ) {
            return $json['choices'][0]['text'];
        }

        return 'Une erreur est survenue';
    }
}