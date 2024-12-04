<?php
class Estrellas {
    private $promedio;
    private $estrellasCompletas;
    private $mediaEstrella;
    private $estrellasVacias;

    public function __construct($promedio) {
        $this->promedio = $promedio;
        $this->calcularEstrellas();
    }

    private function calcularEstrellas() {
        $this->estrellasCompletas = floor($this->promedio);
        $this->mediaEstrella = ($this->promedio - $this->estrellasCompletas) >= 0.5;
        $this->estrellasVacias = 5 - $this->estrellasCompletas - ($this->mediaEstrella ? 1 : 0);
    }

    public function imprimirEstrellas() {
        for ($i = 0; $i < $this->estrellasCompletas; $i++) {
            echo "<i class='fa-solid fa-star star-filled' style='color: #FFD43B; '></i>";
        }
        if ($this->mediaEstrella) {
            echo "<i class='fa-solid fa-star-half-alt star-filled' style='color: #FFD43B;'></i>";
        }
        for ($i = 0; $i < $this->estrellasVacias; $i++) {
            echo "<i class='fa-regular fa-star star-empty' style='color: #ccc;'></i>";
        }
    }
}
?>
