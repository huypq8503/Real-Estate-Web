window.BookController = function ($scope, $routeParams, $http) {
    // console.log($routeParams.name)
    if ($routeParams.name == 'book') {
        $scope.title = "Plan & Book";
    }
    $scope.checkedData = {
        name: false,
        ID: false,
        email: false,
        gender: false,
        numberPhone: false,
        flight: false,
        luggage: false,
        formsOfPayment: false,
    }
    let apiUrl = "http://localhost:3000/booking";//định nghĩa đường dẫn  API mà mình muốn gọi 
    $scope.getData = function () {
        $http.get(apiUrl).then(function (response) {
            // khi gọi thành công trả về 1 đối tượng ở trong response 
            // console.log(response.data);
            if (response.status == 200) {
                $scope.booking = response.data;
            }
        })
    }
    $scope.getData();
    $scope.onClose = function () {
        $scope.inputValue = {
            name: "",
            ID: "",
            email: "",
            gender: "",
            numberPhone: "",
            flight: "",
            luggage: "",
            formsOfPayment: "",
        }
        $scope.editId = 0;
    }

    $scope.save = function () {

        var x = $scope.inputValue.email
        var atposition = x.indexOf("@");
        var dotposition = x.lastIndexOf(".");
        var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
        let flag = true;
        if (!$scope.inputValue || !$scope.inputValue.name) {
            $scope.checkedData.name = true;
            flag = false;
        } else {
            $scope.checkedData.name = false;
        }
        if (!$scope.inputValue || !$scope.inputValue.ID || isNaN($scope.inputValue.ID) == true) {
            $scope.checkedData.ID = true;
            flag = false;
        } else {
            $scope.checkedData.ID = false;
        }
        if (!$scope.inputValue || !$scope.inputValue.email || atposition < 1 || dotposition < (atposition + 2)
            || (dotposition + 2) >= x.length) {
            $scope.checkedData.email = true;
            flag = false;
        } else {
            $scope.checkedData.email = false;
        }
        if (!$scope.inputValue || !$scope.inputValue.gender) {
            $scope.checkedData.gender = true;
            flag = false;
        } else {
            $scope.checkedData.gender = false;
        }
        if (!$scope.inputValue || !$scope.inputValue.numberPhone || isNaN($scope.inputValue.numberPhone) == true || $scope.inputValue.numberPhone.match(phoneno)) {
            $scope.checkedData.numberPhone = true;
            flag = false;
        } else {
            $scope.checkedData.numberPhone = false;
        }
        if (!$scope.inputValue || !$scope.inputValue.flight) {
            $scope.checkedData.flight = true;
            flag = false;
        } else {
            $scope.checkedData.flight = false;
        }
        if (!$scope.inputValue || !$scope.inputValue.luggage) {
            $scope.checkedData.luggage = true;
            flag = false;
        } else {
            $scope.checkedData.luggage = false;
        }
        if (!$scope.inputValue || !$scope.inputValue.formsOfPayment) {
            $scope.checkedData.formsOfPayment = true;
            flag = false;
        } else {
            $scope.checkedData.formsOfPayment = false;
        }


        if (flag) {
            let newItem = {
                // id:newId,
                name: $scope.inputValue.name,
                ID: $scope.inputValue.ID,
                email: $scope.inputValue.email,
                gender: $scope.inputValue.gender,
                phone: $scope.inputValue.numberPhone,
                flight: $scope.inputValue.flight,
                luggage: $scope.inputValue.luggage,
                pay: $scope.inputValue.formsOfPayment
            }
            $http.post(
                apiUrl,//Đường dẫn API 
                newItem // dữ liệu mới để thêm
            ).then(
                function (response) {
                    // console.log(response);
                    $scope.getData();
                }
            )
            //thực hiện push đối tượng vào array 
            // $scope.danhsach.push(newItem);
            $scope.onClose();
        }
    }
}