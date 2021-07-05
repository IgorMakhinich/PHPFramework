<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link href="/css/main.css" rel="stylesheet">
   <title>DEFAULT | <?=$title?></title>
</head>

<body>
   <h1>Default</h1>

   <?=$content?>

   <?=debug(vendor\core\Db::$countSql)?>
   <?=debug(vendor\core\Db::$queries)?>

   <script src="/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>