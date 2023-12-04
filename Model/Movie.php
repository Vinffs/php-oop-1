<?php
include __DIR__ . "/Genre.php";
class Movie
{
  public int $id;
  public string $title;
  public string $overview;
  public float $vote_average;
  public string $poster_path;

  public string $original_language;

  public array $genres;



  function __construct($id, $title, $overview, $vote, $image, $language, $genres)
  {
    $this->id = $id;
    $this->title = $title;
    $this->overview = $overview;
    $this->vote_average = $vote;
    $this->poster_path = $image;
    $this->original_language = $language;
    $this->genres = $genres;
  }

  public function getVote()
  {
    $vote = ceil($this->vote_average / 2);
    $template = "<p>";
    for ($n = 1; $n <= 5; $n++) {
      $template .= $n <= $vote ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>';
    }
    $template .= '</p>';
    return $template;
  }


  public function printCard()
  {
    $image = $this->poster_path;
    $title = $this->title;
    $content = substr($this->overview, 0, 100) . "...";
    $custom = $this->getVote();
    $genres = $this->genres;
    include __DIR__ . "/../Views/card.php";
  }
}


$movieString = file_get_contents(__DIR__ . "/movie_db.json");
$movieList = json_decode($movieString, true);
$movies = [];


foreach ($movieList as $movie) {
  $randomGenres = [];
  for ($i = 0; $i < count($movie['genre_ids']); $i++) {
    $index = rand(0, count($genres) - 1);
    $randGenre = $genres[$index];
    array_push($randomGenres, $randGenre);
  }

  $movies[] = new Movie($movie['id'], $movie['title'], $movie['overview'], $movie['vote_average'], $movie['poster_path'], $movie['original_language'], $randomGenres);
}
