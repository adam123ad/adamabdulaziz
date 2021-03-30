
<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	Class Fullcalendar extends CI_Model
	{

		//calender
		public function fetch_all_event(){
			$this->db->order_by('id');
			return $this->db->get('events');
		}
}