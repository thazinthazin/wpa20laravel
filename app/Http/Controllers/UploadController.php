<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UploadsManager;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UploadFileRequest;
use App\Http\Requests\UploadNewFolderRequest;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{
    //-- ALL FUNCTION COPY FROM LARAVEL-5.1 BEAUTY    --//

    protected $manager;
    public function __construct(UploadsManager $manager){
    	$this->manager = $manager;
    }
    //show page of files/subfolders
    public function index(Request $request){
    	$folder = $request->get('folder');
    	$data = $this->manager->folderInfo($folder);
    	return view('ecomm.admin.upload.index', $data);
    }
    
    //Create Folder
    public function createFolder(UploadNewFolderRequest $request){
        $new_folder=$request->get('new_folder');
        $folder=$request->get('folder') . '/' . $new_folder;
        $result=$this->manager->createDirectory($folder);
        if($result===true){
            return redirect()
            ->back()
            ->withSuccess("Folder '$new_folder' create.");
        }
        $error=$result ? : "An error occurred creating directory.";
        return redirect()
        ->back()
        ->withErrors([$error]);
    }

    // Delete File
    public function deleteFile(Request $request){
        $del_file=$request->get('del_file');
        $path=$request->get('folder') . '/' . $del_file;
        $result=$this->manager->deleteFile($path);
        if($result===true){
            return redirect()
            ->back()
            ->withSuccess("File '$del_file' deleted");
        }
        $error=$result ? : "An error occurred deleting file.";
        return redirect()
        ->back()
        ->withErrors([$error]);
    }

    // Delete Directory
    public function deleteFolder(Request $request){
        $del_folder=$request->get('del_folder');
        $folder=$request->get('folder') . '/' . $del_folder;
        $result=$this->manager->deleteDirectory($folder);
        if($result===true){
            return redirect()
            ->back()
            ->withSuccess("Folder '$del_folder' deleted.");
        }
        $error=$result ? : "An error occourred deleting directory.";
        return redirect()
        ->back()
        ->withErrors([$error]);
    }

    // Upload New File
    public function uploadFile(UploadFileRequest $request){
        $file=$_FILES['file'];
        $fileName=$request->get('file_name');
        $fileName=$fileName ?: $file['name'];
        $path=str_finish($request->get('folder'),'/') . $fileName;
        $content=File::get($file['tmp_name']);
        $result=$this->manager->saveFile($path, $content);
        if($result===true){
            return redirect()
            ->back()
            ->withSuccess("File '$fileName' uploaded.");
        }
        $error=$result ? : "An error occourred uploading file.";
        return redirect()
        ->back()
        ->withErrors([$error]);
    }

}
