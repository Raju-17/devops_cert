<?php
	
class websiteTest extends PHPUnit_Extension_Selenium2TestCase {
	public function setUp() {
		$this->setHost('localhost');
		$this->setPort('5100');
		$this->setBrowser('chrome');
		$this->setBrowserUrl('http://localhost:5100/devops_cert');
	}
	
	public function aboutPage() {
		$this->url('index.php');
		$this->onClick('About Us');
		
		$about = $this->byCssSelector(p)->text();
		$this->assertEquals("It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).",$about);
	}
}
