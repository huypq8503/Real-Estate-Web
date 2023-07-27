window.EmployeeController = function ($scope, $routeParams, $http) {
    $scope.title = "QUẢN LÝ NHÂN VIÊN";
    $scope.checkedData = {
        name: false,
        date: false,
        gender: false,
        ranks: false,
        numberOfWorking: false,
    }
    //$http là giao thức call API 
    let apiUrl = "http://localhost:3000/users";//định nghĩa đường dẫn  API mà mình muốn gọi 
    $scope.getData = function () {
        $http.get(apiUrl).then(function (response) {
            // khi gọi thành công trả về 1 đối tượng ở trong response 
            // console.log(response.data);
            if (response.status == 200) {
                $scope.users = response.data;
            }
        })
    }
    $scope.getData();
    $scope.onClose = function () {
        $scope.inputValue = {
            name: "",
            date: "",
            gender: "",
            ranks: "",
            numberOfWorking: ""
        }
        $scope.editId = 0;
    }
    $scope.salary = {
        rank1: 70000,
        rank2: 90000,
        rank3: 120000,
    }
    // console.log($scope.salary.rank2)
    $scope.date = new Date().getFullYear();



    $scope.save = function () {
        let flag = true;
        // kiểm tra dữ liệu
        if (!$scope.inputValue || !$scope.inputValue.name) {
            $scope.checkedData.name = true;
            flag = false;
        } else {
            $scope.checkedData.name = false;
        }
        if (!$scope.inputValue || !$scope.inputValue.date) {
            $scope.checkedData.date = true;
            flag = false;
        } else {
            $scope.checkedData.date = false;
        }
        if (!$scope.inputValue || !$scope.inputValue.gender) {
            $scope.checkedData.gender = true;
            flag = false;
        } else {
            $scope.checkedData.gender = false;
        }
        if (!$scope.inputValue || !$scope.inputValue.ranks) {
            $scope.checkedData.ranks = true;
            flag = false;
        } else {
            $scope.checkedData.ranks = false;
        }
        if (!$scope.inputValue || !$scope.inputValue.numberOfWorking || isNaN($scope.inputValue.numberOfWorking) == true) {
            $scope.checkedData.numberOfWorking = true;
            flag = false;
        } else {
            $scope.checkedData.numberOfWorking = false;
        }
        /////////////
        if ($scope.inputValue.gender == 1) {
            $scope.noticeGender = "Nam"
        } else {
            $scope.noticeGender = "Nữ"
        }

        if ($scope.inputValue.ranks == 1) {
            $scope.total = $scope.salary.rank1 * $scope.inputValue.numberOfWorking
        } else if ($scope.inputValue.ranks == 2) {
            $scope.total = $scope.salary.rank2 * $scope.inputValue.numberOfWorking
        } else {
            $scope.total = $scope.salary.rank3 * $scope.inputValue.numberOfWorking
        }
        //////////////////
        if (flag) {
            let editId = $scope.editId;
            $scope.getDate = new Date().getFullYear();
            $scope.age = $scope.getDate - $scope.inputValue.date;
            if (editId) {

                let updateItem = {
                    name: $scope.inputValue.name,
                    gender: $scope.noticeGender,
                    age: $scope.age,
                    money: $scope.total,
                    date: $scope.inputValue.date,
                    day: $scope.inputValue.numberOfWorking,
                    rank: $scope.inputValue.ranks,
                    genderValue: $scope.inputValue.gender
                    // gender: $scope.inputValue.gender,
                    // ranks: $scope.inputValue.ranks,
                    // day: $scope.inputValue.numberOfWorking
                }
                $http.put(
                    `${apiUrl}/${editId}`, //đường dẫn url sửa theo id
                    updateItem // 
                ).then(function (response) {
                    if (response.status == 200) {
                        //gọi lại hàm getData để call lại dữ liệu mới nhất
                        // từ json server về 
                        $scope.getData();
                    }
                })
                $scope.onClose();
                return;
            }
            // xử lý thêm

            let newItem = {
                // id:newId,
                name: $scope.inputValue.name,
                gender: $scope.noticeGender,
                age: $scope.age,
                money: $scope.total,
                date: $scope.inputValue.date,
                day: $scope.inputValue.numberOfWorking,
                rank: $scope.inputValue.ranks,
                genderValue: $scope.inputValue.gender

            }
            $http.post(
                apiUrl,//Đường dẫn API 
                newItem // dữ liệu mới để thêm
            ).then(
                function (response) {
                    // console.log(response);
                    $scope.getData();
                    swal({
                        icon: "success",
                    });
                }
            )
            //thực hiện push đối tượng vào array 
            // $scope.danhsach.push(newItem);
            $scope.onClose();
        }
    }

    $scope.onEdit = function (editId) {
        $scope.editId = editId;
        //gọi api 
        $http.get(`${apiUrl}/${editId}`).then(function (response) {
            console.log(response);
            if (response.status == 200) { // thành công
                $scope.inputValue = {
                    name: response.data.name,
                    date: response.data.date,
                    gender: response.data.genderValue,
                    ranks: response.data.rank,
                    numberOfWorking: response.data.day,
                }
            }
        })
    }
    $scope.onDelete = function (deleteId) {
        let confirm = window.confirm("bạn có muốn xóa không ???");
        if (confirm) {
            //xóa 
            $http.delete(
                `${apiUrl}/${deleteId}`, //đường dẫn url sửa theo id
            ).then(function (response) {
                if (response.status == 200) {
                    //gọi lại hàm getData để call lại dữ liệu mới nhất
                    // từ json server về 
                    $scope.getData();
                }
            })
        }
    }

} 