<?php

namespace App\Models;

/**
 * Classe représentant un créneau horaire.
 * 
 * Cette classe permet de gérer les créneaux horaires, de les récupérer depuis
 * une base de données et de générer leur représentation HTML.
 */
class TimeSlot{

    /**
     * Identifiant unique du créneau horaire.
     *
     * @var int
     */
    private int $id;

    /**
     * Jour de la semaine associé au créneau horaire.
     *
     * @var string
     */
    private string $day_of_the_week;

    /**
     * Heure de début de matinée.
     *
     * @var string
     */
    private string $am_start;

     /**
     * Heure de fin de matinée.
     *
     * @var string
     */
    private string $am_end;

    /**
     * Heure de début d'après-midi.
     *
     * @var string
     */
    private string $pm_start;

    /**
     * Heure de fin d'après-midi.
     *
     * @var string
     */
    private string $pm_end;

    /**
     * Constructeur de la classe TimeSlot.
     *
     * @param int $id Identifiant unique du créneau horaire.
     * @param string $day_of_the_week Jour de la semaine.
     * @param string|null $am_start Heure de début de matinée (optionnelle).
     * @param string|null $am_end Heure de fin de matinée (optionnelle).
     * @param string|null $pm_start Heure de début d'après-midi (optionnelle).
     * @param string|null $pm_end Heure de fin d'après-midi (optionnelle).
     */
    public function __construct(int $id, string $day_of_the_week, ?string $am_start, ?string $am_end, ?string $pm_start, ?string $pm_end)
    {
        $this->id = $id;
        $this->day_of_the_week = $day_of_the_week;
        $this->am_start = $am_start ?? '';
        $this->am_end = $am_end ?? '';
        $this->pm_start = $pm_start ?? '';
        $this->pm_end = $pm_end ?? '';
    }

    /**
     * Récupère tous les créneaux horaires depuis la base de données.
     *
     * Cette méthode exécute une requête SQL pour sélectionner toutes les lignes
     * de la table `time_slots` et les transforme en instances de `TimeSlot`.
     *
     * @return array<TimeSlot> Tableau d'instances de `TimeSlot`.
     * @throws \PDOException En cas d'erreur lors de l'exécution de la requête SQL.
     */
    public static function getTimeSlots(): array{
        $pdo = Database::getConnection();
        $stmt = $pdo->query("SELECT * FROM time_slots");
        $results = $stmt->fetchAll();
        return array_map(fn($row) => new self(
            $row['id'],
            $row['day_of_the_week'],
            $row['am_start'],
            $row['am_end'],
            $row['pm_start'],
            $row['pm_end']
        ), $results);
    }

     /**
     * Génère le code HTML pour afficher le créneau horaire.
     *
     * Si les horaires du matin ou de l'après-midi sont absents, le créneau est
     * affiché comme "Fermé".
     *
     * @return string Code HTML représentant le créneau horaire.
     */
    public function toHTML(){
        if(empty($this->am_start) && empty($this->am_end)){
            $am = 'Fermé';
        }else{
            $am = 'de ' . $this->am_start . 'h à ' . $this->am_end . 'h';
        }
        if(empty($this->pm_start) && empty($this->pm_end)){
            $pm = 'Fermé';
        }else{
            $pm = 'de ' . $this->pm_start . 'h à ' . $this->pm_end . 'h';
        }
        if($am === 'Fermé' && $pm === 'Fermé'){
            $time_slot = 'Fermé';
        }else{
            $time_slot = implode(' et ', [$am , $pm]);
        }
        return <<<HTML
            <li>
                $this->day_of_the_week : $time_slot
            </li>
        HTML;
    }
}