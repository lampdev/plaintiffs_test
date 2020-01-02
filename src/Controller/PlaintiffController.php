<?php
declare(strict_types=1);

/**
 * Test task from Upwork to render a template basing on the
 * plaintiff array assigned
 *
 * @author Alexey Deriyenko <alexey@lamp-dev.com>
 */

namespace App\Controller;


class PlaintiffController extends PagesController {

    /**
     * This would be moved to models (models collection)
     * But since this is a test task, I was thinking PHP arrays would be fine
     *
     * @var array Plaintiffs
     */
    protected $plaintiffs = [
        [
            'name' => 'Test Person',
        ],
        [
            'name' => 'Test Person 2',
        ],
        [
            'name' => 'Test Person 3',
        ]
    ];

    /**
     * This would be moved to models (models collection)
     * But since this is a test task, I was thinking PHP arrays would be fine
     *
     * @var array Defendants
     */
    protected $defendants = [
        [
            'name' => 'Test Defentant 1',
        ],
        [
            'name' => 'Test Defendant 2',
        ],
    ];

    public function generate() {
        $this->set(
            [
                'plaintiffs' => $this->plaintiffs,
                'defendants' => $this->defendants,
                'plaintiffsGreeting' => $this->getPeople($this->plaintiffs, 'Plaintiff'),
                'defendantsGreeting' => $this->getPeople($this->defendants, 'Defendant')
            ]
        );
    }

    /**
     * This should be a model method
     *
     * @param array  $people array of people
     * @param string $type   type of the string to generate (Plaintiff|Defendant|...)
     *
     * @return string Formatted string to be inserted into the <defendants>|<plaintiffs> template placeholder
     */
    protected function getPeople(array $people, string $type) : string {
        $count = count($people);
        switch (true) {
            case $count === 1:
                return $people[0]['name'] . ' ('.$type.')';
            case $count === 2:
                return $people[0]['name'] . ' and ' . $people[1]['name'] .' (' . $type . 's)';
            case $count > 2 && $count <=5:
                $str = '';
                for ($i = 0; $i < $count - 1; $i++) {
                    $str .= $people[$i]['name'] . ',';
                }
                $str .= ' and ' . $people[$count - 1]['name'] . ' ('.$type.'s)';
                return $str;
            case $count > 5:
                return $type.'s';
            default:
                return '';
        }
    }

    /**
     * This should be a model or a helper function
     *
     * @param string $verb  Verb to generate the form for
     * @param int    $count The number of people to generate the verb ending for
     *
     * @return string the verb ending
     */
    public static function getVerbEndingForCount(string $verb, int $count) : string {
        return $count === 1 ? $verb . 's' : $verb . '';
    }

    /**
     * This should be a model or a helper function
     *
     * @param string $noun  Noun to generate the form for
     * @param int    $count The number of objects to generate the noun ending for
     *
     * @return string the verb ending
     */
    public static function getNounEndingForCount(string $noun, int $count): string {
        return $count === 1 ? $noun : $noun . 's';
    }

    /**
     * This should be a model or a helper function
     *
     * @param string $type  the type of object
     * @param int    $count the number of objects to return pronoun for
     *
     * @return string the pronoun
     */
    public static function getPronoun(string $type, int $count) : string {
        return $count === 1 ? $type . "'s" : 'their';
    }
}
