<?php
/**
* Route för att testa textfilter.
* Läser filerna i mappen text i content eller direkt i filen och filtrerar dem.
* Filtrerar text för alla filter.
*/
$app->router->get("textfilter/textfilter", function () use ($app) {
    $textFilter = new \Mals17\Filter\TextFilter();

    $bbText = file_get_contents('../content/text/bbcode.txt');
    $bbFormat = $textFilter->parse($bbText, ['bbcode']);

    $linkText = file_get_contents('../content/text/clickable.txt');
    $linkFormat = $textFilter->parse($linkText, ['link']);

    $mdText = file_get_contents('../content/text/sample.md');
    $mdFormat = $textFilter->parse($mdText, ['markdown']);

    $nl2brText = "Här skriver jag en text\nsom ska vara på flera\nrader!";
    $nl2brFormat = $textFilter->parse($nl2brText, ['nl2br']);

    $stripText = "<p>Här skriver jag en text i en paragraf</p> <a href='https://dbwebb.se/'>En Länk</a>";
    $stripFormat = $textFilter->parse($stripText, ['stripTag']);

    $escText = "Ett 'ord' i <b>fetstil</b> och ett 'ord' i <i>kursiv</i>";
    $escFormat = $textFilter->parse($escText, ['esc']);

    $data = [
        "title"         => "Testa textfilter",
        "bbText"        => $bbText,
        "bbFormat"      => $bbFormat,
        "linkText"      => $linkText,
        "linkFormat"    => $linkFormat,
        "mdText"        => $mdText,
        "mdFormat"      => $mdFormat,
        "nl2brText"     => $nl2brText,
        "nl2brFormat"   => $nl2brFormat,
        "stripText"     => $stripText,
        "stripFormat"   => $stripFormat,
        "escText"       => $escText,
        "escFormat"    => $escFormat
    ];

    $app->view->add("textfilter/textfilter", $data);
    $app->page->render($data);
});
