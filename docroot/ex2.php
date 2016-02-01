<?php

/**
 * Class lisbonInterviewEx2
 * Created by Renato Biancalana da Silva <renato.biancalana.silva@gmail.com>
 */
class lisbonInterviewEx2{


    /**
     * @var int
     */
    private $switches = 0;
    /**
     * @var int
     */
    private $index    = 0;
    /**
     * @var int
     */
    private $runOnce  = 0;


    /**
     * @param array $numbersArray
     * @param int $switchesAllowed
     * @return string
     */
    public function calculateHighestNumber(array $numbersArray, $switchesAllowed = 5) {

        $highest = 0;

        while ($this->switches < $switchesAllowed) {
            $numbersArray = $this->highestsOnFirst($numbersArray, $this->index, $highest, $switchesAllowed);
            $highest++;
            if ($highest > count($numbersArray)) {
                break;
            }
        }

        $result = implode(", ", $numbersArray);

        return $result;

    }

    /**
     * @param $array
     * @param int $index
     * @param int $highest
     * @param int $switchesAllowed
     * @return mixed
     */
    private function highestsOnFirst($array, $index = 0, $highest = 0, $switchesAllowed = 5) {

        $origArray = $array;
        sort($array);
        $arrayDesc = array_reverse($array);

        $highestKeys = array_keys($origArray, $arrayDesc[$highest]);

        if (count($highestKeys) > 1 && $this->runOnce) {
            $highestKey = 1;
        } else {
            $highestKey = 0;
        }

        if ($highestKeys[$highestKey] - $index <= $switchesAllowed - $this->switches) {
            for ($i = $highestKeys[$highestKey]; $i > $index; $i--) {
                $higherNumber = $origArray[$i];

                $origArray[$i] = $origArray[$i-1];
                $origArray[$i-1] = $higherNumber;

                $this->switches++;
            }
            $this->index++;
        }
        $this->runOnce = 1;
        return $origArray;

    }

}

$lisbonInterview = new lisbonInterviewEx2;

$result = $lisbonInterview->calculateHighestNumber(array(5,3,3,3,6,2,9));

echo $result;