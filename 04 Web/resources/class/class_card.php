<?php

// class_card.php

// Card UI Class

class Card
{
	public $title;
	public $description;
	public $date;
	public $items;
	public $imageurl;
	public $url;
	
	public function show()
	{
		echo '<a href="' . $this->url . '">' . "\n";
		echo '<div class="card">'. "\n";
		echo '<div class="cardImg">';
		echo '<img src="' . $this->imageurl . '"></div>'. "\n";	
		echo '<div class="cardTitle">' . $this->title . '</div>'. "\n";
		echo '<div class="cardDescription">' . $this->description . '</div>'. "\n";
		echo '<div class="cardDate">';
		echo date("d M y", $this->date);
		echo '</div>'. "\n";
		echo '<div class="cardItems"> ' . $this->items . '</div>'. "\n";
		echo '</div>';
		echo '</a>';
		
	}
}
?>