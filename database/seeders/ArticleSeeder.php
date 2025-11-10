<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get first admin user as author
        $author = User::where('role', 'admin')->first();
        
        if (!$author) {
            $this->command->warn('No admin user found. Please run UserSeeder first.');
            return;
        }

        $articles = [
            [
                'title' => 'Pentingnya Vitamin C dalam Pembentukan Tulang',
                'slug' => 'pentingnya-vitamin-c-dalam-pembentukan-tulang',
                'excerpt' => 'Vitamin C tidak hanya baik untuk sistem imun, tetapi juga berperan penting dalam pembentukan dan pemeliharaan tulang yang kuat.',
                'content' => "Vitamin C, atau asam askorbat, dikenal luas sebagai vitamin yang meningkatkan sistem imun. Namun, tahukah Anda bahwa vitamin C juga memiliki peran krusial dalam kesehatan tulang?\n\nVitamin C adalah komponen penting dalam sintesis kolagen, protein struktural utama dalam tulang, kulit, dan jaringan ikat lainnya. Tanpa vitamin C yang cukup, tubuh tidak dapat memproduksi kolagen dengan baik, yang dapat menyebabkan tulang menjadi lemah dan rapuh.\n\nPenelitian menunjukkan bahwa asupan vitamin C yang memadai berkaitan dengan kepadatan tulang yang lebih tinggi dan risiko osteoporosis yang lebih rendah. Vitamin C juga membantu tubuh menyerap kalsium, mineral penting lainnya untuk kesehatan tulang.\n\nSumber vitamin C yang baik meliputi jeruk, stroberi, paprika, brokoli, dan tomat. Untuk kesehatan tulang optimal, pastikan Anda mendapatkan cukup vitamin C setiap hari - setidaknya 75-90 mg untuk orang dewasa.\n\nCuplikan: 2-3 baris...",
                'author_id' => $author->id,
                'is_published' => true,
                'published_at' => now()->subDays(7),
                'views' => 156,
            ],
            [
                'title' => 'Vitamin D dan Kesehatan Tulang: Hubungan yang Tak Terpisahkan',
                'slug' => 'vitamin-d-dan-kesehatan-tulang',
                'excerpt' => 'Pelajari mengapa vitamin D dijuluki sebagai vitamin tulang dan bagaimana cara mendapatkan cukup vitamin ini.',
                'content' => "Vitamin D sering disebut sebagai 'vitamin tulang' karena perannya yang sangat penting dalam kesehatan tulang. Vitamin ini membantu tubuh menyerap kalsium dari makanan yang kita konsumsi.\n\nTanpa vitamin D yang cukup, hanya sekitar 10-15% kalsium dari makanan yang dapat diserap oleh tubuh. Dengan vitamin D yang memadai, penyerapan kalsium dapat meningkat hingga 30-40%.\n\nDefisiensi vitamin D dapat menyebabkan rakhitis pada anak-anak (tulang lunak dan bengkok) dan osteomalasia pada orang dewasa (tulang lemah dan nyeri). Pada orang tua, kekurangan vitamin D meningkatkan risiko osteoporosis dan patah tulang.\n\nSumber vitamin D:\n1. Paparan sinar matahari - 10-15 menit setiap hari\n2. Makanan: ikan berlemak (salmon, tuna), telur, susu fortifikasi\n3. Suplemen (jika diperlukan)\n\nKebutuhan harian vitamin D adalah 600-800 IU untuk orang dewasa. Konsultasikan dengan dokter untuk mengetahui kebutuhan Anda.\n\nBaca selengkapnya...",
                'author_id' => $author->id,
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'views' => 234,
            ],
            [
                'title' => 'Bahaya Kekurangan Vitamin B12: Cuplikan 2-3 Baris',
                'slug' => 'bahaya-kekurangan-vitamin-b12',
                'excerpt' => 'Vitamin B12 sangat penting untuk fungsi otak dan produksi sel darah merah. Kenali gejala kekurangannya.',
                'content' => "Vitamin B12 adalah salah satu vitamin B yang paling penting namun sering diabaikan. Vitamin ini hanya ditemukan dalam produk hewani, sehingga vegetarian dan vegan berisiko tinggi mengalami defisiensi.\n\nVitamin B12 berperan dalam:\n- Produksi sel darah merah\n- Fungsi sistem saraf\n- Sintesis DNA\n- Metabolisme energi\n\nGejala kekurangan vitamin B12:\n1. Kelelahan dan kelemahan\n2. Anemia megaloblastik\n3. Kesemutan di tangan dan kaki\n4. Masalah keseimbangan\n5. Gangguan kognitif dan memori\n6. Depresi\n\nSumber vitamin B12:\n- Daging (terutama hati)\n- Ikan dan seafood\n- Telur\n- Produk susu\n- Sereal fortifikasi\n- Suplemen (untuk vegetarian/vegan)\n\nDefisiensi vitamin B12 dapat menyebabkan kerusakan saraf permanen jika tidak ditangani. Jika Anda mengalami gejala-gejala di atas, segera konsultasikan dengan dokter untuk pemeriksaan kadar vitamin B12.\n\nBaca lebih lanjut...",
                'author_id' => $author->id,
                'is_published' => true,
                'published_at' => now()->subDays(3),
                'views' => 189,
            ],
            [
                'title' => 'Mengapa Tubuh Butuh Vitamin B Kompleks?',
                'slug' => 'mengapa-tubuh-butuh-vitamin-b-kompleks',
                'excerpt' => 'Vitamin B kompleks terdiri dari 8 vitamin yang bekerja sama untuk menjaga kesehatan tubuh. Mari kenali masing-masing fungsinya.',
                'content' => "Vitamin B Kompleks adalah kelompok 8 vitamin B yang bekerja secara sinergis untuk mendukung berbagai fungsi tubuh:\n\n1. Vitamin B1 (Thiamine) - Metabolisme energi\n2. Vitamin B2 (Riboflavin) - Produksi energi, kesehatan mata\n3. Vitamin B3 (Niacin) - Metabolisme, kesehatan kulit\n4. Vitamin B5 (Pantothenic Acid) - Produksi hormon\n5. Vitamin B6 (Pyridoxine) - Fungsi otak, mood\n6. Vitamin B7 (Biotin) - Kesehatan rambut dan kuku\n7. Vitamin B9 (Folate) - Produksi DNA, kesehatan janin\n8. Vitamin B12 (Cobalamin) - Fungsi saraf, sel darah merah\n\nMengapa tidak semua huruf punya vitamin? Awalnya, ketika vitamin pertama kali ditemukan di awal abad ke-20, para ilmuwan menamainya dengan huruf alfabetik berurutan. Vitamin B awalnya dikira satu senyawa, namun kemudian ditemukan bahwa itu adalah kelompok berbagai senyawa berbeda, sehingga diberi nomor (B1, B2, dst).\n\nBeberapa 'vitamin' yang awalnya diberi nama kemudian ditemukan bukan vitamin atau merupakan duplikat dari vitamin yang sudah ada, sehingga dihapus dari daftar. Itulah mengapa ada vitamin B1, B2, B3... tapi tidak ada B4, B8, B10, dll.\n\nUntuk memastikan Anda mendapat cukup vitamin B kompleks, konsumsi diet seimbang yang mencakup:\n- Daging dan ikan\n- Telur dan susu\n- Sayuran hijau\n- Kacang-kacangan\n- Biji-bijian utuh\n\nBaca artikel lengkap...",
                'author_id' => $author->id,
                'is_published' => true,
                'published_at' => now()->subDays(1),
                'views' => 98,
            ],
            [
                'title' => 'Vitamin A dan Kesehatan Mata: Fakta dan Mitos',
                'slug' => 'vitamin-a-dan-kesehatan-mata',
                'excerpt' => 'Apakah benar makan wortel bisa membuat mata lebih tajam? Simak fakta ilmiah di balik hubungan vitamin A dan kesehatan mata.',
                'content' => "Anda mungkin pernah mendengar bahwa makan wortel bisa membuat penglihatan lebih baik. Mitos ini berasal dari Perang Dunia II ketika Inggris menyebarkan propaganda bahwa pilot mereka memiliki penglihatan tajam karena makan wortel, padahal sebenarnya untuk menyembunyikan teknologi radar baru mereka.\n\nNamun, ada kebenaran di balik mitos ini. Vitamin A memang sangat penting untuk kesehatan mata:\n\n1. Komponen Rhodopsin - Vitamin A adalah bagian dari rhodopsin, pigmen di retina yang membantu Anda melihat dalam cahaya redup\n2. Mencegah Rabun Senja - Defisiensi vitamin A menyebabkan kesulitan melihat dalam cahaya rendah\n3. Melindungi Kornea - Vitamin A menjaga kesehatan kornea dan mencegah mata kering\n4. Mencegah Degenerasi Makula - Antioksidan dalam vitamin A dapat melindungi mata dari kerusakan terkait usia\n\nNamun, perlu dicatat:\n- Vitamin A TIDAK akan membuat penglihatan Anda lebih baik dari normal\n- Hanya membantu jika Anda kekurangan vitamin A\n- Kelebihan vitamin A justru berbahaya\n\nSumber vitamin A yang baik:\n- Wortel, ubi jalar (beta-karoten)\n- Sayuran hijau gelap\n- Hati\n- Telur\n- Produk susu\n\nKebutuhan harian: 700-900 mcg untuk orang dewasa.\n\nBaca selengkapnya tentang kesehatan mata...",
                'author_id' => $author->id,
                'is_published' => true,
                'published_at' => now(),
                'views' => 45,
            ],
        ];

        foreach ($articles as $article) {
            Article::updateOrCreate(
                ['slug' => $article['slug']],
                $article
            );
        }
    }
}
