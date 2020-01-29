<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	
	public function index()
	{
		return $this->path(6789345, 3);
	}

	protected function path($id, $levels = 5)
	{
		$charsPerLevel = 2;
		$pad = $charsPerLevel * $levels;

		$path = str_pad($id, $pad, "0", STR_PAD_LEFT);
		$path = str_split($path, $charsPerLevel);
		$path = array_chunk($path, $levels)[0];
		$path = join(DIRECTORY_SEPARATOR, $path);

		return $path . DIRECTORY_SEPARATOR . $id;
	}
}
