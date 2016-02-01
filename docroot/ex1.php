<?php

class lisbonInterviewEx1
{

    public $finalArray = array();

    public function callSpiral($matrix) {

        $arithmeticalNum = 1;

        $numRows = count($matrix);
        $numCols = count($matrix[0]);

        $centerCol = $this->calculateCenter($numCols);
        $centerRow = $this->calculateCenter($numRows);


        array_push($this->finalArray, $matrix[$centerRow][$centerCol]);
        $this->makeSpiral($arithmeticalNum, $matrix, $numCols, $centerRow, $centerCol);

        $result = implode(", ", $this->finalArray);

        return $result;

    }

    private function makeSpiral($arithmeticalNum, $matrix, $numRows, $centerRow, $centerCol) {

        if ($arithmeticalNum %2 == 0) {
            for ($i = 1; $i <= $arithmeticalNum; $i++) {
                $centerCol++;
                array_push($this->finalArray, $matrix[$centerRow][$centerCol]);
            }

            for ($i = 1; $i <= $arithmeticalNum; $i++) {
                $centerRow++;
                array_push($this->finalArray, $matrix[$centerRow][$centerCol]);
            }
        } else {
            for ($i = 1; $i <= $arithmeticalNum; $i++) {
                $centerCol--;
                array_push($this->finalArray, $matrix[$centerRow][$centerCol]);
            }

            for ($i = 1; $i <= $arithmeticalNum; $i++) {
                $centerRow--;
                array_push($this->finalArray, $matrix[$centerRow][$centerCol]);
            }
        }

        if ($arithmeticalNum == $numRows - 1) {
            for ($i = 1; $i <= $arithmeticalNum; $i++) {
                $centerCol--;
                array_push($this->finalArray, $matrix[$centerRow][$centerCol]);
            }
        }

        $arithmeticalNum++;

        if ($arithmeticalNum < $numRows) {
            return $this->makeSpiral($arithmeticalNum, $matrix, $numRows, $centerRow, $centerCol);
        }

    }

    private function calculateCenter($total) {

        $center = $total/2;

        return $center;

    }

}

$array = array(
    array( 1,34, 32, 2, 4),
    array( 3,32, 13,19,89),
    array(56,11,  7, 9,95),
    array(14,90,333,23, 1),
    array( 5,33, 54,23,41)
);

$lisbonInterview = new lisbonInterviewEx1;

$result = $lisbonInterview->callSpiral($array);

echo $result;