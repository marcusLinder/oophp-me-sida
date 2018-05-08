<?php

/**
* Route för lista med alla filmer.
*/
$app->router->get("movie/", function () use ($app) {

    $app->db->connect();

    $sql = "SELECT * FROM movie;";
    $res = $app->db->executeFetchAll($sql);

    $data = [
        "resultset" => $res
    ];

    $app->view->add("movies/movieNavbar", $data);
    $app->view->add("movies/listMovies", $data);
    $app->page->render($data);
});

/**
* Route för visa alla filmer med sortering och paginering.
*/
$app->router->any(["GET", "POST"], "movie/allMovies", function () use ($app) {

    $app->db->connect();

    $hits = $app->request->getGet("hits", 4);
    if (!(is_numeric($hits) && $hits > 0 && $hits <= 8)) {
        die("Går inte att använda");
    }

    $sql = "SELECT COUNT(id) AS max FROM movie;";
    $max = $app->db->executeFetchAll($sql);
    $max = ceil($max[0]->max / $hits);

    $page = $app->request->getGet("page", 1);
    if (!(is_numeric($hits) && $page > 0 && $page <= $max)) {
        die("Ingen godkänd sida");
    }
    $offset = $hits * ($page - 1);

    $columns = ["id", "title", "year", "image"];
    $orders = ["asc", "desc"];

    $orderBy = $app->request->getGet("orderby") ?: "id";
    $order = $app->request->getGet("order") ?: "asc";

    if (!(in_array($orderBy, $columns) && in_array($order, $orders))) {
        die("Går inte att sortera");
    }

    $sql = "SELECT * FROM movie ORDER BY $orderBy $order LIMIT $hits OFFSET $offset;";
    $res = $app->db->executeFetchAll($sql);

    $data = [
        "title"     => "Filmdatabas",
        "resultset" => $res,
        "max"       => $max,
        "page"      => $page
    ];

    $app->view->add("movies/movieNavbar", $data);
    $app->view->add("movies/allMovies", $data);
    $app->page->render($data);
});

/**
* Route för att söka film baserat på utgivningsår.
*/
$app->router->get("movie/searchYear", function () use ($app) {
    $app->db->connect();

    $year1 = $app->request->getGet("year1");
    $year2 = $app->request->getGet("year2");
    $params = null;

    $sql = "SELECT * FROM movie;";
    if ($year1 && $year2) {
        $sql = "SELECT * FROM movie WHERE year >= ? AND year <= ?;";
        $params = [$year1, $year2];
    } elseif ($year1) {
        $sql = "SELECT * FROM movie WHERE year >= ?;";
        $params = [$year1];
    } elseif ($year2) {
        $sql = "SELECT * FROM movie WHERE year <= ?;";
        $params = [$year2];
    }

    if ($params) {
        $res = $app->db->executeFetchAll($sql, $params);
    } else {
        $res = $app->db->executeFetchAll($sql);
    }

    $data = [
        "title"     => "Sök år | Filmdatabas",
        "resultset" => $res,
        "year1"     => $year1,
        "year2"     => $year2
    ];

    $app->view->add("movies/movieNavbar", $data);
    $app->view->add("movies/searchYear", $data);
    $app->view->add("movies/listMovies", $data);
    $app->page->render($data);
});

/**
* Route för att söka film efter titel.
*/
$app->router->get("movie/searchTitle", function () use ($app) {
    $app->db->connect();

    $searchTitle = $app->request->getGet("titleSearch");

    $sql = "SELECT * FROM movie;";
    if ($searchTitle) {
        $sql = "SELECT * FROM movie WHERE title LIKE ?;";
        $res = $app->db->executeFetchAll($sql, [$searchTitle]);
    } else {
        $res = $app->db->executeFetchAll($sql);
    }

    $data = [
        "title"         => "Sök titel | Filmdatabas",
        "resultset"     => $res,
        "searchTitle"   => $searchTitle
    ];

    $app->view->add("movies/movieNavbar", $data);
    $app->view->add("movies/searchTitle", $data);
    $app->view->add("movies/listMovies", $data);
    $app->page->render($data);
});

/**
* Route för att lägga till en ny film.
*/
$app->router->get("movie/addMovie", function () use ($app) {

    $data = [
        "title" => "Lägg till ny film | Filmdatabas"
    ];

    $app->view->add("movies/movieNavbar", $data);
    $app->view->add("movies/addMovie", $data);
    $app->page->render($data);
});

/**
* Lägger till filmen.
*/
$app->router->post("movie/addMovie", function () use ($app) {
    $app->db->connect();

    $input = $app->request->getPost();

    if (isset($input["title"]) && isset($input["year"]) && isset($input["image"])) {
        $sql = "INSERT INTO movie(title, year, image) VALUES (?, ?, ?);";
        $app->db->execute($sql, [$input["title"], $input["year"], $input["image"]]);

        $app->redirect("movie/allMovies");
        exit;
    }
});

/**
* Route för att uppdatera en befintlig film.
*/
$app->router->get("movie/updateMovie", function () use ($app) {
    $app->db->connect();

    $sql = "SELECT * FROM movie WHERE id = ?;";
    $id = $app->request->getGet("id");

    $data = [
        "title" => "Uppdatera film | Filmdatabas",
        "movie" => $app->db->executeFetchAll($sql, [$id])[0]
    ];

    $app->view->add("movies/movieNavbar", $data);
    $app->view->add("movies/updateMovie", $data);
    $app->page->render($data);
});

/**
* Uppdaterar filmen.
*/
$app->router->post("movie/updateMovie", function () use ($app) {
    $app->db->connect();

    $input = $app->request->getPost();
    if (isset($input["id"]) && isset($input["title"]) && isset($input["year"]) && isset($input["image"])) {
        $sql ="UPDATE movie SET title = ?, year = ?, image = ? WHERE id = ?;";
        $app->db->execute($sql, [$input["title"], $input["year"], $input["image"], $input["id"]]);

        $app->redirect("movie/allMovies");
        exit;
    }
});

/**
* Route för att ta bort en film.
*/
$app->router->get("movie/deleteMovie", function () use ($app) {
    $app->db->connect();

    $sql = "SELECT * FROM movie WHERE id = ?;";
    $id = $app->request->getGet("id");

    $data = [
        "title" => "Ta bort film | Filmdatabas",
        "movie" => $app->db->executeFetchAll($sql, [$id])[0]
    ];

    $app->view->add("movies/movieNavbar", $data);
    $app->view->add("movies/deleteMovie", $data);
    $app->page->render($data);
});

/**
* Tar bort filmen.
*/
$app->router->post("movie/deleteMovie", function () use ($app) {
    $app->db->connect();

    $input = $app->request->getPost();

    if (isset($input["id"])) {
        $sql = "DELETE FROM movie WHERE id = ?;";
        $app->db->execute($sql, [$input["id"]]);

        $app->redirect("movie/allMovies");
        exit;
    }
});
