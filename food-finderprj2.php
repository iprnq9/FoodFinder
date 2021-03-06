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
    //public $numOpenCloseTimes;
    public $openTimes = array(array());
    public $closeTimes = array(array());
    public $numOpenCloseTimes = array();

    protected $description;
    protected $headingArray = array("Test", "Test", "Test", "Test");
    protected $paragraphArray = array("Test", "Test", "Test", "Test");
    protected $imagesArray = array("bagels.jpg","bagels.jpg","bagels.jpg","bagels.jpg");
    protected $coverPhoto;
    protected $menu;
    protected $location;
    protected $minToClose = 0;


    /* construtor */
    public function __construct(){
//<<<<<<< HEAD
//<<<<<<< 07de1d3a58f509890d94fe037160da8e20c88c21
//=======
////<<<<<<< HEAD
//        for($x=0; $x <= 7; $x++){
//            $opntme[$x] = array("lnch"=> null, "brkfst"=> null, "dnnr"=> null );
//        }
//        for($x=0; $x <= 7; $x++){
//            $clstme[$x] = array("lnch"=> null, "brkfst"=> null, "dnnr"=> null );
////=======
//>>>>>>> c8c2d6310042887bc21e5a70b1bdb0a211ebce57
        for($x=0; $x < 7; $x++){
            $opntme[$x] = array("lnch"=> NULL, "brkfst"=> NULL, "dnnr"=> NULL );
        }
        for($x=0; $x < 7; $x++){
            $clstme[$x] = array("lnch"=> NULL, "brkfst"=> NULL, "dnnr"=> NULL );
//<<<<<<< HEAD
//=======
//        for($x=0; $x <= 7; $x++){
//            $opntme[$x] = array("lnch"=> null, "brkfst"=> null, "dnnr"=> null );
//        }
//        for($x=0; $x <= 7; $x++){
//            $clstme[$x] = array("lnch"=> null, "brkfst"=> null, "dnnr"=> null );
//>>>>>>> no message
//=======
//>>>>>>> 07de1d3a58f509890d94fe037160da8e20c88c21
//>>>>>>> c8c2d6310042887bc21e5a70b1bdb0a211ebce57
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

    public function setMinToClose($val){
        $this->minToClose = $val;
    }

    public function status(){
        /* returns the current status */
        $currentMin = date('H')*60 + date('i');
        $curday = date('w') + 1;
        $open1 = $this->getopnTime($curday, "brkfst");
        $cls1 = $this->getclsTime($curday, "brkfst");
        $open2 = $this->getopnTime($curday, "lnch");
        $cls2 = $this->getclsTime($curday, "lnch");
        $open3 = $this->getopnTime($curday, "dnnr");
        $cls3 = $this->getclsTime($curday, "dnnr");

        $a = $cls1 - $currentMin;
        if($a < 0)
            $a = 9999;
        $b = $cls2 - $currentMin;
        if($b < 0)
            $b = 9999;
        $c = $cls3 - $currentMin;
        if($c < 0)
            $c = 9999;
        $values = array($a, $b, $c);
        $min = min($values);

        if($min == 9999)
            return "closed";

        $this->setMinToClose($min);

        if ($currentMin <= 600){/*if its before 10:00am only check brkfst*/
            $chck = $this->getopnTime($curday, "brkfst");
            if ($chck == NULL){
                return "closed";
            }
            if($chck > $currentMin){
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
                    elseif($cls1 < $currentMin && $open2 > $currentMin){
                        return "closed";
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

        elseif($currentMin > 660){/* gotta check em all brah*/ // <--- LOL
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
                    elseif($cls1 < $currentMin && $open2 > $currentMin){
                        return "closed";
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
                    elseif($cls2 < $currentMin && $open3 > $currentMin){
                        return "closed";
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

        //$this->minToClose = 4;//testing
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

    public function setNumOpenCloseTimes($day, $val){
        $this->numOpenCloseTimes[$day] = $val;
    }

    //$day should be [0-6]
    public function getNumOpenCloseTimes($val){
        return $this->numOpenCloseTimes[$val];
    }

    public function getMaxNumOpenCloseTimes(){
        return max($this->numOpenCloseTimes);
    }

    public function setOpenCloseArray(){
        $sinceEpoch = strtotime("today");
        $mealArray = array("brkfst", "lnch", "dnnr");
        $numOfMeals = sizeof($mealArray);

        for($day = 0; $day < 7; $day++){

            $counter = 0;
            for ($i = 0; $i < ($numOfMeals); $i++) {
                $openTime = $this->getopnTime(($day + 1), $mealArray[$i]);
                if (!($openTime === NULL)) {
                    $openTime = $openTime * 60 + $sinceEpoch;
                    $openTime = date('g:ia', $openTime);
                    $this->openTimes[$day][$counter] = $openTime;
                    $counter++;
                }
            }

            $counter2 = 0;
            for ($i = 0; $i < ($numOfMeals); $i++) {
                $closeTime = $this->getclsTime(($day + 1), $mealArray[$i]);
                if (!($closeTime === NULL)) {
                    $closeTime = $closeTime * 60 + $sinceEpoch;
                    $closeTime = date('g:ia', $closeTime);
                    $this->closeTimes[$day][$counter2] = $closeTime;
                    $counter2++;
                }
            }

            $this->numOpenCloseTimes[$day] = ($counter2);
        }

    }

    // $val should be [0-2] since there will be at most 3 meals in a day
    public function getOpenTime($day, $meal){
        return $this->openTimes[$day][$meal];
    }

    public function getCloseTime($day, $meal){
        return $this->closeTimes[$day][$meal];
    }

    public function setDescription($desc){
        $this->description = $desc;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setHeadingArray($index, $val){
        $this->headingArray[$index] = $val;
    }

    public function getHeading($index){
        return $this->headingArray[$index];
    }

    public function setParagraphArray($index, $val){
        $this->paragraphArray[$index] = $val;
    }

    public function getParagraph($index){
        return $this->paragraphArray[$index];
    }

    public function setImageArray($index, $val){
        if($val)
            $this->imagesArray[$index] = $val;
        else
            $this->imagesArray[$index] = "../banner.png";
    }

    public function getImage($index){
        return $this->imagesArray[$index];
    }

    public function getCoverPhoto(){
        return $this->coverPhoto;
    }

    public function setCoverPhoto($val){
        if($val)
            $this->coverPhoto = $val;
        else
            $this->coverPhoto = "../banner.png";
    }

    public function getMenu(){
        return $this->menu;
    }

    public function setMenu($val){
        if($val)
            $this->menu = $val;
        else
            $this->menu = "../noMenu.pdf";
    }

    public function getLocation(){
        return $this->location;
    }

    public function setLocation($val){
        if($val)
            $this->location = $val;
        else
            $this->location = "On Campus";
    }

    public function getMinToClose(){
        return $this->minToClose;
    }

}


?>
