<?php 
declare(strict_types=1);

/**
 * Class user
 * Represents a user with personal and educational information.
 */
class user{
    public const DEFAULT_CITY = "Subotica";

    public String $username;
    public String $firstName;
    public String $lastName;
    private String $email;
    private int $age;
    private String $school;
    private array $skills;
    private String $studyProgram;
    public String $city;
    public static int $userCount = 0;


    /**
     * Class constructor.
     * 
     * @param string $username
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param int $age
     * @param string $school
     * @param array $skills
     * @param string $studyProgram
     * @param string $city
     */
    public function __construct(
        string $username,
        string $firstName,
        string $lastName,
        string $email,
        int $age,
        string $school,
        array $skills,
        string $studyProgram = "informatics",
        string $city = self::DEFAULT_CITY
    ) {
        $this->username = $username;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->age = $age;
        $this->school = $school;
        $this->skills = $skills;
        $this->studyProgram = $studyProgram;
        $this->city = $city;
        self::$userCount++;
    }

     /**
     * Returns the user's full name.
     *
     * @return string
     */
    function getName(): String{
        return $this->firstName . " " . $this->lastName;
    }

     /**
     * Validates the email format.
     *
     * @return string Message indicating whether the email is valid
     */
    function validateEmail(): String {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return "email adresa nije validna";
        }
        return "email adresa je validna";
    }

    /**
     * Sets a new email address for the user.
     *
     * @param string $email
     * @return void
     */
    function setEmail($email): void{
        
        $this->email = $email;
    }


    /**
     * Displays the user's skills in HTML format.
     *
     * @return void
     */
    function showSkills(): void{
        foreach($this->skills as $skill){
            echo htmlspecialchars($skill) . "<br>";
        }
    }

     /**
     * Displays the user's personal data in an HTML list.
     *
     * @return void
     */
    function showUserData(): void{
        echo "
        <ul>
            <li>Godine: " . htmlspecialchars((string)$this->age) . "</li>
            <li>Email: " . htmlspecialchars($this->email) . "</li>
            <li>Škola: " . htmlspecialchars($this->school) . "</li>
            <li>Studijski program: " . htmlspecialchars($this->studyProgram) . "</li>
        </ul>
    ";
    }

    public static function getUserCount(): int {
        return self::$userCount;
    }
}


?>