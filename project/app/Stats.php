<?php

namespace App;

class Stats
{
    public $family;
    public $nonfamily;
    public $languages;
    public $male;
    public $female;
    function __construct($stats) {

        $this->family = $stats['fam']['family'];
        $this->nonfamily = $stats['fam']['nonfamily'];
        $this->languages = $stats['lang'];
        $this->male = $stats['sex']['male'];
        $this->female = $stats['sex']['female'];
    }
}
