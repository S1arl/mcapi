<?php

namespace MovieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 * Movies
 * @ORM\Table(name="movies")
 * @ORM\Entity(repositoryClass="MovieBundle\Repository\MoviesRepository")
 * @ORM\HasLifecycleCallbacks
 * @UniqueEntity("trailer")
 */
class Movies {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="movies")
     * @ORM\JoinColumn(name="adder_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @var string
     * @ORM\Column(name="title", type="string", length=255)
     * @Assert\NotBlank()
     * @Assert\Length(min = 1, max = 255, minMessage="Title can not have more then 5 character", maxMessage="Title must not have more then 255 characters")              
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="year", type="integer")
     * @Assert\Choice(callback = "getYearsValidation")
     * 
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     * @Assert\Choice(callback = "getCountryValidation")
     * 
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="review", type="string", length=1020)
     * @Assert\NotBlank()
     * @Assert\Length(min=115,max=1020, minMessage="You have to type at least 115 signs", maxMessage="You must not type more then 1020 signs")
     */
    private $review;

    /**
     * @var string
     * @ORM\Column(name="trailer", type="string", length=255, unique=true)
     * @Assert\NotBlank()
     * @Assert\Url()
     * 
     */
    private $trailer;

    /**
     * @ORM\ManyToMany(targetEntity="Emotion", mappedBy="title")
     * @Assert\Valid
     */
    protected $emotions;

    /**
     * @var string
     * @ORM\Column(name="year_events", type="string")
     * 
     * 
     */
    private $yearEvents;

    /**
     * @ORM\ManyToMany(targetEntity="ActionPlace", mappedBy="title")
     * @Assert\Valid
     */
    protected $ActionPlaces;

    /**
     * @var string
     *
     * @ORM\Column(name="well_known", type="string", length=255)
     * @Assert\Choice(callback = "getWellKnownValidation")
     */
    private $wellKnown;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=255)
     * @Assert\Choice(callback ="getGenderValidation")
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="brainy", type="string", length=255)
     * @Assert\Choice(callback = "getBrainyValidation")
     */
    private $brainy;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotNull()
     */
    protected $path;
    /**
     * @Assert\Image(
     *     minWidth = 208,
     *     maxWidth = 220,
     *     minHeight = 137,
     *     maxHeight = 150
     * )
     * @Assert\File (
     * maxSize = "1024k",)
     */
    private $file;
    private $temp;

    public function __construct() {
        $this->emotions = new ArrayCollection();
        $this->ActionPlaces = new ArrayCollection();
    }

    public static function getYearsValidation() {
        return array('1930' => "1930", '1931' => "1931", '1932' => "1932", '1933' => "1933", '1934' => "1934", '1935' => "1935", '1936' => "1936", '1937' => "1937", '1938' => "1938", '1939' => "1939", '1940' => "1940", '1941' => "1941", '1942' => "1942", '1943' => "1943", '1944' => "1944", '1945' => "1945", '1946' => "1946", '1947' => "1947", '1948' => "1948", '1949' => "1949", '1950' => "1950", '1951' => "1951", '1952' => "1952", '1953' => "1953", '1954' => "1954", '1955' => "1955", '1956' => "1956", '1957' => "1957", '1958' => "1958", '1959' => "1959", '1960' => "1960", '1961' => "1961", '1962' => "1962", '1963' => "1963", '1964' => "1964", '1965' => "1965", '1966' => "1966", '1967' => "1967", '1968' => "1968", '1969' => "1969", '1970' => "1970", '1971' => "1971", '1972' => "1972", '1973' => "1973", '1974' => "1974", '1975' => "1975", '1976' => "1976", '1977' => "1977", '1978' => "1978", '1979' => "1979", '1980' => "1980", '1981' => "1981", '1982' => "1982", '1983' => "1983", '1984' => "1984", '1985' => "1985", '1986' => "1986", '1987' => "1987", '1988' => "1988", '1989' => "1989", '1990' => "1990", '1991' => "1991", '1992' => "1992", '1993' => "1993", '1994' => "1994", '1995' => "1995", '1996' => "1996", '1997' => "1997", '1998' => "1998", '1999' => "1999", '2000' => "2000", '2001' => "2001", '2002' => "2002", '2003' => "2003", '2004' => "2004", '2005' => "2005", '2006' => "2006", '2007' => "2007", '2008' => "2008", '2009' => "2009", '2010' => "2010", '2011' => "2011", '2012' => "2012", '2013' => "2013", '2014' => "2014", '2015' => "2015");
    }

    public static function getCountryValidation() {
        return array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
    }

 

    public static function getWellKnownValidation() {
        return array("well-known", "Common", "Inglorious");
    }

    public static function getGenderValidation() {
        return array('Male', 'Female');
    }

    public static function getBrainyValidation() {
        return array('yes', 'no');
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Movies
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     * 
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set year
     *
     * @param integer $year
     *
     * @return Movies
     */
    public function setYear($year) {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return int
     */
    public function getYear() {
        return $this->year;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Movies
     */
    public function setCountry($country) {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry() {
        return $this->country;
    }

    /**
     * Set review
     *
     * @param string $review
     *
     * @return Movies
     */
    public function setReview($review) {
        $this->review = $review;

        return $this;
    }

    /**
     * Get review
     *
     * @return string
     */
    public function getReview() {
        return $this->review;
    }

    /**
     * Set trailer
     *
     * @param string $trailer
     *
     * @return Movies
     */
    public function setTrailer($trailer) {
        $this->trailer = $trailer;

        return $this;
    }

    /**
     * Get trailer
     *
     * @return string
     */
    public function getTrailer() {
        return $this->trailer;
    }

    public function getEmotions() {
        return $this->emotions;
    }

    public function addEmotion(Emotion $emotions) {
        $emotions->addTitle($this);
        $this->emotions->add($emotions);
    }

    public function removeEmotion(Emotion $emotion) {
        
    }

    /**
     * Set yearEvents
     *
     * @param string $yearEvents
     *
     * @return Movies
     */
    public function setYearEvents($yearEvents) {
        $this->yearEvents = $yearEvents;

        return $this;
    }

    /**
     * Get yearEvents
     *
     * @return string
     */
    public function getYearEvents() {
        return $this->yearEvents;
    }

    public function addActionPlace(ActionPlace $ActionPlaces) {
        $ActionPlaces->addTitle($this);
        $this->ActionPlaces->add($ActionPlaces);
        return $this;
    }

    public function removeActionPlace(ActionPlace $ActionPlaces) {
        $this->ActionPlaces->removeElement($ActionPlaces);
    }

    public function getActionPlaces() {
        return $this->ActionPlaces;
    }

    /**
     * Set wellKnown
     * @param string $wellKnown
     * @return Movies
     */
    public function setWellKnown($wellKnown) {
        $this->wellKnown = $wellKnown;

        return $this;
    }

    /**
     * Get wellKnown
     *
     * @return string
     */
    public function getWellKnown() {
        return $this->wellKnown;
    }

    /**
     * Set trailer
     *
     * @param string $gender
     *
     * @return Movies
     */
    public function setGender($gender) {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender() {
        return $this->gender;
    }

    /**
     * Set brainy
     *
     * @param string $brainy
     *
     * @return Movies
     */
    public function setBrainy($brainy) {
        $this->brainy = $brainy;

        return $brainy;
    }

    /**
     * Get wellKnown
     *
     * @return string
     */
    public function getBrainy() {
        return $this->brainy;
    }

    public function setUser($user) {
        return $this->user = $user;
    }

    public function getAbsolutePath() {
        return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
    }

    public function getWebPath() {
        return null === $this->path ? null : $this->getUploadDir() . '/' . $this->path;
    }

    protected function getUploadRootDir() {
        return __DIR__ . '/../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        return 'uploads/images/Movies';
    }
    public function getPath() {
        return $this->path;
    }

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null) {
        $this->file = $file;
        if (isset($this->path)) {
            $this->temp = $this->path;
            $this->path = null;
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile() {
        return $this->file;
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload() {
        if (null === $this->getFile()) {
            return;
        }
        $this->getFile()->move($this->getUploadRootDir(), $this->path);
        if (isset($this->temp)) {
            unlink($this->getUploadRootDir() . '/' . $this->temp);
            $this->temp = null;
        }
        $this->file = null;
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload() {
        if (null !== $this->getFile()) {
            $array = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'w', 'y', 'z');
            shuffle($array);
            $this->path = time() . rand(100000, 999999) . $array[0] . $array[1] . $array[2] . '.' . $this->getFile()->guessExtension();
        }
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload() {
        $file = $this->getAbsolutePath();
        if ($file) {
            unlink($file);
        }
    }

}
