<?php
class Authors_Model extends CI_Model
{
	public $_table = 'mc_content';
	
	public function getAuthors($id = 5, $pageNumber = 1, $itemCountPerPage = 2, $returnAll = false)
	{
		$kids = $this->db->where('page_type','page')->where('parent_id', $id)->order_by('sort, title asc')->get($this->_table);
		if($kids->num_rows() > 0)
		{
			$paginator = new Zend_Paginator(new Zend_Paginator_Adapter_Array($kids->result()));
			
			$paginator->setCurrentPageNumber($pageNumber);
			$paginator->setItemCountPerPage($itemCountPerPage);
			if($returnAll) {
				$total = $paginator->getTotalItemCount();
				$paginator->setItemCountPerPage($total);
			}
			return $paginator;
		}
		else {
			return false;
		}
		
		
	}
}