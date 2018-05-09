<?php

namespace Mals17\Filter;

class TextFilter
{
    /**
    * @var array Filter som går att använda med namnet på
    * respektive metod.
    */
    private $filters = [
        "bbcode"    => "bbcode2html",
        "link"      => "makeClickable",
        "markdown"  =>  "markdown",
        "nl2br"     => "nl2br",
        "stripTag"  => "strip",
        "esc"       => "esc",
    ];

    /**
    * Formaterar texten efter filtret. Anges inget filter används markdown.
    * @param string $text Texten som ska filtreras.
    * @param array $filter Filtret som ska användas.
    * @return string Den filtrerade texten.
    */
    public function parse($text, $filter)
    {
        if ($filter == "") {
            $filter = "markdown";
        }

        if (is_array($filter)) {
            $filtering = $filter;
        } else {
            $filter = strtolower($filter);
            $filtering = preg_replace('/\s/', '', explode(',', $filter));
        }

        foreach ($filtering as $key) {
            if (!isset($this->filters[$key])) {
                throw Exception("The filter '$filters' is not valid to use becouse of '$key'.");
            }
            $text = call_user_func_array([$this, $this->filters[$key]], [$text]);
        }
        return $text;
    }

    /**
    * Formaterar BBCode till HTML.
    * @param $text Texten som ska filtreras.
    * @return string Den filtrerade texten.
    */
    public function bbcode2html($text)
    {
        $search = [
            '/\[b\](.*?)\[\/b\]/is',
            '/\[i\](.*?)\[\/i\]/is',
            '/\[u\](.*?)\[\/u\]/is',
            '/\[img\](https?.*?)\[\/img\]/is',
            '/\[url\](https?.*?)\[\/url\]/is',
            '/\[url=(https?.*?)\](.*?)\[\/url\]/is',
        ];

        $replace = [
            '<strong>$1</strong>',
            '<em>$1</em>',
            '<u>$1</u>',
            '<img>$1</img>',
            '<a href="$1">$1</a>',
            '<a href="$1">$2</a>',
        ];

        return preg_replace($search, $replace, $text);
    }

    /**
    * Klickbara länkar från URL i texten.
    * @param string $text Texten som ska filtreras.
    * @return string Den filtrerade texten.
    */
    public function makeClickable($text)
    {
        return preg_replace_callback(
            '#\b(?<![href|src]=[\'"])https?://[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/))#',
            function ($matches) {
                return "<a href=\'{$matches[0]}\'>{$matches[0]}</a>";
            },
            $text
        );
    }

    /**
    * Formaterar texten till markdown.
    * @param string $text Texten som ska filtreras.
    * @return string Den formaterade texten.
    */
    public function markdown($text)
    {
        return \Michelf\MarkdownExtra::defaultTransform($text);
    }

    /**
    * Ny rad med nl2br().
    * @param string $text Texten som ska filtreras.
    * @return string Den filtrerade texten.
    */
    public function nl2br($text)
    {
        return nl2br($text);
    }

    /**
    * Strip taggar med strip_tags().
    * @param string $text Texten som ska filtreras.
    * @return string Den filtrerade texten.
    */
    public function strip($text)
    {
        return strip_tags($text);
    }

    /**
    * Escapear texten med htmlentities().
    * @param string $text Texten som ska filtreras.
    * @return string Den filtrerade texten.
    */
    public function esc($text)
    {
        return htmlentities($text);
    }
}
