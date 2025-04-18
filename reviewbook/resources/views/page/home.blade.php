@extends("layouts.master")
@section("title")
   Movie
@endsection
@section("content")
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<main>
    <h2>Apa Itu Movie</h2>
    <p>Film, atau dalam bahasa Inggris disebut movie, adalah karya seni visual yang menyampaikan cerita, ide, atau pesan melalui gambar bergerak dan suara. Film bisa berupa drama, aksi, komedi, horor, dokumenter, dan masih banyak lagi genre lainnya.<br><br>
      Biasanya, film dibuat untuk menghibur penonton, memberikan pelajaran hidup, atau bahkan menyuarakan isu sosial yang penting. Dengan bantuan aktor, sutradara, penulis skenario, dan tim produksi, sebuah film bisa membawa penonton masuk ke dalam dunia imajinasi atau menggambarkan kenyataan yang menyentuh.</p>
  
    <h2>Benefit Menonton Movie</h2>
    <ul>
      <li>✅ Sebagai Hiburan Film memberikan pengalaman menyenangkan yang bisa membuat kita tertawa, tegang, atau bahkan menangis. Cocok untuk melepas penat setelah aktivitas seharian.</li>
      <li>🧠 Meningkatkan Wawasan Banyak film, terutama film dokumenter atau sejarah, bisa menambah pengetahuan kita tentang budaya, peristiwa dunia, atau sudut pandang baru.</li>
      <li>❤️ Meningkatkan Empati Dengan melihat kisah karakter dari latar belakang yang berbeda, kita jadi lebih memahami perasaan dan kehidupan orang lain.      </li>
      <li>🌍 Belajar Bahasa Asing Menonton film dalam bahasa asing (dengan subtitle) adalah cara yang seru dan efektif untuk belajar kosakata dan pelafalan baru.</li>
      <li>🎨 Menghargai Seni dan Kreativitas Setiap film adalah hasil kerja seni dari banyak orang—sutradara, penulis, aktor, editor, hingga musik latar. Menonton film bisa menginspirasi dan meningkatkan apresiasi terhadap seni.</li>
      <li>👨‍👩‍👧‍👦 Menguatkan Hubungan Sosial Nonton bareng keluarga, teman, atau pasangan bisa mempererat hubungan dan membuka obrolan menarik setelah film selesai.</li>
    </ul>
  
    <h2>Cara Bergabung Di Movie</h2>
    <ol>
      <li>Mengunjungi Website ini</li>
      <li>mendaftar di <a class="green-text" href="/register">Form Sign Up</a></li>
      <li>Dibuat oleh calon web developer terbaik</li>
    </ol>
  </main>
@endsection

 