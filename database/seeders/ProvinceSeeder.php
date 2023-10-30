<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('province')->insert([
            [
                'province_code' => 'HNI',
                'province_name' => 'Hà Nội 1',
                'province_desc' => '',
                'province_code_im' => 'H004',
                'shop_code' => 'CN_HNI'
            ],
            [
                'province_code' => 'AGG',
                'province_name' => 'An Giang',
                'province_desc' => '',
                'province_code_im' => 'A076',
                'shop_code' => '1200001001'
            ],
            [
                'province_code' => 'BDG',
                'province_name' => 'Bình Dương',
                'province_desc' => '',
                'province_code_im' => 'B650',
                'shop_code' => '1200008001'
            ],
            [
                'province_code' => 'BDH',
                'province_name' => 'Bình Định',
                'province_desc' => '',
                'province_code_im' => 'B056',
                'shop_code' => '1300009001'
            ],
            [
                'province_code' => 'BGG',
                'province_name' => 'Bắc Giang',
                'province_desc' => '',
                'province_code_im' => 'B240',
                'shop_code' => '1100005001'
            ],
            [
                'province_code' => 'BKN',
                'province_name' => 'Bắc Cạn',
                'province_desc' => '',
                'province_code_im' => 'B281',
                'shop_code' => '1100004001'
            ],
            [
                'province_code' => 'BLU',
                'province_name' => 'Bạc Liêu',
                'province_desc' => '',
                'province_code_im' => 'B781',
                'shop_code' => '1200003001'
            ],
            [
                'province_code' => 'BNH',
                'province_name' => 'Bắc Ninh',
                'province_desc' => '',
                'province_code_im' => 'B241',
                'shop_code' => '1100006001'
            ],
            [
                'province_code' => 'BPC',
                'province_name' => 'Bình Phước',
                'province_desc' => '',
                'province_code_im' => 'B651',
                'shop_code' => '1200010001'
            ],
            [
                'province_code' => 'BTE',
                'province_name' => 'Bến Tre',
                'province_desc' => '',
                'province_code_im' => 'B075',
                'shop_code' => '1200007001'
            ],
            [
                'province_code' => 'BTN',
                'province_name' => 'Bình Thuận',
                'province_desc' => '',
                'province_code_im' => 'B062',
                'shop_code' => '1200011001'
            ],
            [
                'province_code' => 'CBG',
                'province_name' => 'Cao Bằng',
                'province_desc' => '',
                'province_code_im' => 'C026',
                'shop_code' => '1100013001'
            ],
            [
                'province_code' => 'CMU',
                'province_name' => 'Cà Mau',
                'province_desc' => '',
                'province_code_im' => 'C780',
                'shop_code' => '1200012001'
            ],
            [
                'province_code' => 'CTO',
                'province_name' => 'Cần Thơ',
                'province_desc' => '',
                'province_code_im' => 'C710',
                'shop_code' => 'TT4'
            ],
            [
                'province_code' => 'DBN',
                'province_name' => 'Điện Biên',
                'province_desc' => '',
                'province_code_im' => 'D230',
                'shop_code' => '1100018001'
            ],
            [
                'province_code' => 'DCN',
                'province_name' => 'Đắc Nông',
                'province_desc' => '',
                'province_code_im' => 'D501',
                'shop_code' => '1300017001'
            ],
            [
                'province_code' => 'DLK',
                'province_name' => 'Đắc Lắc',
                'province_desc' => '',
                'province_code_im' => 'D500',
                'shop_code' => '1300016001'
            ],
            [
                'province_code' => 'DNG',
                'province_name' => 'Đà Nẵng',
                'province_desc' => '',
                'province_code_im' => 'D511',
                'shop_code' => 'TT3'
            ],
            [
                'province_code' => 'DNI',
                'province_name' => 'Đồng Nai',
                'province_desc' => '',
                'province_code_im' => 'D061',
                'shop_code' => '1200019001'
            ],
            [
                'province_code' => 'DTP',
                'province_name' => 'Đồng Tháp',
                'province_desc' => '',
                'province_code_im' => 'D067',
                'shop_code' => '1200020001'
            ],
            [
                'province_code' => 'GLI',
                'province_name' => 'Gia Lai',
                'province_desc' => '',
                'province_code_im' => 'G059',
                'shop_code' => '1300021001'
            ],
            [
                'province_code' => 'HBH',
                'province_name' => 'Hòa Bình',
                'province_desc' => '',
                'province_code_im' => 'H018',
                'shop_code' => '1100030001'
            ],
            [
                'province_code' => 'HCM',
                'province_name' => 'TPHCM',
                'province_desc' => '',
                'province_code_im' => 'T008',
                'shop_code' => 'CN_HCM'
            ],
            [
                'province_code' => 'HDG',
                'province_name' => 'Hải Dương',
                'province_desc' => '',
                'province_code_im' => 'H320',
                'shop_code' => '1100027001'
            ],
            [
                'province_code' => 'HGG',
                'province_name' => 'Hà Giang',
                'province_desc' => '',
                'province_code_im' => 'H019',
                'shop_code' => '1100022001'
            ],
            [
                'province_code' => 'HNM',
                'province_name' => 'Hà Nam',
                'province_desc' => '',
                'province_code_im' => 'N351',
                'shop_code' => '1100023001'
            ],
            [
                'province_code' => 'HPG',
                'province_name' => 'Hải Phòng',
                'province_desc' => '',
                'province_code_im' => 'H031',
                'shop_code' => '1100028001'
            ],
            [
                'province_code' => 'HTH',
                'province_name' => 'Hà Tĩnh',
                'province_desc' => '',
                'province_code_im' => 'H039',
                'shop_code' => '1100026001'
            ],
            [
                'province_code' => 'HUE',
                'province_name' => 'Thừa Thiên Huế',
                'province_desc' => '',
                'province_code_im' => 'T054',
                'shop_code' => '1300057001'
            ],
            [
                'province_code' => 'HUG',
                'province_name' => 'Hậu Giang',
                'province_desc' => '',
                'province_code_im' => 'H711',
                'shop_code' => '1200029001'
            ],
            [
                'province_code' => 'HYN',
                'province_name' => 'Hưng Yên',
                'province_desc' => '',
                'province_code_im' => 'H321',
                'shop_code' => '1100031001'
            ],
            [
                'province_code' => 'KGG',
                'province_name' => 'Kiên Giang',
                'province_desc' => '',
                'province_code_im' => 'K077',
                'shop_code' => '1200033001'
            ],
            [
                'province_code' => 'KHA',
                'province_name' => 'Khánh Hòa',
                'province_desc' => '',
                'province_code_im' => 'K058',
                'shop_code' => '1300032001'
            ],
            [
                'province_code' => 'KTM',
                'province_name' => 'Kon Tum',
                'province_desc' => '',
                'province_code_im' => 'K060',
                'shop_code' => '1300034001'
            ],
            [
                'province_code' => 'LAN',
                'province_name' => 'Long An',
                'province_desc' => '',
                'province_code_im' => 'L072',
                'shop_code' => '1200039001'
            ],
            [
                'province_code' => 'LCI',
                'province_name' => 'Lào Cai',
                'province_desc' => '',
                'province_code_im' => 'L020',
                'shop_code' => '1100037001'
            ],
            [
                'province_code' => 'LCU',
                'province_name' => 'Lai Châu',
                'province_desc' => '',
                'province_code_im' => 'L231',
                'shop_code' => '1100035001'
            ],
            [
                'province_code' => 'LDG',
                'province_name' => 'Lâm Đồng',
                'province_desc' => '',
                'province_code_im' => 'L063',
                'shop_code' => '1200038001'
            ],
            [
                'province_code' => 'LSN',
                'province_name' => 'Lạng Sơn',
                'province_desc' => '',
                'province_code_im' => 'L025',
                'shop_code' => '1100036001'
            ],
            [
                'province_code' => 'NAN',
                'province_name' => 'Nghệ An',
                'province_desc' => '',
                'province_code_im' => 'N038',
                'shop_code' => '1100041001'
            ],
            [
                'province_code' => 'NBH',
                'province_name' => 'Ninh Bình',
                'province_desc' => '',
                'province_code_im' => 'N030',
                'shop_code' => '1100042001'
            ],
            [
                'province_code' => 'NDH',
                'province_name' => 'Nam Định',
                'province_desc' => '',
                'province_code_im' => 'N350',
                'shop_code' => '1100040001'
            ],
            [
                'province_code' => 'NTN',
                'province_name' => 'Ninh Thuận',
                'province_desc' => '',
                'province_code_im' => 'N068',
                'shop_code' => '1200043001'
            ],
            [
                'province_code' => 'PTO',
                'province_name' => 'Phú Thọ',
                'province_desc' => '',
                'province_code_im' => 'P210',
                'shop_code' => '1100044001'
            ],
            [
                'province_code' => 'PYN',
                'province_name' => 'Phú Yên',
                'province_desc' => '',
                'province_code_im' => 'P057',
                'shop_code' => '1300045001'
            ],
            [
                'province_code' => 'QBH',
                'province_name' => 'Quảng Bình',
                'province_desc' => '',
                'province_code_im' => 'Q052',
                'shop_code' => '1100046001'
            ],
            [
                'province_code' => 'QNH',
                'province_name' => 'Quảng Ninh',
                'province_desc' => '',
                'province_code_im' => 'Q033',
                'shop_code' => '1100049001'
            ],
            [
                'province_code' => 'QNI',
                'province_name' => 'Quảng Ngãi',
                'province_desc' => '',
                'province_code_im' => 'Q055',
                'shop_code' => '1300048001'
            ],
            [
                'province_code' => 'QNM',
                'province_name' => 'Quảng Nam',
                'province_desc' => '',
                'province_code_im' => 'Q510',
                'shop_code' => '1300047001'
            ],
            [
                'province_code' => 'QTI',
                'province_name' => 'Quảng Trị',
                'province_desc' => '',
                'province_code_im' => 'Q053',
                'shop_code' => '1300050001'
            ],
            [
                'province_code' => 'SLA',
                'province_name' => 'Sơn La',
                'province_desc' => '',
                'province_code_im' => 'S022',
                'shop_code' => '1100052001'
            ],
            [
                'province_code' => 'STG',
                'province_name' => 'Sóc Trăng',
                'province_desc' => '',
                'province_code_im' => 'S079',
                'shop_code' => '1200051001'
            ],
            [
                'province_code' => 'TBH',
                'province_name' => 'Thái Bình',
                'province_desc' => '',
                'province_code_im' => 'T036',
                'shop_code' => '1100054001'
            ],
            [
                'province_code' => 'TGG',
                'province_name' => 'Tiền Giang',
                'province_desc' => '',
                'province_code_im' => 'T073',
                'shop_code' => '1200058001'
            ],
            [
                'province_code' => 'THA',
                'province_name' => 'Thanh Hóa',
                'province_desc' => '',
                'province_code_im' => 'T037',
                'shop_code' => '1100056001'
            ],
            [
                'province_code' => 'TNH',
                'province_name' => 'Tây Ninh',
                'province_desc' => '',
                'province_code_im' => 'T066',
                'shop_code' => '1200053001'
            ],
            [
                'province_code' => 'TNN',
                'province_name' => 'Thái Nguyên',
                'province_desc' => '',
                'province_code_im' => 'T280',
                'shop_code' => '1100055001'
            ],
            [
                'province_code' => 'TQG',
                'province_name' => 'Tuyên Quang',
                'province_desc' => '',
                'province_code_im' => 'T027',
                'shop_code' => '1100061001'
            ],
            [
                'province_code' => 'TVH',
                'province_name' => 'Trà Vinh',
                'province_desc' => '',
                'province_code_im' => 'T074',
                'shop_code' => '1200060001'
            ],
            [
                'province_code' => 'VLG',
                'province_name' => 'Vĩnh Long',
                'province_desc' => '',
                'province_code_im' => 'V070',
                'shop_code' => '1200062001'
            ],
            [
                'province_code' => 'VPC',
                'province_name' => 'Vĩnh Phúc',
                'province_desc' => '',
                'province_code_im' => 'V211',
                'shop_code' => '1100063001'
            ],
            [
                'province_code' => 'VTU',
                'province_name' => 'Bà Rịa Vũng Tàu',
                'province_desc' => '',
                'province_code_im' => 'V064',
                'shop_code' => '1200002001'
            ],
            [
                'province_code' => 'YBI',
                'province_name' => 'Yên Bái',
                'province_desc' => '',
                'province_code_im' => 'Y029',
                'shop_code' => '1100064001'
            ],
            [
                'province_code' => 'HNI2',
                'province_name' => 'Hà Nội 2',
                'province_desc' => '',
                'province_code_im' => 'H0042',
                'shop_code' => 'CN_HNI2'
            ],
        ]);

    }
}
