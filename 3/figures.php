<?php
abstract class Figure
{
    public function load($file)
        $this->__construct($json = file_get_contents($file));

    public function print() {
        $text = get_class($this).'<br>Площадь: '.$this->area().'<br>';
        $values = get_object_vars($this);
        if (isset($values['a']))
            $text .= 'Сторона: '.$values['a'].'<br>';
        if (isset($values['b']))
            $text .= 'Сторона 2: '.$values['b'].'<br>';
        if (isset($values['h']))
            $text .= 'Высота: '.$values['h'].'<br>';
        if (isset($values['r']))
            $text .= 'Радиус: '.$values['r'].'<br>';
        if (isset($values['n']))
            $text .= 'Количество сторон: '.$values['n'].'<br>';
        return $text;
    }
}

class Rectangle extends Figure
{
    protected $a;
    protected $b;

    function __construct($a = 0, $b = 0, $json = false)
    {
        if ($json) {
            $json = json_decode($json);
            $this->a = $json[0];
            $this->b = $json[1];
        } else {
            $this->a = $a;
            $this->b = $b;
        }
    }

    public function save($file)
        file_put_contents($file, json_encode([$this->a, $this->b]));

    public function area()
    {
        try {
            return $this->a * $this->b;
        } catch (Exception $e) {
            return 0;
        }
    }
}

class Circle extends Figure
{
    protected $r;

    function __construct($r = 0, $json = false)
    {
        if ($json) {
            $this->r = json_decode($json)[0];
        } else {
            $this->r = $r;
        }
    }

    public function save($file)
        file_put_contents($file, json_encode([$this->r]));

    public function area()
    {
        try {
            return pi() * pow($this->r, 2);
        } catch (Exception $e) {
            return 0;
        }
    }
}

class Pyramid extends Figure
{
    protected $a;
    protected $n;
    protected $h;

    function __construct($a = 0, $n = 0, $h = 0, $json = false)
    {
        if ($json) {
            $json = json_decode($json);
            $this->a = $json[0];
            $this->n = $json[1];
            $this->h = $json[2];
        } else {
            $this->a = $a;
            $this->n = $n;
            $this->h = $h;
        }
    }

    public function save($file)
        file_put_contents($file, json_encode([$this->a, $this->n, $this->h]));

    public function area()
    {
        try {
            $s1 = ($this->n * pow($this->a, 2)) / (4 * tan(deg2rad(180) / $this->n));
            $s2 = sqrt(pow($this->h, 2) + pow($this->a / (2 * sin(deg2rad(180) / $this->n)), 2));
            return $s1 + $s2;
        } catch (Exception $e) {
            return 0;
        }
    }
}