<?php
function NumberToWords($number)
{
    $words = array(
        '0' => '',
        '1' => 'One',
        '2' => 'Two',
        '3' => 'Three',
        '4' => 'Four',
        '5' => 'Five',
        '6' => 'Six',
        '7' => 'Seven',
        '8' => 'Eight',
        '9' => 'Nine',
        '10' => 'Ten',
        '11' => 'Eleven',
        '12' => 'Twelve',
        '13' => 'Thirteen',
        '14' => 'Fourteen',
        '15' => 'Fifteen',
        '16' => 'Sixteen',
        '17' => 'Seventeen',
        '18' => 'Eighteen',
        '19' => 'Nineteen',
        '20' => 'Twenty',
        '30' => 'Thirty',
        '40' => 'Forty',
        '50' => 'Fifty',
        '60' => 'Sixty',
        '70' => 'Seventy',
        '80' => 'Eighty',
        '90' => 'Ninety'
    );

    if ($number == 0) {
        return 'Zero Rupees Only';
    } elseif ($number < 0) {
        return 'Minus ' . NumberToWords(abs($number));
    }

    $wordsString = '';

    // Crores
    if (($crores = floor($number / 10000000)) > 0) {
        $wordsString .= NumberToWords($crores) . ' Crore ';
        $number %= 10000000;
    }

    // Lakhs
    if (($lakhs = floor($number / 100000)) > 0) {
        $wordsString .= NumberToWords($lakhs) . ' Lakh ';
        $number %= 100000;
    }

    // Thousands
    if (($thousands = floor($number / 1000)) > 0) {
        $wordsString .= NumberToWords($thousands) . ' Thousand ';
        $number %= 1000;
    }

    // Hundreds
    if (($hundreds = floor($number / 100)) > 0) {
        $wordsString .= NumberToWords($hundreds) . ' Hundred ';
        $number %= 100;
    }

    // Tens and units
    if ($number > 0) {
        if ($wordsString != '') {
            $wordsString .= 'and ';
        }

        if ($number < 21) {
            $wordsString .= $words[$number];
        } else {
            $tens = floor($number / 10) * 10;
            $units = $number % 10;
            $wordsString .= $words[$tens];

            if ($units > 0) {
                $wordsString .= ' ' . $words[$units];
            }
        }
    }

    return $wordsString ;
}

// Example usage
// $amount = 2662;
// $amountInWords = convertNumberToWords($amount);
// echo $amountInWords;  // Output: "Two Thousand Six Hundred Sixty-Two Rupees Only"
?>
