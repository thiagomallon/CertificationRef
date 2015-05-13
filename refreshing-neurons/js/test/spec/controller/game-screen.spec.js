describe('Screen tests', function(){

    beforeEach(module('GameEngine'));

    it('should create "phones" model with 3 phones', inject(function($controller) {
        var scope = {},
        ctrl = $controller('GameScreen', {$scope:scope});
        expect(scope.phones.length).toBe(3);
        expect(scope.phones[0].name).toBe('Nexus S');
    }));
    it('Nexus comes first', inject(function($controller) {
        var scope = {},
        ctrl = $controller('GameScreen', {$scope:scope});    
        expect(scope.phones[0].name).toBe('Nexus S');
    }));
});