<?php
class Vehicule{
    const MAX_SPEED = 60;

    private $model;
    private $power;

    private $engine = false;
    private $speed = 0;
    private $state = 100;

    public function __construct( $model = 'Tesla Roadster', $power = 5 ){
        $this->model = $model;
        $this->power = $power;
    }

    public function start(){
        $this->engine = true;
    }

    public function stop(){
        $this->engine = false;
        $this->speed = 0;
    }

    public function inscreaseSpeed(){
        if( $this->engine === true ){
            $this->speed += $this->power;
            if( $this->speed > self::MAX_SPEED ){
                $this->speed = self::MAX_SPEED;
            }
        }
    }

    public function decreaseSpeed(){
        if( $this->engine === true ){
            $this->speed -= rand( 1, $this->power );
            if( $this->speed < 0 ){
                $this->speed = 0;
            }
        }
    }

    public function setDamage( $damage ){
        $this->state -= $damage;
        if( $this->state <= 0 ){
            $this->state = 0;
            $this->stop();
            return false;
        }

        return true;
    }

    public function getModel(){
        return $this->model;
    }
}
