<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // เรียกดูรายการหนังสือทั้งหมด
    public function index()
    {
        $booksdata = Book::all();
        return view('data', compact('booksdata'));
    }



    // เพิ่มหนังสือใหม่
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'pages' => 'required|integer|min:1',
        ]);
        // สร้างหนังสือใหม่จากข้อมูลที่ส่งมาจาก request
        // $book = Book::create($request->all());
        $book = Book::create($validatedData);

        // ส่งคืนข้อมูลหนังสือที่ถูกสร้างพร้อมกับรหัสสถานะ 201 Created
        // return response()->json($book, 201);
        return view('data')->with('success', 'Book created successfully!');
    }



    // เรียกดูรายละเอียดของหนังสือที่มี id ที่กำหนด
    public function show($id)
    {
        return Book::find($id);
    }


    //ดึงข้อมูล id ไปแสดงหน้า edit
    public function edit($id)
    {
        $booksdata = Book::find($id);
        return view('edit', compact('booksdata'));
    }

    // อัปเดตข้อมูลของหนังสือที่มี id ที่กำหนด
    public function update(Request $request, $id)
    {
        // ค้นหาหนังสือที่ต้องการอัปเดต
        $book = Book::findOrFail($id);

        // ตรวจสอบและ validate ข้อมูลที่ส่งมาจาก request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'pages' => 'required|integer|min:1',
        ]);

        // อัปเดตข้อมูลด้วยข้อมูลที่ส่งมาจาก request
        // $book->update($request->all());
        $book->update($validatedData);
        $booksdata = Book::all();

        // ส่งคืนข้อมูลหนังสือที่ถูกอัปเดตพร้อมกับรหัสสถานะ 200 OK
        // return response()->json($book, 200);
        return view('data', compact('booksdata'));
    }



    // ลบหนังสือที่มี id ที่กำหนด
    public function destroy($id)
    {
        // ลบหนังสือ
        Book::destroy($id);
        $booksdata = Book::all();
        // ส่งคืนการตอบกลับว่าไม่มีข้อมูล พร้อมกับรหัสสถานะ 204 No Content
        // return response()->json(null, 204);
        return view('data', compact('booksdata'));
    }
}
