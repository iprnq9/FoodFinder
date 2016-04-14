<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 'On');
//ini_set('html_errors', 'On');

class foodFund{

    protected $locId; //needed for queries
    protected $name;
    protected $organization;
    protected $description;
    protected $location;
    protected $coverPhoto;
    protected $startDate;
    protected $endDate;
    protected $startTime;
    protected $endTime;
    protected $statusBit;
    protected $contact;

    /* constructor */
    public function __construct(){

    }


    /* Get functions*/
    public function getName(){
        return $this->name;
    }

    public function getId(){
        return $this->locId;
    }

    public function getDescription(){
        return $this->description;
    }

    public function getLocation(){
        return $this->location;
    }

    public function getOrganization(){
        return $this->organization;
    }

    public function getStartTime(){
        /*will return specified time */
        return $this->startTime;
    }

    public function getEndTime(){
        /*will return specified time */
        return $this->endTime;
    }

    public function getStartDate(){
        /*will return specified time */
        return $this->startDate;
    }

    public function getEndDate(){
        /*will return specified time */
        return $this->endDate;
    }

    public function getCoverPhoto(){
        return $this->coverPhoto;
    }

    public function getContact(){
        return $this->contact;
    }


    /*set functions */
    public function setName($value){
        $this->name = $value;
    }

    public function setStatusBit($val){
        $this->statusBit = $val;
    }

    public function setId($value){
        $this->locId = $value;
    }

    public function setDescription($desc){
        $this->description = $desc;
    }

    public function setOrganization($val){
        $this->organization = $val;
    }

    public function setCoverPhoto($val){
        if($val)
            $this->coverPhoto = $val;
        else
            $this->coverPhoto = "../../banner.png";
    }

    public function setLocation($val){
        if($val)
            $this->location = $val;
        else
            $this->location = "On Campus";
    }

    public function setStartTime($val){
        $this->startTime = $val;
    }

    public function setEndTime($val){
        $this->endTime = $val;
    }

    public function setStartDate($val){
        $this->startDate = $val;
    }

    public function setEndDate($val){
        $this->endDate = $val;
    }

    public function setContact($val){
        $this->contact = $val;
    }

    public function status(){
        /* returns the current status */
        $currentDate = new DateTime("today");
        //$currentDate = $currentDate->format('y "-" M "-" DD');
        $currentTime = new DateTime("now");
        //$currentTime = $currentTime->format('H:i:s');
        $startTime2 = new DateTime($this->getStartTime());
        $endTime2 = new DateTime($this->getEndTime());
        $startDate2 = new DateTime($this->getStartDate());
        $endDate2 = new DateTime($this->getEndDate());

//        echo "Start Date: " . $startDate2->format('y-M-d') . " @ " . $startTime2->format('H:i:s');
//        echo "<br>End Date: " . $endDate2->format('y-M-d') . " @ " . $endTime2->format('H:i:s');
//        echo "<br>" . $currentDate->format('y-M-d') . " @" . $currentDate->format('H:i:s');

        //echo "<br>";

        if($currentDate < $startDate2 || $currentDate > $endDate2){
            return "Not Within Dates";
            echo "TEst";
        }

        else if($currentDate >= $startDate2 && $currentDate <= $endDate2) {
            $diff = $endTime2->diff($currentTime);
            $minutes =  ($diff->format('%a') * 1440) + // total days converted to minutes
                        ($diff->format('%h') * 60) +   // hours converted to minutes
                         $diff->format('%i');          // minutes
            //echo "<br>Difference: " . $minutes . "<br>";
            if($currentTime < $startTime2 || $currentTime > $endTime2){
                return "Not Available";
                //$this->statusBit = 2;
            }

            else if($minutes <= 30){
                return "Ending Soon";
                //$this->statusBit = 1;
            }

            else {
                return "Available";
                //$this->statusBit = 1;
            }
        }
    }

//    public function getStatusBit(){
//        $this->status();
//        return $this->statusBit;
//    }
}


?>
