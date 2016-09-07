app.controller("mainController", ["$scope", function($scope) {
	$scope.appNavs = [
		{
			link: 'dashboard.php',
			name: 'Dashboard'
		},
		{
			link: 'schedule.php',
			name: 'Schedule'
		},
		{
			link: 'bookings.php',
			name: 'Bookings'
		},
		{
			link: 'airplanes.php',
			name: 'Airplanes'
		},
		{
			link: 'routes.php',
			name: 'Routes'
		},
		{
			link: 'cities.php',
			name: 'Cities'
		},
		{
			link: 'airplane_types.php',
			name: 'Airplane Types'
		},
		{
			link: 'reports.php',
			name: 'Reports'
		},
		{
			link: 'settings.php',
			name: 'Settings'
		},
		{
			link: 'users.php',
			name: 'Users'
		},
		{
			link: 'install.php',
			name: 'Install & Preview'
		}
	];
}]);


