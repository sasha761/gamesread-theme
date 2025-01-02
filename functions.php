<?php
if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

require_once(__DIR__ . '/vendor/autoload.php');
require_once get_template_directory() . '/includes/acf-setup-settings.php';
require_once get_template_directory() . '/includes/Theme.class.php';
require_once get_template_directory() . '/includes/theme-functions.php';


// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// use PhpOffice\PhpSpreadsheet\IOFactory;

// function delete_pages_and_redirect($file_path) {
//     global $wpdb;
    
//     // Подключение файла Excel
//     $spreadsheet = IOFactory::load($file_path);
//     $sheet = $spreadsheet->getActiveSheet();
//     $highestRow = $sheet->getHighestRow();

//     for ($row = 2; $row <= $highestRow; $row++) {
//         // Получение данных из Excel
//     	if ($row > 200) {  // 500 итераций (начиная с 2-й строки)
//             break;  // Прерываем цикл, если превышено количество итераций
//         }

//         $url_to_delete = $sheet->getCell("A" . $row)->getValue();
//         $redirect_url = $sheet->getCell("B" . $row)->getValue();

//         $url_to_delete = preg_replace('/^https?:\/\/gamesread\.com/', '', $url_to_delete);

//         // Проверка, существует ли уже редирект с таким URL
//         $existing_redirect = $wpdb->get_var(
//             $wpdb->prepare(
//                 "SELECT COUNT(*) FROM {$wpdb->prefix}redirection_items WHERE url = %s",
//                 $url_to_delete
//             )
//         );

//         if ($existing_redirect > 0) {
//             // Если редирект уже существует, пропустить добавление
//             continue;
//         }
//         // Получение ID страницы по URL
//         $page_id = url_to_postid($url_to_delete);

//         if ($page_id) {
//             // Добавление редиректа
//             $wpdb->insert(
//                 $wpdb->prefix . 'redirection_items',
//                 array(
//                     'url' => $url_to_delete,
//                     'action_type' => 'url',
//                     'action_code' => '301',
//                     'match_url' => $url_to_delete,
//                     'last_access' => current_time('mysql'),
//                     'match_type' => 'url',
//                     'action_data' => $redirect_url
//                 )
//             );

//             // Получение последнего вставленного ID редиректа
//             $redirection_id = $wpdb->insert_id;

//             // Вставка данных в таблицу wpub_redirection_logs
//             $wpdb->insert(
//                 $wpdb->prefix . 'redirection_logs',
//                 array(
//                     'created' => current_time('mysql'),
//                     'url' => $url_to_delete,
//                     'domain' => 'https://gamesread.com',
//                     'sent_to' => $redirect_url,
//                     'agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36',
//                     'referrer' => '',
//                     'http_code' => '301',
//                     'request_method' => 'HEAD',
//                     'request_data' => '',
//                     'redirect_by' => 'redirection',
//                     'redirection_id' => $redirection_id,
//                     'ip' => ''
//                 )
//             );

//             // Удаление страницы
//             wp_delete_post($page_id, true);
//         }
//     }
// }

// Укажите путь к вашему файлу Excel
// $file_path = ABSPATH . 'wp-content/themes/news/includes/GAMESREAD.COM.xlsx';
// delete_pages_and_redirect($file_path);

// $ip = get_ip_address();
// var_dump($ip);
