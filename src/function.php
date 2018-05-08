<?php

/**
* Rensar värdet för output.
*/
function esc($value)
{
    return htmlentities($value);
}

/**
* Sorterar kolumner och behåller original querysträng
*/
function orderby2($column, $route)
{
    $asc = mergeQueryString(["orderby" => $column, "order" => "asc"], $route);
    $desc = mergeQueryString(["orderby" => $column, "order" => "desc"], $route);

    return <<<EOD
<span class="orderby">
<a href="$asc">&darr;</a>
<a href="$desc">&uarr;</a>
</span>
EOD;
}

/**
* Slår samman querysträng.
*/
function mergeQueryString($options, $prepend = "?")
{
    $query = [];
    parse_str($_SERVER["QUERY_STRING"], $query);

    $query = array_merge($query, $options);

    return $prepend . http_build_query($query);
}
