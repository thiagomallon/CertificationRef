<?php require_once '../vendor/autoload.php'; ?>
<!DOCTYPE html>
<html ng-app="GameEngine">
<head>
    <meta charset='UTF-8'>
    <title>Refresing Neurons</title>

    <link rel="shortcut icon" type="image/png" href="img/coding.ico">
    <link rel="stylesheet" href="lib/jasmine/lib/jasmine-core/jasmine.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="lib/jasmine/lib/jasmine-core/jasmine.js"></script>
    <script src="lib/jasmine/lib/jasmine-core/jasmine-html.js"></script>
    <script src="lib/jasmine/lib/jasmine-core/boot.js"></script>  
    <script src="lib/jquery/dist/jquery.min.js"></script>  
    <script src="lib/angular/angular.min.js"></script>  
    <script src="lib/angular-mocks/angular-mocks.js"></script>      

    <!-- include source files here... -->
    <script src="js/game-engine.js"></script> 
    <script src="js/controller/game-screen.js"></script> 

    <!-- include spec files here... -->
    <script src="js/test/controller/game-screen.spec.js"></script>
</head>
<body>    
   <div ng-controller="GameScreen as screen" id="screenGame"></div>
</body>
</html>