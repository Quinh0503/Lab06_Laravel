<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/home', function () {
    return "Chào mừng đến với Laravel";
});
Route::get('/about', function () {
    return "Họ tên: Nguyễn Văn A - Lớp: IT-Kxx - MSSV: 12345678";
});
// 3. Định nghĩa route /contact để gọi view
Route::get('/contact', function () {
    return view('contact');
});
//BAI 3
// 1. Route tính tổng: /tong/{a}/{b}
Route::get('/tong/{a}/{b}', function ($a, $b) {
    $tong = $a + $b;
    return "Tổng của $a và $b là: $tong";
});
// ->where([
//     'a'   => '(0?[1-9]|1[0])', // Số từ 1-31 (chấp nhận 01 hoặc 1)
//     'b' => '(0?[1-9]|1[0])',           // Số từ 1-12
                   
// ]);
// 2. Route thông tin sinh viên: /sinh-vien/{name}/{age?}
Route::get('/sinh_vien/{name}/{age?}', function ($name, $age = 20) {
    return "Sinh viên: $name - Tuổi: $age";
});
//BAI 4
// 1. Nhóm các route dành cho Admin
Route::prefix('admin')->group(function () {
    
    Route::get('/dashboard', function () {
        return "Chào mừng Admin";
    });

    Route::get('/users', function () {
        return "Danh sách người dùng";
    });
    
});
// 2. Route kiểm tra ngày tháng với ràng buộc Regex
Route::get('/check_date/{day}/{month}/{year}', function ($day, $month, $year) {
    return "Ngày tháng năm bạn nhập là: $day/$month/$year";
})->where([
    'day'   => '(0?[1-9]|[12][0-9]|3[0-1])', // Số từ 1-31 (chấp nhận 01 hoặc 1)
    'month' => '(0?[1-9]|1[0-2])',           // Số từ 1-12
    'year'  => '[0-9]{4}'                    // Đúng 4 chữ số
]);