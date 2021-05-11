<?php


class GetMovieInfo {

    // Stavi private i dodaj getere i setere...

    private $naziv;
    private $movieid;
    private $god;
    private $zanr;

    public function __construct($naziv) {
        $this->naziv = $naziv;
        $this->getInfo();
    }

    // Magic get Method
    public function __get($property) {
      if(property_exists($this, $property)) {
          return $this->$property;
      }
  }
    public function getInfo() {

      $result = GetApi::getMovie(APIKEY, $this->naziv);
      $myArray = json_decode($result,true);

      $this->naziv = $myArray['Title'];
      $this->god = $myArray['Year'];
      $this->zanr = $myArray['Genre'];
      $this->movieid = $myArray['imdbID'];
    }
}