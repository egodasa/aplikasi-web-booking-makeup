<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'user/Dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Frontend
$route['user/index']['GET'] = 'user/Dashboard/index';
$route['karya']['GET'] = 'user/Dashboard/karya';
$route['register']['GET'] = 'user/Dashboard/register';
$route['register_tambah']['POST'] = 'user/Dashboard/register_tambah';
$route['booking/(:num)']['GET'] = 'user/Dashboard/booking/$1';
$route['booking_tambah']['POST'] = 'user/Dashboard/booking_tambah';
$route['riwayat']['GET'] = 'user/Dashboard/riwayat';
$route['pembayaran']['POST'] = 'user/Dashboard/pembayaran';
$route['biodata']['GET'] = 'user/Dashboard/biodata';

$route['login']['POST'] = 'user/Auth_User/login';
$route['logout']['GET'] = 'user/Auth_User/logout';

// Backend

// Admin
$route['admin/data']['GET'] = 'admin/Admin/index';
$route['admin/admin_tambah']['POST'] = 'admin/Admin/admin_tambah';
$route['admin/admin_edit/(:num)']['GET'] = 'admin/Admin/admin_edit/$1';
$route['admin/admin_edit_aksi']['POST'] = 'admin/Admin/admin_edit_aksi';
$route['admin/admin_hapus/(:num)']['GET'] = 'admin/Admin/admin_hapus_aksi/$1';

$route['admin/dashboard']['GET'] = 'admin/Dashboard/index';
$route['admin/login']['GET'] = 'admin/Login/login_admin';
$route['admin/login_aksi']['POST'] = 'admin/Login/login_aksi';
// $route['admin/logout_aksi']['GET'] = 'admin/Login/logout_aksi';

// Makeup
$route['admin/makeup']['GET'] = 'admin/Makeup/index';
$route['admin/makeup_tambah']['POST'] = 'admin/Makeup/makeup_tambah';
$route['admin/makeup_edit/(:num)']['GET'] = 'admin/Makeup/makeup_edit/$1';
$route['admin/makeup_edit_aksi']['POST'] = 'admin/Makeup/makeup_edit_aksi';
$route['admin/makeup_hapus/(:num)']['GET'] = 'admin/Makeup/makeup_hapus_aksi/$1';

// Paket Makeup
$route['admin/paket']['GET'] = 'admin/Paket_Makeup/index';
$route['admin/paket_tambah']['POST'] = 'admin/Paket_Makeup/paket_tambah';
$route['admin/paket_edit/(:num)']['GET'] = 'admin/Paket_Makeup/paket_edit/$1';
$route['admin/paket_edit_aksi']['POST'] = 'admin/Paket_Makeup/paket_edit_aksi';
$route['admin/paket_hapus/(:num)']['GET'] = 'admin/Paket_Makeup/paket_hapus_aksi/$1';

// Hasil Karya
$route['admin/karya']['GET'] = 'admin/Hasil_Karya/index';
$route['admin/karya_tambah']['POST'] = 'admin/Hasil_Karya/karya_tambah';
$route['admin/karya_edit/(:num)']['GET'] = 'admin/Hasil_karya/karya_edit/$1';
$route['admin/karya_edit_aksi']['POST'] = 'admin/Hasil_karya/karya_edit_aksi';
$route['admin/karya_hapus/(:num)']['GET'] = 'admin/Hasil_karya/karya_hapus_aksi/$1';

// Tarif
$route['admin/tarif']['GET'] = 'admin/Tarif/index';
$route['admin/tarif_tambah']['POST'] = 'admin/Tarif/tambah_tarif';
$route['admin/tarif_hapus/(:num)']['GET'] = 'admin/Tarif/hapus_tarif/$1';

// Booking
$route['admin/booking']['GET'] = 'admin/Booking/index';
$route['konfirmasi']['POST'] = 'admin/Booking/konfirmasi';

// Laporan
$route['admin/laporan']['GET'] = 'admin/Laporan/index';
$route['admin/print_laporan']['GET'] = 'admin/Laporan/printLaporan';
$route['admin/filter_laporan']['GET'] = 'admin/Laporan/filterLaporan';

// User
$route['admin/user']['GET'] = 'admin/User/index';
$route['admin/user_hapus/(:num)']['GET'] = 'admin/User/user_hapus/$1';
