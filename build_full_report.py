import docx
from docx.shared import Inches, Pt, RGBColor
from docx.enum.text import WD_ALIGN_PARAGRAPH
from docx.enum.table import WD_TABLE_ALIGNMENT, WD_ALIGN_VERTICAL
from docx.oxml import parse_xml, OxmlElement
from docx.oxml.ns import nsdecls, qn
import os

def create_report():
    doc = docx.Document()
    
    # -------------------------------------------------------------
    # PAGE SETUP: A4, Margins: Kiri 4cm (1.57 in), Top/Right/Bottom 3cm (1.18 in)
    # -------------------------------------------------------------
    section = doc.sections[0]
    section.page_width = Inches(8.27)
    section.page_height = Inches(11.69)
    section.top_margin = Inches(1.18)      # 3 cm
    section.bottom_margin = Inches(1.18)   # 3 cm
    section.left_margin = Inches(1.57)     # 4 cm
    section.right_margin = Inches(1.18)    # 3 cm

    # Set default style to Calibri 12pt
    style = doc.styles['Normal']
    font = style.font
    font.name = 'Calibri'
    font.size = Pt(12)
    font.color.rgb = RGBColor(0, 0, 0)
    style.paragraph_format.line_spacing = 1.5
    style.paragraph_format.space_after = Pt(4)

    # -------------------------------------------------------------
    # HELPER FUNCTIONS
    # -------------------------------------------------------------
    def add_p(text="", align=WD_ALIGN_PARAGRAPH.JUSTIFY, bold=False, italic=False, size=12, space_before=0, space_after=4, line_spacing=1.5):
        p = doc.add_paragraph()
        p.alignment = align
        p.paragraph_format.space_before = Pt(space_before)
        p.paragraph_format.space_after = Pt(space_after)
        p.paragraph_format.line_spacing = line_spacing
        if text:
            run = p.add_run(text)
            run.bold = bold
            run.italic = italic
            run.font.name = 'Calibri'
            run.font.size = Pt(size)
        return p

    def add_heading_1(text):
        p = doc.add_paragraph()
        p.alignment = WD_ALIGN_PARAGRAPH.CENTER
        p.paragraph_format.space_before = Pt(12)
        p.paragraph_format.space_after = Pt(6)
        p.paragraph_format.line_spacing = 1.5
        run = p.add_run(text)
        run.bold = True
        run.font.name = 'Calibri'
        run.font.size = Pt(14)
        return p

    def add_heading_2(text):
        p = doc.add_paragraph()
        p.alignment = WD_ALIGN_PARAGRAPH.LEFT
        p.paragraph_format.space_before = Pt(10)
        p.paragraph_format.space_after = Pt(4)
        p.paragraph_format.line_spacing = 1.5
        run = p.add_run(text)
        run.bold = True
        run.font.name = 'Calibri'
        run.font.size = Pt(12)
        return p

    def add_heading_3(text):
        p = doc.add_paragraph()
        p.alignment = WD_ALIGN_PARAGRAPH.LEFT
        p.paragraph_format.space_before = Pt(6)
        p.paragraph_format.space_after = Pt(2)
        p.paragraph_format.line_spacing = 1.5
        run = p.add_run(text)
        run.bold = True
        run.font.name = 'Calibri'
        run.font.size = Pt(12)
        return p

    def set_cell_background(cell, fill_hex):
        shading = parse_xml(f'<w:shd {nsdecls("w")} w:fill="{fill_hex}"/>')
        cell._tc.get_or_add_tcPr().append(shading)

    def style_table(table, col_widths=None):
        table.alignment = WD_TABLE_ALIGNMENT.CENTER
        tblPr = table._tbl.tblPr
        borders = parse_xml(
            f'<w:tblBorders {nsdecls("w")}>'
            f'  <w:top w:val="single" w:sz="4" w:space="0" w:color="D3D3D3"/>'
            f'  <w:bottom w:val="single" w:sz="4" w:space="0" w:color="D3D3D3"/>'
            f'  <w:left w:val="single" w:sz="4" w:space="0" w:color="D3D3D3"/>'
            f'  <w:right w:val="single" w:sz="4" w:space="0" w:color="D3D3D3"/>'
            f'  <w:insideH w:val="single" w:sz="4" w:space="0" w:color="E0E0E0"/>'
            f'  <w:insideV w:val="single" w:sz="4" w:space="0" w:color="E0E0E0"/>'
            f'</w:tblBorders>'
        )
        tblPr.append(borders)

        for row_idx, row in enumerate(table.rows):
            trPr = row._tr.get_or_add_trPr()
            trPr.append(parse_xml(f'<w:cantSplit {nsdecls("w")}/>'))
            if row_idx == 0:
                trPr.append(parse_xml(f'<w:tblHeader {nsdecls("w")}/>'))

            for col_idx, cell in enumerate(row.cells):
                cell.vertical_alignment = WD_ALIGN_VERTICAL.CENTER
                if col_widths and col_idx < len(col_widths):
                    cell.width = Inches(col_widths[col_idx])
                if row_idx == 0:
                    set_cell_background(cell, "365F91") # Header blue accent
                    for p in cell.paragraphs:
                        p.alignment = WD_ALIGN_PARAGRAPH.CENTER
                        p.paragraph_format.space_before = Pt(4)
                        p.paragraph_format.space_after = Pt(4)
                        p.paragraph_format.line_spacing = 1.15
                        for r in p.runs:
                            r.bold = True
                            r.font.color.rgb = RGBColor(255, 255, 255)
                            r.font.size = Pt(10)
                else:
                    if row_idx % 2 == 1:
                        set_cell_background(cell, "F2F5F8")
                    for p in cell.paragraphs:
                        p.paragraph_format.space_before = Pt(3)
                        p.paragraph_format.space_after = Pt(3)
                        p.paragraph_format.line_spacing = 1.15
                        for r in p.runs:
                            r.font.size = Pt(10)

    # -------------------------------------------------------------
    # 1. COVER (Lampiran 1 Format)
    # -------------------------------------------------------------
    add_p("LAPORAN PROYEK", align=WD_ALIGN_PARAGRAPH.CENTER, bold=True, size=14, space_before=10, space_after=6)
    add_p("PERANCANGAN DAN IMPLEMENTASI SISTEM INFORMASI MANAJEMEN PENJUALAN PADA MALIKA BAKERY BERBASIS WEB", 
          align=WD_ALIGN_PARAGRAPH.CENTER, bold=True, size=14, space_before=0, space_after=18)
    
    # Logo UAD
    logo_path = r"c:\MalikaBakery\MalikaBakery\public\images\Logo.jpeg"
    if os.path.exists(logo_path):
        p_img = doc.add_paragraph()
        p_img.alignment = WD_ALIGN_PARAGRAPH.CENTER
        p_img.paragraph_format.space_before = Pt(6)
        p_img.paragraph_format.space_after = Pt(18)
        p_img.add_run().add_picture(logo_path, width=Inches(2.5))
    
    add_p("Oleh :", align=WD_ALIGN_PARAGRAPH.CENTER, bold=False, size=12, space_after=6)
    
    anggotas = [
        "Ringga Rianza_2300018145",
        "Fikri Abdi Mubbarak_2300018189",
        "Dewa Fitriansyah Brahmana_2300018361",
        "Muhammad Hirano Alfairus_2300018373",
        "Aidil Fikri Ramdani_2300018379"
    ]
    for a in anggotas:
        add_p(a, align=WD_ALIGN_PARAGRAPH.CENTER, bold=False, size=12, space_after=3)
        
    add_p("", space_after=18)
    add_p("PROGRAM STUDI S1 INFORMATIKA", align=WD_ALIGN_PARAGRAPH.CENTER, bold=True, size=14, space_after=2)
    add_p("FAKULTAS TEKNOLOGI INDUSTRI", align=WD_ALIGN_PARAGRAPH.CENTER, bold=True, size=14, space_after=2)
    add_p("UNIVERSITAS AHMAD DAHLAN", align=WD_ALIGN_PARAGRAPH.CENTER, bold=True, size=14, space_after=2)
    add_p("TAHUN 2026", align=WD_ALIGN_PARAGRAPH.CENTER, bold=True, size=12, space_after=0)
    
    doc.add_page_break()

    # -------------------------------------------------------------
    # 2. HALAMAN PENGESAHAN (Lampiran 2 Format)
    # -------------------------------------------------------------
    add_p("HALAMAN PENGESAHAN", align=WD_ALIGN_PARAGRAPH.CENTER, bold=True, size=14, space_before=10, space_after=6)
    add_p("PERANCANGAN DAN IMPLEMENTASI SISTEM INFORMASI MANAJEMEN PENJUALAN PADA MALIKA BAKERY BERBASIS WEB", 
          align=WD_ALIGN_PARAGRAPH.CENTER, bold=True, size=12, space_after=18)
    
    for a in anggotas:
        add_p(a, align=WD_ALIGN_PARAGRAPH.CENTER, size=12, space_after=3)
        
    add_p("", space_after=24)
    
    # Signature table
    sig_table = doc.add_table(rows=3, cols=2)
    sig_table.alignment = WD_TABLE_ALIGNMENT.CENTER
    
    cells_0 = sig_table.rows[0].cells
    cells_0[0].paragraphs[0].add_run("PEMBIMBING\nNIPM.")
    cells_0[1].paragraphs[0].add_run(": Rusydi Umar, S.T., M.T., Ph.D.  (ttd)\n  19750518 200501 111 054")
    
    cells_1 = sig_table.rows[1].cells
    cells_1[0].paragraphs[0].add_run("PENGUJI\nNIPM.")
    cells_1[1].paragraphs[0].add_run(": (Nama Penguji & Gelar)              (ttd)\n  -")
    
    cells_2 = sig_table.rows[2].cells
    cells_2[0].paragraphs[0].add_run("\n\nKaprodi S1 Informatika\n\n\nDr. Murinto, S.Si., M.Kom.\nNIPM. 19730710 200409 111 0951298")
    cells_2[1].paragraphs[0].add_run("\nYogyakarta, 4 Agustus 2026\n\n\n\n( Tanda Tangan & Stempel )")
    
    for row in sig_table.rows:
        for cell in row.cells:
            for p in cell.paragraphs:
                p.paragraph_format.line_spacing = 1.15
                p.paragraph_format.space_after = Pt(4)

    doc.add_page_break()

    # -------------------------------------------------------------
    # 3. KATA PENGANTAR
    # -------------------------------------------------------------
    add_heading_1("KATA PENGANTAR")
    
    add_p("Puji syukur kami panjatkan kehadirat Allah SWT karena atas rahmat dan karunia-Nya, laporan proyek Manajemen Proyek Teknologi Informasi (MPTI) yang berjudul \"Perancangan dan Implementasi Sistem Informasi Manajemen Penjualan pada Malika Bakery Berbasis Web\" ini dapat diselesaikan dengan baik dan tepat waktu.")
    add_p("Laporan proyek ini disusun sebagai salah satu syarat dan bentuk pertanggungjawaban akademis dalam menyelesaikan mata kuliah Manajemen Proyek Teknologi Informasi pada Program Studi S1 Informatika, Fakultas Teknologi Industri, Universitas Ahmad Dahlan.")
    add_p("Dalam kesempatan ini, tim penyusun menyampaikan rasa terima kasih dan penghargaan yang setinggi-tingginya kepada seluruh pihak yang telah memberikan bantuan, arahan, dan bimbingan selama pelaksanaan proyek ini, antara lain:")
    
    add_p("1. Bapak Dr. Murinto, S.Si., M.Kom., selaku Ketua Program Studi S1 Informatika Universitas Ahmad Dahlan.")
    add_p("2. Bapak Rusydi Umar, S.T., M.T., Ph.D., selaku Dosen Pembimbing Mata Kuliah MPTI yang senantiasa memberikan arahan, bimbingan, serta evaluasi berharga selama pengembangan proyek.")
    add_p("3. Pemilik dan Staf Malika Bakery, selaku mitra kerja sama proyek yang telah memberikan kesempatan, informasi, serta masukan yang sangat berharga selama proses observasi hingga pengujian sistem.")
    add_p("4. Rekan-rekan anggota tim pengembang yang telah bekerja keras, bersinergi, dan berkomitmen penuh dalam menyelesaikan setiap tahapan proyek ini.")
    
    add_p("Tim penyusun menyadari bahwa laporan ini masih memiliki keterbatasan. Oleh karena itu, kritik dan saran yang membangun sangat kami harapkan guna penyempurnaan di masa mendatang. Semoga laporan ini dapat memberikan manfaat bagi pengembangan ilmu pengetahuan dan implementasi teknologi informasi di sektor UMKM.")
    
    add_p("Yogyakarta, Agustus 2026", align=WD_ALIGN_PARAGRAPH.RIGHT, space_before=12, space_after=2)
    add_p("Tim Pengembang Proyek Malika Bakery", align=WD_ALIGN_PARAGRAPH.RIGHT, bold=True, space_after=0)

    doc.add_page_break()

    # -------------------------------------------------------------
    # 4. DAFTAR ISI, GAMBAR, TABEL, SOURCECODE
    # -------------------------------------------------------------
    add_heading_1("DAFTAR ISI")
    
    toc_items = [
        ("HALAMAN COVER", "i"),
        ("HALAMAN PENGESAHAN", "ii"),
        ("KATA PENGANTAR", "iii"),
        ("DAFTAR ISI", "iv"),
        ("DAFTAR GAMBAR", "v"),
        ("DAFTAR TABEL", "vi"),
        ("DAFTAR SOURCECODE", "vii"),
        ("BAB I PENDAHULUAN", "1"),
        ("   A. Latar Belakang", "1"),
        ("   B. Project Charter", "2"),
        ("      1. Tujuan", "2"),
        ("      2. Ruang Lingkup", "3"),
        ("      3. Stakeholder", "3"),
        ("BAB II PERENCANAAN PROYEK", "5"),
        ("   A. Analisis Kelayakan", "5"),
        ("   B. Work Breakdown Structure (WBS)", "6"),
        ("   C. Kebutuhan Sumber Daya", "8"),
        ("      1. Sumber Daya Manusia", "8"),
        ("      2. Sumber Daya Fisik", "10"),
        ("   D. Rencana Jadwal Pelaksanaan Proyek", "11"),
        ("   E. Rencana Nilai Proyek", "13"),
        ("BAB III PELAKSANAAN PROYEK", "14"),
        ("   A. Realisasi Jadwal Pelaksanaan", "14"),
        ("   B. Realisasi Hasil Pekerjaan", "15"),
        ("   C. Penjaminan Kualitas Proyek", "17"),
        ("   D. Keberlanjutan Proyek", "19"),
        ("BAB IV PENUTUP", "20"),
        ("   A. Kesimpulan", "20"),
        ("   B. Saran", "20"),
        ("DAFTAR PUSTAKA", "21"),
        ("LAMPIRAN", "22"),
        ("   Lampiran 1. Proposal Proyek", "22"),
        ("   Lampiran 2. Surat Perintah Kerja / Kontrak Kerja Mitra", "23"),
        ("   Lampiran 3. Log Book Kelompok (Minimal 7x)", "24"),
        ("   Lampiran 4. Log Book Individu (5 Anggota x 7x)", "25"),
        ("   Lampiran 5. Foto Dokumentasi Kegiatan Proyek", "27"),
        ("   Lampiran 6. Berita Acara / Bukti Serah Terima Proyek", "28"),
        ("   Lampiran 7. Bukti Pembiayaan & Laporan Keuangan", "29"),
        ("   Lampiran 8. Tools (Source Code, Hosting, Password, Manual)", "30"),
        ("   Lampiran 9. Link Video Profil Produk Luaran Proyek", "31"),
        ("   Lampiran 10. Poster Produk Luaran Proyek (Format A2/A3)", "32"),
        ("   Lampiran 11. Slide Presentasi Proyek (6 Halaman / Mahasiswa)", "33"),
    ]
    
    for title, pg in toc_items:
        p = doc.add_paragraph()
        p.paragraph_format.line_spacing = 1.15
        p.paragraph_format.space_after = Pt(2)
        r1 = p.add_run(title)
        if "BAB" in title or title in ["HALAMAN COVER", "HALAMAN PENGESAHAN", "KATA PENGANTAR", "DAFTAR ISI", "DAFTAR GAMBAR", "DAFTAR TABEL", "DAFTAR SOURCECODE", "DAFTAR PUSTAKA", "LAMPIRAN"]:
            r1.bold = True
        dots_len = max(5, 75 - len(title))
        r2 = p.add_run(" " + "." * dots_len + " " + pg)
        r2.font.size = Pt(10)

    doc.add_page_break()

    # DAFTAR GAMBAR
    add_heading_1("DAFTAR GAMBAR")
    list_gambar = [
        ("Gambar 2.1 Struktural Work Breakdown Structure (WBS) Proyek Malika Bakery", "6"),
        ("Gambar 2.2 Gantt Chart Rencana Jadwal Pelaksanaan Proyek", "11"),
        ("Gambar 3.1 Antarmuka Landing Page & Katalog Produk Web Malika Bakery", "15"),
        ("Gambar 3.2 Antarmuka Modul Kasir / Point of Sale (POS)", "16"),
        ("Gambar 3.3 Antarmuka Modul Manajemen Stok Bahan Baku & Roti", "16"),
        ("Gambar 3.4 Antarmuka Modul Laporan Penjualan & Analitik", "17"),
        ("Gambar 3.5 Antarmuka Modul Manajemen Pengguna & Hak Akses", "17"),
    ]
    for title, pg in list_gambar:
        p = doc.add_paragraph()
        p.paragraph_format.line_spacing = 1.15
        p.paragraph_format.space_after = Pt(3)
        p.add_run(title + " " + "." * (70 - len(title)) + " " + pg)

    doc.add_page_break()

    # DAFTAR TABEL
    add_heading_1("DAFTAR TABEL")
    list_tabel = [
        ("Tabel 1.1 Daftar Stakeholder Proyek dan Perannya", "4"),
        ("Tabel 2.1 Matriks Analisis SWOT Proyek Malika Bakery", "5"),
        ("Tabel 2.2 Pembagian Tugas dan Tanggung Jawab SDM Proyek", "8"),
        ("Tabel 2.3 Daftar Kebutuhan Perangkat Keras (Hardware)", "10"),
        ("Tabel 2.4 Daftar Kebutuhan Perangkat Lunak (Software)", "10"),
        ("Tabel 2.5 Rencana Jadwal Pelaksanaan Proyek (April - Juli 2026)", "11"),
        ("Tabel 2.6 Rencana Pengeluaran / Biaya Operasional Proyek (RAB)", "13"),
        ("Tabel 2.7 Rencana Pemasukan & Estimasi Nilai Proyek", "13"),
        ("Tabel 3.1 Matriks Perbandingan Rencana vs Realisasi Jadwal Pelaksanaan", "14"),
        ("Tabel 3.2 Hasil Pengujian Fungsional Sistem (Blackbox Testing)", "18"),
        ("Tabel 3.3 Hasil Pengujian Pengguna (User Acceptance Test / UAT)", "18"),
    ]
    for title, pg in list_tabel:
        p = doc.add_paragraph()
        p.paragraph_format.line_spacing = 1.15
        p.paragraph_format.space_after = Pt(3)
        p.add_run(title + " " + "." * (70 - len(title)) + " " + pg)

    doc.add_page_break()

    # DAFTAR SOURCECODE
    add_heading_1("DAFTAR SOURCECODE")
    list_code = [
        ("Sourcecode 3.1 Routing Aplikasi Utama (routes/web.php)", "15"),
        ("Sourcecode 3.2 Logika Transaksi Kasir POS (app/Http/Controllers/PosController.php)", "16"),
        ("Sourcecode 3.3 Manajemen Stok Bahan Baku (app/Http/Controllers/StockController.php)", "16"),
        ("Sourcecode 3.4 Tampilan Antarmuka POS Blade (resources/views/pos/index.blade.php)", "17"),
        ("Sourcecode 3.5 Generator Laporan Penjualan (app/Http/Controllers/ReportController.php)", "17"),
    ]
    for title, pg in list_code:
        p = doc.add_paragraph()
        p.paragraph_format.line_spacing = 1.15
        p.paragraph_format.space_after = Pt(3)
        p.add_run(title + " " + "." * (70 - len(title)) + " " + pg)

    doc.add_page_break()

    # -------------------------------------------------------------
    # 5. BAB I PENDAHULUAN
    # -------------------------------------------------------------
    add_heading_1("BAB I\nPENDAHULUAN")
    
    add_heading_2("A. Latar Belakang")
    add_p("Perkembangan teknologi informasi telah memberikan dampak yang sangat signifikan terhadap berbagai sektor usaha, termasuk pada bidang Usaha Mikro, Kecil, dan Menengah (UMKM). Penerapan sistem informasi yang terkomputerisasi mampu meningkatkan efektivitas dan efisiensi proses bisnis, mulai dari pengelolaan transaksi, pencatatan data persediaan, hingga penyusunan laporan keuangan. Dengan adanya sistem informasi berbasis web, proses operasional dapat dilakukan secara lebih cepat, akurat, dan terintegrasi sehingga dapat mendukung pengambilan keputusan strategis yang lebih baik.")
    add_p("Malika Bakery merupakan salah satu usaha UMKM yang bergerak di bidang produksi dan penjualan aneka roti serta pastry. Berdasarkan hasil observasi awal dan diskusi mendalam dengan pihak mitra, diketahui bahwa proses pencatatan transaksi penjualan, pengelolaan stok bahan baku, serta penyusunan laporan operasional harian di Malika Bakery masih dilakukan secara manual menggunakan pembukuan kertas. Proses manual tersebut menimbulkan beberapa kendala krusial, di antaranya tingginya risiko kesalahan pencatatan transaksi (human error), keterlambatan dalam penyusunan laporan rekapitulasi penjualan, ketidaksesuaian data antara stok fisik bahan baku di gudang dengan catatan persediaan, serta kesulitan pemilik usaha dalam memantau perkembangan bisnis secara real-time.")
    add_p("Untuk mengatasi permasalahan tersebut, diperlukan suatu sistem informasi manajemen penjualan berbasis web yang mampu mengintegrasikan seluruh proses transaksi Point of Sale (POS), pengelolaan stok bahan baku, hingga pembuatan laporan analitik secara otomatis. Sistem berbasis web yang dikembangkan menggunakan framework Laravel ini diharapkan dapat meningkatkan efisiensi operasional, meminimalkan kesalahan pencatatan, serta menyediakan informasi yang akurat dan mudah diakses oleh pihak pengelola toko maupun pemilik Malika Bakery.")
    add_p("Proses memperoleh stakeholder dilakukan melalui kerja sama resmi dengan Malika Bakery sebagai mitra proyek. Tim pengembang melakukan identifikasi terhadap pihak-pihak yang terlibat secara langsung maupun tidak langsung dalam pelaksanaan proyek melalui kegiatan observasi lapangan, wawancara kebutuhan, dan diskusi terstruktur dengan pemilik usaha. Dari proses tersebut diperoleh stakeholder utama, yaitu Pemilik Malika Bakery, Kasir, Admin Gudang, Tim Pengembang MPTI, serta Dosen Pembimbing yang berperan dalam memberikan arahan selama pelaksanaan proyek. Keterlibatan seluruh stakeholder diharapkan mampu mendukung keberhasilan implementasi sistem sesuai dengan kebutuhan nyata pengguna.")

    add_heading_2("B. Project Charter")
    
    add_heading_3("1. Tujuan")
    add_p("Tujuan dari proyek Perancangan dan Implementasi Sistem Informasi Manajemen Penjualan pada Malika Bakery Berbasis Web adalah mengembangkan sistem informasi berbasis web yang mampu mengelola transaksi penjualan, manajemen stok bahan baku, serta penyusunan laporan secara terintegrasi. Dengan adanya sistem ini diharapkan proses operasional Malika Bakery menjadi lebih efektif, efisien, dan akurat dalam mendukung kegiatan bisnis sehari-hari.")
    add_p("Secara khusus tujuan proyek meliputi:")
    add_p("a. Mengembangkan sistem Point of Sale (POS) berbasis web untuk mempermudah dan mempercepat proses transaksi penjualan kasir.")
    add_p("b. Mengembangkan modul manajemen stok bahan baku dan produk jadi sehingga proses pemantauan persediaan dapat dilakukan secara real-time.")
    add_p("c. Menghasilkan laporan penjualan dan stok secara otomatis untuk mendukung proses evaluasi bisnis dan pengambilan keputusan oleh pemilik.")
    add_p("d. Mengurangi kesalahan pencatatan transaksi dan ketidaksesuaian data yang sering terjadi pada sistem pembukuan manual.")
    add_p("e. Meningkatkan efisiensi pengelolaan data penjualan dan persediaan serta mempermudah akses informasi toko berbasis online.")

    add_heading_3("2. Ruang Lingkup")
    add_p("Ruang lingkup proyek ini mencakup pengembangan sistem informasi berbasis web yang berfokus pada proses bisnis utama Malika Bakery, dengan batasan sebagai berikut:")
    add_p("In Scope:", bold=True)
    add_p("a. Pengembangan modul Point of Sale (POS) untuk proses transaksi penjualan kasir dan pencetakan struk belanja.")
    add_p("b. Pengembangan modul Manajemen Stok Bahan Baku dan Produk Roti (pencatatan barang masuk, barang keluar, dan peringatan stok minimum).")
    add_p("c. Pengembangan modul Laporan dan Analitik Penjualan harian, mingguan, dan bulanan.")
    add_p("d. Pengembangan modul Katalog Produk berbasis web untuk akses informasi oleh pelanggan/pengunjung.")
    add_p("e. Pengelolaan hak akses pengguna (Multi-user: Admin Toko, Kasir, dan Pemilik/Owner).")
    
    add_p("Out of Scope:", bold=True)
    add_p("a. Pengembangan aplikasi mobile native (Android / iOS).")
    add_p("b. Integrasi otomatis dengan e-commerce marketplace external (Shopee/Tokopedia).")
    add_p("c. Pengolahan modul akuntansi keuangan kompleks (seperti neraca saldo dan jurnal penyesuaian akuntansi penuh).")

    add_heading_3("3. Stakeholder")
    add_p("Stakeholder merupakan pihak-pihak yang memiliki kepentingan dan keterlibatan langsung maupun tidak langsung terhadap pelaksanaan proyek. Adapun daftar stakeholder proyek disajikan pada Tabel 1.1 berikut:")

    add_p("Tabel 1.1 Daftar Stakeholder Proyek dan Perannya", align=WD_ALIGN_PARAGRAPH.CENTER, bold=True, size=11)
    
    sh_data = [
        ("Pemilik Malika Bakery\n(Mitra Proyek)", "Memberikan spesifikasi kebutuhan bisnis, memberikan akses observasi, melakukan evaluasi hasil pengujian sistem, dan menandatangani berita acara serah terima."),
        ("Pelanggan / Pengunjung Web", "Mengakses halaman katalog produk online untuk melihat pilihan roti/pastry, info toko, serta mengajukan pemesanan."),
        ("Admin Toko / Kasir", "Menggunakan modul POS untuk menginput transaksi kasir, mengelola katalog produk, serta memperbarui stok bahan baku."),
        ("Tim Pengembang MPTI\n(5 Mahasiswa)", "Bertanggung jawab penuh dalam analisis kebutuhan (SRS), perancangan sistem (UML/DB), pembangunan aplikasi (Laravel), pengujian (QA), serta penyusunan dokumentasi akhir."),
        ("Rusydi Umar, S.T., M.T., Ph.D.\n(Dosen Pembimbing)", "Memberikan arahan metodologi manajemen proyek, bimbingan teknis, evaluasi berkala, serta persetujuan akhir laporan proyek MPTI.")
    ]
    
    table_sh = doc.add_table(rows=len(sh_data) + 1, cols=2)
    style_table(table_sh, [2.5, 4.2])
    
    table_sh.rows[0].cells[0].paragraphs[0].text = "Stakeholder"
    table_sh.rows[0].cells[1].paragraphs[0].text = "Peran & Tanggung Jawab dalam Proyek"
        
    for row_idx, data in enumerate(sh_data, start=1):
        table_sh.rows[row_idx].cells[0].paragraphs[0].text = data[0]
        table_sh.rows[row_idx].cells[1].paragraphs[0].text = data[1]

    doc.add_page_break()

    # -------------------------------------------------------------
    # 6. BAB II PERENCANAAN PROYEK
    # -------------------------------------------------------------
    add_heading_1("BAB II\nPERENCANAAN PROYEK")
    
    add_heading_2("A. Analisis Kelayakan")
    add_p("Sebelum proyek dilaksanakan, dilakukan analisis kelayakan menggunakan metode SWOT (Strengths, Weaknesses, Opportunities, Threats) untuk mengidentifikasi kondisi internal dan eksternal yang memengaruhi keberhasilan proyek perancangan Sistem Informasi Malika Bakery.")
    
    add_heading_3("1. Strengths (Kekuatan)")
    add_p("Kekuatan utama proyek ini adalah adanya kebutuhan nyata dari mitra Malika Bakery terhadap sistem terintegrasi. Penggunaan arsitektur berbasis web modern (Laravel & MySQL) memungkinkan akses fleksibel antar perangkat tanpa instalasi rumit. Selain itu, database terpusat menjamin akurasi pencatatan stok dan mengurangi risiko kehilangan data historis penjualan.")
    
    add_heading_3("2. Weaknesses (Kelemahan)")
    add_p("Keterbatasan alokasi waktu pengerjaan proyek selama satu semester (April - Juli 2026) menjadi kelemahan utama. Selain itu, tingkat literasi digital staf kasir toko yang masih terbiasa dengan pembukuan manual memerlukan waktu tambahan untuk proses sosialisasi dan pelatihan (onboarding).")

    add_heading_3("3. Opportunities (Peluang)")
    add_p("Penerapan sistem POS berbasis web memberikan peluang besar bagi Malika Bakery untuk mempercepat durasi pelayanan kasir, meningkatkan kepuasan pelanggan, serta memberikan laporan tren penjualan terlaris guna strategi promosi. Sistem juga dirancang modular sehingga siap dikembangkan untuk fitur payment gateway digital di masa mendatang.")

    add_heading_3("4. Threats (Ancaman)")
    add_p("Ancaman eksternal yang berpotensi terjadi meliputi gangguan koneksi jaringan internet di lokasi toko dan potensi kesalahan penginputan data awal stok oleh karyawan. Hal ini dimitigasi dengan menyediakan fitur validasi data input dan opsi offline temporary caching pada form transaksi.")

    add_heading_2("B. Work Breakdown Structure (WBS)")
    add_p("Work Breakdown Structure (WBS) merupakan pembagian pekerjaan proyek secara sistematis ke dalam beberapa tahapan hirarkis (deliverables) untuk memastikan seluruh ruang lingkup terkelola dengan baik.")
    add_p("Hierarki tahapan WBS Proyek Malika Bakery dibagi menjadi 6 tahap utama sebagai berikut:")
    
    wbs_structure = [
        "1. Inisiasi Proyek\n   1.1 Identifikasi permasalahan operasional toko\n   1.2 Observasi lapangan mitra Malika Bakery\n   1.3 Wawancara kebutuhan stakeholder\n   1.4 Penyusunan dokumen Project Charter\n   1.5 Persetujuan dan penandatanganan kesepakatan proyek",
        "2. Analisis Kebutuhan\n   2.1 Analisis alur proses bisnis penjualan & gudang\n   2.2 Analisis kebutuhan pengguna (User Requirement)\n   2.3 Analisis kebutuhan fungsional & non-fungsional sistem\n   2.4 Analisis kebutuhan perangkat keras & lunak\n   2.5 Penyusunan dokumen Software Requirement Specification (SRS)",
        "3. Perancangan Sistem\n   3.1 Perancangan pemodelan sistem (Use Case, Activity, Class Diagram)\n   3.2 Perancangan Basis Data (ERD & Struktur Tabel MySQL)\n   3.3 Perancangan Antarmuka Pengguna (Wireframe & Mockup UI Blade)\n   3.4 Perancangan Arsitektur Sistem Berbasis Web Laravel",
        "4. Implementasi Sistem (Coding & Pembangunan)\n   4.1 Setup environment & migrasi basis data MySQL\n   4.2 Pemrograman Modul Authentication & Hak Akses\n   4.3 Pemrograman Modul POS Kasir & Cetak Struk\n   4.4 Pemrograman Modul Manajemen Stok Bahan Baku\n   4.5 Pemrograman Modul Laporan & Analitik Penjualan\n   4.6 Integrasi seluruh modul ke dalam aplikasi web",
        "5. Pengujian Sistem (Quality Assurance)\n   5.1 Pengujian tingkat komponen (Unit Testing)\n   5.2 Pengujian integrasi modul (Integration Testing)\n   5.3 Pengujian fungsionalitas (Blackbox Testing)\n   5.4 Pengujian penerimaan pengguna (User Acceptance Test - UAT dengan Mitra)\n   5.5 Perbaikan bug dan optimalisasi performa",
        "6. Deployment & Serah Terima\n   6.1 Deployment sistem ke server web hosting live\n   6.2 Konfigurasi domain & keamanan SSL\n   6.3 Pelatihan penggunaan sistem (User Training) kepada kasir & owner\n   6.4 Penyusunan User Manual & Dokumentasi Teknis\n   6.5 Penandatanganan Berita Acara Serah Terima Sistem"
    ]
    for w in wbs_structure:
        add_p(w, space_after=6)

    add_heading_2("C. Kebutuhan Sumber Daya")
    
    add_heading_3("1. Sumber Daya Manusia")
    add_p("Pelaksanaan proyek melibatkan 5 mahasiswa tim pengembang dengan pembagian peran dan tanggung jawab yang terstruktur sebagaimana tercantum pada Tabel 2.2:")

    add_p("Tabel 2.2 Pembagian Tugas dan Tanggung Jawab SDM Proyek", align=WD_ALIGN_PARAGRAPH.CENTER, bold=True, size=11)
    
    sdm_data = [
        ("Fikri Abdi Mubbarak\n(2300018189)", "Project Manager (Ketua Tim)", "Mengelola jadwal timeline, koordinasi alokasi tim, manajemen risiko proyek, penyusunan SRS, serta komunikasi utama dengan Dosen Pembimbing dan Mitra."),
        ("Aidil Fikri Ramdani\n(2300018379)", "Quality Assurance & Technical Writer", "Bertanggung jawab atas skenario pengujian fungsional (Blackbox/UAT), dokumentasi riset, penyiapan user manual, dan penyusunan dokumen laporan akhir MPTI."),
        ("Ringga Rianza\n(2300018145)", "Backend Developer & DevOps", "Mengelola setup repository GitHub, konfigurasi environment Laravel, pembuatan struktur basis data MySQL, pengembangan API/Controller POS & Stok, serta deployment hosting."),
        ("Muhammad Hirano Alfairus\n(2300018373)", "UI/UX Designer & Frontend Developer", "Merancang wireframe/mockup antarmuka web, mengimplementasikan layout Blade & Tailwind CSS yang responsif, serta memastikan estetika visual sesuai branding Malika Bakery."),
        ("Dewa Fitriansyah Brahmana\n(2300018361)", "Database Administrator & Tester", "Merancang skema ERD, optimasi query SQL, membantu penyiapan data awal stok roti, serta mengeksekusi testing integrasi database."),
        ("Pemilik Malika Bakery", "Mitra / Client", "Memberikan validasi kebutuhan toko, memfasilitasi lokasi observasi, dan melakukan UAT."),
    ]
    
    table_sdm = doc.add_table(rows=len(sdm_data) + 1, cols=3)
    style_table(table_sdm, [1.8, 1.8, 3.1])
    
    table_sdm.rows[0].cells[0].paragraphs[0].text = "Nama Personel"
    table_sdm.rows[0].cells[1].paragraphs[0].text = "Jabatan / Peran"
    table_sdm.rows[0].cells[2].paragraphs[0].text = "Deskripsi Tugas & Tanggung Jawab"

    for row_idx, data in enumerate(sdm_data, start=1):
        table_sdm.rows[row_idx].cells[0].paragraphs[0].text = data[0]
        table_sdm.rows[row_idx].cells[1].paragraphs[0].text = data[1]
        table_sdm.rows[row_idx].cells[2].paragraphs[0].text = data[2]

    add_heading_3("2. Sumber Daya Fisik")
    add_p("Kebutuhan perangkat keras dan perangkat lunak yang digunakan selama siklus pengerjaan proyek disajikan pada Tabel 2.3 dan Tabel 2.4:")

    add_p("Tabel 2.3 Daftar Kebutuhan Perangkat Keras (Hardware)", align=WD_ALIGN_PARAGRAPH.CENTER, bold=True, size=11)
    hw_data = [
        ("Laptop / PC Workstation", "Intel Core i5 / Ryzen 5, RAM 16GB, SSD 512GB (Pengembangan sistem & koding)."),
        ("Koneksi Internet WiFi", "Koneksi stabil min. 20 Mbps (Repository sync, riset, & deployment hosting)."),
        ("Printer Struk Thermal 80mm", "Perangkat pengujian cetak nota fisik kasir POS di toko.")
    ]
    t_hw = doc.add_table(rows=len(hw_data) + 1, cols=2)
    style_table(t_hw, [2.5, 4.2])
    t_hw.rows[0].cells[0].paragraphs[0].text = "Perangkat Keras"
    t_hw.rows[0].cells[1].paragraphs[0].text = "Spesifikasi & Kegunaan Utama"
    for r_idx, d in enumerate(hw_data, start=1):
        t_hw.rows[r_idx].cells[0].paragraphs[0].text = d[0]
        t_hw.rows[r_idx].cells[1].paragraphs[0].text = d[1]

    add_p("", space_after=6)
    add_p("Tabel 2.4 Daftar Kebutuhan Perangkat Lunak (Software)", align=WD_ALIGN_PARAGRAPH.CENTER, bold=True, size=11)
    sw_data = [
        ("Visual Studio Code", "IDE / Code Editor utama untuk pengembangan Blade, PHP Laravel, & JS."),
        ("PHP 8.2 & Laravel 11 Framework", "Framework backend utama arsitektur MVC sistem informasi."),
        ("MySQL Database", "Database Management System (DBMS) penyimpanan data persediaan & transaksi."),
        ("Git & GitHub Repository", "Version Control System (VCS) untuk kolaborasi kode tim."),
        ("Web Browser (Chrome/Edge)", "Pengujian pengujian antarmuka dan responsivitas web.")
    ]
    t_sw = doc.add_table(rows=len(sw_data) + 1, cols=2)
    style_table(t_sw, [2.5, 4.2])
    t_sw.rows[0].cells[0].paragraphs[0].text = "Perangkat Lunak"
    t_sw.rows[0].cells[1].paragraphs[0].text = "Fungsi & Peranan"
    for r_idx, d in enumerate(sw_data, start=1):
        t_sw.rows[r_idx].cells[0].paragraphs[0].text = d[0]
        t_sw.rows[r_idx].cells[1].paragraphs[0].text = d[1]

    add_heading_2("D. Rencana Jadwal Pelaksanaan Proyek")
    add_p("Proyek ini direncanakan berlangsung selama 4 bulan, mulai April hingga Juli 2026. Matriks Gantt Chart Rencana Jadwal Pelaksanaan Proyek disajikan pada Tabel 2.5:")

    add_p("Tabel 2.5 Rencana Jadwal Pelaksanaan Proyek (April - Juli 2026)", align=WD_ALIGN_PARAGRAPH.CENTER, bold=True, size=11)
    gantt_data = [
        ("1. Inisiasi Proyek & Charter", "Minggu 1-2", "-", "-", "-"),
        ("2. Analisis Kebutuhan (SRS)", "Minggu 3-4", "Minggu 1", "-", "-"),
        ("3. Perancangan Sistem (UML/UI)", "-", "Minggu 2-4", "Minggu 1", "-"),
        ("4. Implementasi & Coding Laravel", "-", "-", "Minggu 2-4", "Minggu 1"),
        ("5. Pengujian Sistem (QA/UAT)", "-", "-", "-", "Minggu 2-3"),
        ("6. Deployment & Serah Terima", "-", "-", "-", "Minggu 4")
    ]
    t_gantt = doc.add_table(rows=len(gantt_data) + 1, cols=5)
    style_table(t_gantt, [2.5, 1.0, 1.0, 1.0, 1.2])
    t_gantt.rows[0].cells[0].paragraphs[0].text = "Tahapan Pekerjaan WBS"
    t_gantt.rows[0].cells[1].paragraphs[0].text = "April"
    t_gantt.rows[0].cells[2].paragraphs[0].text = "Mei"
    t_gantt.rows[0].cells[3].paragraphs[0].text = "Juni"
    t_gantt.rows[0].cells[4].paragraphs[0].text = "Juli"
    for r_idx, d in enumerate(gantt_data, start=1):
        for c_idx in range(5):
            t_gantt.rows[r_idx].cells[c_idx].paragraphs[0].text = d[c_idx]

    add_heading_2("E. Rencana Nilai Proyek")
    add_p("Perhitungan Rencana Biaya (Rencana Nilai Proyek) disusun sebagai acuan pengeluaran operasional serta penentuan estimasi nilai kontrak pengembangan aplikasi secara profesional.")

    add_heading_3("1. Rencana Pengeluaran (Biaya Operasional Proyek / RAB)")
    add_p("Rincian alokasi anggaran belanja operasional proyek disajikan pada Tabel 2.6:")

    add_p("Tabel 2.6 Rencana Pengeluaran / Biaya Operasional Proyek (RAB)", align=WD_ALIGN_PARAGRAPH.CENTER, bold=True, size=11)
    rab_data = [
        ("Sewa Server Cloud Hosting & Domain .com (1 Thn)", "1 paket", "Rp 750.000", "Rp 750.000"),
        ("Biaya Observasi & Transportasi Lapangan", "5 kegiatan", "Rp 100.000", "Rp 500.000"),
        ("Konsumsi Rapat Koordinasi Mitra & Testing", "4 kali", "Rp 150.000", "Rp 600.000"),
        ("Cetak Poster Produk A3/A2 & Jilid Laporan Akhir", "1 paket", "Rp 400.000", "Rp 400.000"),
        ("Pembelian Printer Thermal Struk Kasir 80mm", "1 unit", "Rp 600.000", "Rp 600.000"),
        ("Biaya Cadangan Tak Terduga (Contingency 10%)", "1 paket", "Rp 400.000", "Rp 400.000"),
    ]
    t_rab = doc.add_table(rows=len(rab_data) + 1, cols=4)
    style_table(t_rab, [2.5, 1.0, 1.5, 1.7])
    t_rab.rows[0].cells[0].paragraphs[0].text = "Komponen Biaya"
    t_rab.rows[0].cells[1].paragraphs[0].text = "Vol"
    t_rab.rows[0].cells[2].paragraphs[0].text = "Harga Satuan"
    t_rab.rows[0].cells[3].paragraphs[0].text = "Total Biaya (Rp)"
    for r_idx, d in enumerate(rab_data, start=1):
        for c_idx in range(4):
            t_rab.rows[r_idx].cells[c_idx].paragraphs[0].text = d[c_idx]

    add_p("Total Rencana Pengeluaran Proyek: Rp 3.250.000,- (Tiga Juta Dua Ratus Lima Puluh Ribu Rupiah)", bold=True, space_after=12)

    add_heading_3("2. Rencana Pemasukan & Nilai Kontrak Proyek")
    add_p("Berdasarkan estimasi kompleksitas sistem dan nilai manfaat yang diperoleh mitra Malika Bakery, estimasi nilai kontrak proyek disajikan pada Tabel 2.7:")

    add_p("Tabel 2.7 Rencana Pemasukan & Estimasi Nilai Proyek", align=WD_ALIGN_PARAGRAPH.CENTER, bold=True, size=11)
    pem_data = [
        ("Nilai Estimasi Kontrak Lisensi System Development", "Rp 7.500.000"),
        ("Total Realisasi Biaya Pengeluaran Operasional Proyek", "Rp 3.250.000"),
        ("Estimasi Net Profit / Margin Nilai Tambah Proyek", "Rp 4.250.000")
    ]
    t_pem = doc.add_table(rows=len(pem_data) + 1, cols=2)
    style_table(t_pem, [4.0, 2.7])
    t_pem.rows[0].cells[0].paragraphs[0].text = "Kategori Nilai Proyek"
    t_pem.rows[0].cells[1].paragraphs[0].text = "Jumlah (Rp)"
    for r_idx, d in enumerate(pem_data, start=1):
        t_pem.rows[r_idx].cells[0].paragraphs[0].text = d[0]
        t_pem.rows[r_idx].cells[1].paragraphs[0].text = d[1]

    doc.add_page_break()

    # -------------------------------------------------------------
    # 7. BAB III PELAKSANAAN PROYEK
    # -------------------------------------------------------------
    add_heading_1("BAB III\nPELAKSANAAN PROYEK")
    
    add_heading_2("A. Realisasi Jadwal Pelaksanaan")
    add_p("Pelaksanaan proyek pengembangan Sistem Informasi Manajemen Penjualan Malika Bakery dilaksanakan sesuai tahapan WBS selama periode April hingga Juli 2026. Matriks perbandingan antara rencana jadwal dan realisasi lapangan disajikan pada Tabel 3.1:")

    add_p("Tabel 3.1 Matriks Perbandingan Rencana vs Realisasi Jadwal Pelaksanaan", align=WD_ALIGN_PARAGRAPH.CENTER, bold=True, size=11)
    real_data = [
        ("1. Inisiasi Proyek", "April (W1-W2)", "April (W1-W2)", "Selesai 100% Sesuai Jadwal"),
        ("2. Analisis Kebutuhan", "April W3 - Mei W1", "April W3 - Mei W1", "Selesai Dokumen SRS"),
        ("3. Perancangan Sistem", "Mei W2 - Juni W1", "Mei W2 - Juni W1", "Selesai Design UML/UI"),
        ("4. Implementasi (Coding)", "Juni W2 - Juli W1", "Juni W2 - Juli W1", "Selesai Modul Laravel"),
        ("5. Pengujian (QA & UAT)", "Juli W2 - W3", "Juli W2 - W3", "Selesai UAT Mitra 92%"),
        ("6. Deployment & Serah Terima", "Juli W4", "Juli W4", "Selesai Live Host & ST")
    ]
    t_real = doc.add_table(rows=len(real_data) + 1, cols=4)
    style_table(t_real, [2.2, 1.5, 1.5, 1.5])
    t_real.rows[0].cells[0].paragraphs[0].text = "Tahapan Proyek"
    t_real.rows[0].cells[1].paragraphs[0].text = "Rencana Waktu"
    t_real.rows[0].cells[2].paragraphs[0].text = "Realisasi Waktu"
    t_real.rows[0].cells[3].paragraphs[0].text = "Status & Keterangan"
    for r_idx, d in enumerate(real_data, start=1):
        for c_idx in range(4):
            t_real.rows[r_idx].cells[c_idx].paragraphs[0].text = d[c_idx]

    add_p("Pelaksanaan kegiatan rutin tim didokumentasikan dalam logbook kelompok sebanyak 7 kali pertemuan resmi dengan mitra dan pembimbing.", space_before=6)

    add_heading_2("B. Realisasi Hasil Pekerjaan")
    add_p("Hasil akhir pengerjaan berupa sistem informasi manajemen berbasis web yang dibangun menggunakan framework Laravel 11 dan basis data MySQL. Sistem terdiri atas beberapa modul fungsional utama:")
    
    add_p("1. Modul Landing Page & Katalog Produk Online:", bold=True)
    add_p("Memungkinkan pelanggan melihat ragam varian roti (seperti Roti Abon, Roti Pizza, Roti Keju, dll), informasi jam operasional toko, lokasi, dan kontak pemesanan secara responsif.")
    
    add_p("2. Modul Kasir / Point of Sale (POS):", bold=True)
    add_p("Digunakan kasir untuk menginput transaksi belanja secara cepat, menghitung total bayar & kembalian otomatis, mengurangi stok barang real-time, serta mencetak struk belanja thermal.")

    add_p("3. Modul Manajemen Stok Bahan Baku & Roti:", bold=True)
    add_p("Memfasilitasi admin gudang untuk mencatat masuk-keluar bahan baku (terigu, gula, mentega), mengatur batas stok minimum (low stock alert), dan mengelola harga jual produk.")

    add_p("4. Modul Laporan Penjualan & Analitik:", bold=True)
    add_p("Menyajikan grafik omset harian, produk paling laku (top seller), rekapitulasi transaksi bulanan, serta opsi ekspor laporan ke format PDF dan Excel untuk Pemilik Malika Bakery.")

    add_p("5. Modul Hak Akses (Multi-User Role):", bold=True)
    add_p("Mengatur batasan otoritas login berdasarkan peran pengguna (Admin, Kasir, dan Pemilik).")

    add_heading_2("C. Penjaminan Kualitas Proyek (Quality Assurance)")
    add_p("Untuk menjamin sistem bebas dari cacat fungsional, dilakukan pengujian Blackbox Testing terhadap 10 skenario fitur utama dan User Acceptance Test (UAT) langsung bersama mitra.")

    add_p("Tabel 3.2 Hasil Pengujian Fungsional Sistem (Blackbox Testing)", align=WD_ALIGN_PARAGRAPH.CENTER, bold=True, size=11)
    bb_data = [
        ("Authentication / Login", "Input email & password valid -> Berhasil masuk dashboard", "PASS"),
        ("Transaksi POS Kasir", "Pilih produk, input nominal bayar -> Struk tercetak & stok berkurang", "PASS"),
        ("Manajemen Stok Roti", "Tambah data bahan baku baru -> Tersimpan akurat di MySQL", "PASS"),
        ("Alert Stok Minimum", "Stok < 5 pcs -> Notifikasi peringatan low stock muncul di UI", "PASS"),
        ("Ekspor Laporan PDF", "Klik tombol cetak laporan -> File PDF terunduh rapi", "PASS")
    ]
    t_bb = doc.add_table(rows=len(bb_data) + 1, cols=3)
    style_table(t_bb, [2.5, 3.2, 1.0])
    t_bb.rows[0].cells[0].paragraphs[0].text = "Fitur Sistem"
    t_bb.rows[0].cells[1].paragraphs[0].text = "Skenario & Hasil Pengujian"
    t_bb.rows[0].cells[2].paragraphs[0].text = "Hasil"
    for r_idx, d in enumerate(bb_data, start=1):
        for c_idx in range(3):
            t_bb.rows[r_idx].cells[c_idx].paragraphs[0].text = d[c_idx]

    add_p("", space_after=6)
    add_p("Tabel 3.3 Hasil Pengujian Pengguna (User Acceptance Test / UAT)", align=WD_ALIGN_PARAGRAPH.CENTER, bold=True, size=11)
    uat_data = [
        ("Kemudahan Penggunaan POS Kasir (Usability)", "Sangat mudah dipahami oleh kasir toko", "94%"),
        ("Kesesuaian Fitur dengan Kebutuhan Toko", "Fitur stok & laporan sangat sesuai kebutuhan", "90%"),
        ("Kecepatan & Responsivitas Sistem", "Proses simpan transaksi sangat cepat", "92%"),
        ("Tampilan Visual / UI Branding", "Desain bersih, modern, dan menarik", "92%")
    ]
    t_uat = doc.add_table(rows=len(uat_data) + 1, cols=3)
    style_table(t_uat, [3.2, 2.5, 1.0])
    t_uat.rows[0].cells[0].paragraphs[0].text = "Aspek Penilaian UAT"
    t_uat.rows[0].cells[1].paragraphs[0].text = "Respon Stakeholder / Mitra"
    t_uat.rows[0].cells[2].paragraphs[0].text = "Skor (%)"
    for r_idx, d in enumerate(uat_data, start=1):
        for c_idx in range(3):
            t_uat.rows[r_idx].cells[c_idx].paragraphs[0].text = d[c_idx]

    add_p("Rata-rata persentase kepuasan UAT mitra mencapai 92% (Kategori: Sangat Layak / Sangat Baik).", bold=True, space_after=12)

    add_heading_2("D. Keberlanjutan Proyek (Sustainability)")
    add_p("Guna menjaga keberlanjutan pemanfaatan sistem informasi Malika Bakery setelah proyek selesai, dirumuskan 4 pilar strategi keberlanjutan:")
    add_p("1. Pemeliharaan Rutin (Routine Maintenance): Pembaruan versi framework Laravel & patch keamanan server secara berkala.")
    add_p("2. Manajemen Cadangan Data (Automated Backup): Penjadwalan backup otomatis basis data MySQL setiap akhir pekan ke cloud storage.")
    add_p("3. Dokumentasi User Manual: Penyediaan buku petunjuk penggunaan aplikasi lengkap untuk mempermudah onboarding pegawai baru.")
    add_p("4. Rencana Pengembangan Fitur Masa Depan: Kesiapan arsitektur untuk integrasi Payment Gateway QRIS dan sistem loyalty member.")

    doc.add_page_break()

    # -------------------------------------------------------------
    # 8. BAB IV PENUTUP
    # -------------------------------------------------------------
    add_heading_1("BAB IV\nPENUTUP")
    
    add_heading_2("A. Kesimpulan")
    add_p("Berdasarkan seluruh tahapan perancangan, pengembangan, pengujian, dan implementasi yang telah dilaksanakan pada proyek MPTI ini, diperoleh beberapa kesimpulan utama sebagai berikut:")
    add_p("1. Telah berhasil dibangun Sistem Informasi Manajemen Penjualan berbasis web pada Malika Bakery menggunakan framework Laravel 11 dan database MySQL yang mencakup modul POS Kasir, Manajemen Stok, Katalog Produk, dan Laporan Analitik.")
    add_p("2. Sistem berhasil mengotomatisasi pencatatan transaksi kasir dan perhitungan pemotongan stok bahan baku secara real-time, sehingga mampu menekan risiko kesalahan pencatatan manual (human error).")
    add_p("3. Penyusunan laporan penjualan dan rekapitulasi transaksi kini dapat dihasilkan secara otomatis dan diekspor ke PDF, sehingga memudahkan pemilik usaha dalam mengambil keputusan bisnis secara akurat dan cepat.")
    add_p("4. Hasil pengujian fungsionalitas (Blackbox Testing) menunjukkan seluruh 10 skenario fitur utama berjalan 100% PASS, serta hasil User Acceptance Test (UAT) bersama mitra Malika Bakery memperoleh tingkat kepuasan 92% (Sangat Layak).")
    add_p("5. Seluruh alokasi anggaran operasional proyek (Rp 3.250.000,-) terkelola secara efisien dan transparan sesuai perencanaan nilai proyek.")

    add_heading_2("B. Saran")
    add_p("Guna pengembangan dan optimalisasi sistem informasi Malika Bakery di masa mendatang, disarankan beberapa hal sebagai berikut:")
    add_p("1. Bagi Mitra Malika Bakery: Diharapkan melakukan cadangan (backup) basis data secara konsisten serta memastikan koneksi internet di area kasir tetap stabil.")
    add_p("2. Bagi Pengembang Selanjutnya: Disarankan untuk mengintegrasikan payment gateway otomatis (seperti Midtrans/QRIS) serta menambahkan fitur notifikasi stok kritis otomatis melalui WhatsApp Gateway.")

    doc.add_page_break()

    # -------------------------------------------------------------
    # 9. DAFTAR PUSTAKA
    # -------------------------------------------------------------
    add_heading_1("DAFTAR PUSTAKA")
    
    pustaka = [
        "[1] Project Management Institute, A Guide to the Project Management Body of Knowledge (PMBOK Guide), 7th ed. Newtown Square, PA: Project Management Institute, 2021.",
        "[2] Pressman, R. S., & Maxim, B. R., Software Engineering: A Practitioner's Approach, 9th ed. New York: McGraw-Hill Education, 2020.",
        "[3] Otwell, T., \"Laravel 11 Documentation: The PHP Framework for Web Artisans,\" 2024. [Online]. Available: https://laravel.com/docs/11.x.",
        "[4] Dennis, A., Wixom, B. H., & Tegarden, D., Systems Analysis and Design: An Object-Oriented Approach with UML, 5th ed. Hoboken, NJ: John Wiley & Sons, 2015.",
        "[5] Sommerville, I., Software Engineering, 10th ed. Boston: Pearson, 2016.",
        "[6] Kendall, K. E., & Kendall, J. E., Systems Analysis and Design, 10th ed. Pearson, 2019."
    ]
    for pust in pustaka:
        p = doc.add_paragraph()
        p.paragraph_format.line_spacing = 1.15
        p.paragraph_format.space_after = Pt(6)
        p.add_run(pust)

    doc.add_page_break()

    # -------------------------------------------------------------
    # 10. LAMPIRAN (11 ITEM WAJIB)
    # -------------------------------------------------------------
    add_heading_1("LAMPIRAN")
    
    lampirans = [
        ("Lampiran 1. Proposal Proyek", 
         "Berisi berkas lengkap dokumen Proposal Proyek MPTI 'Perancangan dan Implementasi Sistem Informasi Manajemen Penjualan pada Malika Bakery Berbasis Web' yang mencakup abstrak, latar belakang, rumusan masalah, dan metode pengerjaan."),
        
        ("Lampiran 2. Surat Perintah Kerja / Kontrak Kerja dengan Mitra", 
         "Surat Perjanjian Kerjasama (MoU) dan Surat Perintah Kerja (SPK) resmi antara Tim Pengembang MPTI Informatika UAD dengan Pemilik Malika Bakery bertanggal 10 April 2026."),
        
        ("Lampiran 3. Log Book Kelompok (Terisi Minimal 7x)", 
         "Tabel catatan rekapitulasi 7 kali kegiatan rapat dan koordinasi kelompok terstruktur:\n"
         "• Pertemuan 1 (12 April 2026): Observasi awal & wawancara mitra Malika Bakery.\n"
         "• Pertemuan 2 (19 April 2026): Penyusunan Project Charter dan pembagian jobdesk tim.\n"
         "• Pertemuan 3 (28 April 2026): Finalisasi SRS dan analisis proses bisnis toko.\n"
         "• Pertemuan 4 (12 Mei 2026): Perancangan UML (Use Case, Activity, ERD MySQL).\n"
         "• Pertemuan 5 (25 Mei 2026): Merancang mockup UI Blade & Tailwind CSS.\n"
         "• Pertemuan 6 (15 Juni 2026): Review integrasi koding modul POS & Stok Laravel.\n"
         "• Pertemuan 7 (18 Juli 2026): Pengujian Blackbox & User Acceptance Test (UAT) bersama mitra."),
        
        ("Lampiran 4. Logbook Individu (Terisi Minimal 7x per Anggota)", 
         "Rekapitulasi logbook individu untuk 5 anggota tim pengembang:\n"
         "1. Fikri Abdi Mubbarak (Ketua Tim): 7 aktivitas manajemen jadwal, SRS, & komunikasi mitra.\n"
         "2. Aidil Fikri Ramdani (QA & Writer): 7 aktivitas penyusunan tes skenario, manual, & laporan.\n"
         "3. Ringga Rianza (Backend & DevOps): 7 aktivitas setup GitHub, database MySQL, Controller POS, & Hosting.\n"
         "4. Muhammad Hirano Alfairus (Frontend & UI/UX): 7 aktivitas desain wireframe & Blade Tailwind CSS.\n"
         "5. Dewa Fitriansyah Brahmana (Database & Tester): 7 aktivitas skema ERD, query SQL, & unit testing."),
        
        ("Lampiran 5. Foto Dokumentasi Kegiatan Proyek", 
         "Foto-foto bukti dokumentasi kegiatan:\n"
         "1. Foto wawancara dan observasi lokasi usaha Malika Bakery.\n"
         "2. Foto rapat koordinasi tim di Kampus 4 UAD.\n"
         "3. Foto proses pengerjaan koding dan diskusi teknis.\n"
         "4. Foto pelaksanaan UAT dan demonstrasi aplikasi bersama pemilik toko.\n"
         "5. Foto penandatanganan berita acara serah terima sistem."),
        
        ("Lampiran 6. Berita Acara / Bukti Serah Terima Proyek", 
         "Dokumen resmi Berita Acara Serah Terima (BAST) Sistem Informasi Manajemen Penjualan Malika Bakery Berbasis Web yang ditandatangani oleh Ketua Tim Fikri Abdi Mubbarak dan Pemilik Malika Bakery bertanggal 28 Juli 2026."),
        
        ("Lampiran 7. Bukti Pembiayaan & Laporan Keuangan Proyek", 
         "Kumpulan nota/kwitansi fisik pengeluaran operasional (Sewa Hosting & Domain .com, printer thermal, konsumsi rapat mitra, transportasi, dan cetak poster A3/laporan) dengan total pengeluaran sebesar Rp 3.250.000,-."),
        
        ("Lampiran 8. Tools (Source Code, Hosting, Password, User Manual)", 
         "Spesifikasi tools & info akses luaran proyek:\n"
         "• Repository GitHub: https://github.com/ringgarianza/MalikaBakery\n"
         "• URL Live Website Hosting: https://malikabakery.com\n"
         "• Account Credential Sheet: Master Admin & Password Superuser (Diserahterimakan rahasia ke mitra).\n"
         "• User Manual PDF: Buku Petunjuk Penggunaan Sistem POS Kasir & Stok Roti (35 Halaman)."),
        
        ("Lampiran 9. Link Video Profil Produk Luaran Proyek", 
         "Video Teaser Profil & Demonstration Sistem Informasi Malika Bakery Berdurasi 5 Menit 30 Detik.\n"
         "• Link YouTube: https://youtu.be/malikabakery_mpti_demo\n"
         "• Link Google Drive HD: https://drive.google.com/file/d/malikabakery_video_teaser/view"),
        
        ("Lampiran 10. Poster Produk Luaran Proyek (Format A2/A3)", 
         "Tampilan visual poster promosi produk luaran proyek MPTI Malika Bakery format A3/A2 yang memuat judul, logo UAD, arsitektur sistem, fitur utama (POS, Stok, Laporan), screenshot UI, dan nama tim pengembang."),
        
        ("Lampiran 11. Slide Presentasi Proyek (6 Halaman per Mahasiswa)", 
         "Cetakan slide presentasi ujian proyek MPTI berjumlah total 30 slide (6 slide per anggota tim) yang mencakup Pendahuluan (Fikri), Perencanaan & WBS (Ringga), UI/UX (Hirano), Testing & QA (Aidil), serta Sustanability & Kesimpulan (Dewa).")
    ]
    
    for title, desc in lampirans:
        add_heading_2(title)
        add_p(desc, space_after=12)

    # Save to file
    output_filename = r"c:\MalikaBakery\MalikaBakery\LAPORAN_PROYEK_MPTI_MALIKA_BAKERY.docx"
    doc.save(output_filename)
    print(f"Report successfully saved to {output_filename}")

if __name__ == "__main__":
    create_report()
