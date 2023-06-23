<?php 

class madate {

    private const SEMAINE = array(" Dimanche "," Lundi "," Mardi "," Mercredi "," Jeudi ",
                " Vendredi "," Samedi ");
    private const MOIS =array(1=>" Janvier "," Février "," Mars "," Avril "," Mai "," Juin ",
    " Juillet "," Août "," Septembre "," Octobre "," Novembre "," Décembre ");

    /**
     * Get la date au format Jour 25 Juin 2023 à 9h30
     */ 
    public static function getMaDate($stringdate)
    {
        $date = date_create($stringdate);
        $jour = $date->format('N');
        $jmois = $date->format('n');
        $retour = ( SELF::SEMAINE[$jour] . $date->format('d') . SELF::MOIS[$jmois] . $date->format('Y') . ' à ' . $date->format('G\hi') );
        return $retour;
    }
}



?>