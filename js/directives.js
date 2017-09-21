angular.module('directives')

.directive('badgerloopNavbar', function() {
    return { templateUrl: 'directives/navbar.html' };
})

.directive('badgerloopFooter', function() {
    return { templateUrl: 'directives/footer.html' };
});

