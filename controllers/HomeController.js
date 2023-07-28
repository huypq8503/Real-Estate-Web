window.HomeController = function ($scope, $routeParams) {
    // console.log($routeParams.name)
    if ($routeParams.name == 'home') {
        $scope.title = "HOME";
    }
}