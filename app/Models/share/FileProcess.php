<?php

namespace App\Models\share;

use Illuminate\Database\Eloquent\Model;
use File,Image;

class FileProcess extends Model
{
    //儲存檔案
    static function saveFile($file,$path,$fileName){

    	try{
    		//放檔案
            $file->move('images/upload/'.$path, $fileName);
    	}catch(\Exception $e){
    		return false;
    	}

    	return true;
    }
    //重設圖片大小
    static function resizeImg($file,$path,$fileName,$width,$height){

		try{
			// open an image file
	    	$img = Image::make($file);
	    	// resize image instance
			$img->resize($width, $height, function ($constraint) {
			    $constraint->aspectRatio();
			});
			//save to public /images/upload
			$img->save('images/upload/'.$path.'/'.$fileName);

		}catch(\Exception $e){
            // print_r($e->getMessage());
            // exit;
			return false;
		}

		return true;  	

    }
    //刪除檔案
    static function deleteFile($fileName,$path){
    	try{
    		//刪除舊檔案
        	File::delete('images/upload/'.$path.'/'.$fileName);
    	}catch(\Exception $e){
            // print_r($e->getMessage());
            // exit;
    		return false;
    	}

    	return true;
    	
    }
    //建立檔案名稱
    static function createFileName($file){
    	
    	$ext = $file->getClientOriginalExtension();
        $fileName = date('Y_m_d_H_i_s').'_'.uniqid().'.'.$ext;

        return $fileName;
    }
    //儲存html editor 圖片
    static function saveEditorImg($detail,$folder){

        try{

            $dom = new \domdocument();
            @$dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getelementsbytagname('img');
     
            //loop over img elements, decode their base64 src and save them to public folder,
            //and then replace base64 src with stored image URL.
            foreach($images as $k => $img){
                $data = $img->getattribute('src');
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                $image_name= date('Y_m_d_H_i_s').'_'.uniqid().'.png';
                $path = public_path() .'/images/upload/'.$folder.'/'. $image_name;
                file_put_contents($path, $data);
                $img->removeattribute('src');
                $img->setattribute('src', '/images/upload/'.$folder.'/'.$image_name);
            }
            $detail = $dom->savehtml();

        }catch(\Exception $e){
            
            return false;
        }

        return $detail;
    }
    //更新html editor 圖片 已存在就略過
    static function updateEditorImg($detail,$folder){

        try{

            $dom = new \domdocument();
            @$dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getelementsbytagname('img');    
            //loop over img elements, decode their base64 src and save them to public folder,
            //and then replace base64 src with stored image URL.
            foreach($images as $k => $img){
                $data = $img->getattribute('src');
                if(substr($data,0,8) == "/images/"){
                    //原本就存在略過
                    continue;
                }else{
                    list($type, $data) = explode(';', $data);
                    list(, $data)      = explode(',', $data);
                    $data = base64_decode($data);
                    $image_name= date('Y_m_d_H_i_s').'_'.uniqid().'.png';
                    $path = public_path() .'/images/upload/'.$folder.'/'. $image_name;
                    file_put_contents($path, $data);
                    $img->removeattribute('src');
                    $img->setattribute('src', '/images/upload/'.$folder.'/'.$image_name);
                }

            }
            $detail = $dom->savehtml();

        }catch(\Exception $e){
            //debug
            // print_r($e->getMessage());
            // exit;
            return false;
        }

        return $detail;
    }
    //刪除html editor 圖片
    static function deleteEditorImg($detail,$folder){

        try{
            $dom = new \domdocument();
            @$dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            $images = $dom->getelementsbytagname('img');
            //loop over img elements, get img path and remove first / ,delete img file .
            foreach($images as $k => $img){
                $data = $img->getattribute('src');
                try{
                    //刪除檔案
                    File::delete(substr($data, 1));
                }catch(\exception $e){
                    // print_r($e->getMessage());
                    return false;
                }
            }

        }catch(\Exception $e){
            // print_r($e->getMessage());
            // exit;
            return false;
        }

        return true;
    }
    //多檔案儲存
    static function saveMultipleFiles($fileArray,$path){
        $result = [];
        foreach ($fileArray as $key => $value) {
            $file = self::saveFile($value,$path,$value->getClientOriginalName());
            if($file){
                $result[] = $value->getClientOriginalName();
            }else{
                return false;
            }
        }

        return $result;
    }
    //單檔案刪除
    static function deleteOneFile($file,$path){

        try{
            //刪除檔案
            File::delete('images/'.$path.'/'.$file);
        }catch(\exception $e){
            return false;
        }

        return true;
        
    }
    //多檔案刪除
    static function deleteMultipleFiles($fileArray,$path){

        foreach ($fileArray as $file) {
            $delete = self::deleteOneFile($file,$path);
            if(!$delete){
                return false;
            }
        }
        
        return true;
    }
}
