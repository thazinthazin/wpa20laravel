<?php 
namespace App\Services;
use Carbon\Carbon;
//use Dflydev\ApacheMimeTypes\PhpRepository;
use Illuminate\Support\Facades\Storage;

class UploadsManager{
	protected $disk;
	protected $mimeDetect;

	//public function __construct(PhpRepository $mimeDetect)
	public function __construct()
	{
		$this->disk = Storage::disk(config('site.uploads.storage'));
		//$this->mimeDetect = $mimeDetect;
	}

	/*
	Return files and directions within a folder
	@param string $folder
	@return array of [
	'folder'=>'path to current folder',
	'folder name'=>'name of just current folder',
	'breadCrumbs'=>breadcrumb array of [$path=>$foldername]
	'folders'=>array of [$path=>$foldername] of each subfolder
	'files'=> array of file details on each file in folder
	]
	*/
	public function folderInfo($folder)
	{
		$folder=$this->cleanFolder($folder);
		$breadcrumbs=$this->breadcrumbs($folder);
		$slice=array_slice($breadcrumbs, -1);
		$folderName=current($slice);
		$breadcrumbs=array_slice($breadcrumbs, 0, -1);
		$subfolders=[];
		foreach (array_unique($this->disk->directories($folder)) as $subfolder) {
			$subfolders["/$subfolder"]=basename($subfolder);
			# code...
		}
		$files=[];
		foreach ($this->disk->files($folder) as $path) {
			$files[]=$this->fileDetails($path);
			# code...
		}
		return compact(
			'folder',
			'folderName',
			'breadcrumbs',
			'subfolders',
			'files'
			);
	}

	//sanitize the folder name
	
	protected function cleanFolder($folder)
	{
		return '/' . trim(str_replace('..', '', $folder), '/');
	}
	
	//return breadcrumbs to current folder

	protected function breadcrumbs($folder)
	{
		$folder=trim($folder, '/');
		$crumbs=['/'=>'root'];
		if(empty($folder)){
			return $crumbs;
		}
		$folders=explode('/', $folder);
		$build='';
		foreach ($folders as $folder) {
			$build .= '/'.$folder;
			$crumbs[$build]=$folder;
			# code...
		}
		return $crumbs;

	}

	//return an array of file details for a file

	protected function fileDetails($path)
	{
		$path='/' . ltrim($path, '/');
		return [
		'name'=>basename($path),
		'fullPath'=>$path,
		'webPath'=>$this->fileWebPath($path),
		//'mimeType'=>$this->fileMimeType($path),
		'size'=>$this->fileSize($path),
		'modified'=>$this->fileModified($path),
		];
	}
	public function fileWebPath($path)
	{
		$path=rtrim(config('site.uploads.webpath'), '/') . '/' . ltrim($path, '/');
		return url($path);
	}

	// public function fileMimeType($path)
	// {
	// 	return $this->mimeDetect->findType (
	// 		pathinfo($path, PATHINFO_EXTENSION)
	// 		);
	// }

	//return the file size

	public function fileSize($path)
	{
		return $this->disk->size($path);
	}

	//return the last modifield time

	public function fileModified($path)
	{
		return Carbon::createFromTimestamp(
			$this->disk->lastModified($path)
			);
	}

	//Create a new diectory

	public function createDirectory($folder){
		$folder=$this->cleanFolder($folder);
		if($this->disk->exists($folder)){
			return "Folder '$folder' already exits";
		}
		return $this->disk->makeDirectory($folder);
	}

	//Delete a directory

	public function deleteDirectory($folder){
		$folder=$this->cleanFolder($folder);
		$filesFolders=array_merge(
			$this->disk->directories($folder),
			$this->disk->files($folder)
			);
		if(!empty($filesFolders)){
			return "Directory must be empty to delete it.";
		}
		return $this->disk->deleteDirectory($folder);
	}

	//Delete a File

	public function deleteFile($path){
		$path=$this->cleanFolder($path);
		if(!$this->disk->exists($path)){
			return "File does not exist.";
		}
		return $this->disk->delete($path);
	}

	//Save a file

	public function saveFile($path, $content){
		$path=$this->cleanFolder($path);
		if($this->disk->exists($path)){
			return "File already exist.";
		}
		return $this->disk->put($path, $content);
	}

}


 ?>