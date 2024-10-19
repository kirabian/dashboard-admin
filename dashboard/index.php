<div id="announcement" class="announcement">
    <p id="announcement-text">Pengumuman: Website Sedang Dalam Masa Pengembangan!!</p>
</div>
<div class="container-fluid p-4">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Selamat Datang!</h4>
                    <p class="card-text">Dashboard Pengaduan Masyarakat. Anda dapat mengelola laporan, memeriksa perkembangan, dan banyak lagi!</p>
                    <!-- Realtime Clock -->
                    <div class="clock" id="clock"></div>
                </div>
            </div>


            <!-- Cards Section -->
            <div class="row mt-4">
                <!-- Penduduk -->
                <div class="col-md-4 col-12 mb-4">
                    <div class="card stat-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-box bg-primary text-white rounded-circle">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                            <div class="ml-3">
                                <h5 class="card-title">Penduduk</h5>
                                <p class="card-text">1,234</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Kategori -->
                <div class="col-md-4 col-12 mb-4">
                    <div class="card stat-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-box bg-success text-white rounded-circle">
                                <i class="fas fa-layer-group fa-2x"></i>
                            </div>
                            <div class="ml-3">
                                <h5 class="card-title">Kategori</h5>
                                <p class="card-text">12</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Users -->
                <div class="col-md-4 col-12 mb-4">
                    <div class="card stat-card">
                        <div class="card-body d-flex align-items-center">
                            <div class="icon-box bg-warning text-white rounded-circle">
                                <i class="fas fa-user fa-2x"></i>
                            </div>
                            <div class="ml-3">
                                <h5 class="card-title">Users</h5>
                                <p class="card-text">567</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ayat Al-Qur'an Random with Pagination -->
            <div class="row">
                <div class="col-md-6">
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5 class="card-title">Ayat Al-Qur'an Acak</h5>
                            <blockquote id="quran-ayah" class="blockquote"></blockquote>
                            <footer id="quran-translation" class="blockquote-footer"></footer>
                            <!-- Pagination for Ayat -->
                            <div class="mt-3">
                                <button class="btn btn-primary" id="prev-ayah">Sebelumnya</button>
                                <button class="btn btn-primary" id="next-ayah">Selanjutnya</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Adzan Schedule -->
                <div class="col-md-6">
                    <div class="card mt-4">
                        <div class="card-body">
                            <h5 class="card-title">Jadwal Adzan - Jakarta</h5>
                            <ul class="list-group" id="adzan-times">
                                <li class="list-group-item-adzan">Subuh: <span id="fajr"></span></li>
                                <li class="list-group-item-adzan">Dzuhur: <span id="dhuhr"></span></li>
                                <li class="list-group-item-adzan">Ashar: <span id="asr"></span></li>
                                <li class="list-group-item-adzan">Maghrib: <span id="maghrib"></span></li>
                                <li class="list-group-item-adzan">Isya: <span id="isha"></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cuaca Real-Time -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Cuaca Saat Ini</h5>
                            <div id="weather">
                                <p><strong>Kota:</strong> <span id="city"></span></p>
                                <p><strong>Suhu:</strong> <span id="temperature"></span>°C</p>
                                <p><strong>Kondisi:</strong> <span id="weather-condition"></span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kalender Hijriah -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Kalender Hijriah</h5>
                            <p id="hijri-date"></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Berita Terbaru -->
            <div class="card mt-4">
                <div class="card-body">
                    <h5 class="card-title">Berita Terbaru</h5>
                    <ul id="news-list" class="list-group">
                        <!-- Berita akan diisi dengan JavaScript -->
                    </ul>
                    <button id="prev-button" disabled>Previous</button>
                    <button id="next-button">Next</button>
                </div>
            </div>


            <!-- FontAwesome for Icons -->
            <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

            <!-- JavaScript untuk Clock, API Ayat, dan API Adzan -->
            <script>
                // Kalender Hijriah (dengan format tanggal yang tepat)
                async function fetchHijriDate() {
                    const today = new Date();
                    const day = today.getDate().toString().padStart(2, '0');
                    const month = (today.getMonth() + 1).toString().padStart(2, '0');
                    const year = today.getFullYear();

                    try {
                        const response = await fetch(`http://api.aladhan.com/v1/gToH?date=${day}-${month}-${year}`);
                        const data = await response.json();
                        document.getElementById('hijri-date').textContent = `Tanggal Hijriah: ${data.data.hijri.date}`;
                    } catch (error) {
                        console.error("Error fetching Hijri date:", error);
                    }
                }
                fetchHijriDate();

                // Real-time Clock
                function updateClock() {
                    const now = new Date();
                    const hours = now.getHours().toString().padStart(2, '0');
                    const minutes = now.getMinutes().toString().padStart(2, '0');
                    const seconds = now.getSeconds().toString().padStart(2, '0');
                    document.getElementById('clock').textContent = hours + ':' + minutes + ':' + seconds;
                }
                setInterval(updateClock, 1000);

                // API Quran Acak
                let currentAyah = 1; // Inisiasi ayat pertama

                async function fetchQuranAyah(ayahNumber) {
                    try {
                        const response = await fetch(`https://api.alquran.cloud/v1/ayah/${ayahNumber}/editions/quran-simple,en.asad`);
                        const data = await response.json();
                        const arabicAyah = data.data[0].text;
                        const translationAyah = data.data[1].text;
                        document.getElementById('quran-ayah').innerHTML = arabicAyah;
                        document.getElementById('quran-translation').innerHTML = translationAyah;
                    } catch (error) {
                        console.error("Error fetching Quran Ayah:", error);
                    }
                }

                // Fetch initial Ayah
                fetchQuranAyah(currentAyah);

                // Pagination Controls
                document.getElementById('prev-ayah').addEventListener('click', function() {
                    if (currentAyah > 1) {
                        currentAyah--;
                        fetchQuranAyah(currentAyah);
                    }
                });

                document.getElementById('next-ayah').addEventListener('click', function() {
                    currentAyah++;
                    fetchQuranAyah(currentAyah);
                });

                // API Adzan untuk Jakarta
                async function fetchAdzanTimes() {
                    try {
                        const response = await fetch(`https://api.aladhan.com/v1/timingsByCity?city=Jakarta&country=Indonesia&method=2`);
                        const data = await response.json();
                        const timings = data.data.timings;

                        // Update elemen dengan waktu adzan
                        document.getElementById('fajr').textContent = timings.Fajr;
                        document.getElementById('dhuhr').textContent = timings.Dhuhr;
                        document.getElementById('asr').textContent = timings.Asr;
                        document.getElementById('maghrib').textContent = timings.Maghrib;
                        document.getElementById('isha').textContent = timings.Isha;
                    } catch (error) {
                        console.error("Error fetching Adzan times:", error);
                    }
                }

                // Fetch initial Adzan times
                fetchAdzanTimes();


                // Fungsi untuk mengecek waktu adzan dan mengupdate pengumuman
                async function checkAdzanTime() {
                    const now = new Date();
                    const currentTime = now.getHours() * 60 + now.getMinutes(); // Konversi ke menit

                    // Ambil waktu adzan dari API
                    try {
                        const response = await fetch(`https://api.aladhan.com/v1/timingsByCity?city=Jakarta&country=Indonesia&method=2`);
                        const data = await response.json();
                        const timings = data.data.timings;

                        // Mengonversi waktu adzan ke menit
                        const fajrTime = convertToMinutes(timings.Fajr);
                        const dhuhrTime = convertToMinutes(timings.Dhuhr);
                        const asrTime = convertToMinutes(timings.Asr);
                        const maghribTime = convertToMinutes(timings.Maghrib);
                        const ishaTime = convertToMinutes(timings.Isha);

                        // Cek jika waktu adzan telah tiba
                        if (currentTime === fajrTime) {
                            document.getElementById('announcement').textContent = "Waktu Adzan Subuh di Jakarta sudah berkumandang, siap-siap shalat!";
                        } else if (currentTime === dhuhrTime) {
                            document.getElementById('announcement').textContent = "Waktu Adzan Dzuhur di Jakarta sudah berkumandang, siap-siap shalat!";
                        } else if (currentTime === asrTime) {
                            document.getElementById('announcement').textContent = "Waktu Adzan Ashar di Jakarta sudah berkumandang, siap-siap shalat!";
                        } else if (currentTime === maghribTime) {
                            document.getElementById('announcement').textContent = "Waktu Adzan Maghrib di Jakarta sudah berkumandang, siap-siap shalat!";
                        } else if (currentTime === ishaTime) {
                            document.getElementById('announcement').textContent = "Waktu Adzan Isya di Jakarta sudah berkumandang, siap-siap shalat!";
                        }
                    } catch (error) {
                        console.error("Error fetching Adzan times:", error);
                    }
                }

                // Fungsi untuk mengonversi waktu ke menit
                function convertToMinutes(time) {
                    const [hours, minutes] = time.split(':').map(Number);
                    return hours * 60 + minutes;
                }

                // Panggil fungsi checkAdzanTime setiap menit
                setInterval(checkAdzanTime, 60000); // Setiap 1 menit
                checkAdzanTime(); // Panggil sekali di awal
            </script>
            <!-- API Cuaca dan Berita -->
            <script>
                // API Cuaca dari OpenWeatherMap (Anda perlu mendapatkan API key)
                const weatherApiKey = '3592e31732bc7a529e8d23efec669a04'; // Ganti dengan API key Anda
                async function fetchWeather() {
                    try {
                        const response = await fetch(`https://api.openweathermap.org/data/2.5/weather?q=Jakarta&units=metric&appid=${weatherApiKey}`);
                        const data = await response.json();
                        document.getElementById('city').textContent = data.name;
                        document.getElementById('temperature').textContent = data.main.temp;
                        document.getElementById('weather-condition').textContent = data.weather[0].description;
                    } catch (error) {
                        console.error("Error fetching weather data:", error);
                    }
                }
                fetchWeather();

                const newsList = document.getElementById('news-list');
                const prevButton = document.getElementById('prev-button');
                const nextButton = document.getElementById('next-button');

                let currentPage = 1; // Track the current page
                const articlesPerPage = 3; // Number of articles to display per page
                let totalArticles = 0; // Total number of articles fetched
                let articles = []; // Store the fetched articles

                function renderArticles() {
                    // Clear existing articles
                    newsList.innerHTML = '';
                    const start = (currentPage - 1) * articlesPerPage;
                    const end = start + articlesPerPage;

                    const paginatedArticles = articles.slice(start, end);

                    paginatedArticles.forEach(article => {
                        const li = document.createElement('li');
                        li.classList.add('list-group-item');
                        li.innerHTML = `
            <strong>${article.title}</strong><br>
            ${article.description ? article.description : 'No description available.'}
        `;
                        newsList.appendChild(li);
                    });

                    // Update button states
                    prevButton.disabled = currentPage === 1;
                    nextButton.disabled = end >= totalArticles;
                }

                function fetchNews() {
                    fetch('https://newsapi.org/v2/top-headlines?country=us&apiKey=87f7fbf6bb5c4811bef41da70e59bec0')
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(`HTTP error! Status: ${response.status}`);
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.status === "ok") {
                                totalArticles = data.articles.length;
                                articles = data.articles; // Store fetched articles
                                renderArticles(); // Render the first page
                            } else {
                                console.error('Error fetching articles:', data.message);
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }

                // Pagination button event listeners
                nextButton.addEventListener('click', () => {
                    if ((currentPage * articlesPerPage) < totalArticles) {
                        currentPage++;
                        renderArticles();
                    }
                });

                prevButton.addEventListener('click', () => {
                    if (currentPage > 1) {
                        currentPage--;
                        renderArticles();
                    }
                });

                // Fetch news when the page loads
                fetchNews();


                // Fetch news when the page loads
                fetchNews();
            </script>


            <style>
                body {
                    font-family: 'Poppins', sans-serif;
                    background-color: #f5f7fa;
                }

                .card {
                    border: none;
                    border-radius: 15px;
                    box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
                }

                .card-body {
                    padding: 20px;
                }

                .card-title {
                    font-size: 24px;
                    font-weight: bold;
                    color: #34495e;
                }

                .card-text {
                    font-size: 16px;
                    color: #7f8c8d;
                }

                /* Style untuk Statistik Card */
                .stat-card {
                    border-radius: 15px;
                    background: linear-gradient(135deg, #8e9eab, #eef2f3);
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }

                .stat-card:hover {
                    transform: translateY(-10px);
                    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
                }

                .icon-box {
                    width: 60px;
                    height: 60px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                }

                /* Realtime Clock */
                .clock {
                    font-size: 24px;
                    font-weight: bold;
                    color: #2c3e50;
                    margin-top: 10px;
                }

                /* Pagination Buttons */
                .btn {
                    margin-right: 10px;
                }

                /* Responsiveness */
                @media (max-width: 768px) {
                    .stat-card {
                        margin-bottom: 20px;
                    }
                }

                /* Jadwal Adzan List */
                .list-group-item-adzan {
                    font-size: 16px;
                    font-weight: bold;
                    color: #2c3e50;
                    background-color: #f8f9fa;
                    border: none;
                }

                /* News List Styles */
                #news-list {
                    margin-top: 20px;
                    /* Space between the title and news list */
                }

                /* List Group Item for News Articles */
                .list-group-item {
                    background-color: #ffffff;
                    /* White background for news items */
                    border-radius: 8px;
                    /* Rounded corners */
                    margin: 5px 0;
                    /* Space between list items */
                    padding: 15px;
                    /* Padding inside list items */
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                    /* Subtle shadow for list items */
                    transition: background 0.3s;
                    /* Smooth background change */
                }

                .list-group-item:hover {
                    background-color: #f1f1f1;
                    /* Light gray on hover */
                }

                /* Strong Text in List Items */
                .list-group-item strong {
                    display: block;
                    /* Title on its own line */
                    font-size: 18px;
                    /* Slightly larger font for the title */
                    color: #34495e;
                    /* Dark gray color for the title */
                    margin-bottom: 5px;
                    /* Space between title and description */
                }

                /* Pagination Buttons */
                #prev-button,
                #next-button {
                    background-color: #3498db;
                    /* Blue background */
                    color: #ffffff;
                    /* White text */
                    border: none;
                    /* No border */
                    border-radius: 5px;
                    /* Rounded corners */
                    padding: 10px 15px;
                    /* Padding for buttons */
                    cursor: pointer;
                    /* Pointer cursor */
                    transition: background 0.3s;
                    /* Smooth background change */
                }

                #prev-button:hover,
                #next-button:hover {
                    background-color: #2980b9;
                    /* Darker blue on hover */
                }

                #prev-button:disabled,
                #next-button:disabled {
                    background-color: #bdc3c7;
                    /* Gray for disabled buttons */
                    cursor: not-allowed;
                    /* Not allowed cursor */
                }

                .announcement {
                    background-color: #3498db;
                    /* Warna latar belakang */
                    color: #ffffff;
                    /* Warna teks */
                    font-size: 18px;
                    /* Ukuran font */
                    padding: 0px;
                    /* Padding */
                    white-space: nowrap;
                    /* Mencegah teks membungkus */
                    overflow: hidden;
                    /* Sembunyikan teks yang melebihi */
                    position: relative;
                    /* Untuk menempatkan elemen anak secara absolut */
                    display: flex;
                    /* Gunakan flexbox */
                    align-items: center;
                    /* Vertikal center */
                    justify-content: center;
                    /* Horizontal center */
                    height: 50px;
                    /* Tinggi tetap untuk kontainer */
                    width: 100%;
                }

                #announcement-text {
                    display: flex;
                    /* Menjaga teks dalam satu baris */
                    position: absolute;
                    /* Agar bisa bergerak */
                    animation: move 10s linear infinite;
                    /* Animasi berjalan */
                    text-align: center;
                    justify-content: center;
                    align-items: center;
                }

                /* Animasi berjalan */
                @keyframes move {
                    0% {
                        transform: translateX(100%);
                        /* Mulai dari kanan luar */
                    }

                    100% {
                        transform: translateX(-100%);
                        /* Bergerak ke kiri luar */
                    }
                }
            </style>