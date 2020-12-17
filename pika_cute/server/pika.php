<?php
class Pikachu {
    public $p;
    public $i;
    public $k;
    public $a;
    public $c;
    public $h;
    public $u;

    public function __construct() {
        $this->p = "Pikachu";
        $this->i = "pIkachu";
        $this->k = "piKachu";
        $this->a = "pikAchu";
        $this->c = "pikaChu";
        $this->h = "pikacHu";
        $this->u = "pikachU";
    }

    public function set_cookie(){
        $data = serialize($this);
        setrawcookie('sth', base64_encode($data), time()+60, "", "", false, true);
        return base64_encode($data);
    }
}
?>
