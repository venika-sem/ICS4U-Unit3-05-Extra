<?php
    
    /*
     * This program uses recursion with magic squares
     * By Venika Sem
     * @version 1.0
     * @since Feb-2024
     */
    
    // Generate magic squares
    function genSquare($square, $index) {
        static $numberOfSquares = 0;
        static $proccessNum = 0;
    
        for ($counter = 0; $counter < 9; $counter++) {
            $square[$index] = $counter + 1;
            $proccessNum++;
            if ($index < 8) {
                genSquare($square, $index + 1);
            } else {
                if (isMagic($square) && isRepeat($square)) {
                    printSquare($square);
                    $numberOfSquares++;
                }
            }
        }
    }
    
    // Check if a square is magic
    function isMagic($preSquare) {
        $magicSum = 15;
        $row1 = $preSquare[0] + $preSquare[1] + $preSquare[2];
        $row2 = $preSquare[3] + $preSquare[4] + $preSquare[5];
        $row3 = $preSquare[6] + $preSquare[7] + $preSquare[8];
        $col1 = $preSquare[0] + $preSquare[3] + $preSquare[6];
        $col2 = $preSquare[1] + $preSquare[4] + $preSquare[7];
        $col3 = $preSquare[2] + $preSquare[5] + $preSquare[8];
        $diag1 = $preSquare[0] + $preSquare[4] + $preSquare[8];
        $diag2 = $preSquare[2] + $preSquare[4] + $preSquare[6];
    
        return $row1 === $magicSum && $row2 === $magicSum && $row3 === $magicSum && $col1 === $magicSum && $col2 === $magicSum && $col3 === $magicSum && $diag1 === $magicSum && $diag2 === $magicSum;
    }
    
    // Checks if square repeats (true if it doesn't, false if it does)
    function isRepeat($square) {
        for ($counter = 0; $counter < 9; $counter++) {
            for ($counter2 = $counter + 1; $counter2 < 9; $counter2++) {
                if ($square[$counter] === $square[$counter2]) {
                    return false;
                }
            }
        }
        return true;
    }
    
    // Print square
    function printSquare($square) {
        echo "\n*****\n";
        echo $square[0] . ' ' . $square[1] . ' ' . $square[2] . "\n";
        echo $square[3] . ' ' . $square[4] . ' ' . $square[5] . "\n";
        echo $square[6] . ' ' . $square[7] . ' ' . $square[8] . "\n";
        echo "*****\n";
    }
    
    // Main
    $magicSquare = [0, 0, 0, 0, 0, 0, 0, 0, 0];
    echo "The magic squares are: \n";
    genSquare($magicSquare, 0);
    echo "\nDone.";
    
?>
