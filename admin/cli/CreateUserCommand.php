

<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This script allows you to reset any local user password.
 *
 * @package    core
 * @subpackage cli
 * @copyright  2009 Petr Skoda (http://skodak.org)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */




define('CLI_SCRIPT', true);

require(__DIR__.'/../../config.php');
require_once($CFG->libdir.'/clilib.php');      // cli only functions
require './vendor/autoload.php' ;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class CreateUserCommand extends Command
{


    public function __construct($name = null )
    {
        parent::__construct($name);
    }

    protected function configure() {

        $this
            // the name of the command (the part after "bin/console")
            ->setName('load:fixture')
            ->setDescription('Creates a new data fixture to quiz_report table .')
            ->setHelp('This command allows you to create a quiz_report entities...') ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        global $CFG, $DB;

        $record1 = new stdClass();
        for($i=0 ; $i < 100; $i++) {

            $record1->name = 'overview' . rand(0, 98898);
            $record1->displayorder = '10000' . rand(0, 98898);
            $record2 = new stdClass();
            $record2->name = 'overview' . rand(0, 98898);
            $record2->displayorder = '10000' . rand(0, 98898);
            $records = array($record1, $record2);
            //$DB->insert_records('quiz_report', $records);
            $output->writeln('User Creator '.$record1->name) ;
        }

        /*
         * Purge Cache With Command Line
         */

        $count = $DB->get_records('quiz_report') ;
        print_r($count) ;
    }
}
$app = new \Symfony\Component\Console\Application() ;
$app->add(new CreateUserCommand()) ;
$app->run() ;
