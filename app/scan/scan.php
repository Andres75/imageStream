<pre>
<?php
$ritit = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(SCAN_FOLDER), RecursiveIteratorIterator::CHILD_FIRST);
$r = array();
foreach ($ritit as $splFileInfo) {
   $path = $splFileInfo->isDir()
         ? array($splFileInfo->getFilename() => array())
         : array($splFileInfo->getFilename());

   for ($depth = $ritit->getDepth() - 1; $depth >= 0; $depth--) {
       $path = array($ritit->getSubIterator($depth)->current()->getFilename() => $path);
   }
   $r = array_merge_recursive($r, $path);
}
$rootArray = $r;

foreach ($rootArray as $rootArrayKey => $val){
	
	//echo $arrayElement;
	if (gettype($val) == "array"){
		
		echo "  [DIR] - ".$rootArrayKey."<br>";
		$subArrayCategory = $val;
		foreach ($subArrayCategory as $subArrayElement){
			
			echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$subArrayElement."<br>";
			
		}
		
	}
	//if (gettype($entity_name) == 'Array') echo "Array";
	
}
?>
</pre>