<?php

namespace Project\Tests\Unit;

use Project\Tool\CodeQualityTool;

/**
 * Tests expected CodeQualityTool functionality
 *
 */
class CodeQualityToolTest extends \PHPUnit_Framework_TestCase
{
    private $projectDir;

    /**
     * Setup
     */
    public function setUp()
    {
        $this->projectDir = sprintf('%s/../Resources/project', __DIR__);
    }

    /**
     * Tests exception is being thrown when files have syntax errors
     *
     * @test
     * @expectedException        \Exception
     * @expectedExceptionMessage There are syntax errors!
     */
    public function testCheckSyntaxErrorsException()
    {
        $files = array(
            sprintf('%s/src/checker-files/file-with-syntax-error.php', $this->projectDir),
        );

        $tool = new CodeQualityTool($files, array(
            'excludeTests' => true,
            'projectDir' => $this->projectDir
        ));
        $tool->run();
    }

    /**
     * Tests exception is being thrown when files have coding standards issues
     *
     * @test
     * @expectedException        \Exception
     * @expectedExceptionMessage There are conding standard violations!
     */
    public function testCheckCodingStandardsException()
    {
        $files = array(
            sprintf('%s/src/checker-files/file-with-cs-issues.php', $this->projectDir)
        );

        $tool = new CodeQualityTool($files, array(
            'excludeTests' => true,
            'projectDir' => $this->projectDir
        ));
        $tool->run();
    }

    /**
     * Tests exception is being thrown when files have "controversial mess"
     *
     * @test
     * @expectedException        \Exception
     * @expectedExceptionMessage There are conding standard violations!
     */
    public function testCheckMessException()
    {
        $files = array(
            sprintf('%s/src/checker-files/file-with-mess.php', $this->projectDir),
        );

        $tool = new CodeQualityTool($files, array(
            'excludeTests' => true,
            'projectDir' => $this->projectDir
        ));
        $tool->run();
    }
}
