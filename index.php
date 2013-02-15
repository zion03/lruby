<?

class NumToStr {

    private $_digits = array(
        0 => '',
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
        10 => 'ten',
        11 => 'eleven',
        12 => 'twelve',
        13 => 'thirteen',
        14 => 'fourteen',
        15 => 'fifteen',
        16 => 'sixteen',
        17 => 'seventeen',
        18 => 'eighteen',
        19 => 'nineteen',
        20 => 'twenty',
        30 => 'thirty',
        40 => 'forty',
        50 => 'fifty',
        60 => 'sixty',
        70 => 'seventy',
        80 => 'eighty',
        90 => 'ninety',
    );
    private $_ext = array(
        3 => 'thousand',
        6 => 'million',
        9 => 'billion',
        12 => 'trillion',
        15 => 'quadrillion',
        18 => 'quintillion',
        21 => 'sextillion',
        24 => 'septillion',
        27 => 'octillion',
        30 => 'nonillion',
        33 => 'decillion',
        36 => 'undecillion',
        39 => 'duodecillion',
        42 => 'tredecillion',
        45 => 'quattuordecillion',
        48 => 'quindecillion',
        51 => 'sexdecillion',
        54 => 'septendecillion',
        57 => 'octodecillion'
    );

    public function NumberToWords($full_num) {
       
        $result = '';
        while (strlen($full_num) % 3) {
            $full_num = '0' . $full_num;
        }
         echo 'Your string: ' . substr(ltrim(chunk_split($full_num,3,'`'),'0'),0,-1) . '<br/>';
        $pieces = str_split($full_num,3);
        $segment = count($pieces) * 3;
        foreach ($pieces as $piece) {
            $segment-=3;
            $result.=$this->_pieceToWords($piece);
            if ((int)$piece>0) $result.= ' ' . $this->_ext[$segment] . ' ';
        }
        echo $result;
    }

    private function _pieceToWords($num) {
        $res = ' ';
        if ((int) $num == 0) {
            $res = '';
        } elseif (isset($this->_digits[(int) $num])) {
            $res .= $this->_digits[(int) $num];
        } else {
       
            $hundreds = (int) $num[0];
            if ($hundreds) {
                $res = $this->_digits[(int) $hundreds];
                $res.=' handred ';
            }
            $tens = (int) $num[1] . $num[2];
            if ($this->_digits[$tens]) {
                $res .=' ' . $this->_digits[$tens];
            } else {
                $tens = $num[1];
                $ones = $num[2];
                $res .=' ' . $this->_digits[(int) $tens . '0'] . '-' . $this->_digits[(int) $ones] . ' ';
            }
        }

        return $res;
    }

}

$qwe = new NumToStr();
$qwe->NumberToWords(99924);
?>
