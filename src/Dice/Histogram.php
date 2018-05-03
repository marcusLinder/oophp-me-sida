<?php

namespace Mals17\Dice;

class Histogram
{
    private $serie = [];
    private $min;
    private $max;

    /**
    * @return array med talen.
    */
    public function getSerie()
    {
        return $this->serie;
    }

    /**
    * Returnerar histogramet som en sträng i en lista.
    * @return string Histogramet.
    */
    public function getAsText()
    {
        $array = $this->serie;
        $res = array();
        $list = "<ol>";

        for ($i=1; $i < 7; $i++) {
            $res[$i]=0;
        }

        foreach ($array as $value) {
            $res[$value]++;
        }

        foreach ($res as $result) {
            $list .= "<li>";
            for ($i=1; $i <= $result; $i++) {
                $list .= "*";
            }
            $list .= "</li>";
        }
        $list .= "</ol>";

        return $list;
    }

    /**
    * Inject objektet för att att använda för histogram datan.
    * @param HistogramInterface $object Objektet med talen.
    * @return void.
    */
    public function injectData(DiceHistogramInterface $object)
    {
        $this->serie = $object->getHistogramSerie();
        $this->min = $object->getHistogramMin();
        $this->max = $object->getHistogramMax();
    }
}
