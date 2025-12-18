# ⚡ TL;DR Generator (AI Summarizer)

A modern, fast, and responsive summarization tool built with **Laravel 11**, **TypeScript**, and **Google Gemini AI**. This project tackles information overload by transforming complex documents into concise, easy-to-read bullet points.

![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel) ![TypeScript](https://img.shields.io/badge/TypeScript-5.0-3178C6?style=for-the-badge&logo=typescript) ![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css) ![Gemini AI](https://img.shields.io/badge/Google_Gemini-2.5_Flash-8E75B2?style=for-the-badge&logo=googlebard)

---

## 🚀 The Problem & Solution

**The Problem:** In the corporate world, professionals waste hours reading lengthy emails, reports, and documentation to extract simple insights.

**The Solution:** An intelligent interface where users paste text, and the AI returns a structured, "Too Long; Didn't Read" summary in seconds.

![Result Example](screenshots/result01.png)
![Result Example](screenshots/result02.png)

---

## 🛠 Under The Hood (Technical Highlights)

Unlike traditional server-side rendered apps, this project uses a **Single Page Application (SPA)** feel within Laravel.

-   **Frontend:** Built with **TypeScript** for type safety and `fetch` API for asynchronous requests. No page reloads!
-   **Backend:** A robust Laravel Controller acting as a JSON API, handling validation and error management.
-   **AI Integration:** Connects to **Gemini 2.5 Flash** with custom System Instructions to force Markdown formatting.
-   **UI/UX:** Features real-time loading states (`Spinners`) and robust error handling for API limits or connection issues.

---

## 📸 Interface

**Clean & Focused Design:**
The UI is built with TailwindCSS, focusing on readability and distraction-free writing.

![Home View](screenshots/home.png)

---

## ⚙️ Installation

1.  **Clone the repository:**

    ```bash
    git clone https://github.com/YOUR-USERNAME/tldr-generator.git
    cd tldr-generator
    ```

2.  **Install PHP & JS Dependencies:**

    ```bash
    composer install
    npm install
    ```

3.  **Setup Environment:**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

    _Add your `GEMINI_API_KEY` to the .env file._

4.  **Run the Application (Dual Terminal):**

    Since this project uses Vite + Laravel, you need two terminals:

    _Terminal 1 (Assets):_

    ```bash
    npm run dev
    ```

    _Terminal 2 (Server):_

    ```bash
    php artisan serve
    ```

5.  **Access:** Open [http://127.0.0.1:8000](http://127.0.0.1:8000).

---

## 📝 Author

Developed by **William Dias**.
Fullstack Developer exploring AI Agents & Modern Web Stacks.
