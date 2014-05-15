<?php
/**
 * Clase para ejecutar todos los test
 */
class AllTests extends CakeTestSuite {
	
      protected $coverageSetup = false;

    /**
     * Suite define the tests for this suite
     *
     * @return $suite
     */
	public static function suite() {
		$suite = new self('All Tests');
        	$suite->addTestDirectoryRecursive( TESTS.'Case'.DS.'Controller' );
        	$suite->addTestDirectoryRecursive( TESTS.'Case'.DS.'Model' );
        	//$suite->addTestDirectoryRecursive( TESTS.'Case'.DS.'View');
		return $suite;
	}
	
	
	public function run(PHPUnit_Framework_TestResult $result = NULL, $filter = FALSE, array $groups = array(), array $excludeGroups = array(), $processIsolation = FALSE) {
		if ($result === NULL) {
			$result = $this->createResult();	
		}
		if (!$this->coverageSetup) {
			$coverage = $result->getCodeCoverage();
			if ($coverage) { // If the CodeCoverage is not installed or disabled
				$coverage->setProcessUncoveredFilesFromWhitelist(true);
			 
				$coverageFilter = $coverage->filter();
				$coverageFilter->addDirectoryToBlacklist( APP . DS . 'Test' );
				$coverageFilter->addDirectoryToBlacklist( APP . DS . 'Plugin' );
				$coverageFilter->addDirectoryToBlacklist( CORE_PATH );		
			}
			$this->coverageSetup = true;
		}
		return parent::run($result, $filter, $groups, $excludeGroups, $processIsolation);
	}
}
