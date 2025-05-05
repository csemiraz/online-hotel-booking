<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<body>
  <h1>🏨 Online Hotel Booking System</h1>

  <p>This is a <strong>web-based hotel booking application</strong> developed using <strong>Laravel</strong>, designed to help users browse, search, and book hotel rooms online with ease. The system provides a smooth booking experience for customers while allowing hotel administrators to manage rooms, reservations, and users.</p>

  <h2>🚀 Features</h2>
  <ul>
    <li>User registration and login</li>
    <li>Search and filter hotels/rooms by availability, type, and location</li>
    <li>Real-time room availability and booking system</li>
    <li>Admin dashboard to manage hotels, rooms, and bookings</li>
    <li>Booking history and confirmation receipts</li>
    <li>Role-based access (admin, customer)</li>
    <li>Responsive UI (compatible with desktop & mobile)</li>
  </ul>

  <h2>🛠️ Tech Stack</h2>
  <ul>
    <li><strong>Backend:</strong> Laravel (PHP Framework)</li>
    <li><strong>Frontend:</strong> Blade templates, HTML, CSS, JavaScript</li>
    <li><strong>Database:</strong> MySQL</li>
    <li><strong>Authentication:</strong> Laravel Breeze / Laravel UI / Custom Auth</li>
    <li><strong>Tooling:</strong> Git, GitHub, Composer, Laravel Artisan CLI</li>
  </ul>

  <h2>⚙️ Installation</h2>
  <ol>
    <li>Clone the repository:
      <pre><code>git clone https://github.com/csemiraz/online-hotel-booking.git
cd online-hotel-booking</code></pre>
    </li>
    <li>Install dependencies:
      <pre><code>composer install
npm install && npm run dev</code></pre>
    </li>
    <li>Set up the environment:
      <pre><code>cp .env.example .env
php artisan key:generate</code></pre>
    </li>
    <li>Configure your <code>.env</code> file with your database details.</li>
    <li>Run migrations:
      <pre><code>php artisan migrate</code></pre>
    </li>
    <li>(Optional) Seed the database:
      <pre><code>php artisan db:seed</code></pre>
    </li>
    <li>Start the development server:
      <pre><code>php artisan serve</code></pre>
    </li>
    <li>Visit: <a href="http://localhost:8000">http://localhost:8000</a></li>
  </ol>


  <h2>🙌 Contributions</h2>
  <p>Feel free to fork this repository and contribute via pull requests. Suggestions and improvements are welcome!</p>

  <h2>📄 License</h2>
  <p>This project is open-source and available under the <a href="LICENSE">MIT License</a>.</p>
</body>
</html>
