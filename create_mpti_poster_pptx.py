import sys
import os
from pptx import Presentation
from pptx.util import Inches, Pt
from pptx.enum.text import PP_ALIGN, MSO_ANCHOR
from pptx.dml.color import RGBColor
from pptx.enum.shapes import MSO_SHAPE

def create_a3_poster():
    prs = Presentation()
    
    # Set slide dimensions to A3 Portrait (11.69 x 16.54 inches)
    prs.slide_width = Inches(11.69)
    prs.slide_height = Inches(16.54)
    
    # Blank slide layout
    blank_layout = prs.slide_layouts[6]
    slide = prs.slides.add_slide(blank_layout)
    
    # Background color (Soft light grey-blue #F0F4F8)
    bg = slide.shapes.add_shape(MSO_SHAPE.RECTANGLE, 0, 0, Inches(11.69), Inches(16.54))
    bg.fill.solid()
    bg.fill.fore_color.rgb = RGBColor(240, 244, 248)
    bg.line.fill.background()

    # Color Palette definitions
    NAVY = RGBColor(30, 58, 138)
    AMBER_BG = RGBColor(254, 243, 199)
    AMBER_HEADER = RGBColor(245, 158, 11)
    INDIGO_BG = RGBColor(224, 231, 255)
    INDIGO_HEADER = RGBColor(99, 102, 241)
    ROSE_BG = RGBColor(254, 226, 226)
    ROSE_HEADER = RGBColor(244, 63, 94)
    EMERALD_BG = RGBColor(209, 250, 229)
    EMERALD_HEADER = RGBColor(16, 185, 129)
    SKY_BG = RGBColor(224, 242, 254)
    SKY_HEADER = RGBColor(14, 165, 233)
    PURPLE_BG = RGBColor(243, 232, 255)
    PURPLE_HEADER = RGBColor(168, 85, 247)
    WHITE = RGBColor(255, 255, 255)
    DARK_TEXT = RGBColor(30, 41, 59)

    # 1. HEADER CARD (Top)
    header_box = slide.shapes.add_shape(MSO_SHAPE.ROUNDED_RECTANGLE, Inches(0.4), Inches(0.4), Inches(10.89), Inches(2.2))
    header_box.fill.solid()
    header_box.fill.fore_color.rgb = WHITE
    header_box.line.color.rgb = RGBColor(203, 213, 225)
    
    # Header Text
    tf = header_box.text_frame
    tf.word_wrap = True
    tf.margin_top = Inches(0.15)
    tf.margin_left = Inches(0.2)
    tf.margin_right = Inches(0.2)
    
    p0 = tf.paragraphs[0]
    p0.text = "UNIVERSITAS AHMAD DAHLAN • PROGRAM STUDI INFORMATIKA • MPTI 2026"
    p0.font.size = Pt(10)
    p0.font.bold = True
    p0.font.color.rgb = NAVY
    p0.alignment = PP_ALIGN.CENTER
    
    p1 = tf.add_paragraph()
    p1.text = "PENGEMBANGAN SISTEM INFORMASI E-COMMERCE DAN KATALOG PRODUK INTERAKTIF MALIKABAKERY LOMBOK BERBASIS WEB"
    p1.font.size = Pt(18)
    p1.font.bold = True
    p1.font.color.rgb = DARK_TEXT
    p1.alignment = PP_ALIGN.CENTER
    
    p2 = tf.add_paragraph()
    p2.text = "Tim Pelaksana: Tim MPTI Informatika | Dosen Pembimbing: Bambang Robi'in, M.T. / Drs. Wahyu Pujiyono, M.Kom."
    p2.font.size = Pt(10)
    p2.font.bold = True
    p2.font.color.rgb = RGBColor(71, 85, 105)
    p2.alignment = PP_ALIGN.CENTER

    p3 = tf.add_paragraph()
    p3.text = "Mitra Pengguna Proyek: Toko Roti & Pastry MalikaBakery (Mataram, Lombok, NTB)"
    p3.font.size = Pt(9.5)
    p3.font.color.rgb = RGBColor(100, 116, 139)
    p3.alignment = PP_ALIGN.CENTER

    # 2. SUBHEADER BANNER
    sub_banner = slide.shapes.add_shape(MSO_SHAPE.ROUNDED_RECTANGLE, Inches(0.4), Inches(2.7), Inches(10.89), Inches(0.6))
    sub_banner.fill.solid()
    sub_banner.fill.fore_color.rgb = NAVY
    sub_banner.line.fill.background()
    tf_sub = sub_banner.text_frame
    tf_sub.word_wrap = True
    p_sub = tf_sub.paragraphs[0]
    p_sub.text = '"Sistem Informasi E-Commerce MalikaBakery adalah solusi web interaktif untuk mempermudah katalogisasi produk roti fresh, pemesanan otomatis via WhatsApp, dan efisiensi operasional toko roti di Lombok."'
    p_sub.font.size = Pt(9.5)
    p_sub.font.italic = True
    p_sub.font.color.rgb = WHITE
    p_sub.alignment = PP_ALIGN.CENTER

    # COLUMN METRICS
    col_w = Inches(3.45)
    gap = Inches(0.27)
    left_col_x = Inches(0.4)
    mid_col_x = left_col_x + col_w + gap
    right_col_x = mid_col_x + col_w + gap
    top_y = Inches(3.45)

    # Function helper for card container
    def add_card(x, y, w, h, bg_color, header_title, header_color, text_content, is_bullet=False):
        # Base Card
        card = slide.shapes.add_shape(MSO_SHAPE.ROUNDED_RECTANGLE, x, y, w, h)
        card.fill.solid()
        card.fill.fore_color.rgb = bg_color
        card.line.color.rgb = RGBColor(203, 213, 225)
        
        # Header Pill
        pill = slide.shapes.add_shape(MSO_SHAPE.ROUNDED_RECTANGLE, x + Inches(0.2), y + Inches(0.15), w - Inches(0.4), Inches(0.4))
        pill.fill.solid()
        pill.fill.fore_color.rgb = header_color
        pill.line.fill.background()
        tf_pill = pill.text_frame
        p_pill = tf_pill.paragraphs[0]
        p_pill.text = header_title.upper()
        p_pill.font.size = Pt(11)
        p_pill.font.bold = True
        p_pill.font.color.rgb = WHITE
        p_pill.alignment = PP_ALIGN.CENTER
        
        # Text Body Box
        tb = slide.shapes.add_textbox(x + Inches(0.15), y + Inches(0.6), w - Inches(0.3), h - Inches(0.7))
        tf_body = tb.text_frame
        tf_body.word_wrap = True
        
        if isinstance(text_content, list):
            for i, line in enumerate(text_content):
                p = tf_body.paragraphs[0] if i == 0 else tf_body.add_paragraph()
                p.text = ("• " if is_bullet else "") + line
                p.font.size = Pt(9.5)
                p.font.color.rgb = DARK_TEXT
                p.space_after = Pt(4)
        else:
            p = tf_body.paragraphs[0]
            p.text = text_content
            p.font.size = Pt(9.5)
            p.font.color.rgb = DARK_TEXT
        
        return card

    # LEFT COLUMN CARDS
    # 1. LATAR BELAKANG
    bg_text = (
        "Pencatatan pesanan roti dan promosi produk di toko MalikaBakery Lombok sebelumnya "
        "masih dilakukan secara konvensional via pesan singkat. Hal ini menimbulkan kendala seperti ketidakpastian "
        "stok fresh baked, terbatasnya jangkauan pasar di luar area toko, serta minimnya katalog visual interaktif.\n\n"
        "Oleh karena itu, diperlukan sistem informasi e-commerce berbasis web yang mampu menampilkan katalog roti "
        "interaktif, harga transparan, serta sistem order terintegrasi."
    )
    add_card(left_col_x, top_y, col_w, Inches(5.8), AMBER_BG, "Latar Belakang", AMBER_HEADER, bg_text)

    # 2. FITUR PRODUK
    fitur_list = [
        "Katalog Roti Interaktif: Foto roti, deskripsi rasa, & harga real-time.",
        "Integrasi Order WA: Format pesanan otomatis terisi detail roti.",
        "Filter Kategori Roti: Roti Manis, Gurih, Pizza Mozzarella, Pastry.",
        "Brand Story: Informasi 100% real butter & zero preservatives.",
        "Responsive Layout: Akses optimal dari Smartphone & Desktop."
    ]
    add_card(left_col_x, top_y + Inches(6.0), col_w, Inches(5.6), INDIGO_BG, "Fitur Produk", INDIGO_HEADER, fitur_list, is_bullet=True)

    # CENTER COLUMN CARDS
    # 3. GAMBARAN PRODUK
    add_card(mid_col_x, top_y, col_w, Inches(6.4), ROSE_BG, "Gambaran Produk", ROSE_HEADER, "")
    # Add image previews inside Gambaran Produk card
    img_dir = r"c:\MalikaBakery\MalikaBakery\public\images"
    img1_path = os.path.join(img_dir, "Roti Paperoni Smoke Beef.jpeg")
    img2_path = os.path.join(img_dir, "Roti Abon.jpeg")
    img3_path = os.path.join(img_dir, "Pizza daging mozzarella.jpeg")
    
    if os.path.exists(img1_path):
        slide.shapes.add_picture(img1_path, mid_col_x + Inches(0.2), top_y + Inches(0.7), width=col_w - Inches(0.4), height=Inches(2.2))
    if os.path.exists(img2_path):
        slide.shapes.add_picture(img2_path, mid_col_x + Inches(0.2), top_y + Inches(3.1), width=(col_w - Inches(0.5))/2, height=Inches(1.8))
    if os.path.exists(img3_path):
        slide.shapes.add_picture(img3_path, mid_col_x + Inches(0.2) + (col_w - Inches(0.5))/2 + Inches(0.1), top_y + Inches(3.1), width=(col_w - Inches(0.5))/2, height=Inches(1.8))

    # Captions
    tb_cap = slide.shapes.add_textbox(mid_col_x + Inches(0.2), top_y + Inches(5.0), col_w - Inches(0.4), Inches(1.2))
    tf_cap = tb_cap.text_frame
    tf_cap.word_wrap = True
    p_cap = tf_cap.paragraphs[0]
    p_cap.text = "Visual Interface Website MalikaBakery (Landing Page Hero Banner, Katalog Roti & Pastry, serta Form Order WA Direct Chat)."
    p_cap.font.size = Pt(8.5)
    p_cap.font.bold = True
    p_cap.alignment = PP_ALIGN.CENTER
    p_cap.font.color.rgb = DARK_TEXT

    # 4. TAHAPAN PENGEMBANGAN
    sdlc_list = [
        "1. Needs Assessment: Audit sistem toko & identifikasi kebutuhan.",
        "2. System Design: Perancangan UI/UX & struktur basis data.",
        "3. Development: Pengkodean Framework Laravel & Tailwind CSS.",
        "4. Testing & QA: Pengujian fungsi black-box & usability test.",
        "5. Deployment: Peluncuran ke hosting cloud Vercel."
    ]
    add_card(mid_col_x, top_y + Inches(6.6), col_w, Inches(5.0), EMERALD_BG, "Tahapan Pengembangan", EMERALD_HEADER, sdlc_list)

    # RIGHT COLUMN CARDS
    # 5. TUJUAN
    tujuan_text = (
        "Penelitian dan proyek MPTI ini bertujuan untuk mengimplementasikan aplikasi web e-commerce "
        "interaktif yang meningkatkan efisiensi proses pemesanan roti fresh, memberikan kenyamanan bertransaksi "
        "bagi pelanggan di Lombok, serta memperluas jangkauan pemasaran toko MalikaBakery."
    )
    add_card(right_col_x, top_y, col_w, Inches(3.4), AMBER_BG, "Tujuan Proyek", AMBER_HEADER, tujuan_text)

    # 6. CARA KERJA
    cara_kerja = [
        "Step 1: Akses Website - Pelanggan membuka website MalikaBakery & memilih menu roti.",
        "Step 2: Klik Order WA - Sistem mengarahkan ke WA CS dengan pesan pesanan terformat.",
        "Step 3: Delivery - Admin toko memproses roti fresh baked & mengirimkan ke pelanggan."
    ]
    add_card(right_col_x, top_y + Inches(3.6), col_w, Inches(4.2), SKY_BG, "Cara Kerja Sistem", SKY_HEADER, cara_kerja)

    # 7. KESIMPULAN
    kesimpulan_text = (
        "Sistem Informasi MalikaBakery Lombok berhasil dibangun dengan arsitektur web modern. "
        "Pengujian menunjukkan sistem mampu memangkas waktu pemesanan hingga 60%, memberikan transparansi informasi "
        "produk, serta meningkatkan daya tarik visual produk roti fresh secara signifikan."
    )
    add_card(right_col_x, top_y + Inches(8.0), col_w, Inches(3.6), PURPLE_BG, "Kesimpulan", PURPLE_HEADER, kesimpulan_text)

    # 8. ACKNOWLEDGEMENT (Bottom Full Width)
    ack_box = slide.shapes.add_shape(MSO_SHAPE.ROUNDED_RECTANGLE, Inches(0.4), Inches(15.3), Inches(10.89), Inches(0.85))
    ack_box.fill.solid()
    ack_box.fill.fore_color.rgb = WHITE
    ack_box.line.color.rgb = RGBColor(203, 213, 225)
    tf_ack = ack_box.text_frame
    tf_ack.word_wrap = True
    tf_ack.margin_top = Inches(0.1)
    
    p_ack_head = tf_ack.paragraphs[0]
    p_ack_head.text = "ACKNOWLEDGEMENT:"
    p_ack_head.font.size = Pt(10)
    p_ack_head.font.bold = True
    p_ack_head.font.color.rgb = NAVY
    p_ack_head.alignment = PP_ALIGN.CENTER
    
    p_ack_body = tf_ack.add_paragraph()
    p_ack_body.text = "Proyek MPTI ini dikembangkan oleh Tim Mahasiswa Informatika dan Didukung oleh: Program Studi Informatika Universitas Ahmad Dahlan, Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi, serta Mitra Pengguna MalikaBakery Lombok (Tahun Akademik 2024/2026)."
    p_ack_body.font.size = Pt(8.5)
    p_ack_body.font.color.rgb = DARK_TEXT
    p_ack_body.alignment = PP_ALIGN.CENTER

    # Save presentation
    output_path = r"c:\MalikaBakery\MalikaBakery\public\Poster_MPTI_MalikaBakery_A3.pptx"
    prs.save(output_path)
    print(f"PPTX Poster saved successfully at {output_path}")

if __name__ == "__main__":
    create_a3_poster()
