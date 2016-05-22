<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \Robo\Tasks
{
    // define public methods as commands
    public function watch()
    {
        $this->taskWatch()
            ->monitor([
                'resources/assets/less',
                'resources/assets/js',
                ], function () {
                    $this->_exec('vendor/bin/mini_asset clear --config assets.ini');
                    $this->_exec('vendor/bin/mini_asset build --config assets.ini');
            })->run();
    }

    public function build()
    {
        $this->_exec('vendor/bin/mini_asset clear --config assets.ini');
        $this->_exec('vendor/bin/mini_asset build --config assets.ini');
    }

    public function copy()
    {
        $this->taskCopyDir(['resources/bower_components/fontawesome/fonts' => 'public/fonts'])->run();
        $this->taskCopyDir(['resources/bower_components/bootstrap/fonts' => 'public/fonts'])->run();
    }
}