🌿 Plant Identifier & Care App

A Laravel-based web application that allows users to upload images of plants to identify them and get care instructions. It also lets users save identified plants to their personal garden, view care information, and receive pest control tips.


📋 Project Summary

**Plant Identifier & Care App** helps users identify plants through image upload using a third-party API and provides care instructions like watering schedule, pests advice, and general care tips. Users can save identified plants to their "My Garden" and track care routines easily.

---

🚀 Features

- 🌱 Upload plant image to identify
- 🔍 Fetch plant details using an API
- 📝 Generate care info, watering schedule, and pest advice randomly
- 📂 Save identified plants to "My Garden"
- 🗑️ Remove saved plants from garden
- 🖼️ Stylish UI with background image and navigation
- 📅 Next watering date shown in garden view

---

🛠️ Tech Stack

- **Backend**: Laravel 12.x (PHP 8.2)
- **Frontend**: Blade Templates, CSS
- **Database**: SQLite/MySQL (configurable)
- **Third-party API**: [Plant Identification API] (you can mention your source here)

---

🧱 Project Structure

```
plant-care/
├── app/
│   ├── Http/Controllers/
│   └── Models/
├── public/
│   └── images/
│       └── image1.jpg (background)
├── resources/
    └──index.blade.php
│   └── views/
│       ├── upload.blade.php
│       ├── result.blade.php
├── routes/
│   └── web.php
├── storage/
│   └── app/public/temp/ (for image uploads)
└── .env


⚙️ Installation & Setup

1. Clone the repo

   git clone https://github.com/your-username/plant-care.git
   cd plant-care

2. Install dependencies
   composer install
   npm install && npm run dev (optional for assets)

3. Setup environment
   ```bash
   cp .env.example .env
   php artisan key:generate

4. Configure storage
   ```bash
   php artisan storage:link
   ```

5. Run migrations
   ```bash
   php artisan migrate
   ```

6. Serve the app
   ```bash
   php artisan serve
   ```


## 🔄 Workflow

### 1. Upload Image  
User uploads an image of a plant on the homepage.

### 2. Identify Plant  
The image is sent to the third-party API and returns the plant name and details.

### 3. Generate Info  
Random values are generated for:
- Care instructions
- Watering (every 1–10 days)
- Pest advice

### 4. Show Result  
The plant name, image, and generated info are shown on the result page with options to:
- Save to garden
- Search on Wikipedia
- Identify another

### 5. My Garden  
Saved plants are shown in the "My Garden" page, with:
- Name, image, care info
- Next watering date
- Option to delete plant

---

## 📸 Screenshots

You can add screenshots here showing:
- Upload page
- Result page
- My Plants page

---

## 🧠 Future Improvements

- Notifications for next watering
- Login and user-specific garden
- Search for saved plants
- Manual plant name entry
- Enhanced styling with Tailwind or Vue.js
