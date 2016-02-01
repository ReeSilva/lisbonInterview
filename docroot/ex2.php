<?php

class lisbonInterviewEx2{

    private $switches = 0;

    public function calculateHighestNumber(array $numbersArray, $switchesAllowed = 5) {

        # Coloca o maior número possível em primeiro (ou o maior que pode chegar lá)
        $numbersArray = $this->highestGoFirst($numbersArray, $switchesAllowed);
        while ($this->switches < $switchesAllowed) {

            $numbersArray = $this->changePosition($numbersArray, $switchesAllowed, 1);
            $this->switches++;

        }

        $result = implode(", ", $numbersArray);

        return $result;

    }

    private function highestGoFirst($array, $switches) {

        $highestCanChangeKey = $this->highestCanChange($array, $switches, 0);

        $this->switches = $highestCanChangeKey;

        $highest = $array[$highestCanChangeKey];
        unset($array[$highestCanChangeKey]);
        array_unshift($array, $highest);

        return $array;
    }

    private function highestCanChange($array, $switches, $initialKey) {

        $origArray = $array;
        sort($array);
        $array = array_reverse($array);

        $highestKey = array_search($array[$initialKey], $origArray);

        if ($highestKey > $switches) {
            return $this->highestCanChange($origArray, $switches, $initialKey+1);
        }

        return $highestKey;

    }

    private function changePosition($array, $switches, $initialKey) {

        $origArray = $array;
        sort($array);
        $array = array_reverse($array);

        $highestKey = array_search($array[$initialKey], $origArray);

        if ($highestKey - 1 > $switches - $this->switches) {
            return $this->changePosition($origArray, $switches, $initialKey+1);
        }

        $oldNumber = $origArray[1];

        $origArray[1] = $origArray[$highestKey];
        $origArray[$highestKey] = $oldNumber;

        return $origArray;

    }

}

$lisbonInterview = new lisbonInterviewEx2;

$result = $lisbonInterview->calculateHighestNumber(array(2,5,7,1,8));

echo $result;