<?php

class Stats
{
    public function getStatsMensuels(): array
    {
        return [
            'labels' => ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre'],
            'ca' => [12, 17, 3, 8, 2, 7, 9, 7, 2, 5, 7, 18],
            'depenses' => [6, 7, 5, 7, 4, 13, 9, 8, 2, 7, 6, 12]
        ];
    }
}
