(function(){
    angular.module('GameEngine').controller('GameScreen', ['$scope', '$http', function($scope, $http) {
        var screenElement = angular.element('#screenGame');
        screenElement.html('=&gt;');
        $scope.phones = [
        {'name': 'Nexus S',
        'snippet': 'Fast just got faster with Nexus S.'},
        {'name': 'Motorola XOOM™ with Wi-Fi',
        'snippet': 'The Next, Next Generation tablet.'},
        {'name': 'MOTOROLA XOOM™',
        'snippet': 'The Next, Next Generation tablet.'}
        ];
    }]);
})();