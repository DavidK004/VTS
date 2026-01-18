<?php
require_once 'config.php';

interface Position {
    public function getPositionsData();
    public function getAverageSalary();
    public function getPositionsByAverageSalary();
}

class Web implements Position {
    private $positions;
    private $position;

    public function __construct($positions, $position) {
        $this->positions = $positions;
        $this->position = $position;
    }

    public function getPositionsData() {
        foreach ($this->positions as $pos) {
            if ($pos['name'] === $this->position) return $pos;
        }
        return [];
    }

    public function getAverageSalary() {
        $sum = 0;
        foreach ($this->positions as $pos) $sum += $pos['salary'];
        return $sum / count($this->positions);
    }

    public function getPositionsByAverageSalary() {
        $avg = $this->getAverageSalary();
        $result = [];
        foreach ($this->positions as $pos) {
            if ($pos['salary'] >= $avg) $result[] = $pos;
        }
        return $result;
    }
}

// Example usage
$web = new Web($positions, 'junior');
echo "<pre>";
print_r($web->getPositionsData());
echo "Average Salary: " . $web->getAverageSalary() . "\n";
print_r($web->getPositionsByAverageSalary());
echo "</pre>";
?>
