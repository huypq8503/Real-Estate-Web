window.ServicesController = function ($scope, $routeParams) {
    // console.log($routeParams.name)
    if ($routeParams.name == 'services') {
        $scope.title = "Services";
    }
}