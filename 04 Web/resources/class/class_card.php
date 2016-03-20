<?php

// class_card.php
// Card UI Class

include '../resources/config.php';
include_once CLASS_PATH . 'class_service.php';
class Card {

    public $service;
    public $title;
    public $description;
    public $date;
    public $items;
    public $imageurl;
    public $url; 

    public function show() {
        echo '<a href="' . $this->url . '">' . "\n";
        echo '<div class="card">' . "\n";
        echo '<div class="cardImg">';
        echo '<img src="' . $this->imageurl . '"></div>' . "\n";
        echo '<div class="cardTitle">' . $this->title . '</div>' . "\n";
        echo '<div class="cardDescription">' . $this->description . '</div>' . "\n";
        echo '<div class="cardDate">';
        echo date("d M y", $this->date);
        echo '</div>' . "\n";
        echo '<div class="cardItems"> ' . $this->items . '</div>' . "\n";
        echo '</div>';
        echo '</a>';
    }
    public function load($sid){
        $this->service = new Service();
        $this->service->load($sid);
        $this->title = $this->service->name;
        $this->description = $this->service->description;
        $this->date = $this->service->dateadded;
        $this->imageurl = $this->service->image;
        $this->url = 'javascript:loadservice('. "'" . $this->service->id . "'" .')';
    }
}

?>