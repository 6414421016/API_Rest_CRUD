<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function getData()
    {
        $url = 'https://jsonplaceholder.typicode.com/posts';
        $response = Http::get($url);
        //ใช้ Http ในการดึงข้อมูล และอื่นๆได้ (Post, Put)

        if ($response->successful()) {
            $data = $response->json();
            //ฟังก์ชัน json() ของ Laravel HTTP Client จะช่วยแปลงข้อมูล JSON 
            //ที่ได้รับจาก API ให้เป็น array หรือ associative array ที่ PHP สามารถใช้งานได้โดยตรง

            return view('pages.home', compact('data'));
        } else {
            return response()->json(['error' => 'Unnable to fetch data'], $response->status());
        }
    }


    public function getDataId($id)
    {
        $url = 'https://jsonplaceholder.typicode.com/posts/' . $id;
        //ใน PHP laravel จะใช้เครื่องหมาย . ในการเชื่อม string

        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();
            return view('pages.dataid', compact('data'));
        } else {
            return response()->json(['error' => 'Unnable to fetch data'], $response->status());
        }
    }


    //Edit Data
    public function edit($id)
    {
        // ดึงข้อมูลที่ต้องการแก้ไข
        $url = 'https://jsonplaceholder.typicode.com/posts/' . $id;
        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();
            return view('pages.edit', compact('data'));
        } else {
            return response()->json(['error' => 'Unnable to fetch data'], $response->status());
        }
    }

    //Update Data
    public function update(Request $request, $id)
    {
        // ตรวจสอบข้อมูลที่ส่งมา
        $validatedData = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        // อัพเดทข้อมูล โดยตรงไปยัง api ต้นทาง
        $url = 'https://jsonplaceholder.typicode.com/posts/' . $id;
        $response = Http::put($url, [
            'title' => $validatedData['title'],
            'body' => $validatedData['body'],
        ]);

        if ($response->successful()) {
            $dataResponse = Http::get('https://jsonplaceholder.typicode.com/posts');
            $data = $dataResponse->json();
            return view('pages.home', compact('data'));
        } else {
            return redirect()->back()->withErrors(['error' => 'Unable to update data']);
        }

        // อัปเดตข้อมูลที่ API แล้วเก็บค่าไว้ใน sesstion และดึงมาแสดง
        // $url = 'https://jsonplaceholder.typicode.com/posts/' . $id;
        // $response = Http::put($url, [
        //     'id' => $id,
        //     'title' => $validatedData['title'],
        //     'body' => $validatedData['body'],
        //     'userId' => 1 // หรือใช้ userId ที่ต้องการ
        // ]);

        // if ($response->successful()) {
        //     // จำลองการอัปเดตข้อมูลโดยใช้ session
        //     $posts = session()->get('posts', []);

        //     // อัปเดตข้อมูลใน session
        //     foreach ($posts as &$post) {
        //         if ($post['id'] == $id) {
        //             $post['title'] = $validatedData['title'];
        //             $post['body'] = $validatedData['body'];
        //             break;
        //         }
        //     }
        //     session()->put('posts', $posts);

        //     // ดึงข้อมูลใหม่ทั้งหมดจาก session
        //     $data = session()->get('posts', []);
        //     dd($data);
        //     return view('pages.home', compact('data'))->with('success', 'Data updated successfully');
        // } else {
        //     return redirect()->back()->withErrors(['error' => 'Unable to update data']);
        // }
    }
}
