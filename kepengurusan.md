# [SYSTEM PERSONA]
Act as an Expert Full-Stack Laravel Developer and a Master UI/UX Designer. You write clean, scalable, and secure code following the latest Laravel best practices. You have a deep understanding of organic, human-centric design principles.

# [TASK OBJECTIVE]
Create a new public frontend page for the Laravel application to display the "Kepengurusan" (Management Board) based on the provided data. The page should follow the "UI/UX Pro Max" design constraints.

# [DATA SOURCE: SUSUNAN BADAN PENGURUS WILAYAH APJII SUMATERA BARAT PERIODE: 2026-2028][cite: 1]
Use the following exact data to populate the page:

**Kantor Sementara:**
- Alamat: Jl Batang Anai No 4A, GOR H Agus Salim, Kel. Rimbo Kaluang, Kota Padang, Sumatera Barat 25111[cite: 1]
- Email: darmawi.apjiisumbar@gmail.com[cite: 1]
- No Telp: 081274055771[cite: 1]

**Susunan Pengurus:**
- Ketua: Darmawi (PT Marawa Transmisi Media)[cite: 1]
- Sekretaris: Budi S (PT Carano Tech Solusi)[cite: 1]
- Bendahara: Aan Rizal (PT Gogiga Media Teknologi)[cite: 1]
- Ketua Bidang Organisasi dan Layanan: Suhardedi (PT Gnet Biaro Akses)[cite: 1]
- Ketua Bidang Regulasi: Muhammad Aditya (PT Irama Media Flashnet)[cite: 1]
- Ketua Bidang Hubungan Masyarakat: Riano Oskar (PT CinoxMedia Network Indonesia)[cite: 1]
- Ketua Bidang Advokasi: Novriadi (PT Skynet Network Bersama)[cite: 1]
- Ketua Bidang IX da Data Center: Amirullah (PT Gnet Biaro Data)[cite: 1]
- Ketua Bidang Kelembagaan: Yonaldi (PT Media Tekno Nusantara)[cite: 1]
- Ketua Bidang Sistem Informasi dan Pengembangan Sumber Daya Anggota: Rusrian Yuzaf (PT Salingka Telekomunikasi Nusantara)[cite: 1]

# [DESIGN CONSTRAINTS & LAYOUT STRATEGY ("UI/UX PRO MAX")]
1. **Hierarchy & Grid:** Structure the layout to reflect organizational hierarchy. 
   - Place the "Ketua" at the very top (centered, prominent).
   - Followed by a two-column or balanced layout for "Sekretaris" and "Bendahara" just below the Ketua.
   - The "Ketua Bidang" members should be displayed in a responsive grid (3 columns on desktop, 2 on tablet, 1 on mobile) below the core leadership.
2. **Card Design:** Wrap each member's information in a Tailwind card component. 
   - Apply ultra-soft, natural drop shadows (`shadow-sm` to `shadow-md` on hover).
   - Maximize whitespace/padding inside the cards (e.g., `p-6` or `p-8`).
   - Use subtle background colors (e.g., `bg-white` or `bg-slate-50`) to avoid harsh borders.
3. **Typography:** Use a clean sans-serif font. The person's name should be bold and prominent (`text-lg` or `text-xl`, `font-semibold`, `text-slate-800`), while their company name and role should use softer colors (`text-sm`, `text-slate-500`).
4. **Header Section:** Include a clean hero section or header for the page displaying the Title ("Susunan Badan Pengurus Wilayah APJII Sumatera Barat 2026-2028")[cite: 1] and the office address/contact info[cite: 1] neatly formatted at the top or bottom of the page.

# [EXECUTION STEPS]
- [ ] Create a new route in `web.php` for the Kepengurusan page (e.g., `/kepengurusan`).
- [ ] Create a dedicated Controller (`BoardController` or similar) or simply return the view directly from the route if no database dynamic data is needed for now.
- [ ] Create a new Blade view file (e.g., `resources/views/pages/kepengurusan.blade.php`).
- [ ] Implement the layout using Tailwind CSS utility classes strictly following the data and design constraints provided above.
- [ ] Review the output for responsive behavior (mobile, tablet, desktop).
- *ACTION: Notify upon completion so the user can review the visual rendering in the browser.*