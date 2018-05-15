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

function hasKeyPost($key)
{
    return array_key_exists($key, $_POST);
}

function getPost($key, $default = null)
{
    if (is_array($key)) {
        foreach ($key as $val) {
            $post[$val] = getPost($val);
        }
        return $post;
    }

    return isset($_POST[$key])
        ? $_POST[$key]
        : $default;
}

function slugify($str)
{
    $str = mb_strtolower(trim($str));
    $str = str_replace(array('å', 'ä', 'ö'), array('a', 'a', 'o'), $str);
    $str = preg_replace('/[^a-z0-9-]/', '-', $str);
    $str = trim(preg_replace('/-+/', '-', $str), '-');
    return $str;
}
