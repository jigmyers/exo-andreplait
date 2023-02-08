<?php

declare(strict_types=1);

namespace App;

class Rover
{
    private string $direction;
    private int $y;
    private int $x;

    public function __construct(int $x, int $y, string $direction)
    {
        $this->direction = $direction;
        $this->y = $y;
        $this->x = $x;
    }

    /**
     * @param $side
     * @param $command
     * @return void
     *
     * Passer sur une fonction me paraît approprié pour la lisibilité
     */
    public function rotateDependingSideAndCommand($side, $command){
        switch ($side){
            case "N":
                if($command === 'r'){
                    $this->direction = "E";
                } else {
                    $this->direction = "W";
                }
                break;
            case "S":
                if($command == 'r'){
                    $this->direction = "W";
                } else {
                    $this->direction = "E";
                }
                break;
            case "W":
                if($command = 'r'){
                    $this->direction = "N";
                } else{
                    $this->direction = "S";
                }
                break;
            case "E":
                if($command = 'r'){
                    $this->direction = "S";
                } else {
                    $this->direction = "N";
                }
                break;
            default:
                //TODO Display Error
                break;
        }
    }

    /**
     * @param string $commandsSequence
     * @return void
     */
    public function receive(string $commandsSequence): void
    {
        $commandsSequenceLenght = strlen($commandsSequence);
        for ($i = 0; $i < $commandsSequenceLenght; ++$i) {
            $command = substr($commandsSequence, $i, 1);
            if ($command === "l" || $command === "r") {
                $this->rotateDependingSideAndCommand($this->direction, $command);
            } else {
                // Displace Rover
                $displacement1 = -1;

                if ($command === "f") {
                    $displacement1 = 1;
                }
                $displacement = $displacement1;

                switch ($this->direction){
                    case "N":
                        $this->y += $displacement;
                        break;
                    case "S":
                        $this->y -= $displacement;
                        break;
                    case "W":
                        $this->x -= $displacement;
                        break;
                    case "E":
                        $this->x += $displacement;
                        break;
                    default:
                        //TODO Display Error
                        break;
                }
            }
        }
    }
}