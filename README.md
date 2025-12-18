# ⚡ TL;DR Generator (Summarizer AI)

**TL.DR Generator** is a productivity tool built with **Laravel 11** and **Google Gemini AI**. It solves the problem of "information overload" by transforming long, complex texts (legalese, technical docs, long emails) into concise, digestible bullet points.

## 🚀 The Problem

We live in an era of content saturation. Professionals spend hours reading documents just to extract a few key insights. This tool automates the comprehension process, saving valuable time.

## 🛠 Tech Stack

-   **Framework:** Laravel 11
-   **AI Engine:** Google Gemini 2.5 Flash
-   **Frontend:** Blade + Alpine.js (for reactive UI & loading states)
-   **Styling:** TailwindCSS
-   **Language:** PHP 8.2+

## 📦 Installation

1. Clone the repository:
    ```bash
    git clone [https://github.com/YOUR_USERNAME/tldr-generator.git](https://github.com/YOUR_USERNAME/tldr-generator.git)
    ```
2. Install dependencies:
    ```bash
    composer install
    npm install
    ```
3. Setup configuration:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
4. **Build Frontend Assets**
   Ensure the frontend dependencies are ready:
    ```bash
    npm install && npm run build
    ```
