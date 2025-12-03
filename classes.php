<?php

declare(strict_types=1);

class SuperHero
{
  public function __construct(
    public string $name,
    public array $powers,
    public string $planet
  ) {
  }

  public function attack()
  {
    return "
    $this->name ataca con sus poderes";
  }

  public function showAll() {
    return get_object_vars($this);
  }

  public function description()
  {
    $powers = join(", ", $this->powers);
    return "
    $this->name es un superheroe que viene de
    $this->planet y tiene los siguientes poderes: 
    $powers";
  }

  public static function random() {
    $names = ["Thor", "Spiderman", "Wolverine", "Ironman", "Hulk"];
    $powers = [
      ["Superfuerza", "Volar", "Rayos laser"],
      ["Superfuerza", "Super agilidad", "Telaranas"],
      ["Regeneracion", "Superfuerza", "Garras de Adamantium"],
      ["Superfuerza", "Volar", "Rayos laser"],
      ["Superfuerza", "Super agilidad", "Cambio de tamano"],
    ];
    $planets = ["Asgard", "HulkWorld", "Krypton", "Tierra"];

    $name = $names[array_rand($names)];
    $power = $powers[array_rand($powers)];
    $planet = $planets[array_rand($planets)];

    // echo "El superheroe elegido es $name, que viene de $planet y tiene los siguientes poderes: " . implode(", ", $power);

    return new self($name, $power, $planet);
  }
}

// estatico
$hero = SuperHero::random(); // metodo estatico
echo $hero->description();
