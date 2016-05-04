<?php

namespace App;

class Stats
{
    public $family;
    public $nonfamily;
    public $languages;
    public $male;
    public $female;
<<<<<<< HEAD
    function __construct($stats) {
=======

    function __construct($stats)
    {
>>>>>>> efe722e354318845f7597afd2190e010bb5d188b

        $this->family = $stats['fam']['family'];
        $this->nonfamily = $stats['fam']['nonfamily'];
        $this->languages = $stats['lang'];
        $this->male = $stats['sex']['male'];
        $this->female = $stats['sex']['female'];
    }
}
