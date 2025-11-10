<?php

namespace Database\Seeders;

use App\Models\Vitamin;
use App\Models\VitaminCategory;
use Illuminate\Database\Seeder;

class VitaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fatSolubleCategory = VitaminCategory::where('slug', 'vitamin-larut-lemak')->first();
        $waterSolubleCategory = VitaminCategory::where('slug', 'vitamin-larut-air')->first();

        $vitamins = [
            // Vitamin Larut Lemak
            [
                'name' => 'A',
                'slug' => 'vitamin-a',
                'category_id' => $fatSolubleCategory->id,
                'alternative_name' => 'Retinol',
                'description' => 'Vitamin A adalah vitamin penting yang berperan dalam kesehatan mata, sistem imun, dan pertumbuhan sel.',
                'functions' => "• Menjaga kesehatan mata dan penglihatan\n• Meningkatkan sistem imun tubuh\n• Mendukung pertumbuhan dan perkembangan sel\n• Menjaga kesehatan kulit dan selaput lendir",
                'food_sources' => "Jeruk, wortel, bayam, ubi jalar, hati sapi, susu, telur, mangga, paprika merah",
                'daily_need' => 'Pria: 900 mcg/hari, Wanita: 700 mcg/hari',
                'deficiency_symptoms' => "• Rabun senja (kesulitan melihat dalam cahaya redup)\n• Kulit kering dan bersisik\n• Rentan terhadap infeksi\n• Pertumbuhan terhambat pada anak",
                'toxicity_symptoms' => "• Sakit kepala\n• Mual dan muntah\n• Kerontokan rambut\n• Kerusakan hati (pada konsumsi berlebihan jangka panjang)",
                'interesting_facts' => "Vitamin A adalah vitamin pertama yang ditemukan pada tahun 1913. Wortel tidak akan membuat Anda bisa melihat dalam gelap, namun defisiensi vitamin A dapat menyebabkan rabun senja.",
                'references' => [
                    ['source' => 'Kemenkes RI', 'year' => '2023', 'url' => 'https://www.kemkes.go.id'],
                    ['source' => 'WHO', 'year' => '2022', 'url' => 'https://www.who.int'],
                ],
                'is_popular' => true,
                'order' => 1,
            ],
            [
                'name' => 'D',
                'slug' => 'vitamin-d',
                'category_id' => $fatSolubleCategory->id,
                'alternative_name' => 'Kalsiferol',
                'description' => 'Vitamin D membantu tubuh menyerap kalsium dan menjaga kesehatan tulang. Dapat diproduksi tubuh dengan bantuan sinar matahari.',
                'functions' => "• Membantu penyerapan kalsium dan fosfor\n• Menjaga kesehatan tulang dan gigi\n• Mendukung fungsi sistem imun\n• Mengatur pertumbuhan sel",
                'food_sources' => "Ikan salmon, tuna, sarden, kuning telur, susu fortifikasi, jamur, hati sapi. Sumber utama: paparan sinar matahari pagi",
                'daily_need' => '15-20 mcg (600-800 IU)/hari',
                'deficiency_symptoms' => "• Rakhitis pada anak (tulang lunak dan bengkok)\n• Osteomalasia pada dewasa (tulang lemah)\n• Nyeri tulang dan otot\n• Kelemahan otot",
                'toxicity_symptoms' => "• Mual dan muntah\n• Kelemahan\n• Penumpukan kalsium berlebih dalam darah\n• Kerusakan ginjal",
                'interesting_facts' => "Vitamin D dijuluki 'vitamin sinar matahari' karena tubuh dapat memproduksinya sendiri saat kulit terpapar sinar UV matahari. Cukup 10-15 menit berjemur setiap hari dapat memenuhi kebutuhan vitamin D.",
                'is_popular' => true,
                'order' => 2,
            ],
            [
                'name' => 'E',
                'slug' => 'vitamin-e',
                'category_id' => $fatSolubleCategory->id,
                'alternative_name' => 'Tokoferol',
                'description' => 'Vitamin E adalah antioksidan kuat yang melindungi sel-sel tubuh dari kerusakan akibat radikal bebas.',
                'functions' => "• Antioksidan kuat yang melindungi sel dari kerusakan\n• Menjaga kesehatan kulit\n• Mendukung sistem imun\n• Membantu pelebaran pembuluh darah",
                'food_sources' => "Kacang almond, biji bunga matahari, bayam, alpukat, minyak nabati (zaitun, kelapa sawit), brokoli",
                'daily_need' => '15 mg/hari',
                'deficiency_symptoms' => "• Kelemahan otot\n• Gangguan penglihatan\n• Masalah keseimbangan dan koordinasi\n• Kerusakan saraf",
                'toxicity_symptoms' => "• Peningkatan risiko pendarahan\n• Kelemahan otot\n• Kelelahan\n• Mual",
                'interesting_facts' => "Vitamin E sering disebut 'vitamin kecantikan' karena manfaatnya untuk kesehatan kulit. Vitamin ini juga membantu melindungi kulit dari kerusakan akibat sinar UV.",
                'is_popular' => true,
                'order' => 3,
            ],
            [
                'name' => 'K',
                'slug' => 'vitamin-k',
                'category_id' => $fatSolubleCategory->id,
                'alternative_name' => 'Phylloquinone, Menaquinone',
                'description' => 'Vitamin K berperan penting dalam pembekuan darah dan kesehatan tulang.',
                'functions' => "• Membantu pembekuan darah\n• Menjaga kesehatan tulang\n• Mencegah pengapuran pembuluh darah\n• Mendukung metabolisme kalsium",
                'food_sources' => "Sayuran hijau (bayam, kangkung, brokoli, kale), kubis, kembang kol, ikan, daging, telur, natto (fermentasi kedelai)",
                'daily_need' => 'Pria: 120 mcg/hari, Wanita: 90 mcg/hari',
                'deficiency_symptoms' => "• Mudah memar atau berdarah\n• Pendarahan berlebih saat luka\n• Tulang rapuh\n• Pendarahan dalam (kasus parah)",
                'toxicity_symptoms' => "Sangat jarang terjadi, namun suplemen berlebihan dapat mengganggu obat pengencer darah",
                'interesting_facts' => "Huruf 'K' berasal dari bahasa Jerman 'Koagulation' (pembekuan). Bayi baru lahir rutin diberikan suntikan vitamin K untuk mencegah pendarahan.",
                'is_popular' => false,
                'order' => 4,
            ],

            // Vitamin Larut Air - B Kompleks
            [
                'name' => 'B1',
                'slug' => 'vitamin-b1',
                'category_id' => $waterSolubleCategory->id,
                'alternative_name' => 'Thiamine',
                'description' => 'Vitamin B1 membantu mengubah makanan menjadi energi dan penting untuk fungsi saraf.',
                'functions' => "• Mengubah karbohidrat menjadi energi\n• Mendukung fungsi saraf\n• Menjaga kesehatan jantung\n• Membantu metabolisme glukosa",
                'food_sources' => "Biji-bijian utuh, daging babi, ikan, kacang-kacangan, roti fortifikasi, sereal, nasi merah",
                'daily_need' => 'Pria: 1.2 mg/hari, Wanita: 1.1 mg/hari',
                'deficiency_symptoms' => "• Beri-beri (kelemahan otot, masalah jantung)\n• Wernicke-Korsakoff syndrome (kebingungan, kehilangan memori)\n• Kelelahan\n• Kehilangan nafsu makan",
                'toxicity_symptoms' => "Jarang terjadi karena vitamin B1 larut air dan kelebihan akan dibuang melalui urin",
                'interesting_facts' => "Penyakit beri-beri, yang disebabkan kekurangan vitamin B1, pernah menjadi epidemi di Asia ketika orang mulai mengonsumsi beras putih yang sudah dihilangkan kulit arinya.",
                'is_popular' => false,
                'order' => 5,
            ],
            [
                'name' => 'B9',
                'slug' => 'vitamin-b9',
                'category_id' => $waterSolubleCategory->id,
                'alternative_name' => 'Asam Folat, Folate',
                'description' => 'Vitamin B9 sangat penting untuk produksi DNA, pembentukan sel darah merah, dan perkembangan janin.',
                'functions' => "• Pembentukan DNA dan RNA\n• Produksi sel darah merah\n• Mencegah cacat tabung saraf pada janin\n• Mendukung pertumbuhan sel",
                'food_sources' => "Sayuran hijau (bayam, asparagus), kacang-kacangan, alpukat, jeruk, hati, sereal fortifikasi",
                'daily_need' => '400 mcg/hari (600 mcg untuk ibu hamil)',
                'deficiency_symptoms' => "• Anemia megaloblastik\n• Kelelahan dan kelemahan\n• Sariawan\n• Cacat tabung saraf pada janin (jika kekurangan saat hamil)",
                'toxicity_symptoms' => "• Dapat menutupi defisiensi vitamin B12\n• Gangguan tidur\n• Iritabilitas",
                'interesting_facts' => "Asam folat sangat penting bagi ibu hamil untuk mencegah spina bifida pada bayi. Suplemen asam folat direkomendasikan sejak sebelum kehamilan.",
                'is_popular' => true,
                'order' => 6,
            ],
            [
                'name' => 'C',
                'slug' => 'vitamin-c',
                'category_id' => $waterSolubleCategory->id,
                'alternative_name' => 'Asam Askorbat',
                'description' => 'Vitamin C adalah antioksidan kuat yang mendukung sistem imun dan produksi kolagen.',
                'functions' => "• Meningkatkan sistem imun\n• Pembentukan kolagen\n• Penyembuhan luka\n• Antioksidan kuat\n• Membantu penyerapan zat besi",
                'food_sources' => "Jeruk, jambu biji, paprika, stroberi, kiwi, brokoli, tomat, bayam",
                'daily_need' => 'Pria: 90 mg/hari, Wanita: 75 mg/hari',
                'deficiency_symptoms' => "• Scurvy (gusi berdarah, luka sulit sembuh)\n• Anemia\n• Kulit kering dan bersisik\n• Kelemahan otot\n• Nyeri sendi",
                'toxicity_symptoms' => "• Diare\n• Mual\n• Kram perut\n• Batu ginjal (pada konsumsi sangat tinggi jangka panjang)",
                'interesting_facts' => "Penyakit scurvy pernah menjadi momok pelaut di abad ke-18. Mereka kemudian menemukan bahwa membawa jeruk lemon dalam perjalanan laut dapat mencegah penyakit ini. Manusia adalah salah satu dari sedikit mamalia yang tidak bisa memproduksi vitamin C sendiri.",
                'is_popular' => true,
                'order' => 7,
            ],
            [
                'name' => 'B Kompleks',
                'slug' => 'vitamin-b-kompleks',
                'category_id' => $waterSolubleCategory->id,
                'alternative_name' => 'Vitamin B1-B12',
                'description' => 'Vitamin B Kompleks adalah kelompok 8 vitamin B yang bekerja sama untuk mengubah makanan menjadi energi.',
                'functions' => "• Metabolisme energi dari karbohidrat, protein, dan lemak\n• Produksi sel darah merah\n• Fungsi sistem saraf\n• Kesehatan kulit, rambut, dan mata\n• Sintesis DNA",
                'food_sources' => "Daging, ikan, telur, produk susu, sayuran hijau, kacang-kacangan, biji-bijian utuh, sereal fortifikasi",
                'daily_need' => 'Bervariasi untuk setiap jenis vitamin B (B1, B2, B3, B5, B6, B7, B9, B12)',
                'deficiency_symptoms' => "Bervariasi tergantung jenis vitamin B:\n• Kelelahan dan kelemahan\n• Anemia\n• Gangguan saraf\n• Masalah kulit\n• Gangguan kognitif",
                'toxicity_symptoms' => "Jarang terjadi karena larut air, kelebihan akan dibuang melalui urin. Namun dosis sangat tinggi dapat menyebabkan:\n• Kerusakan saraf (B6)\n• Gangguan pencernaan",
                'interesting_facts' => "Mengapa tidak semua huruf punya vitamin? Awalnya ada vitamin B1-B22, namun penelitian lebih lanjut menemukan bahwa banyak yang bukan vitamin sebenarnya atau merupakan bentuk lain dari vitamin yang sudah ada. Akhirnya hanya 8 vitamin B yang tersisa: B1, B2, B3, B5, B6, B7, B9, dan B12.",
                'is_popular' => true,
                'order' => 8,
            ],
        ];

        foreach ($vitamins as $vitamin) {
            Vitamin::updateOrCreate(
                ['slug' => $vitamin['slug']],
                $vitamin
            );
        }
    }
}
