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
            // 0.5 centime => 5000
            //        5$ => 50000
        try {
            $complete = $openAi->completion([
                'model' => 'davinci',
                'prompt' => $theme,
                'max_tokens' => 1000,
                'temperature' => 0,
                'frequency_penalty' => 0.5,
                'presence_penalty' => 0,
            ]);

        } catch (\Exception $e) {
            return 'Une erreur est survenue';
        }


        $json = json_decode( $complete, true );

        if ( isset( $json['choices'][0]['text'] ) ) {
            return $json['choices'][0]['text'];
        }

        return 'Une erreur est survenue';
    }
}