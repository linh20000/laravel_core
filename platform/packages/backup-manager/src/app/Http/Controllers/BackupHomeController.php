<?php

namespace Tungnt\BackupManager\app\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Exception;
use Tungnt\BackupManager\app\Jobs\BackupJob;
use Carbon\Carbon;
use League\Flysystem\Local\LocalFilesystemAdapter;
use Storage;
use App\Http\Requests;

class BackupHomeController extends Controller
{
    public function index() {
            $data['backups'] = [];
            $diskName = env('FILESYSTEM_DISK'); // local filesystem
            $disk = Storage::disk($diskName);
            $files = $disk->allFiles();

            // make an array of backup files, with their filesize and creation date
            foreach ($files as $file) {
                // remove diskname from filename
                $fileName = str_replace('backups/', '', $file);
                $downloadLink = route('backup.download', ['file_name' => $fileName, 'disk' => $diskName]);
                $deleteLink = route('backup.delete', ['file_name' => $fileName, 'disk' => $diskName]);
                $fileName = $file;

                // only take the zip files into account
                if (substr($file, -4) == '.zip' && $disk->exists($file)) {
                    $data['backups'][] = (object)[
                        'filePath' => $file,
                        'fileName' => $fileName,
                        'fileSize' => round((int)$disk->size($file) / 1048576, 2),
                        'lastModified' => Carbon::createFromTimeStamp($disk->lastModified($file))->formatLocalized('%d %B %Y, %H:%M'),
                        'diskName' => $diskName,
                        'downloadLink' => is_a($disk->getAdapter(), LocalFilesystemAdapter::class, true) ? $downloadLink : null,
                        'deleteLink' => $deleteLink,
                    ];
                }
            }

        return view('backup-manager-view::admin.backup-manager.index', compact('data'));
    }

    public function createBackup() {
        try {
            dispatch(new BackupJob());
            return Redirect::back()->with('success', 'Yêu cầu backup đang được tiến hành chạy ngầm!');
        } catch (Exception $e) {
            throw new Exception($e->getMessage);
        }
    }

    /**
     * Downloads a backup zip file.
     */
    public function download()
    {
        $diskName = \Request::input('disk');
        $fileName = \Request::input('file_name');
        $disk = Storage::disk($diskName);

        try {
            if (!$disk->exists($fileName)) {
                return Redirect::back()->with('error', 'Not found file name.!');
            }
            return $disk->download($fileName);
        } catch (\Exceptions $e) {
            throw new Exception($e->getMessage);
        }
    }

    /**
     * Deletes a backup file.
     */
    public function delete()
    {
        $diskName = \Request::input('disk');
        $fileName = \Request::input('file_name');

        try {
            $disk = Storage::disk($diskName);

            if (!$disk->exists($fileName)) {
                return Redirect::back()->with('error', 'Not found file name.!');
            }
            $disk->delete($fileName);
            return Redirect::back()->with('success', 'successfully!');

        } catch (\Exception $e) {
            throw new Exception($e->getMessage);
        }

    }

}
