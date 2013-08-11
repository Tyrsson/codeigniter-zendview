<?php
if(count($paginator)) {
foreach($paginator as $author) {
	echo $author->title;
}
$control = new Zend_View_Helper_PaginationControl();
$view = new Zend_View();
$view->setScriptPath(APPPATH . 'views');

$control->setView($view);
$paginator->setView($view);
if($paginator->getTotalItemCount() > $paginator->getItemCountPerPage()) {
	echo $control->paginationControl($paginator, 'Sliding', 'my_pagination_control.php');
}
}