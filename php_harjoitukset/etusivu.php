<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <title>Etusivu - Meidän Firma</title>
    <style>
        body { font-family: sans-serif; line-height: 1.6; margin: 2em; }
        nav ul {
            list-style-type: none;
            padding: 0;
            background-color: #333;
            overflow: hidden;
        }
        nav ul li { float: left; }
        nav ul li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        nav ul li a:hover { background-color: #111; }
        /* Aktiivisen linkin korostus */
        nav ul li.active a {
            background-color: #007bff;
            color: white;
        }
        main { padding-top: 1em; }
    </style>
</head>
<body>
    <header>
        <?php include 'navigaatio.php'; ?>
    </header>
    <main>
        <h1>Tervetuloa etusivulle!</h1>
        <p>Tämä on dynaamisella navigaatiolla varustetun sivustomme pääsivu.</p>
    </main>
</body>
</html>