<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
//ini_set('html_errors', 'On');

class joeMinr{

    protected $name;
    protected $locId; //needed for queries
    protected $opntme = array(array()); /*container for the opening times*/
    protected $clstme = array(array()); /*container for the closing times*/

    public $todayCloseTimes = array();
    public $todayOpenTimes = array();
    public $numOpenCloseTimes;

    /* construtor */
    public function __construct(){
        for($x=0; $x <= 7; $x++){
            $opntme[$x] = array("lnch"=> NULL, "brkfst"=> NULL, "dnnr"=> NULL );
        }
        for($x=0; $x <= 7; $x++){
            $clstme[$x] = array("lnch"=> NULL, "brkfst"=> NULL, "dnnr"=> NULL );
        }
    }


    /* Get functions*/
    public function getName(){
        return $this->name;
    }

    public function getId(){
        return $this->locId;
    }

    public function getopnTime($day, $time){
        /*will return specified time */
        $day = $day-1;
        return $this->opntme[$day][$time];
    }

    public function getclsTime($day, $time){
        /*will return specified time */
        $day = $day-1;
        return $this->clstme[$day][$time];
    }

    public function status(){
        /* returns the current status */
        $currentMin = date('H')*60 + date('i');
        $curday = date('w');
        $open1 = $this->getopnTime($curday, "brkfst");
        $cls1 = $this->getclsTime($curday, "brkfst");
        $open2 = $this->getopnTime($curday, "lnch");
        $cls2 = $this->getclsTime($curday, "lnch");
        $open3 = $this->getopnTime($curday, "dnnr");
        $cls3 = $this->getclsTime($curday, "dnnr");
        if ($currentMin <= 600){/*if its before 10:00am only check brkfst*/
            $chck = $this->getopnTime($curday, "brkfst");
            if ($chck = NULL){
                return "closed";
            }
            elseif($chck > $currentMin){
                return "closed";
            }
            else{
                if((($this->getclsTime($curday, "brkfst"))-$currentMin) <= 30 ){
                    return "closing-soon";
                }
                else{
                    return "open";
                }
            }

        }
        elseif ($currentMin >600 && $currentMin <= 660){/*check brkfst and lnch*/

            if($open1 != NULL){
                if($cls1 > $currentMin){
                    if($cls1-$currentMin <= 30){
                        return "closing-soon";
                    }
                    else {
                        return "open";
                    }
                }
            }
            if($open2 != NULL){
                if($cls2 > $currentMin){
                    if($cls2-$currentMin <= 30){
                        return "closing-soon";
                    }
                    else {
                        return "open";
                    }
                }
            }
            else{
                return "closed";
            }
        }
        elseif($currentMin > 660){/* gotta check em all bra*/
            if($open1 != NULL){
                if($cls1 > $currentMin){
                    if($cls1-$currentMin <= 30){
                        return "closing-soon";
                    }
                    else {
                        return "open";
                    }
                }
            }
            if($open2 != NULL){
                if($cls2 > $currentMin){
                    if($cls2-$currentMin <= 30){
                        return "closing-soon";
                    }
                    else {
                        return "open";
                    }
                }
            }
            if($open3 != NULL){
                if($cls3 > $currentMin){
                    if($cls3-$currentMin <= 30){
                        return "closing-soon";
                    }
                    else {
                        return "open";
                    }
                }
                elseif($cls3 < $currentMin){
                    return "closed";
                }
            }
            else{
                return "closed";
            }

        }
        else{
            return "closed";
        }
    }

    /*set functions */
    public function setName($value){
        $this->name = $value;
    }

    public function setId($value){
        $this->locId = $value;
    }

    public function setopnTime($day, $tme, $val){
        /* takes in array for times of day*/
        $day = $day-1;
        $this->opntme[$day][$tme] = $val;
    }

    public function setclsTime($day, $tme, $val){
        /* takes in array for times of day*/
        $day = $day-1;
        $this->clstme[$day][$tme] = $val;
    }

    public function setNumOpenCloseTimes($val){
        $this->numOpenCloseTimes = $val;
    }

    public function setOpenCloseArray($curday){
        $sinceEpoch = strtotime("today");
        $mealArray = array("brkfst", "lnch", "dnnr");
        $numOfMeals = sizeof($mealArray);

        $counter = 0;
        for ($i = 0; $i < ($numOfMeals); $i++) {
            $openTime = $this->getopnTime($curday, $mealArray[$i]);
            if ($openTime != NULL) {
                $openTime = $openTime * 60 + $sinceEpoch;
                $openTime = date('g:ia', $openTime);
                $todayOpenTimes[$counter] = $openTime;
                $counter++;
            }
        }

        $counter2 = 0;
        for ($i = 0; $i < ($numOfMeals); $i++) {
            $closeTime = $this->getclsTime($curday, $mealArray[$i]);
            if ($closeTime != NULL) {
                $closeTime = $closeTime * 60 + $sinceEpoch;
                $closeTime = date('g:ia', $closeTime);
                $todayCloseTimes[$counter2] = $closeTime;
                $counter2++;
            }
        }

        $this->setNumOpenCloseTimes(sizeof($this->todayOpenTimes));
    }

    // $val should be [0-2] since there will be at most 3 meals in a day
    public function getOpenTime($val){
        return $this->todayOpenTimes[$val];
    }

    public function getCloseTime($val){
        return $this->todayCloseTimes[$val];
    }

}


?>
