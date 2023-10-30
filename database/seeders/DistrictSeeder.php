<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('district')->insert([
            [
                'pay_area_code' => 'B056001',
                'parent_code' => 'B056',
                'province' => 'B056',
                'name' => 'Quy Nhơn',
                'full_name' => 'Quy Nhơn Bình Định'
            ],
            [
                'pay_area_code' => 'B056002',
                'parent_code' => 'B056',
                'province' => 'B056',
                'name' => 'An Lão',
                'full_name' => 'An Lão Bình Định'
            ],
            [
                'pay_area_code' => 'B056003',
                'parent_code' => 'B056',
                'province' => 'B056',
                'name' => 'Hoài Nhơn',
                'full_name' => 'Hoài Nhơn Bình Định'
            ],
            [
                'pay_area_code' => 'B056004',
                'parent_code' => 'B056',
                'province' => 'B056',
                'name' => 'Hoài Ân',
                'full_name' => 'Hoài Ân Bình Định'
            ],
            [
                'pay_area_code' => 'B056005',
                'parent_code' => 'B056',
                'province' => 'B056',
                'name' => 'Phù Mỹ',
                'full_name' => 'Phù Mỹ Bình Định'
            ],
            [
                'pay_area_code' => 'B056006',
                'parent_code' => 'B056',
                'province' => 'B056',
                'name' => 'Vĩnh Thạnh',
                'full_name' => 'Vĩnh Thạnh Bình Định'
            ],
            [
                'pay_area_code' => 'B056007',
                'parent_code' => 'B056',
                'province' => 'B056',
                'name' => 'Phù Cát',
                'full_name' => 'Phù Cát Bình Định'
            ],
            [
                'pay_area_code' => 'B056008',
                'parent_code' => 'B056',
                'province' => 'B056',
                'name' => 'Tây Sơn',
                'full_name' => 'Tây Sơn Bình Định'
            ],
            [
                'pay_area_code' => 'B056009',
                'parent_code' => 'B056',
                'province' => 'B056',
                'name' => 'An Nhơn',
                'full_name' => 'An Nhơn Bình Định'
            ],
            [
                'pay_area_code' => 'B056010',
                'parent_code' => 'B056',
                'province' => 'B056',
                'name' => 'Tuy Phước',
                'full_name' => 'Tuy Phước Bình Định'
            ],
            [
                'pay_area_code' => 'B056011',
                'parent_code' => 'B056',
                'province' => 'B056',
                'name' => 'Vân Canh',
                'full_name' => 'Vân Canh Bình Định'
            ],
            [
                'pay_area_code' => 'K060001',
                'parent_code' => 'K060',
                'province' => 'K060',
                'name' => 'Kon Tum',
                'full_name' => 'Kon Tum Kon Tum'
            ],
            [
                'pay_area_code' => 'K060002',
                'parent_code' => 'K060',
                'province' => 'K060',
                'name' => 'Đắk Glei',
                'full_name' => 'Đắk Glei Kon Tum'
            ],
            [
                'pay_area_code' => 'K060003',
                'parent_code' => 'K060',
                'province' => 'K060',
                'name' => 'Ngọc Hồi',
                'full_name' => 'Ngọc Hồi Kon Tum'
            ],
            [
                'pay_area_code' => 'K060004',
                'parent_code' => 'K060',
                'province' => 'K060',
                'name' => 'Đắk Tô',
                'full_name' => 'Đắk Tô Kon Tum'
            ],
            [
                'pay_area_code' => 'K060005',
                'parent_code' => 'K060',
                'province' => 'K060',
                'name' => 'Kon Plông',
                'full_name' => 'Kon Plông Kon Tum'
            ],
            [
                'pay_area_code' => 'K060006',
                'parent_code' => 'K060',
                'province' => 'K060',
                'name' => 'Đắk Hà',
                'full_name' => 'Đắk Hà Kon Tum'
            ],
            [
                'pay_area_code' => 'K060007',
                'parent_code' => 'K060',
                'province' => 'K060',
                'name' => 'Sa Thầy',
                'full_name' => 'Sa Thầy Kon Tum'
            ],
            [
                'pay_area_code' => 'G059001',
                'parent_code' => 'G059',
                'province' => 'G059',
                'name' => 'Pleiku',
                'full_name' => 'Pleiku Gia Lai'
            ],
            [
                'pay_area_code' => 'G059002',
                'parent_code' => 'G059',
                'province' => 'G059',
                'name' => 'Kbang',
                'full_name' => 'Kbang Gia Lai'
            ],
            [
                'pay_area_code' => 'G059003',
                'parent_code' => 'G059',
                'province' => 'G059',
                'name' => 'Đăk Đoa',
                'full_name' => 'Đăk Đoa Gia Lai'
            ],
            [
                'pay_area_code' => 'G059004',
                'parent_code' => 'G059',
                'province' => 'G059',
                'name' => 'Mang Yang',
                'full_name' => 'Mang Yang Gia Lai'
            ],
            [
                'pay_area_code' => 'G059005',
                'parent_code' => 'G059',
                'province' => 'G059',
                'name' => 'Chư Păh',
                'full_name' => 'Chư Păh Gia Lai'
            ],
            [
                'pay_area_code' => 'G059006',
                'parent_code' => 'G059',
                'province' => 'G059',
                'name' => 'Ia Grai',
                'full_name' => 'Ia Grai Gia Lai'
            ],
            [
                'pay_area_code' => 'G059007',
                'parent_code' => 'G059',
                'province' => 'G059',
                'name' => 'An Khê',
                'full_name' => 'An Khê Gia Lai'
            ],
            [
                'pay_area_code' => 'G059008',
                'parent_code' => 'G059',
                'province' => 'G059',
                'name' => 'Kông Chro',
                'full_name' => 'Kông Chro Gia Lai'
            ],
            [
                'pay_area_code' => 'G059010',
                'parent_code' => 'G059',
                'province' => 'G059',
                'name' => 'Chư Prông',
                'full_name' => 'Chư Prông Gia Lai'
            ],
            [
                'pay_area_code' => 'G059011',
                'parent_code' => 'G059',
                'province' => 'G059',
                'name' => 'Chư Sê',
                'full_name' => 'Chư Sê Gia Lai'
            ],
            [
                'pay_area_code' => 'G059012',
                'parent_code' => 'G059',
                'province' => 'G059',
                'name' => 'Ayun Pa',
                'full_name' => 'Ayun Pa Gia Lai'
            ],
            [
                'pay_area_code' => 'G059013',
                'parent_code' => 'G059',
                'province' => 'G059',
                'name' => 'Krông Pa',
                'full_name' => 'Krông Pa Gia Lai'
            ],
            [
                'pay_area_code' => 'D500001',
                'parent_code' => 'D500',
                'province' => 'D500',
                'name' => 'Buôn Ma Thuột',
                'full_name' => 'Buôn Ma Thuột Đắc Lắc'
            ],
            [
                'pay_area_code' => 'D500003',
                'parent_code' => 'D500',
                'province' => 'D500',
                'name' => 'Ea Súp',
                'full_name' => 'Ea Súp Đắc Lắc'
            ],
            [
                'pay_area_code' => 'D500004',
                'parent_code' => 'D500',
                'province' => 'D500',
                'name' => 'Krông Năng',
                'full_name' => 'Krông Năng Đắc Lắc'
            ],
            [
                'pay_area_code' => 'D500005',
                'parent_code' => 'D500',
                'province' => 'D500',
                'name' => 'Krông Búk',
                'full_name' => 'Krông Búk Đắc Lắc'
            ],
            [
                'pay_area_code' => 'D500006',
                'parent_code' => 'D500',
                'province' => 'D500',
                'name' => 'Buôn Đôn',
                'full_name' => 'Buôn Đôn Đắc Lắc'
            ],
            [
                'pay_area_code' => 'D500007',
                'parent_code' => 'D500',
                'province' => 'D500',
                'name' => 'Cư Mgar',
                'full_name' => 'Cư Mgar Đắc Lắc'
            ],
            [
                'pay_area_code' => 'D500008',
                'parent_code' => 'D500',
                'province' => 'D500',
                'name' => 'Ea Kar',
                'full_name' => 'Ea Kar Đắc Lắc'
            ],
            [
                'pay_area_code' => 'L072006',
                'parent_code' => 'L072',
                'province' => 'L072',
                'name' => 'Cần Giuộc',
                'full_name' => 'Cần Giuộc Long An'
            ],
            [
                'pay_area_code' => 'L020004',
                'parent_code' => 'L020',
                'province' => 'L020',
                'name' => 'Bát Xát',
                'full_name' => 'Bát Xát Lào Cai'
            ],
            [
                'pay_area_code' => 'H031001',
                'parent_code' => 'H031',
                'province' => 'H031',
                'name' => 'Hồng Bàng',
                'full_name' => 'Hồng Bàng Hải Phòng'
            ],
            [
                'pay_area_code' => 'H031002',
                'parent_code' => 'H031',
                'province' => 'H031',
                'name' => 'Ngô Quyền',
                'full_name' => 'Ngô Quyền Hải Phòng'
            ],
            [
                'pay_area_code' => 'H031003',
                'parent_code' => 'H031',
                'province' => 'H031',
                'name' => 'Lê Chân',
                'full_name' => 'Lê Chân Hải Phòng'
            ],
            [
                'pay_area_code' => 'H031004',
                'parent_code' => 'H031',
                'province' => 'H031',
                'name' => 'Kiến An',
                'full_name' => 'Kiến An Hải Phòng'
            ],
            [
                'pay_area_code' => 'H031005',
                'parent_code' => 'H031',
                'province' => 'H031',
                'name' => 'Hải An',
                'full_name' => 'Hải An Hải Phòng'
            ],
            [
                'pay_area_code' => 'H031006',
                'parent_code' => 'H031',
                'province' => 'H031',
                'name' => 'Đồ Sơn',
                'full_name' => 'Đồ Sơn Hải Phòng'
            ],
            [
                'pay_area_code' => 'H031007',
                'parent_code' => 'H031',
                'province' => 'H031',
                'name' => 'Thủy Nguyên',
                'full_name' => 'Thủy Nguyên Hải Phòng'
            ],
            [
                'pay_area_code' => 'H031008',
                'parent_code' => 'H031',
                'province' => 'H031',
                'name' => 'An Dương',
                'full_name' => 'An Dương Hải Phòng'
            ],
            [
                'pay_area_code' => 'H031009',
                'parent_code' => 'H031',
                'province' => 'H031',
                'name' => 'An Lão',
                'full_name' => 'An Lão Hải Phòng'
            ],
            [
                'pay_area_code' => 'H031010',
                'parent_code' => 'H031',
                'province' => 'H031',
                'name' => 'Kiến Thụy',
                'full_name' => 'Kiến Thụy Hải Phòng'
            ],
            [
                'pay_area_code' => 'H031011',
                'parent_code' => 'H031',
                'province' => 'H031',
                'name' => 'Tiên Lãng',
                'full_name' => 'Tiên Lãng Hải Phòng'
            ],
            [
                'pay_area_code' => 'H031012',
                'parent_code' => 'H031',
                'province' => 'H031',
                'name' => 'Vĩnh Bảo',
                'full_name' => 'Vĩnh Bảo Hải Phòng'
            ],
            [
                'pay_area_code' => 'H031013',
                'parent_code' => 'H031',
                'province' => 'H031',
                'name' => 'Cát Hải',
                'full_name' => 'Cát Hải Hải Phòng'
            ],
            [
                'pay_area_code' => 'H031014',
                'parent_code' => 'H031',
                'province' => 'H031',
                'name' => 'Bạch Long Vĩ',
                'full_name' => 'Bạch Long Vĩ Hải Phòng'
            ],
            [
                'pay_area_code' => 'H320001',
                'parent_code' => 'H320',
                'province' => 'H320',
                'name' => 'Hải Dương',
                'full_name' => 'Hải Dương Hải Dương'
            ],
            [
                'pay_area_code' => 'H320002',
                'parent_code' => 'H320',
                'province' => 'H320',
                'name' => 'Chí Linh',
                'full_name' => 'Chí Linh Hải Dương'
            ],
            [
                'pay_area_code' => 'H320003',
                'parent_code' => 'H320',
                'province' => 'H320',
                'name' => 'Nam Sách',
                'full_name' => 'Nam Sách Hải Dương'
            ],
            [
                'pay_area_code' => 'H320004',
                'parent_code' => 'H320',
                'province' => 'H320',
                'name' => 'Thanh Hà',
                'full_name' => 'Thanh Hà Hải Dương'
            ],
            [
                'pay_area_code' => 'H320005',
                'parent_code' => 'H320',
                'province' => 'H320',
                'name' => 'Kinh Môn',
                'full_name' => 'Kinh Môn Hải Dương'
            ],
            [
                'pay_area_code' => 'H320006',
                'parent_code' => 'H320',
                'province' => 'H320',
                'name' => 'Kim Thành',
                'full_name' => 'Kim Thành Hải Dương'
            ],
            [
                'pay_area_code' => 'H320007',
                'parent_code' => 'H320',
                'province' => 'H320',
                'name' => 'Gia Lộc',
                'full_name' => 'Gia Lộc Hải Dương'
            ],
            [
                'pay_area_code' => 'H320008',
                'parent_code' => 'H320',
                'province' => 'H320',
                'name' => 'Tứ Kỳ',
                'full_name' => 'Tứ Kỳ Hải Dương'
            ],
            [
                'pay_area_code' => 'H320009',
                'parent_code' => 'H320',
                'province' => 'H320',
                'name' => 'Cẩm Giàng',
                'full_name' => 'Cẩm Giàng Hải Dương'
            ],
            [
                'pay_area_code' => 'H320010',
                'parent_code' => 'H320',
                'province' => 'H320',
                'name' => 'Bình Giang',
                'full_name' => 'Bình Giang Hải Dương'
            ],
            [
                'pay_area_code' => 'H320011',
                'parent_code' => 'H320',
                'province' => 'H320',
                'name' => 'Thanh Miện',
                'full_name' => 'Thanh Miện Hải Dương'
            ],
            [
                'pay_area_code' => 'H320012',
                'parent_code' => 'H320',
                'province' => 'H320',
                'name' => 'Ninh Giang',
                'full_name' => 'Ninh Giang Hải Dương'
            ],
            [
                'pay_area_code' => 'H321002',
                'parent_code' => 'H321',
                'province' => 'H321',
                'name' => 'Văn Lâm',
                'full_name' => 'Văn Lâm Hưng Yên'
            ],
            [
                'pay_area_code' => 'H321003',
                'parent_code' => 'H321',
                'province' => 'H321',
                'name' => 'Mỹ Hào',
                'full_name' => 'Mỹ Hào Hưng Yên'
            ],
            [
                'pay_area_code' => 'H321004',
                'parent_code' => 'H321',
                'province' => 'H321',
                'name' => 'Yên Mỹ',
                'full_name' => 'Yên Mỹ Hưng Yên'
            ],
            [
                'pay_area_code' => 'H321005',
                'parent_code' => 'H321',
                'province' => 'H321',
                'name' => 'Văn Giang',
                'full_name' => 'Văn Giang Hưng Yên'
            ],
            [
                'pay_area_code' => 'H321006',
                'parent_code' => 'H321',
                'province' => 'H321',
                'name' => 'Khoái Châu',
                'full_name' => 'Khoái Châu Hưng Yên'
            ],
            [
                'pay_area_code' => 'H321008',
                'parent_code' => 'H321',
                'province' => 'H321',
                'name' => 'Kim Động',
                'full_name' => 'Kim Động Hưng Yên'
            ],
            [
                'pay_area_code' => 'H321009',
                'parent_code' => 'H321',
                'province' => 'H321',
                'name' => 'Phù Cừ',
                'full_name' => 'Phù Cừ Hưng Yên'
            ],
            [
                'pay_area_code' => 'H321010',
                'parent_code' => 'H321',
                'province' => 'H321',
                'name' => 'Tiên Lữ',
                'full_name' => 'Tiên Lữ Hưng Yên'
            ],
            [
                'pay_area_code' => 'T036001',
                'parent_code' => 'T036',
                'province' => 'T036',
                'name' => 'Thái Bình',
                'full_name' => 'Thái Bình Thái Bình'
            ],
            [
                'pay_area_code' => 'T036002',
                'parent_code' => 'T036',
                'province' => 'T036',
                'name' => 'Quỳnh Phụ',
                'full_name' => 'Quỳnh Phụ Thái Bình'
            ],
            [
                'pay_area_code' => 'T036003',
                'parent_code' => 'T036',
                'province' => 'T036',
                'name' => 'Hưng Hà',
                'full_name' => 'Hưng Hà Thái Bình'
            ],
            [
                'pay_area_code' => 'T036004',
                'parent_code' => 'T036',
                'province' => 'T036',
                'name' => 'Thái Thụy',
                'full_name' => 'Thái Thụy Thái Bình'
            ],
            [
                'pay_area_code' => 'T036005',
                'parent_code' => 'T036',
                'province' => 'T036',
                'name' => 'Đông Hưng',
                'full_name' => 'Đông Hưng Thái Bình'
            ],
            [
                'pay_area_code' => 'T036006',
                'parent_code' => 'T036',
                'province' => 'T036',
                'name' => 'Vũ Thư',
                'full_name' => 'Vũ Thư Thái Bình'
            ],
            [
                'pay_area_code' => 'T036007',
                'parent_code' => 'T036',
                'province' => 'T036',
                'name' => 'Kiến Xương',
                'full_name' => 'Kiến Xương Thái Bình'
            ],
            [
                'pay_area_code' => 'T036008',
                'parent_code' => 'T036',
                'province' => 'T036',
                'name' => 'Tiền Hải',
                'full_name' => 'Tiền Hải Thái Bình'
            ],
            [
                'pay_area_code' => 'N351002',
                'parent_code' => 'N351',
                'province' => 'N351',
                'name' => 'Duy Tiên',
                'full_name' => 'Duy Tiên Hà Nam'
            ],
            [
                'pay_area_code' => 'N351003',
                'parent_code' => 'N351',
                'province' => 'N351',
                'name' => 'Kim Bảng',
                'full_name' => 'Kim Bảng Hà Nam'
            ],
            [
                'pay_area_code' => 'N351004',
                'parent_code' => 'N351',
                'province' => 'N351',
                'name' => 'Lý Nhân',
                'full_name' => 'Lý Nhân Hà Nam'
            ],
            [
                'pay_area_code' => 'N351005',
                'parent_code' => 'N351',
                'province' => 'N351',
                'name' => 'Thanh Liêm',
                'full_name' => 'Thanh Liêm Hà Nam'
            ],
            [
                'pay_area_code' => 'N351006',
                'parent_code' => 'N351',
                'province' => 'N351',
                'name' => 'Bình Lục',
                'full_name' => 'Bình Lục Hà Nam'
            ],
            [
                'pay_area_code' => 'N030001',
                'parent_code' => 'N030',
                'province' => 'N030',
                'name' => 'Ninh Bình',
                'full_name' => 'Ninh Bình Ninh Bình'
            ],
            [
                'pay_area_code' => 'N030002',
                'parent_code' => 'N030',
                'province' => 'N030',
                'name' => 'Tam Điệp',
                'full_name' => 'Tam Điệp Ninh Bình'
            ],
            [
                'pay_area_code' => 'N030003',
                'parent_code' => 'N030',
                'province' => 'N030',
                'name' => 'Nho Quan',
                'full_name' => 'Nho Quan Ninh Bình'
            ],
            [
                'pay_area_code' => 'N030004',
                'parent_code' => 'N030',
                'province' => 'N030',
                'name' => 'Gia Viễn',
                'full_name' => 'Gia Viễn Ninh Bình'
            ],
            [
                'pay_area_code' => 'N030006',
                'parent_code' => 'N030',
                'province' => 'N030',
                'name' => 'Yên Mô',
                'full_name' => 'Yên Mô Ninh Bình'
            ],
            [
                'pay_area_code' => 'N030008',
                'parent_code' => 'N030',
                'province' => 'N030',
                'name' => 'Kim Sơn',
                'full_name' => 'Kim Sơn Ninh Bình'
            ],
            [
                'pay_area_code' => 'N350001',
                'parent_code' => 'N350',
                'province' => 'N350',
                'name' => 'Nam Định',
                'full_name' => 'Nam Định Nam Định'
            ],
            [
                'pay_area_code' => 'N350002',
                'parent_code' => 'N350',
                'province' => 'N350',
                'name' => 'Vụ Bản',
                'full_name' => 'Vụ Bản Nam Định'
            ],
            [
                'pay_area_code' => 'N350003',
                'parent_code' => 'N350',
                'province' => 'N350',
                'name' => 'Mỹ Lộc',
                'full_name' => 'Mỹ Lộc Nam Định'
            ],
            [
                'pay_area_code' => 'N350004',
                'parent_code' => 'N350',
                'province' => 'N350',
                'name' => 'Ý Yên',
                'full_name' => 'Ý Yên Nam Định'
            ],
            [
                'pay_area_code' => 'N350005',
                'parent_code' => 'N350',
                'province' => 'N350',
                'name' => 'Nam Trực',
                'full_name' => 'Nam Trực Nam Định'
            ],
            [
                'pay_area_code' => 'N350006',
                'parent_code' => 'N350',
                'province' => 'N350',
                'name' => 'Trực Ninh',
                'full_name' => 'Trực Ninh Nam Định'
            ],
            [
                'pay_area_code' => 'N350007',
                'parent_code' => 'N350',
                'province' => 'N350',
                'name' => 'Xuân Trường',
                'full_name' => 'Xuân Trường Nam Định'
            ],
            [
                'pay_area_code' => 'N350008',
                'parent_code' => 'N350',
                'province' => 'N350',
                'name' => 'Giao Thủy',
                'full_name' => 'Giao Thủy Nam Định'
            ],
            [
                'pay_area_code' => 'N350009',
                'parent_code' => 'N350',
                'province' => 'N350',
                'name' => 'Nghĩa Hưng',
                'full_name' => 'Nghĩa Hưng Nam Định'
            ],
            [
                'pay_area_code' => 'N350010',
                'parent_code' => 'N350',
                'province' => 'N350',
                'name' => 'Hải Hậu',
                'full_name' => 'Hải Hậu Nam Định'
            ],
            [
                'pay_area_code' => 'H019001',
                'parent_code' => 'H019',
                'province' => 'H019',
                'name' => 'Hà Giang',
                'full_name' => 'Hà Giang Hà Giang'
            ],
            [
                'pay_area_code' => 'H019003',
                'parent_code' => 'H019',
                'province' => 'H019',
                'name' => 'Mèo Vạc',
                'full_name' => 'Mèo Vạc Hà Giang'
            ],
            [
                'pay_area_code' => 'H019004',
                'parent_code' => 'H019',
                'province' => 'H019',
                'name' => 'Yên Minh',
                'full_name' => 'Yên Minh Hà Giang'
            ],
            [
                'pay_area_code' => 'H019005',
                'parent_code' => 'H019',
                'province' => 'H019',
                'name' => 'Quản Bạ',
                'full_name' => 'Quản Bạ Hà Giang'
            ],
            [
                'pay_area_code' => 'H019006',
                'parent_code' => 'H019',
                'province' => 'H019',
                'name' => 'Bắc Mê',
                'full_name' => 'Bắc Mê Hà Giang'
            ],
            [
                'pay_area_code' => 'H019007',
                'parent_code' => 'H019',
                'province' => 'H019',
                'name' => 'Hoàng Su Phì',
                'full_name' => 'Hoàng Su Phì Hà Giang'
            ],
            [
                'pay_area_code' => 'H019008',
                'parent_code' => 'H019',
                'province' => 'H019',
                'name' => 'Vị Xuyên',
                'full_name' => 'Vị Xuyên Hà Giang'
            ],
            [
                'pay_area_code' => 'H019010',
                'parent_code' => 'H019',
                'province' => 'H019',
                'name' => 'Bắc Quang',
                'full_name' => 'Bắc Quang Hà Giang'
            ],
            [
                'pay_area_code' => 'C026001',
                'parent_code' => 'C026',
                'province' => 'C026',
                'name' => 'Cao Bằng',
                'full_name' => 'Cao Bằng Cao Bằng'
            ],
            [
                'pay_area_code' => 'C026002',
                'parent_code' => 'C026',
                'province' => 'C026',
                'name' => 'Bảo Lạc',
                'full_name' => 'Bảo Lạc Cao Bằng'
            ],
            [
                'pay_area_code' => 'C026003',
                'parent_code' => 'C026',
                'province' => 'C026',
                'name' => 'Bảo Lâm',
                'full_name' => 'Bảo Lâm Cao Bằng'
            ],
            [
                'pay_area_code' => 'C026004',
                'parent_code' => 'C026',
                'province' => 'C026',
                'name' => 'Hà Quảng',
                'full_name' => 'Hà Quảng Cao Bằng'
            ],
            [
                'pay_area_code' => 'C026005',
                'parent_code' => 'C026',
                'province' => 'C026',
                'name' => 'Thông Nông',
                'full_name' => 'Thông Nông Cao Bằng'
            ],
            [
                'pay_area_code' => 'C026006',
                'parent_code' => 'C026',
                'province' => 'C026',
                'name' => 'Trà Lĩnh',
                'full_name' => 'Trà Lĩnh Cao Bằng'
            ],
            [
                'pay_area_code' => 'C026007',
                'parent_code' => 'C026',
                'province' => 'C026',
                'name' => 'Trùng Khánh',
                'full_name' => 'Trùng Khánh Cao Bằng'
            ],
            [
                'pay_area_code' => 'C026008',
                'parent_code' => 'C026',
                'province' => 'C026',
                'name' => 'Nguyên Bình',
                'full_name' => 'Nguyên Bình Cao Bằng'
            ],
            [
                'pay_area_code' => 'C026009',
                'parent_code' => 'C026',
                'province' => 'C026',
                'name' => 'Hòa An',
                'full_name' => 'Hòa An Cao Bằng'
            ],
            [
                'pay_area_code' => 'C026011',
                'parent_code' => 'C026',
                'province' => 'C026',
                'name' => 'Hạ Lang',
                'full_name' => 'Hạ Lang Cao Bằng'
            ],
            [
                'pay_area_code' => 'C026012',
                'parent_code' => 'C026',
                'province' => 'C026',
                'name' => 'Thạch An',
                'full_name' => 'Thạch An Cao Bằng'
            ],
            [
                'pay_area_code' => 'L025001',
                'parent_code' => 'L025',
                'province' => 'L025',
                'name' => 'Lạng Sơn',
                'full_name' => 'Lạng Sơn Lạng Sơn'
            ],
            [
                'pay_area_code' => 'L025002',
                'parent_code' => 'L025',
                'province' => 'L025',
                'name' => 'Tràng Định',
                'full_name' => 'Tràng Định Lạng Sơn'
            ],
            [
                'pay_area_code' => 'L025003',
                'parent_code' => 'L025',
                'province' => 'L025',
                'name' => 'Văn Lãng',
                'full_name' => 'Văn Lãng Lạng Sơn'
            ],
            [
                'pay_area_code' => 'L025004',
                'parent_code' => 'L025',
                'province' => 'L025',
                'name' => 'Bình Gia',
                'full_name' => 'Bình Gia Lạng Sơn'
            ],
            [
                'pay_area_code' => 'L025005',
                'parent_code' => 'L025',
                'province' => 'L025',
                'name' => 'Bắc Sơn',
                'full_name' => 'Bắc Sơn Lạng Sơn'
            ],
            [
                'pay_area_code' => 'L025006',
                'parent_code' => 'L025',
                'province' => 'L025',
                'name' => 'Văn Quan',
                'full_name' => 'Văn Quan Lạng Sơn'
            ],
            [
                'pay_area_code' => 'L025007',
                'parent_code' => 'L025',
                'province' => 'N038',
                'name' => 'Diễn Châu',
                'full_name' => 'Diễn Châu Nghệ An'
            ],
            [
                'pay_area_code' => 'N038015',
                'parent_code' => 'N038',
                'province' => 'N038',
                'name' => 'Đô Lương',
                'full_name' => 'Đô Lương Nghệ An'
            ],
            [
                'pay_area_code' => 'N038016',
                'parent_code' => 'N038',
                'province' => 'N038',
                'name' => 'Thanh Chương',
                'full_name' => 'Thanh Chương Nghệ An'
            ],
            [
                'pay_area_code' => 'N038017',
                'parent_code' => 'N038',
                'province' => 'N038',
                'name' => 'Nghi Lộc',
                'full_name' => 'Nghi Lộc Nghệ An'
            ],
            [
                'pay_area_code' => 'N038018',
                'parent_code' => 'N038',
                'province' => 'N038',
                'name' => 'Nam Đàn',
                'full_name' => 'Nam Đàn Nghệ An'
            ],
            [
                'pay_area_code' => 'N038019',
                'parent_code' => 'N038',
                'province' => 'N038',
                'name' => 'Hưng Nguyên',
                'full_name' => 'Hưng Nguyên Nghệ An'
            ],
            [
                'pay_area_code' => 'Q053001',
                'parent_code' => 'Q053',
                'province' => 'Q053',
                'name' => 'Đông Hà',
                'full_name' => 'Đông Hà Quảng Trị'
            ],
            [
                'pay_area_code' => 'Q053002',
                'parent_code' => 'Q053',
                'province' => 'Q053',
                'name' => 'Quảng Trị',
                'full_name' => 'Quảng Trị Quảng Trị'
            ],
            [
                'pay_area_code' => 'Q053003',
                'parent_code' => 'Q053',
                'province' => 'Q053',
                'name' => 'Vĩnh Linh',
                'full_name' => 'Vĩnh Linh Quảng Trị'
            ],
            [
                'pay_area_code' => 'Q053004',
                'parent_code' => 'Q053',
                'province' => 'Q053',
                'name' => 'Gio Linh',
                'full_name' => 'Gio Linh Quảng Trị'
            ],
            [
                'pay_area_code' => 'Q053005',
                'parent_code' => 'Q053',
                'province' => 'H711',
                'name' => 'Châu Thành',
                'full_name' => 'Châu Thành Hậu Giang'
            ],
            [
                'pay_area_code' => 'H711004',
                'parent_code' => 'H711',
                'province' => 'H711',
                'name' => 'Phụng Hiệp',
                'full_name' => 'Phụng Hiệp Hậu Giang'
            ],
            [
                'pay_area_code' => 'H711005',
                'parent_code' => 'H711',
                'province' => 'H711',
                'name' => 'Vị Thủy',
                'full_name' => 'Vị Thủy Hậu Giang'
            ],
            [
                'pay_area_code' => 'H711006',
                'parent_code' => 'H711',
                'province' => 'H711',
                'name' => 'Long Mỹ',
                'full_name' => 'Long Mỹ Hậu Giang'
            ],
            [
                'pay_area_code' => 'B075001',
                'parent_code' => 'B075',
                'province' => 'B075',
                'name' => 'Bến Tre',
                'full_name' => 'Bến Tre Bến Tre'
            ],
            [
                'pay_area_code' => 'B075002',
                'parent_code' => 'B075',
                'province' => 'B075',
                'name' => 'Châu Thành',
                'full_name' => 'Châu Thành Bến Tre'
            ],
            [
                'pay_area_code' => 'B075003',
                'parent_code' => 'B075',
                'province' => 'B075',
                'name' => 'Chợ Lách',
                'full_name' => 'Chợ Lách Bến Tre'
            ],
            [
                'pay_area_code' => 'B075005',
                'parent_code' => 'B075',
                'province' => 'B075',
                'name' => 'Giồng Trôm',
                'full_name' => 'Giồng Trôm Bến Tre'
            ],
            [
                'pay_area_code' => 'B075006',
                'parent_code' => 'B075',
                'province' => 'B075',
                'name' => 'Bình Đại',
                'full_name' => 'Bình Đại Bến Tre'
            ],
            [
                'pay_area_code' => 'B075007',
                'parent_code' => 'B075',
                'province' => 'B075',
                'name' => 'Ba Tri',
                'full_name' => 'Ba Tri Bến Tre'
            ],
            [
                'pay_area_code' => 'T074001',
                'parent_code' => 'T074',
                'province' => 'T074',
                'name' => 'Trà Vinh',
                'full_name' => 'Trà Vinh Trà Vinh'
            ],
            [
                'pay_area_code' => 'T074002',
                'parent_code' => 'T074',
                'province' => 'T074',
                'name' => 'Càng Long',
                'full_name' => 'Càng Long Trà Vinh'
            ],
            [
                'pay_area_code' => 'T074003',
                'parent_code' => 'T074',
                'province' => 'T074',
                'name' => 'Châu Thành',
                'full_name' => 'Châu Thành Trà Vinh'
            ],
            [
                'pay_area_code' => 'T074005',
                'parent_code' => 'T074',
                'province' => 'T074',
                'name' => 'Tiểu Cần',
                'full_name' => 'Tiểu Cần Trà Vinh'
            ],
            [
                'pay_area_code' => 'T074006',
                'parent_code' => 'T074',
                'province' => 'T074',
                'name' => 'Cầu Ngang',
                'full_name' => 'Cầu Ngang Trà Vinh'
            ],
            [
                'pay_area_code' => 'T074007',
                'parent_code' => 'T074',
                'province' => 'T074',
                'name' => 'Trà Cú',
                'full_name' => 'Trà Cú Trà Vinh'
            ],
            [
                'pay_area_code' => 'K077001',
                'parent_code' => 'K077',
                'province' => 'K077',
                'name' => 'Rạch Giá',
                'full_name' => 'Rạch Giá Kiên Giang'
            ],
            [
                'pay_area_code' => 'K077002',
                'parent_code' => 'K077',
                'province' => 'K077',
                'name' => 'Hà Tiên',
                'full_name' => 'Hà Tiên Kiên Giang'
            ],
            [
                'pay_area_code' => 'K077003',
                'parent_code' => 'K077',
                'province' => 'K077',
                'name' => 'Kiên Lương',
                'full_name' => 'Kiên Lương Kiên Giang'
            ],
            [
                'pay_area_code' => 'K077004',
                'parent_code' => 'K077',
                'province' => 'K077',
                'name' => 'Hòn Đất',
                'full_name' => 'Hòn Đất Kiên Giang'
            ],
            [
                'pay_area_code' => 'K077005',
                'parent_code' => 'K077',
                'province' => 'C710',
                'name' => 'Thới Lai',
                'full_name' => 'Thới Lai Cần Thơ'
            ],
            [
                'pay_area_code' => 'K077014',
                'parent_code' => 'K077',
                'province' => 'K077',
                'name' => 'U Minh Thượng',
                'full_name' => 'U Minh Thượng Kiên Giang'
            ],
            [
                'pay_area_code' => 'Q510018',
                'parent_code' => 'Q510',
                'province' => 'Q510',
                'name' => 'Bắc Trà My',
                'full_name' => 'Bắc Trà My Quảng Nam'
            ],
            [
                'pay_area_code' => 'T073010',
                'parent_code' => 'T073',
                'province' => 'T073',
                'name' => 'Tân Phú Đông',
                'full_name' => 'Tân Phú Đông Tiền Giang'
            ],
            [
                'pay_area_code' => 'H004015',
                'parent_code' => 'H004',
                'province' => 'H004',
                'name' => 'Hà Đông',
                'full_name' => 'Hà Đông Hà Nội'
            ],
            [
                'pay_area_code' => 'H004017',
                'parent_code' => 'H004',
                'province' => 'H004',
                'name' => 'Ba Vì',
                'full_name' => 'Ba Vì Hà Nội'
            ],
            [
                'pay_area_code' => 'H004020',
                'parent_code' => 'H004',
                'province' => 'H004',
                'name' => 'Thạch Thất',
                'full_name' => 'Thạch Thất Hà Nội'
            ],
            [
                'pay_area_code' => 'H004022',
                'parent_code' => 'H004',
                'province' => 'H004',
                'name' => 'Quốc Oai',
                'full_name' => 'Quốc Oai Hà Nội'
            ],
            [
                'pay_area_code' => 'H004018',
                'parent_code' => 'H004',
                'province' => 'H004',
                'name' => 'Phúc Thọ',
                'full_name' => 'Phúc Thọ Hà Nội'
            ],
            [
                'pay_area_code' => 'H004021',
                'parent_code' => 'H004',
                'province' => 'H004',
                'name' => 'Hoài Đức',
                'full_name' => 'Hoài Đức Hà Nội'
            ],
            [
                'pay_area_code' => 'H004026',
                'parent_code' => 'H004',
                'province' => 'H004',
                'name' => 'Mỹ Đức',
                'full_name' => 'Mỹ Đức Hà Nội'
            ],
            [
                'pay_area_code' => 'H004027',
                'parent_code' => 'H004',
                'province' => 'H004',
                'name' => 'Ứng Hòa',
                'full_name' => 'Ứng Hòa Hà Nội'
            ],
            [
                'pay_area_code' => 'H004016',
                'parent_code' => 'H004',
                'province' => 'H004',
                'name' => 'Sơn Tây',
                'full_name' => 'Sơn Tây Hà Nội'
            ],
            [
                'pay_area_code' => 'H004024',
                'parent_code' => 'H004',
                'province' => 'H004',
                'name' => 'Thanh Oai',
                'full_name' => 'Thanh Oai Hà Nội'
            ],
            [
                'pay_area_code' => 'H004025',
                'parent_code' => 'H004',
                'province' => 'H004',
                'name' => 'Thường Tín',
                'full_name' => 'Thường Tín Hà Nội'
            ],
            [
                'pay_area_code' => 'H004028',
                'parent_code' => 'H004',
                'province' => 'H004',
                'name' => 'Phú Xuyên',
                'full_name' => 'Phú Xuyên Hà Nội'
            ],
            [
                'pay_area_code' => 'H004023',
                'parent_code' => 'H004',
                'province' => 'H004',
                'name' => 'Chương Mỹ',
                'full_name' => 'Chương Mỹ Hà Nội'
            ],
            [
                'pay_area_code' => 'H004030',
                'parent_code' => 'H004',
                'province' => 'H004',
                'name' => 'Mê Linh',
                'full_name' => 'Mê Linh Hà Nội'
            ],
            [
                'pay_area_code' => 'H004019',
                'parent_code' => 'H004',
                'province' => 'H004',
                'name' => 'Đan Phượng',
                'full_name' => 'Đan Phượng Hà Nội'
            ],
            [
                'pay_area_code' => 'V211011',
                'parent_code' => 'V211',
                'province' => 'V211',
                'name' => 'Sông Lô',
                'full_name' => 'Sông Lô Vĩnh Phúc'
            ],
            [
                'pay_area_code' => 'L072014',
                'parent_code' => 'L072',
                'province' => 'L072',
                'name' => 'Thạnh Hóa',
                'full_name' => 'Thạnh Hóa Long An'
            ],
            [
                'pay_area_code' => 'K058009',
                'parent_code' => 'K058',
                'province' => 'K058',
                'name' => 'Cam Lâm',
                'full_name' => 'Cam Lâm Khánh Hòa'
            ],
            [
                'pay_area_code' => 'N068006',
                'parent_code' => 'N068',
                'province' => 'N068',
                'name' => 'Thuận Bắc',
                'full_name' => 'Thuận Bắc Ninh Thuận'
            ],
            [
                'pay_area_code' => 'D501007',
                'parent_code' => 'D501',
                'province' => 'D501',
                'name' => 'Đắk Glong',
                'full_name' => 'Đắk Glong Đắc Nông'
            ],
            [
                'pay_area_code' => 'L063008',
                'parent_code' => 'L063',
                'province' => 'L063',
                'name' => 'Đam Rông',
                'full_name' => 'Đam Rông Lâm Đồng'
            ],
            [
                'pay_area_code' => 'G059016',
                'parent_code' => 'G059',
                'province' => 'G059',
                'name' => 'Phú Thiện',
                'full_name' => 'Phú Thiện Gia Lai'
            ],
            [
                'pay_area_code' => 'S079009',
                'parent_code' => 'S079',
                'province' => 'S079',
                'name' => 'Cù Lao Dung',
                'full_name' => 'Cù Lao Dung Sóc Trăng'
            ],
            [
                'pay_area_code' => 'V070008',
                'parent_code' => 'V070',
                'province' => 'V070',
                'name' => 'Bình Tân',
                'full_name' => 'Bình Tân Vĩnh Long'
            ],
            [
                'pay_area_code' => 'V064010',
                'parent_code' => 'V064',
                'province' => 'V064',
                'name' => 'Long Điền',
                'full_name' => 'Long Điền Bà Rịa Vũng Tàu'
            ],
            [
                'pay_area_code' => 'D511007',
                'parent_code' => 'D511',
                'province' => 'D511',
                'name' => 'Cẩm Lệ',
                'full_name' => 'Cẩm Lệ Đà Nẵng'
            ],
            [
                'pay_area_code' => 'Q053010',
                'parent_code' => 'Q053',
                'province' => 'Q053',
                'name' => 'Đảo Cồn Cỏ',
                'full_name' => 'Đảo Cồn Cỏ Quảng Trị'
            ],
            [
                'pay_area_code' => 'L063007',
                'parent_code' => 'L063',
                'province' => 'L063',
                'name' => 'Bảo Lâm',
                'full_name' => 'Bảo Lâm Lâm Đồng'
            ],
            [
                'pay_area_code' => 'Q510019',
                'parent_code' => 'Q510',
                'province' => 'Q510',
                'name' => 'Nông Sơn',
                'full_name' => 'Nông Sơn Quảng Nam'
            ],
            [
                'pay_area_code' => 'L072015',
                'parent_code' => 'L072',
                'province' => 'L072',
                'name' => 'Tân Trụ',
                'full_name' => 'Tân Trụ Long An'
            ],
            [
                'pay_area_code' => 'C780009',
                'parent_code' => 'C780',
                'province' => 'C780',
                'name' => 'Phú Tân',
                'full_name' => 'Phú Tân Cà Mau'
            ],
            [
                'pay_area_code' => 'Q510017',
                'parent_code' => 'Q510',
                'province' => 'Q510',
                'name' => 'Tây Giang',
                'full_name' => 'Tây Giang Quảng Nam'
            ],
            [
                'pay_area_code' => 'P057010',
                'parent_code' => 'P057',
                'province' => 'P057',
                'name' => 'Đông Hòa',
                'full_name' => 'Đông Hòa Phú Yên'
            ],
            [
                'pay_area_code' => 'H039012',
                'parent_code' => 'H039',
                'province' => 'H039',
                'name' => 'Lộc Hà',
                'full_name' => 'Lộc Hà Hà Tĩnh'
            ],
            [
                'pay_area_code' => 'L231006',
                'parent_code' => 'L231',
                'province' => 'L231',
                'name' => 'Mường Tè',
                'full_name' => 'Mường Tè Lai Châu'
            ],
            [
                'pay_area_code' => 'D501008',
                'parent_code' => 'D501',
                'province' => 'D501',
                'name' => 'Krông Nô',
                'full_name' => 'Krông Nô Đắc Nông'
            ],
            [
                'pay_area_code' => 'T074010',
                'parent_code' => 'T074',
                'province' => 'P210',
                'name' => 'Hạ Hòa',
                'full_name' => 'Hạ Hòa Phú Thọ'
            ],
            [
                'pay_area_code' => 'Q033003',
                'parent_code' => 'Q033',
                'province' => 'Q033',
                'name' => 'Uông Bí',
                'full_name' => 'Uông Bí Quảng Ninh'
            ],
            [
                'pay_area_code' => 'T037005',
                'parent_code' => 'T037',
                'province' => 'T037',
                'name' => 'Quan Hóa',
                'full_name' => 'Quan Hóa Thanh Hóa'
            ],
            [
                'pay_area_code' => 'S022005',
                'parent_code' => 'S022',
                'province' => 'S022',
                'name' => 'Bắc Yên',
                'full_name' => 'Bắc Yên Sơn La'
            ],
            [
                'pay_area_code' => 'N038010',
                'parent_code' => 'N038',
                'province' => 'N038',
                'name' => 'Tân Kỳ',
                'full_name' => 'Tân Kỳ Nghệ An'
            ],
            [
                'pay_area_code' => 'H039008',
                'parent_code' => 'H039',
                'province' => 'H039',
                'name' => 'Thạch Hà',
                'full_name' => 'Thạch Hà Hà Tĩnh'
            ],
            [
                'pay_area_code' => 'Q510011',
                'parent_code' => 'Q510',
                'province' => 'Q510',
                'name' => 'Tiên Phước',
                'full_name' => 'Tiên Phước Quảng Nam'
            ],
            [
                'pay_area_code' => 'K058007',
                'parent_code' => 'K058',
                'province' => 'K058',
                'name' => 'Khánh Sơn',
                'full_name' => 'Khánh Sơn Khánh Hòa'
            ],
            [
                'pay_area_code' => 'T008GV',
                'parent_code' => 'T008',
                'province' => 'T008',
                'name' => 'Q.Gò Vấp',
                'full_name' => 'Q.Gò Vấp TPHCM'
            ],
            [
                'pay_area_code' => 'G059009',
                'parent_code' => 'G059',
                'province' => 'G059',
                'name' => 'Đức Cơ',
                'full_name' => 'Đức Cơ Gia Lai'
            ],
            [
                'pay_area_code' => 'L063005',
                'parent_code' => 'L063',
                'province' => 'T027',
                'name' => 'Lâm Bình',
                'full_name' => 'Lâm Bình Tuyên Quang'
            ],
            [
                'pay_area_code' => 'N068004',
                'parent_code' => 'N068',
                'province' => 'N068',
                'name' => 'Ninh Hải',
                'full_name' => 'Ninh Hải Ninh Thuận'
            ],
            [
                'pay_area_code' => 'K058008',
                'parent_code' => 'K058',
                'province' => 'K058',
                'name' => 'Trường Sa',
                'full_name' => 'Trường Sa Khánh Hòa'
            ],
            [
                'pay_area_code' => 'Q053006',
                'parent_code' => 'Q053',
                'province' => 'Q053',
                'name' => 'Triệu Phong',
                'full_name' => 'Triệu Phong Quảng Trị'
            ],
            [
                'pay_area_code' => 'L025008',
                'parent_code' => 'L025',
                'province' => 'L025',
                'name' => 'Lộc Bình',
                'full_name' => 'Lộc Bình Lạng Sơn'
            ],
            [
                'pay_area_code' => 'V064004',
                'parent_code' => 'V064',
                'province' => 'V064',
                'name' => 'Xuyên Mộc',
                'full_name' => 'Xuyên Mộc Bà Rịa Vũng Tàu'
            ]
        ]);
    }
}
