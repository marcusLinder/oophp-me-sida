<?php

namespace Mals17\Guess;

/**
 * Guess klass, används av index_post, index_get och index_session
 */
class Guess
{

    private $number;   //Nummret som ska gissas.
    private $tries;    //Antal försök.




    /**
     * Constructor som initierar objektet. Skapar ett random nummer.
     *
     * @param int $number Numret som ska gissas.
     * @param int $tries  Antal gissningar,
     *                    default 6.
     */

    public function __construct(int $number = -1, int $tries = 6)
    {
        if ($number == -1) {
            $this->number = $this->random();
        } elseif ($number != -1) {
            $this->number = $number;
        }
        $this->tries = $tries;
    }




    /**
     * Skapar ett slumpat nummer mellan 1 och 100
     *
     * @return void
     */

    public function random()
    {
        $random = rand(1, 100);
        return $random;
    }




    /**
     * Hur många försök som finns kvar
     *
     * @return int antal försök.
     */

    public function tries()
    {
        return $this->tries;
    }




    /**
     * Hämtar nummret som ska gissas
     *
     * @return int nummret som ska gissas.
     */

    public function number()
    {
        return $this->number;
    }




    /**
     * Gör en gissning och minskar antalet försök.
     *
     * @throws GuessException när gissningen är över 100 eller under 1.
     *
     * @return string om gissningen är rätt eller fel.
     */

    public function makeGuess($number)
    {
        if ($number > 0 && $number <= 100) {
            if ($number == $this->number) {
                return true;
            } elseif ($number != $this->number) {
                $this->tries--;
                return false;
            }
        } elseif ($number > 1 || $number < 100) {
            throw new GuessException("Your guess must be between 1 and 100");
        }
    }
}
