<?php
class joeMinr{
 
    protected $name;
	protected $opntme = array(array()); /*container for the opening times*/
	protected $clstme = array(array()); /*container for the closing times*/

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

    public function getopnTime($day, $time){
        /*will return specified time */
		return $this->opntme[$day][$time];
    }

    public function getclsTime($day, $time){
        /*will return specified time */
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
            elseif($chck < $currentMin){
                return "closed";
            }
            else{
                if((($this->getclsTime($curday, "brkfst"))-$currentMin) <= 30 ){
                    return "closing soon";
                }
                else{
                    return "Open";
                }
            }
        
        }
        elseif ($currentMin >600 && $currentMin <= 660){/*check brkfst and lnch*/
            
            if($open1 != NULL){
                if($cls1 > $currentMin){
                    if($cls1-$currentMin <= 30){
                        return "Closing soon";
                    }
                    else {
                        return "open";
                    }
                }
            }
            if($open2 != NULL){
                if($cls2 > $currentMin){
                    if($cls2-$currentMin <= 30){
                        return "Closing soon";
                    }
                    else {
                        return "open";
                    }
                }
            }
            else{
                return "Closed";
            }
        }
        elseif($currentMin > 660){/* gotta check em all bra*/
            if($open1 != NULL){
                if($cls1 > $currentMin){
                    if($cls1-$currentMin <= 30){
                        return "Closing soon";
                    }
                    else {
                        return "open";
                    }
                }
            }
            if($open2 != NULL){
                if($cls2 > $currentMin){
                    if($cls2-$currentMin <= 30){
                        return "Closing soon";
                    }
                    else {
                        return "open";
                    }
                }
            }
            if($open3 != NULL){
                if($cls3 > $currentMin){
                    if($cls3-$currentMin <= 30){
                        return "Closing soon";
                    }
                    else {
                        return "open";
                    }
                }
            }
            else{
                return "Closed";
            }
        
        }
        else{
            return "Closed";
        }
    }

    /*set functions */
    public function setName($value){
        $this->name = $value;
    }

    public function setopnTime($day, $tme, $val){
        /* takes in array for times of day*/
        $this->opntme[$day][$tme] = $val;
    }

    public function setclsTime($day, $tme, $val){
        /* takes in array for times of day*/
        $this->clstme[$day][$tme] = $val;
    }

}
//create tj object 
$tj = new joeMinr;
$tj->setName("Thomas Jefferson");
for($x=0; $x <= 7; $x++){
    $tj->setopnTime($x,"lnch",601);
}
for($x=0; $x <= 7; $x++){
    $tj->setopnTime($x,"brkfst",360);
}
for($x=0; $x <= 7; $x++){
    $tj->setopnTime($x,"dnnr",1140);
}

for($x=0; $x <= 7; $x++){
    $tj->setclsTime($x,"lnch",720);
}
for($x=0; $x <= 7; $x++){
    $tj->setclsTime($x,"brkfst",540);
}
for($x=0; $x <= 7; $x++){
    $tj->setclsTime($x,"dnnr",1380);
}




$reslt = $tj->getopnTime(3,"lnch");
$var = date('H')*60 + date('i');
echo "Location:   " . $tj->getName() ."<br>";
echo "Tuesday Breakfast open:   " . $tj->getopnTime(2,"brkfst") ."<br>";
echo "Tuesday Breakfast close:   " . $tj->getclsTime(2,"brkfst") ."<br>";
echo "Wed lunch open:   " . $tj->getopnTime(3,"lnch") ."<br>";
echo "Wed lunch close:   " . $tj->getclsTime(3,"lnch") ."<br>";
echo "friday dinner open:   " . $tj->getopnTime(5,"dnnr") ."<br>";
echo "friday dinner close:   " . $tj->getopnTime(5,"dnnr") ."<br>";
echo "thursday dinner open:   " . $tj->getopnTime(6,"dnnr") ."<br>";
echo "thursday dinner close:   " . $tj->getclsTime(6,"dnnr") ."<br>";
echo "current server time" . date('h:i') ."<br>";
echo $var . "<br>";
echo $tj->status()


?>
    