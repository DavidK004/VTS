<?php 
require_once("user.php"); 


/**
 * Class advancedUser
 * Represents a user with personal and educational information with the addition of a github profile.
 */
class advancedUser extends user{
    private String $githubProfile;

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
     * @param string $githubProfile
     */
    public function __construct(
        string $username,
        string $firstName,
        string $lastName,
        string $email,
        int $age,
        string $school,
        array $skills,
        string $studyProgram,
        string $city,
        string $githubProfile
    ) {
        
        parent::__construct($username, $firstName, $lastName, $email, $age, $school, $skills, $studyProgram, $city);
        
        
        $this->githubProfile = $githubProfile;
    }

     /**
     * Returns the users github profile url
     *
     * @return string $githubProfile
     */
    public function getGithubProfile(): String{
        return $this->githubProfile;
    }

}
?>