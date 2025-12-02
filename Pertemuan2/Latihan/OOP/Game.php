<?php
require_once 'Produk.php';
require_once 'Komik.php';

class Game extends Produk {
    public $waktuMain;

    public function __construct($judul, $penulis, $penerbit, $harga, $waktuMain) {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }

    public function getInfoProduk() {
        $str = "Game : " . parent::getLabel() . " | (Rp. " . $this->harga . ") - {$this->waktuMain} Jam.";
        return $str;
    }
}

$produk1 = new Game("The Witcher 3", "CD Project Red", "CD Project", 300000, 100);
$produk2 = new Komik("Naruto", "CD Project Red", "CD Project", 300000, 100);

echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();

?>