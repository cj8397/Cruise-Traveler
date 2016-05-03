<?php

namespace App;

class Stats
{
    public $total;
    public $family;
    public $nonfamily;
    public $languages;
    public $male;
    public $female;
    public $cities;
    public $countries;
    public $ages;

    function __construct($stats) {
        $this->setTotal($stats);
        $this->setFamily($stats); // sets family and non family
        $this->setLanguages($stats);
        $this->setSex($stats); // sets male and female
        $this->setCities($stats);
        $this->setCountries($stats);
        $this->setAges($stats);
    }

    function setTotal($stats) {
        if(!empty($stats['total'])) {
            $this->total = $stats['total'];
        } else {
            $this->total = null;
        }
    }

    function setFamily($stats) {
        if(!empty($stats['fam'])) {
            $this->family = $stats['fam']['family'];
            $this->nonfamily = $stats['fam']['nonfamily'];
        } else {
            $this->family = null;
            $this->nonfamily = null;
        }
    }

    function setLanguages($stats) {
        if(!empty($stats['langs'])) {
            $this->languages = $stats['langs'];
        } else {
            $languages = null;
        }
    }

    function setSex($stats) {
        if(!empty($stats['sex'])) {
            $this->male = $stats['sex']['male'];
            $this->female = $stats['sex']['female'];
        } else {
            $this->male = null;
            $this->female = null;
        }
    }

    function setCountries($stats) {
        if(!empty($stats['countries'])) {
            $this->countries = $stats['countries'];
        } else {
            $this->countries = null;
        }
    }
    function setCities($stats) {
        if(!empty($stats['cities'])) {
            $this->cities= $stats['cities'];
        } else {
            $this->cities = null;
        }
    }

    function setAges($stats) {
        if(!empty($stats['ages'])) {
            $this->ages = $stats['ages'];
        } else {
            $this->ages = null;
        }
    }

}
