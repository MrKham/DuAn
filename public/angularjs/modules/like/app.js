
var utilApp = angular.module('utilApp', []);

utilApp.directive('likeButton', function(){
    return {
        restrict: 'EA',
        templateUrl: '/angularjs/modules/like/template/like.htm',
        controller: function LikeButtonController($scope, $attrs, $http) {
        	$scope.loading = false;
            $scope.liked = ($attrs.like == 'liked') ? true : false;
            $scope.baseUrl = JSON.parse($attrs.url);
            $scope.projectId = JSON.parse($attrs.id);

            $scope.likeOrNot = function() {
            	$scope.loading = true;
            	return $http({
                    method: 'POST',
                    url: $scope.baseUrl + "/ajax/project/" + $scope.projectId + "/like",
                }).then(function (rs) {
                    // $scope.liked = !$scope.liked;
                    if (rs.data.status == 'success') {
                    	if (rs.data.message == 'like') {
                    		$scope.liked = true;
                    	} else {
                    		$scope.liked = false;
                    	}
                    }
                }, function (xhr) {
                    console.log(xhr);
                    if (xhr.status == '401') {
                        JS_Library.notify('Vui lòng đăng nhập để tiếp tục', 'error');
                    }
                }).finally(function(data) {
                    $scope.loading = false;
                });
            }

        },
        scope: {
            like: '=',
            url: '=',
            id: '=',
        }
    }

    // return {
    //     template : "<h1>Made by a directive!</h1>"
    // };
});