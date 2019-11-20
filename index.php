<?php

$html = utf8_decode(file_get_contents('https://www.lequipe.fr/Football/FootballFicheJoueur58221.html'));

$dom = new DOMDocument();
@$dom->loadHTML($html);
$finder = new DomXPath($dom);
$classname="identite";
$nodes = @$finder->query("//*[contains(@class, '$classname')]");

$values = $nodes->item(0)->getElementsByTagName('strong');


$data = [
  'name' => null,
  'nationality' => null,
  'age' => null,
  'birthdate' => null,
  'citybirth' => null,
  'size' => null,
  'weight' => null,
  'post' => null,
];

foreach ($values as $key => $value) {
  $value = $value->nodeValue;
  echo $key . ':' . $value . '<br>';
  if ($key === 0) {
    $data ['name'] = $value;
  }
  if ($key === 1) {
    $data ['nationality'] = $value;
  }
  if ($key === 2) {
    $data ['age'] = $value;
  }
  if ($key === 3) {
    $data ['birthdate'] = $value;
  }
  if ($key === 4) {
    $data ['citybirth'] = $value;
  }
  if ($key === 5) {
    $data ['size'] = $value;
  }
  if ($key === 6) {
    $data ['weight'] = $value;
  }
  if ($key === 7) {
    $data ['post'] = $value;
  }
}

$dates = explode(' ', $data['birthdate']);

$months = array("janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");

$month = $dates[2];
$key = array_search($month, $months);

  var_dump($key);

?>
