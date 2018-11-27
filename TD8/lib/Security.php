<?php
class Security {
    private static $seed = '6919613565';

    public static function getSeed() {
        return self::$seed;
    }

    public static function chiffrer($texte_en_clair) {
        $texte_en_clair = self::getSeed() . $texte_en_clair;
        $texte_chiffre = hash('sha256', $texte_en_clair);
        return $texte_chiffre;
    }
}

?>
