window.ContactController = function ($scope, $routeParams) {
    // console.log($routeParams.name)
    if ($routeParams.name == 'contact') {
        $scope.title = "Contact";
    }
}