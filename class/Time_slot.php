<?php

class Time_slot{

    private int $id;
    private string $day_of_the_week;
    private string $am_start;
    private string $am_end;
    private string $pm_start;
    private string $pm_end;

    public function __construct(int $id, string $day_of_the_week, ?string $am_start, ?string $am_end, ?string $pm_start, ?string $pm_end)
    {
        $this->id = $id;
        $this->day_of_the_week = $day_of_the_week;
        $this->am_start = $am_start ?? '';
        $this->am_end = $am_end ?? '';
        $this->pm_start = $pm_start ?? '';
        $this->pm_end = $pm_end ?? '';
    }

    public function time_slot_html(){
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