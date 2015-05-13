<?php require_once 'vendor/autoload.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='UTF-8'>
    <title>Refresing fingers</title>

    <link rel="shortcut icon" type="image/png" href="refreshing-neurons/img/space_bus.ico">
    <link rel="stylesheet" href="refreshing-neurons/js/jasmine/lib/jasmine-2.3.2/jasmine.css">
    <link rel="stylesheet" href="refreshing-neurons/css/style.css">

    <script src="refreshing-neurons/js/jasmine/lib/jasmine-2.3.2/jasmine.js"></script>
    <script src="refreshing-neurons/js/jasmine/lib/jasmine-2.3.2/jasmine-html.js"></script>
    <script src="refreshing-neurons/js/jasmine/lib/jasmine-2.3.2/boot.js"></script>
    <script src="refreshing-neurons/js/angular.js"></script>    

    <!-- include source files here... -->
    <script src="refreshing-neurons/js/game-engine.js"></script>
    <script src="refreshing-neurons/js/controller/game-screen.js"></script>

    <!-- include spec files here... -->
    <script src="refreshing-neurons/js/game-engine.spec.js"></script>
</head>
<body ng-app="gameEngine">
   <div ng-controller="gameScreen as screen" id="screenGame"></div>
</body>
</html>
