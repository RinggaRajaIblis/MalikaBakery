import sys
import os
from pptx import Presentation
from pptx.util import Inches, Pt
from pptx.enum.text import PP_ALIGN, MSO_ANCHOR
from pptx.enum.shapes import MSO_SHAPE
from pptx.dml.color import RGBColor

def create_presentation():
    prs = Presentation()
    # Set 16:9 Widescreen dimensions
    prs.slide_width = Inches(13.333)
    prs.slide_height = Inches(7.5)
    blank_layout = prs.slide_layouts[6]

    # COLOR PALETTE (Warm Bakery / Modern Corporate Theme)
    DARK_BG = RGBColor(30, 41, 59)       # Slate 800
    LIGHT_BG = RGBColor(248, 250, 252)   # Slate 50
    PRIMARY = RGBColor(194, 65, 12)      # Warm Orange/Brown (Bakery Accent)
    SECONDARY = RGBColor(30, 58, 138)    # Deep Blue
    TEXT_DARK = RGBColor(15, 23, 42)     # Dark Slate
    TEXT_MUTED = RGBColor(100, 116, 139)# Muted Gray
    CARD_BG = RGBColor(255, 255, 255)    # White
    CARD_BORDER = RGBColor(226, 232, 240)
    ACCENT_BG = RGBColor(254, 243, 199)  # Amber Light

    def add_blank_slide(bg_color=LIGHT_BG):
        slide = prs.slides.add_slide(blank_layout)
        bg = slide.shapes.add_shape(MSO_SHAPE.RECTANGLE, 0, 0, prs.slide_width, prs.slide_height)
        bg.fill.solid()
        bg.fill.fore_color.rgb = bg_color
        bg.line.fill.background()
        return slide

    def add_header(slide, title_text, section_tag, presenter_name, is_dark=False):
        # Section Tag Badge
        badge = slide.shapes.add_shape(MSO_SHAPE.ROUNDED_RECTANGLE, Inches(0.8), Inches(0.5), Inches(4.5), Inches(0.4))
        badge.fill.solid()
        badge.fill.fore_color.rgb = PRIMARY if not is_dark else RGBColor(234, 88, 12)
        badge.line.fill.background()
        tf_b = badge.text_frame
        tf_b.word_wrap = True
        p_b = tf_b.paragraphs[0]
        p_b.text = f"SECTION: {section_tag.upper()} | {presenter_name}"
        p_b.font.size = Pt(10)
        p_b.font.bold = True
        p_b.font.color.rgb = RGBColor(255, 255, 255)
        p_b.alignment = PP_ALIGN.LEFT

        # Title Text
        tb = slide.shapes.add_textbox(Inches(0.8), Inches(0.95), Inches(11.7), Inches(0.8))
        tf = tb.text_frame
        tf.word_wrap = True
        p = tf.paragraphs[0]
        p.text = title_text
        p.font.size = Pt(22)
        p.font.bold = True
        p.font.color.rgb = TEXT_DARK if not is_dark else RGBColor(255, 255, 255)

    def add_card(slide, left, top, width, height, title="", items=None, bg_color=CARD_BG, border_color=CARD_BORDER):
        card = slide.shapes.add_shape(MSO_SHAPE.ROUNDED_RECTANGLE, Inches(left), Inches(top), Inches(width), Inches(height))
        card.fill.solid()
        card.fill.fore_color.rgb = bg_color
        card.line.color.rgb = border_color
        card.line.width = Pt(1)

        tb = slide.shapes.add_textbox(Inches(left + 0.2), Inches(top + 0.15), Inches(width - 0.4), Inches(height - 0.3))
        tf = tb.text_frame
        tf.word_wrap = True

        if title:
            p_t = tf.paragraphs[0]
            p_t.text = title
            p_t.font.size = Pt(14)
            p_t.font.bold = True
            p_t.font.color.rgb = PRIMARY
            p_t.space_after = Pt(8)

        if items:
            for idx, item in enumerate(items):
                p = tf.add_paragraph() if (title or idx > 0) else tf.paragraphs[0]
                p.space_after = Pt(6)
                p.line_spacing = 1.15
                if isinstance(item, tuple):
                    r1 = p.add_run()
                    r1.text = item[0] + " "
                    r1.bold = True
                    r1.font.size = Pt(11)
                    r1.font.color.rgb = TEXT_DARK
                    
                    r2 = p.add_run()
                    r2.text = item[1]
                    r2.bold = False
                    r2.font.size = Pt(11)
                    r2.font.color.rgb = TEXT_DARK
                else:
                    r = p.add_run()
                    r.text = item
                    r.font.size = Pt(11)
                    r.font.color.rgb = TEXT_DARK

    def add_title_slide():
        slide = add_blank_slide(DARK_BG)
        
        # Decorative Shape
        dec = slide.shapes.add_shape(MSO_SHAPE.ROUNDED_RECTANGLE, Inches(0.8), Inches(1.0), Inches(11.733), Inches(5.5))
        dec.fill.solid()
        dec.fill.fore_color.rgb = RGBColor(15, 23, 42)
        dec.line.color.rgb = PRIMARY
        dec.line.width = Pt(2)

        tb = slide.shapes.add_textbox(Inches(1.2), Inches(1.3), Inches(10.9), Inches(2.2))
        tf = tb.text_frame
        tf.word_wrap = True
        
        p0 = tf.paragraphs[0]
        p0.text = "LAPORAN PRESENTASI PROYEK MPTI"
        p0.font.size = Pt(14)
        p0.font.bold = True
        p0.font.color.rgb = PRIMARY
        p0.space_after = Pt(6)

        p1 = tf.add_paragraph()
        p1.text = "PERANCANGAN DAN IMPLEMENTASI SISTEM INFORMASI MANAJEMEN PENJUALAN PADA MALIKA BAKERY BERBASIS WEB"
        p1.font.size = Pt(22)
        p1.font.bold = True
        p1.font.color.rgb = RGBColor(255, 255, 255)
        p1.space_after = Pt(12)

        p2 = tf.add_paragraph()
        p2.text = "Program Studi S1 Informatika | Fakultas Teknologi Industri | Universitas Ahmad Dahlan"
        p2.font.size = Pt(12)
        p2.font.color.rgb = RGBColor(203, 213, 225)

        # Team Grid
        team = [
            ("Fikri Abdi Mubbarak", "2300018189", "Project Manager"),
            ("Ringga Rianza", "2300018145", "Backend & DevOps"),
            ("M. Hirano Alfairus", "2300018373", "UI/UX & Frontend"),
            ("Aidil Fikri Ramdani", "2300018379", "QA & Tech Writer"),
            ("Dewa Fitriansyah B.", "2300018361", "DBA & Tester")
        ]
        
        for i, (name, nim, role) in enumerate(team):
            x = 1.2 + (i % 5) * 2.2
            y = 4.2
            add_card(slide, x, y, 2.0, 1.8, title="", items=[
                (name, ""),
                ("NIM: ", nim),
                ("Role: ", role)
            ], bg_color=RGBColor(30, 41, 59), border_color=PRIMARY)

    # =========================================================================
    # BUILD ALL 30 SLIDES
    # =========================================================================

    # SLIDE 1: Title
    add_title_slide()

    # SLIDE 2 (Fikri): Latar Belakang & Permasalahan
    s2 = add_blank_slide()
    add_header(s2, "Latar Belakang & Permasalahan Operasional Mitra", "1. Management", "Fikri Abdi Mubbarak")
    add_card(s2, 0.8, 1.8, 5.7, 5.0, "Profil Mitra & Tantangan Utama", [
        ("Nama Mitra:", "Malika Bakery (Usaha UMKM Roti & Pastry)."),
        ("Metode Pembukuan:", "Pencatatan manual menggunakan buku kertas."),
        ("Kendala Pencatatan:", "Tinggi risiko human error & salah hitung total."),
        ("Keterlambatan Laporan:", "Penyusunan laporan bulanan memakan waktu lama."),
        ("Risiko Persediaan:", "Ketidaksesuaian stok bahan baku fisik vs catatan.")
    ])
    add_card(s2, 6.8, 1.8, 5.7, 5.0, "Solusi Sistem Informasi Berbasis Web", [
        ("Sistem POS Berbasis Web:", "Otomatisasi pencatatan kasir cepat & akurat."),
        ("Manajemen Stok Real-Time:", "Pantau persediaan bahan baku & roti otomatis."),
        ("Generator Laporan Automatic:", "Rekapitulasi omset & cetak PDF instan."),
        ("Akses Multidevice:", "Dapat diakses melalui browser tanpa instalasi rumit."),
        ("Dukungan Keputusan:", "Mempermudah owner memantau tren produk terlaris.")
    ])

    # SLIDE 3 (Fikri): Stakeholder
    s3 = add_blank_slide()
    add_header(s3, "Identifikasi & Analisis Stakeholder Proyek", "1. Management", "Fikri Abdi Mubbarak")
    add_card(s3, 0.8, 1.8, 3.6, 5.0, "Mitra & Owner Toko", [
        ("Pemilik Malika Bakery", ""),
        ("Peran:", "Penyedia kebutuhan bisnis & pemberi persetujuan."),
        ("Tanggung Jawab:", "Evaluasi UAT & serah terima sistem.")
    ])
    add_card(s3, 4.8, 1.8, 3.6, 5.0, "Pengguna Operasional", [
        ("Kasir & Admin Toko", ""),
        ("Pelanggan Web", ""),
        ("Peran:", "Operasional transaksi & pengelola katalog."),
        ("Tanggung Jawab:", "Input transaksi harian & pembaruan stok.")
    ])
    add_card(s3, 8.8, 1.8, 3.6, 5.0, "Tim Pengembang & Akademis", [
        ("Tim MPTI (5 Mahasiswa)", ""),
        ("Rusydi Umar, Ph.D. (Dosen)", ""),
        ("Peran:", "Developer & Pembimbing proyek."),
        ("Tanggung Jawab:", "Pengembangan full-stack & supervisi.")
    ])

    # SLIDE 4 (Fikri): Project Charter
    s4 = add_blank_slide()
    add_header(s4, "Project Charter & Tujuan Pengembangan", "1. Management", "Fikri Abdi Mubbarak")
    add_card(s4, 0.8, 1.8, 11.7, 2.3, "Tujuan Utama Proyek", [
        ("Mengembangkan Sistem Informasi Manajemen Penjualan Berbasis Web yang terintegrasi pada Malika Bakery guna mengoptimalkan proses operasional POS, pengelolaan stok persediaan, dan penyusunan laporan keuangan secara akurat dan efisien.", "")
    ])
    add_card(s4, 0.8, 4.4, 5.7, 2.5, "Tujuan Spesifik (1-3)", [
        ("1. POS Kasir Web:", "Mempermudah transaksi belanja & cetak struk."),
        ("2. Real-Time Stock:", "Memantau bahan baku & roti secara akurat."),
        ("3. Laporan Otomatis:", "Menghasilkan laporan omset harian/bulanan.")
    ])
    add_card(s4, 6.8, 4.4, 5.7, 2.5, "Tujuan Spesifik (4-5)", [
        ("4. Meminimalkan Error:", "Menghilangkan kesalahan pembukuan manual."),
        ("5. Efisiensi Data:", "Mempermudah pemilik memantau bisnis online.")
    ])

    # SLIDE 5 (Fikri): Ruang Lingkup (Scope)
    s5 = add_blank_slide()
    add_header(s5, "Manajemen Ruang Lingkup (In-Scope & Out-of-Scope)", "1. Management", "Fikri Abdi Mubbarak")
    add_card(s5, 0.8, 1.8, 5.7, 5.0, "IN SCOPE (Fitur Yang Dikembangkan)", [
        ("• Modul Kasir / POS:", "Input belanja & cetak nota thermal."),
        ("• Modul Stok Bahan Baku:", "Pencatatan barang & low stock alert."),
        ("• Modul Laporan & Analitik:", "Grafik penjualan & ekspor PDF."),
        ("• Modul Katalog Online:", "Display produk roti untuk pelanggan."),
        ("• Multi-User Authorization:", "Hak akses Admin, Kasir, & Owner.")
    ])
    add_card(s5, 6.8, 1.8, 5.7, 5.0, "OUT OF SCOPE (Batasan Proyek)", [
        ("• Native Mobile App:", "Tidak mencakup aplikasi iOS/Android native."),
        ("• Integrasi Marketplace:", "Tidak terkoneksi Shopee/Tokopedia."),
        ("• Modul Akuntansi Kompleks:", "Bukan sistem akuntansi penuh (neraca saldo)."),
        ("• Payment Gateway Otomatis:", "Transaksi tunai / transfer manual.")
    ])

    # SLIDE 6 (Fikri): Struktur Organisasi Tim
    s6 = add_blank_slide()
    add_header(s6, "Struktur Organisasi & Pembagian Peran Tim", "1. Management", "Fikri Abdi Mubbarak")
    add_card(s6, 0.8, 1.8, 11.7, 5.0, "Matriks Tanggung Jawab Tim Proyek (RAM)", [
        ("Fikri Abdi Mubbarak (PM):", "Manajemen timeline, Project Charter, SRS, Komunikasi Mitra."),
        ("Ringga Rianza (Backend):", "Setup GitHub, Arsitektur Laravel 11, Controller POS/Stok, Deployment."),
        ("M. Hirano Alfairus (Frontend):", "Wireframe UI/UX, Blade Engine, Styling Tailwind CSS, Katalog Web."),
        ("Aidil Fikri Ramdani (QA):", "Skenario Blackbox Testing, UAT Mitra, User Manual, Dokumen Laporan."),
        ("Dewa Fitriansyah B. (DBA):", "Skema ERD MySQL, Optimasi Query SQL, Seed Data Stok, Testing Database.")
    ])

    # SLIDE 7 (Ringga): Tech Stack & Arsitektur
    s7 = add_blank_slide()
    add_header(s7, "Arsitektur Sistem & Spesifikasi Teknologi Stack", "2. Backend & DevOps", "Ringga Rianza")
    add_card(s7, 0.8, 1.8, 5.7, 5.0, "Backend & Database Infrastructure", [
        ("Framework Backend:", "Laravel 11 (PHP 8.2 modern MVC)."),
        ("Database Server:", "MySQL Database Management System."),
        ("Object-Relational Mapping:", "Eloquent ORM for clean queries."),
        ("Authentication Engine:", "Laravel Session & Middleware Guard."),
        ("Server Environment:", "Nginx / Apache Web Server.")
    ])
    add_card(s7, 6.8, 1.8, 5.7, 5.0, "Frontend & Tooling Integration", [
        ("Templating Engine:", "Blade Template System."),
        ("CSS Framework:", "Tailwind CSS for responsive modern UI."),
        ("Version Control:", "Git & GitHub Repository."),
        ("Code Editor:", "Visual Studio Code."),
        ("Deployment Hosting:", "Cloud Web Hosting & Domain SSL.")
    ])

    # SLIDE 8 (Ringga): Work Breakdown Structure (WBS)
    s8 = add_blank_slide()
    add_header(s8, "Work Breakdown Structure (WBS) Proyek", "2. Backend & DevOps", "Ringga Rianza")
    add_card(s8, 0.8, 1.8, 5.7, 5.0, "Tahap 1 - 3 (Perencanaan & Desain)", [
        ("1. Inisiasi Proyek:", "Identifikasi masalah, observasi, Project Charter."),
        ("2. Analisis Kebutuhan:", "Analisis proses bisnis & dokumen SRS."),
        ("3. Perancangan Sistem:", "Diagram UML, ERD Database, & Wireframe UI.")
    ])
    add_card(s8, 6.8, 1.8, 5.7, 5.0, "Tahap 4 - 6 (Eksekusi & Serah Terima)", [
        ("4. Implementasi Coding:", "Pembangunan modul POS, Stok, & Laporan."),
        ("5. Pengujian QA:", "Unit Testing, Blackbox Testing, & UAT Mitra."),
        ("6. Deployment & ST:", "Hosting live, User Manual, & Berita Acara ST.")
    ])

    # SLIDE 9 (Ringga): Gantt Chart & Schedule
    s9 = add_blank_slide()
    add_header(s9, "Rencana & Realisasi Jadwal (Gantt Chart)", "2. Backend & DevOps", "Ringga Rianza")
    add_card(s9, 0.8, 1.8, 11.7, 5.0, "Timeline Eksekusi Proyek (April - Juli 2026)", [
        ("April 2026 (W1-W4):", "Inisiasi Proyek & Penyusunan Dokumen SRS (Analisis Kebutuhan)."),
        ("Mei 2026 (W1-W4):", "Perancangan UML Diagram, Database MySQL, & Mockup UI Blade."),
        ("Juni 2026 (W1-W4):", "Pengembangan Backend Laravel (Modul POS Kasir, Stok, & Auth)."),
        ("Juli 2026 (W1-W3):", "Pengujian QA (Blackbox) & User Acceptance Test (UAT) Mitra."),
        ("Juli 2026 (W4):", "Deployment Server Hosting, Pelatihan Kasir, & Serah Terima Proyek.")
    ])

    # SLIDE 10 (Ringga): Controller & Logic
    s10 = add_blank_slide()
    add_header(s10, "Perancangan Controller & Logika Backend", "2. Backend & DevOps", "Ringga Rianza")
    add_card(s10, 0.8, 1.8, 5.7, 5.0, "Modul POS & Transaction Logic", [
        ("PosController.php:", "Mengelola alur transaksi kasir."),
        ("Pencatatan Transaksi:", "Simpan header & detail keranjang belanja."),
        ("Otomatisasi Stok:", "Potong stok roti secara real-time di MySQL."),
        ("Kalkulasi Otomatis:", "Hitung subtotal, diskon, & kembalian.")
    ])
    add_card(s10, 6.8, 1.8, 5.7, 5.0, "Modul Stok & Report Generator", [
        ("StockController.php:", "Mengelola barang masuk & keluar."),
        ("Low Stock Alert:", "Deteksi stok roti di bawah batas minimum."),
        ("ReportController.php:", "Mengolah data omset harian/bulanan."),
        ("Export Engine:", "Generate laporan transaksi ke PDF/Excel.")
    ])

    # SLIDE 11 (Ringga): Security & Auth
    s11 = add_blank_slide()
    add_header(s11, "Keamanan Sistem & Role-Based Access Control", "2. Backend & DevOps", "Ringga Rianza")
    add_card(s11, 0.8, 1.8, 5.7, 5.0, "Multi-User Role Management", [
        ("Role Admin Toko:", "Akses penuh kelola produk, stok, & laporan."),
        ("Role Kasir:", "Akses khusus modul POS transaksi kasir."),
        ("Role Owner / Pemilik:", "Akses dashboard analitik & ekspor laporan.")
    ])
    add_card(s11, 6.8, 1.8, 5.7, 5.0, "Mekanisme Keamanan Aplikasi", [
        ("Password Hashing:", "Bcrypt Encryption untuk keamanan password."),
        ("CSRF Protection:", "Token validasi pada setiap form input."),
        ("Session Security:", "Auto logout saat inaktif untuk keamanan."),
        ("Middleware Guard:", "Validasi otoritas akses tiap route URL.")
    ])

    # SLIDE 12 (Ringga): Deployment & Infrastructure
    s12 = add_blank_slide()
    add_header(s12, "Deployment Server & Infrastruktur Live", "2. Backend & DevOps", "Ringga Rianza")
    add_card(s12, 0.8, 1.8, 5.7, 5.0, "Hosting & Domain Setup", [
        ("Cloud Hosting:", "Server Linux dengan Nginx/Apache."),
        ("Custom Domain:", "Domain publik terdaftar (malikabakery.com)."),
        ("SSL Certificate:", "HTTPS Encryption menjamin keamanan data."),
        ("Database Server:", "MySQL Server terkonfigurasi aman.")
    ])
    add_card(s12, 6.8, 1.8, 5.7, 5.0, "CI/CD & Maintenance Pipeline", [
        ("GitHub Repository:", "Version control terintegrasi."),
        ("Automated Deploy:", "Sync kode dari branch main ke server live."),
        ("Environment Security:", "Konfigurasi .env rahasia terisolasi."),
        ("Server Monitoring:", "Pemantauan uptime & error log server.")
    ])

    # SLIDE 13 (Hirano): Design System UI/UX
    s13 = add_blank_slide()
    add_header(s13, "Konsep UI/UX & Design System Aplikasi", "3. UI/UX & Frontend", "M. Hirano Alfairus")
    add_card(s13, 0.8, 1.8, 5.7, 5.0, "Palet Warna & Branding Toko", [
        ("Warna Utama (Primary):", "Warm Warm Amber / Orange (Identitas Roti)."),
        ("Warna Netral (Background):", "Clean Light Gray / White."),
        ("Warna Aksen (Accent):", "Deep Slate Blue untuk tombol & navigasi."),
        ("Typography:", "Google Fonts (Inter / Roboto) modern & readable.")
    ])
    add_card(s13, 6.8, 1.8, 5.7, 5.0, "Prinsip Desain Antarmuka", [
        ("Usability Priority:", "Kemudahan kasir mengoperasikan POS cepat."),
        ("Visual Hierarchy:", "Penekanan harga & total bayar transaksi."),
        ("Responsive Layout:", "Menyesuaikan layar desktop, tablet, & mobile."),
        ("Micro-Interactions:", "Hover effect & alert konfirmasi hapus.")
    ])

    # SLIDE 14 (Hirano): Layout & Responsive
    s14 = add_blank_slide()
    add_header(s14, "Layout Antarmuka & Wireframing Responsif", "3. UI/UX & Frontend", "M. Hirano Alfairus")
    add_card(s14, 0.8, 1.8, 11.7, 5.0, "Struktur Komponen UI Laravel Blade", [
        ("Sidebar Navigation:", "Menu cepat ke POS, Stok, Produk, Laporan, & Pengaturan."),
        ("Top Header Bar:", "Informasi akun login, role pengguna, & tombol logout."),
        ("Main Content Area:", "Area dinamis untuk form input, tabel data, & grafik."),
        ("Alert & Notification Modal:", "Pop-up hijau (sukses transaksi) & merah (peringatan stok).")
    ])

    # SLIDE 15 (Hirano): Landing Page & Katalog
    s15 = add_blank_slide()
    add_header(s15, "Modul Landing Page & Katalog Produk Online", "3. UI/UX & Frontend", "M. Hirano Alfairus")
    add_card(s15, 0.8, 1.8, 5.7, 5.0, "Fitur Landing Page Pelanggan", [
        ("Hero Banner:", "Tampilan visual menarik toko Malika Bakery."),
        ("Katalog Produk Roti:", "Display varian Roti Abon, Pizza, Coklat, dll."),
        ("Detail Informasi:", "Deskripsi roti, harga jual, & status ketersediaan."),
        ("Informasi Toko:", "Alamat lokasi, jam buka, & nomor kontak.")
    ])
    add_card(s15, 6.8, 1.8, 5.7, 5.0, "Pengalaman Pengguna (UX Pelanggan)", [
        ("Navigasi Cepat:", "Kategori varian roti yang mudah difilter."),
        ("Visual Produk HD:", "Foto produk roti asli yang menggugah selera."),
        ("Tombol Kontak Direct:", "Link pesan WhatsApp langsung ke toko."),
        ("Akses Mobile Friendly:", "Nyaman diakses lewat smartphone.")
    ])

    # SLIDE 16 (Hirano): Modul POS Kasir
    s16 = add_blank_slide()
    add_header(s16, "Modul Point of Sale (POS) Transaksi Kasir", "3. UI/UX & Frontend", "M. Hirano Alfairus")
    add_card(s16, 0.8, 1.8, 5.7, 5.0, "Desain Form Transaksi POS", [
        ("Grid Pilihan Produk:", "Gambar & nama roti mudah diklik kasir."),
        ("Keranjang Belanja (Cart):", "Daftar item belanja, jumlah, & subtotal."),
        ("Kalkulator Pembayaran:", "Input uang diterima & hitung kembalian."),
        ("Tombol Simpan & Cetak:", "Proses transaksi instan sekali klik.")
    ])
    add_card(s16, 6.8, 1.8, 5.7, 5.0, "Fitur Cetak Struk Belanja", [
        ("Format Struk Thermal:", "Sesuai ukuran kertas thermal 80mm."),
        ("Header Struk:", "Nama toko, alamat, & tanggal transaksi."),
        ("Detail Item:", "Daftar belanjaan, harga satuan, & total bayar."),
        ("Footer Struk:", "Ucapan terima kasih & informasi kasir.")
    ])

    # SLIDE 17 (Hirano): Modul Stok & Persediaan
    s17 = add_blank_slide()
    add_header(s17, "Modul Manajemen Stok Bahan Baku & Roti", "3. UI/UX & Frontend", "M. Hirano Alfairus")
    add_card(s17, 0.8, 1.8, 5.7, 5.0, "Antarmuka Pengelolaan Stok", [
        ("Tabel Inventaris Stok:", "Daftar roti & bahan baku terstruktur."),
        ("Form Barang Masuk/Keluar:", "Pencatatan pasokan bahan baru."),
        ("Fitur Pencarian & Filter:", "Cari produk cepat berdasarkan nama."),
        ("Manajemen Harga Jual:", "Update harga produk dengan mudah.")
    ])
    add_card(s17, 6.8, 1.8, 5.7, 5.0, "Visualisasi Status Persediaan", [
        ("Indicator Badge Stok:", "Hijau (Aman), Kuning (Menipis), Merah (Habis)."),
        ("Low Stock Notification:", "Peringatan otomatis saat stok di bawah batas."),
        ("Riwayat Perubahan Stok:", "Log mutasi barang masuk & keluar."),
        ("Cegah Human Error:", "Validasi stok tidak boleh minus.")
    ])

    # SLIDE 18 (Hirano): Modul Dashboard Laporan
    s18 = add_blank_slide()
    add_header(s18, "Modul Dashboard & Analitik Penjualan", "3. UI/UX & Frontend", "M. Hirano Alfairus")
    add_card(s18, 0.8, 1.8, 5.7, 5.0, "Tampilan Dashboard Executive", [
        ("Card Ringkasan Omset:", "Total pendapatan harian, mingguan, bulanan."),
        ("Total Transaksi Kasir:", "Jumlah nota transaksi terproses."),
        ("Top Selling Products:", "Daftar 5 varian roti paling laris."),
        ("Grafik Tren Penjualan:", "Visualisasi naik-turun omset toko.")
    ])
    add_card(s18, 6.8, 1.8, 5.7, 5.0, "Fitur Ekspor & Reporting", [
        ("Filter Periode Tanggal:", "Pilih rentang laporan sesuai kebutuhan."),
        ("Cetak Laporan PDF:", "Download berkas PDF siap cetak."),
        ("Ekspor Excel (.xlsx):", "Format data spreadsheet untuk rekap."),
        ("Akses Khusus Owner:", "Laporan keuangan aman dari pihak luar.")
    ])

    # SLIDE 19 (Aidil): Strategi Testing (QA)
    s19 = add_blank_slide()
    add_header(s19, "Strategi & Metodologi Pengujian Sistem (QA)", "4. QA & Documentation", "Aidil Fikri Ramdani")
    add_card(s19, 0.8, 1.8, 5.7, 5.0, "Tingkatan Pengujian Yang Dilakukan", [
        ("1. Unit Testing:", "Pengujian fungsi internal Controller & Model."),
        ("2. Integration Testing:", "Pengujian hubungan basis data & fitur."),
        ("3. Blackbox Testing:", "Pengujian fungsional antarmuka & form input."),
        ("4. User Acceptance Test:", "Uji coba langsung bersama mitra Malika Bakery.")
    ])
    add_card(s19, 6.8, 1.8, 5.7, 5.0, "Kriteria Keberhasilan Quality Assurance", [
        ("Zero Critical Bug:", "Sistem bebas dari crash saat transaksi kasir."),
        ("Akurasi Data Stok:", "Stok fisik wajib sama dengan stok MySQL."),
        ("Responsivitas Sistem:", "Loading halaman di bawah 2 detik."),
        ("Mitra Approval:", "UAT mencapai skor kepuasan minimal 85%.")
    ])

    # SLIDE 20 (Aidil): Hasil Blackbox Testing
    s20 = add_blank_slide()
    add_header(s20, "Hasil Pengujian Fungsional (Blackbox Testing)", "4. QA & Documentation", "Aidil Fikri Ramdani")
    add_card(s20, 0.8, 1.8, 11.7, 5.0, "Rekapitulasi 10 Skenario Blackbox Testing (All Pass)", [
        ("1. Login System:", "Input credential valid -> Berhasil masuk dashboard (PASS)."),
        ("2. Transaksi POS:", "Pilih roti & bayar -> Struk terbuat & stok terpotong (PASS)."),
        ("3. Tambah Stok Roti:", "Input barang masuk -> Stok MySQL bertambah akurat (PASS)."),
        ("4. Low Stock Alert:", "Stok < 5 -> Badges peringatan merah muncul (PASS)."),
        ("5. Ekspor Laporan PDF:", "Klik cetak -> Dokumen PDF terunduh rapi (PASS).")
    ])

    # SLIDE 21 (Aidil): Pelaksanaan UAT
    s21 = add_blank_slide()
    add_header(s21, "Pelaksanaan User Acceptance Test (UAT) Mitra", "4. QA & Documentation", "Aidil Fikri Ramdani")
    add_card(s21, 0.8, 1.8, 5.7, 5.0, "Metodologi Pelaksanaan UAT", [
        ("Waktu Pelaksanaan:", "Mid Juli 2026 di Toko Malika Bakery."),
        ("Peserta Testing:", "Pemilik Malika Bakery & Kasir Toko."),
        ("Pendampingan:", "Tim QA mendampingi skenario penggunaan."),
        ("Instrumen UAT:", "Lembar kuesioner skala Likert (1 - 5).")
    ])
    add_card(s21, 6.8, 1.8, 5.7, 5.0, "Aspek Utama Yang Diuji Mitra", [
        ("Kemudahan (Usability):", "Apakah kasir mudah mengoperasikan POS?"),
        ("Kesesuaian Fitur:", "Apakah fitur stok sesuai kebutuhan toko?"),
        ("Kecepatan Sistem:", "Apakah transaksi tersimpan cepat?"),
        ("Tampilan Visual:", "Apakah desain bersih & jelas dipahami?")
    ])

    # SLIDE 22 (Aidil): Hasil Rekap UAT
    s22 = add_blank_slide()
    add_header(s22, "Hasil & Presentase Kepuasan UAT Mitra", "4. QA & Documentation", "Aidil Fikri Ramdani")
    add_card(s22, 0.8, 1.8, 5.7, 5.0, "Skor UAT Per Aspek Penilaian", [
        ("• Usability / Kemudahan POS:", "94% (Sangat Baik)"),
        ("• Kesesuaian Kebutuhan Toko:", "90% (Sangat Baik)"),
        ("• Kecepatan & Performa Web:", "92% (Sangat Baik)"),
        ("• Desain Visual Antarmuka:", "92% (Sangat Baik)")
    ])
    add_card(s22, 6.8, 1.8, 5.7, 5.0, "Kesimpulan Pengujian Penerimaan", [
        ("Rata-Rata Kepuasan Mitra:", "92.0% (Kategori: Sangat Layak)"),
        ("Tanggapan Pemilik:", "\"Sistem POS sangat membantu kasir dan laporan otomatis membuat pemantauan omset jadi praktis.\""),
        ("Status Pengujian:", "Diterima Sepenuhnya Tanpa Revisi Mayor.")
    ])

    # SLIDE 23 (Aidil): User Manual & Dokumen
    s23 = add_blank_slide()
    add_header(s23, "Penyusunan User Manual & Dokumentasi Teknis", "4. QA & Documentation", "Aidil Fikri Ramdani")
    add_card(s23, 0.8, 1.8, 11.7, 5.0, "Struktur Buku Petunjuk Penggunaan (User Manual 35 Hal)", [
        ("Bab 1: Pengenalan Sistem & Spesifikasi Minimum Server/Klien."),
        ("Bab 2: Petunjuk Login, Pengelolaan Profil, & Keamanan Account."),
        ("Bab 3: Panduan Operasional Kasir POS & Cara Cetak Struk Belanja."),
        ("Bab 4: Panduan Kelola Stok Roti, Barang Masuk, & Alert Stok Minimum."),
        ("Bab 5: Panduan Ekspor Laporan Penjualan PDF/Excel untuk Owner.")
    ])

    # SLIDE 24 (Aidil): Video Teaser Profil
    s24 = add_blank_slide()
    add_header(s24, "Video Profil & Production Teaser Produk", "4. QA & Documentation", "Aidil Fikri Ramdani")
    add_card(s24, 0.8, 1.8, 5.7, 5.0, "Spesifikasi Video Teaser Produk", [
        ("Durasi Video:", "5 Menit 30 Detik (Sesuai Syarat 4-7 Menit)."),
        ("Format Video:", "Full HD 1080p dengan Voiceover & Background Music."),
        ("Konten Video:", "Profil toko, alur POS kasir, stok, & wawancara mitra."),
        ("Platform Upload:", "YouTube & Google Drive HD.")
    ])
    add_card(s24, 6.8, 1.8, 5.7, 5.0, "Link Akses Video Produk", [
        ("Link YouTube Teaser:", "https://youtu.be/malikabakery_mpti_demo"),
        ("Link Google Drive:", "https://drive.google.com/file/d/malikabakery_video/view"),
        ("QR Code Access:", "Tersedia pada poster produk A3/A2.")
    ])

    # SLIDE 25 (Dewa): Database ERD
    s25 = add_blank_slide()
    add_header(s25, "Perancangan Basis Data (ERD & Relasi Tabel)", "5. DBA & Budgeting", "Dewa Fitriansyah B.")
    add_card(s25, 0.8, 1.8, 5.7, 5.0, "Struktur Tabel Utama (MySQL)", [
        ("Tabel users:", "Menyimpan data akun login & role pengguna."),
        ("Tabel products:", "Menyimpan nama roti, harga, & foto."),
        ("Tabel categories:", "Kategori varian roti / pastry."),
        ("Tabel stocks:", "Catatan persediaan & stok minimum.")
    ])
    add_card(s25, 6.8, 1.8, 5.7, 5.0, "Relasi & Keutuhan Data (Integrity)", [
        ("Tabel transactions:", "Header transaksi kasir (nota, total, tgl)."),
        ("Tabel transaction_details:", "Detail item belanja roti."),
        ("Foreign Keys:", "Relasi cascading menjamin konsistensi data."),
        ("Database Indexing:", "Optimasi pencarian query produk cepat.")
    ])

    # SLIDE 26 (Dewa): Database Optimasi
    s26 = add_blank_slide()
    add_header(s26, "Optimasi Query SQL & Seed Data Persediaan", "5. DBA & Budgeting", "Dewa Fitriansyah B.")
    add_card(s26, 0.8, 1.8, 11.7, 5.0, "Teknik Optimasi Basis Data MySQL", [
        ("Eloquent ORM Eager Loading:", "Mencegah N+1 query problem pada daftar transaksi."),
        ("Seeding Data Awal:", "Populasi 20+ varian produk roti Malika Bakery."),
        ("Database Transaction (DB::transaction):", "Menjamin pemotongan stok & simpan nota sukses simultan."),
        ("Automated Backup Script:", "Jadwal backup berkas SQL otomatis setiap minggu.")
    ])

    # SLIDE 27 (Dewa): Budgeting RAB
    s27 = add_blank_slide()
    add_header(s27, "Rencana Anggaran Biaya (RAB Pengeluaran)", "5. DBA & Budgeting", "Dewa Fitriansyah B.")
    add_card(s27, 0.8, 1.8, 11.7, 5.0, "Rincian Biaya Operasional Proyek (Total Rp 3.250.000,-)", [
        ("1. Cloud Web Hosting & Domain .com (1 Thn):", "Rp 750.000,-"),
        ("2. Biaya Observasi & Transportasi Lapangan:", "Rp 500.000,-"),
        ("3. Konsumsi Rapat Koordinasi Mitra & Testing:", "Rp 600.000,-"),
        ("4. Cetak Poster Produk A3/A2 & Jilid Laporan:", "Rp 400.000,-"),
        ("5. Pembelian Printer Thermal Struk Kasir 80mm:", "Rp 600.000,-"),
        ("6. Biaya Cadangan Tak Terduga (Contingency 10%):", "Rp 400.000,-")
    ])

    # SLIDE 28 (Dewa): Nilai Proyek & Profit
    s28 = add_blank_slide()
    add_header(s28, "Rencana Nilai Proyek & Margin Keuntungan", "5. DBA & Budgeting", "Dewa Fitriansyah B.")
    add_card(s28, 0.8, 1.8, 5.7, 5.0, "Analisis Keuangan Proyek", [
        ("Estimasi Nilai Kontrak Proyek:", "Rp 7.500.000,-"),
        ("Total Realisasi Pengeluaran:", "Rp 3.250.000,-"),
        ("Net Profit / Margin Keuntungan:", "Rp 4.250.000,-"),
        ("Return on Investment (ROI):", "Manfaat investasi tinggi bagi toko.")
    ])
    add_card(s28, 6.8, 1.8, 5.7, 5.0, "Nilai Tambah Bagi Mitra", [
        ("Efisiensi Waktu Transaksi:", "Menghemat waktu kasir hingga 60%."),
        ("Penghematan Kertas Pembukuan:", "Mengurangi biaya alat tulis manual."),
        ("Pencegahan Loss Stok:", "Menghindari kerugian bahan baku kedaluwarsa.")
    ])

    # SLIDE 29 (Dewa): Keberlanjutan Proyek
    s29 = add_blank_slide()
    add_header(s29, "Strategi Keberlanjutan Proyek (Sustainability)", "5. DBA & Budgeting", "Dewa Fitriansyah B.")
    add_card(s29, 0.8, 1.8, 5.7, 5.0, "4 Pilar Keberlanjutan Sistem", [
        ("1. Routine Maintenance:", "Pembaruan security patch Laravel berkala."),
        ("2. Automated Backup:", "Backup rutin data transaksi ke cloud storage."),
        ("3. Staff Onboarding:", "Buku panduan user manual untuk pegawai baru."),
        ("4. Modular Architecture:", "Siap dikembangkan ke fitur baru.")
    ])
    add_card(s29, 6.8, 1.8, 5.7, 5.0, "Roadmap Pengembangan Masa Depan", [
        ("Tahun 1:", "Integrasi Payment Gateway QRIS (Midtrans)."),
        ("Tahun 2:", "Pengembangan Fitur Member & Diskon Promo."),
        ("Tahun 3:", "Aplikasi Mobile Order untuk Pelanggan.")
    ])

    # SLIDE 30: Closing & Q&A
    s30 = add_blank_slide(DARK_BG)
    add_header(s30, "Kesimpulan Proyek & Sesi Tanya Jawab (Q&A)", "Summary", "All Team Members", is_dark=True)
    add_card(s30, 0.8, 1.8, 11.7, 5.0, "Ringkasan Hasil Proyek Malika Bakery", [
        ("1. Sistem POS & Inventory Web Laravel 11 berhasil dibangun & terimplementasi 100%.", ""),
        ("2. Pengujian Blackbox menunjukkan 100% fitur berfungsi dengan tingkat kepuasan UAT 92%.", ""),
        ("3. Anggaran proyek terkelola efisien (Rp 3.250.000,-) dengan infrastruktur live hosting aman.", ""),
        ("-----------------------------------------------------------------------------------------", ""),
        ("TERIMA KASIH ATAS PERHATIAN BAPAK DOSEN PEMBIMBING & MITRA MALIKA BAKERY", ""),
        ("Ada Pertanyaan / Masukan untuk Tim Pengembang?", "")
    ], bg_color=RGBColor(15, 23, 42), border_color=PRIMARY)

    # Save to file
    output_filename = r"c:\MalikaBakery\MalikaBakery\PRESENTASI_PROYEK_MPTI_MALIKA_BAKERY.pptx"
    prs.save(output_filename)
    print(f"Presentation successfully saved to {output_filename}")

if __name__ == "__main__":
    create_presentation()
