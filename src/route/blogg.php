<?php

/**
* Route för administrations gränssnittet.
* Visar alla post och pages med paginering och sortering
*/
$app->router->any(["GET", "POST"], "blogg/admin", function () use ($app) {
    $app->db->connect();
    $loggedIn = $app->session->has('admin');
    if (!$loggedIn) {
        $app->response->redirect("blogg/login");
        exit;
    }

    $hits = $app->request->getGet("hits", 4);
    if (!(is_numeric($hits) && $hits > 0 && $hits <= 8)) {
        die("Går inte att använda!");
    }

    $sql = "SELECT COUNT(id) AS max FROM content;";
    $max = $app->db->executeFetchAll($sql);
    $max = ceil($max[0]->max / $hits);

    $page = $app->request->getGet("page", 1);
    if (!(is_numeric($hits) && $page > 0 && $page <= $max)) {
        die("Ingen godkänd sida");
    }

    $offset = $hits * ($page - 1);

    $columns = ["id", "title", "type", "published", "created", "updated", "deleted", "path", "slug"];
    $orders = ["asc", "desc"];

    $orderBy = $app->request->getGet("orderby") ?: "id";
    $order = $app->request->getGet("order") ?: "asc";

    if (!(in_array($orderBy, $columns) && in_array($order, $orders))) {
        die("Går inte att sortera");
    }

    $sql = "SELECT * FROM content ORDER BY $orderBy $order LIMIT $hits OFFSET $offset;";
    $res = $app->db->executeFetchAll($sql);

    $data = [
        "title"     => "Admin översikt | Blogg",
        "resultset" => $res,
        "max"       => $max,
        "page"      => $page,
        "loggedIn"  => $loggedIn
    ];

    $app->view->add("blogg/bloggNavbar", $data);
    $app->view->add("blogg/showAll", $data);
    $app->page->render($data);
});

/**
* Uppdatera post och pages
*/
$app->router->any(["GET", "POST"], "blogg/updateContent", function () use ($app) {
    $app->db->connect();
    $loggedIn = $app->session->has('admin');

    $sql = "SELECT * FROM content WHERE id = ?;";
    $id = $app->request->getGet("id");

    if (!is_numeric($id)) {
        die("Inget giltigt id!");
    }

    if (hasKeyPost("update")) {
        $params = getPost([
            "title",
            "path",
            "slug",
            "data",
            "type",
            "filter",
            "publish",
            "id"
        ]);

        if (!$params["slug"]) {
            $slug = slugify($params["title"]);
            $sql = "Select slug FROM content WHERE slug = ?;";
            $res = $app->db->executeFetchAll($sql, [$slug]);
            if (!$res) {
                $params["slug"] = slugify($params["title"]);
            } else {
                $params["slug"] = $slug . '/' . $params["id"];
            }
        }

        if (!$params["path"]) {
            $params["path"] = null;
        }

        $sql ="UPDATE content SET title=?, path=?, slug=?, data=?, type=?, filter=?, published=? WHERE id = ?;";
        $app->db->execute($sql, $params);
        header("Location: updateContent?id=$id");
        exit;
    }

    if (hasKeyPost("remove")) {
        header("Location: removeContent?id=$id");
        exit;
    }

    $data = [
        "title"     => "Uppdatera innehåll | Blogg",
        "content"   => $app->db->executeFetchAll($sql, [$id]) [0],
        "loggedIn"  => $loggedIn
    ];

    $app->view->add("blogg/bloggNavbar", $data);
    $app->view->add("blogg/updateContent", $data);
    $app->page->render($data);
});

/**
* Ta bort post och pages
*/
$app->router->any(["GET", "POST"], "blogg/removeContent", function () use ($app) {
    $app->db->connect();
    $loggedIn = $app->session->has('admin');

    $sql = "SELECT * FROM content WHERE id = ?;";
    $id = $app->request->getGet("id");

    if (!is_numeric($id)) {
        die("Inget giltigt id!");
    }

    if (hasKeyPost("remove")) {
        $sql = "UPDATE content SET deleted=NOW() WHERE id=?;";
        $app->db->execute($sql, [$id]);
        header("Location: removeContent?id=$id");
        exit;
    }

    $data = [
        "title" => "Ta bort innehåll | Blogg",
        "content"   => $app->db->executeFetchAll($sql, [$id]) [0],
        "loggedIn"  => $loggedIn
    ];

    $app->view->add("blogg/bloggNavbar", $data);
    $app->view->add("blogg/removeContent", $data);
    $app->page->render($data);
});

/**
* Skapar nya post och pages
*/
$app->router->any(["GET", "POST"], "blogg/createContent", function () use ($app) {
    $app->db->connect();

    $loggedIn = $app->session->has('admin');
    if (!$loggedIn) {
        $app->response->redirect("blogg/login");
        exit;
    }

    if (hasKeyPost("create")) {
        $title = getPost("title");

        $sql = "INSERT INTO content (title) VALUES (?);";
        $app->db->execute($sql, [$title]);
        $id = $app->db->lastInsertId();
        header("Location: updateContent?id=$id");
        exit;
    }

    $data = [
        "title" => "Ska nytt innehåll",
        "loggedIn"  => $loggedIn
    ];

    $app->view->add("blogg/bloggNavbar", $data);
    $app->view->add("blogg/createContent", $data);
    $app->page->render($data);
});

/**
* Vissar alla bloggposter.
*/
$app->router->any(["GET", "POST"], "blogg/showBlogs", function () use ($app) {
    $app->db->connect();
    $loggedIn = $app->session->has('admin');

    $sql = <<<EOD
SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
FROM content
WHERE type=?
ORDER BY published DESC
;
EOD;
    $res = $app->db->executeFetchAll($sql, ["post"]);

    $data = [
        "title"     => "Blogginlägg",
        "resultset" => $res,
        "loggedIn"  => $loggedIn
    ];

    $app->view->add("blogg/bloggNavbar", $data);
    $app->view->add("blogg/showBlogs", $data);
    $app->page->render($data);
});

/**
* Visar alla pages
*/
$app->router->any(["GET", "POST"], "blogg/showPages", function () use ($app) {
    $app->db->connect();
    $loggedIn = $app->session->has('admin');

    if ($app->request->getGet("pageView")) {
        $slug = $app->request->getGet("slug");
    }

    $sql = <<<EOD
SELECT
    *,
    CASE
        WHEN (deleted <= NOW()) THEN "isDeleted"
        WHEN (published <= NOW()) THEN "isPublished"
        ELSE "notPublished"
    END AS status
FROM content
WHERE type=?
;
EOD;
    $res = $app->db->executeFetchAll($sql, ["page"]);

    $data = [
        "title"         => "Alla pages",
        "resultset"     => $res,
        "loggedIn"  => $loggedIn
    ];

    $app->view->add("blogg/bloggNavbar", $data);
    $app->view->add("blogg/showPages", $data);
    $app->page->render($data);
});

/**
* Visar en specifik bloggpost.
*/
$app->router->any(["GET", "POST"], "blogg/postView", function () use ($app) {
    $textFilter = new \Mals17\Filter\TextFilter();
    $app->db->connect();
    $loggedIn = $app->session->has('admin');

    $res = null;
    $content = null;
    $slug = $app->request->getGet("slug");

    $sql = <<<EOD
SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS published_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS published
FROM content
WHERE
    slug = ?
    AND (deleted IS NULL OR deleted > NOW())
    AND published <= NOW()
;
EOD;

    $res = $app->db->executeFetchAll($sql, [$slug]);

    if ($res == null) {
        $data = [
            "title"     => "404 Error"
        ];
        $app->view->add("blogg/404", $data);
        $app->page->render($data);
    }

    $filter = $textFilter->parse($res[0]->data, $res[0]->filter);
    $content = $res[0];

    $data = [
        "title"     => $content->title,
        "content"   => $content,
        "filter"    => $filter,
        "loggedIn"  => $loggedIn
    ];

    $app->view->add("blogg/bloggNavbar", $data);
    $app->view->add("blogg/postView", $data);
    $app->page->render($data);
});

/**
* Visar en specifik page.
*/
$app->router->any(["GET", "POST"], "blogg/pageView", function () use ($app) {
    $app->db->connect();
    $textFilter = new \Mals17\Filter\TextFilter();
    $loggedIn = $app->session->has('admin');

    $res = null;
    $content = null;
    $path = $app->request->getGet("path");

    $sql = <<<EOD
SELECT
    *,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%dT%TZ') AS modified_iso8601,
    DATE_FORMAT(COALESCE(updated, published), '%Y-%m-%d') AS modified
FROM content
WHERE
    path = ?
    AND (deleted IS NULL OR deleted > NOW())
    AND published <= NOW()
;
EOD;

    $res = $app->db->executeFetchAll($sql, [$path]);

    if ($res == null) {
        $data = [
            "title"     => "404 Error"
        ];
        $app->view->add("blogg/404", $data);
        $app->page->render($data);
    }

    $filter = $textFilter->parse($res[0]->data, $res[0]->filter);
    $content = $res[0];

    $data = [
        "title"     => $content->title,
        "content"   => $content,
        "filter"    => $filter,
        "loggedIn"  => $loggedIn
    ];

    $app->view->add("blogg/bloggNavbar", $data);
    $app->view->add("blogg/pageView", $data);
    $app->page->render($data);
});

/**
* Loggar in admin.
*/
$app->router->any(["GET", "POST"], "blogg/login", function () use ($app) {
    $app->db->connect();

    if ($app->request->getPost("login")) {
        $admin = $app->request->getPost("username");
        $password = $app->request->getPost("password");
        $loggedIn = false;
        $sql ="SELECT * FROM admin where adminName = ?;";
        $res = $app->db->executeFetchAll($sql, [$admin]);

        if ($res && $password == $res[0]->password) {
            $app->session->set('admin', $admin);
            $loggedIn = true;
            $data = [
                "title"     => "Inloggad",
                "admin"     => "admin",
                "loggedIn"  => $loggedIn,
                "info"      => "Inloggad"
            ];
        } else if (!$res) {
            $loggedIn = false;
            $data = [
                "title"     => "Inte inloggad",
                "admin"     => null,
                "loggedIn"  => $loggedIn,
                "info"      => "Fel användarnamn eller lösenord!"
            ];
        }

        if ($loggedIn) {
            $app->view->add("blogg/bloggNavbar", $data);
            $app->view->add("blogg/login", $data);
            $app->page->render($data);
        } else {
            $app->view->add("blogg/bloggNavbar", $data);
            $app->view->add("blogg/login", $data);
            $app->page->render($data);
        }
    }

    $data = [
        "title"     => "Logga in",
        "info"   => ""
    ];

    $app->view->add("blogg/bloggNavbar", $data);
    $app->view->add("blogg/login", $data);
    $app->page->render($data);
});

/**
* Loggar ut admin.
*/
$app->router->get("blogg/logout", function () use ($app) {
    $app->session->delete('admin');
    $app->response->redirect("blogg/login");
});
