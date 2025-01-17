
<?php
require_once 'Models/UserModel.php';
require_once 'Models/StatisticsModel.php';

class DashboardController {
    private $userModel;
    private $statisticsModel;

    public function __construct($db) {
        $this->userModel = new UserModel($db);
        $this->statisticsModel = new StatisticsModel($db);
    }

    public function index() {
        $userId = $_SESSION['user']['id'];
        $user = $this->userModel->getUserById($userId);
        $coursesCount = $this->statisticsModel->getCoursesCountByTeacher($userId);

        // Transmet les données à la vue
        require 'Views/dashboard.php';
    }
}
