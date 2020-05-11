<?php

class View
{
	function createView($view, $data1 = null, $data2 = null, $data3 = null, $data4 = null, $data5 = null, $data6 = null) {
		include 'application/views/'.$view;
	}
}
